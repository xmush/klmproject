@extends('backend.layout.main_user')

@section('pagecss')
    
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
        <div class="col-md-12 col-lg-6 col-sm-12 col-xs-12">
            <div class="card mb-4">
                <div class="card-header bg-white font-weight-bold">
                    Data Ikan
                </div>
                <div class="card-body">
                    {{-- <form action="{{route('user.update_fish')}}" method="post"> --}}
                    <form action="" method="post">
                        @csrf
                        <input type="hidden" name="fish_id" value="{{$fish->id}}">
                        <div class="form-group row">
                            <label for="staticEmail" class="col-4 col-form-label">Reg ID</label>
                            <div class="col-8">
                                <input type="text" class="form-control" id="reg_num" name="reg_num" value="{{Mush::no_reg($fish->id)}}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-4 col-form-label">Pemilik</label>
                            <div class="col-8">
                                <input type="text" class="form-control" id="username" name="username" value="{{Auth::user()->bio->nama}}" disabled>
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
                                @if ($fish->status != 'LUNAS')
                                    <input type="text" class="form-control is-invalid" id="status" value="{{$fish->status}}" disabled>
                                @else
                                    <input type="text" class="form-control" id="status" value="{{$fish->status}}" disabled>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-4 col-form-label"></label>
                            <div class="col-8">
                                <button type="submit" id="btn_submit" class="btn btn-primary" disabled>Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6 col-sm-12 col-xs-12">
            <div class="card mb-4">
                <div class="card-header bg-white font-weight-bold">
                    Fish Picture
                </div>
                <div class="card-body">
                    <img src="{{$fish->fish_picture}}" alt="" class="img-thumbnail">
                </div>
                <div class="card-footer bg-white">
                    {{-- <form action="{{route('user.update_fish_picture')}}" method="post" enctype="multipart/form-data"> --}}
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row mb-0">
                            <div class="col-8">
                                <input type="file" class="form-control-file" name="fish_pict" id="fish_pict" required>
                                <input type="hidden" name="fish_id" value="{{$fish->id}}">
                            </div>
                            <label for="" class="col-4">
                                <button type="submit" id="btn_submit_pict" class="btn btn-primary" disabled>Upload</button>
                            </label>
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

        $('#type_ukuran').change(function(){
            var data_grade = $('option:selected',this).data("grade");
            var size = $('#fish_size').val();
            var min_size = $('option:selected',this).data("min_size");
            var max_size = $('option:selected',this).data("max_size");
            $('#grade').val(data_grade);
            
            if(size < min_size || size > max_size) {
                if($('#fish_size').hasClass('is-invalid')) {
                    $('#fish_size').removeClass('is-invalid');
                    $('#fish_size').addClass('is-invalid');
                } else {
                    $('#fish_size').addClass('is-invalid');
                }
            } else {
                $('#fish_size').removeClass('is-invalid');
            }

        });
        $('#fish_size').keyup(function(){
            var min_size = $('#type_ukuran').children('option:selected').data('min_size');
            var max_size = $('#type_ukuran').children('option:selected').data('max_size');
            var size = $(this).val();

            if(size < min_size || size > max_size) {
                $(this).addClass('is-invalid');
                $('#btn_submit').attr('disabled', true);
            } else {
                $(this).removeClass('is-invalid');
                $('#btn_submit').removeAttr('disabled', false);
            }
        });
    })
    </script>
@endsection

