@extends('layouts.main_app')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Pengaturan Akun</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
              <li class="breadcrumb-item active">Pengaturan Akun</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->



    </div>  
    
    <section class="content">
  
      <div class="container-fluid">
         <div class="card">
              <div class="card-header">
                <h3 class="card-title">Pengaturan Akun</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{ url('/dashboard/pengaturan/update') }}" enctype="multipart/form-data" method="post">
                       @csrf  
                       @method('POST')
                <div class="row">
                 <div class="col-md-6">
                         
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ganti Password</label>
                                <input type="password" class="form-control" name="password">
                                <span style="color:red">*kosongkan jika tidak ingin diubah</span>
                            </div>


                           

                 </div>

                </div>
                <button type="submit" class="btn btn-primary btn-lg float-right">Ubah</button>
                 
                 </form>

              </div>
                 </div>
              </div>
              <!-- /.card-body -->
      </section>   

</div>  


@endsection