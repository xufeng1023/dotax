<?php

namespace App\Http\Controllers;

use App\PdfForm;

class HomeController extends Controller
{
    private $year;

    public function __construct()
    {
        $this->year = now()->subyear()->format('Y');
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

    public function generate8843()
    {
        $data = [
            'topmostSubform[0].Page1[0].Pg1Header[0].f1_01[0]' => '',
            'topmostSubform[0].Page1[0].Pg1Header[0].f1_02[0]' => '',
            'topmostSubform[0].Page1[0].Pg1Header[0].f1_03[0]' => '',
            'topmostSubform[0].Page1[0].f1_04[0]' => strtoupper(request('personal.firstName')),
            'topmostSubform[0].Page1[0].f1_05[0]' => strtoupper(request('personal.lastName')),
            'topmostSubform[0].Page1[0].f1_06[0]' => request('personal.ssn'),
            'topmostSubform[0].Page1[0].f1_07[0]' => strtoupper(request('addressOfResidence.street')).'\n'.strtoupper(request('addressOfResidence.city')).'\n'.strtoupper(request('addressOfResidence.state')).','.strtoupper(request('addressOfResidence.zip')).'\n'.strtoupper(request('addressOfResidence.country')),
            'topmostSubform[0].Page1[0].f1_08[0]' => strtoupper(request('address.street')).'\n'.strtoupper(request('address.city')).'\n'.strtoupper(request('address.state')).' '.strtoupper(request('address.zip')),
            'topmostSubform[0].Page1[0].f1_09[0]' => strtoupper(request('form8843.firstEnter.visa').' '.request('form8843.firstEnter.date')),
            'topmostSubform[0].Page1[0].f1_11[0]' => strtoupper(request('form8843.currentVisa').' '.request('form8843.changeDate').' '.request('form8843.previousVisa')),
            'topmostSubform[0].Page1[0].f1_12[0]' => strtoupper(request('personal.citizen')),
            'topmostSubform[0].Page1[0].f1_13[0]' => strtoupper(request('personal.citizen')),
            'topmostSubform[0].Page1[0].f1_14[0]' => strtoupper(request('personal.passport')),
            'topmostSubform[0].Page1[0].f1_15[0]' => isset(request('form8843.yearDays')[$this->year])? request('form8843.yearDays')[$this->year]['number'] : 0,
            'topmostSubform[0].Page1[0].f1_16[0]' => isset(request('form8843.yearDays')[$this->year-1])? request('form8843.yearDays')[$this->year-1]['number'] : 0,
            'topmostSubform[0].Page1[0].f1_17[0]' => isset(request('form8843.yearDays')[$this->year-2])? request('form8843.yearDays')[$this->year-2]['number'] : 0,
            'topmostSubform[0].Page1[0].f1_18[0]' => isset(request('form8843.yearDays')[$this->year])? request('form8843.yearDays')[$this->year]['number'] : 0
        ];
        if(request('form8843.type') == 'teacher' || request('form8843.type') == 'trainee') {
            $data['topmostSubform[0].Page1[0].f1_19[0]'] = '';
            $data['topmostSubform[0].Page1[0].f1_20[0]'] = strtoupper(request('form8843.typeData.teacher.name')).' '.strtoupper(request('form8843.typeData.teacher.address')).' '.strtoupper(request('form8843.typeData.teacher.phone'));
            $data['topmostSubform[0].Page1[0].f1_21[0]'] = '';
            $data['topmostSubform[0].Page1[0].f1_22[0]'] = '';
            $data['topmostSubform[0].Page1[0].f1_23[0]'] = strtoupper(request('form8843.typeData.trainee.name')).' '.strtoupper(request('form8843.typeData.trainee.address')).' '.strtoupper(request('form8843.typeData.trainee.phone'));
            $data['topmostSubform[0].Page1[0].f1_24[0]'] = '';
            $data['topmostSubform[0].Page1[0].f1_25[0]'] = $fi_25 = isset(request('form8843.yearDays')[$this->year-6])? strtoupper(request('form8843.yearDays')[$this->year-6]['type']) : '';
            $data['topmostSubform[0].Page1[0].f1_26[0]'] = $fi_26 = isset(request('form8843.yearDays')[$this->year-5])? strtoupper(request('form8843.yearDays')[$this->year-5]['type']) : '';
            $data['topmostSubform[0].Page1[0].f1_27[0]'] = $fi_27 = isset(request('form8843.yearDays')[$this->year-4])? strtoupper(request('form8843.yearDays')[$this->year-4]['type']) : '';
            $data['topmostSubform[0].Page1[0].f1_28[0]'] = $fi_28 = isset(request('form8843.yearDays')[$this->year-3])? strtoupper(request('form8843.yearDays')[$this->year-3]['type']) : '';
            $data['topmostSubform[0].Page1[0].f1_29[0]'] = $fi_29 = isset(request('form8843.yearDays')[$this->year-2])? strtoupper(request('form8843.yearDays')[$this->year-2]['type']) : '';
            $data['topmostSubform[0].Page1[0].f1_30[0]'] = $fi_30 = isset(request('form8843.yearDays')[$this->year-1])? strtoupper(request('form8843.yearDays')[$this->year-1]['type']) : '';
            $data['topmostSubform[0].Page1[0].c1_01[0]'] = '';
            $data['topmostSubform[0].Page1[0].c1_01[1]'] = 2;
            $data['topmostSubform[0].Page1[0].f1_31[0]'] = '';
        }
        if(request('form8843.type') == 'student') {
            $data['topmostSubform[0].Page1[0].f1_32[0]'] = strtoupper(request('form8843.typeData.student.name1')).', '.strtoupper(request('form8843.typeData.student.address1')).', '.strtoupper(request('form8843.typeData.student.city1')).', '.strtoupper(request('form8843.typeData.student.state1')).', '.strtoupper(request('form8843.typeData.student.zip1')).', '.strtoupper(request('form8843.typeData.student.phone1'));
            $data['topmostSubform[0].Page1[0].f1_33[0]'] = '';
            $data['topmostSubform[0].Page1[0].f1_34[0]'] = '';
            $data['topmostSubform[0].Page1[0].f1_35[0]'] = strtoupper(request('form8843.typeData.student.name2')).', '.strtoupper(request('form8843.typeData.student.address2')).', '.strtoupper(request('form8843.typeData.student.city2')).', '.strtoupper(request('form8843.typeData.student.state2')).', '.strtoupper(request('form8843.typeData.student.zip2')).', '.strtoupper(request('form8843.typeData.student.phone2'));
            $data['topmostSubform[0].Page1[0].f1_36[0]'] = '';
            $data['topmostSubform[0].Page1[0].f1_37[0]'] = isset(request('form8843.yearDays')[$this->year-6])? strtoupper(request('form8843.yearDays')[$this->year-6]['type']) : '';
            $data['topmostSubform[0].Page1[0].f1_38[0]'] = isset(request('form8843.yearDays')[$this->year-5])? strtoupper(request('form8843.yearDays')[$this->year-5]['type']) : '';
            $data['topmostSubform[0].Page1[0].f1_39[0]'] = isset(request('form8843.yearDays')[$this->year-4])? strtoupper(request('form8843.yearDays')[$this->year-4]['type']) : '';
            $data['topmostSubform[0].Page1[0].f1_40[0]'] = isset(request('form8843.yearDays')[$this->year-3])? strtoupper(request('form8843.yearDays')[$this->year-3]['type']) : '';
            $data['topmostSubform[0].Page1[0].f1_41[0]'] = isset(request('form8843.yearDays')[$this->year-2])? strtoupper(request('form8843.yearDays')[$this->year-2]['type']) : '';
            $data['topmostSubform[0].Page1[0].f1_42[0]'] = isset(request('form8843.yearDays')[$this->year-1])? strtoupper(request('form8843.yearDays')[$this->year-1]['type']) : '';
            $data['topmostSubform[0].Page1[0].c1_02[0]'] = '';
            $data['topmostSubform[0].Page1[0].c1_02[1]'] = 2;
            $data['topmostSubform[0].Page1[0].c1_03[0]'] = '';
            $data['topmostSubform[0].Page1[0].c1_03[1]'] = 2;
            $data['topmostSubform[0].Page1[0].f1_43[0]'] = '';
            $data['topmostSubform[0].Page1[0].f1_44[0]'] = '';
            $data['topmostSubform[0].Page1[0].f1_45[0]'] = '';
        }
        if(request('form8843.type') == 'athletes') {
            $data['topmostSubform[0].Page2[0].f2_01[0]'] = '';
            $data['topmostSubform[0].Page2[0].f2_02[0]'] = strtoupper(request('form8843.typeData.athletes.name')).' '.request('form8843.typeData.athletes.date');
            $data['topmostSubform[0].Page2[0].f2_03[0]'] = '';
            $data['topmostSubform[0].Page2[0].f2_04[0]'] = strtoupper(request('form8843.typeData.athletes.ID'));
            $data['topmostSubform[0].Page2[0].f2_05[0]'] = '';
            $data['topmostSubform[0].Page2[0].f2_06[0]'] = '';
        }
        if(request('form8843.type') == 'individual') {
            $data['topmostSubform[0].Page2[0].f2_07[0]'] = '';
            $data['topmostSubform[0].Page2[0].f2_08[0]'] = strtoupper(request('form8843.typeData.individual.description'));
            $data['topmostSubform[0].Page2[0].f2_09[0]'] = '';
            $data['topmostSubform[0].Page2[0].f2_10[0]'] = '';
            $data['topmostSubform[0].Page2[0].f2_11[0]'] = request('form8843.typeData.individual.date1');
            $data['topmostSubform[0].Page2[0].f2_12[0]'] = request('form8843.typeData.individual.date2');
        }
        $data['topmostSubform[0].Page2[0].f2_13[0]'] = '';
        $data['topmostSubform[0].Page2[0].f2_14[0]'] = '';
        $data['topmostSubform[0].Page2[0].f2_15[0]'] = '';
        $data['topmostSubform[0]'] = '';

        $pdf = new PdfForm(public_path('pdf/f8843.pdf'), $data);
        $fileName = 'pdf/f8843-'.str_random(6).'.pdf';
        $pdf->save(public_path($fileName));
        return $fileName;
    }

    public function generate1040nr()
    {
        $data = [
            'form1040-NR[0].Page1[0].f1_26[0]' => round(request('box1')),
            'form1040-NR[0].Page1[0].f1_91[0]' => round(array_sum(request('box17')) + array_sum(request('box19'))),
            'form1040-NR[0].Page2[0].f2_50[0]' => round(request('box2'))
        ];
        $pdf = new PdfForm(public_path('pdf/f1040nr.pdf'), $data);
        $pdf->save(public_path('pdf/f1040nr-edit.pdf'));
    }

    public function fields()
    {
        $pdf = new PdfForm(public_path('pdf/iit.pdf'), []);
        echo '<pre>';
        echo $pdf->fields(true);
    }
}
