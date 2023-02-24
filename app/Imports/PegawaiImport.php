<?php

namespace App\Imports;

use App\Models\Pegawai;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PegawaiImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $parent_uuid = $row['parent_uuid'];
        $company_id = $row['company_id'];
        $department_code = $row['department_code'];
        $name = $row['name'];
        $email = $row['email'];
        $empl_id = $row['empl_id'];
        $join_date = $row['join_date'];
        $ext_no = $row['ext_no'];
        
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