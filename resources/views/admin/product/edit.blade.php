@extends('admin/admin')
@section('content')
<div class="row">
    <div class="col-12">
        {{ Form::model($product,['route'=>['product.update',$product['id']], 'files'=>true,'method'=>'PUT']) }}
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Ubah Data Barang</h3>
            </div>
            <div class="card-body">
                @if(!empty($errors->all()))
                <div class="alert alert-danger">
                    {{ Html::ul($errors->all())}}
                </div>
                @endif
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('nama', 'Nama Barang') }}
                            {{ Form::text('nama', $product['nama'], ['class'=>'form-control', 'placeholder'=>'Masukkan Nama Barang']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('kode_barang', 'Kode Barang') }}
                            {{ Form::text('kode_barang', $product['kode_barang'], ['class'=>'form-control', 'placeholder'=>'Masukkan Kode Barang']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('no_urut_pendaftaran', 'No Urut Pendaftaran') }}
                            {{ Form::text('no_urut_pendaftaran', $product['no_urut_pendaftaran'], ['class'=>'form-control', 'placeholder'=>'Masukkan Nama Barang']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('merk', 'Merk') }}
                            {{ Form::text('merk', $product['merk'], ['class'=>'form-control', 'placeholder'=>'Masukkan Nama Barang']) }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-group">
                                {{ Form::label('tahun_peroleh', 'Tahun Peroleh') }}
                                {{ Form::text('tahun_peroleh', $product['tahun_peroleh'], ['class'=>'form-control', 'placeholder'=>'Masukkan Nama Barang']) }}
                            </div>   
                            <div class="form-group">
                                {{ Form::label('jumlah_barang', 'Jumlah Barang') }}
                                {{ Form::text('jumlah_barang', $product['jumlah_barang'], ['class'=>'form-control', 'placeholder'=>'Masukkan Nama Barang']) }}
                            </div>   
                            <div class="form-group">
                                {{ Form::label('satuan_barang', 'Satuan Barang') }}
                                {{ Form::text('satuan_barang', $product['satuan_barang'], ['class'=>'form-control', 'placeholder'=>'Masukkan Nama Barang']) }}
                            </div>   
                            <div class="form-group">
                                {{ Form::label('lokasi', 'Lokasi Barang') }}
                                {{ Form::text('lokasi', $product['lokasi'], ['class'=>'form-control', 'placeholder'=>'Masukkan Nama Barang']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::hidden('imagePath',$product['image'])}}
                            {{ Form::label('image', 'Image') }}
                            {{ Form::file('imageFile', ['class'=>'form-control']) }}        
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <img src="{{ asset('product/'.$product['image'])}}" width="100%" height="200">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ URL::to('admin/product') }}" class="btn btn-outline-info">Back</a>
                {{ Form::submit('Proses', ['class' => 'btn btn-primary pull-right']) }}
            </div>
        </div>
        <!-- </form> -->
        {{ Form::close() }}
    </div>
</div>
@endsection