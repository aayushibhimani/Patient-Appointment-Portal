<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Aayushi Bhimani',
            'email' => 'aayushi@gmail.com',
            'password' => Hash::make('123456789'),
            'mobile_no' => '9820378965',
            'role' => 'Doctor'
        ]);
        DB::table('users')->insert([
            'name' => 'Jay Ganatra',
            'email' => 'jay@gmail.com',
            'password' => Hash::make('123456789'),
            'mobile_no' => '9658231471',
            'role' => 'Doctor'
        ]);
        DB::table('users')->insert([
            'name' => 'Krutika Bhalla',
            'email' => 'krutika@gmail.com',
            'password' => Hash::make('123456789'),
            'mobile_no' => '9969653368',
            'role' => 'Patient'
        ]);
        DB::table('users')->insert([
            'name' => 'Rishi Gupta',
            'email' => 'rishi@gmail.com',
            'password' => Hash::make('123456789'),
            'mobile_no' => '9856471239',
            'role' => 'Patient'
        ]);
        DB::table('doctors')->insert([
            'dob' => '2000-06-19',
            'gender' => 'Female',
            'profile_pic' => '1608282613.jpg',
            'clinic_name' => 'Aayushi Clinic',
            'clinic_address' => 'Vidyavihar, Mumbai',
            'clinic_no' => '24045927',
            'specialization' => 'Dentist,Childcare',
            'education_college' => 'KJSIEIT',
            'year_of_completion' => '2007-06-19',
            'education_degree' => 'BDA',
            'hospital_name' => 'KJ Somaiya',
            'start_date' => '2007-06-19',
            'end_date' => '2007-06-20',
            'destination' => 'Mumbai',
            'registration_name' => 'Hello, World',
            'registration_year' => '2021',
            'user_id' => '1'
        ]);
        DB::table('doctors')->insert([
            'dob' => '2000-07-19',
            'gender' => 'Male',
            'profile_pic' => '1608327225.jpeg',
            'clinic_name' => 'Jay Clinic',
            'clinic_address' => 'Vidyavihar, Mumbai',
            'clinic_no' => '24045789',
            'specialization' => 'Physician,Psychologist',
            'education_college' => 'KJSIEIT',
            'year_of_completion' => '2007-06-19',
            'education_degree' => 'MBBS',
            'hospital_name' => 'KJ Somaiya',
            'start_date' => '2007-06-19',
            'end_date' => '2007-06-20',
            'destination' => 'Mumbai',
            'registration_name' => 'Hello, World',
            'registration_year' => '2021',
            'user_id' => '2'
        ]);
        DB::table('patients')->insert([
            'dob' => '2000-08-19',
            'blood_group' => 'B+',
            'profile_pic' => '1608322485.jpg',
            'address' => 'Sion, Mumbai',
            'user_id' => '3'
        ]);
        DB::table('patients')->insert([
            'dob' => '2000-09-19',
            'blood_group' => 'B+',
            'profile_pic' => '1608353863.jpg',
            'address' => 'Kurla, Mumbai',
            'user_id' => '4'
        ]);
    }
}
