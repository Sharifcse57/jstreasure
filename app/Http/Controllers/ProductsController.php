<?php
namespace App\Http\Controllers;
use App\Category;
use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;

class ProductsController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$products = Product::with(['category' => function ($q) {
			return $q->select('id', 'title');
		}])->get();
		//dd($products);
		return view('products.index', compact('products'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$data = Category::all('title', 'id', 'slug', 'parent_id');
		// dd($data);
		return view('products.create', compact('data'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store() {
		$data = request()->except('image', '_token', '_method', 'sub_category_id');
		$counter = 1;

		$slug = str_slug($data['title'], '-');
		$get_data = Product::select('product_slug')->where('product_slug', 'like', $slug . '%')->get();

		$length = count($get_data);

		foreach ($get_data as $key => $value) {
			$get_slug = $value['product_slug'];
		}

		if ($length > 0) {

			$oldSlug = str_replace(strrchr($get_slug, "~"), '', $get_slug);
			$newLength = $length + 1;
			$newSlug = $oldSlug . '~' . $newLength;
			$data['product_slug'] = $newSlug;

		} else {
			$value = 1;
			$product_slug = $slug . '~' . $value;
			$data['product_slug'] = $product_slug;
		}

		$product_name_id = Product::create($data)->id;

		$files = request()->file('image');
		if ($product_name_id) {
			$iCheck = 0;
			foreach ($files as $file) {

				$myarray = ['product_id' => $product_name_id, 'img' => $file->getClientOriginalExtension()];
				$iCheck = ProductImage::create($myarray)->id;
				$filename = $iCheck . '.' . $file->getClientOriginalExtension();
				$file->move('images/sites/products/', $filename);

				$iCheck++;
			}
			if ($iCheck == 0) {
				echo "successfully inserted";
			}
		}

		return redirect()->route('product.create');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$data = Product::with(['images' => function ($q) {
			return $q->select();
		}])->find($id);
		return view('products.detail', compact('data'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		echo $id;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
	}

}
