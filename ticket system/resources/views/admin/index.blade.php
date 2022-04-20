@extends('admin.admin_master')
@section('dashboard')
    <h1>Admin Dashboard</h1>
    <h3>name : {{ Auth::guard('admin')->user()->name }}</h3>
    <h3>email : {{ Auth::guard('admin')->user()->email }}</h3>
    <a href="{{ route('admin.logout') }}"><button>logout</button></a>
@endsection