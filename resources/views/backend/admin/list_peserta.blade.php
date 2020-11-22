@extends('backend.layout.main')

@section('pagecss')
    
@endsection

@section('pagetitle')
    Admin Dashboard | Data Peserta
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
    Admin > Data Peserta
@endsection

@section('pagecontent')
    <div class="card mb-4">
        <div class="card-header bg-white font-weight-bold">
            Data Peserta
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="list_peserta">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>
                                Nama
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Kontak
                            </th>
                            <th>
                                Prowinsi
                            </th>
                            <th>
                                Kab/Kota
                            </th>
                            <th>
                                Fish
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $n = 1;
                        @endphp
                        @foreach ($data_peserta as $pes)
                            <tr>
                                <td>
                                    {{$n++}}
                                </td>
                                <td>
                                    {{$pes->bio->nama}}
                                </td>
                                <td>
                                    {{$pes->bio->email}}
                                </td>
                                <td>
                                    {{$pes->bio->no_hp}}
                                </td>
                                <td>
                                    {{$pes->bio->prov}}
                                </td>
                                <td>
                                    {{$pes->bio->kota}}
                                </td>
                                <td>
                                    <a href="{{route('admin.peserta_fish', ['id' => $pes->id])}}" class="btn btn-primary">Lihat Ikan</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer bg-white">
            <div class="row">
                <div class="col-6">
                    Show {{count($data_peserta)}} Participant
                </div>
                <div class="col-6 text-right">
                    {{-- {{$data_peserta->links()}} --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('pagejs')
    <script>
    $(document).ready(function(){
        $('#list_peserta').DataTable();
    });
    </script>
@endsection
