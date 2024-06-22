<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Unitmeasure;
use PhpParser\Node\Expr\FuncCall;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['name','description','price'];

        public function brands(){
            return $this->belongsTo(Brand::class,'brand_id');
        }

        public function categories(){
            return $this->belongsTo(Category::class,'category_id');
        }

        public function unitsmeasurments(){
            return $this->belongsTo(Unitmeasure::class,'unit_measurement_id');
        }

        public Function image(){
            return $this->morphOne(Image::class,'imageable');
        }

}
