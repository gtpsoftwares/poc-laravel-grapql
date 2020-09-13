<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['id','product_name','product_image','quantity','sku','category','sub_category'];
}
