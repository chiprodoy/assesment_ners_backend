<?php

namespace App\Http\Controllers;

use App\Http\Requests\DosenRequest;
use App\Http\Resources\DosenResource;
use App\Models\Dosen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DosenController extends MainController
{
    public $model = Dosen::class;

    /**
     * Asesmen
     *
     * Get Asesmen data
     * @authenticated
     */
    public function index(){
        $this->setRecord();
        return DosenResource::collection($this->record->get());
    }

    public function store(DosenRequest $request){
        $validatedDosen = $request->safe()->except(['telepon', 'email','password']);
        $validateUser = $request->safe()->only(['telepon', 'email','password']);

        $validateUser['uuid']='-';
        $validateUser['name']=$validatedDosen['nama'];
        $validateUser['nidn_npm']=$validatedDosen['nidn'];
        $validateUser['password'] = $request->password;

        $userSave=User::create($validateUser);
        $user = User::where('email',$validateUser['email'])->first();
        //create role dosen;
        $user->roles()->attach(2);

        $dataSave=$user->dosen()->create($validatedDosen);
        $dosen = Dosen::where('nidn',$validatedDosen['nidn'])->get();

        if($dataSave && $userSave){
            return DosenResource::collection($dosen);
        }
    }

    public function update(DosenRequest $request,$user_id=null){

        if(empty($user_id)){
            $user_id=Auth::user()->id;
        }

        $validatedDosen = $request->safe()->except(['telepon', 'email','password']);
        $validateUser = $request->safe()->only(['telepon', 'email','password']);

        $validateUser['name']=$validatedDosen['nama'];
        $validateUser['nidn_npm']=$validatedDosen['nidn'];

        $qry =$this->model::where('user_id',$user_id);
        $dataSave=$qry->update($validatedDosen);
        //$dataSave=$this->updateRecord($validatedDosen);
        if($dataSave)
        $userSave=User::find($user_id)->update($validateUser);

        if($dataSave && $userSave){
            return DosenResource::collection($qry->get());
        }
    }
}
