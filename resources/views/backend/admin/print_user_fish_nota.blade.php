<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="col-md-12 mt-5">
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
        }, 2000);
    });
</script>
</body>
</html>