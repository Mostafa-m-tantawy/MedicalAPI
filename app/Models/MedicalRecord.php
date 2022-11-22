<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function vital()
    {
        return $this->belongsTo(Vital::class);
    }
    public function diagnosis()
    {
        return $this->belongsTo(Diagnosis::class);

    }
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);

    }
    public function meta()
    {
        return $this->belongsTo(Meta::class);

    }
}
