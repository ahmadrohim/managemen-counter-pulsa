@extends('templates.main')

@section('content')
    
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
       

        <div class="row">
        <div class="col-xs-8">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Masukkan Data Pembeli Baru
          </button>
        </div>
        <div class="col-xs-4">
          <form action="/{{ $url }}" method="get">
            <div class="input-group">
              <input type="text" name="search" class="form-control" style="background-color: white"  placeholder="Masukkan pencarian..">
              <span class="input-group-btn">
                    <button type="submit"  id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                  </span>
            </div>
          </form>
        </div>
        </div>

        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible" style="margin-top: 8px" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif 
     

        @if($errors->any())
        <div class="alert alert-danger alert-dismissible" style="margin-top: 8px">
          <a href="#" class="close" style="color: white" data-dismiss="alert" aria-label="close">&times;</a>
            @foreach($errors->all() as $item)
               <ul>
                <li>{{ $item }}</li>
               </ul>
            @endforeach
        </div> 
        @endif

       
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example2" class="table table-bordered table-hover">
          <thead>
          <tr>
            <th style="width: 50px">No</th>
            <th>Nama</th>
            <th>No Telepon</th>
            <th>Tanggal Beli</th>
            <th>Jumlah Beli</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
             @php
                   $i = 1 + (1 * ($page - 1))
             @endphp
            @foreach($pembeli as $pmb)
          <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $pmb->nama }}</td>
            <td>{{ $pmb->no_telepon }}</td>
            <td> {{  $pmb->tanggal_beli  }}</td>
            <td>{{ $pmb->jumlah_beli }}</td>
            <td>  
              <a href="/pembeli/{{ $pmb->kode_pembeli }}"><i class="fa fa-eye btn-sm btn-info"></i></a>
              <a href="/pembeli/{{ $pmb->kode_pembeli }}/edit"><i class="fa fa-edit btn-sm btn-warning"></i></a>
              <form action="/pembeli/{{ $pmb->kode_pembeli }}" style="display: inline;" method="post">
                @csrf
                @method('delete')
              <button style="border: 0; padding: 0%" type="submit"><i class="fa fa-trash btn-sm btn-danger "></i></button>
            </form>
            </td>
          </tr>
            @endforeach

          
          </tbody>
          <tfoot>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>No Telepon</th>
            <th>Tanggal Beli</th>
            <th>Jumlah Beli</th>
            <th>Aksi</th>
          </tr>
          </tfoot>
        </table>

        {{ $pembeli->links() }}
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

    
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Masukkan Data Pembeli Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/pembeli" method="post">
          @csrf
          <div class="form-group   @error('nama')has-error @enderror ">
            <label for="nama">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="nama" value="{{ old('nama') }}" style=" @error('nama') border-color: rgb(233, 2, 2) @enderror" required >
            @error('nama')<span class="help-block">Help block with error</span>@enderror
          </div>
          <div class="form-group">
            <label for="no_telepon">No Telepon:</label>
            <input type="text" class="form-control" id="no_telepon" name="no_telepon" placeholder="no telepon" value="{{ old('no_telepon') }}" required>
          </div>
          <div class="form-group">
            <label for="tanggal_beli">Tanggal Beli:</label>
            <input type="date" class="form-control" id="tanggal_beli" name="tanggal_beli" placeholder="tanggal beli" value="{{ old('tanggal_beli') }}" required>
          </div>
          <div class="form-group">
            <label for="jumlah_beli">Jumlah Beli:</label>
            <input type="text" class="form-control" id="jumlah_beli" name="jumlah_beli" placeholder="jumlah beli" value="{{ old('jumlah_beli') }}" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default">Simpan</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection