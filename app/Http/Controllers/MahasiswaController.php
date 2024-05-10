<?php

namespace App\Http\Controllers;

use App\Http\Requests\MahasiswaRequest;
use App\Http\Resources\MahasiswaResource;
use App\Http\Resources\MataKuliahResource;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

use function Laravel\Prompts\password;

class MahasiswaController extends MainController
{
    public $model = Mahasiswa::class;

    /**
     * Mata Kuliah
     *
     * Get Mata Kuliah data
     * @authenticated
     */
    public function index(){
        $this->setRecord();
        return MahasiswaResource::collection($this->record->get());
    }

    public function store(MahasiswaRequest $request){
        $validatedMhs = $request->safe()->except(['telepon', 'email']);
        $validateUser = $request->safe()->only(['telepon', 'email']);

        $validateUser['uuid']='-';
        $validateUser['name']=$validatedMhs['nama'];
        $validateUser['nidn_npm']=$validatedMhs['npm'];
        $validateUser['password']='password';

        $userSave=User::create($validateUser);

        $validatedMhs['user_id']=$userSave->id;
        $validatedMhs['uuid']='-';

        $this->saveRecord($validatedMhs);
        $dataSave=Mahasiswa::where('user_id',$userSave->id)->first();

        if($dataSave && $userSave){
            return MahasiswaResource::collection($dataSave);
        }
    }

    public function update(MahasiswaRequest $request){
        $validatedMhs = $request->safe()->except(['telepon', 'email']);
        $validateUser = $request->safe()->only(['telepon', 'email']);

        $dataSave=$this->updateRecord($validatedMhs);

        $userSave=User::find($dataSave->user_id)->update($validateUser);

        if($dataSave && $userSave){
            return MahasiswaResource::collection($dataSave);
        }
    }

    public function destroy(String $id){
        $mhs=Mahasiswa::where('uuid',$id)->first();
        $user=User::find($mhs->user_id);
        $user->delete();
        $deletedMhs=$mhs->delete();

    }
}
