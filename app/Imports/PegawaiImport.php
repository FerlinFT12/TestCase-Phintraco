<?php

namespace App\Imports;

use App\Models\Pegawai;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class PegawaiImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $parent_uuid = $row[0];
        $company_id = $row[1];
        $department_code = $row[2];
        $name = $row[3];
        $email = $row[4];
        $empl_id = $row[5];
        $join_date = $row[6];
        $ext_no = $row[7];
        
        $data = [
            'parent_uuid' => $parent_uuid,
            'company_id' => $company_id,
            'department_code' => $department_code,
            'name' => $name,
            'email' => $email,
            'empl_id' => $empl_id,
            'join_date' => $join_date,
            'ext_no' => $ext_no
        ];
        return new Pegawai($data);
    }
}