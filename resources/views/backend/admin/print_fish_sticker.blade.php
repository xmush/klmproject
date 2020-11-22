<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="style.css"> --}}
    <style>  
    img {
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 5px;
        max-width: 100%;
    }
    .tab {
        width: 24%;
        display: inline-block;
    }
    </style>
</head>
<body>
    <div class="container">

        @php
            $n = 1;
        @endphp
        @foreach ($data_stc as $stc)
            <div class="tab mt-2">
                <div class="card">
                    <div class="card-header text-center px-1" style="font-weight: bold; font-size: 14px">
                        {{$stc->fish->name}}
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-center py-1">
                            <small>ID : [{{Mush::no_reg($stc->id)}}]</small>
                        </li>
                        <li class="list-group-item text-center py-1">
                            <small>
                                SIZE : 
                                @if ($stc->fish_size == null)
                                    -
                                @else    
                                    {{$stc->fish_size}}
                                @endif
                                cm
                            </small>
                        </li>
                    </ul>
                    <div class="card-body p-0">
                        <img src="{{$stc->fish_picture}}">
                    </div>
                    {{-- <hr class="m-0"> --}}
                </div>
                {{-- <div class="sticker">
                    <div><strong>{{$stc->fish->name}}</strong></div>
                    <div><strong>{{Mush::no_reg($stc->id)}}</strong></div>
                    <div><strong>
                        @if ($stc->fish_size == null)
                            -
                        @else    
                            {{$stc->fish_size}}
                        @endif
                    </strong></div>
                    <div><strong><img src="{{$stc->fish_picture}}"></strong></div>
                </div> --}}
                    {{-- <table class="table table-bordered mb-1">
                        <tr>
                            <td rowspan="3">
                                <img src="{{$stc->fish_picture}}">
                            </td>
                            <td>ID</td>
                            <td><strong>{{Mush::no_reg($stc->id)}}</strong></td>
                        </tr>
                        <tr>
                            <td>Size</td>
                            <td><strong>{{$stc->fish_size}}</strong></td>
                        </tr>
                        <tr>
                            <td colspan="2">Size</td>
                        </tr>
                    </table> --}}
            </div>
        @endforeach
    </div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        // setInterval(function(){ 
        //     window.print();
        //  }, 3000);
        setTimeout(function(){ 
            window.print();
            setTimeout(window.close, 0);
        }, 5000);
    });
</script>
</body>
</html>