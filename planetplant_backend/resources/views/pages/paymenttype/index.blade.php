@extends('layouts.index')

  @section('title','Data Tipe Pembayaran')

  @section('container')
    <div class="container-fluid">
        <h5 class="title-page pt-3">Data Tipe Pembayaran</h5>
        <nav class="breadcrumb-nav" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <p>Data Tipe Pembayaran</p>
                <li class="breadcrumb-item active"><a href="{{route('home.index')}}">Home</a></li>
                <li class="breadcrumb-item" aria-current="page">Data Tipe Pembayaran</li>
            </ol>
        </nav>

        <div class="card show-card">
            <!-- START HEADER -->
            <div class="card-header">
                <div class="row">
                    <div class="col-6 mt-1">
                        <strong> Data Tipe Pembayaran</strong>
                    </div>
                    <div class="col-6">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a class="btn btn-outline-light me-md-2" type="button" href="{{route('paymenttypes.create')}}">Tambah Data</a>
                            <form class="d-flex" action="{{route('paymenttypes.search')}}" method="post">
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
                            <th scope="col">Kode</th>
                            <th scope="col">Tipe Pembayaran</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($paymentTypes as $paymentType)
                        <tr>
                            <th scope="row">{{$loop->iteration+$paymentTypes->firstItem()-1}}</th>
                            <td>{{$paymentType->code}}</td>
                            <td>{{$paymentType->type}}</td>
                            <td>
                                <a href="{{route('paymenttypes.edit',$paymentType->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                <button type="button" class="btn btn-danger btn-sm btn-delete" onclick="deleteDataPaymentType(this)" data-id="{{$paymentType->id}}-{{$paymentType->code}}-{{$paymentType->type}}"><i class="fas fa-trash-alt"></i></button>
                                <a class="btn btn-secondary btn-sm" data-bs-toggle="modal" href="#showDataCustomer" 
                                    data-remote="{{route('paymenttypes.show',$paymentType->id)}}" 
                                    data-toggle="modal"
                                    data-target="#showDataPaymentType"
                                    data-title="Detail Jenis Pembayaran {{$paymentType->code}}"
                                    class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a> 
                            </td>
                        </tr>
                        @endforeach
                    </tbody>        
                </table>
            </div>
            <div class="card-footer">
                  <!-- PAGINATION -->
                  <div class="row">
                    <div class="col-sm-4">
                        <p class="text-sm-start fs-6 fw-bold">Halaman {{$paymentTypes->currentPage()}} dari {{$paymentTypes->lastPage()}} | Data {{$paymentTypes->firstItem()}}-{{$paymentTypes->lastItem()}} dari total {{$paymentTypes->total()}} data</p>
                    </div>
                    <div class="col-sm-8">
                        <nav class="pagination-admin" aria-label="...">
                            <ul class="pagination d-flex justify-content-end">
                                <li class="page-item {{$paymentTypes->currentPage() == $paymentTypes->onFirstPage() ? 'disabled': ''}}">
                                    <a class="page-link" href="{{$paymentTypes->url($paymentTypes->onFirstPage())}}" id="FirstPage">Previous</a>
                                </li>
                                {{$paymentTypes->appends(Request::all())->onEachSide(1)->links()}}
                                <li class="page-item {{$paymentTypes->currentPage() == $paymentTypes->lastPage() ? 'disabled': ''}}">
                                    <a class="page-link" href="{{$paymentTypes->url($paymentTypes->lastpage())}}" id="LastPage">Last</a>
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