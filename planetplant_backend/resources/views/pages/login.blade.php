<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="/css/admin_page.css" rel="stylesheet" type="text/css">
        <script src="/js/jquery-3.5.1.min.js"></script>
            <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> -->
        <script src="/bootstrap/js/bootstrap.js"></script>
        <title>Login Admin</title>
    </head>
    <body>
        <div class="content-login">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 offset-sm-1">
                        <div class="card mb-3 login-card">
                            <div class="row g-0">
                                <div class="col-md-6">
                                    <img src="/img_application/img_admin.png" alt="img_admin" width="450" height="600">
                                </div>
                                <div class="col-md-6">
                                    
                                <div class="card-body">
                                        <h5 class="card-title header-company">Planet Plant</h5>
                                        @if(session('error'))
                                            <div class="alert alert-danger">
                                            {{session('error')}}
                                            </div>
                                        @endif
                                        <form action="{{route('logins.login')}}" method="post">
                                            @csrf
                                            <div class="mt-5">
                                                <label for="nama" class="form-label">Username</label>
                                                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Masukkan Username" aria-label="Username" aria-describedby="basic-addon1"  value="{{old('username')}}">
                                                @error('username')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="mt-3">
                                                <label for="nama" class="form-label">Password</label>
                                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Masukkan Username" aria-label="Username" aria-describedby="basic-addon1"  value="{{old('password')}}">
                                                @error('password')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="mt-5">
                                                <div class="d-grid gap-2">
                                                    <button class="btn btn-gradien" type="submit">Login</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>          
    </body>
</html>