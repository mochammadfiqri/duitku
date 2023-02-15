@extends('layouts.backend-dashboard.app')
@section('title', 'Pemasukan')
@section('judul', 'Pemasukan')

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
            <h3>Rp. 1.000.000.,</h3>
            <p>Total Pemasukan</p>
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
                            <h2>Daftar <b>Pemasukan </b>
                                {{-- MODAL TAMBAH BARANG --}}
                                <button type="button" class="btn btn-outline-primary me-md-2" data-bs-toggle="modal" data-bs-target="#modalTambahPemasukan"><i class="fas fa-plus"></i>
                                Tambah
                                </button>
                                @include('Pemasukan.formtambah')
                                {{-- END MODAL TAMBAH BARANG --}}
                            </h2>
                        </div>
                        <div class="col-sm-4">
                            <form action="" method="get">
                                <div class="search-box">
                                    <i class="material-icons">&#xE8B6;</i>
                                    <input type="text" class="form-control" name="search" placeholder="Search&hellip;">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nominal <i class="fa fa-sort"></i></th>
                            <th>Jenis Pemasukan<i class="fa fa-sort"></i></th>
                            <th>Keterangan</th>
                            <th>Tanggal <i class="fa fa-sort"></i></th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataPemasukan as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->nominal }}</td>
                            <td>{{ $data->jenis_pemasukan }}</td>
                            <td>{{ $data->keterangan }}</td>
                            <td>{{ $data->tanggal }}</td>
                            <td>
                                {{-- <a href="/pemasukan/edit/{{ $data->id }}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a> --}}
                                {{-- <a href="#" data-bs-toggle="modal" data-bs-target="#modalEditPemasukan{{ $data->id }}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a> --}}
                                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalEditPemasukan{{ $data->id }}"><i class="fas fa-edit"></i></button>
                                @include('Pemasukan.edit')
                                {{-- <a href="/pemasukan/hapus/{{ $data->id }}" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a> --}}
                                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalHapusPemasukan{{ $data->id }}"><i class="fas fa-trash-alt"></i></button>
                                @include('Pemasukan.hapus')
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="clearfix">
                    {{ $dataPemasukan->links() }}
                    {{-- <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                    <ul class="pagination">
                        <li class="page-item disabled"><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
                        <li class="page-item"><a href="#" class="page-link">1</a></li>
                        <li class="page-item"><a href="#" class="page-link">2</a></li>
                        <li class="page-item active"><a href="#" class="page-link">3</a></li>
                        <li class="page-item"><a href="#" class="page-link">4</a></li>
                        <li class="page-item"><a href="#" class="page-link">5</a></li>
                        <li class="page-item"><a href="#" class="page-link"><i class="fa fa-angle-double-right"></i></a></li>
                    </ul> --}}
                </div>
            </div>
        </div>  
    </div>
@endsection