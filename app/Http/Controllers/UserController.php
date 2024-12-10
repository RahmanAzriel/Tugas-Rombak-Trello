<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     */

     public function ShowRegister(){

        return view('pages.register');
     }

    public function RegisterStore(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ], [
            'name.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'password.required' => 'Password harus diisi'
        ]);
        $lastUser  = User::orderBy('nip', 'desc')->first();
        $newNip = $lastUser  ? $lastUser ->nip + 1 : 1;
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'nip' => $newNip,
            'jabatan' => $request->jabatan,
            'mapel' => $request->mapel,
            'role' => $request->role,
            'password' => bcrypt($request->password)
        ]);

        return redirect()->route('login')->with('success', 'Data berhasil disimpan');
    }

    public function ShowLogin()
    {
        //
        return view('pages.login');
    }


    public function ExportExcel() {
        return Excel::download(new UsersExport, 'DataUser.xlsx');
    }
    public function LoginAuth(Request $request)
    {
        //
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $users = $request->only('email', 'password');
        if (Auth::attempt($users)){
            return redirect()->route('landing.page');
        } else {
            return redirect()->route('login')->with('error', 'Email atau password salah');
        }
    }


    public function logout()
    {
        //
        Auth::logout();
        return redirect()->route('login');
    }
    public function index(Request $request)
    {
        $query = $request->input('search');
        $users = User::when($query, function($queryBuilder) use ($query) {
            return $queryBuilder->where('name', 'like', "%{$query}%")
                ->orWhere('email', 'like', "%{$query}%");
        })->paginate(10);

        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('User.create');
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
            'nip' => 'required',
            'jabatan' => 'required',
            'mapel' => 'required',
            'role' => 'required',
            'password' => 'required'
        ], [
            'name.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'nip.required' => 'NIP harus diisi',
            'jabatan.required' => 'Jabatan harus diisi',
            'mapel.required' => 'Mapel harus diisi',
            'role.required' => 'Role harus diisi',
            'password.required' => 'Password harus diisi'
        ]
        );
        $nipExists = User::where('nip', $request->nip)->exists();
        if ($nipExists) {
            // Jika NIP sudah ada, kembalikan dengan error
            return back()->with('error', 'NIP sudah terdaftar. Silakan coba NIP lain.');
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'nip' => $request->nip,
            'jabatan' => $request->jabatan,
            'mapel' => $request->mapel,
            'role' => $request->role,
            'password' => bcrypt($request->password)
        ]);

        return redirect()->route('user.index')->with('success', 'Data berhasil ditambahkan');
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
        $users = User::where('id', $id)->first();
        return view('User.edit', compact('users'));
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
            'nip' => 'required',
            'jabatan' => 'required',
            'mapel' => 'required',
            'role' => 'required',
            'password' => 'required'
        ], [
            'name.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'nip.required' => 'NIP harus diisi',
            'jabatan.required' => 'Jabatan harus diisi',
            'mapel.required' => 'Mapel harus diisi',
            'role.required' => 'Role harus diisi',
            'password.required' => 'Password harus diisi'
        ]
        );

        User::where($id, 'id')->update([
            'name' => $request->name,
            'email' => $request->email,
            'nip' => $request->nip,
            'jabatan' => $request->jabatan,
            'mapel' => $request->mapel,
            'role' => $request->role,
            'password' => bcrypt($request->password)
        ]);

        return redirect()->route('user.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        User::where('id', $id)->delete();
        return redirect()->route('user.index')->with('success', 'Data berhasil dihapus');
    }
}
