<?php

namespace App\Http\Controllers;

use App\Http\Requests\DosenRequest;
use App\Http\Resources\DosenResource;
use App\Models\Dosen;
use App\Models\User;
use Illuminate\Http\Request;

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

        $userSave=User::create($validateUser);
        $user = User::where('email',$validateUser['email'])->first();

        $dataSave=$user->dosen()->create($validatedDosen);
        $dosen = Dosen::where('nidn',$validatedDosen['nidn'])->get();

        if($dataSave && $userSave){
            return DosenResource::collection($dosen);
        }
    }
}
