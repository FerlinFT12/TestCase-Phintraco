<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Project;
use \Yajra\Datatables\Datatables;

class ProjectController extends Controller
{
    public function showprojects() {
        $project = Project::query();
        return DataTables::of($project)
            ->addColumn('aksi', function(Project $project) {
                $button = "<a class='btn btn-warning' href='".route('project.edit', $project->id)."'><i class='fas fa-edit'></i></a>";

                $button .= "<form method='POST' action='".route('project.destroy', $project->id)."'>";
                $button .= "<input type='hidden' name='_token' value='".csrf_token()."'><input type='hidden' name='_method' value='DELETE'>";
                $button .= "<button class='btn btn-danger' type='submit'><i class='fas fa-trash'></i></button>";
                $button .= "</form>";
                return $button;
            })
            ->rawColumns(['aksi'])
            ->toJson();
    }

    public function index()
    {
        $data = [
            'title' => 'List Project',
            'isi' => 'project.index'
        ];

        return view('layouts.wrapper', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Tambah Project',
            'isi' => 'project.create',
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
            'name' => 'required|min:3',
            'description' => 'required',
            'start_at' => 'required',
            'finish_at' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'start_at' => $request->start_at,
            'finish_at' => $request->finish_at,
        ];
        
        $create = Project::create($data);
        if($create) {
            return redirect()->route('project.index')
                    ->with(['success' => 'Data Project Berhasil Ditambah!']);

        } else {
            return redirect()->back()
                ->withInput()
                ->with(['error' => 'Data Project Gagal Ditambah, Silahkan Ulangi!']);
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
        $project = Project::find($id);

        $data = [
            'title' => 'Edit Project',
            'isi' => 'project.edit',
            'project' => $project,
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
            'description' => 'required',
            'start_at' => 'required',
            'finish_at' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'start_at' => $request->start_at,
            'finish_at' => $request->finish_at,
        ];
        
        $project = Project::find($id);
        $update = $project->update($data);
        if($update) {
            return redirect()->route('project.index')
                    ->with(['success' => 'Data Project Berhasil Diperbaharui!']);

        } else {
            return redirect()->back()
                ->withInput()
                ->with(['error' => 'Data Project Gagal Diperbaharui, Silahkan Ulangi!']);
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
        $delete = Project::find($id)->delete();
        if($delete) {
            return redirect()->route('project.index')
                    ->with(['success' => 'Data Project Berhasil Dihapus!']);

        } else {
            return redirect()->back()
                ->withInput()
                ->with(['error' => 'Data Project Gagal Dihapus, Silahkan Ulangi!']);
        }
    }
    public function import() {
        echo "tes";
    }
}
