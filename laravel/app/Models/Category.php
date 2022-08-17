<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    public static function boot() {
        parent::boot();
        static::creating(function($category) {            
            $category->category_slug = Str::slug($category->category_name);
        });
        static::updating(function($category) {
            $category->category_slug = Str::slug($category->category_name);
        });
    }
    use HasFactory;
    public function asset() {
        return $this->belongsTo(Asset::class);
    }
    protected $fillable = [
        "category_name",
        "category_slug",
        "asset_id",
    ];
    // protected $connection = 'mysql';
}
