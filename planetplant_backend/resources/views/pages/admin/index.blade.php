@extends('layouts.index')

  @section('title','Data Admin')

  @section('container')
    <div class="container-fluid">
        <h5 class="title-page pt-3">Data Admin</h5>
        <nav class="breadcrumb-nav" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <p>Data Admin</p>
                <li class="breadcrumb-item active"><a href="{{url('/admin_page/home_admin')}}">Home</a></li>
                <li class="breadcrumb-item" aria-current="page">Data Admin</li>
            </ol>
        </nav>

        <div class="card show-card">
            <!-- START HEADER -->
            <div class="card-header">
                <div class="row">
                    <div class="col-6 mt-1">
                        <strong> Data Admin</strong>
                    </div>
                    <div class="col-6">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a class="btn btn-outline-light me-md-2" type="button" href="{{route('admins.create')}}">Tambah Data</a>
                            <form class="d-flex" action="{{route('admins.search')}}" method="post">
                                @csrf
                                <div class="input-group">
                                    <input type="text" class="form-control" aria-label="Text input search" placeholder="Cari" name="cari">
                                    <button class="btn btn-outline-light btn-sm btn-search" type="submit" aria-expanded="false">
                                    <i class="fas fa-search"></i> 
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>    
            </div>
            <!-- END HEADER -->
            <div class="card-body">
               
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ID Admin</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Username</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($admins as $admin)
                        <tr>
                            <th scope="row">{{$loop->iteration+$admins->firstItem()-1}}</th>
                            <td>{{$admin->code}}</td>
                            <td>{{$admin->name}}</td>
                            <td>{{$admin->username}}</td>
                            <td>
                                <a href="{{route('admins.edit',$admin->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                <button type="button" class="btn btn-danger btn-sm btn-delete" onclick="deleteDataAdmin(this)" data-id="{{$admin->id}}-{{$admin->code}}-{{$admin->name}}"><i class="fas fa-trash-alt"></i></button>
                                <a class="btn btn-secondary btn-sm" data-bs-toggle="modal" href="#showDataCustomer" 
                                    data-remote="{{route('admins.show',$admin->id)}}" 
                                    data-toggle="modal"
                                    data-target="#showDataAdmin"
                                    data-title="Detail Admin {{$admin->code}}"
                                    class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center p-5">
                                Data tidak tersedia
                            </td>
                        </tr>
                        @endforelse
                         <!-- END TABLE -->
                    </tbody>        
                </table>
            </div>
            <div class="card-footer">
                <!-- PAGINATION -->
                <div class="row">
                    <div class="col-sm-4">
                        <p class="text-sm-start fs-6 fw-bold">Halaman {{$admins->currentPage()}} dari {{$admins->lastPage()}} | Data {{$admins->firstItem()}}-{{$admins->lastItem()}} dari total {{$admins->total()}}</p>
                    </div>
                    <div class="col-sm-8">
                        <nav class="pagination-admin" aria-label="...">
                            <ul class="pagination d-flex justify-content-end">
                                <li class="page-item {{$admins->currentPage() == $admins->onFirstPage() ? 'disabled': ''}}">
                                    <a class="page-link" href="{{$admins->url($admins->onFirstPage())}}" id="FirstPage">Previous</a>
                                </li>
                                {{$admins->appends(Request::all())->onEachSide(1)->links()}}
                                <li class="page-item {{$admins->currentPage() == $admins->lastPage() ? 'disabled': ''}}">
                                    <a class="page-link" href="{{$admins->url($admins->lastpage())}}" id="LastPage">Last</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- END PAGINATION -->
            </div>
        </div> 
    </div>
    @endsection    

   