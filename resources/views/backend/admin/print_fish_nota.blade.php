<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}

        <title>{{$user->bio->nama.'_all_fish_nota_'.Carbon\Carbon::now()->format('Ymd_His')}}</title>
        <style>
        body{
            font-family: "Courier New", Courier, monospace;
        }
        p {
            margin-top: 0px;
            margin-bottom: 0px;
        }
        table {
            width: 100%;
        }
        .num {
            text-align: right;
        }
        .head2 {
            vertical-align: middle;
        }
        .content {
            font-size: 13px;
        }
        .footr {
            font-size: 11px;
        }
        </style>
    </head>
    <body>
        <div class="head1">
            <table>
                <tr>
                    <td style="width:50%">
                        <h3 style="margin-top:0px; margin-bottom:0px;">NOTA FROM :</h3>
                        <h5 style="margin-top:0px; margin-bottom:0px;">KOI LOVERS MAKASSAR PROJECT</h5>
                    </td>
                    <td class="num" style="width:50%">
                        <h5 style="margin-top:0px; margin-bottom:0px;">Jl. Adhyaksa No. 1 Makassar</h5>
                        <small>Sulawesi Selatan, Indonesia</small>
                    </td>
                </tr>
            </table>
        </div>
        <hr class="hr">
        <div class="row head2" id="head2">
            <table>
                <tr>
                    <td valign="top" style="width:30%">
                        <strong>Nota To :</strong><br>
                        <small>{{'Mr/Mrs. '.$user->bio->nama}}</small>
                    </td>
                    <td valign="top" style="width:30%">
                        <strong>Nota Date\Time :</strong><br>
                        <p>{{Carbon\Carbon::now()->format('Y-m-d H:i:s')}}</p>
                    </td>
                    <td class="num" valign="top" style="width:40%">
                        <strong>Pembayaran Ke :</strong><br>
                        <small>152 000 498204 3 (Mandiri)</small><br>
                        <small>An. Ridho Yuwono</small>
                    </td>
                </tr>
            </table>
        </div>
        <hr class="hr">
        <div class="row content" id="content">
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                No.
                            </th>
                            <th>
                                REG_ID
                            </th>
                            <th>
                                Bill ID
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
                            <th class="num">
                                Entry Fee
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $n=1;
                            $fee_total = 0;
                        @endphp
                        @foreach ($data_fish as $fish)
                            <tr>
                                <td>{{$n++}}</td>
                                <td>{{Mush::no_reg($fish->id)}}</td>
                                <td>{{Carbon\Carbon::parse($fish->date)->format('Ymd').'/'.$fish->user_id.'/'.$fish->bio_id.'/'.$fish->id}}</td>
                                <td>{{$fish->fish->name}}</td>
                                <td>{{$fish->fish_size}}</td>
                                <td>{{$fish->status}}</td>
                                <td class="num">{{'Rp. '.number_format($fish->cat->reg_price).',00'}}</td>
                                @php
                                    $fee_total = $fee_total + $fish->cat->reg_price;
                                @endphp
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="4"></td>
                                <td colspan="" class="num"><strong>TOTAL</strong></td>
                                <td colspan="2" class="num"><strong>{{'Rp. '.number_format($fee_total).',00'}}</strong></td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <hr class="hr">
        <div class="footr num">
            <strong>*</strong><small> For More Information [ CP 1 : 0852 9722 2999 (Ridho)</small>]  |  [<small>CP 2 : 0812 4151 0808 (Abe) ]</small>
        </div>   
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function(){
                setTimeout(function(){ 
                    window.print();
                    setTimeout(window.close, 0);
                }, 5000);
            });
        </script>
    </body>
</html>