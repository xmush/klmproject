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
    <div class="card" id="print_this">
        <div class="card-body">
            <div class="row py-2">
                <div class="col-md-10 offset-md-1">
                    <div class="row">
                        <div class="col-md">
                            <h3 class="text-uppercase">KOI LOVERS MAKASSAR PROJECT</h3>
                        </div>
                        <div class="col-md text-md-right">
                            <p class="mt-2 mb-0">
                                <Strong>Jl. Adhyaksa No. 1 Makassar</Strong><br>
                                Sulawesi Selatan, Indonesia.
                            </p>
                        </div>
                    </div>

                    <hr class="my-2">

                    <div class="row">
                        <div class="col-md">
                            <strong class="text-uppercase">Tanggal</strong>
                            <p class="mb-0">
                                {{Carbon\Carbon::now()->format('l, Y/m/d')}}
                            </p>
                        </div>
                        <div class="col-md text-md-center">
                            <strong class="text-uppercase">No. Bill</strong>
                            <p class="mb-0">
                                @php
                                $date = Carbon\Carbon::parse($fish->created_at)->format('Ymd_His');
                                @endphp
                                <strong>#{{$date.'/'.$fish->user_id.'/'.$fish->bio_id.'/'.$fish->id}}</strong>
                            </p>
                        </div>
                        <div class="col-md text-md-right">
                            <strong class="text-uppercase">Tagihan Untuk</strong>
                            <p class="mb-0 text-uppercase">
                                {{$fish->bio->nama}} <br>
                            </p>
                        </div>
                        <div class="col-md text-md-right">
                            <strong class="text-uppercase">Pembayaran Ke</strong>
                            <p class="mb-0">
                                152 000 498204 3 (Mandiri)<br>
                                An. Ridho Yuwono<br>
                            </p>
                        </div>
                    </div>

                    <hr class="my-1">

                    <table class="table table-borderless mb-0">
                        <thead>
                        <tr class="border-bottom text-uppercase">
                            <th scope="col">No. Reg</th>
                            <th scope="col">Varietas</th>
                            <th scope="col">Ukuran</th>
                            <th scope="col" class="text-right">Biaya</th>
                            <th scope="col" class="text-right">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{Mush::no_reg($fish->id)}}</td>
                            <td>{{$fish->fish->name}}</td>
                            <td>{{$fish->cat->min_size.' - '.$fish->cat->max_size.' cm'}}</td>
                            <td class="text-right">{{'Rp. '.number_format($fish->cat->reg_price).',00'}}</td>
                            <td class="text-right">{{'Rp. '.number_format($fish->cat->reg_price).',00'}}</td>
                        </tr>
                        <tr class="bg-light font-weight-bold">
                            <td></td>
                            <td></td>
                            <td class="text-uppercase">TOTAL</td>
                            <td class="text-right">{{'Rp. '.number_format($fish->cat->reg_price).',00'}}</td>
                        </tr>
                        <tr class="bg-light font-weight-bold">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-uppercase">STATUS</td>
                            @if ($fish->status == "LUNAS")
                                <td class="text-right bg-success">{{$fish->status}}</td>
                            @else
                                <td class="text-right bg-danger">{{$fish->status}}</td>
                            @endif
                        </tr>
                        <tr class="bg-light font-weight-bold">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-uppercase">CP</td>
                            <td class="text-right">0852 9722 2999 (Ridho)</td>
                        </tr>
                        <tr class="bg-light font-weight-bold">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-uppercase">CP2</td>
                            <td class="text-right">0812 4151 0808 (Abe)</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col text-center mt-2">
        <button class="btn btn-secondary btn-block btn_print" id="btn_print">Print</button>
    </div>
@endsection

@section('pagejs')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="{{asset('/printjs/Print.js')}}"></script>
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

        // $('.btn_print').on('click', function () {
        //         printJS({
        //         printable: 'printElement',
        //         type: 'html',
        //         targetStyles: ['*']
        //         })
        //     });

        function print() {
            printJS({
            printable: 'print_this',
            type: 'html',
            targetStyles: ['*']
        })
        }

        document.getElementById('btn_print').addEventListener ("click", print)
    });

    </script>
@endsection

{{-- function print() {
	printJS({
    printable: 'printElement',
    type: 'html',
    targetStyles: ['*']
 })
} --}}

{{-- document.getElementById('printButton').addEventListener ("click", print) --}}