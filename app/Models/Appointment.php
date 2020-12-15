<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_date','appointment_time','status'
    ];
    public function patients(){
        return $this->belongsTo(Patient::class);
    }
    public function doctors(){
        return $this->belongsTo(Doctor::class);
    }
    public function schedule(){
        return $this->belongsTo(Schedule::class);
    }
}
