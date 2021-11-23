  @extends('layouts.index')

  @section('title','Data Tipe Barang')

  @section('container')
    <div class="container-fluid">
        <h5 class="title-page pt-3">Data Jenis Barang</h5>
        <nav class="breadcrumb-nav" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <p>Data Jenis Barang</p>
                <li class="breadcrumb-item active"><a href="{{url('/admin_page/home_admin')}}">Home</a></li>
                <li class="breadcrumb-item" aria-current="page">Jenis Barang</li>
            </ol>
        </nav>

        <div class="card show-card">
        <div class="card-header">
            <div class="row">
                <div class="col-6 mt-1">
                    <strong> Data Jenis Barang</strong>
                </div>
                <div class="col-6">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a class="btn btn-outline-light me-md-2" type="button" href="{{route('itemtypes.create')}}">Tambah Data</a>
                        <form class="d-flex" action="{{route('itemtypes.search')}}" method="post">
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
                        <th scope="col">ID Jenis Barang</th>
                        <th scope="col">Jenis Barang</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($itemTypes as $itemType)
                    <tr>
                        <th scope="row">{{$loop->iteration+$itemTypes->firstItem()-1}}</th>
                        <td>{{$itemType->code}}</td>
                        <td>{{$itemType->name}}</td>
                        <td>
                            <a href="{{route('itemtypes.edit',$itemType->id)}}" class="btn btn-primary sm"><i class="fas fa-pencil-alt"></i></a>
                            <button type="button" class="btn btn-danger sm btn-delete" onclick="deleteDataItemType(this)" data-id="{{$itemType->id}}.{{$itemType->code}}.{{$itemType->name}}"><i class="fas fa-trash-alt"></i></button>
                            <a class="btn btn-secondary sm" data-bs-toggle="modal" href="#showDataCustomer" 
                                    data-remote="{{route('itemtypes.show',$itemType->id)}}" 
                                    data-toggle="modal"
                                    data-target="#showDataItemType"
                                    data-title="Detail Jenis Barang {{$itemType->code}}"
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
          <!-- END CARD BODY -->
        <div class="card-footer">
            <!-- PAGINATION -->
                <div class="row">
                    <div class="col-sm-4">
                        <p class="text-sm-start fs-6 fw-bold">Halaman {{$itemTypes->currentPage()}} dari {{$itemTypes->lastPage()}} | Data {{$itemTypes->firstItem()}}-{{$itemTypes->lastItem()}} dari total {{$itemTypes->total()}}</p>
                    </div>
                    <div class="col-sm-8">
                        <nav aria-label="...">
                            <ul class="pagination d-flex justify-content-end">
                                <li class="page-item {{$itemTypes->currentPage() == $itemTypes->onFirstPage() ? 'disabled': ''}}">
                                <a class="page-link" href="{{$itemTypes->url($itemTypes->onFirstPage())}}" id="FirstPage">Previous</a>
                                </li>
                                {{$itemTypes->appends(Request::all())->onEachSide(1)->links()}}
                                <li class="page-item {{$itemTypes->currentPage() == $itemTypes->lastPage() ? 'disabled': ''}}">
                                    <a class="page-link" href="{{$itemTypes->url($itemTypes->lastpage())}}" id="LastPage">Last</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- END PAGINATION  -->       
        </div>
    </div>
  @endsection
