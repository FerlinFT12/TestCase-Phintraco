<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Imports\UsersImport;
use Illuminate\Support\Facades\Auth;
use \Yajra\Datatables\Datatables;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{

    public function importuser() {
        $data = [
            'title' => 'Import Data User',
        ];

        return view('user.importuser', $data);
    }

    public function prosesimportuser(Request $request) {
        Excel::import(new UsersImport, $request->fileuser);
        return redirect()->route('user.index')
        ->with(['success' => 'Data User Berhasil Diimport!']);
    }

    public function showuser() {
        $user = User::query();
        $id = 1;
        return DataTables::of($user)
            ->addColumn('aksi',function(User $user) {
                $button = "<div><a class='btn btn-warning' href='".route('user.edit',$user->id)."'><i class='fas fa-edit'></i> </a></div>";

                $button .= "<div>";
                $button .= "<form method='POST' action='".route('user.destroy',$user->id)."'>";
                $button .= "<input type='hidden' name='_token' value='".csrf_token()."'><input type='hidden' name='_method' value='DELETE'>";
                $button .= "<button class='btn btn-danger' type='submit'><i class='fas fa-trash'></i> </button>";
                $button .= "</form>";
                $button .= "</div>";
                return $button;
            })
            ->rawColumns(['aksi'])
            ->toJson();
    }

    public function index()
    {
        $data = [
            'title' => 'List User', 
        ];

        return view('user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Create User',
            'isi' => 'user.create',
        ];

        return view('layouts.wrapper', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|min:3',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ];
        
        $create = User::create($data);
        if($create) {
            return redirect()->route('user.index')
                    ->with(['success' => 'Data User Berhasil Ditambah!']);

        } else {
            return redirect()->back()
                ->withInput()
                ->with(['error' => 'Data User Gagal Ditambah, Silahkan Ulangi!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        $data = [
            'title' => 'Edit User',
            'isi' => 'user.edit',
            'user' => $user,
        ];

        return view('layouts.wrapper', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|min:3',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ];
        
        $user = User::find($id);
        $update = $user->update($data);
        if($update) {
            return redirect()->route('user.index')
                    ->with(['success' => 'Data User Berhasil Diperbaharui!']);

        } else {
            return redirect()->back()
                ->withInput()
                ->with(['error' => 'Data User Gagal Diperbaharui, Silahkan Ulangi!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = User::find($id)->delete();
        if($delete) {
            return redirect()->route('user.index')
                    ->with(['success' => 'Data User Berhasil Dihapus!']);

        } else {
            return redirect()->back()
                ->withInput()
                ->with(['error' => 'Data User Gagal Dihapus, Silahkan Ulangi!']);
        }
    }

}
