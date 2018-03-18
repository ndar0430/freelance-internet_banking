@extends('layouts.admin')

@section('content-header')
    <section class="content-header">
        <div class="row">
            <div class="col-xs-10">
                <h1 class="page-header">User List</h1>
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
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Account Type</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($user_details_table as $user_details)
                        <tr>
                            <td>
                                {{ $user_details->account_type }}
                            </td>
                            <td>
                                {{ $user_details->name }}
                            </td>
                            <td>

                             @if ($user_details_id == $users)
                             <p style="color: blue;"> Registered </p>
                             @else
                             <a
                                        href="{{ route('register', $user_details->id) }}"
                                        class="btn btn-info">
                                    Generate User ID
                                </a>
                             @endif
                            

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-xs-12 text-center">

            </div>
        </div>
    </section>
@endsection