<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crud;
use Session;

class CrudController extends Controller
{
    //Show Data
    public function showData(){
         $showData = Crud::simplePaginate(2);
        return view('show_data',compact('showData'));
    }

    //Add Data
    public function addData(){
        return view('add_data');
    }

    public function storeData(Request $request){
        $rules = [
            'name' => 'required|max:10',
            'email' => 'required|email',
        ];

        //Custom Message
        $cm = [
            'name.required'=>'Enter Your name',
            'name.max'=>'Your name can not contain more than 10 carecter',
            'email.required'=>'Enter your email',
            'email.email'=>'Email must be a valid email',
        ];
        $this->validate($request,$rules, $cm );

         $crud = new Crud();
         $crud->name = $request->name;
         $crud->email = $request->email;
         $crud->save();

         //Show message for data saving sucessfully
         Session::flash('msg', 'Data Sucessfully Added');
        return redirect('/');
    }

    public function editeData($id=null){
            $editData= Crud::find($id);
                return view('edit_data',compact('editData'));

    }

    //Update Data
    public function updateData(Request $request,$id){
        $rules = [
            'name' => 'required|max:10',
            'email' => 'required|email',
        ];
        //Custom Message
        $cm = [
            'name.required'=>'Enter Your name',
            'name.max'=>'Your name can not contain more than 10 carecter',
            'email.required'=>'Enter your email',
            'email.email'=>'Email must be a valid email',
        ];
        $this->validate($request,$rules, $cm );

         $crud = Crud::find($id);
         $crud->name = $request->name;
         $crud->email = $request->email;
         $crud->save();

         //Show message for data updating sucessfully
         Session::flash('msg', 'Data Sucessfully Update');

        return redirect('/');
    }

    public function deleteData($id = null){

        $deleteData = Crud :: find($id);
        $deleteData->delete();

        Session::flash('msg', 'Data Sucessfully Deleted');
        return redirect('/');
    }
}
