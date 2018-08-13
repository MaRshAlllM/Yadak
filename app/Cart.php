<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = "shoppingcart";

    protected $fillable = ['identifier','instance','content'];
}
