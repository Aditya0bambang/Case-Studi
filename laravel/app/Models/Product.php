<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    public static function boot() {
        parent::boot();
        static::creating(function($item) {            
            $item->product_slug = Str::slug($item->product_name);
        });
        static::updating(function($item) {            
            $item->product_slug = Str::slug($item->product_name);
        });
    }
    use HasFactory;
    public function Product_Asset() {
        return $this->hasMany(Product_Asset::class);
    }
    protected $fillable = [
        "product_name",
        "product_slug",
        "price",
        "description"
    ];
    // protected $attributes = [
    //     "product_slug"=>$this->'product_name'
    // ];
    // protected $connection = 'mysql';
}
