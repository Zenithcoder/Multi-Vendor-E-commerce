<?php

namespace App\Http\Controllers;

use App\Brands;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }


    /*Start CRUD*/
    public function index()
    {
        //
        $user = Auth::user();
        $brands = Brands::all();
        $categories = Category::all();
        $edit = 0;
        return view('backend.brands', compact('brands','edit','user','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data['name'] = $request->input('name');
        $data['category_id'] = $request->input('category_id');
        Brands::create($data);
        return back()->with('msg','Brand added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $brands = Brands::all();
        $edit = 1;
        $brand_edit = Brands::findOrfail($id);
        return view('backend.brands', compact('brands','edit','brand_edit'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $input = $request->all();
        $brands = Brands::findOrFail($id);
        $brands->update($input);
        return back()->with('msg','Brand updated successfully');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $brands = Brands::findOrFail($id);
        $brands->delete();
        return back()->with('message','Brand deleted successfully');;
    }
    /*End CRUD*/
//
//    public function publish($id) {
//        Brands::where('id', $id)->update(['publication_status'=>1]);
//        return back();
//    }
//
//    public function unpublish($id) {
//        Brands::where('id', $id)->update(['publication_status'=>2]);
//        return back();
//    }


}
