<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Brand extends Model
{
    use HasFactory;
    protected $table = 'brands';
    protected $fillable = ['name','description'];

    public function products() {
        return $this->hasMany(Product::class);
    }

}
