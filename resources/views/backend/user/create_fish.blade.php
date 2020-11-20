@extends('backend.layout.main_user')

@section('pagecss')
    <style>
        .reqq {
            color: red;
        }
    </style>
@endsection

@section('pagetitle')
    User Fish Data
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
    User Fish Data
@endsection

@section('pagecontent')
    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <div class="card mb-4">
                <div class="card-header bg-white font-weight-bold">
                    Form registrasi ikan
                </div>
                <div class="card-body">
                    <form action="{{route('user.store_ikan')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="" class="col-4 col-form-label">Nama Owner <small class="reqq">*</small></label>
                            <div class="col-8">
                                <input type="text" class="form-control-plaintext" name="owner_name" id="owner_name" value="{{$user->bio->nama}}">
                                <input type="hidden" class="" name="user_id" id="user_id" value="{{$user->id}}">
                                <input type="hidden" class="" name="bio_id" id="bio_id" value="{{$user->bio->id}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-4 col-form-label">Nama Handler <small class="reqq">*</small></label>
                            <div class="col-8">
                                <input type="text" class="form-control" name="handler_name" id="handler_name" placeholder="Handler Name" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-4 col-form-label">Alamat Handler <small class="reqq">*</small></label>
                            <div class="col-4">
                                {{-- <input type="text" class="form-control" name="handler_address" id="handler_address" placeholder="Provinsi, Kota" required> --}}
                                <select class="form-control m-b" name="provinsi" id="propinsi" required>
                                    <option selected value=""> Pilih Provinsi </option>
                                </select>
                                <input type="hidden" name="prov" id="prov" value="">
                            </div>
                            <div class="col-4">
                                {{-- <input type="text" class="form-control" name="handler_address" id="handler_address" placeholder="Provinsi, Kota" required> --}}
                                <select class="form-control m-b" name="kabupaten" id="kabupaten" required>
                                    <option selected value=""> Pilih Kabupaten </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-4 col-form-label">Varietas Ikan <small class="reqq">*</small></label>
                            <div class="col-8">
                                <select class="form-control" name="varietas" id="varietas" required>
                                    <option value="">-- Pilih Varietas --</option>
                                    @foreach ($data_varietas as $var)
                                        <option value="{{$var->id}}">{{$var->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-4 col-form-label">Ukuran Type <small class="reqq">*</small></label>
                            <div class="col-8">
                                <select class="form-control" name="type_ukuran" id="type_ukuran" required>
                                    <option value="">-- Pilih Ukuran --</option>
                                    @foreach ($data_cat as $cat)
                                        <option value="{{$cat->id}}" data-min_size="{{$cat->min_size}}" data-max_size="{{$cat->max_size}}" data-class="{{$cat->class}}" data-grade="{{$cat->grade}}">{{$cat->min_size.' - '.$cat->max_size.' cm'}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-4 col-form-label">Ukuran Ikan (cm) <small class="reqq">*</small></label>
                            <div class="col-8">
                                <input type="number" step="0.1" class="form-control" name="fish_size" id="fish_size" value="1.0">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-4 col-form-label">Grade Champion</label>
                            <div class="col-8">
                                <input type="text" class="form-control-plaintext" name="grade" id="grade">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-4 col-form-label">Foto Ikan <small class="reqq">*</small> <br>(Min 100kb - Maks 500kb)</label>
                            <div class="col-8">
                                <input type="file" class="form-control-file" name="fish_pict" id="fish_pict" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-4 col-form-label"></label>
                            <div class="col-8">
                                <button type="reset" class="btn btn-secondary">Reset</button>
                                <button type="button" id="btn_alert" class="btn btn-warning" disabled>Daftar</button>
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

            $('#type_ukuran').change(function(){
                var data_grade = $('option:selected',this).data("grade");
                $('#grade').val(data_grade);

                $('#fish_size').attr({
                    'min': $('option:selected',this).data("min_size"),
                    'max' : $('option:selected',this).data("max_size"),
                    'value' : $('option:selected',this).data("min_size")
                    });
            });
            $('#fish_size').keyup(function(){
                var min_size = $(this).attr('min');
                var max_size = $(this).attr('max');
                var size = $(this).val();

                if(size < min_size || size > max_size) {
                    $(this).addClass('is-invalid');
                    $('#btn_submit').attr('disabled', true);
                } else {
                    $(this).removeClass('is-invalid');
                    $('#btn_submit').removeAttr('disabled', false);
                }
            });

            $('#btn_alert').click(function(){
                Swal.fire({
                    icon: 'warning',
                    title: 'Maaf...',
                    text: 'Pendaftaran ditutup!!'
                })
            });
        });
    </script>
@endsection

