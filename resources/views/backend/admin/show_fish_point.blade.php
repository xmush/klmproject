@extends('backend.layout.main')

@section('pagecss')
    
@endsection

@section('pagetitle')
    Admin Dashboard | Tambah Penilaian Ikan
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
    Admin Dashboard | Edit Penilaian Ikan
@endsection

@section('pagecontent')
<div class="row">
    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
        <form action="{{route('admin.update_fish_point', ['id' => $point->id])}}" method="post">
            @csrf
            <div class="card mb-4">
                <div class="card-header bg-white font-weight-bold">
                    Form Edit Penilain Ikan
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-xs-12 col-form-label">ID Peserta</label>
                                <div class="col-sm-8 col-xs-12">
                                    <select class="form-control m-b user_fish_id" name="user_fish_id" id="user_fish_id" required>
                                        <option value=""> Pilih Peserta Reg ID </option>
                                        @foreach ($data_peserta as $peserta)
                                            @if ($point->user_fish_id == $peserta->id)
                                                <option value="{{$peserta->id}}" data-owner_id="{{$peserta->user_id}}" selected> {{Mush::no_reg($peserta->id)}}</option>
                                            @else
                                                <option value="{{$peserta->id}}" data-owner_id="{{$peserta->user_id}}"> {{Mush::no_reg($peserta->id)}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{$point->user_id}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-xs-12 col-form-label">Point</label>
                                <div class="col-sm-8 col-xs-12">
                                    <input type="number" class="form-control" name="fish_point" id="fish_point" value="{{$point->point}}" placeholder="Perolehan Point" required>
                                </div>
                            </div>                                                                                                                                                                                                                        
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <div class="form-group row">
                        <div class="col-sm-4 col-xs-6 text-left">
                        </div>
                        <div class="col-sm-8 col-xs-6 text-right">
                            <button type="submit" class="btn btn-primary" id="btn_submit">Update</button>
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

        $('.user_fish_id').on('change', function() {
            var owner_id = $(this).find(':selected').data('owner_id');

            $('#user_id').val(owner_id);
        });

    });
    </script>
@endsection