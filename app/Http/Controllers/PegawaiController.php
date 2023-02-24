<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Pegawai;
use App\Imports\PegawaiImport;
use \Yajra\Datatables\Datatables;
use Maatwebsite\Excel\Facades\Excel;

class PegawaiController extends Controller
{
    public function importpegawai() {
        $data = [
            'title' => 'Import Data Pegawai',
        ];
        return view('pegawai.importpegawai', $data);
    }

    public function prosesimportpegawai(Request $request) {
        $data = Excel::toArray(new PegawaiImport, $request->file);
        foreach($data[0] as $row) {
            Pegawai::updateorCreate([
                'empl_id' => $row[5]
            ], [
                'parent_uuid' => $row[0],
                'company_id' => $row[1],
                'department_code' => $row[2],
                'name' => $row[3],
                'email' => $row[4],
                'empl_id' => $row[5],
                'join_date' => $row[6],
                'ext_no' => $row[7]
            ]);
        }
        return redirect()->route('pegawai.index')
        ->with(['success' => 'Data Pegawai Berhasil Diimport!']);
    }

    public function showpegawai() {
        $pegawai = Pegawai::query();
        return DataTables::of($pegawai)
            ->addColumn('aksi', function(Pegawai $pegawai) {
                $button = "<a class='btn btn-warning' href='".route('pegawai.edit', $pegawai->uuid)."'><i class='fas fa-edit'></i></a>";

                $button .= "<form method='POST' action='".route('pegawai.destroy', $pegawai->uuid)."'>";
                $button .= "<input type='hidden' name='_token' value='".csrf_token()."'><input type='hidden' name='_method' value='DELETE'>";
                $button .= "<button class='btn btn-danger' type='submit'><i class='fas fa-trash'></i></button>";
                $button .= "</form>";
                return $button;
            })
            ->rawColumns(['aksi'])
            ->toJson();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'List Pegawai',
        ];

        return view('pegawai.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Tambah Data Pegawai',
        ];

        return view('pegawai.create', $data);
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
            'uuid' => 'required',
            'parent_uuid' => 'required',
            'company_id' => 'required',
            'department_code' => 'required',
            'name' => 'required',
            'email' => 'required',
            'empl_id' => 'required',
            'join_date' => 'required',
            'ext_no' => 'required'
        ]);

        $data = [
            'uuid' => $request->uuid,
            'parent_uuid' => $request->parent_uuid,
            'company_id' => $request->company_id,
            'department_code' => $request->department_code,
            'name' => $request->name,
            'email' => $request->email,
            'empl_id' => $request->empl_id,
            'join_date' => $request->join_date,
            'ext_no' =>$request->ext_no,
        ];
        
        $create = Pegawai::create($data);
        if($create) {
            return redirect()->route('pegawai.index')
                    ->with(['success' => 'Data Pegawai Berhasil Ditambah!']);

        } else {
            return redirect()->back()
                ->withInput()
                ->with(['error' => 'Data Pegawai Gagal Ditambah, Silahkan Ulangi!']);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function cthpegawai() {
        $pgw = Pegawai::where('empl_id', '2230201061-FET')->first();
        // echo $pgw->empl_id;
        echo json_encode($pgw);
    }


}
