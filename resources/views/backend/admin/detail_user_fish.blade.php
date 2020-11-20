@extends('backend.layout.main')

@section('pagecss')
    
@endsection

@section('pagetitle')
    Admin Dashboard
@endsection

@section('topnav')
    
@endsection

@section('usertopnav')
    
@endsection

@section('pagemenu')
    <li><a href="{{route('admin.list_peserta')}}"><i class="fa fa-fw fa-users"></i> Data Pendaftar</a></li>
    <li><a href="{{route('admin.fish_entry')}}"><i class="fa fa-fw fa-table"></i> Data Ikan</a></li>
    <li><a href="{{route('admin.add_peserta')}}"><i class="fa fa-fw fa-user-plus"></i> Tambah Peserta</a></li>
    <li><a href="{{route('admin.add_admin')}}"><i class="fa fa-fw fa-user-plus"></i> Tambah Admin</a></li>

@endsection

@section('pagebreadcrumb')
    Dashboard
@endsection

@section('pagecontent')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-sx-12">
            <div class="card mb-4">
                <form action="{{route('admin.update_user_fish')}}" method="post">

                    <div class="card-header bg-white font-weight-bold">
                        Data Ikan Detail
                    </div>
                    <div class="card-body">
                        @csrf
                        <input type="hidden" name="fish_id" value="{{$fish->id}}">
                        <div class="form-group row">
                            <label for="staticEmail" class="col-4 col-form-label">Pemilik</label>
                            <div class="col-8">
                                <input type="text" class="form-control" id="username" name="username" value="{{$fish->bio->nama}}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-4 col-form-label">Nama Handler</label>
                            <div class="col-8">
                                <input type="text" class="form-control" id="handler_name" name="handler_name" value="{{$fish->handler_name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-4 col-form-label">Alamat Handler</label>
                            <div class="col-8">
                                <input type="text" class="form-control" id="handler_address" name="handler_address" value="{{$fish->handler_address}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-4 col-form-label">Varietas</label>
                            <div class="col-8">
                                <select class="form-control" name="varietas" id="varietas" required>
                                    <option value="">-- Pilih Varietas --</option>
                                    @foreach ($data_var as $var)
                                        @if ($fish->fish_id == $var->id)
                                        <option value="{{$var->id}}" selected>{{$var->name}}</option>
                                        @endif
                                        <option value="{{$var->id}}">{{$var->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-4 col-form-label">Kelas</label>
                            <div class="col-8">
                                <select class="form-control" name="type_ukuran" id="type_ukuran" required>
                                    <option value="">-- Pilih Ukuran --</option>
                                    @foreach ($data_cat as $cat)
                                    @if ($fish->cat_id == $cat->id)
                                        <option value="{{$cat->id}}" data-min_size="{{$cat->min_size}}" data-max_size="{{$cat->max_size}}" data-class="{{$cat->class}}" data-grade="{{$cat->grade}}" selected>{{$cat->min_size.' - '.$cat->max_size.' cm'}}</option>
                                    @endif
                                        <option value="{{$cat->id}}" data-min_size="{{$cat->min_size}}" data-max_size="{{$cat->max_size}}" data-class="{{$cat->class}}" data-grade="{{$cat->grade}}">{{$cat->min_size.' - '.$cat->max_size.' cm'}}</option>
                                    @endforeach
                                </select>    
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-4 col-form-label">Ukuran</label>
                            <div class="col-8">
                                <input type="number" step="0.1" class="form-control" name="fish_size" id="fish_size" value="{{$fish->fish_size}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-4 col-form-label">Grade</label>
                            <div class="col-8">
                                <input type="text" class="form-control" id="" value="{{$fish->cat->grade}}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-4 col-form-label">Status Pembayaran</label>
                            <div class="col-8">
                                <select class="form-control
                                @if ($fish->status == 'LUNAS')
                                    is-valid
                                @else
                                    is-invalid
                                @endif
                                " name="status_reg" id="status_reg" required>
                                    <option value="LUNAS"
                                        @if ($fish->status == 'LUNAS')
                                            selected
                                        @endif
                                    >LUNAS</option>
                                    <option value="BELUM LUNAS"
                                        @if ($fish->status == 'BELUM LUNAS')
                                            selected
                                        @endif
                                    >BELUM LUNAS</option>
                                </select> 
                                {{-- @if ($fish->status != 'LUNAS')
                                    <input type="text" class="form-control is-invalid" id="status" value="{{$fish->status}}" disabled>
                                @else
                                    <input type="text" class="form-control" id="status" value="{{$fish->status}}" disabled>
                                @endif --}}
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-white">
                        <div class="form-group row">
                            <label for="inputPassword" class="col-4 col-form-label"></label>
                            <div class="col-8">
                                <button type="submit" id="btn_submit" class="btn btn-primary">Update</button>
                                {{-- <button type="button" id="btn_delete" data-rurl="{{route('admin.fish_entry_delete_ajax')}}" class="btn btn-danger">Delete</button> --}}
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-sx-12">
            <div class="card mb-4">
                <div class="card-header bg-white font-weight-bold">
                    Foto Ikan Detail
                </div>
                <div class="card-body">
                    <div class="card">
                        <img src="{{$fish->fish_picture}}" alt="" class="img-thumbnail">
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <form action="{{route('admin.update_user_picture_fish')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row mb-0">
                            <div class="col-8">
                                <input type="file" class="form-control-file" name="fish_pict" id="fish_pict" required>
                                <input type="hidden" name="fish_id" value="{{$fish->id}}">
                            </div>
                            <label for="" class="col-4 text-right">
                                <button type="submit" id="btn_submit_pict" class="btn btn-primary">Upload</button>
                            </label>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @if ($fish->fish_resi_picture == '')
            <div class="col-lg-6 col-md-6 col-sm-12 col-sx-12">
                <div class="card mb-4">
                    <div class="card-header bg-white font-weight-bold">
                        Foto Resi Belum Di Upload
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.upload_user_resi_register')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row mb-0">
                                <div class="col-8">
                                    <input type="file" class="form-control-file" name="fish_resi_pict" id="fish_resi_pict" required>
                                    <input type="hidden" name="fish_id" value="{{$fish->id}}">
                                </div>
                                <label for="" class="col-4 text-right">
                                    <button type="submit" id="btn_submit_resi" class="btn btn-primary">Upload</button>
                                </label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <div class="col-lg-6 col-md-6 col-sm-12 col-sx-12">
                <div class="card mb-4">
                    <div class="card-header bg-white font-weight-bold">
                        Foto Resi Pendaftaran
                    </div>
                    <div class="card-body">
                        <div class="card">
                            <img src="{{$fish->fish_resi_picture}}" alt="" class="img-thumbnail">
                        </div>
                    </div>
                    <div class="card-footer bg-white">
                        <form action="{{route('admin.update_user_resi_register')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row mb-0">
                                <div class="col-8">
                                    <input type="file" class="form-control-file" name="fish_resi_pict" id="fish_resi_pict" required>
                                    <input type="hidden" name="fish_id" value="{{$fish->id}}">
                                </div>
                                <label for="" class="col-4 text-right">
                                    <button type="submit" id="btn_submit_pict" class="btn btn-primary">Upload</button>
                                </label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>            
        @endif
    </div>
@endsection

@section('pagejs')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script>
    $(document).ready(function(){
        if($('#flash_data').length) {
            let type = $('#flash_data').data('type');
            let msg = $('#flash_data').data('msg');
        
            Swal.fire({
                icon: type,
                text: msg,
                showConfirmButton: true,
            });
        };

        $('#type_ukuran').change(function() {
            var min = $('option:selected',this).data("min_size");
            var max = $('option:selected',this).data("max_size");

            $('#fish_size').val(min);
        });

        $('#btn_delete').click(function(){
            var url = $(this).data('rurl');
            var token = $("input[name=_token]").val();
            var id = $("input[name=fish_id]").val();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            type : 'POST',
                            url : url,
                            data : {
                                'fish_id' : id,
                                '_method' : 'post',
                                '_token' : token,
                            },
                            success : function (response) {
                                console.log(response);
                            }
                        });
                        // console.log(url);
                    }
                })
        });
    });
    </script>
@endsection