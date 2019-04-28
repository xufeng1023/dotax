<?php

namespace App\Http\Controllers;

use App\UserTax;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function save()
    {
        auth()->user()->taxes()->create(
            [
                'content' => serialize(request()->all())
            ]
        );
    }
}
