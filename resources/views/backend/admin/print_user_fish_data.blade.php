<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$user->bio->nama}} Fish Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://printjs-4de6.kxcdn.com/print.min.css">
    <style>
    img {
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 5px;
        max-width: 100%;
    }
    @media print {
        body{ overflow:visible; }
        .newpage {
            display: block;
            page-break-after: always;
        }
    }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mb-3">Koi Lovers Makassar Project | Data Ikan : {{$user->bio->nama}}</h2>
        <div class="col-md-12 mt-3">
            <div class="row prit">
                @php
                    $n=1;
                @endphp
                @foreach ($fishs as $fish)
                    <div class="col-3 mb-2">
                        <img src="{{$fish->fish_picture}}">
                    </div>
                    <div class="col-3 pl-3 mb-2">
                        <strong>
                            {{'Reg ID : '.Mush::no_reg($fish->id)}}
                        </strong>
                        <hr class="m-0">
                        <i>
                            Owner :
                        </i><br>
                        <small>
                            {{$fish->bio->nama}}
                        </small><br><hr class="m-0">
                        <i>
                            Variety :
                        </i><br>
                        <small>
                            {{$fish->fish->name}}
                        </small><br><hr class="m-0">
                        <i>
                            Size :
                        </i><br>
                        <small>
                            {{$fish->fish_size.'cm ('.$fish->cat->min_size.' cm - '.$fish->cat->max_size.' cm)'}}
                        </small><br><hr class="m-0">
                        <i>
                            Handler :
                        </i><br>
                        <small>
                            {{$fish->handler_name}}
                        </small><br><hr class="m-0">
                        <i>
                            Kota :
                        </i><br>
                        <small>
                            {{$fish->bio->kota}}
                        </small><br><hr class="m-0">
                    </div>

            @if ($loop->iteration % 8 == 0)
                </div>
                <div class="newpage"></div>  
                <div class="row">
            @endif
            {{-- @if ($n%6 == 0)
                </div>
                xxxxx
                <div class="row">
            @elseif($n == count($fishs))
                </div>
            @endif --}}
                @endforeach
                {{-- <div class="col-3">
                    data
                </div>
                <div class="col-3">
                    data
                </div> --}}
            </div>
        </div>      
    </div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
<script>
    $(document).ready(function(){
        // $.ajaxSetup({ cache: false });
        setTimeout(function(){ 
            window.print();
            setTimeout(window.close, 0);
        }, 2000);
    });
</script>
</body>
</html>