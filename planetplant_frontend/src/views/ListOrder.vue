<template>
    <div>
        <Header/>
        <Sliderbar/>
            <div class="container-product">
                <div class="container-fluid mt-3">
                    <div class="row">
                        <div class="col-sm-8 offset-sm-2">
                            <h5 class="title-page pt-5 text-start">Riwayat Pesanan</h5>
                            <nav class="breadcrumb-nav" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <p>Riwayat Pesanan</p>
                                    <li class="breadcrumb-item active"><router-link to="/">Home</router-link></li>
                                    <li class="breadcrumb-item" aria-current="page">Riwayat Pesanan</li>
                                </ol>
                            </nav>
                            <div class="card card-all-product">
                                <div class="card-header text-start">
                                    <div class="row">
                                        <div class="col-9 mt-1">
                                            <strong>Riwayat Pesanan</strong>
                                        </div>
                                        <div class="col-sm-3">
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
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Kode Pemesanan</th>
                                                <th scope="col">Tanggal Pemesanan</th>
                                                <th scope="col">Pengirim</th>
                                                <th scope="col">Total</th>
                                                <th scope="col">Status</th>  
                                                <th scope="col">Aksi</th>     
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="transaction in transactions" :key="transaction.id">
                                                <td>{{transaction.code}}</td>
                                                <td>{{transaction.transaction_date}}</td>
                                                <td>{{transaction.SenderName}}</td>
                                                <td>Rp {{formatPrice(transaction.transaction_total)}}</td>
                                                <td v-if="transaction.transaction_status=='BELUM BAYAR'"><span class="badge bg-warning" style="color:white;"> {{transaction.transaction_status}}</span></td>
                                                <td v-else-if="transaction.transaction_status=='KONFIRMASI PEMBAYARAN'"><span class="badge bg-secondary" style="color:white;">{{transaction.transaction_status}}</span></td>
                                                <td v-else-if="transaction.transaction_status=='DIKIRIM'"><span class="badge bg-info" style="color:white;">{{transaction.transaction_status}}</span></td>
                                                <td v-else-if="transaction.transaction_status=='BATAL'"><span class="badge bg-danger" style="color:white;">{{transaction.transaction_status}}</span></td>
                                                <td v-else><span class="badge bg-success" style="color:white;">{{transaction.transaction_status}}</span></td>
                                                <td>
                                                    <button class="btn btn-danger btn-sm me-1" @click="setStatusOrder(transaction.id,'BATAL')" :disabled="setDisabled(transaction.transaction_status,'BATAL')">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                                            <path d="M1.293 1.293a1 1 0 0 1 1.414 0L8 6.586l5.293-5.293a1 1 0 1 1 1.414 1.414L9.414 8l5.293 5.293a1 1 0 0 1-1.414 1.414L8 9.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L6.586 8 1.293 2.707a1 1 0 0 1 0-1.414z"/>
                                                        </svg>
                                                    </button>
                                                    <button class="btn btn-success btn-sm me-1" @click="setStatusOrder(transaction.id,'SELESAI')" :disabled="setDisabled(transaction.transaction_status,'SELESAI')">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                                            <path d="M13.485 1.431a1.473 1.473 0 0 1 2.104 2.062l-7.84 9.801a1.473 1.473 0 0 1-2.12.04L.431 8.138a1.473 1.473 0 0 1 2.084-2.083l4.111 4.112 6.82-8.69a.486.486 0 0 1 .04-.045z"/>
                                                        </svg>
                                                    </button>
                                                    <a class="btn btn-secondary btn-sm" @click="viewTransactionDetailModal=true; getViewTransactionDetail(transaction.id);
                                                    getDataTransaction(transaction.id,transaction.code,transaction.ReceiverName,transaction.ReceiverAddress,transaction.ReceiverCity,transaction.ReceiverProvince,
                                                    transaction.ReceiverPostalcode,transaction.ReceiverPhoneNumber,transaction.SenderName,transaction.SenderAddress,
                                                    transaction.SenderCity,transaction.SenderProvince,transaction.SenderPostalCode,transaction.SenderPhoneNumber,transaction.shipping_name,transaction.shipping_type,
                                                    transaction.shipping_price,transaction.transaction_status)">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                        </svg>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div  class="card-footer">
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

                                <!-- MODAL VIEW DETAIL TRANSACTION -->
                                <div v-if="viewTransactionDetailModal">
                                    <transition name="modal">
                                       <div class="modal-mask">
                                           <div class="modal-wrapper">
                                                <div class="modal-dialog modal-xl" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Transaksi {{dataTransaction.code_transaction}}-{{dataTransaction.name_bill}}({{dataTransaction.transaction_status}})</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" @click="viewTransactionDetailModal=false"></button> 
                                                        </div>
                                                        <div class="modal-body">
                                                            <section>
                                                                <div class="row">
                                                                    <!-- ALAMAT PENGIRIM -->
                                                                    <div class="col-sm-6">
                                                                        <div class="card card-address-order">
                                                                            <div class="card-header">
                                                                                <strong>Alamat Pengirim</strong>   
                                                                            </div>
                                                                            <div class="card-body">
                                                                                <p class='card-text'>{{dataTransaction.name_bill}}|{{dataTransaction.phonenumber_bill}}</p>
                                                                                <p class='card-text'>{{dataTransaction.address_bill}}</p>
                                                                                <p class='card-text'>{{dataTransaction.city_bill}} {{dataTransaction.province_bill}} {{dataTransaction.postalcode_bill}}</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- END ALAMAT PENGIRIM -->
                            
                                                                    <!-- ALAMAT PENERIMA -->
                                                                    <div class="col-sm-6">
                                                                        <div class="card card-address-order">
                                                                            <div class="card-header">
                                                                                <strong>Alamat Penerima</strong>  
                                                                            </div> 
                                                                            <div class="card-body">
                                                                                <p class='card-text'>{{dataTransaction.name_receiver}} |{{dataTransaction.phonenumber_receiver}}</p>
                                                                                <p class='card-text'>{{dataTransaction.address_receiver}}</p>
                                                                                <p class='card-text'>{{dataTransaction.city_receiver}} {{dataTransaction.province_receiver}} {{dataTransaction.postalcode_receiver}}</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- END ALAMAT PENERIMA --> 
                                                                </div>
                                                            </section>
                                                            <div class="card card-detail-list-order mt-2">
                                                                <div class="card-header">
                                                                    <strong>Detail Pesanan</strong>
                                                                </div>
                                                                <div class="card-body">
                                                                    <table class="table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th scope="col">Gambar</th>  
                                                                                <th scope="col">Barang</th>
                                                                                <th scope="col">Kuantiti</th>
                                                                                <th scope="col">Harga</th>
                                                                                <th scope="col">Subtotal</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr v-for="transactionDetail in transactionDetails" :key="transactionDetail.id">
                                                                                <td><img :src="transactionDetail.photo" width="100" height="100" alt="item"></td>
                                                                                <td>{{transactionDetail.name}}</td>
                                                                                <td>{{parseFloat(transactionDetail.qty)}}</td>
                                                                                <td>Rp.{{formatPrice(transactionDetail.totalprice)}}</td>
                                                                                <td>Rp.{{formatPrice(transactionDetail.total)}}</td>       
                                                                            </tr>
                                                                            <tr class="noBorder">
                                                                                <td colspan="4" style="text-align:right;"><b lass="fw-bold">SUBTOTAL</b></td>
                                                                                <td><b lass="fw-bold">Rp.{{formatPrice(subtotal)}}</b></td>
                                                                            </tr>
                                                                            <tr class="noBorder">
                                                                                <td colspan="4" style="text-align:right;"><b lass="fw-bold">PAJAK(10%)</b></td>
                                                                                <td><b class="fw-bold">Rp.{{formatPrice(totalPajak)}}</b></td>
                                                                            </tr>
                                                                            <tr class="noBorder">
                                                                                <td colspan="4" style="text-align:right;"><b lass="fw-bold">KURIR</b></td>
                                                                                <td><b class="fw-bold">{{dataTransaction.shipping_name}}-{{dataTransaction.shipping_type}}(Rp.{{formatPrice(ongkir)}})</b></td>
                                                                            </tr>
                                                                            <tr class="noBorder">
                                                                                <td colspan="4" style="text-align:right;"><b lass="fw-bold">TOTAL</b></td>
                                                                                <td><b class="fw-bold">Rp.{{formatPrice(total)}}</b></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-danger btn-sm me-1" @click="setStatusOrderFromModal(dataTransaction.id_transaction,'BATAL')" :disabled="setDisabled(dataTransaction.transaction_status,'BATAL')">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                                                    <path d="M1.293 1.293a1 1 0 0 1 1.414 0L8 6.586l5.293-5.293a1 1 0 1 1 1.414 1.414L9.414 8l5.293 5.293a1 1 0 0 1-1.414 1.414L8 9.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L6.586 8 1.293 2.707a1 1 0 0 1 0-1.414z"/>
                                                                </svg> Batal
                                                            </button>
                                                            <button class="btn btn-success btn-sm me-1" @click="setStatusOrderFromModal(dataTransaction.id_transaction,'SELESAI')" :disabled="setDisabled(dataTransaction.transaction_status,'SELESAI')">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                                                    <path d="M13.485 1.431a1.473 1.473 0 0 1 2.104 2.062l-7.84 9.801a1.473 1.473 0 0 1-2.12.04L.431 8.138a1.473 1.473 0 0 1 2.084-2.083l4.111 4.112 6.82-8.69a.486.486 0 0 1 .04-.045z"/>
                                                                </svg> Selesai
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </transition>
                                </div>
                                <!-- END ADD ALAMAT TAGIHAN -->
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
    import Sliderbar from '@/components/Sliderbar.vue';
    import Footer from '@/components/Footer.vue';
    import axios from "axios";

    export default{
        name:"Listorder",
        components:{
            Header,
            Sliderbar,
            Footer
        },
        data(){
            return {
                transactions:[],
                viewTransactionDetailModal: false,
                transactionDetails:[],
                ongkir:0,
                dataTransaction:{
                    id_transaction:0,
                    code_transaction:'',
                    name_receiver:'',
                    address_receiver:'',
                    city_receiver:'',
                    province_receiver:'',
                    postalcode_receiver:'',
                    phonenumber_receiver:'',
                    name_bill:'',
                    address_bill:'',
                    city_bill:'',
                    province_bill:'',
                    postalcode_bill:'',
                    phonenumber_bill:'',
                    shipping_name:'',
                    shipping_type:'',
                    transaction_status:''
                },
                pagination:[],
                currentPage:1,
                datasearch:'',
                search:false
            };
        },
        methods:{
            getViewTransactionDetail(idTransaction){
                 this.transactionDetails.splice(0);
                for(let i = 0; i<this.transactions.length;i++){
                    for(let j=0;j<this.transactions[i].transaction_item.length;j++){
                        if(this.transactions[i].transaction_item[j].id_transaction==idTransaction)
                            this.transactionDetails.push(this.transactions[i].transaction_item[j]);
                    }    
                }
            },
            getDataTransaction(id_transaction,code_transaction,name_receiver,address_receiver,city_receiver,province_receiver,
                    postalcode_receiver,phonenumber_receiver,name_bill,
                    address_bill,city_bill,province_bill,postalcode_bill,phonenumber_bill,shipping_name,shipping_type,shipping_price,transaction_status){
                this.dataTransaction.id_transaction = id_transaction;
                this.dataTransaction.code_transaction = code_transaction;
                this.ongkir = shipping_price;
                this.dataTransaction.name_receiver = name_receiver;
                this.dataTransaction.address_receiver = address_receiver;
                this.dataTransaction.city_receiver = city_receiver;
                this.dataTransaction.province_receiver = province_receiver;
                this.dataTransaction.postalcode_receiver = postalcode_receiver;
                this.dataTransaction.phonenumber_receiver = phonenumber_receiver;
                this.dataTransaction.name_bill = name_bill;
                this.dataTransaction.address_bill = address_bill;
                this.dataTransaction.city_bill = city_bill;
                this.dataTransaction.province_bil = province_bill;
                this.dataTransaction.postalcode_bill = postalcode_bill;
                this.dataTransaction.phonenumber_bill = phonenumber_bill;
                this.dataTransaction.shipping_name = shipping_name.toUpperCase();
                this.dataTransaction.shipping_type = shipping_type;
                this.dataTransaction.transaction_status = transaction_status;
            },
            getPagination(pageNumber){
                let customer = JSON.parse(localStorage.getItem('customer'));
                if(this.search==false){
                    axios
                    .get("http://127.0.0.1:8000/api/transaction/customer/"+customer.id,{
                        params:{
                            page:pageNumber
                        }
                    })
                    .then(res=>{
                        let datatransaction = res.data.data.data;
                        this.pagination = res.data.data;
                        this.currentPage = this.pagination['current_page'];
                        console.log(this.pagination);
                        this.transactions = datatransaction.map(function(item){
                            return item
                        });
                    })
                    .catch(err=>console.log(err));
                }
                else{
                    axios
                    .get("http://127.0.0.1:8000/api/transaction/cari/customer/"+customer.id,{
                        params:{
                            cari:this.datasearch,
                            page:pageNumber
                        }
                    })
                    .then(res=>{
                        let datatransaction = res.data.data.data;
                        this.pagination = res.data.data;
                        this.currentPage = this.pagination['current_page'];
                        console.log(this.pagination);
                        this.transactions = datatransaction.map(function(item){
                            return item
                        });
                    })
                    .catch(err=>console.log(err));
                }
                
            },
            nextPage(pageNext){
                if(pageNext!=null){
                    console.log(pageNext);
                    axios
                    .get(pageNext,{params:{
                            cari:this.datasearch
                        }})
                    .then(res=>{
                        let datatransaction = res.data.data.data;
                        this.pagination = res.data.data;
                        this.transactions = datatransaction.map(function(item){
                            return item
                        });
                    })
                    .catch(err=>console.log(err));
                } 
            },
            previousPage(pagePrevious){
                if(pagePrevious!=null){
                    axios
                    .get(pagePrevious,{params:{
                            cari:this.datasearch
                        }})
                    .then(res=>{
                        let datatransaction = res.data.data.data;
                        this.pagination = res.data.data;
                        this.transactions = datatransaction.map(function(item){
                            return item
                        });
                    })
                    .catch(err=>console.log(err));
                } 
            },
            firstPage(pageFirst){
                if(pageFirst!=null){
                    axios
                    .get(pageFirst,{params:{
                        cari:this.datasearch
                    }})
                    .then(res=>{
                        let datatransaction = res.data.data.data;
                        this.pagination = res.data.data;
                        this.transactions = datatransaction.map(function(item){
                            return item
                        });
                    })
                    .catch(err=>console.log(err));
                } 
            },
            lastPage(pageLast){
                if(pageLast!=null){
                    axios
                    .get(pageLast,{params:{
                            cari:this.datasearch
                    }})
                    .then(res=>{
                        let datatransaction = res.data.data.data;
                        this.pagination = res.data.data;
                        this.transactions = datatransaction.map(function(item){
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
                    .get("http://127.0.0.1:8000/api/transaction/cari/customer/"+customer.id,{
                        params:{
                            cari: datasearch
                        }
                    })
                    .then(res=>{
                        console.log(res.data.data.data);
                        this.transactions = res.data.data.data;
                        this.pagination = res.data.data;
                    })
                    .catch(err=>console.log(err));
                }
            },
            setStatusOrder(idTransaction,status){
                let customer = JSON.parse(localStorage.getItem('customer'));
                axios
                .get("http://127.0.0.1:8000/api/transaction/status/"+customer.id,{
                        params:{
                            idTransaction:idTransaction,
                            status: status
                        }
                    })
                    .then(res=>{
                        console.log(res.data.data.data);
                        this.transactions = res.data.data.data;
                        this.pagination = res.data.data;
                    })
                    .catch(err=>console.log(err));
            },
            setStatusOrderFromModal(idTransaction,status){
                let customer = JSON.parse(localStorage.getItem('customer'));
                axios
                .get("http://127.0.0.1:8000/api/transaction/status/"+customer.id,{
                        params:{
                            idTransaction:idTransaction,
                            status: status
                        }
                    })
                    .then(res=>{
                        console.log(res.data.data.data);
                        this.transactions = res.data.data.data;
                        this.pagination = res.data.data;
                        this.viewTransactionDetailModal = false;
                    })
                    .catch(err=>console.log(err));
            },
            setDisabled(status,button){
                console.log(status+" "+button)
                if(status=='BELUM BAYAR' && button=='BATAL'){
                    return false;
                }
                
                if(status=='DIKIRIM' && button=='SELESAI'){
                        return false;
                }
                return true;
            },
            formatPrice(value) {
                let val = (value/1).toFixed(2).replace('.', ',')
                return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
            }
        },
        mounted(){
            let customer = JSON.parse(localStorage.getItem('customer'));
             axios
            .get("http://127.0.0.1:8000/api/transaction/customer/"+customer.id)
            .then(res=>{
                let datatransaction = res.data.data.data;
                this.pagination = res.data.data;
                this.transactions = datatransaction.map(function(item){
                    return item
                });
            })
            .catch(err=>console.log(err));

        },
        computed:{
            subtotal(){
                return this.transactionDetails.reduce(function(item,data){
                    return item+parseFloat(data.total);
                },0);
            },
            totalPajak(){
                return (this.subtotal*10)/100;
            },
            total(){
                return this.subtotal+this.totalPajak+parseFloat(this.ongkir);
            }
        }
    }
    
</script>
