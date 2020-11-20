@extends('portal.layout.main2')

@section('page_title')
    KLM Project | Best In Size
@endsection

@section('pagecss')
    <style>
    .font-card {
        font-size: 18px;
        font-weight: bolder;
        
    }
    .mimg {
        width: 100%;
    }
    </style>
@endsection

@section('content')
    <div class="row mb-3">
        <input type="hidden" name="reg_url" id="reg_url" value="{{route('regular')}}">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <select class="form-control var_id" id="var_id" name="var_id">
                @foreach ($data_var as $var)
                @if (isset($var_id))
                    @if ($var->id == $var_id)
                        <option value="{{$var->id}}" data-var_id="{{$var->id}}" selected>{{$var->name}}</option>
                    @else
                        <option value="{{$var->id}}" data-var_id="{{$var->id}}">{{$var->name}}</option>
                    @endif
                @else
                    <option value="{{$var->id}}" data-var_id="{{$var->id}}">{{$var->name}}</option>
                @endif                
                    {{-- <option value="{{$var->id}}" data-var_id="{{$var->id}}">{{$var->name}}</option> --}}
                @endforeach
            </select>
        </div>        
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <select class="form-control cat_id" id="cat_id" name="cat_id">
                @foreach ($data_cat as $cat)
                    @if (isset($cat_id))
                        @if ($cat->id == $cat_id)
                            <option value="{{$cat->id}}" data-cat_id="{{$cat->id}}" selected>{{$cat->min_size.' - '.$cat->max_size.' cm'}}</option>
                        @else
                            <option value="{{$cat->id}}" data-cat_id="{{$cat->id}}">{{$cat->min_size.' - '.$cat->max_size.' cm'}}</option>
                        @endif
                    @else
                        <option value="{{$cat->id}}" data-cat_id="{{$cat->id}}">{{$cat->min_size.' - '.$cat->max_size.' cm'}}</option>
                    @endif
                    {{-- <option value="{{$cat->id}}" data-cat_id="{{$cat->id}}">{{$cat->min_size.' - '.$cat->max_size.' cm'}}</option> --}}
                @endforeach
            </select>
        </div>
    </div>
    <div class="row justify-content-md-center">
        @php
            $n = 1;
        @endphp
        @foreach ($data_champion as $bis)
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mt-2 mb-2">
                <div class="card">
                    <img class="card-img-top" src="{{$bis->user_fish->fish_picture}}" alt="Card image cap" style="height: 300px; width: auto;">
                    <div class="card-body text-center p-1">
                        <h5 class="font-card mb-1">Juara {{$bis->position}}</h5>
                        <h5 class="font-card mb-1">{{Mush::no_reg($bis->user_fish->id)}}</h5>
                        <p class="card-text mb-1">{{ucwords(strtolower($bis->user_fish->fish->name))}} {{$bis->user_fish->fish_size.' cm'}}</p>
                        <h5 class="font-card">Owner</h5>
                        <p class="card-text mb-1">{{ucwords(strtolower($bis->user_fish->bio->nama))}}</p><p class="mb-1"><small>({{ucwords(strtolower($bis->user_fish->bio->kota))}})</small></p>
                        <h5 class="font-card">Handler</h5>
                        <p class="mb-1">{{ucwords(strtolower($bis->user_fish->handler_name))}}</p><p class="mb-1"> <small>{{ucwords(strtolower($bis->user_fish->handler_address))}}</small></p>
                        <button type="button" class="btn btn-sm btn-primary mb-2" data-toggle="modal" data-target="#modal{{Mush::no_reg($bis->user_fish->id)}}">Full Image</button>
                    </div>
                </div>
            </div>            
        @endforeach
    </div>

    @foreach ($data_champion as $mbis)

        <!-- Modal -->
        <div class="modal fade" id="modal{{Mush::no_reg($mbis->user_fish->id)}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{Mush::no_reg($mbis->user_fish->id).' - '.$mbis->user_fish->fish->name.' - '.$mbis->user_fish->fish_size}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <img src="{{$mbis->user_fish->fish_picture}}" class="rounded mimg" alt="{{Mush::no_reg($mbis->user_fish->id).' - '.$mbis->user_fish->fish->name.' - '.$mbis->user_fish->fish_size}}">
                    </div>
                </div>
                {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div> --}}
            </div>
            </div>
        </div>
        
    @endforeach
    @endsection

    @section('pagejs')
        <script>
        $(document).ready(function() {
            $('.cat_id').on('change', function() {
                var cat_id = $(this).val();
                var var_id = $("#var_id").val();

                var reg_url = $("#reg_url").val();
                var rlink = reg_url+'/'+var_id+'/'+cat_id;
                $(location).attr('href', rlink);
            });

            $('.var_id').on('change', function() {
                var var_id = $(this).val();
                var cat_id = $("#cat_id").val();

                var reg_url = $("#reg_url").val();
                var rlink = reg_url+'/'+var_id+'/'+cat_id;
                $(location).attr('href', rlink);
            });
        });
        </script>
    @endsection