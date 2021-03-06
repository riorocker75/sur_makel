@extends('layouts.main_app')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Surat Masuk</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
              <li class="breadcrumb-item active">Data Surat Masuk</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->



    </div>  
    
    <section class="content">
  
      <div class="container-fluid">
         <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tambah Data Surat Masuk</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{ url('/dashboard/surat-masuk/act') }}" method="post">
                       @csrf  
                       @method('POST')
                <div class="row">
                 <div class="col-md-6">
                         
                            <div class="form-group">
                                <label for="exampleInputEmail1">Dinas / Instansi</label>
                                <input type="text" class="form-control" name="dinas" required>
                            </div>

                             <div class="form-group">
                                <label for="exampleInputEmail1">Nomor Surat</label>
                                <input type="text" class="form-control" name="no_surat" required>
                            </div>
                             

                            <div class="form-group">
                                <label for="exampleInputEmail1">Tanggal Surat</label>
                                <input type="date" class="form-control" name="tgl_masuk" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Uraian</label>
                                <input type="text" class="form-control" name="uraian">
                            </div>

                           

                 </div>

                </div>
                <button type="submit" class="btn btn-primary btn-lg float-right">Tambah</button>
                 
                 </form>

              </div>
                 </div>
              </div>
              <!-- /.card-body -->
      </section>   

</div>  


@endsection