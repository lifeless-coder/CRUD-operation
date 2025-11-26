<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $fillable = ['name'];

    public function subCategory(){
        return $this->hasMany(Subcategory::class, 'id');
    }
    public function products()
    {
        return $this->hasMany(Product::class, 'id');
    }
}
