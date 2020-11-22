@extends('portal.layout.main2')

@section('page_title')
    KLM Project | Summary
@endsection

@section('content')
    <div class="card bg-light mb-3">
        <div class="card-header">
            Summary
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Jumlah Pendaftar</th>
                        <td>{{$n_own.' Orang'}}</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Jumlah Handler</th>
                        <td>{{$t_hand.' Orang'}}</td>
                    </tr>
                    <tr>
                        <th>Jumlah Ikan</th>
                        <td>{{$n_fish.' Ikan'}}</td>
                    </tr>
                    <tr>
                        <th>Ikan Terbanyak</th>
                        <td>{{$n_var->fish->name.' ('.$n_var->total.' Ekor)'}}</td>
                    </tr>
                    <tr>
                        <th>Provinsi Terbanyak</th>
                        <td>{{$n_prov->prov.' ('.$n_prov->t_prov.' Pendaftar)'}}</td>
                    </tr>
                    <tr>
                        <th>Owner Terbanyak</th>
                        <td>{{$t_owner->user->bio->nama.' ('.$t_owner->t_owner.' Peserta)'}}</td>
                    </tr>
                    <tr>
                        <th>Handling Terbanyak</th>
                        <td>{{$n_hand->handler_name.' ('.$n_hand->t_handler.' Ikan)'}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection