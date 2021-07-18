@extends('admin/admin')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Detail Barang</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">   
                            <div class="form-group">
                                <label for="name">Nama Barang</label>
                                <input id="name" type="text" value="{{ $product['nama'] }}" class="form-control" disabled />
                            </div>
                            <div class="form-group">
                                <label for="price">Kode Barang</label>
                                <input id="price" type="text" value="{{ $product['kode_barang'] }}" class="form-control" disabled />
                            </div>
                            <div class="form-group">
                                <label for="status">No Urut Pendaftaran</label>
                                <input id="status" type="text" value="{{ $product['no_urut_pendaftaran'] }}" class="form-control" disabled />
                            </div>
                            <div class="form-group">
                                <label for="status">Merk</label>
                                <input id="status" type="text" value="{{ $product['merk'] }}" class="form-control" disabled />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">Tahun Peroleh</label>
                                <input id="status" type="text" value="{{ $product['tahun_peroleh'] }}" class="form-control" disabled />
                            </div>
                            <div class="form-group">
                                <label for="status">Jumlah Barang</label>
                                <input id="status" type="text" value="{{ $product['jumlah_barang'] }}" class="form-control" disabled />
                            </div>
                            <div class="form-group">
                                <label for="status">Satuan Barang</label>
                                <input id="status" type="text" value="{{ $product['satuan_barang'] }}" class="form-control" disabled />
                            </div>
                            <div class="form-group">
                                <label for="status">Lokasi Barang</label>
                                <input id="status" type="text" value="{{ $product['lokasi'] }}" class="form-control" disabled />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="status">Barcode Barang</label>
                            <img  src="https://api.qrserver.com/v1/create-qr-code/?data={{$product['nama']."_".$product['kode_barang']."_".$product['merk']."_".$product['tahun_peroleh']}}&size=150x150" class="qr-code img-thumbnail img-responsive" alt="">
                        </div>
                        <div class="col-md-2">
                            <label for="status">Gambar Barang</label>
                            <img src="{{ asset('product/'.$product['image']) }}"
                                height="200" width="100%"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection