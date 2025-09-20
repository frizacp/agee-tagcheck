@extends('layouts.tagging')

@section('title', 'TAGCHECK UGM TRAILRUN')

@section('footer')
<script>
    function chipCode() {
        var code = $("#code").val()

        // setInterval #code disable for 5 second after scan tag to prevent duplicate
        $("#code").attr("disabled", true);
        setTimeout(function() {
            $("#code").attr("disabled", false);
            $("#code").focus();
        }, 10000);

        $.ajax({
            url: "{{ route('tagcheck.index') }}",
            type: "GET",
            data: {
                _token: "{{ csrf_token() }}",
                code: code.substring(0, 24),
                key: "show"
            },
            success: function(data) {
                if (data.status == 200) {
                    $("#resultBib").html(data.data.bib);
                    $("#resultName").html(data.data.lastName);
                    $("#resultTime").html(data.data.time);
                    $("#contest").html(data.data.contest);
                    $("#pace").html(data.data.pace);
                } else {
                    $("#resultBib").html("Not Found");
                    $("#resultName").html("Not Found");
                    $("#resultTime").html("Not Found");
                    $("#contest").html("Not Found");
                    $("#pace").html("Not Found");
                }

                $("#code").val("")
            }
        });
    };
</script>
@endsection

@section('header')
<style>
    body {
        background-image: url('/img/ugmtr25_web.png');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: top;
        color: #131416 !important;
    }

    input {
        background-color: transparent !important;
        color: transparent !important;
    }

    input:focus {
        outline: none !important;
        border: 0;
    }

    h2 {
        font-size: 55px !important;
        margin: 0 !important;
        font-weight: bold !important;
    }

    h3 {
        font-size: 40px !important;
        margin: 0 !important;
        font-weight: bold !important;
    }

    h4 {
        font-size: 75px !important;
        margin: 0 !important;
        font-weight: bold !important;
    }

    h5 {
        font-size: 40px !important;
        margin: 0 !important;
        font-weight: bold !important;
    }

    h1 {
        font-size: 100px !important;
        font-weight: bold !important;
    }

    .bibTag {
        padding-top: 20px
    }
</style>
@endsection

@section('content')
<div class="d-flex justify-content-center align-items-center" style="height: 100vh; flex-direction: column;">
    <input type="text" class="border-0" autofocus style="width: 100%; height: 100%; position: fixed" autocomplete="off" id="code" onchange="chipCode()">
    <div class="bibTag text-center">
        <div class='mt-5'>
            <h2 class="text-uppercase mt-3" id="resultName" style="color: #010101">Name</h2>
            <h5 class="text-uppercase" id="contest" style="color: #010101">Contest</h5>
            <h2 class="text-uppercase" id="resultBib" style="color: #010101">bib</h2>
        </div>
    </div>
</div>
@endsection