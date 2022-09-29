@extends('layout.app')
@section('title'){{ $title }}@endsection
@php
    date_default_timezone_set('Asia/Jakarta');
    $year = date('Y', strtotime('now'));
@endphp


@section('content')
    <div class="container-fluid">
        <div class="row p-xl-5 p-3 justify-content-center align-items-center" style="background-image: radial-gradient(circle at 12% 55%,rgba(33,150,243,.15),hsla(0,0%,100%,0) 25%),radial-gradient(circle at 85% 33%,rgba(108,99,255,.175),hsla(0,0%,100%,0)   25%); height: 100vh">
           <div class="col-12 col-xl-10">
            <div class="row p-0 rounded" style="background: #fff; height: 75vh; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
                <div class="col-xl-6 d-flex flex-column justify-content-center align-items-center p-4">
                    <div class="mb-4 text-center">
                        <h3 style="font-weight: bold"><span class="text-primary">T</span>erpel.</h3>
                        <h6>Selamat Datang!</h6>
                    </div>
                    
                    <div class="col-12 col-xl-8">
                        <form action="/loginHandle" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nis">NIS:</label>
                                <input type="text" value="{{ old('nis') }}" class="form-control @error('nis') is-invalid @enderror" placeholder="Nomor Induk Sekolah" name="nis" id="nis">    
                                @error('nis') <p class="text-danger" style="font-size: 13px">{{ $message }}</p> @enderror
                            </div>
                        
                            <div class="mb-3">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password Akun" name="password" id="password">
                                @error('password') <p class="text-danger" style="font-size: 13px">{{ $message }}</p> @enderror
                            </div>

                            <div class="mb-3">
                                <button class="btn btn-primary" style="width: 100%; border-radius:30px">Login</button>
                            </div>

                            <div class="mb-3 text-center">
                                <p style="font-size: 15px">Belum mempunyai akun? <a href="">Ajukan akun</a></p>
                            </div>

                            <hr>

                            <div class="mb-3 text-center">
                                <p style="font-size: 12px" class="text-secondary">Copyright &copy; {{ $year }}. <strong>Terpel.</strong> </a></p>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xl-6 d-none d-xl-block p-0">
                    <video autoplay muted loop style="width: 100%; border-radius: 0 6px 6px 0 ; object-fit: cover; height: 100%">
                        <source src="{{ asset('video/punk.mp4') }}" type="video/mp4">
                    </video>
                </div>
            </div>
           </div>
        </div>
    </div>
@endsection