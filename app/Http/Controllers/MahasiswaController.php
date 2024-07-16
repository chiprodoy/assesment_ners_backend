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
use Illuminate\Support\Facades\Auth;

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
        $user = Auth::user();
        if($user->dosen()->count() > 0){
            $dosen = $this->model::where('dosen_id',$user->dosen->id);
        }else{
            $dosen = $this->setRecord();
        }
        return MahasiswaResource::collection($dosen->get());
    }

    public function show(String $uuid){
        $mhs=$this->model::where('uuid',$uuid)->firstOrFail();
        return MahasiswaResource::collection($mhs);

    }

    public function store(MahasiswaRequest $request){
        $validatedMhs = $request->safe()->except(['telepon', 'email']);
        $validateUser = $request->safe()->only(['telepon', 'email']);

        $validateUser['uuid']='-';
        $validateUser['name']=$validatedMhs['nama'];
        $validateUser['nidn_npm']=$validatedMhs['npm'];
        $validateUser['password']='password';

        $validatedMhs['uuid']='-';
        $validatedMhs['dosen_id']=Auth::user()->dosen->id;

        //dd($validatedMhs);

        $userSave=User::create($validateUser);
        $user = User::where('email',$validateUser['email'])->first();
        // attach role mahasiswa
        $user->roles()->attach(1);

        $dataSave=$user->mahasiswa()->create($validatedMhs);
        $mhs = Mahasiswa::where('npm',$validatedMhs['npm'])->get();

        if($dataSave && $userSave){
            return MahasiswaResource::collection($mhs);
        }
    }

    public function update(MahasiswaRequest $request,$user_id=null){
        $validatedMhs = $request->safe()->except(['telepon', 'email']);
        $validateUser = $request->safe()->only(['telepon', 'email']);

        $validateUser['name']=$validatedMhs['nama'];
        $validateUser['nidn_npm']=$validatedMhs['npm'];

        if(empty($user_id)){
            $user_id=Auth::user()->id;
        }

        $qry =$this->model::where('user_id',$user_id);
        $dataSave=$qry->update($validatedMhs);

        $userSave=User::find($user_id)->update($validateUser);

        if($dataSave && $userSave){
            return MahasiswaResource::collection($qry->get());
        }
    }

    public function destroy(String $id){
        $mhs=Mahasiswa::where('uuid',$id)->first();
        $user=User::find($mhs->user_id);
        $user->delete();
        $deletedMhs=$mhs->delete();

    }
}
