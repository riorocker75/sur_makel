@extends('layouts.main_app')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Surat</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Surat</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->



    </div>  
    
    <section class="content">
  
      <div class="container-fluid">
         <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data semua Surat </h3>
                <div class="float-right">
                  <a href="{{url('/dashboard/surat-keluar/add')}}" class="btn btn-primary">Tambah Surat Keluar</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                          {{-- filter tanggal cetak --}}
        <form action="{{url('/dashboard/cetak/surat-keluar')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="form-group">
                            <label for="">Dari Tanggal</label>
                           <input type="date" class="form-control" name="dari" id="dari" value="{{date('Y-m-d')}}">
                          </div> 
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="form-group">
                            <label for="">Sampai Tanggal</label>
                            <input type="date" class="form-control" name="sampai" id="sampai" value="{{date('Y-m-d')}}">

                          </div> 
                    </div>

                  <button type="submit" id="lap_filter" style="margin-top:32px;margin-bottom:20px" 
                    class="btn btn-outline-primary float-right">
                    Print &nbsp;
                    <i class="fa fa-print"></i>
                    </button>
                
                </div>
              </form>

                {{-- end filter  --}}
                <table id="table1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Dinas/Instansi</th>
                    <th>Tanggal Keluar</th>
                    <th>Nomor Surat</th>
                    <th>Tanggal Surat</th>
                    <th>Scanan Surat</th>
                    
                    <th>Keterangan</th>
                    
                    <th>Edit</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php $no=1; ?>
                      @foreach ($data as $dt)
                           <tr>
                                <td>{{$no++}}</td>
                                <td>{{$dt->dinas}}</td>
                                <td>{{format_tanggal(date('Y-m-d',strtotime($dt->tanggal_keluar)))}} </td>
                                <td>{{$dt->no_surat}} </td>
                                <td>{{$dt->scan_surat}} </td>

                                <td>{{format_tanggal(date('Y-m-d',strtotime($dt->tanggal_surat)))}}</td>
                                <td>{{$dt->uraian}} </td>

                                <td>
                                    <a href="{{url('/dashboard/surat-keluar/edit/'.$dt->id.'')}}" class="btn btn-warning">Ubah</a>
                                <a href="{{url('/dashboard/surat-keluar/edit/'.$dt->id.'')}}" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                      @endforeach
                 
                 
                  </tbody>
              
                </table>
              </div>
              <!-- /.card-body -->
      </section>   

</div>  


@endsection