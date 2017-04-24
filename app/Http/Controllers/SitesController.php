<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Mail;
use Session;

class SitesController extends Controller {
	public $searchKey = "";
	public $orderby = "";
	public function index() {
		$category = Category::all();
		$products = Product::with(['images'])->orderBy('id', 'desc')->get();
		//dd($products);
		//request()->session()->flush();

		return view('sites.index', compact('category', 'products'));
	}

	public function category($slug) {

		// $product = "";
		$searchKey = "";
		$orderby = "";
		if (isset($_GET['orderby'])) {
			$str = $_GET['orderby'];
			$searchItem = explode(":", $str);
			$this->searchKey = $searchItem[0];
			$this->orderby = $searchItem[1];

			$category = Category::with(
				['products' => function ($product_img) {
					return $product_img->with(['images'])->orderBy($this->searchKey, $this->orderby)->get();
				},
				])->where('slug', $slug)->paginate(4);

		} else {
			//return Category::with(['products'])->where('slug', $slug)->get();
			$category = Category::with(
				['products' => function ($product_img) {
					return $product_img->with(['images'])->get();
				},
				])->where('slug', $slug)->orderBy('id', 'desc')->paginate(8);
		}
		return view('sites.category', compact('category'));
	}

	public function product_details($product_slug) {
		$product_details = Product::with([
			'images',
			'category' => function ($category_query) {
				return $category_query->with(
					['products' => function ($product_query) {
						return $product_query->with(
							['images']
						)->limit(4);
					},
					]
				)->select('id', 'slug')->get();
			},

		])->where('product_slug', $product_slug)->get();
		//dump($product_details);

		return view('sites.product_details', compact('product_details'));
	}

	public function add_cart_processing() {
		$new_cart = request()->input('cart');
		$quantity = request()->input('quantity');
		$cart_value = [
			'title' => $new_cart['title'],
			'price' => $new_cart['price'],
			'quantity' => $quantity,
		];

		request()->session()->put('cart.' . $new_cart['id'], $cart_value);

		return response()->json(request()->session()->get('cart', []));
	}

	public function update_cart_processing() {
		$cart = request()->input('cart');
		request()->session()->put('cart', $cart);

		return response()->json(request()->session()->get('cart', []));
	}

	public function cart() {
		return view('sites.cart');
	}

	public function mini_cart() {
		$mini_cart_value = request()->session()->get('cart', 'default');
		return $mini_cart_value;

		//return view('sites.mini_cart');
	}

	public function get_product_to_modal() {
		$id = request()->input('id');
		$products = Product::with(['images'])->find($id);

		return response()->json($products);

	}

	public function getContact() {
		return view('sites.contact');
	}

	public function postContact() {
		$this->validate(request(), [
			'email' => 'required|email',
			'subject' => 'min:3',
			'message' => 'min:3']);

		$data = array(
			'email' => request()->email,
			'subject' => request()->subject,
			'bodyMessage' => request()->message,
		);

		Mail::send('emails.contact', $data, function ($message) use ($data) {
			$message->from($data['email']);
			$message->to('sharifcse577@gmail.com');
			$message->subject($data['subject']);
		});

		Session::flash('success', 'Your Email was Sent!');

		return redirect('/');
	}

	public function get_product_by_choice() {
		$item = request()->input('item');
		if ($item == 'new') {
			$items = Product::orderBy('id', 'desc')->get();
			return response()->json($items);
			//->select('name', 'email')->get();
		} elseif ($item == 'highTolow') {

			$items = Product::orderBy('price', 'desc')->get();
			foreach ($items as $key => $value) {

			}
			return response()->json($value->id);

		} elseif ($item == 'lowTohigh') {
			$items = Product::orderBy('price')->get();
			return response()->json($items);
		} elseif ($item == 'name') {
			$items = Product::orderBy('title')->get();
			return response()->json($items);
		} else {
			return response()->json("no items found");
		}
	}

	public function orderBy() {
		return redirect('/');
	}

	public function terms() {
		return view('sites.terms');
	}

}
