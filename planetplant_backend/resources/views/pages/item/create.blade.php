@extends('layouts.index')

  @section('title','Tambah Data Barang')

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
        <h5 class="title-page pt-3">Tambah Barang</h5>
        <nav class="breadcrumb-nav" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <p>Tambah Barang</p>
                <li class="breadcrumb-item active"><a href="{{route('home.index')}}">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{route('items.index')}}">Data Barang</a></li>
                <li class="breadcrumb-item active me-5" aria-current="page">Tambah</li>
            </ol>
        </nav>
        <div class="card show-card">
        <div class="card-header">
            <div class="row">
                <div class="col-6 mt-1">
                    <strong> Tambah Data Barang</strong>
                </div>
                <div class="col-6">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a class="btn btn-secondary me-md-2" type="button" href="{{url('/admin_page/barang')}}">Kembali</a>
                    </div>
                </div>
            </div>    
        </div>
        <div class="row g-0">
            <div class="col-sm-8 offset-sm-2">
                <div class="card-body">
                <form method="post" action="{{route('items.store')}}" id="contactForm" enctype="multipart/form-data" class="row gy-2 gx-3 mt-3">
                    @csrf
                    <div class="col-sm-3 m-3" id="imagePreview">
                            <img src="{{url('img_item/no_picture.jpg')}}" id="output" alt="profile" width="200" height="250">
                            <div class="col-auto m-3">
                                <input type="file" class="form-control" id="selectedFile" name="photo" accept="image/*" onchange="readURL(event)" style="display:none;" value="profile.jpg"/>
                                <input type="button" class="btn btn-secondary" value="Browse" onclick="document.getElementById('selectedFile').click();" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="idadmin" class="form-label label-required">Kode Barang</label>
                                <input type="text" class="form-control @error('code') is-invalid @enderror" name="code" placeholder="Masukkan Kode Barang" value="{{old('code')}}">
                                @error('code')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="nama" class="form-label  label-required">Nama Barang</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Masukkan Nama Barang" value="{{old('name')}}">
                                         @error('name')
                                            <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="nama" class="form-label  label-required">Jenis Barang</label>
                                        <select class="form-select @error('id_type') is-invalid @enderror" name="id_type" value="{{old('id_type')}}">
                                            <option value="" selected>-- Pilih Salah Satu --</option>
                                            @foreach($itemTypes as $itemType)
                                                <option value="{{$itemType->id}}">{{$itemType->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('id_type')
                                            <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-7">
                                    <div class="mb-3">
                                        <label for="price" class="form-label  label-required">Harga</label>
                                        <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" id="priceInput" placeholder="Masukkan Harga" value="{{old('price')}}">
                                        @error('price')
                                            <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="mb-3">
                                        <label for="price" class="form-label">Diskon</label>
                                        <input type="number" class="form-control @error('discount') is-invalid @enderror" name="discount" id="priceInput" placeholder="Masukkan Diskon" value="{{old('discount')}}">
                                        @error('discount')
                                            <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="phone" class="form-label  label-required">Kuantiti</label>
                                <input type="number" class="form-control @error('qty') is-invalid @enderror" name="qty" id="exampleInputEmail1" placeholder="Masukkan Kuantiti" value="{{old('qty')}}">
                                @error('qty')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Deskripsi</label>
                                <textarea class="form-control" name="description" placeholder="Masukkan Deskripsi">{{old('description')}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-success" data-bs-toogle="modal" data-bs-target="#exampleModal">Simpan</button> 
                        </div>
                    </form>
                    <p class="fst-italic ms-3 mt-2 text-danger"><strong>Catatan :</strong> (*) Wajib Diisi</p>  
                </div>
            </div>
        </div>
    </div>
    @endsection