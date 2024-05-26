@extends('dashboard.main')

@section('container')
<div class="card">
    <div class="card-body">
        <h1 class="">Peminjaman</h1>
    </div>
</div>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if (Session::has('sukses'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('sukses') }}
            </div>
            @endif
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('peminjaman.store') }}" method="POST">
                        @csrf
                        <div class="d-flex justify-content-center">
                            <div style="width: 1000px;">
                                <label for="exampleFormControlInput1" class="form-label">Id Peminjaman</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="id_peminjaman"
                                   value="PJ001" readonly required>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div style="width: 1000px;">
                                <label for="exampleFormControlInput1" class="form-label">Jumlah</label>
                                <input type="number" name="jumlah" class="form-control" id="exampleFormControlInput1"
                                    required placeholder="masukkan jumlah">
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div style="width: 1000px;">
                                <label for="exampleFormControlInput1" class="form-label">Pesan</label>
                                <input type="text" name="pesan" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Masukkan pesan (optional)">
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div style="width: 1000px;">
                                <label for="exampleFormControlInput1" class="form-label">Tanggal Peminjaman</label>
                                <input type="date" name="tanggal" class="form-control" id="exampleFormControlInput1"
                                    required placeholder="name@example.com">
                            </div>
                        </div>


                        <div class="dropdown-center">
                            <label for="exampleFormControlInput1" class="form-label">Nama Barang</label>
                            <select name="barang" class="dropdown-toggle w-100" required>
                                <option value="" disabled selected>== SILAHKAN PILIH SALAH SATU ==</option>
                                @foreach ($inventarisir as $barang)
                                <option value="{{ $barang->nama }}">{{ $barang->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="modal-footer mt-4">
                            <a href="/detailpinjam"><button type="button"
                                    class="btn btn-secondary btn-separator">Halaman Peminjaman</button></a>
                            <input type="submit" value="Simpan" name="edit" class="btn btn-warning">

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
