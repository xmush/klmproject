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
@section('pagecontent')
<div class="row">
    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
        <form action="{{route('admin.store_admin')}}" method="POST">
            @csrf
            <div class="card mb-4">
                <div class="card-header bg-white font-weight-bold">
                    Admin Tambah Peserta
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-xs-12 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-8 col-xs-12">
                                    <input type="text" class="form-control nama_lengkap" id="nama_lengkap" name="nama_lengkap" value="" placeholder="Nama Lengkap" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-xs-12 col-form-label">No. Telpon</label>
                                <div class="col-sm-8 col-xs-12">
                                    <input type="text" class="form-control no_hp" name="no_hp" id="no_hp" value="" placeholder="No. Telpon / WA" pattern=".[0-9]{10,14}" required title=" angka panjang 10 -14 karakter">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-xs-12 col-form-label">Alamat Email</label>
                                <div class="col-sm-8 col-xs-12">
                                    <input type="email" class="form-control email" name="email" id="email" value="" placeholder="Email" required autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-xs-12 col-form-label">Alamat</label>
                                <div class="col-sm-8 col-xs-12">
                                    <input type="text" class="form-control alamat" name="alamat" id="alamat" value="" placeholder="Alamat" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-xs-12 col-form-label">Provinsi</label>
                                <div class="col-sm-8 col-xs-12">
                                    <select class="form-control m-b" name="provinsi" id="propinsi" required>
                                        <option selected value=""> Pilih Provinsi </option>
                                    </select>
                                    <input type="hidden" name="prov" id="prov" value="">
                                    {{-- <input type="text" class="form-control" id="owner_name" value="" placeholder="Nama Handling"> --}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-xs-12 col-form-label">Asal Kota</label>
                                <div class="col-sm-8 col-xs-12">
                                    <select class="form-control m-b" name="kabupaten" id="kabupaten" required>
                                        <option selected value=""> Pilih Kabupaten </option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-xs-12 col-form-label">Username</label>
                                <div class="col-sm-8 col-xs-12">
                                    <input type="text" class="form-control" name="username" id="username" value="" placeholder="Username" required minlength="6" autocomplete="off">
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
                            <button type="submit" class="btn btn-primary" id="btn_submit">Tambah Admin</button>
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
    var return_first = function() {
    var tmp = null;
    $.ajax({
            'async': false,
            'type': "get",
            'global': false,
            'dataType': 'json',
            'url': 'https://x.rajaapi.com/poe',
            'success': function(data) {
                tmp = data.token;
            }
        });
        return tmp;
    }();
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

        $.ajax({
            url: 'https://x.rajaapi.com/MeP7c5ne' + window.return_first + '/m/wilayah/provinsi',
            type: 'GET',
            dataType: 'json',
            success: function(json) {
                if (json.code == 200) {
                    for (i = 0; i < Object.keys(json.data).length; i++) {
                        if(json.data[i].name == 'SULAWESI SELATAN') {
                            $('#propinsi').append($('<option>').text(json.data[i].name).attr('value', json.data[i].id).attr('data-prov', json.data[i].name).attr('selected', true));
                            var propinsi = $("#propinsi").val();
                            $.ajax({
                                url: 'https://x.rajaapi.com/MeP7c5ne' + window.return_first + '/m/wilayah/kabupaten',
                                data: "idpropinsi=" + propinsi,
                                type: 'GET',
                                cache: false,
                                dataType: 'json',
                                success: function(json) {
                                    $("#kabupaten").html('');
                                    if (json.code == 200) {
                                        for (i = 0; i < Object.keys(json.data).length; i++) {
                                            $('#kabupaten').append($('<option>').text(json.data[i].name).attr('value', json.data[i].name));
                                        }
                                    } else {
                                        $('#kabupaten').append($('<option>').text('Data tidak di temukan').attr('value', 'Data tidak di temukan'));
                                    }
                                    $('#prov').val($('#propinsi').children('option:selected').data('prov'));
                                }
                            });
                        } else {
                            $('#propinsi').append($('<option>').text(json.data[i].name).attr('data-prov', json.data[i].name).attr('value', json.data[i].id));
                        }
                    }
                } else {
                    $('#kabupaten').append($('<option>').text('Data tidak di temukan').attr('value', 'Data tidak di temukan'));
                }
            }
        });

        $("#propinsi").change(function() {
            var propinsi = $("#propinsi").val();
            $("#prov_name").val($("#propinsi").text());
            $.ajax({
                url: 'https://x.rajaapi.com/MeP7c5ne' + window.return_first + '/m/wilayah/kabupaten',
                data: "idpropinsi=" + propinsi,
                type: 'GET',
                cache: false,
                dataType: 'json',
                success: function(json) {
                    $("#kabupaten").html('');
                    if (json.code == 200) {
                        for (i = 0; i < Object.keys(json.data).length; i++) {
                            $('#kabupaten').append($('<option>').text(json.data[i].name).attr('value', json.data[i].name));
                        }
                    } else {
                        $('#kabupaten').append($('<option>').text('Data tidak di temukan').attr('value', 'Data tidak di temukan'));
                    }
                    $('#prov').val($('#propinsi').children('option:selected').data('prov'));
                }
            });
        });
        
        $("#nama_lengkap").keyup(function(){
            var v = this.value.toUpperCase();
            $("#nama_lengkap").val(v);
        });
        $("#alamat").keyup(function(){
            var v = this.value.toUpperCase();
            $("#alamat").val(v);
        });
        $("#username").keypress(function(e){
            var v = String.fromCharCode(e.which);
            if(!v.match(/[a-zA-Z0-9]/)) {
                return false;
            }
        });
        $("#no_hp").keypress(function(e){
            var v = String.fromCharCode(e.which);
            if(!v.match(/[0-9]/)) {
                return false;
            }
        }); 
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