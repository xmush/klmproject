@extends('backend.layout.main_user')

@section('pagecss')
    
@endsection

@section('pagetitle')
    User PersonalData
@endsection

@section('topnav')
    
@endsection

@section('usertopnav')
    
@endsection

@section('pagemenu')
    {{-- <li><a href="#"><i class="fa fa-fw fa-users"></i> Data Pendaftar</a></li> --}}
    <li><a href="{{route('user.personal', ['id' => auth()->user()->id])}}"><i class="fa fa-fw fa-play"></i> Data Diri</a></li>
    <li><a href="{{route('user.fish', ['id' => auth()->user()->id])}}"><i class="fa fa-fw fa-play"></i> Entry Ikan</a></li>
    <li><a href="{{route('user.payment_fish')}}"><i class="fa fa-fw fa-play"></i> Pembayaran</a></li>
    {{-- <li><a href="#"><i class="fa fa-fw fa-play"></i> Pesan Panitia</a></li>
    <li><a href="#"><i class="fa fa-fw fa-play"></i> Ubah Password</a></li> --}}

@endsection

@section('pagebreadcrumb')
    User Personal Data
@endsection

@section('pagecontent')
    <div class="row">
        <div class="col-md-12 col-lg-6 col-sm-12 col-xs-12">
            <div class="card mb-4">
                <div class="card-header bg-white font-weight-bold">
                    Data Diri
                </div>
                <div class="card-body">
                    <form action="{{route('user.update_personal')}}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="staticEmail" class="col-4 col-form-label">Username</label>
                            <div class="col-8">
                                <input type="text" class="form-control" id="username" name="username" value="{{auth()->user()->name}}" disabled>
                                <input type="hidden" name="bio_id" value="{{$user->bio->id}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-4 col-form-label">Nama Lengkap</label>
                            <div class="col-8">
                                <input type="text" class="form-control" id="full_name" name="full_name" value="{{$user->bio->nama}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-4 col-form-label">No. Telpon</label>
                            <div class="col-8">
                                <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{$user->bio->no_hp}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-4 col-form-label">Email</label>
                            <div class="col-8">
                                <input type="text" class="form-control" id="email" name="email" value="{{$user->bio->email}}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-4 col-form-label">Alamat</label>
                            <div class="col-8">
                                <input type="text" class="form-control" id="address" name="address" value="{{$user->bio->alamat}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-4 col-form-label">Provinsi</label>
                            <div class="col-8">
                                <select class="form-control" name="provinsi" id="propinsi" required>
                                    <option value="">-- Pilih Provinsi --</option>
                                </select>
                                <input type="hidden" name="prov" id="prov" value="{{$user->bio->prov}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-4 col-form-label">Kab / Kota</label>
                            <div class="col-8">
                                <select class="form-control" name="kabupaten" id="kabupaten" required>
                                    <option value="">-- Pilih Kabupaten --</option>
                                </select>
                                <input type="hidden" class="form-control" id="kab" name="kab" value="{{$user->bio->kota}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-4 col-form-label"></label>
                            <div class="col-8">
                                <button type="submit" id="btn_submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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
                        if(json.data[i].name == $('#prov').val()) {
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
                                            if(json.data[i].name == $('#kab').val()) {
                                                $('#kabupaten').append($('<option>').text(json.data[i].name).attr('value', json.data[i].name).attr('selected', true));
                                            } else {
                                                $('#kabupaten').append($('<option>').text(json.data[i].name).attr('value', json.data[i].name));
                                            }
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
    });
    </script>
@endsection

