@section('title', __('Pdf del diploma'))

<div class="diploma-container">
    {{-- <img src="assets/img/logo.png" alt="Logo" class="logo"> --}}
    <div class="logo-container">
        <img src="assets/img/logo.png" alt="Firma" class="logo">
    </div>

    <div class="header">DIPLOMA</div>

    <div class="subtitle">OTORGADO A:</div>

    <div class="recipient">{{$nombres_usuario}} {{$apellidos_usuario}}</div>

    <div class="description">
        Por haber aprobado y cumplido con el programa {{$capacitacion}}, realizado de manera virtual.
    </div>

    <div class="signature-container">
        <img src="assets/img/signature.png" alt="Firma" class="signature">
        <div class="director">LIC. SALVADOR HERNANDEZ A.<br>DIRECTOR</div>
    </div>

    <img src="{{$qrCode}}" alt="QR Code" class="qr-code">
</div>

<style>

        .diploma-container {

            border: 10px solid #ffffff;
            padding: 20px;
            position: relative;
            margin: 0 auto;
            background-image: url('assets/img/fondo.jpeg');
            background-size: cover; /* Ensures the image covers the entire container */
            background-repeat: no-repeat; /* Prevents the image from repeating */
            background-position: center; /* Centers the background image */
            /* background-color: #32db9a; */
        }

        .logo-container {
            text-align: center;
            margin-top: 50px;
        }

        .logo {
            width: 100px;
            height: auto;
            margin-bottom: 5px;
        }

        .header {
            text-align: center;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 40px;
        }

        .subtitle {
            text-align: center;
            font-size: 18px;
            margin-bottom: 30px;
        }

        .recipient {
            text-align: center;
            font-size: 26px;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .description {
            text-align: center;
            font-size: 16px;
            margin-bottom: 50px;
            line-height: 1.5;
        }

        .signature-container {
            text-align: center;
            margin-top: 50px;
        }

        .signature {
            width: 70px;
            height: auto;
            margin-bottom: 5px;
        }

        .director {
            font-size: 16px;
            font-weight: bold;
            text-align: center;
        }

        /* QR Code */
        .qr-code {
            /* position: absolute; */
            bottom: 20px;
            left: 20px;
            width: 100px;
            height: 100px;
        }
</style>