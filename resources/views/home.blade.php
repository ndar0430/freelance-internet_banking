@extends('layouts.admin')

@section('content-header')
    <section class="content-header">
        <div class="row">
            <div class="col-xs-10">
                <h1 class="page-header">Home Page</h1>
            </div>
        </div>
    </section>
@endsection

@section('content-main')
@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif @if(Session::has('ok'))
<div class="alert alert-success">
    {{Session::get('ok')}}
</div>
@endif
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
            Welcome to Deniz Bank!
            </div>
        </div>
    </section>
@endsection