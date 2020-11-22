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
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header bg-white font-weight-bold">
                    <div class="row">
                        <div class="col-6">
                            Data Ikan
                        </div>
                        <div class="col-6 text-right">
                            @if (count($data_fish) != 0)
                                <a href="{{route('user.regis_ikan', ['id' => $user_id])}}" class="btn btn-sm btn-success">Tambah Ikan</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (count($data_fish) != 0)
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>
                                        Reg ID
                                    </th>
                                    <th>
                                        Jenis Ikan
                                    </th>
                                    <th>
                                        Ukuran
                                    </th>
                                    <th>
                                        Kelas
                                    </th>
                                    <th>
                                        Grade
                                    </th>
                                    <th>
                                        Biaya
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
        
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $n = 1;
                                @endphp
                                @foreach ($data_fish as $fish)
                                    <tr>
                                        <td>{{$n++}}</td>
                                        <td>
                                            <strong>{{Mush::no_reg($fish->id)}}</strong>
                                        </td>
                                        <td>
                                            {{$fish->fish->name}}
                                        </td>
                                        <td>
                                            {{$fish->fish_size}}
                                        </td>
                                        <td>
                                            {{$fish->cat->min_size.' - '.$fish->cat->max_size.' cm'}}
                                        </td>
                                        <td>
                                            {{$fish->cat->grade}}
                                        </td>
                                        <td>
                                            {{number_format($fish->cat->reg_price)}}
                                        </td>
                                        <td>
                                            <span class="badge badge-warning">{{$fish->status}}</span>
                                        </td>
                                        <td>
                                            <a href="{{route('user.detail_fish', ['id' => $fish->id])}}" class="btn btn-primary">Detail</a>
                                            
                                        </td>
                                    </tr>    
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                        <div class="col-12 text-center">
                            <h3>Belum ada ikan terdaftar</h3>
                            <a href="{{route('user.regis_ikan', ['id' => $user_id])}}" class="btn btn-lg btn-success">Daftar Ikan</a>
                        </div>
                    @endif
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
                    showConfirmButton: true
                });
        };
    });
    </script>
@endsection

