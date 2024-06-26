<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{

    public $model;
    public $record;
    public $defaultOrderKey='id';
    public $defaultOrderSort='asc';

    public function setRecord()
    {
        $this->record=$this->model::orderBy($this->defaultOrderKey,$this->defaultOrderSort);
    }

    public function getRecord()
    {
        return $this->record;
    }

    public function saveRecord($data){
        $rec = $this->model::create($data);
        return $rec;
    }

    public function updateRecord($data){
        $rec = $this->model->update($data);
        return $rec;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $req,string $id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function errorResponse($errorCode,$errorMsg){
        return response([
            'status' => 'Error',
            'code' => $errorCode,
            'message' => $errorMsg
        ],$errorCode);
    }
}
