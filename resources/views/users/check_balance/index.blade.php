@extends('layouts.admin') @section('content-header')
<section class="content-header">
    <div class="row">
        <div class="col-xs-10">
            <h1 class="page-header">My Balance</h1>
        </div>
    </div>
</section>
@endsection @section('content-main')

@if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif @if(Session::has('ok'))
                <div class="alert alert-info">
                    {{Session::get('ok')}}
                </div>
                @endif
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

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Account Number</th>
                        <th>Balance</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>

                
                    @foreach($back_account_table as $bank_account)
                    <tr>
                        <td>
                            {{ $bank_account->account_number }}
                        </td>
                        <td>
                        
                
                            {{ $bank_account->balance }}
                        </td>
                        
                        <td>
                         <a data-toggle="modal" data-target="#myModal" class = "btn btn-info" href = "{{route('bank.viewsendmoney')}}"> Send Money </a>

                        </td>






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
