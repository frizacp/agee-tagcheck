@extends('layouts.tagging')

@section('title', 'RESULT KRRUN 2025')

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
    /* Menjadikan body sebagai flex container untuk centering */
    html,
    body {
        height: 100%;
        margin: 0;
        padding: 0;
    }

    body {
        /* Properti background dari kode Anda */
        background-image: url('/img/bg_krrun25.webp');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: top;
        color: #131416;

        /* Properti untuk centering konten */
        display: flex;
        justify-content: center;
        /* Center horizontal */
        align-items: center;
        /* Center vertikal */
    }

    /* Membuat input tidak terlihat namun tetap fungsional */
    input#code {
        background-color: transparent !important;
        color: transparent !important;
        border: 0;
        outline: none !important;
        cursor: default;
        /* Menghilangkan cursor text */
    }

    /* Styling spesifik untuk konten di dalam .bibTag agar lebih rapi */
    .bibTag h1,
    .bibTag h2,
    .bibTag h3,
    .bibTag h4,
    .bibTag h5 {
        margin: 0;
        font-weight: bold;
    }

    .bibTag h1 {
        font-size: 100px;
    }

    .bibTag h2 {
        font-size: 55px;
    }

    .bibTag h3 {
        font-size: 40px;
    }

    .bibTag h4 {
        font-size: 75px;
    }

    .bibTag h5 {
        font-size: 40px;
    }
</style>
@endsection

@section('content')
<input type="text" class="border-0" autofocus style="width: 100%; height: 100%; position: fixed" autocomplete="off" id="code" onchange="chipCode()">
<div class="bibTag text-center">
    <div class="mt-4">
        <h4 class="text-uppercase mt-5 mb-3 px-5" style="background-color: #137063; color: #FFFFFF ; padding-top: 10px; padding-bottom: 10px;">CONGRATULATION</h4>
        <h2 class="text-uppercase mt-3" id="resultName" style="color: #1B1B1B">NAME</h2>
        <div class="d-flex justify-content-center align-items-center" style="gap: 60px; margin-top: 50px;">
            <div>
                <h5 class="text-uppercase" id="contest" style="color: #1B1B1B">CONTEST</h5>
                <h2 class="text-uppercase" id="resultBib" style="color: #1B1B1B">BIB</h2>
            </div>
            <div style="border: 4px solid #1B1B1B; border-radius: 15px; padding: 20px;">
                <h2 id="resultTime" style="color: #1B1B1B">RESULT:TIME</h2>
            </div>
        </div>
    </div>


    <div class="text-center">
    </div>
</div>
@endsection