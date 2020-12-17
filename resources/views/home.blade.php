@extends('layouts.app')

@section('content')
@if($user->role =='Patient')
    @include('patient-dashboard')
@endif

@endsection