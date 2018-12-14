<?php
namespace App\Http\Controllers;
use App\Product;
use App\Category;
use App\Image;
use App\Comment;
use Illuminate\Http\Request;
use App\Slideshow;
use Illuminate\Support\Facades\DB;

class MainContentController extends Controller
{
    public function index(){

	$products = Product::orderby('created_at','DESC')->paginate(24);
	$slideshow = Slideshow::get();
	$most = DB::table('products')->join('shoppingcart','products.id','=','shoppingcart.product_id')->select('title as title','image as image','product_id as id',DB::raw("count(shoppingcart.product_id) as count"))->WhereNotNull('refid')->groupBy('product_id')->orderBy('count','DESC')->limit(10)->get();

    return view('index')->with(['products'=>$products,'slideshow'=>$slideshow,'most'=>$most]);

    }
    public function single($id){

        $pr = Product::with(['comments' => function($query){
        	$query->where('status','=',1);
        },'features'])->find($id);
        $gallery = Image::where('prod_id',$id)->get();
        $most = DB::table('products')->join('shoppingcart','products.id','=','shoppingcart.product_id')->select('title as title','image as image','product_id as id',DB::raw("count(shoppingcart.product_id) as count"))->WhereNotNull('refid')->groupBy('product_id')->orderBy('count','DESC')->limit(3)->get();
    	return view('single')->with(['product'=>$pr,'gallery'=>$gallery,'most'=>$most]);

    }
    public function insertComment($id){
    	$this->validate(request(),[

    		'content' => 'required|max:600',

    	]);
    	$product = Product::find($id);
    	$comment = new Comment();
    	$comment->user_id = auth()->user()->id;
    	$comment->product_id = $product->id;
    	$comment->content = request()->content;
    	$comment->status = 0;
    	$comment->save();
    	return redirect()->back()->with('message','نظر شما با موفقیت ثبت شد پس از بررسی مدیریت قابل مشاهده خواهد بود.');

    }
    public function search(Request $request){

    	// $this->validate($request,[

    	// 	'keyword' => 'required',

    	// ]);
    	if($request->category != 'همه دسته ها'){
			$category = Category::find($request->category);
    		$datas = $category->products()->where('title','LIKE','%'.$request->keyword.'%')->orWhere('full_body','LIKE','%'.$request->keyword.'%')->orderBy('id','desc')->paginate(24);
            $datas->withPath("/search/?keyword={$request->keyword}&category={$request->category}");

    		return view('search',compact('datas'));
    	}
    	$datas =  Product::where('title','LIKE','%'.$request->keyword.'%')->orWhere('full_body','LIKE','%'.$request->keyword.'%')->orderBy('id','desc')->paginate(24);

        $datas->withPath("/search/?keyword={$request->keyword}&category={$request->category}");

    	return view('search',compact('datas'));
    	
    }
}
