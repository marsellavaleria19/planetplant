@extends('layouts.index')

@section('title','Data Customer')

@section('container')
    <div class="container-fluid">
        <h5 class="title-page pt-3">Data Customer</h5>
        <nav class="breadcrumb-nav" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <p>Data Customer</p>
              <li class="breadcrumb-item active"><a href="{{route('home.index')}}">Home</a></li>
              <li class="breadcrumb-item" aria-current="page">Data Customer</li>
            </ol>
        </nav>

        <div class="card show-card">
            <!-- START HEADER -->
            <div class="card-header">
                <div class="row">
                    <div class="col-6 mt-1">
                        <strong> Data Customer</strong>
                    </div>
                    <div class="col-6">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <form class="d-flex" action="{{route('customers.search')}}" method="post">
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
                          <th scope="col">ID Customer</th>
                          <th scope="col">Nama</th>
                          <th scope="col">Username</th>
                          <th scope="col">Email</th>
                          <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                      @forelse($customers as $customer)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$customer->code}}</td>
                            <td>{{$customer->name}}</td>
                            <td>{{$customer->username}}</td>
                            <td>{{$customer->email}}</td>
                            <td><a class="btn btn-secondary btn-sm" data-bs-toggle="modal" href="#showDataCustomer" 
                                data-remote="{{route('customers.show',$customer->id)}}" 
                                data-toggle="modal"
                                data-target="#showDataCustomer"
                                data-title="Detail Customer {{$customer->code}}"
                                class="btn btn-info btn-sm">
                            <i class="fas fa-eye"></i></a></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center p-5">
                                Data tidak tersedia
                            </td>
                        </tr>
                        @endforelse
                    </tbody>        
                </table>
            </div>
            <div class="card-footer">
                <!-- PAGINATION -->
                <div class="row">
                  <div class="col-sm-4">
                      <p class="text-sm-start fs-6 fw-bold">Halaman {{$customers->currentPage()}} dari {{$customers->lastPage()}} | Data {{$customers->firstItem()}}-{{$customers->lastItem()}} dari total {{$customers->total()}}</p>
                  </div>
                    <div class="col-sm-8">
                        <nav aria-label="...">
                            <ul class="pagination d-flex justify-content-end">
                                <li class="page-item {{$customers->currentPage() == $customers->onFirstPage() ? 'disabled': ''}}">
                                  <a class="page-link" href="{{$customers->url($customers->onFirstPage())}}" id="FirstPage">Previous</a>
                                </li>
                                {{$customers->appends(Request::all())->onEachSide(1)->links()}}
                                <li class="page-item {{$customers->currentPage() == $customers->lastPage() ? 'disabled': ''}}">
                                  <a class="page-link" href="{{$customers->url($customers->lastpage())}}" id="LastPage">Last</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- END PAGINATION -->
            </div>
        </div>
@endsection