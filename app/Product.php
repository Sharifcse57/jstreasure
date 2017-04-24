<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	public $guarded = ['id'];

	public function category() {
		return $this->belongsTo(Category::class);
	}
	public function images() {
		return $this->hasMany(ProductImage::class);
	}
	public function image() {
		return $this->hasOne(ProductImage::class);
	}
}
