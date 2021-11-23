<template>
    <nav class ="sidebar">
        <header>
            <img :src="customer.photo" class="img_slide rounded-circle" width="100px" height="100px" alt="Profile">
            <p>{{customer.name}}</p>
        </header>
        <ul>
           <li> 
                <router-link to="/" class="text-start">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 20 20">
                        <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
                    </svg> Home
                </router-link>
            </li>
            <li> 
                <router-link to="/editprofile" class="customer-btn text-start">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 20 20">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    </svg> Edit Profile
                </router-link> 
            </li>
            <li> 
                <router-link to="/listaddress" href="#" class="text-start">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-truck" viewBox="0 0 20 20">
                        <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                    </svg> Data Alamat
                </router-link>
            </li>
            <li> 
                <router-link to="/listorder" class="text-start">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-receipt" viewBox="0 0 20 20">
                        <path d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z"/>
                        <path d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
                    </svg> Riwayat Pesanan
                </router-link>
            </li>
            <hr class="hr-slidebar">
            <button type="button" class="btn-logout" @click="logout()">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
            </svg> Logout
        </button>
        </ul>
    </nav>
</template>
<script>
    import axios from "axios";
    export default{
        name:"Slidebar",
        data(){
            return{
                customer:[]
            }
        },
        methods:{
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
            }
        },
        mounted(){
            if(localStorage.getItem('customer')){
                try{
                    this.customer = JSON.parse(localStorage.getItem('customer'));
                    console.log(this.customer.photo);
                }catch(e){
                    localStorage.removeItem('customer');
                }
            }
        }
    }
</script>

<style>
    .sidebar{
        position : fixed;
        width : 230px;
        height : 94.37%;
        left : 0;
        background-image: linear-gradient(white, greenyellow);
        border-right: 2px solid green;
         z-index: 1;
    }

    .sidebar header{
    color : green;
    font-size: 16px;
    text-align: center;
    background-color:transparent;
    border-bottom: 1px solid rgba(255,255,255,0.1);
    margin : 40px;
    height: 220px;
    }

    .img_slide{
    margin-bottom: 10px;
    margin-top:50px;
    }

    .sidebar ul{
    height: 100%;
    width : 100%;
    list-style: none;
    }

    .sidebar ul li{
    line-height: 60px;
    border-bottom: 1px solid rgba(255,255,255,0.1);
    }
    
    .sidebar ul li a{
    position: relative;
    color : green;
    text-decoration: none;
    font-size: 16px;
    padding-left: 2px;
    display: block;
    width: 100%;
    height: 100%;
    box-sizing: border-box;
    line-height: 65px;
    transition: .4s;
    }

    .sidebar ul li a:hover{
    color : #5af542;
    padding-left: 20px;
    }

    .hr-slidebar{
        width:170px;
        border:green solid 1px;
        color:green;
        margin-left:0;
        margin-right: 10px;
        margin-top: 360px;
    }
    .btn-logout{
        width:150px;
        height: 40px;
        background-color: transparent;
        border:green solid 1px;
        color:green;
        margin-left:0;
        margin-right: 10px;
    }
</style>