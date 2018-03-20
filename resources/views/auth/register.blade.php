@extends('layouts.admin')
@section('content-header')
<section class="content-header">
    <h1>
        Generate User ID
    </h1>
</section>
@endsection
@section('content-main')
<section class="content page-news">
    <div class="row">
        <div class="col-xs-5">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('register',  $user_details->id) }}">
                        @csrf

                        <input type="hidden" name="users_details_id" id="users_details_id" value="{{$getID}}">

                        <input type="hidden" name="show_password" id="show_password" value="">

                       


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('User ID') }}</label>

                            <div class="col-md-6">
                                <input id="user_id" type="text" class="form-control{{ $errors->has('user_id') ? ' is-invalid' : '' }}" name="user_id" value="" required autofocus>
                                <br>
    
                                <input type="button" class="btn btn-primary" value="Generate!" onclick="getUserID();" />

                                @if ($errors->has('user_id'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('user_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="" required>
                                 
                                <br>
                                <input type="button" class="btn btn-primary" value="Generate!" onclick="getPassword();" />
                                
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
function makePassword() {
  var text = "";
  var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789~!@#$%^&*()_+";

  for (var i = 0; i < 10; i++)
    text += possible.charAt(Math.floor(Math.random() * possible.length));

  return text;
  
}

function makeUserID() {
  var text = "";
  var possible = "0123456789";

  for (var i = 0; i < 10; i++)
    text += possible.charAt(Math.floor(Math.random() * possible.length));

  return text;
  
}

function getUserID(){
document.getElementById('user_id').value = makeUserID();
}

function getPassword(){
$var = document.getElementById('password').value = makePassword();
document.getElementById('password-confirm').value = $var;
document.getElementById('show_password').value = $var;
}


</script>
@endsection
