@extends('layouts.admin') @section('content-header')
<section class="content-header">
    <div class="row">
        <div class="col-xs-10">
            <h1 class="page-header">Roles</h1>
        </div>
    </div>
</section>
@endsection @section('content-main') @if (count($errors) > 0)
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
            @role('super_admin')
                <thead>
                    <tr>
                        <th>User ID </th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
            @endrole

                <tbody>
                    @foreach($roleuser_table as $roleuser)
                    <tr>
                        <td>
                        @foreach($roleuser->user as $user)
                            {{ $user->user_id }}
                        @endforeach
                       
                        </td>
                        <td>
                        @foreach($roleuser->role as $role)
                            {{ $role->display_name }}
                        @endforeach
                        </td>
                        <td>
                            <a href="{{ route('roleuser.edit', $roleuser->user_id) }}" class="btn btn-info">
                                Edit Role
                            </a>
                        </td>


                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-xs-12 text-center">
            {{ $roleuser_table->links() }}
        </div>
    </div>
</section>
@endsection