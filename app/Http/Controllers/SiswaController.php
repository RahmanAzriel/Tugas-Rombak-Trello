<?php

namespace App\Http\Controllers;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SiswasExport;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function ExportExcel() {
        return Excel::download(new SiswasExport, 'DataSiswa.xlsx');
    }




    public function index(Request $request)
    {
        //
        $query = $request->input('search');
        $siswa = Siswa::when($query, function($queryBuilder) use ($query) {
            return $queryBuilder->where('name', 'like', "%{$query}%")
                ->orWhere('email', 'like', "%{$query}%");
        })->paginate(10);

        return view('siswa.index', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'nis' => 'required',
            'rombel' => 'required',
            'kelas' => 'required',
            'rayon' => 'required',
            'password' => 'required'
        ], [
            'name.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'nis.required' => 'NIS harus diisi',
            'rombel.required' => 'Rombel harus diisi',
            'kelas.required' => 'Kelas harus diisi',
            'rayon.required' => 'Rayon harus diisi',
            'password.required' => 'Password harus diisi'
        ]
        );

        Siswa::create([
            'name' => $request->name,
            'email' => $request->email,
            'nis' => $request->nis,
            'rombel' => $request->rombel,
            'kelas' => $request->kelas,
            'rayon' => $request->rayon,
            'password' => $request->password
        ]);
        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil ditambahkan');

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
        $siswa = Siswa::where('id', $id)->first();
        return view('Siswa.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'nis' => 'required',
            'rombel' => 'required',
            'kelas' => 'required',
            'rayon' => 'required',
            'password' => 'required'
        ], [
            'name.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'nis.required' => 'NIS harus diisi',
            'rombel.required' => 'Rombel harus diisi',
            'kelas.required' => 'Kelas harus diisi',
            'rayon.required' => 'Rayon harus diisi',
            'password.required' => 'Password harus diisi'
        ]
        );
        Siswa::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'nis' => $request->nis,
            'rombel' => $request->rombel,
            'kelas' => $request->kelas,
            'rayon' => $request->rayon,
            'password' => $request->password
        ]);
        return redirect()->route('siswa.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Siswa::where('id', $id)->delete();
        return redirect()->route('siswa.index')->with('success', 'Data berhasil dihapus');
    }
}
