<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Đăng ký thành viên</title>

    <base href="{{asset('')}}">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="assets/css/feather.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="/css/custom.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .login-wrapper .loginbox label{
            margin-bottom: 0;
        }
        .login-wrapper {
	 --border-size: 3px;
	 --border-angle: 0turn;
	 background-image: conic-gradient(from var(--border-angle), #213, #112 50%, #213), conic-gradient(from var(--border-angle), transparent 20%, #08f, #f03);
	 background-size: calc(100% - (var(--border-size) * 2)) calc(100% - (var(--border-size) * 2)), cover;
	 background-position: center center;
	 background-repeat: no-repeat;
	 animation: bg-spin 3s linear infinite;
}
 @keyframes bg-spin {
	 to {
		 --border-angle: 1turn;
	}
}
 .box:hover {
	 animation-play-state: paused;
}
 @property --border-angle {
	 syntax: "<angle>";
	 inherits: true;
	 initial-value: 0turn;
}
    </style>
    <style>
        body {
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAALEgAACxIB0t1+/AAAABZ0RVh0Q3JlYXRpb24gVGltZQAxMC8yOS8xMiKqq3kAAAAcdEVYdFNvZnR3YXJlAEFkb2JlIEZpcmV3b3JrcyBDUzVxteM2AAABHklEQVRIib2Vyw6EIAxFW5idr///Qx9sfG3pLEyJ3tAwi5EmBqRo7vHawiEEERHS6x7MTMxMVv6+z3tPMUYSkfTM/R0fEaG2bbMv+Gc4nZzn+dN4HAcREa3r+hi3bcuu68jLskhVIlW073tWaYlQ9+F9IpqmSfq+fwskhdO/AwmUTJXrOuaRQNeRkOd5lq7rXmS5InmERKoER/QMvUAPlZDHcZRhGN4CSeGY+aHMqgcks5RrHv/eeh455x5KrMq2yHQdibDO6ncG/KZWL7M8xDyS1/MIO0NJqdULLS81X6/X6aR0nqBSJcPeZnlZrzN477NKURn2Nus8sjzmEII0TfMiyxUuxphVWjpJkbx0btUnshRihVv70Bv8ItXq6Asoi/ZiCbU6YgAAAABJRU5ErkJggg==);
        }

        .error-template {
            padding: 40px 15px;
            text-align: center;
        }

        .error-actions {
            margin-top: 15px;
            margin-bottom: 15px;
        }

        .error-actions .btn {
            margin-right: 10px;
        }
    </style>

</head>
<body>

<!-- Main Wrapper -->
<div class="main-wrapper">

    <div class="header d-none">
        <!-- Header Menu -->
        <ul class="nav nav-tabs user-menu">
            <!-- Flag -->
            <li class="nav-item">
                <a href="#" id="dark-mode-toggle" class="dark-mode-toggle">
                    <i class="feather-sun light-mode"></i><i class="feather-moon dark-mode"></i>
                </a>
            </li>
            <!-- /Flag -->
        </ul>
        <!-- Header Menu -->
    </div>
    <div class="row">

        <!-- Login Banner -->
        <div class="col-md-6 login-bg">
            <div class="login-banner">
            <svg class="fingerprint" viewBox="0 0 100 100">
            <linearGradient id="scan" gradientTransform="rotate(90)">
            <stop offset="0%" stop-color="rgba(0, 250, 255, 0)" />
      <stop offset="40%" stop-color="rgba(0, 250, 255, 0.3)" />
      <stop offset="49%" stop-color="rgba(0, 250, 255, 0.7)" />
      <stop offset="50%" stop-color="rgba(0, 250, 255, 1)" />
      <stop offset="51%" stop-color="rgba(0, 250, 255, 0.7)" />
      <stop offset="60%" stop-color="rgba(0, 250, 255, 0.3)" />
      <stop offset="100%" stop-color="rgba(0, 250, 255, 0)" />
    </linearGradient>
  <g class="creases" fill="none" stroke="#0df" stroke-width="3.3" stroke-linecap="round">
    <path d="M 50 50 Q 50 73.4 20.3 84.2">
      <animate attributeName="stroke-dasharray" values="0; 54; 0" dur="6s" repeatCount="indefinite" begin="-1.1s" />
    </path>
    <path d="M 26.6 88.7 Q 58.1 76.1 58.1 50 C 58.1 43.7 50.9 41 47.3 42.8 C 40.1 46.4 43.7 50 41 59 Q 36.5 73.4 14.9 78.8">
      <animate attributeName="stroke-dasharray" values="0; 134.77; 0" dur="6s" repeatCount="indefinite" begin="-5.57s" />
    </path>
    <path d="M 33.8 92.3 Q 66.2 78.8 66.2 50 C 66.2 37.4 55.4 34.7 50 34.7 C 33.8 34.7 35.6 49.1 33.8 57.2 Q 31.1 69.8 10.4 72.5">
      <animate attributeName="stroke-dasharray" values="0; 159.42; 0" dur="6s" repeatCount="indefinite" begin="-3.22s" />
    </path>
    <path d="M 50 93.2 Q 72.5 81.5 75.2 50 C 76.1 32.9 60.8 26.6 50 26.6 C 25.7 26.6 28.4 45.5 26.6 54.5 Q 24.8 65.3 7.7 65.3">
      <animate attributeName="stroke-dasharray" values="0; 174.55; 0" dur="6s" repeatCount="indefinite" begin="-1.54s" />
    </path>
    <path d="M 68 88.7 Q 82.4 72.5 83.3 50 C 84.2 29.3 68.9 17.6 50 17.6 C 19.4 17.6 20.3 41.9 18.5 50.9 Q 17.6 57.2 6.8 58.1">
      <animate attributeName="stroke-dasharray" values="0; 180.14; 0" dur="6s" repeatCount="indefinite" begin="0s" />
    </path>
    <path d="M 86.9 71.6 Q 90.5 64.4 91.4 50 C 93.2 2.3 20.3 -8.5 12.2 38.3 Q 11.3 43.7 10.4 47.3">
      <animate attributeName="stroke-dasharray" values="0; 166.88; 0" dur="6s" repeatCount="indefinite" begin="-4.67s" />
    </path>
  </g>
  <path d="M 50 0 H 100 V 100 H 0 V 0 H 50" fill="none" stroke="#0df" stroke-width="3" stroke-dasharray="0 25 50 25"/>
  <rect x="0.5" y="0" height="100" width="99" fill="url(#scan)">
    <animate attributeName="y" values="-50; 50; -50" dur="6s" repeatCount="indefinite" begin="0s" />
  </rect>
</svg>

<style>
.fingerprint {
  position:absolute;
  top:50%;
  left:50%;
  transform:translate(-50%,-50%);
}

/* this can be used on a div with this class */
.fingerprintClass{
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' class='fingerprint' viewBox='0 0 100 100'%3E%3ClinearGradient id='scan' gradientTransform='rotate(90)'%3E %3Cstop offset='0%25' stop-color='rgba(0, 250, 255, 0)' /%3E %3Cstop offset='40%25' stop-color='rgba(0, 250, 255, 0.3)' /%3E %3Cstop offset='49%25' stop-color='rgba(0, 250, 255, 0.7)' /%3E %3Cstop offset='50%25' stop-color='rgba(0, 250, 255, 1)' /%3E %3Cstop offset='51%25' stop-color='rgba(0, 250, 255, 0.7)' /%3E %3Cstop offset='60%25' stop-color='rgba(0, 250, 255, 0.3)' /%3E %3Cstop offset='100%25' stop-color='rgba(0, 250, 255, 0)' /%3E %3C/linearGradient%3E%3Cg class='creases' fill='none' stroke='%230df' stroke-width='3.3' stroke-linecap='round'%3E%3Cpath d='M 50 50 Q 50 73.4 20.3 84.2'%3E%3Canimate attributeName='stroke-dasharray' values='0; 54; 0' dur='6s' repeatCount='indefinite' begin='-1.1s' /%3E%3C/path%3E%3Cpath d='M 26.6 88.7 Q 58.1 76.1 58.1 50 C 58.1 43.7 50.9 41 47.3 42.8 C 40.1 46.4 43.7 50 41 59 Q 36.5 73.4 14.9 78.8'%3E%3Canimate attributeName='stroke-dasharray' values='0; 134.77; 0' dur='6s' repeatCount='indefinite' begin='-5.57s' /%3E%3C/path%3E%3Cpath d='M 33.8 92.3 Q 66.2 78.8 66.2 50 C 66.2 37.4 55.4 34.7 50 34.7 C 33.8 34.7 35.6 49.1 33.8 57.2 Q 31.1 69.8 10.4 72.5'%3E%3Canimate attributeName='stroke-dasharray' values='0; 159.42; 0' dur='6s' repeatCount='indefinite' begin='-3.22s' /%3E%3C/path%3E%3Cpath d='M 50 93.2 Q 72.5 81.5 75.2 50 C 76.1 32.9 60.8 26.6 50 26.6 C 25.7 26.6 28.4 45.5 26.6 54.5 Q 24.8 65.3 7.7 65.3'%3E%3Canimate attributeName='stroke-dasharray' values='0; 174.55; 0' dur='6s' repeatCount='indefinite' begin='-1.54s' /%3E%3C/path%3E%3Cpath d='M 68 88.7 Q 82.4 72.5 83.3 50 C 84.2 29.3 68.9 17.6 50 17.6 C 19.4 17.6 20.3 41.9 18.5 50.9 Q 17.6 57.2 6.8 58.1'%3E%3Canimate attributeName='stroke-dasharray' values='0; 180.14; 0' dur='6s' repeatCount='indefinite' begin='0s' /%3E%3C/path%3E%3Cpath d='M 86.9 71.6 Q 90.5 64.4 91.4 50 C 93.2 2.3 20.3 -8.5 12.2 38.3 Q 11.3 43.7 10.4 47.3'%3E%3Canimate attributeName='stroke-dasharray' values='0; 166.88; 0' dur='6s' repeatCount='indefinite' begin='-4.67s' /%3E%3C/path%3E%3C/g%3E%3Cpath d='M 50 0 H 100 V 100 H 0 V 0 H 50' fill='none' stroke='%230df' stroke-width='3' stroke-dasharray='0 25 50 25'/%3E%3Crect x='0.5' y='0' height='100' width='99' fill='url(%23scan)'%3E%3Canimate attributeName='y' values='-50; 50; -50' dur='6s' repeatCount='indefinite' begin='0s' /%3E%3C/rect%3E%3C/svg%3E");
  height:50px;
  width:50px;
}
</style>  
            </div>
        </div>
        <!-- /Login Banner -->

        <div class="col-md-6 login-wrap-bg">
            <!-- Login -->
            <div id="app">
                <user-login/>
            </div>
            <!-- /Login -->

        </div>

    </div>
</div>
<!-- /Main Wrapper -->

<!-- jQuery -->
<script src="assets/js/jquery-3.6.0.min.js"></script>

<!-- Bootstrap Core JS -->
<script src="assets/js/bootstrap.bundle.min.js"></script>

<!-- Custom JS -->
<script src="assets/js/script.js"></script>
    <script src="{{asset('js/user-login.js?t='.Carbon\Carbon::now()->timestamp)}}"></script>
</body>
</html>
