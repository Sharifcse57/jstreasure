<?php
namespace App\Http\Controllers;
use App\Category;

class AjaxController extends Controller {
	public function __construct() {
		parent::__construct();
	}

//   public function changeLanguage(){
	//      if (request()->ajax())
	// {
	//            session()->forget('langsName');
	//            $langsVal=request()->get('langsVal');
	//            session()->put('langsName',$langsVal);
	//            return session()->get('langsName');
	// }
	//   }

	public function getSubCategories() {
		if (request()->ajax()) {
			$data = request()->all();
			$subcategory = Category::where('parent_id', $data['catId'])->get();
			return response()->json($subcategory);
		}
	}

}
