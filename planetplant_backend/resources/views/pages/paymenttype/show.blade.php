<div class="row g-0">
    <div class="col-sm-8">
        <h5 class="title-detail-view">{{$paymentType->code}}- {{$paymentType->type}}</h5>
        <table class="table table-borderless">
            <tr>
                <td>Kode</td>
                <td>{{$paymentType->code}}</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>{{$paymentType->type}}</td>
            </tr>
            <tr>
                <td>Detail</td>
                <td>{{$paymentType->note}}</td>
            </tr>
        </table>
    </div>
</div>