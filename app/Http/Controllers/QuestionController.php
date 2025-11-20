<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $request->validate([
            'nama'       => 'required|min:5|max:50',
            'email'      => 'required|email',
            'pertanyaan' => 'required|min:10|max:300'
        ], [
            'nama.required' => "Nama Tidah boleh kosong",
            'email.required' => "Email Tidak valid"
        ]);

        $nama       = $request->input('nama');
        $email      = $request->input('email');
        $pertanyaan = $request->input('pertanyaan');

        //return view('home-question-respon', compact('nama', 'email', 'pertanyaan'));
        return redirect()->back()->with('info', "Terimakasih $nama! Pertanyaan Kamu berhasil terkirim, dan akan segera kami tanggapi dan balas melalui $email");

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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
