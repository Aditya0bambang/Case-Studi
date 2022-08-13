<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;
    public function category() {
        return $this->hasOne(Category::class);
    }
    public function product_asset() {
        return $this->hasOne(Product_Asset::class);
    }
}
