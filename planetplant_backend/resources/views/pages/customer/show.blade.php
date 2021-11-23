
<div class="row g-0">
    <div class="col-sm-3 m-3">
        <img src="{{url($customer->photo)}}" alt="profile" width="200" height="300">
    </div>
    <div class="col-sm-8 ms-3">
        <h5 class="card-title">{{$customer->code}}- {{$customer->name}}</h5>
        <table class="table table-borderless">
            <tr>
                <td>ID</td>
                <td>{{$customer->code}}</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>{{$customer->name}}</td>
            </tr>
            <tr>
                <td>Alamat</td> 
                <td>{{$customer->address}}</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                @if ($customer->gender == 'P')
                <td>{{'Wanita'}}</td>
                @else
                <td>{{'Pria'}}</td>
                @endif
            </tr>
            <tr>
                <td>No Telepon</td>
                <td>{{$customer->phone_number}}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{$customer->email}}</td>
            </tr>
            <tr>
                <td>Username</td>
                <td>{{$customer->username}}</td>
            </tr>
        </table>
    </div>
</div>    
