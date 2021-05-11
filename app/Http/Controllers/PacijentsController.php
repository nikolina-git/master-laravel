<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pacijent;

class PacijentsController extends Controller
{
    public function index(){

        $pacijents=auth()->user()->pacijents();
        return view('dashboard', compact('pacijents'));
    }

    public function add(){

       
        return view('add');
    }

    public function create(Request $request){

       $this->validate($request,[
           'description'=>'required'
       ]);
       $pacijent=new Pacijent();
       $pacijent->name_and_surname=$request->name_and_surname;
       $pacijent->description=$request->description;
       $pacijent->user_id=auth()->user()->id;
       $pacijent->save();

       return redirect('/dashboard');
        
    }

    public function edit(Pacijent $pacijent){

        if(auth()->user()->id==$pacijent->user_id){
            return view('edit', compact('pacijent'));

        }else{
            return redirect('/dashboard');
        }
         
     }

     public function update(Request $request, Pacijent $pacijent){

       if(isset($_POST['delete'])){
           $pacijent->delete();
           return redirect('/dashboard');

       }else{
           $this->validate($request,[
            'name_and_surname'=>'required',
               'description'=>'required'
           ]);
           $pacijent->name_and_surname=$request->name_and_surname;
           $pacijent->description=$request->description;
      
       $pacijent->save();
       return redirect('/dashboard');

       }
         
     }
}
