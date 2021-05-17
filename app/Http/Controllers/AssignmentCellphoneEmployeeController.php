<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AssignmentCellphoneEmployee;
use App\Cellphone;
use App\Employee;

class AssignmentCellphoneEmployeeController extends Controller
{
    public function index()
    {
        $assignments=AssignmentCellphoneEmployee::orderBy('id','asc')
            ->with(['cellphone','employee'])
            ->paginate(10);
        //return $assignments;
        return view('assignments.index',['assignments'=>$assignments]);
    }
    public function create()
    {   $assignment=new AssignmentCellphoneEmployee();
        $cellphones=Cellphone::where('status','<>',1)->get();
        $employees=Employee::all();
        return view('assignments.create',compact('cellphones','employees','assignment'));
    }
    public function store(Request $request)
    {

        AssignmentCellphoneEmployee::create([
            'cellphone_id' => $request->cellphone_id,
            'employee_id' => $request->employee_id,
            'status' => $request->status,
            'note'=>$request->note
        ]);
        $cell=Cellphone::find($request->cellphone_id);
        $cell->update(['status'=>1]);
        return redirect("/assignments");    
    }
    public function show($id)
    {
       $assignment=AssignmentCellphoneEmployee::where('id',$id)->with(['cellphone','employee'])->get();
       return view('assignments.show',compact('assignment'));
        
    }
   public function update($id)
   {
       $assignment=AssignmentCellphoneEmployee::find($id);
       $assignment->update([
           'status'=>request('status'),
           'note'=>request('note')
           ]);
       //$cell=Cellphone::find($assignment->cellphone_id);
       //$cell->update(['status'=>2]);
       return redirect()->route('assignments.show',$assignment);
   }
   public function download($id)
   {
    $assignment=AssignmentCellphoneEmployee::where('id',$id)->with(['cellphone','employee'])->get();
       
    try {
            $template = new \PhpOffice\PhpWord\TemplateProcessor('docs\acuerdo_cell.docx');
            $assignment=AssignmentCellphoneEmployee::find($id);//where('id',$id)->with(['cellphone','employee'])->get();
            $template->setValue('name',$assignment->employee->employee_name);
            $template->setValue('job_title',$assignment->employee->job_title);
            $template->setValue('model',$assignment->cellphone->model);
            $template->setValue('company',$assignment->cellphone->company->company_name);
            $template->setValue('department',$assignment->employee->department->department_name);
            $template->setValue('number',$assignment->cellphone->number->number);
            $template->setValue('data_plan',$assignment->cellphone->number->data_plan);
            $template->setValue('imei',$assignment->cellphone->imei);
            $template->setValue('legal_representative',$assignment->cellphone->company->company_name=='PUBLIMAGEN'?'Orlando LLovera':'Juan Gilberto Cañas');
            $template->setValue('brand',$assignment->cellphone->brand);
            $template->setValue('note',$assignment->note);
            $tempFile = tempnam(sys_get_temp_dir(),'PHPWord');
            $template->saveAs($tempFile);
        
            $headers = [
                "Content-Type: application\octet-stream",
            ];
            return response()->download($tempFile,$assignment->employee->employee_name.'.docx',$headers)->deleteFileAfterSend(true);
        
        } catch (\PhpOffice\PhpWord\Exception\Exception $e) {
            return back($e->getCode());
        } 
   }
   public function edit($id)
   {
       $employees=Employee::all();
       $cellphones = Cellphone::all();
        $assignment = AssignmentCellphoneEmployee::find($id);
        return view('/assignments/edit',compact('assignment','employees','cellphones'));
   }
}
