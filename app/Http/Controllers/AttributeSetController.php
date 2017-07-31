<?php

namespace App\Http\Controllers;

use App\Attribute;
use App\AttributeSet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class attributeSetController extends Controller
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
        $attribute = Attribute::all();
        $attributeSet = AttributeSet::all();
        $edit = 0;
        return view('backend.attributeSet', compact('attributeSet','edit','user','attribute'));
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
        $input['name'] = $request->input('name');
        $input['value'] = serialize($request->input('attribute'));
        AttributeSet::create($input);
        return back()->with('msg','attributeSet added successfully');
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
        $attribute = Attribute::all();
        $attributeSet = AttributeSet::all();
        $edit = 1;
        $attributeSet_edit = AttributeSet::findOrfail($id);
        return view('backend.attributeSet', compact('attribute','attributeSet','edit','attributeSet_edit'));

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
        $input['name'] = $request->input('name');
        $input['value'] = serialize($request->input('attribute'));
        $attributeSet = AttributeSet::findOrFail($id);
        $attributeSet->update($input);
        return back()->with('msg','attributeSet updated successfully');;
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
        $attributeSet = attributeSet::findOrFail($id);
        $attributeSet->delete();
        return back()->with('message','attributeSet deleted successfully');;
    }
    /*End CRUD*/
//
//    public function publish($id) {
//        attributeSet::where('id', $id)->update(['publication_status'=>1]);
//        return back();
//    }
//
//    public function unpublish($id) {
//        attributeSet::where('id', $id)->update(['publication_status'=>2]);
//        return back();
//    }


}
