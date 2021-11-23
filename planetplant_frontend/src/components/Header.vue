<template>
    <header>
        <nav class="navbar fixed-top navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="#">Planet Plant</a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <router-link to="/" class="nav-link" aria-current="page">Home</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/produk" class="nav-link">Produk</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/confirmationpayment" class="nav-link">Konfirmasi Pembayaran</router-link>
                        </li>
                    </ul>        
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <router-link to="/shoppingcart" class="nav-link active mt-1" aria-current="page">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                                    <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                                </svg>
                                <span class="badge">{{keranjangUser.length}}</span>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/login" class="nav-link active mt-1" v-if="!loggedIn">Login</router-link>
                        </li>
                        <li class="nav-item" v-if="!loggedIn">
                            <a class="nav-link active mt-1" aria-current="page" href="#">Daftar </a>
                        </li>
                        <li class="nav-item" v-if="loggedIn">
                              <div class="dropdown">
                                <button @click="dropdown()" @mouseleave="closeDropdown" class="dropbtn"> 
                                    <img :src="customer.photo" class="rounded-circle me-2" width="25px" height="25px" alt="Profile"> {{customer.name}}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-caret-down-fill ms-1 mt-0" viewBox="0 0 16 16">
                                        <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                    </svg>
                                </button>
                                <div id="myDropdown" class="dropdown-content">
                                    <router-link to ="/listorder">Riwayat Pesanan</router-link>
                                    <router-link to="/editprofile">Edit Profile</router-link>
                                    <router-link to="/listaddress">Data Alamat</router-link>
                                    <a href="#" @click="logout()">Logout</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>    
    </header>   
</template>

<script>

    import axios from "axios";
        
    export default {
        name: 'Header',
        data() {
            return {
                //state loggedIn with localStorage
                loggedIn:false,
                token: localStorage.getItem('token'),
                //state user logged In
                customer: {
                    id:0,
                    name:"",
                    photo:"",
                    email:"",
                    username:""
                },
                keranjangUser:[],
                listOne:   false,
                listTwo:   false,
                listThree: false,
                listFour:  false 
            }
        },

        created() {
            if(localStorage.getItem('token')){
                this.loggedIn=localStorage.getItem('loggedIn');
                axios.get('http://127.0.0.1:8000/api/customers', {headers: {'Authorization': 'Bearer '+this.token}})
                .then(res => {
                    const parsed = JSON.stringify(res.data);
                    localStorage.setItem("customer",parsed);
                    this.customer = {
                        id: res.data.id,
                        name:  res.data.name,
                        photo:  res.data.photo,
                        email:  res.data.email,
                        username :  res.data.username
                    }
                })
            }           
        },

        methods: {
            logout() {
                axios.get('http://127.0.0.1:8000/api/logout')
                .then(() => {
                    //remove localStorage
                    localStorage.removeItem('token');
                    localStorage.setItem('loggedIn',false);
                    localStorage.removeItem("customer");
                    localStorage.removeItem('keranjangUser');
                    this.customer = null;
                    this.loggedIn=false;
                    return this.$router.push({ name: 'Login'});
                })
            },
            dropdown(){
                document.getElementById("myDropdown").classList.toggle("show");
            },
            closeDropdown(event){
               console.log(event);
            }  
            
        },
        mounted(){
            if(localStorage.getItem('keranjangUser')){
                try{
                    this.keranjangUser = JSON.parse(localStorage.getItem('keranjangUser'));
                }catch(e){
                    localStorage.removeItem('keranjangUser');
                }
            }
        }
        // mounted() {
        //     if(!this.loggedIn) {
        //         return this.$router.push({ name: 'Home'})
        //     }
        // }
    }
</script>

<style> 
 .dropbtn {
  background-color: green;
  color: greenyellow;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  color: white;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: greenyellow;
  min-width: 160px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: green;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: green; color: greenyellow;}

.show {display: block;}

</style>
