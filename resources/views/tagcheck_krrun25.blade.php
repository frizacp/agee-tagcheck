@extends('layouts.tagging')

@section('title', 'TAGCHECK KRRUN25')

@section('footer')
<script>
    // Konfigurasi background image berdasarkan kategori
    const categoryBackgrounds = {
        '5KUMUM': '/img/bg_krrun25.webp',
        'default': '/img/bg_krrun25.webp' // fallback image
    };

    function updateBackground(category) {
        const categoryKey = category ? category : 'default';
        const backgroundUrl = categoryBackgrounds[categoryKey] || categoryBackgrounds['default'];

        document.body.style.backgroundImage = `url('${backgroundUrl}')`;
    }

    function chipCode() {
        var code = $("#code").val()

        // setInterval #code disable for 10 second after scan tag to prevent duplicate
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
                    $("#category").html(data.data.category);
                    $("#pace").html(data.data.pace);

                    // Update background berdasarkan kategori
                    updateBackground(data.data.contest);
                } else {
                    $("#resultBib").html("Not Found");
                    $("#resultName").html("Not Found");
                    $("#resultTime").html("Not Found");
                    $("#contest").html("Not Found");
                    $("#category").html("Not Found");
                    $("#pace").html("Not Found");

                    // Kembali ke background default jika tidak ditemukan
                    updateBackground('default');
                }

                $("#code").val("")
            }
        });
    };

    // Set background default saat halaman dimuat
    $(document).ready(function() {
        updateBackground('default');
    });
</script>
@endsection

@section('header')
<style>
    body {
        background-image: url('/img/bg_krrun25.webp');
        /* Default background */
        background-size: cover;
        background-repeat: no-repeat;
        background-position: top;
        color: #131416 !important;
        transition: background-image 0.5s ease;
        /* Smooth transition */
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
        <div class='mt-2'>
            <h2 class="text-uppercase mt-3" id="resultName" style="color: #FFFFFF">Name</h2>
            <h5 class="text-uppercase" id="category" style="color: #FFFFFF">Category</h5>
            <h2 class="text-uppercase" id="resultBib" style="color: #FFFFFF">bib</h2>
        </div>
    </div>
</div>
@endsection