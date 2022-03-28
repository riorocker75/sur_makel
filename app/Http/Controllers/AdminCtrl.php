<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\Hash;

use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use App\Models\User;





class AdminCtrl extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

	public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if(!Session::get('login-adm')){
                return redirect('/login')->with('alert-danger','Dilarang Masuk Terlarang');
            }
            return $next($request);
        });
        
    }
    public function __invoke(Request $request)
    {
       

    }

    function index(){
          return view('admin.admin');
    }


    // Surat Masuk
    function surat_masuk(){
        $data= SuratMasuk::orderBy('id','desc')->get();
        return view('admin.surat_masuk',[
            'data' => $data
        ]);
    }

      function surat_masuk_add(){
        return view('admin.surat_masuk_add');
    }

    function surat_masuk_act(Request $request){
         $request->validate([
            'dinas' => 'required'
        ]);

         $date=date('Y-m-d');

         DB::table('surat_masuk')->insert([
            'dinas' => $request->dinas,
            'tanggal_masuk' =>$date,
            'no_surat' =>$request->no_surat,
            'tanggal_surat' =>$request->tgl_masuk,
            'uraian' => $request->uraian,
            'status' => 1
        ]);

        return redirect('/dashboard/surat-masuk/data')->with('alert-success','data tersimpan');

    }

    
    function surat_masuk_edit($id){
          $data = SuratMasuk::where('id',$id)->get();
        return view('admin.surat_masuk_edit',[
            'data' =>$data
        ]);
    }

    function surat_masuk_update(Request $request){
          $request->validate([
            'dinas' => 'required'
        ]);
        $id=$request->id;

         DB::table('surat_masuk')->where('id',$id)->update([
            'dinas' => $request->dinas,
            'no_surat' =>$request->no_surat,
            'tanggal_surat' =>$request->tgl_masuk,
            'uraian' => $request->uraian,
        ]);

        return redirect('/dashboard/surat-masuk/data')->with('alert-success','data tersimpan');

    }
    function surat_masuk_delete(){
        SuratMasuk::where('id',$id)->delete();
        return redirect('/dashboard/surat-masuk/data')->with('alert-success','Data Berhasil');  
    }



    // surat keluar
    // Surat Masuk
    function surat_keluar(){
        $data= SuratKeluar::orderBy('id','desc')->get();
        return view('admin.surat_keluar',[
            'data' => $data
        ]);
    }

      function surat_keluar_add(){
        return view('admin.surat_keluar_add');
    }

    function surat_keluar_act(Request $request){
         $request->validate([
            'dinas' => 'required',
            'scan' => 'file|image|mimes:jpeg,png,jpg|max:2048'
        ]);

           $scan_surat =$request->file('scan');
        $nf_scan_surat = rand(10000,99999)."_".rand(1000,9999).".".$scan_surat->getClientOriginalExtension();
        $tujuan_upload = 'upload';

         $scan_surat->move($tujuan_upload,$nf_scan_surat);

         $date=date('Y-m-d');

         DB::table('surat_keluar')->insert([
            'dinas' => $request->dinas,
            'tanggal_keluar' =>$date,
            'no_surat' =>$request->no_surat,
            'tanggal_surat' =>$request->tgl_keluar,
            'scan_surat' =>$nf_scan_surat,
            'uraian' => $request->uraian,
            'status' => 1
        ]);

        return redirect('/dashboard/surat-keluar/data')->with('alert-success','data tersimpan');

    }

    
    function surat_keluar_edit($id){
          $data = SuratKeluar::where('id',$id)->get();
        return view('admin.surat_keluar_edit',[
            'data' =>$data
        ]);
    }

    function surat_keluar_update(Request $request){
              $request->validate([
            'dinas' => 'required',
            'scan' => 'file|image|mimes:jpeg,png,jpg|max:2048'

        ]);
        $id=$request->id;

        $scan_surat =$request->file('scan');
        $nf_scan_surat = rand(10000,99999)."_".rand(1000,9999).".".$scan_surat->getClientOriginalExtension();
        $tujuan_upload = 'upload';

         $scan_surat->move($tujuan_upload,$nf_scan_surat);
        if($scan_surat == ""){
             DB::table('surat_keluar')->where('id',$id)->update([
                'dinas' => $request->dinas,
                'no_surat' =>$request->no_surat,
                'tanggal_surat' =>$request->tgl_keluar,
                'uraian' => $request->uraian,
              ]);
        }else{
               DB::table('surat_keluar')->where('id',$id)->update([
                'dinas' => $request->dinas,
                'no_surat' =>$request->no_surat,
                'tanggal_surat' =>$request->tgl_keluar,
                'scan_surat' =>$nf_scan_surat,
                'uraian' => $request->uraian,
             ]);
        }
      

        return redirect('/dashboard/surat-keluar/data')->with('alert-success','data tersimpan');

    }
    function surat_keluar_delete(){
        SuratMasuk::where('id',$id)->delete();
        return redirect('/dashboard/surat-keluar/data')->with('alert-success','Data Berhasil');  
    }


    // cetak surat masuk

        function cetak_suratMasuk(Request $request){
                $dari =$request->dari;
                $sampai =$request->sampai;  

                $fdari=format_tanggal(date('Y-m-d',strtotime($dari)));
                $fsampai=format_tanggal(date('Y-m-d',strtotime($sampai)));

                $cek_data=DB::table('surat_masuk')
                        ->where('status',1)
                        ->whereBetween('tanggal_masuk', [$dari, $sampai])
                        ->orderBy('tanggal_masuk','desc')
                        ->get();

                if(count($cek_data) < 1){
                     return redirect()->back();
                }
                        
                return view('cetak.cetak_surat_masuk',[
                    'data' =>$cek_data,
                    'dari' => $fdari,
                    'sampai' => $fsampai,
                ]);

        }

    // cetak surat keluar
 function cetak_suratKeluar(Request $request){
                $dari =$request->dari;
                $sampai =$request->sampai;  

                $fdari=format_tanggal(date('Y-m-d',strtotime($dari)));
                $fsampai=format_tanggal(date('Y-m-d',strtotime($sampai)));

                $cek_data=DB::table('surat_keluar')
                        ->where('status',1)
                        ->whereBetween('tanggal_keluar', [$dari, $sampai])
                        ->orderBy('tanggal_keluar','desc')
                        ->get();

                if(count($cek_data) < 1){
                     return redirect()->back();
                }
                        
                return view('cetak.cetak_surat_keluar',[
                    'data' =>$cek_data,
                    'dari' => $fdari,
                    'sampai' => $fsampai,
                ]);

        }


    

}
