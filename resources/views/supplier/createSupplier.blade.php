@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            <form action="{{ url('supplier') }}" method="post" class="form-horizontal">
                @csrf
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Kode Supplier</label>
                    <div class="col-11">
                        <input type="text" name="supplier_kode" id="supplier_kode" class="form-control" value="{{ old('supplier_level') }}" required>
                        @error('supplier_kode')
                                <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Nama Supplier</label>
                    <div class="col-11">
                        <input type="text" name="supplier_nama" id="supplier_nama" class="form-control" value="{{ old('supplier_level') }}" required>
                        @error('supplier_nama')
                                <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Alamat Supplier</label>
                    <div class="col-11">
                        <input type="text" name="supplier_alamat" id="supplier_alamat" class="form-control" value="{{ old('supplier_alamat') }}" required>
                        @error('supplier_alamat')
                                <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label"></label>
                    <div class="col-11">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <a href="{{ url('supplier') }}" class="btn btn-sm btn-default ml-1">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('css')
@endpush