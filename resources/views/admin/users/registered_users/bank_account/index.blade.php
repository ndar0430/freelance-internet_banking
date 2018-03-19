@extends('layouts.admin') @section('content-header')
<section class="content-header">
    <div class="row">
        <div class="col-xs-10">
            <h1 class="page-header">Balance</h1>
        </div>
    </div>
</section>
@endsection @section('content-main')

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
                        <th>Account Number</th>
                        <th>Balance</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>

                
                    @foreach($bank_account_table as $bank_account)
                    <tr>
                        <td>
                            {{ $bank_account->user->user_id }}
                        </td>

                        <td>
                            {{ $bank_account->account_number }}
                        </td>
                        <td>
                        
                
                            {{ $bank_account->balance }}
                        </td>
                        
                        <td>
                         <a data-toggle="modal" data-target="#myModal" class = "btn btn-info" href = "{{route('bank.edit', $bank_account->id)}}"> Add Balance </a>

                        </td>






                    </tr>
                    @endforeach



                </tbody>
            </table>
        </div>


        <div class="col-xs-12 text-center">
            {{ $bank_account_table->links() }}
        </div>
    </div>
</section>
@endsection
