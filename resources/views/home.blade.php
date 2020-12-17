@extends('layouts.app')

@section('content')
@if($user->role =='Patient')
@include('patient.dashboard')
@endif
@if($user->role =='Doctor')
@include('doctor.dashboard')
@endif
@endsection