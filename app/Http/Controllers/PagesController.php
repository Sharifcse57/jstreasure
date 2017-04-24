<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use Validator;

class PagesController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		$pages = Page::get();
		return view('admin.pages.index', compact('pages'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('admin.pages.create');
		// echo "create";
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store() {
		//validate
		$data = request()->all();
		$validator = Validator::make($data,
			array(
				'title' => 'required|unique:pages',
			)
		);
		if ($validator->fails()) {
			return redirect()->route("pages.create")
				->withErrors($validator)
				->withInput();
		}

		$slug = str_slug($data['title'], '-');
		$data['slug'] = $slug;
		$check = Page::create($data)->id;
		return redirect()->route('pages.create');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		echo $id;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$datas = Page::find($id);
		return view('admin.pages.edit', compact('datas'));

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$data = request()->except('_method', '_token');
		$slug = str_slug($data['title'], '-');
		$data['slug'] = $slug;

		$page = Page::where('id', $id)->update($data);
		if ($page) {
			return redirect()->route('pages.index');
		}
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
