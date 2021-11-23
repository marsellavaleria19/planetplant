    @extends('layouts.index')

    @section('title','Home')

    @section('container')
    <div class="container-fluid">
      <h5 class="title-page pt-3">Dashboard</h5>
      <nav class="breadcrumb-nav" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <p>Dashboard</p>
          <li class="breadcrumb-item active" aria-current="page">Home</li>
        </ol>
      </nav>

      <div class="alert alert-success mt-2" role="alert">
        <strong>Alert !</strong> Selamat datang di halaman admin. Disini anda dapat mengolah data admin, data customer termasuk transaksi.
      </div>
      
      <!-- MENAMPILKAN JUMLAH ANGGOTA, PRODUK, DAN TRANSAKSI -->
      <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col">
          <div class="card mb-3 card_customer">
            <div class="row g-0">
                <div class="col-md-4"><i class="fas fa-id-card icon-member"></i></div>
                <div class="col-md-8">
                    <div class="card-body">
                    <h3 class="card-title text-end">Rp {{number_format($income)}}<br>Penghasilan</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card mb-3 card_transaction" >
            <div class="row g-0">
              <div class="col-md-4"><i class="fas fa-shopping-cart icon-transaction"></i></div>
              <div class="col-md-8">
                <div class="card-body">
                        <h3 class="card-title text-end">{{$sales}}<br>Terjual</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- END TAMPILAN JUMLAH ANGGOTA, PRODUK, TRANSAKSI -->

      <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col">
          <div class="card mb-3 card_order">
            <div class="card-header">
                <h4 class="box-title">Pembelian Terbaru </h4>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Kode Transaksi</th>
                            <th>Nama</th>
                            <th>Tanggal Transaksi</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($items as $item)
                        <tr>

                            <td>{{$item->code}}</td>
                            <td>{{$item->SenderName}}</td>
                            <td>{{$item->transaction_date}}</td>
                            <td>Rp {{number_format($item->transaction_total)}}</td>
                            <td>
                                @if($item->transaction_status=='BELUM BAYAR')
                                <span class="badge bg-warning">
                                @elseif($item->transaction_status=='KONFIRMASI PEMBAYARAN')
                                <span class="badge bg-info">
                                @elseif($item->transaction_status=='BATAL')
                                <span class="badge bg-danger">
                                @elseif($item->transaction_status=='SELESAI')
                                <span class="badge bg-success">
                                @else
                                <span>
                                @endif
                                    {{$item->transaction_status}}        
                                </span>
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
          </div>
        </div>
        <div class="col">
          <div class="card mb-3">
            <div class="card-body">
                <canvas id="chart-bar" width="200" height="100"></canvas>
                <div id="legend"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endsection

    
  @push('after-script')
     <script>
        var Labels = [
          "Belum Bayar",
          "Konfirmasi Pembayaran",
          "Dikirim",
          "Batal",
          "Selesai"
        ];
                var counts = [{{$pie['pending']}},{{$pie['confirm']}},{{$pie['delivered']}},{{$pie['failed']}},{{$pie['success']}}];
                  function clearArray(array) {
                    while (array.length) {
                      array.pop();
                    }
                  }

                var ctx = document.getElementById('chart-bar').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                          labels: Labels,
                          hoveroffset:6,
                          datasets: [{
                            data: counts,
                            backgroundColor: [
                              'rgba(255, 206, 86, 0.2)',
                              'rgba(153, 102, 255, 0.2)',
                              'rgba(75, 192, 192, 0.2)',
                              'rgba(255, 99, 132, 0.2)',
                              'rgba(54, 162, 235, 0.2)',
                            ],
                            borderColor: [
                              'rgba(255, 206, 86, 1)',
                              'rgb(153, 102, 255)',
                              'rgba(75, 192, 192, 1)',
                              'rgba(255, 99, 132, 1)',
                              'rgba(54, 162, 235, 1)',
                            ]
                          }]
                        },
                        options: {
                            title: {
                                display: true,
                                fontSize:16,
                                text: 'Status Transaksi'
                            },
                            scales: {
                                yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                                }]
                            },
                            legend : {
                                display: true,
                                position: 'right'
                            }
                        }
                      });                                        
              </script>
        @endpush
     

