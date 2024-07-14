<?php

namespace App\Http\Controllers;

use App\Http\Resources\DosenResource;
use App\Http\Resources\MahasiswaResource;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user=Auth::user();
        if($user->mahasiswa()->count() > 0){
            return MahasiswaResource::collection($user->mahasiswa()->get());
        }else{
            return DosenResource::collection($user->dosen()->get());
        }

    }

    public function resetPassword(Request $request){
        $userID=Auth::user()->id;
        $qry = User::where('id',$userID);
        $update = $qry->update($request->only('password'));
        if($update){
            return response('Berhasil reset password');
        }

        return response('gagal reset password',500);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
