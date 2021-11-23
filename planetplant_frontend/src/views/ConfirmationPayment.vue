<template>
    <div>
        <Header/>
        <div class="container-product">
            <div class="container-fluid mt-3">
                <div class="row">
                    <div class="col-sm-8 offset-sm-2">
                        <h5 class="title-page pt-5 text-start">Bukti Pembayaran</h5>
                        <nav class="breadcrumb-nav" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <p>Bukti Pembayaran</p>
                                <li class="breadcrumb-item active"><a href="#">Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Bukti Pembayaran</li>
                            </ol>
                        </nav>
                        <div class="card card-all-product">
                            <div class="card-header">
                                <strong>Bukti Pembayaran</strong>
                            </div>
                            <div class="card-body">
                                <form class="mt-3 text-start">    
                                    <div class="col-sm-7 offset-sm-2">
                                        <div class="mb-3">
                                            <label for="idadmin" class="form-label text-area">Nama</label>
                                            <input type="text" class="form-control" name="name" placeholder="Masukkan Nama" v-model="dataConfirmationPayment.name">
                                            <span v-if="allerros.name" :class="['label text-danger']">{{ allerros.name[0] }}</span>
                                        </div>
                                        <div class="mb-3">
                                            <label for="price" class="form-label text-area">Kode Invoice</label>
                                            <select class="form-select" name="invoice-code" v-model="selectedTransaction" @change="getTotalBill(selectedTransaction)">
                                                <option value="" selected>-- Pilih Salah Satu --</option>
                                                <option :value="{id:transaction.id,bill:transaction.transaction_total}" v-for="transaction in transactions" :key="transaction.id">{{transaction.code}}-{{transaction.SenderName}}</option> 
                                            </select>
                                            <span v-if="allerros.id_transaction" class="text-danger">{{allerros.id_transaction[0]}}</span>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label for="price" class="form-label">Jumlah yang dibayar</label>
                                                    <input type="number" class="form-control" name="totaltransfer" id="priceInput" placeholder="Masukkan Jumlah Transfer" v-model="dataConfirmationPayment.payment">
                                                    <span v-if="allerros.payment" class="text-danger">{{allerros.payment[0]}}</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                               <p id="tagihan" style="margin-top:40px;"><b class="fw-bold">Tagihan:Rp.{{total_bill}}</b></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label for="price" class="form-label">Tanggal Pembayaran</label>
                                                    <input type="date" class="form-control" name="transferdate" id="priceInput" placeholder="Masukkan Tanggal Transfer" v-model="dataConfirmationPayment.transfer_date">
                                                    <span v-if="allerros.transfer_date" class="text-danger">{{allerros.transfer_date[0]}}</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label for="nama" class="form-label">Tipe Pembayaran</label>
                                                    <select class="form-select" name="payment-type" v-model="dataConfirmationPayment.payment_type">
                                                        <option value="" selected>-- Pilih Salah Satu --</option>
                                                        <option :value="paymenttype.id" v-for="paymenttype in payment_types" :key="paymenttype.id">{{paymenttype.type}}</option>
                                                    </select>
                                                    <span v-if="allerros.id_payment_type" class="text-danger">{{allerros.id_payment_type[0]}}</span>
                                                </div>
                                            </div>
                                        </div>
                    
                                        <div class="mb-3">
                                            <label for="price" class="form-label">Bukti Transfer</label>
                                            <input type="file" class="form-control" id="inputGroupFile02" name="photo" @change="selectedFile">
                                            <p>File yang diupload maksimal 2MB</p>
                                            <span v-if="allerros.slip_transfer" class="text-danger">{{allerros.slip_transfer[0]}}</span>
                                        </div>
                                        <div class="mb-3">
                                            <label for="price" class="form-label">Catatan</label>
                                            <textarea class="form-control" name="note" placeholder="Masukkan Catatan" height="100" v-model="dataConfirmationPayment.notes"></textarea>
                                        </div>
                                        <button type="button" class="btn btn-success" @click="saveDataConfirmationPayment()">Simpan</button>                            
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
        name:'ConfirmationPaymant',
        components:{
             Header, Footer
        },
        data(){
            return{
                dataConfirmationPayment:{
                    name:'',
                    payment:0,
                    transfer_date:'',
                    payment_type:'',
                    notes:''
                },
                transactions:[],
                payment_types:[],
                dataConfirmationPayments:[],
                allerros: [],
                success : false,
                total_bill:0,
                selectedTransaction:'',
                slip_transfer:''
            }
        },
        methods:{
            selectedFile(e){
                this.slip_transfer = e.target.files[0];
            },
            saveDataConfirmationPayment(){
                let data = new FormData();
                data.append('name', this.dataConfirmationPayment.name);
                data.append('id_transaction',(this.selectedTransaction==null||this.selectedTransaction=='' ? '' :this.selectedTransaction.id));
                data.append('payment', this.dataConfirmationPayment.payment);
                data.append('transaction_total', this.total_bill);
                data.append('id_payment_type',this.dataConfirmationPayment.payment_type);
                data.append('transfer_date',this.dataConfirmationPayment.transfer_date);
                data.append('slip_transfer',this.slip_transfer);
                data.append('notes',this.dataConfirmationPayment.notes);

                axios
                    .post("http://127.0.0.1:8000/api/confirmationpayment/add",data,{
                    headers: {
                        'Content-Type': "multipart/form-data; charset=utf-8; boundary=" + Math.random().toString().substr(2)
                    }})
                    .then((res)=>{
                        if(res.data.meta.code==200){
                            return this.$router.push({ name: 'Home'})
                        }
                    })
                    .catch((error) => {
                        console.log(error.response.data.errors);
                        if(error.response.status==422){
                            this.allerros = error.response.data.errors;
                        }
                    });
            },
            getTotalBill(transaction){
                this.total_bill = transaction.bill;
            }
        },
        mounted(){
            axios
            .get("http://127.0.0.1:8000/api/transaction")
            .then(res=>{this.transactions=res.data.data})
            .catch(err=>console.log(err));

            axios
            .get("http://127.0.0.1:8000/api/paymenttype")
            .then(res=>{this.payment_types=res.data.data})
            .catch(err=>console.log(err));
        }
       
    }
</script>
