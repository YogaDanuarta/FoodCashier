<div class="modal fade" id="modalUpdate-{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Stock Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('masterstock.update',$item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Name Item</label>
                        <input type="text" name="nameitem_e" value="{{$item->nameitem}}" class="form-control"
                            id="formGroupExampleInput">
                    </div>

                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Description Item</label>
                        <input type="text" name="descriptionitem_e" value="{{$item->descriptionitem}}"
                            class="form-control" id="formGroupExampleInput2">
                    </div>

                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Price</label>
                        <input type="text" name="price_e" class="form-control" value="{{$item->price}}"
                            id="formGroupExampleInput2">
                    </div>

                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Stock</label>
                        <input type="number" name="qty_e" class="form-control" value="{{$item->qty}}"
                            id="formGroupExampleInput2">
                    </div>


                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Image</label>
                        <input type="text" class=" form form-control" readonly value="{{$item->image}}">
                        <input type="file" name="image_e"  class="form-control" id="formGroupExampleInput2"
                            placeholder="Stock">

                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                <button type="submit" class="btn btn-primary">Save Changes </button>
            </div>
            </form>
        </div>
    </div>
</div>