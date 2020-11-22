@extends('backend.layout.main')

@section('pagecss')
    
@endsection

@section('pagetitle')
    Admin Dashboard | Data Ikan Peserta
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
    Admin > Data Ikan Peserta
@endsection

@section('pagecontent')
    <div class="card mb-4">
        <div class="card-header bg-white font-weight-bold">
            <div class="row">
                <div class="col-4">
                    Data Ikan
                </div>
                <div class="col-8 text-right">
                    <a href="{{route('admin.print_user_data', ['user_id' => $user_id])}}" class="btn btn-primary" target="_blank"><i class="fa fa-print"></i> Data</a>
                    <a href="{{route('admin.print_user_sticker', ['id' => $user_id])}}" class="btn btn-success" target="_blank"><i class="fa fa-print"></i> Sticker</a>
                    <a href="{{route('admin.print_user_nota', ['user_id' => $user_id])}}" class="btn btn-warning" target="_blank"><i class="fa fa-print"></i> Nota</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="fish_peserta">
                    <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                Reg Id
                            </th>
                            <th>
                                Varietas
                            </th>
                            <th>
                                Size
                            </th>
                            <th>
                                Grade
                            </th>
                            <th>
                                Reg Fee
                            </th>
                            <th>
                                Status
                            </th>
                            <th>
                                Tanggal Reg
                            </th>
                            <th>
                                Detail
                            </th>
                            <th>
                                -
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $n = 1;
                        @endphp
                        @foreach ($data_fish as $fs)
                        <tr>
                            <td>
                                {{$n++}}
                            </td>
                            <td>
                                {{Mush::no_reg($fs->id)}}
                            </td>
                            <td>
                                {{$fs->fish->name}}
                            </td>
                            <td>
                                {{$fs->fish_size}}
                            </td>
                            <td>
                                {{$fs->cat->grade}}
                            </td>
                            <td>
                                {{'Rp. '.number_format($fs->cat->reg_price).',00'}}
                            </td>
                            <td>
                                @if ($fs->status == 'LUNAS')
                                    <span class="badge badge-success">{{$fs->status}}</span>
                                @else
                                    <span class="badge badge-warning">{{$fs->status}}</span>
                                @endif
                            </td>
                            <td>
                                {{$fs->date_reg}}
                            </td>
                            <td>
                                <a href="{{route('admin.detail_user_fish', ['id' => $fs->id])}}" class="btn btn-primary"><i class="fa fa-search"></i></a>
                                @if ($fs->status == 'BELUM LUNAS')
                                    <form action="{{route('admin.confirm_reg_fish')}}" method="post" style="display:inline;">
                                        @csrf
                                        <input type="hidden" name="fish_id" value="{{$fs->id}}">
                                        <input type="hidden" name="status" value="LUNAS">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i></a>
                                        {{-- <button href="{{route('admin.confirm_reg_fish', ['id' => $fs->id])}}" class="btn btn-success">Konfirmasi</a> --}}
                                    </form>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('admin.print_user_fish_nota', ['fish_id' => $fs->id])}}" class="btn btn-warning" target="_blank"><i class="fa fa-print"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer bg-white">
            Show {{count($data_fish)}} Fish Registered
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

        $('#fish_peserta').DataTable();
    });
    </script>

    
@endsection
