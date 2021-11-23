<template>
    <div>
        <Header/>
            <div class="container container-login">
                 <div class="row">
                    <div class="col-sm-6 offset-sm-1">
                        <div class="card mb-3 login-card">
                            <div class="row g-0 text-start">
                                <div class="col-md-6">
                                    <img src="/img_application/img_customer.png" alt="img_admin" width="450" height="600">
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <h5 class="card-title header-company">Planet Plant</h5>
                                        <form class="p-4">
                                              <div class="alert alert-danger" v-if="messageError!=''">{{messageError}}</div>
                                            <div class="mb-3">
                                                <label for="username" class="form-label ps-auto">Username</label>
                                                <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username atau Email" v-model="user.username">
                                                <span v-if="allerros.username" :class="['label text-danger']">{{ allerros.username[0]}}</span>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label text-start">Password</label>
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" v-model="user.password">
                                                <span v-if="allerros.password" :class="['label text-danger']">{{ allerros.password[0]}}</span>
                                            </div>
                                            <div class="d-grid gap-2 mt-4">
                                                <a href="#" class="btn btn-success btn-gradien" style="width:340px;" @click="login()">Login</a>
                                            </div>
                                        </form>
                                         <hr class="hr-login">
                                            <p class="ms-5">Anda Belum punya akun?<router-link to="/register" class="link-primary"> Buat Akun Baru</router-link></p> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <Footer/>
    </div>
</template>
<script>
    import Header from "@/components/Header.vue";
    import Footer from "@/components/Footer.vue";
    import axios from "axios";

    export default {
       name:'Login',
       components: {
            Header,
            Footer
        },
        data(){
            return{
                loggedIn: localStorage.getItem('loggedIn'),
                token: localStorage.getItem('token'),
                customer:localStorage.getItem('customer'),
                user: {
                    username:'',
                    password:''
                },
                allerros:[],
                messageError:''
            }
        },
        methods:{
            login(){
            
                let datauser = {
                    'username':this.user.username,
                    'password':this.user.password,
                    'device_name':'web'
                };
                
                axios.post('http://127.0.0.1:8000/api/login', datauser).
                then(res => {
                    // console.log(res.data.data);
                    localStorage.setItem("loggedIn", true);
                    localStorage.setItem("token", res.data.data.token);
                    this.loggedIn = true;
                    return this.$router.push({ name: 'Home'});
                    
                }).catch(error => {
                    this.allerros = [];
                    if(error.response.status==422){
                        this.allerros = error.response.data.errors;
                        this.success = false;
                    }
                    else{
                        if(error.response.status==400)
                        this.messageError = error.response.data.meta.message;  
                    }
                })
                
            }
        }
    }
</script>
