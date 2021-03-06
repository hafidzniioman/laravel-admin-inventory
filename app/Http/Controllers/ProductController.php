<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Product;
use Redirect;
use Session;
use File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products=Product::all();
        $data=['products'=>$products];
        return view('admin/product/index')->with($data);
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/product/create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules = [
            'nama'=>'required',
            'kode_barang'=>'required|integer',
            'no_urut_pendaftaran'=>'required|integer',
            'merk'=>'required',
            'tahun_peroleh'=>'required',
            'jumlah_barang'=>'required|integer',
            'satuan_barang'=>'required|integer',
            'lokasi'=>'required',
            'imageFile'=>'required|mimes:jpg,png,jpeg,JPG',
        ];
        $pesan = [
            'nama.required'=>'Nama Barang Tidak Boleh Kosong',
            'kode_barang.required'=>'Kode Barang Tidak Boleh Kosong',
            'no_urut_pendaftaran.required'=>'No Urut Pendaftaran Tidak Boleh Kosong',
            'merk.required'=>'Merk Barang Tidak Boleh Kosong',
            'tahun_peroleh.required'=>'Tahun Peroleh Tidak Boleh Kosong',
            'jumlah_barang.required'=>'Jumlah Barang Tidak Boleh Kosong',
            'satuan_barang.required'=>'Satuan Barang Tidak Boleh Kosong',
            'lokasi.required'=>'Lokasi Barang Tidak Boleh Kosong',
            'imageFile.required'=>'Gambar Tidak Boleh Kosong'
        ];
        $validator=Validator::make(Input::all(),$rules,$pesan);
        
        //jika data ada yang kosong
        if ($validator->fails()) {
            
            //refresh halaman
            return Redirect::to('admin/product/create')
            ->withErrors($validator);
            
        }else{

            $path = public_path('product/');
            if(!File::exists($path)){
                File::makeDirectory($path, $mode = 0755, true, true);
            }

            $file_name = '';
            if($request->hasFile('imageFile')){
                $image=$request->file('imageFile');
                $file_name = $image->getClientOriginalName();
                $image->move($path,$file_name);
            }
                        
            $product=new \App\Product;
            
            $product->nama=Input::get('nama');
            $product->kode_barang=Input::get('kode_barang');
            $product->no_urut_pendaftaran=Input::get('no_urut_pendaftaran');
            $product->merk=Input::get('merk');
            $product->tahun_peroleh=Input::get('tahun_peroleh');
            $product->jumlah_barang=Input::get('jumlah_barang');
            $product->satuan_barang=Input::get('satuan_barang');
            $product->lokasi=Input::get('lokasi');
            $product->image=$file_name;
            $product->save();
 
            Session::flash('message','Product Stored');
            
            return Redirect::to('admin/product');
        }
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $product=Product::find($id);
        $d=['product'=>$product];
        
        return view('admin/product/show')->with($d);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product=Product::find($id);
        $d=['product'=>$product];
        return view('admin/product/edit')->with($d);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $rules = [
            'nama'=>'required',
            'kode_barang'=>'required|integer',
            'no_urut_pendaftaran'=>'required|integer',
            'merk'=>'required',
            'tahun_peroleh'=>'required',
            'jumlah_barang'=>'required|integer',
            'satuan_barang'=>'required|integer',
            'lokasi'=>'required',
            'imageFile'=>'required|mimes:jpg,png,jpeg,JPG',
        ];
        $pesan = [
            'nama.required'=>'Nama Barang Tidak Boleh Kosong',
            'kode_barang.required'=>'Kode Barang Tidak Boleh Kosong',
            'no_urut_pendaftaran.required'=>'No Urut Pendaftaran Tidak Boleh Kosong',
            'merk.required'=>'Merk Barang Tidak Boleh Kosong',
            'tahun_peroleh.required'=>'Tahun Peroleh Tidak Boleh Kosong',
            'jumlah_barang.required'=>'Jumlah Barang Tidak Boleh Kosong',
            'satuan_barang.required'=>'Satuan Barang Tidak Boleh Kosong',
            'lokasi.required'=>'Lokasi Barang Tidak Boleh Kosong',
            'imageFile.required'=>'Gambar Tidak Boleh Kosong'
        ];
        $validator=Validator::make(Input::all(),$rules,$pesan);
        
        if ($validator->fails()) {
            
            //refresh halaman
            return Redirect::to('admin/product/'.$id.'/edit')
            ->withErrors($validator);
            
        }else{
            
            $path = public_path('product/');
            if(!File::exists($path)){
                File::makeDirectory($path, $mode = 0755, true, true);
            }

            $file_name = '';
            if($request->hasFile('imageFile')){
                $image=$request->file('imageFile');
                $file_name = $image->getClientOriginalName();
                $image->move($path,$file_name);
            }
            
            $product=Product::find($id);
            
            $product->nama=Input::get('nama');
            $product->kode_barang=Input::get('kode_barang');
            $product->no_urut_pendaftaran=Input::get('no_urut_pendaftaran');
            $product->merk=Input::get('merk');
            $product->tahun_peroleh=Input::get('tahun_peroleh');
            $product->jumlah_barang=Input::get('jumlah_barang');
            $product->satuan_barang=Input::get('satuan_barang');
            $product->lokasi=Input::get('lokasi');
            $product->image=$file_name;
            $product->save();
            
            Session::flash('message','Data Barang Berhasil Diubah');
            
            return Redirect::to('admin/product');
        }
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product=Product::find($id);
        $product->delete();
        
        Session::flash('message','Data Barang Dihapus');
        
        return Redirect::to('admin/product');
    }

    /**
     * Display a listing API Product of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexApi()
    {
        $products=Product::all();
        $data=['products'=>$products];
        
        return response()->json([
            'data'=>$data,
            'message'=>'seluruh data json product berhasil ditampilkan'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showApi($id)
    {
        //
        $product=Product::find($id);
        $d=['product'=>$product];
        
        return response()->json([
            'data'=>$d,
            'message'=>'data json product berhasil ditampilkan'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateApi(Request $request, $id)
    {
        //
        $rules = [
            'nama'=>'required',
            'kode_barang'=>'required|integer',
            'no_urut_pendaftaran'=>'required|integer',
            'merk'=>'required',
            'tahun_peroleh'=>'required',
            'jumlah_barang'=>'required|integer',
            'satuan_barang'=>'required|integer',
            'lokasi'=>'required',
            'imageFile'=>'required|mimes:jpg,png,jpeg,JPG',
        ];
        $pesan = [
            'nama.required'=>'Nama Barang Tidak Boleh Kosong',
            'kode_barang.required'=>'Kode Barang Tidak Boleh Kosong',
            'no_urut_pendaftaran.required'=>'No Urut Pendaftaran Tidak Boleh Kosong',
            'merk.required'=>'Merk Barang Tidak Boleh Kosong',
            'tahun_peroleh.required'=>'Tahun Peroleh Tidak Boleh Kosong',
            'jumlah_barang.required'=>'Jumlah Barang Tidak Boleh Kosong',
            'satuan_barang.required'=>'Satuan Barang Tidak Boleh Kosong',
            'lokasi.required'=>'Lokasi Barang Tidak Boleh Kosong',
            'imageFile.required'=>'Gambar Tidak Boleh Kosong'
        ];
        $validator=Validator::make(Input::all(),$rules,$pesan);
        
        if ($validator->fails()) {
            
            //refresh halaman
            return Redirect::to('admin/product/'.$id.'/edit')
            ->withErrors($validator);
            
        }else{
            
            $image="";
            
            if (!$request->file('imageFile')) {
                # code...
                $image=Input::get('imagePath');
            }else{
                $image=$request->file('imageFile')->store('productImages','public');                
            }
            
            $product=Product::find($id);
            
            $product->nama=Input::get('nama');
            $product->kode_barang=Input::get('kode_barang');
            $product->no_urut_pendaftaran=Input::get('no_urut_pendaftaran');
            $product->merk=Input::get('merk');
            $product->tahun_peroleh=Input::get('tahun_peroleh');
            $product->jumlah_barang=Input::get('jumlah_barang');
            $product->satuan_barang=Input::get('satuan_barang');
            $product->lokasi=Input::get('lokasi');
            $product->image=$image;
            $product->save();
            
            return response()->json([
                'data'=>$product,
                'message'=>'update data berhasil'
            ]);
        }
    }
}
