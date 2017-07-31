<?php

namespace App\Http\Controllers;

use App\Brands;
use App\Category;
use App\Products;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    //
    public function home()
    {
        $user = Auth::user();
        $categories = Category::all();
        $products = Products::all();
        return view('frontend.home', compact('products','categories','user'));
    }
    public function collection()
    {
        $user = Auth::user();
        $categories = Category::all();
        $products = Products::all();
        return view('frontend.collection',compact('products','categories','user'));
    }
    public function show($id)
    {
        $user = Auth::user();
        $categories = Category::all();
        $products = Category::find($id)->products;
        return view('frontend.collection',compact('categories','products','user'));
    }
    public function subproduct($id)
    {
        $user = Auth::user();
//        $brands = Brands::all();
        $categories = Category::find($id);

//        $brands = Brands::find($id);
        $brands = Brands::find($id);
        $products = Products::where('brand_id',$brands->id)
                                ->where('category_id',$brands->category_id)
                                ->get();


        return view('frontend.collection',compact('categories','products','user','brands'));
    }

    public function topbrands()
    {
        return view('frontend.topbrands');
    }
    public function contact()
    {

        return view('frontend.contact');
    }
    public function signin()
    {
        $user = Auth::user();
        $categories = Category::all();
        $products = Products::all();
        if(!(Auth::check()))
        {

            return view('frontend.signin',compact('products','categories','user'));
        }
        return back();
    }
    public function signup(Request $request)
    {

        $user = Auth::user();
        $categories = Category::all();
        $products = Products::all();

        if(!(Auth::check()))
        {
            return view('frontend.signup',compact('categories','user'));
        }
        return view('frontend.signin',compact('user','categories'));
    }
    public function vendorSignup(Request $request)
    {

        $user = Auth::user();
        $categories = Category::all();
        $products = Products::all();

        if(!(Auth::check()))
        {
            return view('frontend.signup',compact('categories','user'));
        }
        return view('frontend.signup-vendor',compact('user','categories'));
    }

    public function process_vendorSignup(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
        $data['name'] = $request->input('name');
        $data['email'] = $request->input('email');
        $data['password'] = bcrypt($request->input('password'));
        $data->roles()->attach(Role::where('name', 'User')->first());
        User::create($data);

        $validator = $this->validator($data);

        if ($validator->passes()) {
            $user = $this->create($data)->toArray();
            $user['link'] = str_random(30);

            DB::table('user_activations')->insert(['id_user' => $user['id'], 'token' => $user['link']]);

            Mail::send('emails.activation', $user, function ($message) use ($user) {
                $message->to($user['email']);
                $message->subject('www.pako.com.ng - Activation Code');
            });
            return redirect()->to('signin')->with('success', "We sent activation code. Please check your mail.");
        }
        return back()->with('errors', $validator->errors());
    }
    public function userActivation($token){
        $check = DB::table('user_activations')->where('token',$token)->first();
        if(!is_null($check)){
            $user = User::find($check->id_user);
            if ($user->is_activated ==1){
                return redirect()->to('signin')->with('success',"user is already activated.");
            }
            $user->is_activated = 1;
            $user->save();
//            $user->update(['is_activated' => 1]);
            DB::table('user_activations')->where('token',$token)->delete();
            return redirect()->to('signin')->with('success',"user active successfully.");
        }
        return redirect()->to('signin')->with('Warning',"your token is invalid");
    }
//
//    public function process_signin(Request $request)
//    {
//
//        $this->validate($request, [
//            'name' => 'required|max:255',
//            'email' => 'required|email|max:255|unique:users',
//            'password' => 'required|min:6|confirmed',
//        ]);
////
//            $data['name'] = $request->input('name');
//            $data['email'] = $request->input('email');
//            $data['password'] = bcrypt($request->input('password'));
////        'admin' => $data['admin'],
//             User::create($data);
//        return back()->with('msg','Thanks for signing up');
//    }

    public function search()
    {
        return view('frontend.search');
    }

    public function details($id)
    {
        $user = Auth::user();
        $categories = Category::all();
        $product_edit = Products::findOrfail($id);
        return view('frontend.product-details', compact('product_edit','categories','user'));
    }

}
