@extends('portal.layout.main2')

@section('page_title')
    KLM Project | Summary
@endsection

@section('content')
    <div class="card bg-light mb-3">
        <div class="card-header">
            Top 20 Fish Point
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Owner</th>
                        <th>Asal</th>
                        <th>Point</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($points as $point)
                        <tr>
                            <td>{{$point->user->bio->nama}}</td>
                            <td>{{$point->user->bio->prov.', '.$point->user->bio->kota}}</td>
                            <td>{{$point->point}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection