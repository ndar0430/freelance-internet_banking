@extends('layouts.admin') @section('content-header')
<section class="content-header">
    <div class="row">
        <div class="col-xs-10">
            <h1 class="page-header">Registered Users</h1>
        </div>
    </div>
</section>
@endsection @section('content-main')

<!-- Trigger the modal with a button -->




  

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
                        <th>User ID</th>
                        <th>Password</th>
                        <th>Account Number</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>

                
                    @foreach($users_table as $users)
                    <tr>
                        <td>
                            {{ $users->user_id }}
                        </td>

                        <td>

                            {{$users->show_password}}

                        </td>

                        <td>
                            @foreach($users->bankaccount as $ba) {{$ba->account_number}} @endforeach
                        </td>


                        @foreach($users->userdetails as $ud)
                        <td>
                            {{ $ud->name }}
                        </td>

                        <td>
                            {{ $ud->surname }}
                        </td>
                        @endforeach
                        <td>
                         <a data-toggle="modal" data-target="#myModal" class = "btn btn-info" href = "{{route('bank.create', $users->id)}}"> Add Bank Acc </a>



                        </td>






                    </tr>
                    @endforeach



                </tbody>
            </table>
        </div>

        <!--------------------HIDDEN DIV ---------------------------->


            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                    
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Modal Header</h4>
                        </div>
                        <div class="modal-body">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    
                </div>
            </div>
    <!--------------------HIDDEN DIV ---------------------------->
    



        <div class="col-xs-12 text-center">
            {{ $users_table->links() }}
        </div>
    </div>
</section>
@endsection
