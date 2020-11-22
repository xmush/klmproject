@extends('backend.layout.main_user')

@section('pagecss')
    
@endsection

@section('pagetitle')
    User Dashboard
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
    Client Dashboard
@endsection

@section('pagecontent')
    <div class="card mb-4">
        <div class="card-body">
            <a href="{{route('user.personal', ['id' => auth()->user()->id])}}" class="btn btn-block btn-lg btn-primary"> Data Diri</a>
            <a href="{{route('user.fish', ['id' => auth()->user()->id])}}" class="btn btn-block btn-lg btn-primary"> Entry Ikan</a>
            <a href="{{route('user.payment_fish')}}" class="btn btn-block btn-lg btn-primary"> Pembayaran</a>
            <a href="{{route('user.report_all_fish_nota', ['id' => auth()->user()->id])}}" class="btn btn-block btn-lg btn-primary"> Print Nota</a>
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
});
</script>
@endsection

