    @include('includes.script')
    <nav class ="sidebar">
        <header>
            <img src="{{url(Session::get('admin')->photo)}}" class="img_slide rounded-circle" width="100px" height="100px" alt="Profile">
            <p> Hi, Admin {{Session::get('admin')->name}}</p>
        </header>
        <ul>
            <li> <a href="{{route('home.index')}}"><i class="fas fa-home"></i>Home</a></li>
            <li> <a href="#" class="mstr-btn"><i class="fas fa-money-bill-wave"></i>Pembayaran <i class="fas fa-chevron-right icon-dropdown mstr_drop"></i></i></a> 
                <ul class="mstr-show">
                    <li> <a href="{{route('paymenttypes.index')}}">Tipe Pembayaran</a></li>
                    <li> <a href="{{route('payments.index')}}">Bukti Pembayaran</a></li> 
                </ul>
            </li>
            <li> <a href="{{route('customers.index')}}"><i class="fas fa-users"></i>Customer</a></li>
            <li> <a href="{{route('admins.index')}}"><i class="fas fa-users-cog"></i>Admin</a></li>
            <li> <a href="#" class="itm-btn"><i class="fas fa-box"></i>Barang <i class="fas fa-chevron-right icon-dropdown itm_drop"></i></i></a> 
                <ul class="itm-show">
                    <li> <a href="{{route('itemtypes.index')}}">Jenis Barang</a></li>
                    <li> <a href="{{route('items.index')}}">Data Barang</a></li> 
                </ul>
            </li>
            <li> <a href="{{route('transactions.index')}}"><i class="fas fa-file-invoice"></i>Transaksi</a></li>
        </ul>
    </nav>

    @push('after-script')
        <script>
            $('.mstr-btn').click(function(){
            $('.sidebar ul .mstr-show').toggleClass("show_mstr");
            $('.sidebar ul .mstr_drop').toggleClass("rotate");
            });
            $('.itm-btn').click(function(){
                $('.sidebar ul .itm-show').toggleClass("show_itm");
                $('.sidebar ul .itm_drop').toggleClass("rotate");
            });
            $('.serv-btn').click(function(){
                $('nav ul .serv-show').toggleClass("show1");
            });
        </script>
    @endpush