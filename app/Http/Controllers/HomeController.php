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
            'topmostSubform[0].Page1[0].f1_04[0]' => strtoupper(request('personal.firstName')),
            'topmostSubform[0].Page1[0].f1_05[0]' => strtoupper(request('personal.lastName')),
            'topmostSubform[0].Page1[0].f1_06[0]' => request('personal.ssn'),
            'topmostSubform[0].Page1[0].f1_07[0]' => strtoupper(request('addressOfResidence.street').'\n'.request('addressOfResidence.city').'\n'.request('addressOfResidence.state').','.request('addressOfResidence.zip').'\n'.request('addressOfResidence.country')),
            'topmostSubform[0].Page1[0].f1_08[0]' => strtoupper(request('address.street').'\n'.request('address.city').'\n'.request('address.state').' '.request('address.zip')),
            'topmostSubform[0].Page1[0].f1_09[0]' => strtoupper(request('form8843.firstEnter.visa').' '.request('form8843.firstEnter.date')),
            'topmostSubform[0].Page1[0].f1_11[0]' => request('form8843.currentVisa').' '.request('form8843.changeDate').' '.request('form8843.previousVisa'),
            'topmostSubform[0].Page1[0].f1_12[0]' => request('personal.citizen'),
            'topmostSubform[0].Page1[0].f1_13[0]' => request('personal.citizen'),
            'topmostSubform[0].Page1[0].f1_14[0]' => request('personal.passport'),
            'topmostSubform[0].Page1[0].f1_15[0]' => isset(request('form8843.yearDays')[date('Y')])? request('form8843.yearDays')[date('Y')]['number'] : 0,
            'topmostSubform[0].Page1[0].f1_16[0]' => isset(request('form8843.yearDays')[date('Y')-1])? request('form8843.yearDays')[date('Y')-1]['number'] : 0,
            'topmostSubform[0].Page1[0].f1_17[0]' => isset(request('form8843.yearDays')[date('Y')-2])? request('form8843.yearDays')[date('Y')-2]['number'] : 0,
            'topmostSubform[0].Page1[0].f1_18[0]' => isset(request('form8843.yearDays')[date('Y')])? request('form8843.yearDays')[date('Y')]['number'] : 0,
            'topmostSubform[0].Page1[0].f1_19[0]' => '',
            'topmostSubform[0].Page1[0].f1_20[0]' => request('form8843.typeData.teacher.name').' '.request('form8843.typeData.teacher.address').' '.request('form8843.typeData.teacher.phone'),
            'topmostSubform[0].Page1[0].f1_21[0]' => '',
            'topmostSubform[0].Page1[0].f1_22[0]' => '',
            'topmostSubform[0].Page1[0].f1_23[0]' => request('form8843.typeData.trainee.name').' '.request('form8843.typeData.trainee.address').' '.request('form8843.typeData.trainee.phone'),
            'topmostSubform[0].Page1[0].f1_24[0]' => '',
            'topmostSubform[0].Page1[0].f1_25[0]' => isset(request('form8843.yearDays')[date('Y')-5])? request('form8843.yearDays')[date('Y')-5]['type'] : '',
            'topmostSubform[0].Page1[0].f1_26[0]' => isset(request('form8843.yearDays')[date('Y')-4])? request('form8843.yearDays')[date('Y')-4]['type'] : '',
            'topmostSubform[0].Page1[0].f1_27[0]' => isset(request('form8843.yearDays')[date('Y')-3])? request('form8843.yearDays')[date('Y')-3]['type'] : '',
            'topmostSubform[0].Page1[0].f1_28[0]' => isset(request('form8843.yearDays')[date('Y')-2])? request('form8843.yearDays')[date('Y')-2]['type'] : '',
            'topmostSubform[0].Page1[0].f1_29[0]' => isset(request('form8843.yearDays')[date('Y')-1])? request('form8843.yearDays')[date('Y')-1]['type'] : '',
            'topmostSubform[0].Page1[0].f1_30[0]' => isset(request('form8843.yearDays')[date('Y')])? request('form8843.yearDays')[date('Y')]['type'] : '',
            'topmostSubform[0].Page1[0].c1_01[0]' => '',
            'topmostSubform[0].Page1[0].c1_01[1]' => 2,
            'topmostSubform[0].Page1[0].f1_31[0]' => '',
            'topmostSubform[0].Page1[0].f1_32[0]' => request('form8843.typeData.student.name1').' '.request('form8843.typeData.student.address1').' '.request('form8843.typeData.student.phone1'),
            'topmostSubform[0].Page1[0].f1_33[0]' => '',
            'topmostSubform[0].Page1[0].f1_34[0]' => '',
            'topmostSubform[0].Page1[0].f1_35[0]' => request('form8843.typeData.student.name2').' '.request('form8843.typeData.student.address2').' '.request('form8843.typeData.student.phone2'),
            'topmostSubform[0].Page1[0].f1_36[0]' => '',
            'topmostSubform[0].Page1[0].f1_37[0]' => isset(request('form8843.yearDays')[date('Y')-5])? request('form8843.yearDays')[date('Y')-5]['type'] : '',
            'topmostSubform[0].Page1[0].f1_38[0]' => isset(request('form8843.yearDays')[date('Y')-4])? request('form8843.yearDays')[date('Y')-4]['type'] : '',
            'topmostSubform[0].Page1[0].f1_39[0]' => isset(request('form8843.yearDays')[date('Y')-3])? request('form8843.yearDays')[date('Y')-3]['type'] : '',
            'topmostSubform[0].Page1[0].f1_40[0]' => isset(request('form8843.yearDays')[date('Y')-2])? request('form8843.yearDays')[date('Y')-2]['type'] : '',
            'topmostSubform[0].Page1[0].f1_41[0]' => isset(request('form8843.yearDays')[date('Y')-1])? request('form8843.yearDays')[date('Y')-1]['type'] : '',
            'topmostSubform[0].Page1[0].f1_42[0]' => isset(request('form8843.yearDays')[date('Y')])? request('form8843.yearDays')[date('Y')]['type'] : '',
            'topmostSubform[0].Page1[0].c1_02[0]' => '',
            'topmostSubform[0].Page1[0].c1_02[1]' => 2,
            'topmostSubform[0].Page1[0].c1_03[0]' => '',
            'topmostSubform[0].Page1[0].c1_03[1]' => 2,
            'topmostSubform[0].Page1[0].f1_43[0]' => '',
            'topmostSubform[0].Page1[0].f1_44[0]' => '',
            'topmostSubform[0].Page1[0].f1_45[0]' => '',
            'topmostSubform[0].Page2[0].f2_01[0]' => '',
            'topmostSubform[0].Page2[0].f2_02[0]' => request('form8843.typeData.athletes.name').' '.request('form8843.typeData.athletes.date'),
            'topmostSubform[0].Page2[0].f2_03[0]' => '',
            'topmostSubform[0].Page2[0].f2_04[0]' => request('form8843.typeData.athletes.ID'),
            'topmostSubform[0].Page2[0].f2_05[0]' => '',
            'topmostSubform[0].Page2[0].f2_06[0]' => '',
            'topmostSubform[0].Page2[0].f2_07[0]' => '',
            'topmostSubform[0].Page2[0].f2_08[0]' => request('form8843.typeData.individual.description'),
            'topmostSubform[0].Page2[0].f2_09[0]' => '',
            'topmostSubform[0].Page2[0].f2_10[0]' => '',
            'topmostSubform[0].Page2[0].f2_11[0]' => request('form8843.typeData.individual.date1'),
            'topmostSubform[0].Page2[0].f2_12[0]' => request('form8843.typeData.individual.date2'),
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
