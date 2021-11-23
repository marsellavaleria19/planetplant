<div class="row g-0">
    <div class="col-sm-3 m-3">
        <img src="{{url($payment->slip_transfer)}}" alt="profile" width="200" height="300">
    </div>
    <div class="col-sm-8 ms-3">
        <h5 class="card-title">{{$payment->code}}- {{$payment->name}}</h5>
        <table class="table table-borderless">
            <tr>
                <td>ID</td>
                <td>{{$payment->code}}</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>{{$payment->name}}</td>
            </tr>
            <tr>
                <td>Kode Transaksi</td> 
                <td>{{$payment->code_transaction}}</td>
            </tr>
            <tr>
                <td>Tanggal Bayar</td>
                <td>{{$payment->transfer_date}}</td>
            </tr>
            <tr>
                <td>Nominal</td>
                <td>{{number_format($payment->payment, 0, ',', '.')}}</td>
            </tr>
            <tr>
                <td>Tipe Pembayaran</td>
                <td>{{$payment->payment_type}}</td>
            </tr>
            <tr>
                <td>Status</td>
                <td>{{$payment->payment_status}}</td>
            </tr>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-4">
        <a href="{{route('payments.status',$payment->id)}}?status=DISETUJUI" class="btn btn-success btn-block">
            <i class="fa fa-check"></i> Set Disetujui
                </a>
            </div>
            <div class="col-4">
                <a href="{{route('payments.status',$payment->id)}}?status=DITOLAK" class="btn btn-danger btn-block">
                    <i class="fa fa-times"></i> Set Ditolak
                </a>
            </div>
            <div class="col-4">
                <a href="{{route('payments.status',$payment->id)}}?status=PENDING" class="btn btn-info btn-block">
                    <i class="fa fa-spinner"></i> Set Pending
                </a>
            </div>
        </div>    
