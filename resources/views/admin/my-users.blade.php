@extends('layouts.theme')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Profile</h1>
        <button class="btn btn-secondary mb-2" id="btn-add">Tambah Data</button>
        <table class="table table-bordered my-datatable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Photo</th>
                    <th>Instagram</th>
                    <th>No Telp / WA</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <div class="modal fade formDelete" id="modalConfirm">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <!-- <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">Confirm</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div> -->
                <form id="formDelete" method="POST">
                    <div class="modal-body text-center">

                        <input type="hidden" id="id" name="id">

                        <h3 class="mt-3">Delete Data</h3>

                        <p class="mt-3">Are you sure you want to delete this data ?</p>

                        <div class="mt-5 col-12 row">
                            <div class="col-6 text-center">
                                <button type="submit" class="btn btn-danger w-100">Delete</button>
                            </div>
                            <div class="col-6 text-center">
                                <button type="button" class="btn bg-secondary text-white w-100"
                                    data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>

                </form>

            </div>
        </div>
    </div>

    <div class="modal fade formCRUD" id="myModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Form Users</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="formCRUD" method="POST" action="{{ route('admin.my-users.create') }}">
                    <div class="modal-body">

                        <input type="hidden" id="id" name="id">

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder=""
                                    required>
                            </div>
                            <div class="form-group col-6">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder=""
                                    required>
                            </div>
                            <div class="form-group col-6">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="">
                            </div>
                            <div class="form-group col-6">
                                <label for="photo">Photo</label>
                                <input type="file" class="form-control" name="photo" accept=".jpg,.jpeg,.png,.svg"
                                    id="photo">
                            </div>
                            <div class="form-group col-6">
                                <label for="no_telp">No Telp</label>
                                <input type="number" class="form-control" id="no_telp" name="no_telp" placeholder=""
                                    required>
                            </div>
                            <div class="form-group col-6">
                                <label for="instagram">Instagram</label>
                                <input type="text" class="form-control" name="instagram" id="instagram">
                            </div>
                            <div class="form-group col-6">
                                <label for="alamat_kantor">Alamat Kantor</label>
                                <textarea class="form-control" name="alamat_kantor" id="alamat_kantor" cols="30" rows="4"></textarea>
                            </div>
                            <div class="form-group col-6">
                                <label for="description_profile">Deskripsi Profil</label>
                                <textarea class="form-control" name="description_profile" id="description_profile" cols="30" rows="4"></textarea>
                            </div>
                            <div class="form-group col-6">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="" disabled selected>Pilih Status</option>
                                    <option value="1">Aktif</option>
                                    <option value="0">Tidak Aktif</option>
                                </select>
                            </div>
                            <!-- <div class="form-group col-6">
                                <label for="categories_id">Kategori</label>
                                <select name="categories_id" id="categories_id" class="form-control" required>
                                    <option value="" disabled selected>Pilih Kategori</option>
                                    @foreach (getCategori() as $data)
    <option value="{{ $data->id }}">{{ $data->name }}</option>
    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" id="description" name="description" cols="30"
                                    rows="5"></textarea>
                            </div>
                            <div class="form-group col-6">
                                <label for="brosur">Detail Product</label>
                                <input type="number" class="form-control" accept="" id="detailProductTrigger" name="total_detail">
                            </div> -->
                        </div>
                        <div id="appendUploadDetail">

                        </div>

                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Save</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {

            var table = $('.my-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.my-users.datatable') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        width: '5%',
                        className: 'dt-center',
                        orderable: false
                    },
                    {
                        data: 'name',
                        name: 'name',
                        width: '20%',
                        className: 'dt-center'
                    },
                    // {data: 'price', name: 'price', width: '10%', className: 'dt-center'},
                    {
                        data: 'email',
                        name: 'email',
                        width: '20%',
                        className: 'dt-center'
                    },
                    {
                        data: 'photo',
                        name: 'photo',
                        width: '20%',
                        className: 'dt-center',
                        render: function(data, type) {
                            return '<img src="{{ URL::asset('storage/uploads') }}/' + data +'?'+new Date().getTime()+
                                '" style="width: 100%;height: 5rem;"></img>';
                        }
                    },
                    {
                        data: 'instagram',
                        name: 'instagram',
                        width: '30%',
                        className: 'dt-center',
                        render: function(data, type) {
                            return '<a target="_blank" href="' + data + '">' + data + '</a>';
                        }
                    },
                    {
                        data: 'no_telp',
                        name: 'no_telp',
                        width: '30%',
                        className: 'dt-center',
                        render: function(data, type) {
                            return '<a target="_blank" href="' + data + '">' + data + '</a>';
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        width: '15%',
                        className: 'dt-center',
                        orderable: true,
                        searchable: true
                    },
                ]
            });
        });
    </script>
@endsection
