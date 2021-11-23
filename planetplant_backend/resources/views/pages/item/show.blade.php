
<div class="row g-0">
    <div class="col-sm-3 m-3">
        <img src="{{url($item->photo)}}" alt="profile" width="200" height="300">
    </div>
    <div class="col-sm-8 ms-3">
        <h5 class="title-detail-view">{{$item->code}}- {{$item->name}}</h5>
        <table class="table table-borderless">
            <tr>
                <td>Kode Barang</td>
                <td>{{$item->code}}</td>
            </tr>
            <tr>
                <td>Nama Barang</td>
                <td>{{$item->name}}</td>
            </tr>
            <tr>
                <td>Jenis Barang</td> 
                <td>{{$item->tipeItem}}</td>
            </tr>
            <tr>
                <td>Harga</td> 
                <td>{{$item->price}}</td>
            </tr>
            <tr>
                <td>Diskon</td> 
                <td>{{$item->discount}}</td>
            </tr>
            <tr>
                <td>Total</td> 
                <td>{{$item->totalprice}}</td>
            </tr>
            <tr>
                <td>Kuantiti</td>
                <td>{{$item->qty}}</td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td>{{$item->description}}</td>
            </tr>
        </table>
    </div>
</div>    
