<header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{route('home.index')}}">Planet Plant Admin</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto me-5">
                    <span class="navbar-text me-3" id="date"></span>
                        <script>
                            n =  new Date();
                            y = n.getFullYear();        
                            var month = new Array();
                            month[0] = "Januari";
                            month[1] = "Februari";
                            month[2] = "Maret";
                            month[3] = "April";
                            month[4] = "Mei";
                            month[5] = "Juni";
                            month[6] = "Juli";
                            month[7] = "Agustus";
                            month[8] = "September";
                            month[9] = "Oktober";
                            month[10] = "November";
                            month[11] = "Desember";
                            m = month[n.getMonth()];
                            d = n.getDate();
                            var day = new Array();
                            day[1] = "Senin";
                            day[2] = "Selasa";
                            day[3] = "Rabu";
                            day[4] = "Kamis";
                            day[5] = "Jumat";
                            day[6] = "Sabtu";
                            day[7] = "Minggu";
                            dy = day[n.getDay()];
                            // document.getElementById("date").innerHTML = n;
                            document.getElementById("date").innerHTML = dy + ","+ d + " "+m+" "+ y;
                        </script>
                        <li class="nav-item dropdown me-4">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{url(Session::get('admin')->photo)}}" class="rounded-circle me-2" width="25px" height="25px" alt="Profile"> {{Session::get('admin')->name}}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" data-bs-toggle="modal" href="{{route('admins.edit',Session::get('admin')->id)}}">Edit Profile</a></li>
                                <li><a class="dropdown-item" href="{{route('logins.logout')}}">Logout</a></li>
                            </ul>
                        </li>
                    </div>
                </div>
            </div>
        </nav> 
</header>