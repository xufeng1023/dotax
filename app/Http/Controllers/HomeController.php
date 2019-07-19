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
            'topmostSubform[0].Page1[0].Pg1Header[0].f1_01[0]' => '',
            'topmostSubform[0].Page1[0].Pg1Header[0].f1_02[0]' => '',
            'topmostSubform[0].Page1[0].Pg1Header[0].f1_03[0]' => '',
            'topmostSubform[0].Page1[0].f1_04[0]' => request('personal.firstName'),
            'topmostSubform[0].Page1[0].f1_05[0]' => request('personal.lastName'),
            'topmostSubform[0].Page1[0].f1_06[0]' => request('personal.ssn'),
            'topmostSubform[0].Page1[0].f1_07[0]' => 'resident address',
            'topmostSubform[0].Page1[0].f1_08[0]' => 'usa address',
            'topmostSubform[0].Page1[0].f1_09[0]' => 'first tiem',
            'topmostSubform[0].Page1[0].f1_11[0]' => '',
            'topmostSubform[0].Page1[0].f1_12[0]' => '',
            'topmostSubform[0].Page1[0].f1_13[0]' => '',
            'topmostSubform[0].Page1[0].f1_14[0]' => '',
            'topmostSubform[0].Page1[0].f1_15[0]' => '',
            'topmostSubform[0].Page1[0].f1_16[0]' => '',
            'topmostSubform[0].Page1[0].f1_17[0]' => '',
            'topmostSubform[0].Page1[0].f1_18[0]' => '',
            'topmostSubform[0].Page1[0].f1_19[0]' => '',
            'topmostSubform[0].Page1[0].f1_20[0]' => '',
            'topmostSubform[0].Page1[0].f1_21[0]' => '',
            'topmostSubform[0].Page1[0].f1_22[0]' => '',
            'topmostSubform[0].Page1[0].f1_23[0]' => '',
            'topmostSubform[0].Page1[0].f1_24[0]' => '',
            'topmostSubform[0].Page1[0].f1_25[0]' => '',
            'topmostSubform[0].Page1[0].f1_26[0]' => '',
            'topmostSubform[0].Page1[0].f1_27[0]' => '',
            'topmostSubform[0].Page1[0].f1_28[0]' => '',
            'topmostSubform[0].Page1[0].f1_29[0]' => '',
            'topmostSubform[0].Page1[0].f1_30[0]' => '',
            'topmostSubform[0].Page1[0].c1_01[0]' => '',
            'topmostSubform[0].Page1[0].c1_01[1]' => '',
            'topmostSubform[0].Page1[0].f1_31[0]' => '',
            'topmostSubform[0].Page1[0].f1_32[0]' => '',
            'topmostSubform[0].Page1[0].f1_33[0]' => '',
            'topmostSubform[0].Page1[0].f1_34[0]' => '',
            'topmostSubform[0].Page1[0].f1_35[0]' => '',
            'topmostSubform[0].Page1[0].f1_36[0]' => '',
            'topmostSubform[0].Page1[0].f1_37[0]' => '',
            'topmostSubform[0].Page1[0].f1_38[0]' => '',
            'topmostSubform[0].Page1[0].f1_39[0]' => '',
            'topmostSubform[0].Page1[0].f1_40[0]' => '',
            'topmostSubform[0].Page1[0].f1_41[0]' => '',
            'topmostSubform[0].Page1[0].f1_42[0]' => '',
            'topmostSubform[0].Page1[0].c1_02[0]' => '',
            'topmostSubform[0].Page1[0].c1_02[1]' => '',
            'topmostSubform[0].Page1[0].c1_03[0]' => '',
            'topmostSubform[0].Page1[0].c1_03[1]' => '',
            'topmostSubform[0].Page1[0].f1_43[0]' => '',
            'topmostSubform[0].Page1[0].f1_44[0]' => '',
            'topmostSubform[0].Page1[0].f1_45[0]' => '',
            'topmostSubform[0].Page2[0].f2_01[0]' => '',
            'topmostSubform[0].Page2[0].f2_02[0]' => '',
            'topmostSubform[0].Page2[0].f2_03[0]' => '',
            'topmostSubform[0].Page2[0].f2_04[0]' => '',
            'topmostSubform[0].Page2[0].f2_05[0]' => '',
            'topmostSubform[0].Page2[0].f2_06[0]' => '',
            'topmostSubform[0].Page2[0].f2_07[0]' => '',
            'topmostSubform[0].Page2[0].f2_08[0]' => '',
            'topmostSubform[0].Page2[0].f2_09[0]' => '',
            'topmostSubform[0].Page2[0].f2_10[0]' => '',
            'topmostSubform[0].Page2[0].f2_11[0]' => '',
            'topmostSubform[0].Page2[0].f2_12[0]' => '',
            'topmostSubform[0].Page2[0].f2_13[0]' => '',
            'topmostSubform[0].Page2[0].f2_14[0]' => '',
            'topmostSubform[0].Page2[0].f2_15[0]' => '',
            'topmostSubform[0]' => ''

        ];

        $pdf = new PdfForm(public_path('pdf/f8843.pdf'), $data);

        $pdf->save(public_path('pdf/f8843-edit.pdf'));

        //return request()->all();
    }
}
