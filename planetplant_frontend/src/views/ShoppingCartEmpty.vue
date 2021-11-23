<template>
    <div>
        <Header/>
        <div class="content">
            <div class="container-product">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-8 offset-sm-2">
                            <h5 class="title-page pt-5 text-start">Keranjang Belanja</h5>
                            <nav class="breadcrumb-nav" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <p>Keranjang Belanja</p>
                                    <li class="breadcrumb-item" aria-current="page">Keranjang Belanja</li>
                                </ol>
                            </nav>
                            <div class="card card-all-product">
                                <div class="card-header text-start">
                                    <strong>Keranjang Belanja</strong>
                                </div>
                                <div class="card-body">
                                    <div class="text-center pt-5">
                                        <img src = "/img_application/keranjangkosong.png" alt="keranjangkosong"/>
                                        <h6 class="title-page pt-3">KERANJANG BELANJA ANDA MASIH KOSONG</h6>
                                        <p>Yuk telusuri produk menarik di Planet Plant!</p>
                                        <router-link to="/produk" class="btn btn-success ms-5" style="width:250px;"> Kembali Belanja </router-link>
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
        name: 'ShoppingCartEmpty',
        components: {
            Header,
            Footer
        }
        // data(){
        //     return {
        //         products:[],
        //         type:this.$route.params.name
        //     };
        // },
        // // mounted(){
        //     axios
        //     .get("http://127.0.0.1:8000/api/produk",{
        //         params:{
        //             type: this.$route.params.id
        //         }
        //     })
        //     .then(res=>{this.products=res.data.data.data})
        //     .catch(err=>console.log(err));

        //     if(localStorage.getItem('products')){
        //         try{
        //             this.products = JSON.parse(localStorage.getItem('products'));
        //         }catch(e){
        //             localStorage.removeItem('products');
        //         }
        //     }
        // }
    }
</script>
