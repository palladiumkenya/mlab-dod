@extends('layouts.master')
@section('before-css')


@endsection

@section('main-content')
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="card-title mb-3">Viral Loads Sample Remote Login Data</div>

                            <h4>Select any of the filters below, and click Fetch when complete. None is a required field.</h4>
                            <form role="form" method="get"action="{{route('vl_srl_results')}}">
                            {{ csrf_field() }}
                                <div class="row">
                                @if (Auth::user()->user_level != 3 && Auth::user()->user_level != 4)
                                    @if(Auth::user()->user_level < 3)
                                        <div class="col-md-6 form-group mb-3">
                                            <label for="firstName1">Program</label>
                                            <select  class="form-control" data-width="100%" id="program" name="program_id">
                                                <option value="">Select Program</option>
                                                @if(Auth::user()->user_level < 2)
                                                    @if (count($programs) > 0)
                                                        @foreach($programs as $program)
                                                        <option value="{{$program->id}}">{{ ucwords($program->name) }}</option>
                                                            @endforeach
                                                    @endif
                                                @endif
                                                @if(Auth::user()->user_level == 2)

                                                <option value="{{Auth::user()->program->id}}">{{ ucwords(Auth::user()->program->name) }}</option>
                                                @endif

                                            </select>
                                        </div>
                                    @endif
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="firstName1">Unit</label>
                                        <select  class="form-control" data-width="100%" id="unit" name="unit_id">
                                            <option value="">Select Unit</option>
                                            @if(Auth::user()->user_level == 5)

                                            <option value="{{Auth::user()->unit->id}}">{{ ucwords(Auth::user()->unit->name) }}</option>
                                            @endif
                                               
                                        </select>
                                    </div>
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="firstName1">County</label>
                                        <select  class="form-control" data-width="100%" id="county" name="county_id">
                                            <option value="">Select County</option>
                                               
                                        </select>
                                    </div>

                                    <div class="col-md-6 form-group mb-3">
                                        <label for="firstName1">Sub County</label>
                                        <select  class="form-control" data-width="100%" id="sub_county" name="sub_county_id">
                                            <option value="">Select Sub County</option>
                                                
                                        </select>
                                    </div>
                                @endif
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="firstName1">Facility</label>
                                        <select  class="form-control" data-width="100%" id="facility" name="code">
                                            @if (Auth::user()->user_level != 3 && Auth::user()->user_level != 4)                                            
                                            <option value="">Select Facility</option>
                                            @else

                                            <option value="{{Auth::user()->facility->code}}">{{ ucwords(Auth::user()->facility->name) }}</option>
                                            @endif
                                                
                                        </select>
                                    </div>

                                    <div class="col-md-6 form-group mb-3">
                                        <label for="firstName1">Lab</label>
                                        <select  class="form-control" data-width="100%" id="lab_name" name="lab_name">
                                            @if (Auth::user()->user_level != 3 && Auth::user()->user_level != 4)                                            
                                            <option value="" disabled selected>Choose a lab</option>
                                            <option value="Alupe">Alupe</option>
                                            <option value="Ampath">Ampath</option>
                                            <option value="Coast lab">Coast lab</option>
                                            <option value="Kemri Nairobi">Kemri Nairobi</option>
                                            <option value="Kisumu lab">Kisumu lab</option>
                                            <option value="KNH">KNH</option>
                                            <option value="KU Teaching and Referring Hospital">KU Teaching and Referring Hospital</option>
                                            @endif
                                                
                                        </select>
                                    </div>

                                    <div class="col-md-6 form-group mb-3">
                                        <label for="firstName1">Sample Type</label>
                                        <select  class="form-control" data-width="100%" id="selected_type" name="selected_type">
                                            @if (Auth::user()->user_level != 3 && Auth::user()->user_level != 4)                                            
                                            <option value="" disabled selected>Choose a sample type</option>
                                            <option value="Frozen plasma">Frozen plasma</option>
                                            <option value="Venous blood(EDTA)">Venous blood(EDTA)</option>
                                            <option value="DBS capillary(infants only)">DBS capillary(infants only)</option>
                                            <option value="DBS venous">DBS venous</option>
                                            <option value="PPT">PPT</option>
                                            @endif
                                                
                                        </select>
                                    </div>

                                    <div class='col-sm-6'>
                                        <div class="form-group">
                                            <div class="input-group">
                                            <div class="col-md-4">
                                            <label for="firstName1">From</label>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="date" id="picker3" class="form-control" data-width="100%" placeholder="YYYY-mm-dd" name="from" >
                                                </div>
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary"  type="button">
                                                        <i class="icon-regular i-Calendar-4"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class='col-sm-6'>
                                        <div class="form-group">
                                            <div class="input-group">
                                            <div class="col-md-4">
                                            <label for="firstName1">Dispatch Date To</label>
                                            </div>
                                            <div class="col-md-10">

                                                <input type="date" id="picker2" class="form-control" placeholder="YYYY-mm-dd" name="to" >
                                               </div>
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary"  type="button">
                                                        <i class="icon-regular i-Calendar-4"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        
                                </div>
                                <button type="submit" class="btn btn-block btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

