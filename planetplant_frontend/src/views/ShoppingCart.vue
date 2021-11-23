<template>
    <div>
        <Header/>
            <div class="container-product">
                <div class="container-fluid mt-3">
                    <div class="row">
                        <div class="col-sm-8 offset-sm-2">
                            <h5 class="title-page pt-5 text-start">Keranjang Belanja</h5>
                            <nav class="breadcrumb-nav" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <p>Keranjang Belanja</p>
                                    <li class="breadcrumb-item active"><router-link to="/">Home</router-link></li>
                                    <li class="breadcrumb-item" aria-current="page">Keranjang Belanja</li>
                                </ol>
                            </nav>
                            <div class="card card-all-product">
                                <div class="card-header text-start">
                                    <strong>Keranjang Belanja</strong>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Gambar</th>
                                                        <th scope="col">Barang</th>
                                                        <th scope="col">Harga</th>
                                                        <th scope="col">Qty</th>
                                                        <th scope="col">Subtotal</th>
                                                        <th scope="col"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="keranjang in keranjangUser" :key="keranjang.id"> 
                                                        <td><img :src="keranjang.photo" width="100px" height="100px" alt="gambar"></td>
                                                        <td>{{keranjang.name}}</td>
                                                        <td>Rp {{formatPrice(keranjang.totalprice)}}</td>
                                                        <td> {{keranjang.qty}}</td>
                                                        <td>Rp {{formatPrice(keranjang.totalprice * keranjang.qty)}}</td>
                                                        <td>
                                                            <a class="btn btn-danger sm" data-bs-toggle="modal" href="#" @click="removeItem(keranjang.id)">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                                                </svg>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </tbody>     
                                            </table>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="card card-total-cart">
                                                <div class="card-body">
                                                    <h5 class="card-title"> TOTAL KERANJANG BELANJA</h5>
                                                    <div class="mt-4 row">
                                                        <div class="col-sm-6 text-start">
                                                            <p>SUBTOTAL</p>
                                                        </div>
                                                        <div class="col-sm-6 text-start">
                                                            <p>Rp {{formatPrice(subtotal)}}</p>
                                                        </div>
                                                    </div>
                                                    <hr/>
                                                    <div class="mb-2 row">
                                                        <div class="col-sm-6 text-start">
                                                            <p class="fw-bold">TOTAL</p>
                                                        </div>
                                                        <div class="col-sm-6 text-start">
                                                            <p>Rp {{formatPrice(total)}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <router-link to="/produk" class="btn btn-success ms-5" style="width:250px;"> Kembali Belanja </router-link>
                                                    </div>
                                                    <div class="mb-2 row">
                                                        <router-link to="/checkout" class="btn btn-success ms-5" style="width:250px;"> Checkout </router-link>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
    import Header from '@/components/Header.vue';
    import Footer from '@/components/Footer.vue';
    // import axios from "axios";


    export default{
        name: 'ShoppingCart',
        components: {
            Header,
            Footer
        },
        data(){
            return {
                keranjangUser:[],
                updateCart:{
                    id:0,
                    qty:0
                }
            };
        },
        methods:{
            removeItem(idx){
                //cari tahu id dr si item yang akan dihapus
                let keranjangUserStorage = JSON.parse(localStorage.getItem("keranjangUser"));
                let itemKeranjangUserStorage = keranjangUserStorage.map(itemKeranjangUserStorage=>itemKeranjangUserStorage.id);

                //cocokan idx item dengan id yang ada di storage
                let index = itemKeranjangUserStorage.findIndex(id=> id==idx);
                this.keranjangUser.splice(index,1);

                const parsed = JSON.stringify(this.keranjangUser);
                localStorage.setItem('keranjangUser',parsed);
                window.location.reload();
            },
            formatPrice(value) {
                let val = (value/1).toFixed(2).replace('.', ',')
                return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
            }
        },
        mounted(){
            if(localStorage.getItem('keranjangUser')){
                try{
                    this.keranjangUser = JSON.parse(localStorage.getItem('keranjangUser'));
                    if(this.keranjangUser.length==0)
                    return this.$router.push({ name: 'ShoppingCartEmpty'});
                }catch(e){
                    localStorage.removeItem('keranjangUser');
                }
            }
            else{
                 return this.$router.push({ name: 'ShoppingCartEmpty'});
            }
        },

        computed:{
            subtotal(){
                return this.keranjangUser.reduce(function(item,data){
                    return item+(data.totalprice*data.qty);
                },0);
            },
            totalPajak(){
                return (this.subtotal*10)/100;
            },
            total(){
                return this.subtotal+this.totalPajak;
            }
        }
    }
</script>
