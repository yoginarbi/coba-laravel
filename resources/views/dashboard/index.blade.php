@extends('dashboard.layouts.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 pb-2 mb-3 border-bottom">
  <h2>Welcome Back, {{ auth()->user()->name }}</h2>
</div>
@endsection