<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
  protected $table = 'pinjaman';
  protected $primaryKey = 'id';

  protected $fillable = [
    'nama',
    'pinjaman',
    'bayar',
    'dapat',
    'tanggal'
  ];
}
