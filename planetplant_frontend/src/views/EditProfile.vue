<template>
   <div>
       <Header/>
       <Slidebar/>
        <div class="container-product">
            <div class="container-fluid mt-3">
                <div class="row">
                    <div class="col-sm-8 offset-sm-2">
                        <h5 class="title-page pt-5 text-start">Edit Profile</h5>
                        <nav class="breadcrumb-nav" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <p>Edit Profile</p>
                                <li class="breadcrumb-item active"><a href="#">Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Edit Profile</li>
                            </ol>
                        </nav>
                        <div class="card card-all-product">
                            <div class="card-header">
                                <strong>Form Edit Profile</strong>
                            </div>
                            <div class="card-body">
                                <form class="mt-3 text-start">
                                    <div class="row">
                                        <div class="col-sm-3 m-3" id="imagePreview">
                                            <img :src="showPhoto" id="output" alt="profile" width="200" height="250">
                                            <div class="col-auto m-3">
                                                <input id="fileUpload" type="file" hidden @change="selectedFile">
                                                <span v-if="allerros.photo" :class="['label text-danger']">{{ allerros.photo[0]}}</span>
                                                <button type="button" class="btn btn-secondary" @click="chooseFiles()">Choose</button>          
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="nama" class="form-label">Nama</label>
                                                <input type="text" class="form-control" name="name" placeholder="Masukkan Nama" v-model="dataCustomer.name">
                                                <span v-if="allerros.name" :class="['label text-danger']">{{ allerros.name[0] }}</span>
                                            </div>
                                            <div class="mb-3">
                                                <label for="nama" class="form-label">Jenis Kelamin</label>
                                                <select class="form-select" name="gender" v-model="selectedGender">
                                                    <option value="" selected>-- Pilih Salah Satu --</option>
                                                    <option value="M">Pria</option>
                                                    <option value="F">Wanita</option>
                                                </select>
                                                <span v-if="allerros.gender" :class="['label text-danger']">{{ allerros.gender[0]}}</span>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="phone" class="form-label">No Telepon</label>
                                                        <input type="text" class="form-control" name="phone_number" placeholder="Masukkan No Telepon" v-model="dataCustomer.phonenumber">
                                                        <span v-if="allerros.phone_number" :class="['label text-danger']">{{ allerros.phonenumber[0] }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="email" class="form-label">Email</label>
                                                        <input type="text" class="form-control" name="email" placeholder="Masukkan Email" v-model="dataCustomer.email">
                                                        <span v-if="allerros.email" :class="['label text-danger']">{{ allerros.email[0] }}</span>
                                                    </div>
                                                </div>
                                            </div>    
                                            <div class="mb-3">
                                                <label for="username" class="form-label">Username</label>
                                                <input type="text" class="form-control" name="username" placeholder="Masukkan Username" v-model="dataCustomer.username">
                                                <span v-if="allerros.username" :class="['label text-danger']">{{ allerros.username[0]}}</span>
                                            </div>
                                            <!-- <div class="mb-3">
                                                <label for="username" class="form-label">Password</label>
                                                <div class="row">
                                                    <div class="col-sm-8">
                                                        <input type="password" class="form-control" name="password" placeholder="Masukkan Password" v-model="password" :disabled="!checkPassword">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="password_checkbox" v-model="checkPassword">
                                                            <label class="form-check-label" for="flexCheckDefault">Ubah Password</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <button type="button" class="btn btn-success" @click="updateDataCustomer()">Simpan</button> 
                                        </div>
                                    </div>
                                </form>  
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
    
    import Header from '@/components/Header.vue';
    import Slidebar from '@/components/Sliderbar.vue';
    import Footer from '@/components/Footer.vue';
    import axios from "axios";
   
    
    export default{
        name:"EditProfile",
        components:{
            Header,
            Footer,
            Slidebar
        },
        data(){
            return{
                dataCustomer:{
                    id:0,
                    name:'',
                    email:'',
                    phonenumber:'',
                    username:''
                },
                selectedGender:'',
                checkPassword:false,
                photoProfile:'',
                showPhoto:'',
                password:'',
                oldPhoto:'',
                allerros:[],
                success:false
            }
        },
        methods:{
            updateDataCustomer(){
                
                let customer = JSON.parse(localStorage.getItem('customer'));

                console.log("name:"+this.dataCustomer.name+
                            "phonenumber:"+this.dataCustomer.phonenumber+
                            "gender:"+this.selectedGender+
                            "email:"+this.dataCustomer.email+
                            "username:"+this.dataCustomer.username,
                            "photo:"+(this.photoProfile!="" ? this.photoProfile.name : this.oldPhoto));

                let data = new FormData();
                data.append('code',customer.code);
                data.append('name', this.dataCustomer.name);
                data.append('email',this.dataCustomer.email);
                data.append('phonenumber', this.dataCustomer.phonenumber);
                data.append('username', this.dataCustomer.username);
                data.append('gender',this.selectedGender);
                if(this.photoProfile!='')
                data.append('photo', this.photoProfile);
                else
                data.append('oldPhoto',this.oldPhoto);

                // if(this.password!='')
                // data.append('password',this.password);

                axios
                    .post("http://127.0.0.1:8000/api/customer/update/"+customer.id,data,{
                    headers: {
                        'Content-Type': "multipart/form-data; charset=utf-8; boundary=" + Math.random().toString().substr(2)
                    }})
                    .then(res => {
                       console.log(res.data.data);
                    })
                    .catch(error=>{
                        if(error.response.status==422){
                            this.allerros = error.response.data.errors;
                            this.success = false;
                        }
                    });
            },
            chooseFiles() {
                document.getElementById("fileUpload").click()
            },
            selectedFile(e){
                this.photoProfile = e.target.files[0];
                this.showPhoto = URL.createObjectURL(this.photoProfile);
            }
        },
        mounted(){
            if(localStorage.getItem('customer')){
                try{
                    var customer = JSON.parse(localStorage.getItem('customer'));
                    this.dataCustomer.id = customer.id;
                    this.dataCustomer.name = customer.name;
                    this.dataCustomer.email = customer.email;
                    this.selectedGender = customer.gender;
                    this.dataCustomer.phonenumber = customer.phone_number;
                    this.dataCustomer.username = customer.username;
                    // this.dataCustomer.password = customer.password;
                    this.oldPhoto = customer.photo;
                    this.showPhoto = customer.photo;
                }catch(e){
                    localStorage.removeItem('customer');
                }
            }


        }
    }
</script>
