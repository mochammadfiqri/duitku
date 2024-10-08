@extends('layouts.backend-dashboard.app')
@section('title', 'Pengeluaran')
@section('judul', 'Pengeluaran')

@section('content')
    {{-- Style --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
            
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    <div class="container-fluid">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                @php
                    $totalOutcome = \App\Models\Modelpengeluaran::totalOutcome();
                @endphp
            <h3>@currency($totalOutcome)</h3>
            <p>Total Pengeluaran</p>
            </div>
            <div class="icon">
            <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="container-xl">
        <div class="flex-lg-wrap">
            @if (Session::has('statusAdd'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('msgAdd') }}
                </div>
            @elseif (Session::has('statusUpdate'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('msgUpdate') }}
                </div>
            @elseif (Session::has('statusDelete'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('msgDelete') }}
                </div>
            @endif
        </div>
    </div>
    <!-- Table Daftar Pemasukan -->
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h2>Daftar <b>Pengeluaran </b>
                                {{-- MODAL TAMBAH BARANG --}}
                                <button type="button" class="btn btn-outline-primary me-md-2" data-bs-toggle="modal" data-bs-target="#modalTambahPengeluaran"><i class="fas fa-plus"></i>
                                Tambah
                                </button>
                                @include('Pengeluaran.formtambah')
                                {{-- END MODAL TAMBAH BARANG --}}
                            </h2>
                        </div>
                        <div class="col-sm-4">
                            <form action="" method="get">
                                <div class="search-box">
                                    <i class="material-icons">&#xE8B6;</i>
                                    <input type="text" class="form-control" name="search" placeholder="Search&hellip;" autofocus="true">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>@sortablelink('nominal', 'Nominal')</th>
                            <th>Jenis Pengeluaran</th>
                            <th>Keterangan</th>
                            <th>@sortablelink('tanggal', 'Tanggal')</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $nomor = 1 + (($dataPengeluaran->currentPage()-1) * $dataPengeluaran->perPage());
                        @endphp
                        @foreach ($dataPengeluaran as $data)
                        <tr>
                            <td>{{ $nomor++ }}</td>
                            {{-- <td>{{ $data->nominal }}</td> --}}
                            <td>@currency($data->nominal)</td>
                            <td>{{ $data->jenis_pengeluaran }}</td>
                            <td>{{ $data->keterangan }}</td>
                            <td>{{ $data->tanggal }}</td>
                            <td>
                                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalEditPengeluaran{{ $data->id }}"><i class="fas fa-edit"></i></button>
                                @include('Pengeluaran.edit')
                                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalHapusPengeluaran{{ $data->id }}"><i class="fas fa-trash-alt"></i></button>
                                @include('Pengeluaran.hapus')
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="clearfix">
                    {{ $dataPengeluaran->withQueryString()->links() }}
                </div>
            </div>
        </div>  
    </div>
@endsection