<?php

function sortMyCatInHtml($p_id=null){

        
    $categories = App\Category::where('p_id','=',$p_id)->get();
    echo "<ul>";
        foreach ($categories as $category) {
                
            echo "<div class=\"checkbox\"><li>
                <label>
                    <input name=\"c_ids\" type=\"checkbox\" value=\"{$category->id}\">
                        {$category->name}
                </label>    
            ";

            if(App\Category::where('p_id','=',$category->id) != []){

                 sortMyCatInHtml($category->id);

            }

            echo "</li></div>";

        }
    echo "</ul>";

    }