<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;


use App\Http\Controllers\API\BaseCOntroller as BaseController;
use Illuminate\Support\Facades\Validator;
use App\Models\Pacijent;
use App\Http\Resources\Pacijent as PacijentResource;

class PacijentController extends BaseController
{
    public function index(){
        $pacijents=Pacijent::all();
        return $this->sendResponse(PacijentResource::collection($pacijents),'Pacijents retrieves succesfuly');
    }

    public function store(Request $request){
        $input=$request->all();
        $validator=Validator::make($input,[
            'name_and_surname'=>'required',
            'description'=>'required',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation error. ', $validator->errors());
        }
        $pacijent=Pacijent::create($input);
        return $this->sendResponse(new PacijentResource($article),'Pacijent je uspesno kreiran');
    }
    public function show($id){
        $pacijent=Pacijent::find($id);
        if(is_null($pacijent)){
            return $this->sendError('Article not found');

        }
        return $this->sendResponse(new PacijentResource($pacijent),'Pacijent successfuly retrieved');
    }

    public function update(Request $request, Pacijent $pacijent){
        $input=$request->all();

        $validator=Validator::make($input,[
            'name_and_surname'=>'required',
            'description'=>'required',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation error. ',$validator->errors());
        }

        $pacijent->name_and_surname=$input['name_and_surname'];

        $pacijent->description=$input['description'];

        $pacijent->save();
        return $this->sendResponse(new PacijentResource($pacijent),'Pacijent successfuly updated');

    }

    public function destroy(Pacijent $pacijent){
     $pacijent->delete();
        return $this->sendResponse([],'Pacijent successfuly deleted');

    }

}