@endsection

@section('page-js')

@endsection

@section('bottom-js')
<script type="text/javascript">

$('#program').change(function () {

    $('#unit').empty();

    var z = $(this).val();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        url: '/get_units',
        data: {
            "program_id": z
        },
        dataType: "json",
        success: function (data) {
            var select = document.getElementById("unit"),
                opt = document.createElement("option");

                opt.value = "";
                opt.textContent = "Select Unit";
                select.appendChild(opt);
            for (var i = 0; i < data.length; i++) {
                
            var select = document.getElementById("unit"),
                opt = document.createElement("option");

                opt.value = data[i].id;
                opt.textContent = data[i].name;
                select.appendChild(opt);
            }
        }
    })
});

$('#unit').change(function () {

    $('#county').empty();

    var z = $(this).val();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        url: '/get_counties',
        data: {
            "unit_id": z
        },
        dataType: "json",
        success: function (data) {
            var select = document.getElementById("county"),
                opt = document.createElement("option");

                opt.value = "";
                opt.textContent = "Select County";
                select.appendChild(opt);
            for (var i = 0; i < data.length; i++) {
                
            var select = document.getElementById("county"),
                opt = document.createElement("option");

                opt.value = data[i].id;
                opt.textContent = data[i].name;
                select.appendChild(opt);
            }
        }
    })
});

$('#county').change(function () {
    $('#sub_county').empty();

    var x = $(this).val();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        url: '/get_subcounties',
        data: {
            "county_id": x
        },
        dataType: "json",
        success: function (data) {

            var select = document.getElementById("sub_county"),
                    opt = document.createElement("option");

                opt.value = "";
                opt.textContent = "Select Sub-County";
                select.appendChild(opt);

            for (var i = 0; i < data.length; i++) {
                var select = document.getElementById("sub_county"),
                    opt = document.createElement("option");

                opt.value = data[i].id;
                opt.textContent = data[i].name;
                select.appendChild(opt);
            }
        }
    })
});

$('#sub_county').change(function () {

    $('#facility').empty();

    var y = $(this).val();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        url: '/get_facilities_data',
        data: {
            "sub_county_id": y
        },
        dataType: "json",
        success: function (data) {

            var select = document.getElementById("facility"),
                    opt = document.createElement("option");

                opt.value = "";
                opt.textContent = "Select Facility";
                select.appendChild(opt);

            for (var i = 0; i < data.length; i++) {
                var select = document.getElementById("facility"),
                    opt = document.createElement("option");

                opt.value = data[i].code;
                opt.textContent = data[i].name;
                select.appendChild(opt);
            }
        }
    })
});

</script>

@endsection
