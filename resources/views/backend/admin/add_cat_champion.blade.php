@extends('backend.layout.main')

@section('pagecss')
    
@endsection

@section('pagetitle')
    Admin Dashboard | Form Add Champion
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
    Admin Dashboard | Champion Category
@endsection

@section('pagecontent')
<div class="row">
    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
        <div class="card mb-4">
            <div class="card-header bg-white font-weight-bold">
                <div class="row">
                    <div class="col-6">
                        List Category
                    </div>
                    <div class="col-6 text-right">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="accordion" id="accordionExample">
                            @foreach ($data_cat as $cat)
                                <div class="card">
                                    <div class="card-header font-weight-bold" id="headingOne">
                                        <a href="#" data-toggle="collapse" data-target="#{{str_replace(' ','',$cat->grade)}}" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                                            <div class="row">
                                                <div class="col">
                                                    {{$cat->grade}}
                                                </div>
                                                <div class="col-auto collapse-icon"></div>
                                            </div>
                                        </a>
                                        
                                    </div>
                                    <div id="{{str_replace(' ','',$cat->grade)}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                        <div class="card-body">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            #
                                                        </th>
                                                        <th>
                                                            Position
                                                        </th>
                                                        <th>

                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $nm = 1;
                                                    @endphp
                                                    @foreach ($data_position as $pos)
                                                        @if ($pos->grade == $cat->grade)
                                                            <tr>
                                                                <td>
                                                                    {{$nm++}}
                                                                </td>
                                                                <td>
                                                                    {{$pos->cat_name}}
                                                                </td>
                                                                <td class="text-right">
                                                                    {{-- {{$pos->id}} --}}
                                                                    <form action="" method="post">
                                                                        @csrf
                                                                        <input type="hidden" name="champ_id" value="{{$pos->id}}">
                                                                        <button type="button" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></button>
                                                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></button>

                                                                    </form>
                                                                </td>
                                                            </tr>   
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>                                    
                                </div>
                            @endforeach
                        </div>
                        {{-- <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Champion Category
                                    </th>
                                    <th>
                                        Position
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $n=1;
                                @endphp
                                @foreach ($data_cat as $cat)
                                    <tr>
                                        <td>{{$n++}}</td>
                                        <td>{{$cat->grade}}</td>
                                        <td>{{$cat->cat_name}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table> --}}
                    </div>
                </div>
            </div>
            <div class="card-footer bg-white">
                <div class="form-group text-right">
                    {{'show '.count($data_cat).' Champion and '.count($data_position).' Positon'}}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
        <div class="card mb-4">
            <div class="card-header bg-white font-weight-bold">
                <div class="row">
                    <div class="col-6">
                        Form Add Champion Category
                    </div>
                    <div class="col-6 text-right">
                    </div>
                </div>
            </div>
            <form action="{{route('admin.store_cat_champion')}}" method="post">
                <div class="card-body">
                    <div class="row">
                        @csrf
                        <div class="col-12">
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-xs-12 col-form-label">Type</label>
                                <div class="col-sm-8 col-xs-12">
                                    <input class="form-control" type="text" id="grade" name="grade" placeholder="Champion Type">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-xs-12 col-form-label">Position</label>
                                <div class="col-sm-8 col-xs-12">
                                    <input class="form-control" type="text" id="position" name="position" placeholder="Champion Position">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-xs-12 col-form-label">Deskripsi</label>
                                <div class="col-sm-8 col-xs-12">
                                    <input class="form-control" type="text" id="desc" name="desc" placeholder="Champion Description">
                                </div>
                            </div>                       
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </div>                
            </form>
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

        $('.grade').on('change', function(){
            var grade = $('#grade').val();
            var turl = $(this).find(':selected').data('turl');
            if(grade != '') {
                $.ajax({
                    url : turl,
                    cache: false,
                    success: function(json) {
                        $("#cat_id").html('');
                        if(Object.keys(json).length > 0) {
                            for(i=0; i<Object.keys(json).length; i++) {
                                if(i==0) {
                                    $('#cat_id').append($('<option selected>').text(json[i].cat_name).attr('value', json[i].id));
                                } else {
                                    $('#cat_id').append($('<option>').text(json[i].cat_name).attr('value', json[i].id));
                                }
                            }
                        } else {
                            $('.cat_id').append($('<option>').text('Ikan Belum Lunas, Atau Ikan Belum Terdaftar').attr('value', ''));
                        }
                        // console.log($('#cat_id').val());
                    }
                });
            }
        });

        $('.owner').on('change', function(){
            var turl = $(this).find(':selected').data('turl');
            if(grade != '') {
                $.ajax({
                    url : turl,
                    cache: false,
                    success: function(json) {
                        $("#user_fish_id").html('');
                        if(Object.keys(json).length > 0) {
                            for(i=0; i<Object.keys(json).length; i++) {
                                if(i==0) {
                                    $('#user_fish_id').append($('<option selected>').text(json[i].id +' | '+json[i].fish.name).attr('value', json[i].id));
                                } else {
                                    $('#user_fish_id').append($('<option>').text(json[i].id +' | '+json[i].fish.name).attr('value', json[i].id));
                                }
                            }
                        } else {
                            $('.user_fish_id').append($('<option>').text('Tidak Ada Ikan Pada User Ini').attr('value', ''));
                        }
                        console.log(json);
                    }
                });
            }
        });
    });
    </script>
@endsection