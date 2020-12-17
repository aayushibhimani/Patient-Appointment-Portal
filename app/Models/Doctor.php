<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'dob','gender','profile_pic','clinic_name','clinic_address','clinic_no','specialization','education','education_degree','registration_name',
        'registratation_year','user_id'
    ];
    public function appointments(){
        return $this->hasMany(Appointment::class);
    }
}
