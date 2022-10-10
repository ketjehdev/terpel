@php
date_default_timezone_set('Asia/Jakarta');
$year = date('Y', strtotime('now'));
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('css/font.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
   
</head>
<body>

    <div class="container-fluid">
        <div class="row bg-info p-xl-5 p-3 justify-content-center align-items-center" style="height: 100vh">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    @include('templates.popup')
</body>
</html>