@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('inventaris.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nama" class="form-label">Nama Barang</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}">
        @error('nama')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="jumlah" class="form-label">Jumlah</label>
        <input type="number" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" name="jumlah" value="{{ old('jumlah') }}">
        @error('jumlah')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="kondisi" class="form-label">Kondisi</label>
        <select class="form-select @error('kondisi') is-invalid @enderror" id="kondisi" name="kondisi">
            <option value="">Pilih Kondisi</option>
            <option value="baik" {{ old('kondisi') == 'baik' ? 'selected' : '' }}>Baik</option>
            <option value="rusak" {{ old('kondisi') == 'rusak' ? 'selected' : '' }}>Rusak</option>
        </select>
        @error('kondisi')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
