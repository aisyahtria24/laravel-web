<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return "Menampilkan data matakuliah";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return "Menampilkan data matakuliah";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        return "Menampilkan data matakuliah";
    }

    /**
     * Display the specified resource.
     */
    public function show($param1 = null)
    {
        if($param1){
            return 'Anda mengakses matahkuliah'.$param1;
        }else if($param1){
            return 'Masukkan kode matahkuliah';
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        return "Menampilkan data matakuliah";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        return "Menampilkan data matakuliah";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        return "Menampilkan data matakuliah";
    }
}
