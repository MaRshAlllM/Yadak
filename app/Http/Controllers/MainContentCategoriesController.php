<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
	
		if(!empty($output_array)){
			
			$category = Category::where('slug','=',end($output_array))->first();

			$data = $this->CategoryOrganizer($category->id);
			$final = $category->products()->get();
			foreach ($data as $value) {
				
				foreach ($value as $v) {
				  $final->push($v);
				}

			}
			return view('categories')->with('categories',$final->unique());



		}
		$category =  Category::where('slug','=',$slug)->first();
		$data = $this->CategoryOrganizer($category->id);
		$final = $category->products()->get();
		foreach ($data as $value) {
			
			foreach ($value as $v) {
			  $final->push($v);
			}

		}
		return view('categories')->with('categories',$final->unique());

    }
}
