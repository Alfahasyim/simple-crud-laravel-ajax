<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class karyawan extends Model
{
    use SoftDeletes;

    use HasFactory;
    protected $table = 'karyawans';
    protected $fillable = ['nama','tanggal_lahir','gaji','status_karyawan'];

    protected $date = ['deleted_at'];
    
}
