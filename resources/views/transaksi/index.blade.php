@extends('layouts.admin')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('layouts/_flash')
            <div class="card">
                {{-- <div class="card-header">
                    Data obat
                    <a href="{{ route('transaksi.create') }}" class="btn btn-sm btn-primary" style="float: right">
                        Tambah Data
                    </a>
                </div> --}}

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-middle" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Nama Obat</th>
                                    <th>Jumlah</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Total Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($transaksi as $data)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $data->pembeli->nama }}</td>
                                    <td>{{ $data->id_obat }}</td>
                                    <td>{{ $data->jumlah }}</td>
                                    <td>{{ $data->tanggal_transaksi}}</td>
                                    <td>{{ $data->total }}</td>
                                    <td>
                                        <form action="{{ route('transaksi.destroy', $data->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <a href="{{ route('transaksi.show', $data->id) }}"
                                                class="btn btn-sm btn-outline-warning">
                                                Show
                                            </a> |
                                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('Apakah Anda Yakin?')">Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection