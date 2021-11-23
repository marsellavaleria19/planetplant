
  @extends('layouts.index')

  @section('title','Ubah Data Admin')

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
        <h5 class="title-page pt-3">Form Ubah Data Admin</h5>
        <nav class="breadcrumb-nav" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <p>Form Ubah Data Admin</p>
                <li class="breadcrumb-item active"><a href="#">Home</a></li>
                <li class="breadcrumb-item active"><a href="#">Data Admin</a></li>
        <li class="breadcrumb-item active me-5" aria-current="page">Ubah</li>
            </ol>
        </nav>
        <div class="card show-card">
        <div class="card-header">
            <div class="row">
                <div class="col-6 mt-1">
                    <strong> Ubah Data Admin</strong>
                </div>
                <div class="col-6">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a class="btn btn-secondary me-md-2" type="button" href="#">Kembali</a>
                    </div>
                </div>
            </div>    
        </div>
        <div class="row g-0">
            <div class="col-sm-8 offset-sm-2">
                <div class="card-body">
                    <form method="post" action="{{route('admins.update',$admin->id)}}" enctype="multipart/form-data" class="row gy-2 gx-3">
                        @method('patch')
                        @csrf
                        <div class="col-sm-3 m-3" id="imagePreview">
                            <img src="{{url($admin->photo)}}" id="output" alt="profile" width="200" height="250">
                            <div class="col-auto m-3">
                                <input type="file" class="form-control" id="selectedFile" name="photo" accept="image/*" onchange="readURL(event)" style="display:none;"/>
                                <input type="button" class="btn btn-secondary" value="Browse" onclick="document.getElementById('selectedFile').click();" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nama" class="form-label label-required">Nama</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Masukkan Nama" value="{{old('name') ? old('name') : $admin->name}}">
                                @error('name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label label-required">Jenis Kelamin</label>
                                <select class="form-select @error('gender') is-invalid @enderror" name="gender">
                                    <option value="" selected>-- Pilih Salah Satu --</option>
                                    <option value="M" {{$admin->gender == 'M' ? 'selected' : ''}}>Pria</option>
                                    <option value="F" {{$admin->gender == 'F' ? 'selected' : ''}}>Wanita</option>
                                </select>
                                @error('gender')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label label-required">Alamat</label>
                                <textarea class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Masukkan Alamat">{{old('address') ? old('address') : $admin->address}}</textarea>
                                @error('address')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="phone" class="form-label label-required">No Telepon</label>
                                        <input type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" id="exampleInputEmail1" placeholder="Masukkan No Telepon" value="{{old('phone_number') ? old('phone_number') : $admin->phone_number}}">
                                        @error('phone_number')
                                            <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label label-required">Email</label>
                                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="exampleInputEmail1" placeholder="Masukkan Email" value="{{old('email') ? old('email') : $admin->email}}">
                                        @error('email')
                                            <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label label-required">Username</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="exampleInputEmail1" placeholder="Masukkan Username" value="{{old('username') ? old('username') : $admin->username}}">
                                @error('username')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Password</label>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <input type="password" id="password_text" disabled class="form-control @error('password') is-invalid @enderror" name="password" id="exampleInputEmail1" placeholder="Masukkan Password" value="">
                                        @error('password')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="false" id="password_checkbox" name="password_checkbox">
                                            <label class="form-check-label" for="flexCheckDefault">Ubah Password</label>
                                            <script>
                                                $(document).ready(function(){
                                                    $('#password_checkbox').change(function(e){
                                                        if(this.checked){
                                                            document.getElementById("password_text").disabled = false;
                                                            document.getElementById('password_checkbox').value = "true"; 
                                                        }
                                                        else{
                                                            document.getElementById("password_text").disabled = true;
                                                            document.getElementById('password_checkbox').value = "false"; 
                                                        }
                                                    }); 
                                                });
                                            </script>
                                        </div>
                                    </div>
                                </div>
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
