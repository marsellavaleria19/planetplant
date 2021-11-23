<div class="row g-0">
    <div class="col-sm-3 m-3">
        <img src="{{url($itemType->cover)}}" alt="profile" width="200" height="300">
    </div>
    <div class="col-sm-8 ms-3">
        <h5 class="card-title">{{$itemType->code}}- {{$itemType->name}}</h5>
        <table class="table table-borderless">
            <tr>
                <td>Kode</td>
                <td>{{$itemType->code}}</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>{{$itemType->name}}</td>
            </tr>
        </table>
    </div>
</div>    
