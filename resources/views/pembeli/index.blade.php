@extends('templates.main')

@section('content')
    
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">Masukkan Data Pembeli Baru</button>
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
              <a href=""><i class="fa fa-eye btn-sm btn-info"></i></a>
              <a href=""><i class="fa fa-edit btn-sm btn-warning"></i></a>
              <a href=""><i class="fa fa-trash btn-sm btn-danger"></i></a>
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

<!-- Trigger the modal with a button -->


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

@endsection