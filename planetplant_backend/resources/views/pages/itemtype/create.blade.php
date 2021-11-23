
  @extends('layouts.index')

  @section('title','Tambah Jenis Barang')

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
        <h5 class="title-page pt-3">Tambah Jenis Barang</h5>
        <nav class="breadcrumb-nav" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <p>Tambah Jenis Barang</p>
                <li class="breadcrumb-item active"><a href="{{route('home.index')}}">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{route('itemtypes.index')}}">Jenis Barang</a></li>
                <li class="breadcrumb-item active me-5" aria-current="page">Tambah</li>
            </ol>
        </nav>
        <div class="card show-card">
        <div class="card-header">
            <div class="row">
                <div class="col-6 mt-1">
                    <strong> Tambah Data Jenis Barang</strong>
                </div>
                <div class="col-6">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a class="btn btn-secondary me-md-2" type="button" href="{{route('itemtypes.index')}}">Kembali</a>
                    </div>
                </div>
            </div>    
        </div>
        <div class="row g-0">
            <div class="col-sm-8 offset-sm-2">
                <div class="card-body">
                    <form method="post" action="{{route('itemtypes.store')}}" id="contactForm" enctype="multipart/form-data" class="row gy-2 gx-3 mt-5">
                        @csrf
                        <div class="col-sm-3 m-3" id="imagePreview">
                            <img src="{{url('img_item/no_picture.jpg')}}" id="output" alt="profile" width="200" height="250">
                            <div class="col-auto m-3">
                                <input type="file" class="form-control" id="selectedFile" name="photo" accept="image/*" onchange="readURL(event)" style="display:none;" value="no_picture.jpg"/>
                                <input type="button" class="btn btn-secondary" value="Browse" onclick="document.getElementById('selectedFile').click();" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="idadmin" class="form-label label-required">Kode Jenis Barang</label>
                                <input type="text" class="form-control @error('code') is-invalid @enderror" name="code" placeholder="Masukkan Kode Jenis Barang" value="{{old('code')}}">
                                @error('code')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label label-required">Jenis Barang</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Masukkan Jenis Barang" value="{{old('name')}}">
                                @error('name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div> 
                    </form>
                    <p class="fst-italic ms-3 mt-2 text-danger"><strong>Catatan :</strong> (*) Wajib Diisi</p> 
                </div>
            </div>
        </div>
    </div>
    @endsection