@extends('layouts.cetak_app')
@section('content')

<div class="cetak_laporan">
    <div class="judul_laporan">
      KELURAHAN<br>
       <span>BINJAI KOTA</span> <br>
       <span>SURAT MASUK</span><br>
        <span>{{$dari}} - {{$sampai}}</span>
    </div>
    <div class="tabel_laporan" >
        <table class="table table-bordered table-striped">
               <thead>
                  <tr>
                    <th>No</th>
                    <th>Dinas/Instansi</th>
                    <th>Tanggal Masuk</th>
                    <th>Nomor Surat</th>
                    <th>Tanggal Surat</th>
                    <th>Uraian</th>
                
                  </tr>
                  </thead>
                  <tbody>
                          <?php $no=1; ?>
                      @foreach($data as $dt)
                      <tr>

                                <td>{{$no++}}</td>
                                <td>{{$dt->dinas}}</td>
                                <td>{{format_tanggal(date('Y-m-d',strtotime($dt->tanggal_masuk)))}} </td>
                                <td>{{$dt->no_surat}} </td>
                                <td>{{format_tanggal(date('Y-m-d',strtotime($dt->tanggal_surat)))}}</td>
                                <td>{{$dt->uraian}} </td>
                      </tr>

                      @endforeach
                  </tbody>     

        </table>
    </div>
    </div>

@endsection