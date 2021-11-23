@extends('layouts.index')

  @section('title','Data Barang')

  @section('container')
    <div class="container-fluid">
        <h5 class="title-page pt-3">Data Barang</h5>
        <nav class="breadcrumb-nav" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <p>Data Barang</p>
                <li class="breadcrumb-item active"><a href="{{route('home.index')}}">Home</a></li>
                <li class="breadcrumb-item" aria-current="page">Barang</li>
            </ol>
        </nav>

        <div class="card show-card">
        <div class="card-header">
            <div class="row">
                <div class="col-6 mt-1">
                    <strong> Data Barang</strong>
                </div>
                <div class="col-6">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a class="btn btn-outline-light me-md-2" type="button" href="{{route('items.create')}}">Tambah Data</a>
                        <form class="d-flex" action="{{route('items.search')}}" method="post">
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
        <!-- CARD BODY -->
        <div class="card-body">
            @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kode Barang</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Jenis Barang</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Diskon</th>
                        <th scope="col">Total</th>
                        <th scope="col">Kuantiti</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $item)
                    <tr>
                        <th scope="row">{{$loop->iteration+$items->firstItem()-1}}</th>
                        <td>{{$item->code}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->tipeItem}}</td>
                        <td>Rp.{{number_format($item->price, 0, ',', '.') }}</td>
                        <td>{{number_format($item->discount, 0, ',', '.') }}</td>
                        <td>Rp.{{number_format($item->totalprice, 0, ',', '.') }}</td>
                        <td>{{number_format($item->qty,0,',','.')}}</td>        
                        <td>
                            <a href="{{route('items.edit',$item->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></a>
                            <button type="button" class="btn btn-danger btn-sm btn-delete" onclick="deleteDataItem(this)" data-id="{{$item->id}}.{{$item->code}}.{{$item->name}}"><i class="fas fa-trash-alt"></i></button>
                            <a class="btn btn-secondary btn-sm" data-bs-toggle="modal" href="#showDataCustomer" 
                                    data-remote="{{route('items.show',$item->id)}}" 
                                    data-toggle="modal"
                                    data-target="#showDataItem"
                                    data-title="Detail Barang {{$item->code}}"
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
                </tbody>        
            </table>
        </div>
        <div class="card-footer">
            <!-- PAGINATION -->
            <div class="row">
                <div class="col-sm-4">
                    <p class="text-sm-start fs-6 fw-bold">Halaman {{$items->currentPage()}} dari {{$items->lastPage()}} | Data {{$items->firstItem()}}-{{$items->lastItem()}} dari total {{$items->total()}}</p>
                </div>
                <div class="col-sm-8">
                    <nav class="pagination-admin" aria-label="...">
                        <ul class="pagination d-flex justify-content-end">
                            <li class="page-item {{$items->currentPage() == $items->onFirstPage() ? 'disabled': ''}}">
                            <a class="page-link" href="{{$items->url($items->onFirstPage())}}" id="FirstPage">Previous</a>
                            </li>
                            {{$items->appends(Request::all())->onEachSide(1)->links()}}
                            <li class="page-item {{$items->currentPage() == $items->lastPage() ? 'disabled': ''}}">
                            <a class="page-link" href="{{$items->url($items->lastpage())}}" id="LastPage">Last</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        <!-- END PAGINATION  -->
        </div>
    </div>
    @endsection