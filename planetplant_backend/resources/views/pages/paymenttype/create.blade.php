@extends('layouts.index')

  @section('title','Tambah Tipe Pembayaran')

  @section('container')
    <script>
        var readURL= function(event) {
            var input = event.target;

            var reader = new FileReader();
            reader.onload = function(){
            var dataURL = reader.result;
            var output = document.getElementById('output');
            output.src = dataURL;
            };
            reader.readAsDataURL(input.files[0]);
        };
    </script>
    <div class="container-fluid">
        <h5 class="title-page pt-3">Tambah Tipe Pembayaran</h5>
        <nav class="breadcrumb-nav" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <p>Tambah Tipe Pembayaran</p>
                <li class="breadcrumb-item active"><a href="{{route('home.index')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('paymenttypes.index')}}">Tipe Pembayaran</a></li>
                <li class="breadcrumb-item me-5" aria-current="page">Tambah</li>
            </ol>
        </nav>
        <div class="card show-card">
        <div class="card-header">
            <div class="row">
                <div class="col-6 mt-1">
                    <strong> Tambah Data Tipe Pembayaran</strong>
                </div>
                <div class="col-6">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a class="btn btn-secondary me-md-2" type="button" href="{{route('paymenttypes.index')}}">Kembali</a>
                    </div>
                </div>
            </div>    
        </div>
        <div class="row g-0">
            <div class="col-sm-8 offset-sm-3">
                <div class="card-body">
                    
                    <form method="post" action="{{route('paymenttypes.store')}}" id="contactForm" enctype="multipart/form-data" class="row gy-2 gx-3 mt-3">
                        @csrf 
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="idadmin" class="form-label label-required">Kode Tipe Pembayaran</label>
                                <input type="text" class="form-control @error('code') is-invalid @enderror" name="code" placeholder="Masukkan Kode Tipe Pembayaran" value="{{old('code')}}">
                                @error('code')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label label-required">Tipe Pembayaran</label>
                                <input type="text" class="form-control @error('type') is-invalid @enderror" name="name" placeholder="Masukkan Tipe Pembayaran" value="{{old('type')}}">
                                @error('type')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Detail Tipe Pembayaran</label>
                                <textarea class="form-control" name="note" height="100" placeholder="Masukkan Detail Tipe Pembayaran">{{old('note')}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div> 
                    </form> 
                    <p class="fst-italic ms-3 mt-3 text-danger"><strong>Catatan :</strong> (*) Wajib Diisi</p>
                </div>
            </div>
        </div>
    </div>
    @endsection