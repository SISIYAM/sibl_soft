 <!--======================== Delete Modal===============================-->
 
 <div class="modal fade" id="DeleteModalUsers" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Delete?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="delete/delete.php" method="POST"> 
        <div class="modal-body">
          <input type="hidden" name="delete_id" class="delete_user_id">
          <b>Select "Confirm" below if you are ready to Delete this account.</b>
        </div>

        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

        
          
            <button type="submit" name="delete_btn" class="btn btn-primary">Confirm</button>

          </form>


        </div>
      </div>
    </div>
  </div>
   <!--======================== End Delete Modal===============================-->

   
 <!--======================== Delete Modal===============================-->
 <div class="modal fade" id="DeleteModalCal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Delete?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="delete/cal_delete.php" method="POST"> 
        <div class="modal-body">
          <input type="hidden" name="delete_id" class="delete_user_id">
          <b>Select "Confirm" below if you are ready to Delete this report.</b>
        </div>

        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

        
          
            <button type="submit" name="delete_btn" class="btn btn-primary">Confirm</button>

          </form>


        </div>
      </div>
    </div>
  </div>
   <!--======================== End Delete Modal===============================-->














<script>
$(document).ready(function(){
  $('#logoutBtn').click(function(e){
    e.preventDefault();
   $('#logoutModal').modal('show');
  });
});
</script>

<script>
$(document).ready(function(){
  $('#logoutBtn2').click(function(e){
    e.preventDefault();
   $('#logoutModal').modal('show');
  });
});
</script>

<!--------Delete PopUp------->

<script>
$(document).ready(function(){
  $('#deletebtnUsers').click(function(e){
    e.preventDefault();

    var user_id = $(this).val();
   $('.delete_user_id').val(user_id);
   $('#DeleteModalUsers').modal('show');
  });
});
</script>

<script>
$(document).ready(function(){
  $('#deletebtnCal').click(function(e){
    e.preventDefault();

    var user_id = $(this).val();
   $('.delete_user_id').val(user_id);
   $('#DeleteModalCal').modal('show');
  });
});
</script>
<script>
  function updateUserStatus(){
    jQuery.ajax({
      url:'php/update_user_status.php',
      success:function(){

      }
    });
  }

    setInterval(function(){
      updateUserStatus();
    },1000);

    
   
</script>