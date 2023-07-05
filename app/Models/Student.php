<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'nis',
        'name',
        'gender',
        'kehadiran',
        'rayon',
        'rombel_id',
    ];

    public function rombel()
    {
        return $this->belongsTo(Rombel::class,"rombel_id");
    }
}
