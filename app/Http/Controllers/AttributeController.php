<?php

namespace App\Http\Controllers;

use App\Attribute;
use App\AttributeSet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttributeController extends Controller
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
        $edit = 0;
        return view('backend.attribute', compact('attribute','edit','user'));
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
       $input['value'] = explode('|',$request->input('value'));
       $input['value'] = serialize($input['value']);
        Attribute::create($input);
        return back()->with('msg','Attribute added successfully');
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
        $edit = 1;
        $attribute_edit = Attribute::findOrfail($id);

        return view('backend.attribute', compact('attribute','edit','attribute_edit'));

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
        $input['value'] = explode('|',$request->input('value'));
        $input['value'] = serialize($input['value']);
        $attribute = attribute::findOrFail($id);
        $attribute->update($input);
        return back()->with('msg','Attribute updated successfully');;
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
        $attribute = Attribute::findOrFail($id);
        $attribute->delete();
        return back()->with('message','Attribute deleted successfully');;
    }
    /*End CRUD*/
//
//    public function publish($id) {
//        attribute::where('id', $id)->update(['publication_status'=>1]);
//        return back();
//    }
//
//    public function unpublish($id) {
//        attribute::where('id', $id)->update(['publication_status'=>2]);
//        return back();
//    }


}
