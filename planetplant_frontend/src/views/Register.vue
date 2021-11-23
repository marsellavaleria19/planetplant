<template>
    <div>
        <Header/>
        <div class="container-register">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-8 offset-sm-3">
                        <div class="card card-register">
                            <div class="card-header">
                                <h5 class="text-center">Register</h5>
                            </div>
                            <div class="card-body">
                                <form class="text-start">
                                    <div class="row">
                                        <div class="col-sm-3 m-3" id="imagePreview">
                                            <img :src="showPhoto" id="output" alt="profile" width="200" height="250">
                                            <div class="col-auto m-3">
                                                <input type="file" class="form-control" id="selectedFile" name="photo" accept="image/*" @change="selectedFile" style="display:none;" value="profile.jpg"/>
                                                <button type="button" class="btn btn-secondary" value="Browse" @click="chooseFiles()">Browse</button>
                                            </div>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="mb-3">
                                                <label for="nama" class="form-label">Nama</label>
                                                <input type="text" class="form-control" name="name" placeholder="Masukkan Nama" value="" v-model="dataCustomer.name">
                                                <span v-if="allerros.name" class="text-danger">{{allerros.name[0]}}</span>
                                            </div>    
                                            <div class="mb-3">
                                                <label for="nama" class="form-label">Jenis Kelamin</label>
                                                <select class="form-select" name="gender" v-model="dataCustomer.gender">
                                                    <option value="" selected>-- Pilih Salah Satu --</option>
                                                    <option value="M">Pria</option>
                                                    <option value="F">Wanita</option>
                                                </select>
                                                <span v-if="allerros.gender" class="text-danger">{{allerros.gender[0]}}</span>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="phone" class="form-label">No Telepon</label>
                                                        <input type="text" class="form-control" name="phone_number" id="exampleInputEmail1" placeholder="Masukkan No Telepon" value="" v-model="dataCustomer.phonenumber">
                                                        <span v-if="allerros.phonenumber" class="text-danger">{{allerros.phonenumber[0]}}</span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="email" class="form-label">Email</label>
                                                        <input type="text" class="form-control" name="email" id="exampleInputEmail1" placeholder="Masukkan Email" value="" v-model="dataCustomer.email">
                                                        <span v-if="allerros.email" class="text-danger">{{allerros.email[0]}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="username" class="form-label">Username</label>
                                                <input type="text" class="form-control" name="username" id="exampleInputEmail1" placeholder="Masukkan Username" value="" v-model="dataCustomer.username">
                                                <span v-if="allerros.username" class="text-danger">{{allerros.username[0]}}</span>
                                            </div>
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Masukkan Password" value="" v-model="dataCustomer.password">
                                                <span v-if="allerros.password" class="text-danger">{{allerros.password[0]}}</span>
                                            </div>
                                            <button type="button" class="btn btn-success mt-3" @click="saveDataCustomer()">Simpan</button>                            
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
    import Footer from '@/components/Footer.vue';
    import axios from "axios";

    export default{
        name:"Register",
        components:{
            Header,Footer
        },
        data(){
            return{
                dataCustomer:{
                    name:'',
                    email:'',
                    gender:'',
                    phonenumber:'',
                    username:'',
                    password:'',
                    photo:''
                },
                showPhoto:'img_client/profile.jpg',
                oldPhoto:'img_client/profile.jpg',
                success:false,
                allerros:[]
            }
        },
        methods:{
            selectedFile(e){
                this.dataCustomer.photo = e.target.files[0];
                this.showPhoto = URL.createObjectURL(this.dataCustomer.photo);
            },
             chooseFiles() {
               document.getElementById('selectedFile').click();
            },
            saveDataCustomer(){
                 
                console.log("name:"+this.dataCustomer.name+
                            "phonenumber:"+this.dataCustomer.phonenumber+
                            "gender:"+this.dataCustomer.gender+
                            "email:"+this.dataCustomer.email+
                            "username:"+this.dataCustomer.username,
                            "photo:"+(this.dataCustomer.photo!="" ? this.dataCustomer.photo : this.oldPhoto));

                let data = new FormData();
                data.append('name', this.dataCustomer.name);
                data.append('email',this.dataCustomer.email);
                data.append('phonenumber', this.dataCustomer.phonenumber);
                data.append('username', this.dataCustomer.username);
                data.append('gender',this.dataCustomer.gender);
                if(this.dataCustomer.photo!='')
                data.append('photo', this.dataCustomer.photo);
                else
                data.append('oldPhoto',this.oldPhoto);
                data.append('password',this.dataCustomer.password);

                axios
                    .post("http://127.0.0.1:8000/api/customer/add/",data,{
                    headers: {
                        'Content-Type': "multipart/form-data; charset=utf-8; boundary=" + Math.random().toString().substr(2)
                    }})
                    .then(res => {
                        if(res.data.meta.code==200){
                          return this.$router.push({ name: 'Login'})
                        }
                    })
                    .catch(error=>{
                        if(error.response.status==422){
                            this.allerros = error.response.data.errors;
                            this.success = false;
                        }
                    });
            }
        }
    }
</script>
