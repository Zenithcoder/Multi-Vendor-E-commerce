<?php

namespace App\Http\Controllers;

use App\Brands;
use App\Category;
use App\Products;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
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
        $brands = Brands::all();

        if($user->id == 1) {
            $products = Products::all();
        } else {
           $products = Products::where('user_id', $user->id)->get();
        }
        $edit = 0;

        return view('backend.products', compact('products','user','edit','categories','brands',$categories,$brands));
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
        $rules = [

            'name' => ['required', 'min:3'],
            'price' => ['required'],
            'qty' => ['required'],
        ];
        $this->validate($request, $rules);

        $data['name'] = $request->input('name');
        $data['price'] = $request->input('price');
        $data['qty'] = $request->input('qty');
        $data['category_id'] = $request->input('category_id');
        $data['brand_id'] = $request->input('brand_id');

        if($request->hasFile('image')) {
            $destination = 'img/uploads/';
            $file = $request->file('image');
            $file->move($destination, time().$file->getClientOriginalName());
           $data['image'] = time().$file->getClientOriginalName();

        } else {
            $data['image'] = "default.jpg";
        }
        $data['user_id'] = $request->input('user_id');

        Products::create($data);
        return back()->with('msg','Product added successfully');
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
        $user = Auth::user();
        $users = User::all();
        $categories = Category::all();
        $brands = Brands::all();
        if($user->id == 1) {
            $products = Products::all();
        } else {
            $products = Products::where('user_id', $user->id)->get();
        }
        $edit = 1;
        $product_edit = Products::findOrfail($id);
        $this->authorize('modify', $product_edit);
        return view('backend.products', compact('products','edit','product_edit','categories','brands','users','user'));

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
        $products = Products::findOrFail($id);
        $this->authorize('modify', $products);
        $products->update($input);
        return back()->with('msg','Product updated successfully');;
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
        $products = Products::findOrFail($id);
        $this->authorize('modify', $products);
        $products->delete();
        return back()->with('message','Product deleted successfully');;
    }
    /*End CRUD*/

//    public function publish($id) {
//        Products::where('id', $id)->update(['publication_status'=>1]);
//        return back();
//    }
//
//    public function unpublish($id) {
//        Products::where('id', $id)->update(['publication_status'=>2]);
//        return back();
//    }


}
