@extends('layouts.backend-dashboard.app')
@section('title', 'Dashboard')
@section('judul', 'Dashboard')

@section('content')
      <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('assets/AdminLTE/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div>
    @include('Dashboard.html')
@endsection
