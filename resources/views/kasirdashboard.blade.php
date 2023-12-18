@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard Kasir</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Dashboard Kasir</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <!-- Content goes here -->

        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-concierge-bell"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Transaksi Terbaru</span>
                        <span class="info-box-number">{{ $no_pesanan }}</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-book"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Transaksi</span>
                        <span class="info-box-number">{{ $totalPesanan }}</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-burger"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Kategori Menu</span>
                        <span class="info-box-number">{{ $totalKategori }}</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-book"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Menu</span>
                        <span class="info-box-number">{{ $totalMenu }}</span>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title primary">Daftar Menu</h3>
                            <div class="card-tools"></div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Foto</th>
                                            <th>Nama Menu</th>
                                            <th>Deskripsi</th>
                                            <th>Harga</th> <!-- Perbaikan tag th -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($MenuData as $menu)
                                        <tr>
                                            <td>
                                                @if ($menu->image)
                                                <img src="{{ asset('/img/menu/' . $menu->image) }}" class="img-fluid " alt="Menu Photo" style="width: 70px; height: 70px; object-fit: cover;">
                                                @else
                                                No photo available
                                                @endif
                                            </td>
                                            <td>{{ $menu->nama_menu }}</td>
                                            <td>{{ $menu->deskripsi }}</td>
                                            <td>Rp. {{ $menu->harga }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <!-- Card Kedua -->
                <div class="col-12 col-md-6">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title secondary">Riwayat Transaksi</h3>
                            <div class="card-tools"></div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered text-center" style="border: 1px solid #ccc;" id="data-table">
                                    <thead>
                                        <tr style="background-color: #2c3e50; color: white;">
                                            <th>No. Pesanan</th>
                                            <th>Jenis Pesanan</th>
                                            <th>Jenis Pembayaran</th>
                                            <th>Tanggal Transaksi</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($TransaksiData as $transaksi)
                                        <tr class="text-center">
                                            <td>{{ $transaksi->no_pesanan }}</td>
                                            <td>{{ $transaksi->jenis_pesanan }}</td>
                                            <td>{{ $transaksi->jenis_pembayaran }}</td>
                                            <td>{{ date('d F Y', strtotime($transaksi->created_at))  }}</td>
                                            <td>Rp. {{ number_format($transaksi->total_subtotal) }} </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>



    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection