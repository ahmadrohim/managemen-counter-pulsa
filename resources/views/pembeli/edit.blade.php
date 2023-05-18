@extends('templates.main')

@section('content')
<div class="row">
    <div class="col-xs-6">
        <div class="box">
            <div class="box-header" style="margin-top:8px">
                <form action="/pembeli/{{ $pembeli->kode_pembeli }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group   @error('nama')has-error @enderror ">
                      <label for="nama">Nama:</label>
                      <input type="text" class="form-control" id="nama" name="nama" placeholder="nama" value="{{ old('nama', $pembeli->nama) }}" style=" @error('nama') border-color: rgb(233, 2, 2) @enderror" required >
                      @error('nama')<span class="help-block">Help block with error</span>@enderror
                    </div>
                    <div class="form-group">
                      <label for="no_telepon">No Telepon:</label>
                      <input type="text" class="form-control" id="no_telepon" name="no_telepon" placeholder="no telepon" value="{{ old('no_telepon', $pembeli->no_telepon) }}" required>
                    </div>
                    <div class="form-group">
                      <label for="tanggal_beli">Tanggal Beli:</label>
                      <input type="date" class="form-control" id="tanggal_beli" name="tanggal_beli" placeholder="tanggal beli" value="{{ old('tanggal_beli', $pembeli->tanggal_beli) }}" required>
                    </div>
                    <div class="form-group">
                      <label for="jumlah_beli">Jumlah Beli:</label>
                      <input type="text" class="form-control" id="jumlah_beli" name="jumlah_beli" placeholder="jumlah beli" value="{{ old('jumlah_beli', $pembeli->jumlah_beli) }}" required>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-default">Simpan Perubahan</button>
                    <a href="/pembeli" class="btn btn-default">Kembali</a>
                  </div>
                </form>
        </div>
    </div>
</div>
@endsection