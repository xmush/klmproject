@extends('backend.layout.main')

@section('pagecss')
    
@endsection

@section('pagetitle')
    Admin Dashboard | Form Edit Champion
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
    Admin Dashboard | Form Edit Champion
@endsection

@section('pagecontent')
<div class="row">
    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
        <div class="card mb-4">
            <div class="card-header bg-white font-weight-bold">
                Form Edit Champion
            </div>
            <form action="{{route('admin.update_fish_champion', ['id' => $champion->id])}}" method="post">
                <div class="card-body">
                    <div class="row">
                        @csrf
                        <div class="col-12">
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-xs-12 col-form-label">Grade</label>
                                <div class="col-sm-8 col-xs-12">
                                    <select class="form-control m-b grade" name="grade" id="grade" required>
                                            <option value=""> Pilih Grade </option>
                                        @foreach ($data_cat as $cat)
                                        @if ($cat->grade == $champion->cat_champ->grade)
                                            <option value="{{$cat->grade}}" data-turl="{{route('admin.get_champion_cat', ['grade' => $cat->grade])}}"  selected>{{$cat->grade}}</option>
                                        @else
                                            <option value="{{$cat->grade}}" data-turl="{{route('admin.get_champion_cat', ['grade' => $cat->grade])}}">{{$cat->grade}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-xs-12 col-form-label">Kategori</label>
                                <div class="col-sm-8 col-xs-12">
                                    <select class="form-control m-b cat_id" name="cat_id" id="cat_id" required>
                                        <option value="{{$champion->champion_cat_id}}"> {{$champion->cat_champ->cat_name}} </option>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-xs-12 col-form-label">Peserta</label>
                                <div class="col-sm-8 col-xs-12">
                                    <select class="form-control m-b user_fish_id" name="user_fish_id" id="user_fish_id" required>
                                        <option value=""> Pilih ID Peserta </option>
                                        @foreach ($data_ikan as $fish)
                                            @if ($champion->user_fish_id == $fish->id)
                                                <option value="{{$fish->id}}" data-owner="{{$fish->user_id}}" selected> <strong>{{Mush::no_reg($fish->id)}}</strong> </option>
                                            @else
                                                <option value="{{$fish->id}}" data-owner="{{$fish->user_id}}"> <strong>{{Mush::no_reg($fish->id)}}</strong> </option>
                                            @endif
                                        @endforeach
                                        
                                    </select>
                                    <input type="hidden" name="owner" id="owner" value="{{$champion->user_id}}">
                                </div>
                            </div>                         
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary">Update</button>
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

        $('.user_fish_id').on('change', function() {
            var owner = $(this).find(':selected').data('owner');

            $('#owner').val(owner);

        });
        
    });
    </script>
@endsection