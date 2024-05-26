

@extends('dashboard.main')
<style>
  .btn-separator {
      margin-right: 150px; /* Sesuaikan nilai margin dengan yang diinginkan */
  }
  
</style>
@section('container')
<style>
  body {
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
  }

  .container {
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      background-color: #fff;
      margin-top: 50px;
  }

  .form-group {
      margin-bottom: 20px;
  }

  label {
      font-weight: 600;
      margin-right: 10px;
  }

  .form-control {
      width: 100%;
      padding: 8px;
      border-radius: 5px;
      border: 1px solid #ccc;
  }

  .btn-secondary,
  .btn-warning {
      padding: 8px 20px;
      border-radius: 5px;
  }

  .btn-separator {
      margin-right: 10px;
  }
</style>
</head>
<body>
<div class="container">
  <h1 class="mt-4">Detail Data</h1>
  <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Detail</li>
  </ol>

  {{-- <form action="{{ route('datauser.update', $user->id) }}" method="POST">
      @csrf
      @method('PUT') --}}
      <div class="form-group">
          <label>Nama:</label>
          <input type="text" name="name" class="form-control" required placeholder="Masukkan Nama" value="{{ $user->name }}" disabled readonly>
      </div>
      <div class="form-group">
          <label>Email:</label>
          <input type="text" name="email" class="form-control" required placeholder="Masukkan Email" value="{{ $user->email }}" disabled readonly>
      </div>
      <div class="form-group">
          <label>Username:</label>
          <input type="text" name="username" class="form-control" required placeholder="Masukkan Username" value="{{ $user->username }}" disabled readonly>
      </div>
      <div class="form-group">
          <label>Alamat:</label>
          <input type="text" name="alamat" class="form-control" required placeholder="Masukkan Alamat" value="{{ $user->alamat }}" disabled readonly>
      </div>
      <div class="form-group">
          <label>Password:</label>
          <input type="password" class="form-control" required placeholder="Masukkan Alamat" value="{{ $user->password }}" disabled readonly>
      </div>
      <div class="form-group">
          <label>Level:</label>
          <select name="level" class="form-select w-100" required required disabled>
            <option value="" disabled selected>{{ $user->level }}</option>
              <option value="administrator">Administrator</option>
              <option value="operator">Operator</option>
              <option value="kepalagudang">Kepala Gudang</option>
          </select>
      </div>
      <div class="modal-footer mt-4">
          <a href="/datauser"><button type="button" class="btn btn-secondary btn-separator">Kembali</button></a>
          {{-- <input type="submit" value="Simpan" name="edit" class="btn btn-warning"> --}}
      </div>
  {{-- </form> --}}
</div>
@endsection