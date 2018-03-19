
<form action="{{route('bank.update', $bank_account->id)}}" method="post" role="form" enctype="multipart/form-data">

    {{csrf_field()}}
    <div style="padding-top:20px;"   class="row">
    <div class="col-xs-6">
    <label>Balance</label>
    <input type="text" name="balance" id="balance" required>
    </div>
    <br>
    <br>
    <div class="col-xs-2 col-xs-offset-2">
    <button type="submit" class="btn btn-primary">Add Balance</button>
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


