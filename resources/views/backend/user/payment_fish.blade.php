@extends('backend.layout.main_user')

@section('pagecss')
    
@endsection

@section('pagetitle')
    User Payment Data
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
    User Payment Data
@endsection

@section('pagecontent')
    <div class="row">
        <div class="col-12">
            @if (count($fish_bl) > 0)
                <div class="card mb-4">
                    <div class="card-header bg-white font-weight-bold">
                        Data Pembayaran Belum Lunas
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($fish_bl as $fbl)
                                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mb-3">
                                    <div class="card" style="">
                                        <img class="card-img-top" src="{{$fbl->fish_picture_thumb}}" alt="Card image cap">
                                        <div class="card-body text-center px-2">
                                            <strong>[{{Mush::no_reg($fbl->fish->id)}}]</strong> <br>
                                            <small>{{$fbl->fish->name}}</small>
                                            <p class="card-text mb-1"><span class="badge badge-warning">{{$fbl->status}}</span></p>
                                            {{-- <a href="{{route('user.detail_fish', ['id' => $fbl->id])}}" class="btn btn-sm btn-info">Detail</a> --}}
                                            {{-- <a href="{{route('user.detail_fish', ['id' => $fbl->id])}}" class="btn btn-sm btn-info">Detail</a> --}}
                                            @php
                                                $date = Carbon\Carbon::parse($fbl->created_at);
                                            @endphp
                                            <a href="{{route('user.detail_nota_fish', ['id' => $fbl->id])}}" class="btn btn-sm btn-primary btn-block">Detail Nota</a>
                                            <button type="button" target="_blank" data-route_url="{{route('user.detail_fish', ['id' => $fbl->id])}}" class="btn btn-sm btn-success btn-block" id="btn_print">Print Nota</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            @if (count($fish_l) > 0)
                <div class="card mb-4">
                    <div class="card-header bg-white font-weight-bold">
                        Data Pembayaran Lunas
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($fish_l as $fl)
                                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mb-3">
                                    <div class="card" style="">
                                        <img class="card-img-top" src="{{$fl->fish_picture_thumb}}" alt="Card image cap">
                                        <div class="card-body text-center px-2">
                                            <strong>[{{Mush::no_reg($fl->fish->id)}}]</strong> <br>
                                            <small>{{$fl->fish->name}}</small>
                                            <p class="card-text mb-1"><span class="badge badge-warning">{{$fl->status}}</span></p>
                                            {{-- <a href="{{route('user.detail_fish', ['id' => $fl->id])}}" class="btn btn-sm btn-info">Detail</a> --}}
                                            <a href="{{route('user.detail_nota_fish', ['id' => $fl->id])}}" class="btn btn-sm btn-primary btn-block">Detail Nota</a>
                                            <button type="button" target="_blank" data-route_url="{{route('user.detail_fish', ['id' => $fl->id])}}" class="btn btn-sm btn-success btn-block" id="btn_print">Print Nota</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            @if (count($fish_l) == 0 && count($fish_bl) == 0)
                <div class="card mb-4">
                    <div class="card-header bg-white font-weight-bold">
                        Data Pembayaran Belum Ada
                    </div>
                    <div class="card-body text-center">
                        <h3>Belum ada ikan terdaftar</h3>
                        <a href="{{route('user.regis_ikan', ['id' => auth()->user()->id])}}" class="btn btn-lg btn-success" id="btn_print">Daftar Ikan</a>                        
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('pagejs')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
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

        $('.btn_print').on('click', function(){
            var doc = new jsPDF({
                orientation : 'p',
                unit        : 'mm',
                format      : [200, 300]
            });
            doc.setFont("helvetica");
            doc.setFontType("bold");
            doc.setFontSize(9);
            doc.text('Hello world!<br>sdasdsa', 10, 10);
            doc.save('bill.pdf');
        });

    })
    </script>
@endsection

