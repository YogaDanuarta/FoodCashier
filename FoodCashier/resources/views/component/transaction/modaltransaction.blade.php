<form action="" id="MyForm">

    <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">Admin</label>
        <input type="text" value="Tobias" class="form form-control" readonly="true">
    </div>

    <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">Select Item</label>
        <select name="task_name" required class="form form-control" id="task_name">
            <option value="">Select Item</option>
            <option value="Pencil">Pencil</option>
            <option value="Buku">Buku</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">Qty</label>
        <input type="number" required placeholder="Enter Qty" class="form-control form-control-sm" name="cost" id="cost"
            value="">
    </div>
    <button id="addMore" class="btn btn-success btn-sm">Add More </button>
</form>


<div class="card-body">

    <div class="row" style="margin-top:10px;">
        <div class="col-md-12">


            <form action="" method="post">
                @csrf

                <table class="table table-lg table-bordered" align="center">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody id="addRow" class="addRow">

                    </tbody>
                    <tbody>
                        <tr>
                            <td colspan="1" class="text-right">
                                {{-- <strong>Total:</strong> --}}
                            </td>
                            <td>
                                {{-- <input type="number" id="estimated_ammount" class="form form-control" value="0"
                                    readonly> --}}
                            </td>
                        </tr>
                    </tbody>

                </table>
                <button type="submit" class="btn btn-success btn-sm">Submit</button>
            </form>

        </div>
    </div>
</div>

<script src="//code.jquery.com/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
</script>

<script id="document-template" type="text/x-handlebars-template">


    <tr class="delete_add_more_item" id="delete_add_more_item">

      <td>

        <input readonly class="form form-control" type="text" name="task_name[]" value="@{{ task_name }}">
      </td>
      <td>
        <input type="number" readonly class="form form-control" class="cost" name="cost[]" value="@{{ cost }}">
      </td>
  
      <td>
       <i class="removeaddmore" style="cursor:pointer;color:red;">Remove</i>
      </td>

  </tr>
 </script>

<script type="text/javascript">
    $( document ).ready(function() {
   InsertTransaction();
});


    function InsertTransaction()
{
    $(document).on('click','#addMore',function(){
    
    $('.table').show();

    var task_name = $("#task_name").val();
    var cost = $("#cost").val();

    if( task_name !== "" && cost !== "")

    {
        var source = $("#document-template").html();
    var template = Handlebars.compile(source);

    var data = {
       task_name: task_name,
       cost: cost
    }

    var html = template(data);
    $("#addRow").append(html)
  
    $('#MyForm')[0].reset();

    total_ammount_price();
    }else{
        alert('tolong di isi dengan benar');
    }
    
});
}

  $(document).on('click','.removeaddmore',function(event){
    $(this).closest('.delete_add_more_item').remove();
    total_ammount_price();
  });

  function total_ammount_price() {
    var sum = 0;
    $('.cost').each(function(){
      var value = $(this).val();
      if(value.length != 0)
      {
        sum += parseFloat(value);
      }
    });
    $('#estimated_ammount').val(sum);
  }
                       
</script>