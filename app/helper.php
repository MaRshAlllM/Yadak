<?php
function sortMyCatInHtmlForm($p_id=null){ 
    $categories = App\Category::where('p_id','=',$p_id)->get();
    echo "<ul>";
        foreach ($categories as $category) {      
            echo "<div class=\"checkbox\"><li>
                <label>
                    <input name=\"c_ids\" type=\"checkbox\" value=\"{$category->id}\">
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
function sortMyCatInHtmlMenu($p_id=null){ 
    $categories = App\Category::where('p_id','=',$p_id)->get();
    echo "<ul class=\"list-group list-group-flush\">";
        foreach ($categories as $category) { 

            $category_pid = App\Category::where('id','=',$category->p_id)->get();
            $url = $category->slug;
            foreach ($category_pid as $values) {
                $url = $values->slug.'/'.$url;
            }
            echo "<li class=\"list-group-item\"><a href=\"category/{$url}\">{$category->name}</a>";
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
 