<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Unitmeasure extends Model
{
    use HasFactory;
    protected $table = 'unitsmeasurements';
    protected $fillable = ['name','abbreviation'];

    public function products(){
        return $this->hasMany(Product::class);
    }
}
