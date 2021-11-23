<template>
     <section class="produk">
        <div class="card card-home">
            <div class="card-header card-header-home fw-bold text-center" style="font-size:16pt;">
                <strong>Produk Terbaru</strong>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 mt-1" v-if="products.length>0">
                            <carousel class="product-slider" :item="3" :nav="false" :dots="false" :autoplay="true">
                                <div class="product-item" v-for="itemProduct in products" :key="itemProduct.id">
                                    <div class="pi-pic">
                                        <img :src="itemProduct.photo" alt="" width="50px" height="300px"/>
                                        <ul>
                                            <li class="w-icon active" @click="addToCart(itemProduct.id,itemProduct.name,itemProduct.photo,itemProduct.price,itemProduct.discount,itemProduct.totalprice,1)">
                                                <a  href="#">
                                                   <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bag" viewBox="0 0 20 20">
                                                        <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                                                    </svg>
                                                </a>
                                            </li>
                                            <li class="quick-view"><router-link v-bind:to="'/produk/'+itemProduct.id">Detail Produk</router-link></li>
                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                        <div class="catagory-name">{{itemProduct.typeItem}}</div>
                                        <router-link v-bind:to="'/produk/'+itemProduct.id">
                                            <h5>{{itemProduct.name}}</h5>
                                        </router-link>
                                        <div class="product-price">
                                            Rp.{{formatPrice(itemProduct.totalprice)}}
                                            <span v-if="itemProduct.discount>0">Rp.{{formatPrice(itemProduct.price)}}</span>
                                        </div>
                                    </div>
                                </div>
                            </carousel>
                            <div class="d-grid gap-2 col-4 mx-auto mt-2">
                                <router-link to="/produk" class="btn btn-success"> Produk Lain</router-link>
                            </div>
                        </div>

                        <div class="col-lg-12" v-else>
                            <p>Produk terbaru belum tersedia untuk saat ini.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import carousel from 'vue-owl-carousel';
    import axios from "axios";

    export default {
        name:"NewProduct",
        components:{
            carousel
        },
        data(){
            return {
                products:[],
                keranjangUser:[]
            };
        },
        mounted(){
            axios
            .get("http://127.0.0.1:8000/api/produk/new")
            .then(res=>{this.products=res.data.data})
            .catch(err=>console.log(err));

            if(localStorage.getItem('keranjangUser')){
                try{
                    this.keranjangUser = JSON.parse(localStorage.getItem('keranjangUser'));
                }catch(e){
                    localStorage.removeItem('keranjangUser');
                }
            }
        },
        methods:{
            addToCart(idProduct,nameProduct,photoProduct,priceProduct,discount,totalPriceProduct,qty){
                if(localStorage.getItem("loggedIn")){
                    var productStored={
                    "id":idProduct,
                    "name":nameProduct,
                    "price":parseFloat(priceProduct),
                    "discount":discount,
                    "totalprice":parseFloat(totalPriceProduct),
                    "photo":photoProduct,
                    "qty": qty
                    }
                    this.keranjangUser.push(productStored);
                    const parsed = JSON.stringify(this.keranjangUser);
                    localStorage.setItem('keranjangUser',parsed);
                    window.location.reload();
                }
                else{
                    this.$router.push({ name: 'Login'});
                }
               
            },
            formatPrice(value) {
                let val = (value/1).toFixed(2).replace('.', ',')
                return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
            }
        }
    }
</script>

<style scoped>
    .product-item{
        margin: 25px;
    }

    i{
        width:50px;
        height:50px;
    }

    .product-item .quick-view{
        background-color: greenyellow;
    }

</style>