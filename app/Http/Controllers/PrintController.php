<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Siswa;
use Barryvdh\DomPDF\Facade\Pdf;

class PrintController extends Controller
{

    public function UserIndex(){
        $users = User::paginate(8);
        return view ('kepsek.indexuser', compact('users'));
    }

    public function SiswaIndex(){
        $siswa = Siswa::paginate(8);
        return view ('kepsek.indexsiswa', compact('siswa'));
    }


    public function DownloadUserPDF(){
        $users = User::all()->toArray();

        view()->share('users', $users);

        $pdf = Pdf::loadview('kepsek.print', $users);

        return $pdf->download('datauser.pdf');
    }


    public function DownloadSiswaPDF(){

        $siswa = Siswa::all()->toArray();

        view()->share('siswa', $siswa);

        $pdf = Pdf::loadview('kepsek.printsiswa', $siswa);

        return $pdf->download('datasiswa.pdf');
    }
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
