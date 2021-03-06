<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\User; 
use App\Product;
use Illuminate\Support\Facades\Auth; 
use Validator;
use App\Slideshow;
use App\Category;
class UserController extends Controller 
{
public $successStatus = 200;
/** 
     * login api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function login(){ 
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('YadakApp')->accessToken; 
            return response()->json(['success' => $success], $this->successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 
    }

    public function index() 
    { 

       $products = Product::all();
       $slideshow = Slideshow::all();
	   return response()->json(['success' => ['products' => $products,'slideshow' => $slideshow]], $this->successStatus); 

    } 

    public function single(){

        $product = Product::with('gallery')->find(request('id'));

        return response()->json(['success' => $product],$this->successStatus);

    }

    public function category(){

        return response()->json(['success' => Category::where("p_id","=",null)->get()],$this->successStatus);

    }

    public function search(){

        $datas =  Product::where('title','LIKE','%'.request('keyword').'%')->orWhere('full_body','LIKE','%'.request('keyword').'%')->orderBy('id','desc')->paginate(24);

        return response()->json(['success' => $datas],$this->successStatus);
        

    }

/** 
     * Register api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
//     public function register(Request $request) 
//     { 
//         $validator = Validator::make($request->all(), [ 
//             'name' => 'required', 
//             'email' => 'required|email', 
//             'password' => 'required', 
//             'c_password' => 'required|same:password', 
//         ]);
// if ($validator->fails()) { 
//             return response()->json(['error'=>$validator->errors()], 401);            
//         }
// $input = $request->all(); 
//         $input['password'] = bcrypt($input['password']); 
//         $user = User::create($input); 
//         $success['token'] =  $user->createToken('YadakApp')->accessToken; 
//         $success['name'] =  $user->name;
// return response()->json(['success'=>$success], $this->successStatus); 
//     }
/** 
     * details api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function details() 
    { 
        $user = Auth::user(); 
        return response()->json(['success' => $user], $this->successStatus); 
    } 
}
