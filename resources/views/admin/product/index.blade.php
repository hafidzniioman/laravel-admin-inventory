@extends('admin/admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Barang</h3>
                <div class="card-tools">
                 <a href="{{ URL::to('/admin/product/create')}}" class="btn btn-tool">
                     <i class="fa fa-plus"></i>
                     &nbsp; Add
                 </a>
             </div>
         </div>
         <div class="card-body">
            @if (Session::has('message'))
            <div id="alert-msg" class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ Session::get('message') }}
            </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>ID</th>
                                <th>QR Code</th>
                                <th>Nama Barang</th>
                                <th>Kode Barang</th>
                                <th>No Urut Pendaftaran</th>
                                <th>Merk</th>
                                <th>Tahun Peroleh</th>
                                <th>Jumlah Barang</th>
                                <th>Satuan Barang</th>
                                <th>Lokasi Barang</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td class="text-center">{{ $product['id'] }}</td>
                                <td><img src="data:image/png,' . DNS2D::getBarcodeHTML('4445645656', 'QRCODE')'"/></td>
                                <td>{{ $product['nama'] }}</td>
                                <td>{{ $product['kode_barang'] }}</td>
                                <td>{{ $product['no_urut_pendaftaran'] }}</td>
                                <td>{{ $product['merk'] }}</td>
                                <td>{{ $product['tahun_peroleh'] }}</td>
                                <td>{{ $product['jumlah_barang'] }}</td>
                                <td>{{ $product['satuan_barang'] }}</td>
                                <td>{{ $product['lokasi'] }}</td>
                                <td class="text-center"><img src="{{ asset('storage/'.$product['image']) }}" width="100"/></td>
                                <td class="text-center">
                                    <form method="POST" action="{{ URL::to('/admin/product/'.$product['id']) }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE" />
                                        <div class="btn-group">
                                            <a class="btn btn-info" href="{{ URL::to('/admin/product/'.$product['id']) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <a class="btn btn-success" href="{{ URL::to('/admin/product/'.$product['id'].'/edit') }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
 
@endsection