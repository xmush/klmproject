@extends('backend.layout.main')

@section('pagecss')
    
@endsection

@section('pagetitle')
    Admin Dashboard | Ubah Password Peserta
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

    {{-- <li><a href="{{route('admin.add_peserta')}}"><i class="fa fa-fw fa-user-plus"></i> Tambah Peserta</a></li>
    <li><a href="{{route('admin.add_peserta')}}"><i class="fa fa-fw fa-user-plus"></i> Tambah Peserta</a></li>
    <li><a href="{{route('admin.add_peserta')}}"><i class="fa fa-fw fa-user-plus"></i> Tambah Peserta</a></li> --}}
@endsection

@section('pagebreadcrumb')
    Dashboard | Ubah Password Peserta
@endsection

@section('pagecontent')
<div class="row">
    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
        <form action="{{route('admin.update_pass')}}" method="POST">
            @csrf
            <div class="card mb-4">
                <div class="card-header bg-white font-weight-bold">
                    Ubah Password Peserta
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-xs-12 col-form-label">Nama Peserta</label>
                                <div class="col-sm-8 col-xs-12">
                                    <select class="form-control m-b" name="user_id" id="user_id" required>
                                        <option selected value=""> Pilih Peserta </option>
                                        @foreach ($data_peserta as $peserta)
                                        <option selected value="{{$peserta->id}}"> {{$peserta->bio->nama}}</option>
                                        
                                        @endforeach
                                    </select>
                                    {{-- <input type="text" class="form-control" id="owner_name" value="" placeholder="Nama Handling"> --}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-xs-12 col-form-label">Password</label>
                                <div class="col-sm-8 col-xs-12">
                                    <input type="password" class="form-control" name="password" id="password" value="" placeholder="Password" required minlength="6" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-xs-12 col-form-label">Ulangi Password</label>
                                <div class="col-sm-8 col-xs-12">
                                    <input type="password" class="form-control" name="password2" id="password2" value="" placeholder="Ulangi Password" required minlength="6" autocomplete="off">
                                </div>
                            </div>                                                                                                                                                                                                                        
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <div class="form-group row">
                        <div class="col-sm-4 col-xs-6 text-left">
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                        <div class="col-sm-8 col-xs-6 text-right">
                            <button type="submit" class="btn btn-primary" id="btn_submit">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('pagejs')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    
    <script>
    $(document).ready(function() {
        if($('#flash_data').length) {
            let type = $('#flash_data').data('type');
            let msg = $('#flash_data').data('msg');
        
            Swal.fire({
                icon: type,
                text: msg,
                showConfirmButton: true,
            });
        };

        $("#password2").keyup(function(){
            var v1 = $(this).val()
            var v2 = $('#password').val()
            if(v1!=v2) {
                $('#password').addClass('is-invalid');
                $('#password2').addClass('is-invalid');
            } else {
                $('#password').removeClass('is-invalid');
                $('#password2').removeClass('is-invalid');
            }
        });  
    });
    </script>
@endsection