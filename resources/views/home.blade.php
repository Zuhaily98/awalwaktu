@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('Welcome Tok Ime!') }}

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="https://storage.googleapis.com/afs-prod/media/c3459dfc73464c90a85f5c298bc52d59/3000.jpeg" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="https://media.vanityfair.com/photos/5a4ff54d9e599e16cd3a9c98/16:9/w_1536,h_864,c_limit/t--MAG-0218-Mecca-Disaster.jpg" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="https://img.jakpost.net/c/2020/06/02/2020_06_02_96681_1591074285._large.jpg" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
    </div>

    {{-- <body onload="digitized();">
        <div style="background-color:#F3F3F3;
                max-width:220px;width:100%;margin:0 auto;padding:20px;">

            <table class="tabBlock" align="center" cellspacing="0" cellpadding="0" border="0">
                <tr>
                    <td class="clock" id="dc"></td> <!-- THE DIGITAL CLOCK. -->
                    <td>
                        <table cellpadding="0" cellspacing="0" border="0">

                            <!-- HOUR IN 'AM' AND 'PM'. -->
                            <tr>
                                <td class="clocklg" id="dc_hour"></td>
                            </tr>

                            <!-- SHOWING SECONDS. -->
                            <tr>
                                <td class="clocklg" id="dc_second"></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </body> --}}

    {{-- <div style="text-align:center;padding:1em 0;">
        <h2><a style="text-decoration:none;" href="https://www.zeitverschiebung.net/en/city/1735161"><span
                    style="color:gray;">Current local time in</span><br />Kuala Lumpur, Malaysia</a></h2> <iframe
            src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=en&size=large&timezone=Asia%2FKuala_Lumpur"
            width="100%" height="140" frameborder="0" seamless></iframe>
    </div> --}}

    <div id='clock'></div>
@endsection

@section('css')
    <style>
        body {
            background-image: url("https://unsplash.com/photos/ZglHN7Y1dIk/download?force=true&w=1920");
            background-attachment: fixed !important;
            background-repeat: no-repeat !important;
            background-position: top left !important;
            background-size: 100%;
        }

        /* #clock {
            height: 100px;
            width: 800px;
            margin: auto;
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            padding-top: 70px;
            font-family: courier, monospace;
            text-align: center;
            color: white;
            font-size: 100px;
        } */

    </style>
@endsection

@section('js')
    {{-- <script>
        // OUR FUNCTION WHICH IS EXECUTED ON LOAD OF THE PAGE.
        function digitized() {
            var dt = new Date(); // DATE() CONSTRUCTOR FOR CURRENT SYSTEM DATE AND TIME.
            var hrs = dt.getHours();
            var min = dt.getMinutes();
            var sec = dt.getSeconds();

            min = Ticking(min);
            sec = Ticking(sec);

            document.getElementById('dc').innerHTML = hrs + ":" + min;
            document.getElementById('dc_second').innerHTML = sec;

            if (hrs > 12) {
                document.getElementById('dc_hour').innerHTML = 'PM';
            } else {
                document.getElementById('dc_hour').innerHTML = 'AM';
            }

            // CALL THE FUNCTION EVERY 1 SECOND (RECURSION).
            var time
            time = setInterval('digitized()', 1000);
        }

        function Ticking(ticVal) {
            if (ticVal < 10) {
                ticVal = "0" + ticVal;
            }
            return ticVal;
        }

    </script> --}}
    {{-- <script>
        $(document).ready(function() {

            // With this function we will assemble our clock, 
            // calling up whole date and then hours, minutes, 
            // and seconds individually.

            function displayTime() {
                var currentTime = new Date();
                var hours = currentTime.getHours();
                var minutes = currentTime.getMinutes();
                var seconds = currentTime.getSeconds();


                // Let's set the AM and PM meridiem and 
                // 12-hour format
                var meridiem = "AM"; // Default is AM

                // If hours is greater than 12
                if (hours > 12) {
                    hours = hours - 12; // Convert to 12-hour format
                    meridiem = "PM"; // Keep track of the meridiem
                }
                // 0 AM and 0 PM should read as 12
                if (hours === 0) {
                    hours = 12;
                }


                // If the hours digit is less than 10
                if (hours < 10) {
                    // Add the "0" digit to the front
                    // so 9 becomes "09"
                    hours = "0" + hours;
                }
                // Format minutes and seconds the same way
                if (minutes < 10) {
                    minutes = "0" + minutes;
                }
                if (seconds < 10) {
                    seconds = "0" + seconds;
                }

                // This gets a "handle" to the clock div in our HTML
                var clockDiv = document.getElementById('clock');

                // Then we set the text inside the clock div 
                // to the hours, minutes, and seconds of the current time
                clockDiv.innerText = hours + ":" + minutes + ":" + seconds + " " + meridiem;
            }

            // This runs the displayTime function the first time
            displayTime();

            // This makes our clock 'tick' by repeatedly
            // running the displayTime function every second.
            setInterval(displayTime, 1000);

        });

    </script> --}}
@endsection
