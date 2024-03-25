@extends('dashboard.main')

@section('container')
<div class="card">
	<div class="card-body">
		<h1 class="">Data Barang</h1>
		{{-- @include('utilities.alert') --}}
		<div class="d-flex justify-content-end mb-3">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#user_create_modal">
				<i class="fas fa-fw fa-plus"></i>
				Tambah Data
			</button>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<div class="table-responsive">
					<table class="table table-bordered table-hover" id="datatable">

						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Nama Lengkap</th>
								<th scope="col">Alamat Email</th>
								<th scope="col">Tanggal Ditambahkan</th>
								<th scope="col">Aksi</th>
							</tr>
						</thead>
						<tbody>
							{{-- @foreach($users as $user) --}}
							<tr>
								<th scope="row">1</th>
								<td>raden</td>
								<td>gg</td>
								<td>300</td>
								<td class="text-center">
									<div class="btn-group">
										<a data-id=""
											class="btn btn-sm btn-info text-white show-modal mr-2" data-toggle="modal"
											data-target="#show_user">
											<i class="fas fa-fw fa-search"></i>
										</a>
									</div>
								</td>
							</tr>
							{{-- @endforeach --}}
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection