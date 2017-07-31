<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Test extends Controller
{
    //
    public function ajax()
    {
        return view('test');
    }
    public function test_ajax()
    {
        return 'Ajax result';
    }
}
