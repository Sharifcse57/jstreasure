<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model {
	public $timestamps = false;
	public $guarded = ['id'];
	public function product() {
		return $this->belongsTo(Product::Class);
	}

}
