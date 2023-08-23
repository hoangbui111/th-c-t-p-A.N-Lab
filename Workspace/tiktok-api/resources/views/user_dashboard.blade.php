@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  @include('head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Phần dropdown cho logout -->
      @auth
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }}
          </a>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </div>
        </li>
      @endauth
    </ul>
  </nav>
  <!-- /.navbar -->

  @include('sidebar') 
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @include('alert')
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- Card header -->
            <div class="card card-primary mt-3">
              <div class="card-header">
                <h3 class="card-title">Trang Người dùng</h3>
              </div>
              <!-- Card content -->
              <div class="card-body">
                 <!-- Thêm phần sản phẩm ở đây -->
                </div>
              </div>
              <!-- /.card -->
            </div>
            <!-- ... Các phần khác tương tự ... -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
  </body>
  </html>
  @endsection
