@extends('dashboard.main')

@section('container')
<div class="card">
	<div class="card-body">
		<h1 class="">Data Barang</h1>
		{{-- @include('utilities.alert') --}}
		<div class="d-flex justify-content-end mb-3">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fas fa-fw fa-plus"></i>
                Tambahkan Data
            </button>

            <!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg"> <!-- Gunakan modal-lg untuk ukuran modal yang lebih besar -->
					<div class="modal-content">
						<div class="modal-header">
							<h1 class="modal-title fs-5" id="exampleModalLabel">Tambah data barang</h1>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<form action="{{ route('databarang.store') }}" method="post" class="row g-3">
								@csrf
								{{-- <div class="col-md-6">
									<div class="form-floating">
										<!-- Input menggunakan id_petugas -->
										<input type="text" name="id_petugas" class="form-control @error('id_petugas') is-invalid @enderror" id="id_petugas" value="{{ $idPetugas }}" placeholder="ID Petugas" required value="{{ old('id_petugas') }}">
										<label for="id_petugas">ID Petugas</label>
										@error('id_petugas')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
										@enderror
									</div>
								</div> --}}
								<div class="col-md-6">
									<div class="form-floating">
										<input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama Barang" required value="{{ old('nama') }}">
										<label for="nama">Nama Barang</label>
										@error('nama')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
										@enderror
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-floating">
										<input type="number" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" placeholder="Jumlah" required value="{{ old('jumlah') }}">
										<label for="jumlah">Jumlah</label>
										@error('jumlah')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
										@enderror
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-floating">
										<input type="text" name="kode_barang" class="form-control @error('kode_barang') is-invalid @enderror" id="kode_barang" placeholder="Kode barang" required value="{{ old('kode_barang') }}">
										<label for="kode_barang">Kode Barang</label>
										@error('kode_barang')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
										@enderror
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-floating">
										<input type="number" name="id_ruang" class="form-control @error('id_ruang') is-invalid @enderror" id="id_ruang" placeholder="Kode barang" required value="{{ old('id_ruang') }}">
										<label for="id_ruang">Id Ruang</label>
										@error('id_ruang')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
										@enderror
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-floating">
										<input type="date" name="tanggal_register" class="form-control @error('tanggal_register') is-invalid @enderror" id="tanggal_register" placeholder="tanggal_register" required value="{{ old('tanggal_register') }}">
										<label for="tanggal_register">Tanggal Ditambahkan</label>
										@error('tanggal_register')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
										@enderror
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-floating">
										<input type="text" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" placeholder="Keterangan" required>
										<label for="Keterangan">Keterangan</label>
										@error('keterangan')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
										@enderror
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-floating">
										<select name="kondisi" class="form-select" required>
											<option value="" disabled selected>== KONDISI ==</option>
											<option value="Baru">Baru</option>
											<option value="Lama">Lama</option>
											<option value="Rusak">Rusak</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-floating">
										<select name="jenis" class="form-select" required>
											<option value="" disabled selected>== JENIS ==</option>
											<option value="Elektronik">Elektronik</option>
											<option value="Buku">Buku</option>
											<option value="Peralatan">Peralatan</option>
											<option value="Dll">Dll</option>
										</select>
									</div>
								</div>
								<div class="col-12">
									<button class="btn btn-primary w-100 py-2" type="submit">Tambahkan</button>
								</div>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
						</div>
					</div>
				</div>
			</div>
			
			
        </div>

		<div class="row">
			<div class="col-lg-12">
				<div class="table-responsive">
					
					<table class="table table-bordered table-hover" id="datatable">
						@if (Session::has('sukses'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('sukses') }}
                        </div>
                        @endif
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Nama Barang</th>
								<th scope="col">Jenis</th>
								<th scope="col">Kondisi</th>
								<th scope="col">Keterangan</th>
								<th scope="col">Tanggal Register</th>
								<th scope="col">Aksi</th>
							</tr>
						</thead>
						<tbody>
							@if ($barang->count() > 0)
							@foreach($barang as $barangs)
							<tr>
								<th scope="row">{{ $loop->iteration }}</th>
								<td>{{ $barangs->nama }}</td>
								<td>{{ $barangs->jenis }}</td>
								<td>{{ $barangs->kondisi }}</td>
								<td>{{ $barangs->keterangan }}</td>
								<td>{{ $barangs->tanggal_register }}</td>
								<td class="text-center">
									<div class="btn-group">
										<a href="{{ route('databarang.show',$barangs->id) }}" data-id=""
											class="btn btn-sm btn-info text-white show-modal mr-2" data-toggle="modal"
											data-target="#show_user">
											<i class="fas fa-fw fa-search"></i>
										</a>
									</div>
								</td>
							</tr>
							@endforeach
							@else
							<tr>
								<td class="text-center" colspan="7">Tidak Ada Data Yang Tersimpan</td>
							</tr>
							@endif
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection