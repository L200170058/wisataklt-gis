<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class WisataModel extends Model
{

    protected $table = 'tbl_wisata';


    public function foto_wisata()
    {
        return $this->hasMany(\App\Models\FotoWisataModel::class, 'id_wisata','id_wisata');
    }

    public function AllData()
    {
        return DB::table('tbl_wisata')
        ->join('tbl_jenis', 'tbl_jenis.id_jenis', '=', 'tbl_wisata.id_jenis')
        ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan', '=', 'tbl_wisata.id_kecamatan')
        ->get();
    }

    public function InsertData($data)
        {
            DB::table ('tbl_wisata')
            ->insert($data);
        }

    public function DetailData($id_wisata)
        {
           return DB::table('tbl_wisata')
            ->join('tbl_jenis', 'tbl_jenis.id_jenis', '=', 'tbl_wisata.id_jenis')
            ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan', '=', 'tbl_wisata.id_kecamatan')
             ->where('id_wisata', $id_wisata)-> first();

        }

    public function UpdateData($id_wisata, $data)
        {
            DB::table ('tbl_wisata')
            ->where('id_wisata', $id_wisata)
            ->update($data);
        }
    
    public function DeleteData($id_wisata)
    {
        DB::table ('tbl_wisata')
        ->where('id_wisata', $id_wisata)
        ->delete();
    }

}
