<template>
    <div>
        <Header/>
        <div class="container-product">
           <div class="container-fluid mt-3">
                <div class="row">
                    <div class="col-sm-8 offset-sm-2">
                        <h5 class="title-page pt-5 text-start">Produk</h5>
                        <nav class="breadcrumb-nav" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <p>Produk</p>
                                <li class="breadcrumb-item active"><router-link to="/">Home</router-link></li>
                                <li class="breadcrumb-item" aria-current="page">Produk</li>
                            </ol>
                        </nav>
                        <div class="card card-all-product">
                            <div class="card-header text-start">
                                <div class="row">
                                    <div class="col-sm-9">
                                        <strong> Produk</strong>
                                    </div>
                                    <div class="col-sm-3">
                                       <div class="input-group mt-1">
                                            <input type="text" class="form-control search" name="cari" placeholder="Search" aria-label="Search" v-model="datasearch">
                                            <button class="btn btn-outline-light" type="button" id="inputGroupFileAddon03" @click="getDataSearch(datasearch)">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="card-body">
                                <div class="row row-cols-1 row-cols-md-5 g-4" >
                                    <a class="card-text" href="#" v-for="itemProduct in products" :key="itemProduct.id">
                                        <router-link  v-bind:to="'/produk/tipe/'+itemProduct.id+'/'+itemProduct.name">
                                            <div class="col">
                                                <div class="card card-product" >
                                                    <img :src="itemProduct.cover" width="100px" height="200px" class="card-img-top" alt="cover">
                                                    <div class="card-body">
                                                         <h5 class="card-title">{{itemProduct.name}} ({{itemProduct.jumlah}})</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </router-link>
                                    </a>
                                </div>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="pb-0">
            <Footer/>
        </div>
        
    </div>
    
</template>
<script>
    import Header from '@/components/Header.vue';
    import Footer from '@/components/Footer.vue';
    import axios from "axios";
    export default{
        name: 'Product',
        components: {
            Header,
            Footer
        },
        data(){
            return {
                products:[],
                pagination:[],
                datasearch:'',
                search:false
            };
        },
        methods:{
              getPagination(pageNumber){
                if(this.aearch==false){
                     axios
                    .get("http://127.0.0.1:8000/api/produk/tipe?page="+pageNumber)
                    .then(res=>{
                        let dataProduct = res.data.data.data;
                        this.pagination = res.data.data;
                        this.currentPage = this.pagination['current_page'];
                        console.log(this.pagination);
                        this.transactions = dataProduct.map(function(item){
                            return item
                        });
                    })
                    .catch(err=>console.log(err));
                }
                else{
                    axios
                    .get("http://127.0.0.1:8000/api/produk/tipe/cari",{
                        params:{
                            cari:this.datasearch,
                            page:pageNumber
                        }
                    })
                    .then(res=>{
                        let dataProduct = res.data.data.data;
                        this.pagination = res.data.data;
                        this.currentPage = this.pagination['current_page'];
                        console.log(this.pagination);
                        this.transactions = dataProduct.map(function(item){
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
                            cari:this.datasearch
                        }
                    })
                    .then(res=>{
                        let dataProduct = res.data.data.data;
                        this.pagination = res.data.data;
                        this.transactions = dataProduct.map(function(item){
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
                            cari:this.datasearch
                        }
                    })
                    .then(res=>{
                        let dataProduct = res.data.data.data;
                        this.pagination = res.data.data;
                        this.transactions = dataProduct.map(function(item){
                            return item
                        });
                    })
                    .catch(err=>console.log(err));
                } 
            },
            firstPage(pageFirst){
                if(pageFirst!=null){
                    axios
                    .get(pageFirst,{
                        params:{
                            cari:this.datasearch
                        }
                    })
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
                    .get(pageLast,{
                        params:{
                            cari:this.datasearch
                        }
                    })
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
                this.search  = true;
                if(datasearch!=null || datasearch!=""){
                    
                    axios
                    .get("http://127.0.0.1:8000/api/produk/tipe/cari",{
                        params:{
                            cari: datasearch
                        }
                    })
                    .then(res=>{
                        console.log(res.data.data.data);
                        this.products = res.data.data.data;
                        this.pagination = res.data.data;
                    })
                    .catch(err=>console.log(err));
                } 
            }
        },
        mounted(){
            axios
            .get("http://127.0.0.1:8000/api/produk/tipe")
            .then(res=>{
                this.products=res.data.data.data;
                this.pagination = res.data.data;
            })
            .catch(err=>console.log(err));

            if(localStorage.getItem('products')){
                try{
                    this.products = JSON.parse(localStorage.getItem('products'));
                }catch(e){
                    localStorage.removeItem('products');
                }
            }
        }
    }
</script>

<style scoped>
    .title-page{
        left: 0;
    }
    .pagination-class{
        bottom: 0;
    }
</style>
