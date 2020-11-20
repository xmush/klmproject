@extends('backend.layout.main')

@section('pagecss')
    
@endsection

@section('pagetitle')
    Admin Dashboard | Regular Champion
@endsection

@section('topnav')
    
@endsection

@section('usertopnav')
    
@endsection

@section('pagemenu')
    <li><a href="{{route('admin.list_peserta')}}"><i class="fa fa-fw fa-users"></i> Data Pendaftar</a></li>
    <li><a href="{{route('admin.fish_entry')}}"><i class="fa fa-fw fa-table"></i> Data Ikan</a></li>
    <li><a href="{{route('admin.add_peserta')}}`"><i class="fa fa-fw fa-user-plus"></i> Tambah Peserta</a></li>
    <li><a href="{{route('admin.add_admin')}}"><i class="fa fa-fw fa-user-plus"></i> Tambah Admin</a></li>
@endsection

@section('pagebreadcrumb')
    Dashboard > <small>Fish Regular Champion</small>
@endsection

@section('pagecontent')
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <form action="{{route('admin.store_regular_champion')}}" method="post">
                        @csrf
                        <input type="hidden" name="url_path" id="url_path" value="{{route('admin.regular_champion')}}">
                        <div class="card mb-4">
                            <div class="card-header bg-white font-weight-bold">
                                Form Tambah Regular Champion
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="varietas" class="col-sm-4 col-xs-12 col-form-label">Varietas</label>
                                    <div class="col-sm-8 col-xs-12">
                                        <select class="form-control var_id" id="var_id" name="var_id" required>
                                            <option value="">Pilih Varietas</option>
                                            @foreach ($data_var as $var)
                                                <option value="{{$var->id}}">{{$var->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="ukuran" class="col-sm-4 col-xs-12 col-form-label">Ukuran</label>
                                    <div class="col-sm-8 col-xs-12">
                                        <select class="form-control ukuran_id" id="ukuran_id" name="ukuran_id" required>
                                            <option value="">Pilih Ukuran</option>
                                            @foreach ($data_cat as $cat)
                                                <option value="{{$cat->id}}">{{$cat->min_size.'-'.$cat->max_size.' cm'}}</option>                                                
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="peserta" class="col-sm-4 col-xs-12 col-form-label">Peserta</label>
                                    <div class="col-sm-8 col-xs-12">
                                        <select class="form-control" id="peserta_id" name="peserta_id" required>
                                            <option value="">Pilih Peserta</option>
                                        </select>
                                    </div>
                                </div>                                
                                <div class="form-group row">
                                    <label for="posisi" class="col-sm-4 col-xs-12 col-form-label">Posisi</label>
                                    <div class="col-sm-8 col-xs-12">
                                        <select class="form-control" id="posisi" name="posisi" required>
                                            <option value="">Pilih Posisi</option>
                                            <option value="1"># 1</option>
                                            <option value="2"># 2</option>
                                            <option value="3"># 3</option>
                                            <option value="4"># 4</option>
                                            <option value="5"># 5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-white text-right">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>                        
                    </form>
                </div>
                <div class="col-lg-8 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="card-header bg-white font-weight-bold">
                            Data Regular Champion
                        </div>
                        <div class="card-body">
                            <table class="table" id="rc_table">
                                <thead>
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                        <th>
                                            Varietas
                                        </th>
                                        <th>
                                            Ukuran
                                        </th>
                                        <th>
                                            Posisi
                                        </th>
                                        <th>
                                            Peserta
                                        </th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($data_rc) == 0)
                                        <tr>
                                            <th colspan="6" class="text-center">
                                                Belum Ada Data
                                            </th>
                                        </tr>
                                    @else
                                        @php
                                            $n = 1;
                                        @endphp
                                        @foreach ($data_rc as $rc)
                                            <tr>
                                                <td>
                                                   {{$n++}} 
                                                </td>
                                                <td>
                                                    {{$rc->fish()->fish->name}}
                                                </td>
                                                <td>
                                                    {{$rc->fish()->cat->min_size.'-'.$rc->fish()->cat->max_size.' cm'}}
                                                </td>
                                                <td>
                                                    # {{$rc->position}}
                                                </td>
                                                <td>
                                                    {{Mush::no_reg($rc->user_fish_id)}}
                                                </td>
                                                <td>
                                                    <form action="{{route('admin.delete_regular_champion')}}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="ch_id" value="{{$rc->id}}">
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('pagejs')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>
    $(document).ready(function(){
        $.ajaxSetup({ cache: false });
        if($('#flash_data').length) {
            let type = $('#flash_data').data('type');
            let msg = $('#flash_data').data('msg');
        
            Swal.fire({
                icon: type,
                text: msg,
                showConfirmButton: true,
            });
        };

        $.getFish = function getFish() {
            var varietas = $('#var_id').val();
            var ukuran = $('#ukuran_id').val();
            var url_path = $('#url_path').val();

            var r_url = url_path+'/'+varietas+'/'+ukuran;

            $.ajax({
                url : r_url,
                success : function(json) {
                    $('#peserta_id').html('');
                    if(json.length == 0) {
                        $('#peserta_id').append($('<option>').text('Tidak Ada Ikan Terdaftar').attr('value', ''));
                    } else {
                        $('#peserta_id').append($('<option>').text('Ada '+json.length+' Peserta').attr('value', ''));
                        for (i=0; i<json.length; i++) {
                            var mstr = json[i].id;
                            $('#peserta_id').append($('<option>').text(String('0000' + mstr).slice(-4)).attr('value', json[i].id));
                        }
                    }
                    console.log(json);
                }
            });

        }

        $('.var_id').on('change', function() {
            $.getFish();
        });
        $('.ukuran_id').on('change', function() {
            $.getFish();
        });

        $('#rc_table').DataTable();
    });
    </script>
@endsection
