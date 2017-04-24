<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Role;
use App\Permission;
use App\RolePermission;
use App\User;
use Validator;
use Redirect;
use Response;

use Illuminate\Http\Request;
use Route;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id','desc')->get();        
        //dd($roles);           
        return View('categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::pluck('title','id')->toArray();
        return View('categories.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data=request()->all();        
        $categorys=Category::create($data);
        if($categorys){
            $message='succeessfully inserted';
            return redirect()->route('categories.create')->with($message);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $subcategory=Category::where('parent_id', $id)->get();
      return Response::json($subcategory);

        // $subcategories=Subcategory::where('category_id', '=', $id)->get();
       // return Response::json($subcategories);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datas = Category::find($id);
        $categories=Category::whereNull('parent_id')->pluck('title','id')->toArray();
             return view('categories.edit',compact('datas','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $data=request()->except('_method','_token');      
        $categories=Category::where('id',$id)->update($data);
        if($categories){           
            return redirect()->route('categories.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Category::find($id);
        $data->delete();
        return redirect()->route('categories.index');
    }
}
