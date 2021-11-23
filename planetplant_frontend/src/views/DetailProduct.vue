<template>
    <div>
        <Header/>
        <div class="container-product">
           <div class="container-fluid mt-3">
                <div class="row">
                    <div class="col-sm-8 offset-sm-2">
                        <h5 class="title-page pt-5 text-start">Detail Produk</h5>
                         <nav class="breadcrumb-nav" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <p>Detail Produk</p>
                                <li class="breadcrumb-item active"><router-link to="/produk">Produk</router-link></li>
                                <li class="breadcrumb-item" aria-current="page">Detail Produk</li>
                            </ol>
                        </nav>
                        <div class="card card-all-product">
                              <div class="card-header text-start">
                                <strong>Detail Produk</strong>
                            </div>
                            <div class="card-body mt-3">
                                <form>
                                    <div class="row g-0">
                                        <div class="col-sm-4">
                                            <img :src="productDetails.photo" width="250px" height="300px" alt="item">
                                        </div>
                                        <div class="col-sm-6">
                                            <h5 class="card-title title-detail-product">{{productDetails.name}}</h5>
                                            <div class="mb-2 row">
                                                <label for="staticEmail" class="col-sm-3 col-form-label text-start">Harga</label>
                                                <div class="col-sm-8">
                                                    <p class="mt-2 text-start" v-if="productDetails.discount>0"><s class="text-decoration-line-through">Rp.{{formatPrice(productDetails.price)}}</s> Rp.{{formatPrice(productDetails.totalprice)}}  <span class="badge bagde-discount-product-detail">Discount {{parseFloat(productDetails.discount)}}%</span></p>
                                                    <p class="mt-2 text-start" v-else>Rp.{{formatPrice(productDetails.totalprice)}}</p>
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="staticEmail" class="col-sm-3 col-form-label text-start">Kategori</label>
                                                <div class="col-sm-6">
                                                    <p class="mt-2 text-start">{{productDetails.tipeItem}}</p>
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="staticEmail" class="col-sm-3 col-form-label text-start">Deskripsi</label>
                                                <div class="col-sm-8">
                                                    <p class="text-start">{{productDetails.description}}</p>
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="staticEmail" class="col-sm-3 col-form-label text-start">Stok</label>
                                                <div class="col-sm-6">
                                                    <p class="mt-2 text-start">{{productDetails.qty}}</p>
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="staticEmail" class="col-sm-3 col-form-label fw-bold text-start">Kuantiti</label>
                                                <div class="col-sm-6">
                                                    <div class="input-group mb-6">
                                                        <button class="btn btn-success" type="button" id="button-addon2" @click="countProduct(1,productDetails.qty)">-</button>
                                                        <input type="number" class="form-control" name="qty" id="qty" aria-describedby="button-addon2" v-model="cartCustomer.qty">
                                                        <button class="btn btn-success" type="button" id="button-addon2" @click="countProduct(2,productDetails.qty)">+</button>
                                                    </div>
                                                      <span v-if="errmessage!=null" class="text-danger">{{errmessage}}</span>
                                                </div>
                                            </div>
                                            <div class="mt-5 row">
                                                <a href="#" class="btn btn-add-cart" name="action" value="addcart" @click="addToCart(productDetails.id,productDetails.name,productDetails.photo,productDetails.price,productDetails.discount,productDetails.totalprice,cartCustomer.qty)">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart-plus-fill" viewBox="0 0 16 16">
                                                        <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z"/>
                                                    </svg> Masukkan Keranjang</a>
                                                <button type="button" class="btn btn-buy ms-3" name="action" value="buy" @click="buyNow(productDetails.id,productDetails.name,productDetails.photo,productDetails.price,productDetails.discount,productDetails.totalprice,cartCustomer.qty)">Beli Sekarang</button>
                                            </div>
                                        </div>
                                    </div>        
                                </form>
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
        name: 'DetailProduct',
        components: {
            Header,
            Footer
        },
        data(){
            return {
                productDetails:[],
                keranjangUser:[],
                cartCustomer:{
                    id:this.$route.params.id,
                    qty:0
                },
                errmessage:''
            };
        },
        methods:{
            setDataProduct(data){
                this.productDetails = data;
            },
            countProduct(chose,qtyTotal){
                if(chose==1){
                    if(this.cartCustomer.qty>0)
                        this.cartCustomer.qty = this.cartCustomer.qty-1;
                }
                if(chose==2){
                    if(this.cartCustomer.qty<qtyTotal)
                    this.cartCustomer.qty=this.cartCustomer.qty+1;
                }
            },
            addToCart(idProduct,nameProduct,photoProduct,priceProduct,discount,totalPriceProduct,qty){
                if(localStorage.getItem("loggedIn")){
                    if(qty>0){
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
                        this.$swal('SUKSES', 'Barang anda sudah ditambah ke keranjang.', 'OK');
                        window.location.reload();
                    }
                   else{
                       this.errmessage = "Jumlah yang dibeli harus lebih dari 0";
                   }
                   
                }
                else{
                    this.$router.push({ name: 'Login'});
                }
               
            },
            buyNow(idProduct,nameProduct,photoProduct,priceProduct,discount,totalPriceProduct,qty){
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
                     this.$router.push({ name:'ShoppingCart'});
                }
                else{
                    this.$router.push({ name: 'Login'});
                } 
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
                }catch(e){
                    localStorage.removeItem('keranjangBelanja');
                }
            }

            axios
            .get("http://127.0.0.1:8000/api/produk",{
                params:{
                    id: this.$route.params.id
                }
            })
            .then(res=>{this.setDataProduct(res.data.data)})
            .catch(err=>console.log(err));
        }
    }
</script>

<style scoped>
    .title-page{
        left: 0;
    }
</style>


