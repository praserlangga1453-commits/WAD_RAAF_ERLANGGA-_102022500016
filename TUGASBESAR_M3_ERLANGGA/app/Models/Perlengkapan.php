<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Perlengkapan extends Model
{
    protected $table = 'perlengkapan';
    public $timestamps = false;
    protected $fillable = ['nama', 'kategori', 'kondisi', 'tarif'];
}
