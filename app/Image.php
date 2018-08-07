<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'image_gallery';

    protected $fillable = [
        'prod_id','image_name'
    ];
}
