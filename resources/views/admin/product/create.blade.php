@extends('admin/admin')
@section('content')
    <div class="row">
        <div class="col-12">
            {{ Form::open(['route'=>'product.store', 'files'=>true]) }}
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Barang</h3>
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
                                    {{ Form::text('nama', '', ['class'=>'form-control', 'placeholder'=>'Masukkan Nama Barang']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('kode_barang', 'Kode Barang') }}
                                    {{ Form::text('kode_barang', '', ['class'=>'form-control', 'placeholder'=>'Masukkan Kode Barang']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('no_urut_pendaftaran', 'No Urut Pendaftaran') }}
                                    {{ Form::text('no_urut_pendaftaran', '', ['class'=>'form-control', 'placeholder'=>'Masukkan No Urut Pendaftaran']) }}        
                                </div>
                                <div class="form-group">
                                    {{ Form::label('merk', 'Merk') }}
                                    {{ Form::text('merk', '', ['class'=>'form-control', 'placeholder'=>'Masukkan Merk']) }}        
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('tahun_peroleh', 'Tahun Peroleh') }}
                                    {{ Form::text('tahun_peroleh', '', ['class'=>'form-control', 'placeholder'=>'Masukkan Tahun Peroleh']) }}        
                                </div>
                                <div class="form-group">
                                    {{ Form::label('jumlah_barang', 'Jumlah Barang') }}
                                    {{ Form::text('jumlah_barang', '', ['class'=>'form-control', 'placeholder'=>'Masukkan Jumlah Barang']) }}        
                                </div>
                                <div class="form-group">
                                    {{ Form::label('satuan_barang', 'Satuan Barang') }}
                                    {{ Form::text('satuan_barang', '', ['class'=>'form-control', 'placeholder'=>'Masukkan Satuan Barang']) }}        
                                </div>
                                <div class="form-group">
                                    {{ Form::label('lokasi', 'Lokasi Barang') }}
                                    {{ Form::text('lokasi', '', ['class'=>'form-control', 'placeholder'=>'Masukkan Lokasi Barang']) }}        
                                </div>
                                <div class="form-group">
                                    {{ Form::label('image', 'Gambar Barang') }}
                                    {{ Form::file('imageFile', ['class'=>'form-control'])}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ URL::to('admin') }}" class="btn btn-outline-info">Kembali</a>
                        {{ Form::submit('Proses', ['class' => 'btn btn-primary pull-right']) }}
                    </div>
                </div>
            <!-- </form> -->
            {{ Form::close() }}
        </div>
    </div>
@endsection