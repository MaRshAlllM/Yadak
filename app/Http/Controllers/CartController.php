<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use SoapClient;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{

    public function index(){

        return view('list_shoppingcart');
    }

    public function add(Request $request,$id){

            $f_p = (explode('-',$request->price));
            $price = $f_p[1];
            $feature = $f_p[0];
            $title = $request->title;
            $number = $request->number;

            \Cart::add("$id", "$title", $number, $price,['feature'=>$feature]);
            return view('shoppingcart');

    }

    function pay(){


        $tprice = \Cart::subtotal();
        $identifier = str_random(20);
        //\Cart::instance(auth()->user()->email)->store($identifier);
        $cc = array();
        $i = 0;
        foreach(\Cart::content() as $row){
            $i++;
            $cc['identifier'] = $identifier;
            $cc['instance'] = auth()->user()->email;
            $cc['content'] = $row->name;
            $cc['content'] = $row->name;
            $cc['qty'] = $row->qty;
            $cc['price'] = $row->price;
            $cc['subtotal'] = $row->subtotal;
            $cc['feature'] = $row->options->feature;
            $cc['total'] = $tprice;
            Cart::insert($cc);
        }

        $_session['factor'] = $identifier;

        $MerchantID = '06da4c26-d439-11e8-ad89-000c295eb8fc';  //Required
        $Amount = $tprice; //Amount will be based on Toman  - Required
        $Description = " شماره فاکتور:$identifier";  // Required
        $Email = auth()->user()->email; // Optional
        $Mobile = ''; // Optional
        $CallbackURL = 'http://www.yadakbazzar.ir/verify';  // Required

        // URL also can be ir.zarinpal.com or de.zarinpal.com
        $client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

        $result = $client->PaymentRequest([
            'MerchantID'     => $MerchantID,
            'Amount'         => $Amount,
            'Description'    => $Description,
            'Email'          => $Email,
            'Mobile'         => $Mobile,
            'CallbackURL'    => $CallbackURL,
        ]);

        //Redirect to URL You can do it also by creating a form
        if ($result->Status == 100) {
            $au = $result->Authority;
            $u = Cart::where('identifier',$_session['factor']);
            $u->auth = "$au";
            $u->update(['auth'=>$u->auth]);

            header('Location: https://www.zarinpal.com/pg/StartPay/'.$result->Authority);

        } else {
           $var = 'سیستم با خطا مواجه شده است: '. $result->Status;
           $u = Cart::where('identifier',$_session['factor']);
           $u->update(['status'=>$var]);
           return redirect()->route('mypurchase')->with('message','سیستم با خطا مواجه شد');
        }


    }

    function verify(){
        $tprice = \Cart::subtotal();
        $MerchantID = '06da4c26-d439-11e8-ad89-000c295eb8fc';
        $Amount = $tprice; //Amount will be based on Toman
        $Authority = $_GET['Authority'];

        if ($_GET['Status'] == 'OK') {
            // URL also can be ir.zarinpal.com or de.zarinpal.com
            $client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

            $result = $client->PaymentVerification([
                'MerchantID'     => $MerchantID,
                'Authority'      => $Authority,
                'Amount'         => $Amount,
            ]);

            if ($result->Status == 100) {

                $refid = $result->RefID;
                $rf = Cart::where('auth',$Authority);
                $rf->update(['refid'=>$refid,'status'=>'پرداخت شده است.']);
                return redirect()->route('mypurchase')->with('message'," پرداخت با موفقیت انجام شد. شماره پرداخت: $result->RefID");
                //echo 'Transation success. RefID:'.$result->RefID;

            } else {
                $st = 'در هنگام پرداخت سیستم با خطا مواجه شد: '. $result->Status;
                $rf = Cart::where('auth',$Authority);
                $rf->update(['status'=>$st]);

                return redirect()->route('mypurchase')->with('message','در هنگام پرداخت سیستم با خطا مواجه شد');

            }
        } else {
            $st = "پرداخت توسط کاربر لغو شد.";
            $rf = Cart::where('auth',$Authority);
            $rf->update(['status'=>$st]);
            return redirect()->route('mypurchase')->with('message','پرداخت توسط کاربر لغو شد.');
        }


    }

    function remove_row($id){

        \Cart::remove($id);

        return redirect()->route('shoppingcart')->with('Message','حذف با موفقیت انجام شد');

    }

    function mypurchase(){
        $factor = DB::table('shoppingcart')->groupBy('identifier')->where('instance',auth()->user()->email)->get();
        return view('mypurchase')->with('factor',$factor);

    }

    function pdetail($id){

        $pd = Cart::where('identifier',$id)->get();
        return view('payment_detail')->with('pd',$pd);

    }
}
