
<form action="{{route('bank.store', $users->id)}}" method="post" role="form" enctype="multipart/form-data">
    {{csrf_field()}}
    <input type="hidden" name="user_id" id="user_id" value="{{$users->id}}">
    
    <div style="padding-top:20px;"   class="row">
    <div class="col-xs-6">
    <label>Account Number</label>
    <input type="text" name="account_number" id="account_number" required>
    </div>
    <br>
    <br>
    <div class="col-xs-2 col-xs-offset-2">
    <button type="submit" class="btn btn-primary">Generate Bank Account</button>
    </div>
    </div>

</form> 

 <div class = "filler row">
</div>
<script>
$('body').on('hidden.bs.modal', '.modal', function () {
  $(this).removeData('bs.modal');
});
    </script>
</form>


