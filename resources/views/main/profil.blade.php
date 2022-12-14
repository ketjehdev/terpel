@extends('layout.app')

@section('content')
<div class="main-content">
    @include('layout.sidebar')
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(../assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
      <span class="mask bg-gradient-default opacity-8"></span>
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Halo, {{ ucfirst(auth()->user()->username) }}</h1>
            <p class="text-white mt-0 mb-5">Halaman manajemen profil pribadi kamu. sesuaikan data kamu, Jangan sampai melakukan kesalahan.</p>
            <a href="#form" class="btn btn-info">Edit profile</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row" id="form">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="{{ asset('img/profil_picture/'.auth()->user()->gambar) }}" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            
            <div class="card-body pt-6 pt-md-4">
              <div class="row text-center mt-6">
                <div class="col">
                  <div class="card-profile-stats mt-md-4">
                      <p class="bg-primary mb-1 px-3" style="display: inline-block; color: #fff; border-radius: 25px;">
                          {{ ucfirst(auth()->user()->role) }}
                      </p>
                      <br>
                    <strong>{{ auth()->user()->username }}</strong>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">My account</h3>
                </div>
                <div class="col-4 text-right">
                  <a href="{{ route('changePassword') }}" class="btn btn-sm btn-primary">Ubah Password</a>
                </div>
              </div>
            </div>

            <div class="card-body">
              <form action="/terpel/updateProfil" method="POST">
                @csrf
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Username</label>
                        <input type="text" name="username" id="input-username" class="form-control @error('username') is-invalid @enderror form-control-alternative" placeholder="Username" value="{{ auth()->user()->username }}">
                        @error('username')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">NIP</label>
                        <input type="text" disabled class="form-control form-control-alternative" value="{{ auth()->user()->nis }}">
                      </div>
                    </div>
                    
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">ROLE:</label>
                        <input type="text" class="form-control form-control-alternative" value="{{ ucfirst(auth()->user()->role) }}" disabled>
                      </div>
                    </div>

                    <div class="col-lg-6">
                        <button type="submit" class="btn btn-primary">Update Profil</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>

      @include('layout.footer')

    </div>
  </div>
@endsection