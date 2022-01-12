@extends('template.masterdashboard')

@section('titleWeb','Create Transaction')

@section('content')



<h1 class="mt-4">Create Transaction</h1>
<ol class="breadcrumb mb-4">
    {{-- <li class="breadcrumb-item active">
        <a href="{{route('masteruser.create')}}" class="btn btn-primary">Add User</a>
    </li> --}}
</ol>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Create Transaction
    </div>

    @include('template.flash')
    <div class="card-body">

        <form action="" id="MyForm">

            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Admin</label>
                <input type="text" value=" {{ Auth::user()->name }}" name="namecashier" class="form form-control" readonly="true">
            </div>

            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Select Item</label>
                <select name="id_name" required class="form form-control" id="id_name">
                    <option value="">Select Item</option>
                    @foreach ($ListItem as $item)
                    <option value="{{$item->id}} " data-name="{{$item->nameitem}}">{{$item->nameitem}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Qty</label>
                <input type="number" required placeholder="Enter Qty" class="form-control form-control-sm" name="cost"
                    id="cost" value="">
            </div>

            <button id="addMore" class="btn btn-success btn-sm">Add More </button>
        </form>


    </div>


    <div class="card-body">

        <div class="row" style="margin-top:10px;">
            <div class="col-md-12">


                <form action="{{route('transaction.store')}}" method="post">
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

                    <a href="{{route('transaction.index')}}" class="btn btn-primary btn-sm"> {{ __('Cancel') }}</a>
                </form>

            </div>
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

        <input readonly hidden class="form form-control"  type="text" name="id_name[]" value="@{{ id_name }}">
        <input type="text" readonly class="form form-control" value="@{{dataname}}">
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
        $(document).on('click','#addMore',function(){
    
    $('.table').show();
    var id_name = $("#id_name").val();
    var cost = $("#cost").val();

    var dataname = $('#id_name option:selected').data('name');

    if( id_name !== "" && cost !== "")

    {
    var source = $("#document-template").html();
    var template = Handlebars.compile(source);

    var data = {

    
       id_name : id_name,
       dataname : dataname,
       cost: cost
    }

    var html = template(data);
    $("#addRow").append(html)
  
    $('#MyForm')[0].reset();

    total_ammount_price();
    }else{
        alert('All Field is required !');
    }
 
});
});




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




@endsection