<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Stock Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <form action="{{route('masterstock.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Name Item</label>
                        <input type="text" name="nameitem" class="form-control" placeholder="Item Name">
                        <span class="text-danger">{{ $errors->first('nameitem') }}</span>
                    </div>

                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Description Item</label>
                        <input type="text" name="descriptionitem" class="form-control" placeholder="Info Item">

                        <span class="text-danger">{{ $errors->first('descriptionitem') }}</span>
                    </div>

                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Price</label>
                        <input type="number" name="price" class="form-control" placeholder="1000">

                        <span class="text-danger">{{ $errors->first('price') }}</span>
                    </div>

                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Stock</label>
                        <input type="number" name="qty" class="form-control" placeholder="Stock">

                        <span class="text-danger">{{ $errors->first('qty') }}</span>
                    </div>

                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Image</label>
                        <input type="file" name="image" class="form form-control" enctype="multipart/form-data">

                        <span class="text-danger">{{ $errors->first('image') }}</span>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                <input type="submit" class="btn btn-primary" value="Save Changes">
            </div>
            </form>
        </div>
    </div>
</div>