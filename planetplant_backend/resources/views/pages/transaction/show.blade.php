<section>
                        <div class="row">
                            <!-- ALAMAT TAGIHAN -->
                            <div class="col-sm-6">
                                <div class="card card-address">
                                    <div class="card-header">
                                        <strong>Alamat Tagihan</strong>   
                                    </div>
                                    <div class="card-body">
                                        <p class='card-text'>{{$transaction->SenderName}} | {{$transaction->SenderPhoneNumber}}</p>
                                        <p class='card-text'>{{$transaction->SenderAddress}}</p>
                                        <p class='card-text'>{{$transaction->SenderCity}} {{$transaction->SenderProvince}} {{$transaction->SenderPostalCode}}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- END ALAMAT TAGIHAN -->
                            
                            <!-- ALAMAT PENGIRIMAN -->
                            <div class="col-sm-6">
                                <div class="card card-address">
                                    <div class="card-header">
                                        <strong>Alamat Pengiriman</strong>   
                                    </div>
                                    <div class="card-body">
                                        <p class='card-text'>{{$transaction->ReceiverName}} | {{$transaction->ReceiverPhoneNumber}}</p>
                                        <p class='card-text'>{{$transaction->ReceiverAddress}}</p>
                                        <p class='card-text'>{{$transaction->ReceiverCity}} {{$transaction->ReceiverProvince}} {{$transaction->ReceiverPostalCode}}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- END ALAMAT PENGIRIMAN -->
                        </div> 
                    </section>
                    <div class="card card-detail-order mt-2">
                        <div class="card-header">
                            <strong>Detail Pesanan</strong>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Barang</th>
                                        <th scope="col">Kuantiti</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Subtotal</th>     
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $totalSubtotal=0 @endphp
                                        @foreach($transaction->transaction_item as $transaction_detail)
                                            <tr>
                                                <td>{{$transaction_detail->name}}</td>
                                                <td>{{$transaction_detail->qty}}</td>
                                                <td>Rp.{{number_format($transaction_detail->totalprice, 0, ',', '.')}}</td>
                                                <td>Rp.{{number_format(($transaction_detail->total), 0, ',', '.')}}</td>
                                                @php $totalSubtotal+=$transaction_detail->total @endphp
                                            <tr>
                                        @endforeach
                                            <tr class="noBorder">
                                                <td colspan="3"><b class="fw-bold">TOTAL</b></td>

                                                <td><b class="fw-bold">Rp.{{number_format($totalSubtotal, 0, ',', '.')}}</b></td>
                                            </tr>
                                            <tr class="noBorder">
                                                <td colspan="3"><b class="fw-bold">PAJAK(10%)</b></td>
                                                @php $totalPajak=($totalSubtotal*(10/100)) @endphp
                                                <td><b class="fw-bold">Rp.{{number_format($totalPajak, 0, ',', '.')}}</b></td>
                                            </tr>
                                            <tr class="noBorder">
                                                <td colspan="3"><b class="fw-bold">ONGKOS KIRIM</b></td>
                                                <td><b class="fw-bold">Rp.{{number_format($transaction->shipping_price, 0, ',', '.')}}</b></td>
                                            </tr>
                                            <tr class="noBorder">
                                                <td colspan="3"><b class="fw-bold">GRANDTOTAL</b></td>
                                                <td><b class="fw-bold">Rp.{{number_format(($totalSubtotal+$totalPajak+$transaction->shipping_price), 0, ',', '.')}}</b></td>
                                            </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @if($transaction->payment_status=='LUNAS' && $transaction->transaction_status=='KONFIRMASI PEMBAYARAN')
                    <div class="row mt-3">
                        <div class="col-4">
                            <a href="{{route('transactions.status',$transaction->id)}}?status=DIKIRIM" class="btn btn-warning btn-block">
                                <i class="fas fa-shipping-fast"></i> Set Dikirim
                            </a>
                        </div>
                    </div>
                    @else
                    <div class="row mt-3">
                        <div class="col-4">
                            <a href="#" class="btn btn-warning btn-block disabled">
                                <i class="fas fa-shipping-fast"></i> Set Dikirim
                            </a>
                        </div>
                    </div>
                    @endif    
