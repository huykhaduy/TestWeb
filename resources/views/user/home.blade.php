@extends("user.layout.app")
@section('title')
    <title>Trần Anh - Trang chủ</title>
@endsection
@section('breadcrumb')
@endsection
@section('content')
<Center style="
    padding-top: 200px;
">
<div class="items">
  <div class="item"></div>
  <div class="item"></div>
  <div class="item"></div>
  <div class="item"></div>
  <div class="item"></div>
  <div class="item"></div>
  <div class="item"></div>
  <div class="item"></div>
  <div class="item"></div>
  <div class="item"></div>
  <div class="item"></div>
  <div class="item"></div>
  <div class="item"></div>
  <div class="item"></div>
  <div class="item"></div>
  <div class="item"></div>
  <div class="item"></div>
  <div class="item"></div>
  <div class="item"></div>
  <div class="item"></div>
  <div class="item"></div>
  <div class="item"></div>
  <div class="item"></div>
  <div class="item"></div>
  <div class="item"></div>
  <div class="item"></div>
  <div class="item"></div>
  <div class="item"></div>
  <div class="item"></div>
  <div class="item"></div>
  
</div>
</center>
<style>
 html {
	 display: flex;
	 justify-content: center;
	 align-items: center;
	 min-width: 100vw;
	 min-height: 100vh;
}
 body {
	 display: flex;
	 align-items: center;
	 justify-content: center;
	 width: 90vw;
	 height: 90vh;
	 background: grey;
}
 .items {
	 display: flex;
	 flex-direction: column;
	 align-items: center;
	 perspective: 500px;
	 animation: rotate infinite linear 20s;
}
 .item {
	 position: relative;
	 display: inline-block;
	 overflow: visible;
	 width: 50px;
	 height: 5px;
	 margin: 2px 0;
	 display: flex;
	 justify-content: space-between;
	 animation: rotate2 infinite linear 2s, hue linear infinite 2s;
	 background: linear-gradient(0deg, transparent 0%, transparent 40%, #2a6ae9 50%, transparent 60%, transparent 100%);
}
 .item:before, .item:after {
	 content: "";
	 position: relative;
	 border-radius: 50%;
	 width: 5px;
	 height: 5px;
	 display: block;
	 background: white;
	 box-shadow: 0px 0px 10px 2px #2a6ae9, 0px 0px 0px 1px black;
}
 .item:before {
	 animation-delay: 1s;
}
 .item:nth-child(n + 1) {
	 animation-delay: -4.87s;
}
 .item:nth-child(n + 2) {
	 animation-delay: -4.74s;
}
 .item:nth-child(n + 3) {
	 animation-delay: -4.61s;
}
 .item:nth-child(n + 4) {
	 animation-delay: -4.48s;
}
 .item:nth-child(n + 5) {
	 animation-delay: -4.35s;
}
 .item:nth-child(n + 6) {
	 animation-delay: -4.22s;
}
 .item:nth-child(n + 7) {
	 animation-delay: -4.09s;
}
 .item:nth-child(n + 8) {
	 animation-delay: -3.96s;
}
 .item:nth-child(n + 9) {
	 animation-delay: -3.83s;
}
 .item:nth-child(n + 10) {
	 animation-delay: -3.7s;
}
 .item:nth-child(n + 11) {
	 animation-delay: -3.57s;
}
 .item:nth-child(n + 12) {
	 animation-delay: -3.44s;
}
 .item:nth-child(n + 13) {
	 animation-delay: -3.31s;
}
 .item:nth-child(n + 14) {
	 animation-delay: -3.18s;
}
 .item:nth-child(n + 15) {
	 animation-delay: -3.05s;
}
 .item:nth-child(n + 16) {
	 animation-delay: -2.92s;
}
 .item:nth-child(n + 17) {
	 animation-delay: -2.79s;
}
 .item:nth-child(n + 18) {
	 animation-delay: -2.66s;
}
 .item:nth-child(n + 19) {
	 animation-delay: -2.53s;
}
 .item:nth-child(n + 20) {
	 animation-delay: -2.4s;
}
 .item:nth-child(n + 21) {
	 animation-delay: -2.27s;
}
 .item:nth-child(n + 22) {
	 animation-delay: -2.14s;
}
 .item:nth-child(n + 23) {
	 animation-delay: -2.01s;
}
 .item:nth-child(n + 24) {
	 animation-delay: -1.88s;
}
 .item:nth-child(n + 25) {
	 animation-delay: -1.75s;
}
 .item:nth-child(n + 26) {
	 animation-delay: -1.62s;
}
 .item:nth-child(n + 27) {
	 animation-delay: -1.49s;
}
 .item:nth-child(n + 28) {
	 animation-delay: -1.36s;
}
 .item:nth-child(n + 29) {
	 animation-delay: -1.23s;
}
 .item:nth-child(n + 30) {
	 animation-delay: -1.1s;
}
 .item:nth-child(n + 31) {
	 animation-delay: -0.97s;
}
 .item:nth-child(n + 32) {
	 animation-delay: -0.84s;
}
 .item:nth-child(n + 33) {
	 animation-delay: -0.71s;
}
 .item:nth-child(n + 34) {
	 animation-delay: -0.58s;
}
 .item:nth-child(n + 35) {
	 animation-delay: -0.45s;
}
 .item:nth-child(n + 36) {
	 animation-delay: -0.32s;
}
 .item:nth-child(n + 37) {
	 animation-delay: -0.19s;
}
 .item:nth-child(n + 38) {
	 animation-delay: -0.06s;
}
 .item:nth-child(n + 39) {
	 animation-delay: 0.07s;
}
 .item:nth-child(n + 40) {
	 animation-delay: 0.2s;
}
 .item:nth-child(n + 41) {
	 animation-delay: 0.33s;
}
 .item:nth-child(n + 42) {
	 animation-delay: 0.46s;
}
 .item:nth-child(n + 43) {
	 animation-delay: 0.59s;
}
 .item:nth-child(n + 44) {
	 animation-delay: 0.72s;
}
 .item:nth-child(n + 45) {
	 animation-delay: 0.85s;
}
 .item:nth-child(n + 46) {
	 animation-delay: 0.98s;
}
 .item:nth-child(n + 47) {
	 animation-delay: 1.11s;
}
 .item:nth-child(n + 48) {
	 animation-delay: 1.24s;
}
 .item:nth-child(n + 49) {
	 animation-delay: 1.37s;
}
 .item:nth-child(n + 50) {
	 animation-delay: 1.5s;
}
 .item:nth-child(n + 51) {
	 animation-delay: 1.63s;
}
 .item:nth-child(n + 52) {
	 animation-delay: 1.76s;
}
 .item:nth-child(n + 53) {
	 animation-delay: 1.89s;
}
 .item:nth-child(n + 54) {
	 animation-delay: 2.02s;
}
 .item:nth-child(n + 55) {
	 animation-delay: 2.15s;
}
 .item:nth-child(n + 56) {
	 animation-delay: 2.28s;
}
 .item:nth-child(n + 57) {
	 animation-delay: 2.41s;
}
 .item:nth-child(n + 58) {
	 animation-delay: 2.54s;
}
 .item:nth-child(n + 59) {
	 animation-delay: 2.67s;
}
 .item:nth-child(n + 60) {
	 animation-delay: 2.8s;
}
 .item:nth-child(n + 61) {
	 animation-delay: 2.93s;
}
 .item:nth-child(n + 62) {
	 animation-delay: 3.06s;
}
 .item:nth-child(n + 63) {
	 animation-delay: 3.19s;
}
 .item:nth-child(n + 64) {
	 animation-delay: 3.32s;
}
 .item:nth-child(n + 65) {
	 animation-delay: 3.45s;
}
 .item:nth-child(n + 66) {
	 animation-delay: 3.58s;
}
 .item:nth-child(n + 67) {
	 animation-delay: 3.71s;
}
 .item:nth-child(n + 68) {
	 animation-delay: 3.84s;
}
 .item:nth-child(n + 69) {
	 animation-delay: 3.97s;
}
 .item:nth-child(n + 70) {
	 animation-delay: 4.1s;
}
 .item:nth-child(n + 71) {
	 animation-delay: 4.23s;
}
 .item:nth-child(n + 72) {
	 animation-delay: 4.36s;
}
 .item:nth-child(n + 73) {
	 animation-delay: 4.49s;
}
 .item:nth-child(n + 74) {
	 animation-delay: 4.62s;
}
 .item:nth-child(n + 75) {
	 animation-delay: 4.75s;
}
 .item:nth-child(n + 76) {
	 animation-delay: 4.88s;
}
 .item:nth-child(n + 77) {
	 animation-delay: 5.01s;
}
 .item:nth-child(n + 78) {
	 animation-delay: 5.14s;
}
 .item:nth-child(n + 79) {
	 animation-delay: 5.27s;
}
 .item:nth-child(n + 80) {
	 animation-delay: 5.4s;
}
 .item:nth-child(n + 81) {
	 animation-delay: 5.53s;
}
 .item:nth-child(n + 82) {
	 animation-delay: 5.66s;
}
 .item:nth-child(n + 83) {
	 animation-delay: 5.79s;
}
 .item:nth-child(n + 84) {
	 animation-delay: 5.92s;
}
 .item:nth-child(n + 85) {
	 animation-delay: 6.05s;
}
 .item:nth-child(n + 86) {
	 animation-delay: 6.18s;
}
 .item:nth-child(n + 87) {
	 animation-delay: 6.31s;
}
 .item:nth-child(n + 88) {
	 animation-delay: 6.44s;
}
 .item:nth-child(n + 89) {
	 animation-delay: 6.57s;
}
 .item:nth-child(n + 90) {
	 animation-delay: 6.7s;
}
 .item:nth-child(n + 91) {
	 animation-delay: 6.83s;
}
 .item:nth-child(n + 92) {
	 animation-delay: 6.96s;
}
 .item:nth-child(n + 93) {
	 animation-delay: 7.09s;
}
 .item:nth-child(n + 94) {
	 animation-delay: 7.22s;
}
 .item:nth-child(n + 95) {
	 animation-delay: 7.35s;
}
 .item:nth-child(n + 96) {
	 animation-delay: 7.48s;
}
 .item:nth-child(n + 97) {
	 animation-delay: 7.61s;
}
 .item:nth-child(n + 98) {
	 animation-delay: 7.74s;
}
 .item:nth-child(n + 99) {
	 animation-delay: 7.87s;
}
 .item:nth-child(n + 100) {
	 animation-delay: 8s;
}
 @keyframes rotate {
	 0% {
		 transform: rotate(0deg);
	}
	 100% {
		 transform: rotate(360deg);
	}
}
 @keyframes rotate2 {
	 0% {
		 transform: rotateY(0deg);
	}
	 100% {
		 transform: rotateY(360deg);
	}
}
 @keyframes hue {
	 0% {
		 filter: hue-rotate(0deg);
	}
	 0% {
		 filter: hue-rotate(360deg);
	}
}
</style>



@endsection
