@extends('backend.layout.main')

@section('pagecss')
    
@endsection

@section('pagetitle')
    Dashboard | Fish Point List
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
Dashboard | Fish Point List
@endsection

@section('pagecontent')
    <div class="card mb-4">
        <div class="card-header bg-white font-weight-bold">
            <div class="row">
                <div class="col-6">
                    Data Fish Point Peserta
                </div>
                <div class="col-6 text-right">
                    @if (count($data_point) > 0)
                        <a href="{{route('admin.add_fish_point')}}" class="btn btn-primary">Tambah Data Point</a>
                    @endif
                </div>
            </div>
        </div>
        <div class="card-body">
            @if (count($data_point) == 0)
                <div class="col-12 text-center">
                    <h3>
                        Belum ada data
                    </h3>
                    <a href="{{route('admin.add_fish_point')}}" class="btn btn-lg btn-primary">Tambah Data Point</a>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-striped" id="data_point">
                        <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    Reg ID
                                </th>
                                <th>
                                    Nama Owner
                                </th>
                                <th>
                                    Kota Asal
                                </th>
                                <th>
                                    Size
                                </th>
                                <th>
                                    Point
                                </th>
                                <th>

                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $n = 1;
                            @endphp
                            @foreach ($data_point as $point)
                                <tr>
                                    <td>
                                        {{$n++}}
                                    </td>
                                    <td>
                                        {{Mush::no_reg($point->user_fish->id)}}
                                    </td>
                                    <td>
                                        {{$point->user->bio->nama}}
                                    </td>
                                    <td>
                                        {{$point->user->bio->kota}}
                                    </td>
                                    <td>
                                        {{$point->user_fish->fish_size.' Cm'}}
                                    </td>
                                    <td>
                                        {{$point->point}}
                                    </td>
                                    <td class="text-right">
                                        <form action="{{route('admin.delete_fish_point')}}" method="post">
                                            @csrf
                                            <a href="{{route('admin.show_fish_point', ['id' => $point->user_fish->id])}}" class="btn btn-sm btn-success">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <input type="hidden" name="point_id" value="{{$point->id}}">
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
        <div class="card-footer bg-white">
            <div class="row">
                <div class="col-6">
                    {{-- Show {{count($data_peserta)}} Participant --}}
                </div>
                <div class="col-6 text-right">
                    {{-- {{$data_peserta->links()}} --}}
                </div>
            </div>
        </div>
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

        $('#data_point').DataTable();
    });
    </script>
@endsection
