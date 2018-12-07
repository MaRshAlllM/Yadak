<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Category;
class MainContentCategoriesController extends Controller
{
    // public function index(Category $slug){

    // 	return $slug;

    // }
    private $data = [];
    private $checker = 0;
    private function CategoryOrganizer($category_id,$loop_data = null){

    	$childs = Category::where('p_id','=',$category_id)->get();
    	

    	if(!is_null($loop_data)){
    		if(is_array($loop_data)){

    		$this->data = $loop_data;
	    	}else{
	    		$this->data = $loop_data->toArray();
	    	}

    	}
    	foreach ($childs as $child) {
    			
    		array_push($this->data,$child->products()->get());
    		// $this->data[$this->checker++] = $child->products()->get();

    		if(Category::where('p_id','=',$child->id)->get()->isNotEmpty()){

    			$this->CategoryOrganizer($child->id,$this->data);

    		}
    	}
    	return $this->data;

    }
    public function index($slug){


    	preg_match("/(.*)\/(.*)/", $slug, $output_array);


    	// return findParents('ali');	
		if(!empty($output_array)){
			
			$category = Category::where('slug','=',end($output_array))->first();
		}else{
			$category =  Category::where('slug','=',$slug)->first();
		}
		$data = $this->CategoryOrganizer($category->id);
		$final = $category->products()->orderby('created_at','DESC')->get();
		foreach ($data as $value) {
			
			foreach ($value as $v) {
			  $final->push($v);
			}

		}
        $per_page = 24;
		$pagingate = new LengthAwarePaginator($final->unique(),$final->unique()->count() ,$per_page);
		$pagingate->withPath('/category/'.$slug);

		// return $pagingate->toArray()["from"];
		// return $pagingate[1];

		// return $pagingate;
		// $pagination = $pagingate->slice($pagingate->toArray()["from"] - 1,$per_page);
		return view('categories')->with('categories',$pagingate);

    }
}
