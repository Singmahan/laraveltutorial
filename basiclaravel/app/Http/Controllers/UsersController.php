<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use PDF;

class UsersController extends Controller
{

    public function index()
    {
        // select ข้อมูลจากฐานข้อมูลมาแสดง
        // $users = User::all() -> toArray(); แสดงข้อมูลแบบปกติ ไม่แบ่งหน้า
        // แสดงข้อมูลแบบแบ่งหน้า
        $users = User::paginate(5);
        return view ('user.index', compact('users'));
    }

    // PDF
    public function downloadPDF($id){
        $user = User::find($id);
        $view=\View::make('user.pdf',compact('user'));
        $html = $view->render();
        $pdf = new PDF();
        $pdf::SetTitle('รายงาน');
        $pdf::AddPage();
        $pdf::WriteHTML($html,true,false,true,false);
        $pdf::Output('report.pdf');
    }

    public function create()
    {
        return view ('user.create');
    }
    // บันทึกข้อมูล
    public function store(Request $request)
    {
         $this->validate($request, ['fname' => 'required','lname' => 'required']);
         $user = new User(
             [
                 'fname' => $request->get('fname'),
                 'lname' => $request->get('lname')
             ]);
         $user->save();
         return redirect()->route('user.index')->with('success', 'บันทึกข้อมูลเรียบร้อย');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit', compact('user','id'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,
        [
            'fname' => 'required',
            'lname' => 'required'
        ]);

        $user = User::find($id);
        $user -> fname = $request -> get('fname');
        $user -> lname = $request -> get('lname');
        $user -> save();
        return redirect() -> route('user.index') -> with('success', 'อัพเดทข้อมูลเรียบร้อย');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'ลบข้อมูลสำเร็จ');
    }
}
