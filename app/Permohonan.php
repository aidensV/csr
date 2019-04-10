<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model
{
   protected $table = 'tbl_permohonan';
   protected $primaryKey = 'permohonan_id';
   protected $fillable = ['program_id', 'opd_id', 'permohonan_tanggal', 'permohonan_nama', 'permohonan_estimasi_anggaran', 'permohonan_deskripsi', 'permohonan_status'];
}
