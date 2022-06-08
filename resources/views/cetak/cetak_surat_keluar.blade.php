@extends('layouts.cetak_app')
@section('content')

<div class="cetak_laporan">
    <div class="judul_laporan">
        Hasil Rekapan Surat Keluar <br>
        Kantor Lurah Kartini Binjai Kota<br>
        <span>{{$dari}} - {{$sampai}}</span>
        <br>
        <br>
    </div>
    <div class="tabel_laporan">
        <table class="tabel_isi">
               <thead>
                  <tr>
                    <th>No</th>
                    <th>Dinas/Instansi</th>
                    <th>Tanggal Keluar</th>
                    <th>Nomor Surat</th>
                    <th>Tanggal Surat</th>
                    <th>Keterangan</th>
                
                  </tr>
                  </thead>
                  <tbody>
                          <?php $no=1; ?>
                      @foreach($data as $dt)
                                 <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$dt->dinas}}</td>
                                    <td>{{format_tanggal(date('Y-m-d',strtotime($dt->tanggal_keluar)))}} </td>
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