<template>
    <div>
        <Header/>
        <Slidebar/>
            <div class="container-product">
                <div class="container-fluid mt-3">
                    <div class="row">
                        <div class="col-sm-8 offset-sm-2">
                            <h5 class="title-page pt-5 text-start">Data Alamat</h5>
                            <nav class="breadcrumb-nav" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <p>Data Alamat</p>
                                    <li class="breadcrumb-item active"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item" aria-current="page">Data Alamat</li>
                                </ol>
                            </nav>
                            <div class="card card-all-product">
                                <div class="card-header text-start">
                                    <div class="row">
                                        <div class="col-6 mt-1">
                                            <strong>Data Alamat</strong>
                                        </div>
                                        <div class="col-6">
                                            <div class="input-group mt-1">
                                                <input type="text" class="form-control search" name="cari" placeholder="Search" aria-label="Search" v-model="datasearch">
                                                <button class="btn btn-outline-light" type="button" id="inputGroupFileAddon03" @click="getDataSearch(datasearch);search=true;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>    
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Referensi Alamat</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(receiver,index) in dataReceivers" :key="receiver.id">
                                                <th scope="row">{{index+1}}</th>
                                                <td>{{receiver.title}}</td>
                                                <td>{{receiver.name}}</td>     
                                                <td>
                                                    <button type="button" class="btn btn-primary sm me-1" @click="editAddressReceiverModal=true; editDataReceiver(receiver.id)">
                                                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                                        </svg>
                                                    </button>
                                                    <button type="button" class="btn btn-danger sm btn-delete me-1" @click="deleteDataReceiver(receiver.id)">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                                        </svg>
                                                    </button>
                                                    <button type="button" class="btn btn-secondary sm" @click="viewAddressReceiverModal=true; viewDataReceiver(receiver.id)">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                        </svg>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>        
                                    </table>
                                </div>
                                <div class="card-footer">
                                    <!-- PAGINATION -->
                                    <div class="row">
                                        <div class="col-sm-4">
                                                <p class="text-sm-start fs-6 fw-bold">Halaman {{pagination['current_page']}} dari {{pagination['last_page']}} Halaman | Data {{pagination['from']}}-{{pagination['to']}} dari total {{pagination['total']}}</p>
                                            </div>
                                            <div class="col-sm-8">
                                                <nav class="pagination-admin" aria-label="...">
                                                    <ul class="pagination d-flex justify-content-end">
                                                         <li class="page-item disabled" v-if="pagination['current_page']==1">
                                                            <a class="page-link" href="#" id="FirstPage">Previous</a>
                                                        </li>
                                                        <li class="page-item" v-else>
                                                            <a class="page-link" href="#" id="FirstPage"  @click="firstPage(pagination['first_page_url'])">Previous</a>
                                                        </li>
                                                        <li class="page-item disabled" v-if="pagination['current_page']==1">
                                                            <a class="page-link" href="#" id="PreviousPage">
                                                                <span aria-hidden="true">&lsaquo;</span>
                                                            </a>
                                                        </li>
                                                        <li class="page-item" v-else>
                                                              <a class="page-link" href="#" id="PreviousPage" @click="previousPage(pagination['prev_page_url'])">
                                                                  <span aria-hidden="true">&lsaquo;</span>
                                                              </a>
                                                        </li>
                                                        <li class="page-item" v-for="x in pagination['last_page']" :key="x" @click="getPagination(x)">
                                                            <a class="page-link" href="#">{{x}}</a>
                                                        </li>
                                                        <li class="page-item disabled" v-if="pagination['current_page']==pagination['last_page']">
                                                            <a class="page-link" href="#" aria-label="Next">
                                                                <span aria-hidden="true">&rsaquo;</span>
                                                            </a>
                                                        </li>
                                                        <li class="page-item" v-else>
                                                            <a class="page-link" href="#" aria-label="Next" @click="nextPage(pagination['next_page_url'])">
                                                                <span aria-hidden="true">&rsaquo;</span>
                                                            </a>
                                                        </li>
                                                        <li class="page-item disabled" v-if="pagination['current_page']==pagination['last_page']">
                                                            <a class="page-link" href="#" id="LastPage">Last</a>
                                                        </li>
                                                        <li class="page-item" v-else>
                                                            <a class="page-link" href="#" id="LastPage" @click="lastPage(pagination['last_page_url'])">Last</a>
                                                        </li>
                                                    </ul>
                                                </nav>
                                            </div>
                                        </div>
                                        <!-- END PAGINATION  -->
                                </div>
                                <!-- MODAL ADD ALAMAT PENGIRIMAN -->
                                        <div v-if="addAddressReceiverModal">
                                            <transition name="modal">
                                                <div class="modal-mask">
                                                    <div class="modal-wrapper">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title me-3" id="exampleModalLabel">TAMBAH ALAMAT PENGIRIMAN</h5>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form>           
                                                                        <div class="mb-3 text-start">
                                                                            <label for="idadmin" class="form-label label-required">Nama</label>
                                                                            <input type="text" class="form-control" name="firstname_add_billing" placeholder="Masukkan Nama" v-model="addressReceiver.name">
                                                                             <span v-if="allerrosreceiver.name" :class="['label text-danger']">{{ allerrosreceiver.name[0] }}</span>
                                                                        </div>  
                                                                        <div class="mb-3 text-start">
                                                                            <label for="nama" class="form-label label-required">Alamat</label>
                                                                            <textarea class="form-control" name="address_add_billing" placeholder="Masukkan Alamat" v-model="addressReceiver.address"></textarea>
                                                                            <span v-if="allerrosreceiver.address" :class="['label text-danger']">{{ allerrosreceiver.address[0] }}</span>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-sm-6">
                                                                                <div class="mb-3 text-start">
                                                                                    <label for="province" class="form-label label-required">Provinsi</label>
                                                                                    <select id="province_add_billing" name="province_add_billing" class="form-select" aria-label="Default select example" v-model="selectedProvinceReceiver" @change="selectedCityReceiver1e='';getCities(selectedProvinceReceiver.id_province)">
                                                                                        <option value="" selected>--Pilih Provinsi--</option>
                                                                                        <option v-for="province in provinces" :key="province.province_id" :value="{id_province:province.province_id, name_province:province.province}">{{province.province}}</option>
                                                                                    </select>
                                                                                    <span v-if="allerrosreceiver.province" :class="['label text-danger']">{{allerrosreceiver.province[0] }}</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <div class="mb-3 text-start">
                                                                                    <label for="cities" class="form-label label-required">Kota</label>
                                                                                    <select id="city_add_billing" name="city_add_billing" class="form-select" aria-label="Default select example" v-model="selectedCityReceiver">
                                                                                        <option value="" selected>--Pilih Kota--</option>
                                                                                        <option v-for="city in cities" :key="city.city_id" :value="{id_city:city.city_id, name_city:city.city_name, type_city:city.type}">{{city.type}} {{city.city_name}}</option>
                                                                                    </select>
                                                                                    <span v-if="allerrosreceiver.city" :class="['label text-danger']">{{ allerrosreceiver.city[0] }}</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-6">
                                                                            <div class="mb-3 text-start">
                                                                                    <label for="price" class="form-label label-required">Nomor Telepon</label>
                                                                                    <input type="text" class="form-control" name="phonenumber_add_billing" id="priceInput" placeholder="Masukkan Nomor Telepon" v-model="addressReceiver.phone_number">
                                                                                    <span v-if="allerrosreceiver.phone_number" :class="['label text-danger']">{{ allerrosreceiver.phone_number[0] }}</span>
                                                                                </div>
                                                                            </div>
                                                                                            
                                                                            <div class="col-sm-6">
                                                                                <div class="mb-3 text-start">
                                                                                    <label for="price" class="form-label label-required">Kode Pos</label>
                                                                                    <input type="text" class="form-control" name="postalcode_add_billing" id="priceInput" placeholder="Masukkan Kode Pos" v-model="addressReceiver.postalcode"> 
                                                                                      <span v-if="allerrosreceiver.postalcode" :class="['label text-danger']">{{ allerrosreceiver.postalcode[0] }}</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="mb-3 text-start">
                                                                            <label for="price" class="form-label label-required">Referensi Alamat (ex:Alamat Rumah)</label>
                                                                            <input type="text" class="form-control" name="title_add_billing" id="priceInput" placeholder="Masukkan Referensi Alamat" v-model="addressReceiver.title">
                                                                              <span v-if="allerrosreceiver.title" :class="['label text-danger']">{{ allerrosreceiver.title[0] }}</span>
                                                                        </div>            
                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-success" id="address_add_bill_submit" @click="saveDataReceiver()">Simpan</button> 
                                                                    <button type="button" class="btn btn-secondary" id="add_billing_cancel" @click="addAddressReceiverModal=false">Batal</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </transition>
                                        </div>
                                        <!-- END ADD ALAMAT PENGIRIMAN -->

                                         <!-- MODAL EDIT ALAMAT PENGIRIMAN -->
                                        <div v-if="editAddressReceiverModal">
                                            <transition name="modal">
                                                <div class="modal-mask">
                                                    <div class="modal-wrapper">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title me-3" id="exampleModalLabel">UBAH ALAMAT PENGIRIMAN</h5>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form>           
                                                                        <div class="mb-3 text-start">
                                                                            <label for="idadmin" class="form-label label-required">Nama</label>
                                                                            <input type="text" class="form-control" name="firstname_add_billing" placeholder="Masukkan Nama" v-model="addressReceiver.name">
                                                                            <span v-if="allerrosreceiver.name" :class="['label text-danger']">{{ allerrosreceiver.name[0] }}</span>
                                                                        </div>  
                                                                        <div class="mb-3 text-start">
                                                                            <label for="nama" class="form-label label-required">Alamat</label>
                                                                            <textarea class="form-control" name="address_add_billing" placeholder="Masukkan Alamat" v-model="addressReceiver.address"></textarea>
                                                                            <span v-if="allerrosreceiver.address" :class="['label text-danger']">{{ allerrosreceiver.address[0] }}</span>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-sm-6">
                                                                                <div class="mb-3 text-start">
                                                                                    <label for="province" class="form-label label-required">Provinsi</label>
                                                                                    <select id="province_add_billing" name="province_add_billing" class="form-select" aria-label="Default select example" v-model="selectedProvinceReceiver" @change="selectedCityReceiver='';getCities(selectedProvinceReceiver.id_province)">
                                                                                        <option value="" selected>--Pilih Provinsi--</option>
                                                                                        <option v-for="province in provinces" :key="province.province_id" :value="{id_province:province.province_id, name_province:province.province}">{{province.province}}</option>
                                                                                    </select>
                                                                                    <span v-if="allerrosreceiver.province" :class="['label text-danger']">{{ allerrosreceiver.province[0] }}</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <div class="mb-3 text-start">
                                                                                    <label for="cities" class="form-label label-required">Kota</label>
                                                                                    <select id="city_add_billing" name="city_add_billing" class="form-select" aria-label="Default select example" v-model="selectedCityReceiver">
                                                                                        <option value="" selected>--Pilih Kota--</option>
                                                                                        <option v-for="city in cities" :key="city.city_id" :value="{id_city:city.city_id, name_city:city.city_name, type_city:city.type}">{{city.type}} {{city.city_name}}</option>
                                                                                    </select>
                                                                                    <span v-if="allerrosreceiver.city" :class="['label text-danger']">{{ allerrosreceiver.city[0] }}</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-6">
                                                                            <div class="mb-3 text-start">
                                                                                    <label for="price" class="form-label label-required">Nomor Telepon</label>
                                                                                    <input type="text" class="form-control" name="phonenumber_add_billing" id="priceInput" placeholder="Masukkan Nomor Telepon" v-model="addressReceiver.phone_number">
                                                                                    <span v-if="allerrosreceiver.phonenumber" :class="['label text-danger']">{{ allerrosreceiver.phone_number[0] }}</span>
                                                                                </div>
                                                                            </div>
                                                                                            
                                                                            <div class="col-sm-6">
                                                                                <div class="mb-3 text-start">
                                                                                    <label for="price" class="form-label label-required">Kode Pos</label>
                                                                                    <input type="text" class="form-control" name="postalcode_add_billing" id="priceInput" placeholder="Masukkan Kode Pos" v-model="addressReceiver.postalcode"> 
                                                                                    <span v-if="allerrosreceiver.postalcode" :class="['label text-danger']">{{ allerrosreceiver.postalcode[0] }}</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="mb-3 text-start">
                                                                            <label for="price" class="form-label label-required">Referensi Alamat (ex:Alamat Rumah)</label>
                                                                            <input type="text" class="form-control" name="title_add_billing" id="priceInput" placeholder="Masukkan Referensi Alamat" v-model="addressReceiver.title">
                                                                            <span v-if="allerrosreceiver.title" :class="['label text-danger']">{{ allerrosreceiver.title[0] }}</span>
                                                                        </div>            
                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-success" id="address_add_bill_submit" @click="updateDataReceiver()">Simpan</button> 
                                                                    <button type="button" class="btn btn-secondary" id="add_billing_cancel" @click="editAddressReceiverModal=false">Batal</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </transition>
                                        </div>
                                        <!-- END EDIT ALAMAT PENGIRIMAN -->

                                        <!-- MODAL VIEW ALAMAT PENGIRIMAN -->
                                        <div v-if="viewAddressReceiverModal">
                                            <transition name="modal">
                                                <div class="modal-mask">
                                                    <div class="modal-wrapper">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title me-3" id="exampleModalLabel">DETAIL ALAMAT PENGIRIMAN</h5>
                                                                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" @click="viewAddressReceiverModal=false"></button> 
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row g-0">
                                                                        <div class="col-sm-12">
                                                                            <h5 class="card-title title-detail-product">{{addressReceiver.title}}</h5>
                                                                            <table class="table">
                                                                                <tr>
                                                                                    <td class="pt-3 text-start"><b class="fw-bold">Nama</b></td>
                                                                                    <td class="pt-3 text-start">{{addressReceiver.name}}</td>
                                                                                </tr>
                                                                                <tr> 
                                                                                    <td class="pt-3 text-start"><b class="fw-bold">Alamat</b></td>
                                                                                    <td class="pt-3 text-start">{{addressReceiver.address}}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="pt-3 text-start"><b class="fw-bold">Kota</b></td>
                                                                                    <td class="pt-3 text-start">{{addressReceiver.city}}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="pt-3 text-start"><b class="fw-bold">Provinsi</b></td>
                                                                                    <td class="pt-3 text-start">{{addressReceiver.province}}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="pt-3 text-start"><b class="fw-bold">Kode Pos</b></td>
                                                                                    <td class="pt-3 text-start">{{addressReceiver.postalcode}}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="pt-3 text-start"><b class="fw-bold">No Telepon</b></td>
                                                                                    <td class="pt-3 text-start">{{addressReceiver.phone_number}}</td>
                                                                                </tr>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </transition>
                                        </div>
                                        <!-- END VIEW ALAMAT PENGIRIMAN -->
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
    import Slidebar from '@/components/Sliderbar.vue';
    import axios from "axios";

    export default{
        name:"ListAddress",
        components:{
            Header,Slidebar,Footer
        },
        data(){
            return{
                dataReceivers:[],
                addAddressReceiverModal: false,
                editAddressReceiverModal:false,
                viewAddressReceiverModal:false,
                addressReceiver:'',
                selectedProvinceReceiver:'',
                selectedCityReceiver:'',
                provinces:[],
                cities:[],
                allerrosreceiver:[],
                pagination:[],
                datasearch:[],
                search:false
            }
        },
        methods:{
            getCities(id){
            axios
            .get("http://127.0.0.1:8000/api/cities/"+id)
            .then(res=>{this.cities=res.data.data})
            .catch(err=>console.log(err));
            },
            addDataReceiver(){
                this.addressReceiver = {
                    id:0,
                    name:'',
                    address:'',
                    postalcode:'',
                    phone_number:'',
                    title:'',
                };
                this.selectedProvinceReceiver = "";
                this.selectedCityReceiver = "";
                this.allerrosreceiver=[];
            },
            editDataReceiver(id){
                axios
                .get("http://127.0.0.1:8000/api/receiver/"+id)
                .then(res=>{
                    let dataReceiver = res.data.data;
                    this.addressReceiver = {
                        id:dataReceiver.id,
                        name:dataReceiver.name,
                        address:dataReceiver.address,
                        postalcode:dataReceiver.postalcode,
                        phone_number:dataReceiver.phone_number,
                        title:dataReceiver.title
                    }
                    this.selectedProvinceReceiver = {
                        id_province: dataReceiver.id_province,
                        name_province: dataReceiver.province 
                    }

                    this.getCities(this.selectedProvinceReceiver.id_province);
                    this.selectedCityReceiver = {
                    id_city:dataReceiver.id_city,
                    type_city:dataReceiver.type_city, 
                    name_city:dataReceiver.city
                    };

                    this.allerrosreceiver = [];
                })
                .catch(err=>console.log(err));
            },
            deleteDataReceiver(id){
                let customer = JSON.parse(localStorage.getItem('customer'));
                axios
                .delete("http://127.0.0.1:8000/api/receiver/delete/"+id)
                        .then(()=>{
                            axios
                            .get("http://127.0.0.1:8000/api/receiver/customer/"+customer.id)
                            .then(res=>{
                                this.dataReceivers = res.data.data;
                            })
                            .catch(err=>console.log(err));
                        })
                        .catch(err=>console.log(err)); 
            },
            viewDataReceiver(id){
                axios
                .get("http://127.0.0.1:8000/api/receiver/"+id)
                .then(res=>{
                    let dataReceiver = res.data.data;
                    this.addressReceiver = {
                        id:dataReceiver.id,
                        name:dataReceiver.name,
                        address:dataReceiver.address,
                        postalcode:dataReceiver.postalcode,
                        phone_number:dataReceiver.phone_number,
                        title:dataReceiver.title,
                        city:dataReceiver.city,
                        province:dataReceiver.province
                    } 
                })
                .catch(err=>console.log(err));
            },
            saveDataReceiver(){
                let customer = JSON.parse(localStorage.getItem('customer'));
                let tempDataReceiver = {
                    "title":this.addressReceiver.title,
                    "name":this.addressReceiver.name, 
                    "address":this.addressReceiver.address,
                    "id_city":this.selectedCityReceiver.id_city,
                    "type_city":this.selectedCityReceiver.type_city, 
                    "city":this.selectedCityReceiver.name_city,
                    "id_province":this.selectedProvinceReceiver.id_province,
                    "province":this.selectedProvinceReceiver.name_province,
                    "postalcode" :this.addressReceiver.postalcode,
                    "phone_number":this.addressReceiver.phone_number,
                    "id_customer":customer.id
                };

                axios
                .post("http://127.0.0.1:8000/api/receiver/add",tempDataReceiver)
                .then(()=>{
                        axios
                        .get("http://127.0.0.1:8000/api/receiver/customer/"+customer.id)
                        .then(res=>{
                            this.dataReceivers = res.data.data;
                        })
                        .catch( err=>console.log(err));
                        this.addAddressReceiverModal = false;
                    }
                )
                .catch(
                    error=>{
                        if(error.response.status==422){
                            this.allerrosreceiver = error.response.data.errors;
                            this.success = false;
                        }
                    }
                );
            },
             updateDataReceiver(){
                let customer = JSON.parse(localStorage.getItem('customer'));
                let tempDataReceiver = {
                    "title":this.addressReceiver.title,
                    "name":this.addressReceiver.name, 
                    "address":this.addressReceiver.address,
                    "id_city":this.selectedCityReceiver.id_city,
                    "type_city":this.selectedCityReceiver.type_city, 
                    "city":this.selectedCityReceiver.name_city,
                    "id_province":this.selectedProvinceReceiver.id_province,
                    "province":this.selectedProvinceReceiver.name_province,
                    "postalcode" :this.addressReceiver.postalcode,
                    "phone_number":this.addressReceiver.phone_number,
                    "id_customer":customer.id
                };

                    axios
                    .post("http://127.0.0.1:8000/api/receiver/update/"+this.addressReceiver.id,tempDataReceiver)
                    .then(
                        ()=>{
                        axios
                        .get("http://127.0.0.1:8000/api/receiver/customer/"+customer.id)
                        .then(res=>{
                            this.dataReceivers = res.data.data;
                        })
                        .catch(err=>console.log(err));
                         this.editAddressReceiverModal = false;
                        }
                    )
                    .catch(
                        error=>{
                            if(error.response.status==422){
                                this.allerrosreceiver = error.response.data.errors;
                                this.success = false;
                            }
                        }
                    );
            },
             getPagination(pageNumber){
                let customer = JSON.parse(localStorage.getItem('customer'));
                if(this.search==false){
                    axios
                    .get("http://127.0.0.1:8000/api/receiver/customer/"+customer.id+"?page="+pageNumber)
                    .then(res=>{
                        let datareceiver= res.data.data.data;
                        this.pagination = res.data.data;
                        this.currentPage = this.pagination['current_page'];
                        console.log(this.pagination);
                        this.dataReceivers = datareceiver.map(function(item){
                            return item
                        });
                    })
                    .catch(err=>console.log(err));
                }
                else{
                    axios
                    .get("http://127.0.0.1:8000/api/receiver/cari/customer/"+customer.id,{
                        params:{
                            cari: this.datasearch,
                            page:pageNumber
                        }
                    })
                    .then(res=>{
                        let datareceiver = res.data.data.data;
                        this.pagination = res.data.data;
                        this.currentPage = this.pagination['current_page'];
                        console.log(this.pagination);
                        this.dataReceivers = datareceiver.map(function(item){
                            return item
                        });
                    })
                    .catch(err=>console.log(err));
                }
            },
            nextPage(pageNext){
                if(pageNext!=null){
                    axios
                    .get(pageNext,{
                        params:{
                            cari: this.datasearch
                        }
                    })
                    .then(res=>{
                        let datareceiver = res.data.data.data;
                        this.pagination = res.data.data;
                        this.dataReceivers = datareceiver.map(function(item){
                            return item
                        });
                    })
                    .catch(err=>console.log(err));
                } 
            },
            previousPage(pagePrevious){
                if(pagePrevious!=null){
                    axios
                    .get(pagePrevious,{
                        params:{
                            cari: this.datasearch
                        }
                    })
                    .then(res=>{
                        let datareceiver = res.data.data.data;
                        this.pagination = res.data.data;
                        this.dataReceivers = datareceiver.map(function(item){
                            return item
                        });
                    })
                    .catch(err=>console.log(err));
                } 
            },
            firstPage(pageFirst){
                if(pageFirst!=null){
                    axios
                    .get(pageFirst)
                    .then(res=>{
                        let datareceiver = res.data.data.data;
                        this.pagination = res.data.data;
                        this.dataReceivers = datareceiver.map(function(item){
                            return item
                        });
                    })
                    .catch(err=>console.log(err));
                } 
            },
            lastPage(pageLast){
                if(pageLast!=null){
                    axios
                    .get(pageLast,{
                        params:{
                            cari: this.datasearch
                        }
                    })
                    .then(res=>{
                        let datareceiver = res.data.data.data;
                        this.pagination = res.data.data;
                        this.dataReceivers = datareceiver.map(function(item){
                            return item
                        });
                    })
                    .catch(err=>console.log(err));
                } 
            },
            getDataSearch(datasearch){
                let customer = JSON.parse(localStorage.getItem('customer'));
                this.search  = true;
                if(datasearch!=null || datasearch!=""){ 
                    axios
                    .get("http://127.0.0.1:8000/api/receiver/cari/customer/"+customer.id,{
                        params:{
                            cari: datasearch
                        }
                    })
                    .then(res=>{
                        console.log(res.data.data.data);
                        this.dataReceivers = res.data.data.data;
                        this.pagination = res.data.data;
                    })
                    .catch(err=>console.log(err));
                } 
            }
        },
        mounted(){
            let customer = JSON.parse(localStorage.getItem('customer'));
            axios
            .get("http://127.0.0.1:8000/api/provinces")
            .then(res=>{this.provinces=res.data.data})
            .catch(err=>console.log(err));

            axios
            .get("http://127.0.0.1:8000/api/receiver/customer/paginate/"+customer.id)
            .then(res=>{
                this.dataReceivers = res.data.data.data;
                this.pagination = res.data.data;
            })
            .catch(err=>console.log(err));
        }
    }
</script>
