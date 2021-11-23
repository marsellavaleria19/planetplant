  @extends('layouts.index')

  @section('title','Data Transaksi')

  @section('container')
    <div class="container-fluid">
        <h5 class="title-page pt-3">Data Transaksi</h5>
        <nav class="breadcrumb-nav" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <p>Data Transaksi</p>
                <li class="breadcrumb-item active"><a href="{{route('home.index')}}">Home</a></li>
                <li class="breadcrumb-item" aria-current="page">Data Transaksi</li>
            </ol>
        </nav>

        <div class="card show-card">
            <!-- START HEADER -->
            <div class="card-header">
                <div class="row">
                    <div class="col-6 mt-1">
                        <strong> Data Transaksi</strong>
                    </div>
                    <div class="col-6">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <form class="d-flex" action="{{route('transactions.search')}}" method="post">
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
                            <th scope="col">No</th>
                            <th scope="col">Kode Pemesanan</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Tanggal Pemesanan</th>
                            <th scope="col">Total</th>
                            <th scope="col">Status Pesanan</th>
                            <th scope="col">Status Pembayaran</th>
                            <th scope="col">Aksi</th>     
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($transactions as $transaction)
                        <tr>
                            <th scope="row">{{$loop->iteration+$transactions->firstItem()-1}}</th>
                            <td>{{$transaction->code}}</td>
                            <td>{{$transaction->SenderName}}</td>
                            <td>{{$transaction->transaction_date}}</td>
                            <td>Rp.{{number_format($transaction->transaction_total, 0, ',', '.')}}</td>
                            <td> 
                                @if($transaction->transaction_status=='BELUM BAYAR')
                                    <span class="badge bg-warning">
                                @elseif($transaction->transaction_status=='KONFIRMASI PEMBAYARAN')
                                    <span class="badge bg-secondary">
                                @elseif($transaction->transaction_status=='DIKIRIM')
                                    <span class="badge bg-info">
                                @elseif($transaction->transaction_status=='BATAL')
                                    <span class="badge bg-danger">
                                @elseif($transaction->transaction_status=='SELESAI')
                                    <span class="badge bg-success">
                                @else
                                    <span>
                                @endif
                                    {{$transaction->transaction_status}}        
                                </span></td>
                            <td>
                                @if($transaction->payment_status=='PENDING')
                                    <span class="badge bg-info">
                                @elseif($transaction->payment_status=='LUNAS')
                                    <span class="badge bg-success">
                                @elseif($transaction->payment_status=='DITOLAK')
                                    <span class="badge bg-danger">
                                @else
                                <span>
                                @endif
                                {{$transaction->payment_status}}</td>
                            <td>
                            @if($transaction->payment_status=='LUNAS' && ($transaction->transaction_status=='KONFIRMASI PEMBAYARAN'))
                            <a href="{{route('transactions.status',$transaction->id)}}?status=DIKIRIM" class="btn btn-warning btn-sm">
                                <i class="fas fa-shipping-fast"></i>
                            </a>
                            @else
                            <a href="#" class="btn btn-warning btn-sm disabled">
                                <i class="fas fa-shipping-fast"></i>
                            </a>
                            @endif
                            <a class="btn btn-secondary btn-sm" data-bs-toggle="modal" href="#showDataTransaction" 
                                    data-remote="{{route('transactions.show',$transaction->id)}}" 
                                    data-toggle="modal"
                                    data-target="#showDataTransaction"
                                    data-title="Detail Transaksi {{$transaction->code}}"
                                    class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        <tr>
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
                        <p class="text-sm-start fs-6 fw-bold">Halaman {{$transactions->currentPage()}} dari {{$transactions->lastPage()}} | Data {{$transactions->firstItem()}}-{{$transactions->lastItem()}} dari total {{$transactions->total()}}</p>
                    </div>
                    <div class="col-sm-8">
                        <nav aria-label="...">
                            <ul class="pagination d-flex justify-content-end">
                                <li class="page-item {{$transactions->currentPage() == $transactions->onFirstPage() ? 'disabled': ''}}">
                                    <a class="page-link" href="{{$transactions->url($transactions->onFirstPage())}}" id="FirstPage">Previous</a>
                                </li>
                                {{$transactions->appends(Request::all())->onEachSide(1)->links()}}
                                <li class="page-item {{$transactions->currentPage() == $transactions->lastPage() ? 'disabled': ''}}">
                                    <a class="page-link" href="{{$transactions->url($transactions->lastpage())}}" id="LastPage">Last</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- END PAGINATION  -->
            </div>
        </div>
    </div>

    
  @endsection
