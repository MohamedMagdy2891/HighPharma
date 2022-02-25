<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['product_id','client_id','count','status','total'];

    public function Client()
    {
        return $this->belongsTo('Client::calss','client_id','id');

    }
    public function Product()
    {
        return $this->belongsTo(Product::class,'product_id','id');

    }
}