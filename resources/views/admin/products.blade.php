@extends('layouts.theme')

@section ('content')   
    <div class="container mt-5" style="margin-top: 15%!important;">
        <h1 class="mb-4 text-center">List Data Products</h1>
        <button class="btn btn-secondary mb-2" data-toggle="modal" data-target="#myModal">Tambah Data</button>
        <table class="table table-bordered my-datatable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Form Products</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form id="my-form">
                <div class="modal-body">
                
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" id="price" name="price" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="photo">Photo</label> 
                        <input type="file" class="form-control" name="photo" id="photo">
                    </div>
                    <div class="form-group">
                        <label for="embed">Embed Link</label>
                        <input type="url" class="form-control" id="embed" name="embed" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="categories_id">Kategori</label>
                        <select name="categories_id" id="categories_id" class="form-control">
                            <option value="" disabled selected>Pilih Kategori</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" id="description" name="description" cols="30" rows="5"></textarea>
                    </div>
                
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </form>

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            var table = $('.my-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('products.datatable') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    // {data: 'email', name: 'email'},
                    // {data: 'phone', name: 'phone'},
                    {
                        data: 'action', 
                        name: 'action', 
                        orderable: true, 
                        searchable: true
                    },
                ]
            });
        });
    </script>
@endsection
