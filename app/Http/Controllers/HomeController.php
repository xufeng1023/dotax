<?php

namespace App\Http\Controllers;

use App\PdfForm;

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

    function generate8843()
    {
        $data = [
            'topmostSubform[0].Page1[0].Pg1Header[0].f1_01[0]' => request('personal.firstName').' '.request('personal.lastName')
        ];

        $pdf = new PdfForm(public_path('pdf/f8843.pdf'), $data);

        $pdf->save(public_path('pdf/f8843-edit.pdf'));

        //return request()->all();
    }
}
