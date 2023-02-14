<?php

namespace App\Http\Controllers;

use App\Models\Presensi;
use App\Models\Perusahaan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stevebauman\Location\Facades\Location;
use DataTables;

class PresensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perusahaan = Perusahaan::all();
        $data = [
            'title' => 'Presensi Anda',
            'title2' => 'Maps Anda dan Maps Perusahaan',
            'perusahaan' => $perusahaan
        ];

        return view('presensi.index3', $data);

        // return view('presensi.geolocation');
        // return view('presensi.maps3chatgpt');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $latitude = $request->latitudegeo;
        $longitude = $request->longitudegeo;

        // echo "Lat : ".$latitude.", Long : ".$longitude;
        $data = [
            'date' => date('Y-m-d'),
            'date_in' => date('Y-m-d'),
            'time_in' => date('H:i:s'),
            'latitude_in' => $latitude,
            'longitude_in' => $longitude,
        ];

        // dd($data);
        $create = Presensi::create($data);

        if($create) {
            return redirect()->back()
                ->with('success', 'Created successfully!');
        }

        // dd($data);
        
        // return view('presensi.checklocation', $data);
        
        // echo Auth::id();
        
        // return view('presensi.geolocation');
        // $ip = $request()->ip();
        // $data = \Location::get($ip);
        // echo $data['countryName'];

        // return json_encode($data);

        // echo $data->countryName;
        // $data = [
        //     'name' => $request->name,
        //     'description' => $request->description,
        //     'start_at' => $request->start_at,
        //     'finish_at' => $request->finish_at,
        // ];
        
        // $create = Project::create($data);
        // if($create) {
        //     return redirect()->route('project.index')
        //             ->with(['success' => 'Data Project Berhasil Ditambah!']);

        // } else {
        //     return redirect()->back()
        //         ->withInput()
        //         ->with(['error' => 'Data Project Gagal Ditambah, Silahkan Ulangi!']);
        // }
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

    public function radiuscheck() {
        return view('presensi.radius');
    }

    public function geo() {
        $data = [
            'title' => 'Presensi Masuk',
            'isi' => 'presensi.geo'
        ];

        return view('layouts.wrapper', $data);
    }

    public function maps() {
        return view('presensi.maps');
    }
}
