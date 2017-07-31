<?php

namespace App\Http\Controllers;

use App\Brands;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
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
        $categories = Category::all();
        $edit = 0;
        return view('backend.categories', compact('categories','edit','user'));
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

        $input = $request->all();
        Category::create($input);
        return back()->with('msg','Category added successfully');
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
        $categories = Category::all();
        $edit = 1;
        $category_edit = Category::findOrfail($id);
        return view('backend.categories', compact('categories','edit','category_edit'));

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
        $categories = Category::findOrFail($id);
        $categories->update($input);
        return back()->with('msg','Category updated successfully');;
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
        $categories = Category::findOrFail($id);
        $categories->delete();
        return back()->with('message','Category deleted successfully');;
    }
    /*End CRUD*/

    public function publish($id) {
        Category::where('id', $id)->update(['publication_status'=>1]);
        return back();
    }

    public function unpublish($id) {
        Category::where('id', $id)->update(['publication_status'=>2]);
        return back();
    }


}
