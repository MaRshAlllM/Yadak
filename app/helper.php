<?php
function sortMyCatInHtmlForm($p_id=null){ 
    $categories = App\Category::where('p_id','=',$p_id)->get();
    echo "<ul>";
        foreach ($categories as $category) {      
            echo "<div class=\"checkbox\"><li>
                <label>
                    <input name=\"c_ids[]\" type=\"checkbox\" value=\"{$category->id}\">
                        {$category->name}
                </label>    
            ";
            if(App\Category::where('p_id','=',$category->id)->get()->isNotEmpty()){
                 sortMyCatInHtmlForm($category->id);
            }
            echo "</li></div>";
        }
    echo "</ul>";
}
function sortMyCatInHtmlFormForEdit($p_id=null,$product){ 
    $categories = App\Category::where('p_id','=',$p_id)->get();
    echo "<ul>";
        foreach ($categories as $category) {   

            $thisturn = false;
            foreach ($product as $value) {

                if($value->name == $category->name){

                    echo "<div class=\"checkbox\"><li>
                    <label>
                        <input name=\"c_ids[]\" type=\"checkbox\" value=\"{$category->id}\" checked>
                            {$category->name}
                    </label> ";
                    $thisturn = true;

                }

            }
            if($thisturn == false){
                        echo "<div class=\"checkbox\"><li>
                        <label>
                            <input name=\"c_ids[]\" type=\"checkbox\" value=\"{$category->id}\">
                                {$category->name}
                        </label> ";
            }   
            
          
            if(App\Category::where('p_id','=',$category->id)->get()->isNotEmpty()){
                 sortMyCatInHtmlFormForEdit($category->id,$product);
            }
            echo "</li></div>";
        }
    echo "</ul>";
}
function findParents($p_id){
    
    // $counter = $counter + 1;
    // if($counter <= 3){

    //     $x = findParents($p_id = $p_id.$p_id,$counter);

    //     return $x.$counter;
    // }

    $category_pid = App\Category::where('id','=',$p_id)->first();

    // $url = $category_pid['slug'];

    if(!empty($category_pid)){
        return findParents($category_pid['p_id']).'/'.$category_pid['slug'];
    }

}
function sortMyCatInHtmlMenu($p_id=null){ 
    $categories = App\Category::where('p_id','=',$p_id)->get();
    echo "<ul class=\"list-group list-group-flush\">";
        foreach ($categories as $category) { 


            $url = findParents($category->p_id).'/'.$category->slug;
          
            echo "<li class=\"list-group-item\"><a href=\"".URL('category')."{$url}\">{$category->name}</a>";
            if(App\Category::where('p_id','=',$category->id)->get()->isNotEmpty()){
                 sortMyCatInHtmlMenu($category->id);
            }
            echo "</li>";
        }
    echo "</ul>";
}
function fa_slug($str, $options = array())
 {
     $str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());

     $defaults = array(
         'delimiter' => '-',
         'limit' => null,
         'lowercase' => true,
         'replacements' => array(),
         'transliterate' => false,
     );

     $options = array_merge($defaults, $options);

     $char_map = array(
         'ة' => 'ه', 'ۀ' => 'ه', 'ؤ' => 'و', 'ي' => 'ی', 'ك' => 'ک', 'ء' => '', 'أ' => 'ا', 'إ' => 'ا',
         "٤" => "۴", "٥" => "۵", "٦" => "۶", 'ـ' => '_',
     );

     $str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);

     if ($options['transliterate']) {
         $str = str_replace(array_keys($char_map), $char_map, $str);
     }

     $str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);

     $str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);

     $str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');

     // Remove delimiter from ends
     $str = trim($str, $options['delimiter']);

     return $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;
 }
 