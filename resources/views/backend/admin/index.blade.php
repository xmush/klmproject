@extends('backend.layout.main')

@section('pagecss')
    
@endsection

@section('pagetitle')
    Admin Dashboard
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
    Dashboard
@endsection

@section('pagecontent')
    <div class="row">
        <div class="col-md">
            <div class="d-flex border">
                <div class="bg-dark text-light p-4">
                    <div class="d-flex align-items-center h-100">
                        <i class="fa fa-3x fa-fw fa-user"></i>
                        {{-- s/? --}}
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <p class="text-uppercase text-secondary mb-0">Total Owner</p>
                    <h3 class="font-weight-bold mb-0">{{$n_owner}}</h3>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="d-flex border">
                <div class="bg-primary text-light p-4">
                    <div class="d-flex align-items-center h-100">
                        <i class="fa fa-3x fa-fw fa-users"></i>
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <p class="text-uppercase text-secondary mb-0">Total Peserta</p>
                    <h3 class="font-weight-bold mb-0">{{$n_peserta}}</h3>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="d-flex border">
                <div class="bg-success text-light p-4">
                    <div class="d-flex align-items-center h-100">
                        <i class="fa fa-3x fa-fw fa-check"></i>
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <p class="text-uppercase text-secondary mb-0">Lunas</p>
                    <h3 class="font-weight-bold mb-0">{{$n_lfish}}</h3>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="d-flex border">
                <div class="bg-warning text-light p-4">
                    <div class="d-flex align-items-center h-100">
                        <i class="fa fa-3x fa-fw fa-clock-o"></i>
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <p class="text-uppercase text-secondary mb-0">Belum Lunas</p>
                    <h3 class="font-weight-bold mb-0">{{$n_bfish}}</h3>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md">
            <div class="d-flex border">
                <div class="bg-primary text-light p-4">
                    <div class="d-flex align-items-center h-100">
                        <i class="fa fa-3x fa-fw fa-money"></i>
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <p class="text-uppercase text-secondary mb-0">Total Tagihan</p>
                    <h4 class="font-weight-bold mb-0">Rp. {{number_format($n_payment)}},00</h4>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="d-flex border">
                <div class="bg-success text-light p-4">
                    <div class="d-flex align-items-center h-100">
                        <i class="fa fa-3x fa-fw fa-money"></i>
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <p class="text-uppercase text-secondary mb-0">Tagihan Lunas</p>
                    <h4 class="font-weight-bold mb-0">Rp. {{number_format($n_lpayment)}},00</h4>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="d-flex border">
                <div class="bg-warning text-light p-4">
                    <div class="d-flex align-items-center h-100">
                        <i class="fa fa-3x fa-fw fa-money"></i>
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <p class="text-uppercase text-secondary mb-0">Belum Lunas</p>
                    <h4 class="font-weight-bold mb-0">Rp. {{number_format($n_bpayment)}},00</h4>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('pagejs')
    
@endsection

