
<div class="row g-0">
    <div class="col-sm-3 m-3">
        <img src="{{url($admin->photo)}}" alt="profile" width="200" height="300">
    </div>
    <div class="col-sm-8 ms-3">
        <h5 class="card-title">{{$admin->code}}- {{$admin->name}}</h5>
        <table class="table table-borderless">
            <tr>
                <td>ID</td>
                <td>{{$admin->code}}</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>{{$admin->name}}</td>
            </tr>
            <tr>
                <td>Alamat</td> 
                <td>{{$admin->address}}</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                @if ($admin->gender == 'F')
                <td>{{'Wanita'}}</td>
                @else
                <td>{{'Pria'}}</td>
                @endif
            </tr>
            <tr>
                <td>No Telepon</td>
                <td>{{$admin->phone_number}}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{$admin->email}}</td>
            </tr>
            <tr>
                <td>Username</td>
                <td>{{$admin->username}}</td>
            </tr>
        </table>
    </div>
</div>    
