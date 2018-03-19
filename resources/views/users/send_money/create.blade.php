
<form action="{{route('bank.sendmoney')}}" method="post" role="form" enctype="multipart/form-data">
    {{csrf_field()}}

    <div style="padding-top:20px;"   class="row">
    <div class="col-xs-6">
    <label>Account Number</label>
    <input type="text" name="To_account_number" id="To_account_number" required>
    </div>
    <div class="col-xs-6">
    <label>Amount</label>
    <input type="number" min=0 name="amount" id="amount" required>
    </div>
    <br>
    <br>
    <div class="col-xs-2 col-xs-offset-8">
    <button type="submit" class="btn btn-primary">Send Money</button>
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


