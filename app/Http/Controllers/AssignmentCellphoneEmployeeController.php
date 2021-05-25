<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AssignmentCellphoneEmployee;
use App\Cellphone;
use App\Employee;
use Luecano\NumeroALetras\NumeroALetras;

class AssignmentCellphoneEmployeeController extends Controller
{
    public function index()
    {
        $activeAssignments=AssignmentCellphoneEmployee::where('status',1)
            ->with(['cellphone','employee'])
            ->paginate(10);
        $pendingAssignments=AssignmentCellphoneEmployee::where('status',2)
        ->with(['cellphone','employee'])
        ->paginate(10);
        $historyAssignments=AssignmentCellphoneEmployee::where('status',3)
        ->with(['cellphone','employee'])
        ->paginate(10);
        //return $assignments;
        return view('assignments.index',
            compact('activeAssignments','pendingAssignments','historyAssignments')
        );
    }
    public function create()
    {   $assignment=new AssignmentCellphoneEmployee();
        $cellphones=Cellphone::where('status','<>',1)->get();
        $employees=Employee::orderBy('employee_name','asc')->get();
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
   public function update(AssignmentCellphoneEmployee $assignment)
   {
       $assignment->update([
           'status' => request('status'),
           'note' => request('note')  
           ]);
       $assignment->save();
           if (request('status')==3){
            $cell=Cellphone::find($assignment->cellphone_id);
            $cell->update(['status'=>3]);
           }
       return redirect()->route('assignments.show',$assignment);
   }
   public function download($id)
   {
    
    $formatter = new NumeroALetras();
    setlocale(LC_ALL, 'es_ES');
    $date = strtolower($formatter->toWords(date('d'))).' de '.ucwords(strftime('%B')).' del '.strtolower($formatter->toWords(date('Y')));
    $assignment=AssignmentCellphoneEmployee::find($id);  
    try {
        if($assignment->status==3){
            $template = new \PhpOffice\PhpWord\TemplateProcessor('docs\entrega_salida.docx');
            $template->setValue('name',$assignment->employee->employee_name);
            $template->setValue('model',$assignment->cellphone->model.' imei: '.$assignment->cellphone->imei);
            $template->setValue('company',$assignment->cellphone->company->company_name);
            $template->setValue('brand',$assignment->cellphone->brand);
            $template->setValue('status',$assignment->note);
            $template->setValue('accessory',$assignment->cellphone->accesory);
        }else{
            $template = new \PhpOffice\PhpWord\TemplateProcessor('docs\acuerdo_cell.docx');
            
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
            $template->setValue('date',$date);
            $template->setValue('note',$assignment->note);
        }
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
       $employees=Employee::orderBy('employee_name','asc')->get();
       $cellphones = Cellphone::all();
        $assignment = AssignmentCellphoneEmployee::find($id);
        return view('/assignments/edit',compact('assignment','employees','cellphones'));
   }
   
}
