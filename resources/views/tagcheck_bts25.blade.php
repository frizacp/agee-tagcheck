@extends('layouts.tagging')

@section('title', 'TAGCHECK BTS25')

@section('footer')
<script>
    const categoryBackgrounds = {
        '5KUMUM': '/img/bts2025.png',
        'default': '/img/bts2025.png'
    };

    function updateBackground(category) {
        const categoryKey = category ? category : 'default';
        const backgroundUrl = categoryBackgrounds[categoryKey] || categoryBackgrounds['default'];
        document.body.style.backgroundImage = `url('${backgroundUrl}')`;
    }

    let idleTimer;

    function showBlinkText() {
        $("#blinkText").show();
        $("#bibContent").hide();
    }

    function hideBlinkText() {
        $("#blinkText").hide();
        $("#bibContent").show();
    }

    function resetIdleTimer() {
        clearTimeout(idleTimer);
        idleTimer = setTimeout(showBlinkText, 10000); // 10 detik tidak ada input
    }

    function chipCode() {
        var code = $("#code").val();

        // disable input 10 detik
        $("#code").attr("disabled", true);
        setTimeout(function() {
            $("#code").attr("disabled", false);
            $("#code").focus();
        }, 10000);

        $.ajax({
            url: "{{ url()->current() }}",
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
                    $("#category").html(data.data.category);
                    $("#pace").html(data.data.pace);
                    updateBackground(data.data.contest);
                } else {
                    $("#resultBib").html("Not Found");
                    $("#resultName").html("Not Found");
                    $("#resultTime").html("Not Found");
                    $("#contest").html("Not Found");
                    $("#category").html("Not Found");
                    $("#pace").html("Not Found");
                    updateBackground('default');
                }

                $("#code").val("");

                // setelah scan berhasil / gagal, sembunyikan blink dan tampilkan data
                hideBlinkText();
                resetIdleTimer();
            }
        });
    }

    $(document).ready(function() {
        updateBackground('default');
        resetIdleTimer();

        // kalau ada input manual dari scanner
        $("#code").on('input', function() {
            hideBlinkText();
            resetIdleTimer();
        });
    });
</script>
@endsection

@section('header')
<style>
    @font-face {
        font-family: 'PoppinsBold';
        src: url('/fonts/Poppins-Bold.woff') format('woff');
        font-weight: bold;
        font-style: normal;
    }



    body {
        background-image: url('/img/bts2025.png');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: top;
        color: #131416 !important;
        transition: background-image 0.5s ease;
    }

    input {
        background-color: transparent !important;
        color: transparent !important;
    }

    input:focus {
        outline: none !important;
        border: 0;
    }

    body,
    h2,
    h3,
    h4,
    h5,
    h1 {
        font-family: 'PoppinsBold', sans-serif;
        font-weight: bold !important;
        margin: 0 !important;
        text-align: center;
    }


    h1 {
        font-size: 100px !important;
    }

    h2 {
        font-size: 55px !important;
    }

    h3 {
        font-size: 55px !important;
    }

    h5 {
        font-size: 40px !important;
    }

    /* ini yang bikin ke kiri */
    .content-wrapper {
        height: 100vh;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        /* kiri */
        justify-content: center;
        /* center vertical */
        padding-left: 30px;
        /* jarak kiri */
        gap: 20px;
    }

    .bibTag,
    .bibContent {
        text-align: left;
        display: flex;
        flex-direction: column;
        gap: 5px;
    }


    /* Blink text */
    .blink {
        animation: blink-animation 1s steps(2, start) infinite;
        color: #ffffff;
        font-size: 50px;
        font-weight: bold;
        text-transform: uppercase;
    }

    @keyframes blink-animation {
        to {
            visibility: hidden;
        }
    }
</style>
@endsection

@section('content')
<div class="content-wrapper mt-20">
    <input
        type="text"
        class="border-0"
        autofocus
        style="width: 100%; height: 100%; position: fixed"
        autocomplete="off"
        id="code"
        onchange="chipCode()">

    <div class="bibTag text-left mt-5">
        {{-- tampil waktu idle --}}
        <div id="blinkText" class="blink" style="display:none;">
            Scan BIB Here
        </div>

        {{-- tampil waktu ada data --}}
        <div id="bibContent">
            <h1 class="text-uppercase" id="resultBib" style="color: #FFFFFF">BIB</h1>
            <h2 class="text-uppercase" id="resultName" style="color: #FFFFFF">NAMA</h2>
            <h3 class="text-uppercase" id="category" style="color: #FFFFFF">KATEGORI</h3>
        </div>
    </div>
</div>

@endsection