@extends('layouts.index')

@section('title','Data Bukti Pembayaran')

@section('container')
  <div class="container-fluid">
      <h5 class="title-page pt-3">Data Bukti Pembayaran</h5>
      <nav class="breadcrumb-nav" aria-label="breadcrumb">
          <ol class="breadcrumb">
              <p>Data Bukti Pembayaran</p>
              <li class="breadcrumb-item active"><a href="{{route('home.index')}}">Home</a></li>
              <li class="breadcrumb-item" aria-current="page">Data Bukti Pembayaran</li>
          </ol>
      </nav>

      <div class="card show-card">
          <!-- START HEADER -->
          <div class="card-header">
              <div class="row">
                  <div class="col-6 mt-1">
                      <strong> Data Bukti Pembayaran</strong>
                  </div>
                  <div class="col-6">
                      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                          <form class="d-flex" action="{{route('payments.search')}}" method="post">
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
                          <th scope="col">Kode Pembayaran</th>
                          <th scope="col">Nama</th>
                          <th scope="col">Kode Transaksi</th>
                          <th scope="col">Tanggal Bayar</th>
                          <th scope="col">Total Pembayaran</th>
                          <th scope="col">Tipe Pembayaran</th>
                          <th scope="col">Status</th>
                          <th scope="col">Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                      @forelse($payments as $payment)
                        <tr>
                          <th scope="row">{{$loop->iteration+$payments->firstItem()-1}}</th>
                          <td>{{$payment->code}}</td>
                          <td>{{$payment->name}}</td>
                          <td>{{$payment->code_transaction}}</td>
                          <td>{{$payment->transfer_date}}</td>
                          <td>Rp.{{number_format($payment->payment, 0, '.', ',')}}</td>
                          <td>{{$payment->payment_type}}</td>
                          <td> 
                                @if($payment->payment_status=='PENDING')
                                    <span class="badge bg-info">
                                @elseif($payment->payment_status=='DISETUJUI')
                                    <span class="badge bg-success">
                                @elseif($payment->payment_status=='DITOLAK')
                                    <span class="badge bg-danger">
                                @else
                                    <span>
                                @endif
                                    {{$payment->payment_status}}        
                                </span>
                            </td>
                          <td>
                            @if($payment->payment_status=='PENDING')
                            <a href="{{route('payments.status',$payment->id)}}?status=DISETUJUI" class="btn btn-success btn-sm">
                                <i class="fa fa-check"></i>
                            </a>
                            <a href="{{route('payments.status',$payment->id)}}?status=DITOLAK" class="btn btn-danger btn-sm">
                                <i class="fa fa-times"></i>
                            </a>
                            @else
                            <a href="{{route('payments.status',$payment->id)}}?status=DISETUJUI" class="btn btn-success btn-sm disabled">
                                <i class="fa fa-check"></i>
                            </a>
                            <a href="{{route('payments.status',$payment->id)}}?status=DITOLAK" class="btn btn-danger btn-sm disabled">
                                <i class="fa fa-times"></i>
                            </a>
                            @endif
                            <a class="btn btn-secondary btn-sm" data-bs-toggle="modal" href="#showDataCustomer" 
                                    data-remote="{{route('payments.show',$payment->id)}}" 
                                    data-toggle="modal"
                                    data-target="#showDataPayment"
                                    data-title="Detail Pembayaran {{$payment->code}}"
                                    class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                          </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center p-5">
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
                        <p class="text-sm-start fs-6 fw-bold">Halaman {{$payments->currentPage()}} dari {{$payments->lastPage()}} | Data {{$payments->firstItem()}}-{{$payments->lastItem()}} dari total {{$payments->total()}} data</p>
                    </div>
                    <div class="col-sm-8">
                        <nav class="pagination-admin" aria-label="...">
                            <ul class="pagination d-flex justify-content-end">
                                <li class="page-item {{$payments->currentPage() == $payments->onFirstPage() ? 'disabled': ''}}">
                                    <a class="page-link" href="{{$payments->url($payments->onFirstPage())}}" id="FirstPage">Previous</a>
                                </li>
                                {{$payments->appends(Request::all())->onEachSide(1)->links()}}
                                <li class="page-item {{$payments->currentPage() == $payments->lastPage() ? 'disabled': ''}}">
                                    <a class="page-link" href="{$payments->url($payments->lastpage())}}" id="LastPage">Last</a>
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