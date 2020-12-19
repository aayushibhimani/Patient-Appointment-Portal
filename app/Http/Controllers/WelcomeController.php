<?php

namespace App\Http\Controllers;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\User;
use DB;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $doctors = DB::table('doctors')->get();
        $user_ids = Doctor::select('user_id')->get();
        $users = User::whereIn('id',$user_ids)->get();
        $total = count($users);
        // dd($total);
        return view('welcome',compact(['users','doctors','total']));
        return view('welcome');
    }
}
