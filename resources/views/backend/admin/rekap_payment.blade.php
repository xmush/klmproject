@extends('backend.layout.main')

@section('pagecss')
    
@endsection

@section('pagetitle')
    Admin Dashboard | Rekap Pembayaran Ikan
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
    Admin > Data Rekap Pembayaran Peserta
@endsection

@section('pagecontent')
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
            <div class="card mb-2">
                <div class="card-header bg-white font-weight-bold">
                    <div class="row">
                        <div class="col-8">
                            Data Pembayaran
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{route('admin.print_all_rekap_payment')}}" target="_blank" class="btn btn-primary"><i class="fa fa-fw fa-print"></i> Print</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="data_semua" border="0" cellpadding="0" cellspacing="1" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Fee
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Detail
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $a = 1;
                                    $tall = 0;
                                @endphp
                                @foreach ($all_data as $all)
                                    @if ($all->status == 'LUNAS')
                                        <tr class="table-success">
                                    @else
                                        <tr class="table-warning">
                                    @endif
                                        <td>{{$a++}}</td>
                                        <td>{{Mush::no_reg($all->id)}}</td>
                                        <td>{{$all->cat->reg_price}}</td>
                                        <td>
                                            @if ($all->status == 'LUNAS')
                                                <span class="badge badge-success">{{$all->status}}</span>
                                            @else
                                                <span class="badge badge-warning">{{$all->status}}</span>                                                
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('admin.detail_user_fish', ['id' => $all->id])}}" class="btn btn-sm btn-primary"><i class="fa fa-search"></i></a>
                                        </td>
                                        @php
                                            $tall = $tall + $all->cat->reg_price;
                                        @endphp
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <div class="row">
                        <div class="col-6">
                            <!-- total data -->
                            <strong>Total Pembayaran :</strong>
                        </div>
                        <div class="col-6 text-right">
                            <!-- pagination -->
                            <strong>Rp. {{number_format($tall)}},00</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
            <div class="card mb-2">
                <div class="card-header bg-white font-weight-bold">
                    {{-- Data Lunas --}}
                    <div class="row">
                        <div class="col-8">
                            Data Lunas
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{route('admin.print_lunas_rekap_payment')}}" target="_blank" class="btn btn-primary"><i class="fa fa-fw fa-print"></i> Print</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="data_lunas" border="0" cellpadding="0" cellspacing="1" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Fee
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Detail
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $a = 1;
                                    $tl = 0;
                                @endphp
                                @foreach ($data_lunas as $l)
                                    <tr class="table-success">
                                        <td>{{$a++}}</td>
                                        <td>{{Mush::no_reg($l->id)}}</td>
                                        <td>{{$l->cat->reg_price}}</td>
                                        <td>
                                            <span class="badge badge-success">{{$l->status}}</span>
                                        </td>
                                        <td>
                                            <a href="{{route('admin.detail_user_fish', ['id' => $l->id])}}" class="btn btn-sm btn-success"><i class="fa fa-search"></i></a>    
                                        </td>
                                    </tr>
                                    @php
                                        $tl = $tl + $l->cat->reg_price
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <div class="row">
                        <div class="col-6">
                            <!-- total data -->
                            <strong>Total Lunas :</strong>
                        </div>
                        <div class="col-6 text-right">
                            <!-- pagination -->
                            <strong>Rp. {{number_format($tl)}},00</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
            <div class="card mb-2">
                <div class="card-header bg-white font-weight-bold">
                    <div class="row">
                        <div class="col-8">
                            Data Belum Lunas
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{route('admin.print_blunas_rekap_payment')}}" target="_blank" class="btn btn-primary"><i class="fa fa-fw fa-print"></i> Print</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="data_belum_lunas" border="0" cellpadding="0" cellspacing="1" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Fee
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Detail
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $a = 1;
                                    $tb = 0;
                                @endphp
                                @foreach ($data_tlunas as $b)
                                    <tr class="table-warning">
                                        <td>{{$a++}}</td>
                                        <td>{{Mush::no_reg($b->id)}}</td>
                                        <td>{{$b->cat->reg_price}}</td>
                                        <td>
                                            <span class="badge badge-warning">{{$b->status}}</span>
                                        </td>
                                        <td>
                                            <a href="{{route('admin.detail_user_fish', ['id' => $b->id])}}" class="btn btn-sm btn-warning"><i class="fa fa-search"></i></a>
                                        </td>
                                    </tr>
                                    @php
                                        $tb = $tb + $b->cat->reg_price
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <div class="row">
                        <div class="col-6">
                            <!-- total data -->
                            <strong>Total Belum Lunas :</strong>
                        </div>
                        <div class="col-6 text-right">
                            <!-- pagination -->
                            <strong>Rp. {{number_format($tb)}},00</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('pagejs')
    <script>
    $(document).ready(function(){
        $('.sidebar-toggle').click();
        $('#data_semua').DataTable({
            "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
            "pageLength": 5,
            "info":     false
        });
        $('#data_lunas').DataTable({
            "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
            "pageLength": 5,
            "info":     false
        });
        $('#data_belum_lunas').DataTable({
            "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
            "pageLength": 5,
            "info":     false
        });
    });
    </script>
@endsection
