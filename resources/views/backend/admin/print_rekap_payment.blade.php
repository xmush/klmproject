<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Pembayaran Peserta</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="style.css"> --}}
    <style>  

    </style>
</head>
<body>
    <div class="container">
        <div class="row mt-4">
            <div class="col-8">
                <h3>
                    Koi Lovers Makassar Project
                </h3>
            </div>
            <div class="col-4 text-right">
                <strong>Jl. Adhyaksa No. 1 Makassar</strong> <br>
                Sulawesi Selatan, Indonesia
            </div>
        </div>
        <hr class="my-0">
        <div class="row">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            ID
                        </th>
                        <th>
                            Handler
                        </th>
                        <th>
                            Varietas
                        </th>
                        <th>
                            Size
                        </th>
                        <th>
                            Status
                        </th>
                        <th class="text-right">
                            Biaya
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $n = 1;
                        // $x = 0;
                        $y = 0;
                    @endphp
                    @foreach ($data_user as $user)
                        <tr class="table-light">
                            <td colspan="7">
                                <strong>
                                    OWNER : {{$user->user->bio->nama}}
                                </strong>
                            </td>
                        </tr>
                        @php
                            $x = 0;
                        @endphp
                        @foreach ($data_ikan as $ikan)
                            @if ($ikan->user_id == $user->user_id)
                                @if ($ikan->status == 'LUNAS')
                                    <tr class="table-success">
                                @else
                                    <tr class="table-warning">
                                @endif
                                    <td>
                                        {{$n++}}
                                    </td>
                                    <td>
                                        {{Mush::no_reg($ikan->id)}}
                                    </td>
                                    <td>
                                        {{$ikan->handler_name}}
                                    </td>
                                    <td>
                                        {{$ikan->fish->name}}
                                    </td>
                                    <td>
                                        {{$ikan->fish_size}}
                                    </td>
                                    <td>
                                        {{$ikan->status}}
                                    </td>
                                    <td class="text-right">
                                        Rp. {{number_format($ikan->cat->reg_price)}},00
                                    </td>
                                </tr>
                                @php
                                    $x = $x + $ikan->cat->reg_price;
                                    $y = $y + $ikan->cat->reg_price;
                                @endphp
                            @endif
                        @endforeach                        
                            <tr>
                                <td></td>
                                <td colspan="5">
                                    <strong>
                                        Subtotal
                                    </strong>
                                </td>
                                <td class="text-right">
                                    <strong>
                                        Rp. {{number_format($x)}},00
                                    </strong>
                                </td>
                            </tr>
                    @endforeach
                    <tr>
                        <th>

                        </th>
                        <th colspan="4">
                            TOTAL BIAYA
                        </th>
                        <th>    
                            
                        </th>
                        <th class="text-right">    
                            Rp. {{number_format($y)}},00
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        setTimeout(function(){ 
            window.print();
            setTimeout(window.close, 0);
        }, 1000);
    });
</script>
</body>
</html>