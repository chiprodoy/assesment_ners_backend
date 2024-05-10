<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{

    public $model;
    public $record;

    public function setRecord()
    {
        $this->record=$this->model::orderBy('id','desc');
    }

    public function getRecord()
    {
        return $this->record;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function saveRecord($data){
        $rec = $this->model::create($data);
        return $rec;
    }

    public function updateRecord($data){
        $rec = $this->model::update($data);
        return $rec;
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
