<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
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
    public function index( $type='')
    {
        //
        $user = Auth::user();
        $edit = 0;

        if($type=='vendors')
        {
            $users=User::where('admin','1')->get();

        } elseif ($type=='customers')
        {
            $users=User::where('admin','0')->get();

        } else{

            $users = User::paginate(2);
        }
        return view('backend.users', compact('users','user','edit'));
    }


    public function manage_users()
    {
        $user = Auth::user();
        return view('backend.manage_users',compact('user'));
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
