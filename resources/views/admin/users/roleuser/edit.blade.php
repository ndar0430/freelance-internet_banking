@extends('layouts.admin') @section('content-header')
<section class="content-header">
    <h1>
        Role User
    </h1>
</section>
@endsection   @section('content-main')
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
<section class="content page-news">
    <div class="row">
        <div class="col-xs-12">
            <form action="{{route('roleuser.update', $roleuser->user_id)}}" method="post" role="form"  enctype="multipart/form-data"> 
            {{method_field('PATCH')}}
            {{csrf_field()}}


                <div class="form-group">
                    <label for="company_name">
                        Role Name
                    </label>
                    
                    <select class="form-control" name="role_id" required>
                        <option selected value="{{ $roleuser->role_id }}">@foreach($roleuser->role as $role){{ $role->display_name }}@endforeach</option>
                        @foreach($roles as $role)
                        <option value="{{ $role->id }}" > {{$role->display_name}} </option>
                        @endforeach
                    <select>

                </div>

                <div class="form-group">
                    <label for="company_name">
                        User
                    </label>
                    <select class="form-control" name="user_id" required>
                        <option selected value="{{ $roleuser->user_id }}">@foreach($roleuser->user as $user){{ $user->user_id }}@endforeach</option>
                        @foreach($users as $user)
                        <option value="{{ $user->id }}">{{$user->user_id}}</option>
                        @endforeach
                    <select>
                </div>

                <div class="btn-container">
                    <a href="#" class="btn btn-danger pull-right">Cancel</a>
                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection