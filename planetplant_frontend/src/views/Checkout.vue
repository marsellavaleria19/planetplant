<template>
    <div>
        <Header/>
            <div class="container-product">
                <div class="container-fluid mt-3">
                    <div class="row">
                        <div class="col-sm-8 offset-sm-2">
                            <h5 class="title-page pt-5 text-start">Checkout</h5>
                            <nav class="breadcrumb-nav" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <p>Checkout</p>
                                    <li class="breadcrumb-item active"><router-link to="/shoppingcart">Keranjang Belanja</router-link></li>
                                    <li class="breadcrumb-item" aria-current="page">Checkout</li>
                                </ol>
                            </nav>
                            <div class="card card-all-product">
                                <div class="card-header text-start">
                                    <strong>Checkout</strong>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- LIST ALAMAT PENGIRIM -->
                                                <div class="card card-address">
                                                    <div class="card-header text-start">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <strong>Pengirim</strong>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                                    <a class="btn btn-outline-light me-md-2" type="button" href="#" data-bs-toggle="modal"  @click="addAddressBillModal=true; addDataBill();">Tambah Data</a>
                                                                </div>
                                                            </div>
                                                        </div>   
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row mb-3">
                                                            <label for="inputEmail3" class="col-sm-4 col-form-label label-required">Alamat Pengirim</label>
                                                            <div class="col-sm-8">
                                                                <select id="billing_combobox" name="billing_address" class="form-select" aria-label="Default select example" v-model="selectedBill" @change="getDataReceiver(selectedBill,1)">
                                                                    <option value="" selected>--Pilih Alamat Pengirim--</option>
                                                                    <option v-for="bill in bills" :key="bill.id" :value="bill.id">{{bill.title}}</option>
                                                                </select>
                                                                <span v-if="allerros.id_billing" class="text-danger">{{allerros.id_billing[0]}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="card card-detail-address">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-sm-8">
                                                                        <h6 class="fw-bold text-start" style="color:green">Detail Alamat Pengirim:</h6>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                                            <a href="#" class="btn btn-outline-success me-md-2" id="edit_billing_button"
                                                                            data-bs-toggle="modal" data-bs-target="#edit_billing_modal" @click="editAddressBillModal=true; editDataBill()">Ubah</a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="text-start" v-if="dataBill!=''">
                                                                        <p class="card-text text-uppercase">{{dataBill.name}}|{{dataBill.phone_number}}</p>
                                                                        <p class="card-text">{{dataBill.address}}</p>
                                                                        <p>{{dataBill.type_city}} {{dataBill.city}} {{dataBill.province}} {{dataBill.postalcode}}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END LIST ALAMAT PENGIRIM -->

                                                <!-- LIST ALAMAT PENERIMA -->
                                                <div class="card card-address mt-3">
                                                    <div class="card-header text-start">
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <strong>Penerima</strong>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" name="addressCheck" value="true" id="addressCheck" v-model="differentAddress">
                                                                        <label class="form-check-label mt-1" for="flexCheckChecked" style="color:white; font-size:10pt;">Dikirim ke alamat berbeda</label>
                                                                    </div>
                                                                    <button type="button" id="add_receiver" @click="addAddressReceiverModal=true;addDataReceiver()" class="btn btn-outline-light me-md-2" data-bs-toggle="modal" :disabled="differentAddress==false">Tambah Data</button>
                                                                </div>
                                                            </div>
                                                        </div>     
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row mb-3">
                                                            <label for="inputEmail3" class="col-sm-4 col-form-label label-required">Alamat Penerima</label>
                                                            <div class="col-sm-8">
                                                                <select id="receiver_combobox" name="receiver_address" class="form-select" aria-label="Default select example" v-model="selectedReceiver" @change="getDataReceiver(selectedReceiver,2);" :disabled="differentAddress==false">
                                                                    <option value="" selected>--Pilih Alamat Penerima--</option>
                                                                    <option v-for="receiver in receivers" :key="receiver.id" :value="receiver.id">{{receiver.title}}</option>
                                                                </select>
                                                                <span v-if="allerros.id_receiver" class="text-danger">{{allerros.id_receiver[0]}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="card card-detail-address">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-sm-8">
                                                                        <h6 class="fw-bold text-start" style="color:green">Detail Alamat Penerima:</h6>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                                            <button type="button" class="btn btn-outline-success me-md-2" id="edit_billing_button"
                                                                            data-bs-toggle="modal" @click="editAddressReceiverModal=true; editDataReceiver()" :disabled="differentAddress==false">Ubah</button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="text-start" v-if="dataReceiver!=''">
                                                                        <p class="card-text text-uppercase">{{dataReceiver.name}}|{{dataReceiver.phone_number}}</p>
                                                                        <p class="card-text">{{dataReceiver.address}}</p>
                                                                        <p>{{dataReceiver.type_city}} {{dataReceiver.city}} {{dataReceiver.province}} {{dataReceiver.postalcode}}</p>
                                                                    </div>
                                                                </div>   
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END LIST ALAMAT PENERIMA -->
                                            
                                            <!-- LIST PESANAN -->
                                            <div class="col-sm-6">
                                                <div class="card card-detail-order">
                                                    <div class="card-header text-start">
                                                        <strong> Pesanan </strong>
                                                    </div>
                                                    <div class="card-body">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">Produk</th>
                                                                    <th scope="col">Harga</th>
                                                                    <th scope="col">Kuantiti</th>
                                                                    <th scope="col">Subtotal</th>     
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr v-for="keranjang in keranjangUser" :key="keranjang.id">
                                                                    <td><img :src="keranjang.photo" width="100px" height="100px" /><br>{{keranjang.name}}</td>
                                                                    <td>Rp.{{formatPrice(keranjang.price)}}</td>
                                                                    <td>{{parseFloat(keranjang.qty)}}</td>
                                                                    <td>Rp.{{formatPrice(keranjang.totalprice * keranjang.qty)}}</td>
                                                                </tr>
                                                                <tr class="noBorder text-end">
                                                                    <td colspan="2"><b class="fw-bold ">SUBTOTAL</b></td>
                                                                    <td colspan="2"><b class="fw-bold"> Rp.{{formatPrice(subtotal)}}</b> </td>
                                                                </tr>
                                                                <tr class="noBorder text-end">
                                                                    <td colspan="2"><b class="fw-bold ">PAJAK(10%)</b></td>
                                                                    <td colspan="2"><b class="fw-bold"> Rp.{{formatPrice(totalPajak)}}</b> </td>
                                                                </tr>
                                                                <tr class="noBorder text-end">
                                                                <td colspan="2" class="label-required"><b class="fw-bold">KURIR</b></td>
                                                                    <td colspan="2">
                                                                        <select id="shipping_combobox" name="shipping" class="form-select" aria-label="Default select example" v-model="selectedOngkir">
                                                                            <option value="" selected>--Pilih Kurir--</option>
                                                                            <option class="py-1" v-for="ongkir in ongkirs" :key="ongkir.id" :value="{id:ongkir.id,code:ongkir.code,service:ongkir.service,etd:ongkir.etd,cost:ongkir.cost}">{{ongkir.name}}-{{ongkir.service}}({{ongkir.etd}} hari) Rp.{{ongkir.cost}}</option>
                                                                        </select>
                                                                        <span v-if="allerros.shipping_name" class="text-danger">{{allerros.shipping_name[0]}}</span>
                                                                    </td>
                                                                </tr>
                                                                <tr class="noBorder text-end">
                                                                    <td colspan="2"><b class="fw-bold">TOTAL</b></td>
                                                                    <td colspan="2"><p id="total" class="fw-bold">Rp.{{formatPrice(total)}}</p></td>
                                                                </tr>
                                                                <tr></tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END LIST PESANAN -->

                                            <!-- MODAL ADD ALAMAT PENGIRIM -->
                                            <div v-if="addAddressBillModal">
                                                <transition name="modal">
                                                    <div class="modal-mask">
                                                        <div class="modal-wrapper">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title me-3" id="exampleModalLabel">TAMBAH ALAMAT PENGIRIM</h5>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form>           
                                                                            <div class="mb-3 text-start">
                                                                                <label for="idadmin" class="form-label label-required">Nama</label>
                                                                                <input type="text" class="form-control" name="firstname_add_billing" placeholder="Masukkan Nama" v-model="addressBill.name">
                                                                                <span v-if="allerrosbill.name" class="text-danger">{{allerrosbill.name[0]}}</span>
                                                                            </div>  
                                                                            <div class="mb-3 text-start">
                                                                                <label for="nama" class="form-label label-required">Alamat</label>
                                                                                <textarea class="form-control" name="address_add_billing" placeholder="Masukkan Alamat" v-model="addressBill.address"></textarea>
                                                                                <span v-if="allerrosbill.address" class="text-danger">{{allerrosbill.address[0]}}</span>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="col-sm-6">
                                                                                    <div class="mb-3 text-start">
                                                                                        <label for="province" class="form-label label-required">Provinsi</label>
                                                                                        <select id="province_add_billing" name="province_add_billing" class="form-select" aria-label="Default select example" v-model="selectedProvinceBill" @change="selectedCity='';getCities(selectedProvinceBill.id_province)">
                                                                                            <option value="" selected>--Pilih Provinsi--</option>
                                                                                            <option v-for="province in provinces" :key="province.province_id" :value="{id_province:province.province_id, name_province:province.province}">{{province.province}}</option>
                                                                                        </select>
                                                                                        <span v-if="allerrosbill.province" class="text-danger">{{allerrosbill.province[0]}}</span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <div class="mb-3 text-start">
                                                                                        <label for="cities" class="form-label label-required">Kota</label>
                                                                                        <select id="city_add_billing" name="city_add_billing" class="form-select" aria-label="Default select example" v-model="selectedCityBill">
                                                                                            <option value="" selected>--Pilih Kota--</option>
                                                                                            <option v-for="city in cities" :key="city.city_id" :value="{id_city:city.city_id, name_city:city.city_name, type_city:city.type}">{{city.type}} {{city.city_name}}</option>
                                                                                        </select>
                                                                                        <span v-if="allerrosbill.city" class="text-danger">{{allerrosbill.city[0]}}</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="col-6">
                                                                                <div class="mb-3 text-start">
                                                                                        <label for="price" class="form-label label-required">Nomor Telepon</label>
                                                                                        <input type="text" class="form-control" name="phonenumber_add_billing" id="priceInput" placeholder="Masukkan Nomor Telepon" v-model="addressBill.phone_number">
                                                                                        <span v-if="allerrosbill.phone_number" class="text-danger">{{allerrosbill.phone_number[0]}}</span>
                                                                                    </div>
                                                                                </div>
                                                                                                
                                                                                <div class="col-sm-6">
                                                                                    <div class="mb-3 text-start">
                                                                                        <label for="price" class="form-label label-required">Kode Pos</label>
                                                                                        <input type="text" class="form-control" name="postalcode_add_billing" id="priceInput" placeholder="Masukkan Kode Pos" v-model="addressBill.postalcode"> 
                                                                                        <span v-if="allerrosbill.postalcode" class="text-danger">{{allerrosbill.postalcode[0]}}</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            <div class="mb-3 text-start">
                                                                                <label for="price" class="form-label label-required">Referensi Alamat (ex:Alamat Rumah)</label>
                                                                                <input type="text" class="form-control" name="title_add_billing" id="priceInput" placeholder="Masukkan Referensi Alamat" v-model="addressBill.title">
                                                                                <span v-if="allerrosbill.title" class="text-danger">{{allerrosbill.title[0]}}</span>
                                                                            </div>            
                                                                        </form>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-success" id="address_add_bill_submit" @click="saveDataBill()">Simpan</button> 
                                                                        <button type="button" class="btn btn-secondary" id="add_billing_cancel" @click="addAddressBillModal=false">Batal</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </transition>
                                            </div>
                                            <!-- END ADD ALAMAT PENGIRIM -->

                                            <!-- MODAL EDIT ALAMAT PENGIRIM -->
                                            <div v-if="editAddressBillModal">
                                                <transition name="modal">
                                                    <div class="modal-mask">
                                                        <div class="modal-wrapper">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title me-3" id="exampleModalLabel">EDIT ALAMAT PENGIRIM</h5>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form>           
                                                                            <div class="mb-3 text-start">
                                                                                <label for="idadmin" class="form-label label-required">Nama</label>
                                                                                <input type="text" class="form-control" name="firstname_add_billing" placeholder="Masukkan Nama" v-model="addressBill.name">
                                                                                <span v-if="allerrosbill.name" class="text-danger">{{allerrosbill.name[0]}}</span>
                                                                            </div>  
                                                                            <div class="mb-3 text-start">
                                                                                <label for="nama" class="form-label label-required">Alamat</label>
                                                                                <textarea class="form-control" name="address_add_billing" placeholder="Masukkan Alamat" v-model="addressBill.address"></textarea>
                                                                                <span v-if="allerrosbill.address" class="text-danger">{{allerrosbill.address[0]}}</span>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="col-sm-6">
                                                                                    <div class="mb-3 text-start">
                                                                                        <label for="province" class="form-label label-required">Provinsi</label>
                                                                                        <select id="province_add_billing" name="province_add_billing" class="form-select" aria-label="Default select example" v-model="selectedProvinceBill" @change="selectedCityBill='';getCities(selectedProvinceBill.id_province)">
                                                                                            <option value="" selected>--Pilih Provinsi--</option>
                                                                                            <option v-for="province in provinces" :key="province.province_id" :value="{id_province:province.province_id, name_province:province.province}">{{province.province}}</option>
                                                                                        </select>
                                                                                        <span v-if="allerrosbill.province" class="text-danger">{{allerrosbill.province[0]}}</span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <div class="mb-3 text-start">
                                                                                        <label for="cities" class="form-label label-required">Kota</label>
                                                                                        <select id="city_add_billing" name="city_add_billing" class="form-select" aria-label="Default select example" v-model="selectedCityBill">
                                                                                            <option value="" selected>--Pilih Kota--</option>
                                                                                            <option v-for="city in cities" :key="city.city_id" :value="{id_city:city.city_id, name_city:city.city_name, type_city:city.type}">{{city.type}} {{city.city_name}}</option>
                                                                                        </select>
                                                                                        <span v-if="allerrosbill.city" class="text-danger">{{allerrosbill.city[0]}}</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="col-6">
                                                                                <div class="mb-3 text-start">
                                                                                        <label for="price" class="form-label label-required">Nomor Telepon</label>
                                                                                        <input type="text" class="form-control" name="phonenumber_add_billing" id="priceInput" placeholder="Masukkan Nomor Telepon" v-model="addressBill.phone_number">
                                                                                        <span v-if="allerrosbill.phone_number" class="text-danger">{{allerrosbill.phone_number[0]}}</span>
                                                                                    </div>
                                                                                </div>
                                                                                                
                                                                                <div class="col-sm-6">
                                                                                    <div class="mb-3 text-start">
                                                                                        <label for="price" class="form-label label-required">Kode Pos</label>
                                                                                        <input type="text" class="form-control" name="postalcode_add_billing" id="priceInput" placeholder="Masukkan Kode Pos" v-model="addressBill.postalcode"> 
                                                                                        <span v-if="allerrosbill.postalcode" class="text-danger">{{allerrosbill.postalcode[0]}}</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            <div class="mb-3 text-start">
                                                                                <label for="price" class="form-label label-required">Referensi Alamat (ex:Alamat Rumah)</label>
                                                                                <input type="text" class="form-control" name="title_add_billing" id="priceInput" placeholder="Masukkan Referensi Alamat" v-model="addressBill.title">
                                                                                <span v-if="allerrosbill.title" class="text-danger">{{allerrosbill.title[0]}}</span>
                                                                            </div>            
                                                                        </form>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-success" id="address_add_bill_submit" @click="updateDataBill()">Simpan</button> 
                                                                        <button type="button" class="btn btn-secondary" id="add_billing_cancel" @click="editAddressBillModal=false">Batal</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </transition>
                                            </div>
                                            <!-- END EDIT ALAMAT PENGIRIM -->

                                            <!-- MODAL ADD ALAMAT PENERIMA -->
                                            <div v-if="addAddressReceiverModal">
                                                <transition name="modal">
                                                    <div class="modal-mask">
                                                        <div class="modal-wrapper">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title me-3" id="exampleModalLabel">TAMBAH ALAMAT PENERIMA</h5>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form>           
                                                                            <div class="mb-3 text-start">
                                                                                <label for="idadmin" class="form-label label-required">Nama</label>
                                                                                <input type="text" class="form-control" name="firstname_add_billing" placeholder="Masukkan Nama" v-model="addressReceiver.name">
                                                                                <span v-if="allerrosreceiver.name" class="text-danger">{{allerrosreceiver.name[0]}}</span>
                                                                            </div>  
                                                                            <div class="mb-3 text-start">
                                                                                <label for="nama" class="form-label label-required">Alamat</label>
                                                                                <textarea class="form-control" name="address_add_billing" placeholder="Masukkan Alamat" v-model="addressReceiver.address"></textarea>
                                                                                <span v-if="allerrosreceiver.address" class="text-danger">{{allerrosreceiver.address[0]}}</span>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="col-sm-6">
                                                                                    <div class="mb-3 text-start">
                                                                                        <label for="province" class="form-label label-required">Provinsi</label>
                                                                                        <select id="province_add_billing" name="province_add_billing" class="form-select" aria-label="Default select example" v-model="selectedProvinceReceiver" @change="selectedCity='';getCities(selectedProvinceReceiver.id_province)">
                                                                                            <option value="" selected>--Pilih Provinsi--</option>
                                                                                            <option v-for="province in provinces" :key="province.province_id" :value="{id_province:province.province_id, name_province:province.province}">{{province.province}}</option>
                                                                                        </select>
                                                                                        <span v-if="allerrosreceiver.province" class="text-danger">{{allerrosreceiver.province[0]}}</span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <div class="mb-3 text-start">
                                                                                        <label for="cities" class="form-label label-required">Kota</label>
                                                                                        <select id="city_add_billing" name="city_add_billing" class="form-select" aria-label="Default select example" v-model="selectedCityReceiver">
                                                                                            <option value="" selected>--Pilih Kota--</option>
                                                                                            <option v-for="city in cities" :key="city.city_id" :value="{id_city:city.city_id, name_city:city.city_name, type_city:city.type}">{{city.type}} {{city.city_name}}</option>
                                                                                        </select>
                                                                                        <span v-if="allerrosreceiver.city" class="text-danger">{{allerrosreceiver.city[0]}}</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="col-6">
                                                                                <div class="mb-3 text-start">
                                                                                        <label for="price" class="form-label label-required">Nomor Telepon</label>
                                                                                        <input type="text" class="form-control" name="phonenumber_add_billing" id="priceInput" placeholder="Masukkan Nomor Telepon" v-model="addressReceiver.phone_number">
                                                                                        <span v-if="allerrosreceiver.phone_number" class="text-danger">{{allerrosreceiver.phone_number[0]}}</span>
                                                                                    </div>
                                                                                </div>
                                                                                                
                                                                                <div class="col-sm-6">
                                                                                    <div class="mb-3 text-start">
                                                                                        <label for="price" class="form-label label-required">Kode Pos</label>
                                                                                        <input type="text" class="form-control" name="postalcode_add_billing" id="priceInput" placeholder="Masukkan Kode Pos" v-model="addressReceiver.postalcode"> 
                                                                                        <span v-if="allerrosreceiver.postalcode" class="text-danger">{{allerrosreceiver.postalcode[0]}}</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            <div class="mb-3 text-start">
                                                                                <label for="price" class="form-label label-required">Referensi Alamat (ex:Alamat Rumah)</label>
                                                                                <input type="text" class="form-control" name="title_add_billing" id="priceInput" placeholder="Masukkan Referensi Alamat" v-model="addressReceiver.title">
                                                                                <span v-if="allerrosreceiver.title" class="text-danger">{{allerrosreceiver.title[0]}}</span>
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
                                            <!-- END ADD ALAMAT PENERIMA -->

                                            <!-- MODAL EDIT ALAMAT PENERIMA -->
                                            <div v-if="editAddressReceiverModal">
                                                <transition name="modal">
                                                    <div class="modal-mask">
                                                        <div class="modal-wrapper">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title me-3" id="exampleModalLabel">UBAH ALAMAT PENERIMA</h5>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form>           
                                                                            <div class="mb-3 text-start">
                                                                                <label for="idadmin" class="form-label label-required">Nama</label>
                                                                                <input type="text" class="form-control" name="firstname_add_billing" placeholder="Masukkan Nama" v-model="addressReceiver.name">
                                                                                <span v-if="allerrosreceiver.name" class="text-danger">{{allerrosreceiver.name[0]}}</span>
                                                                            </div>  
                                                                            <div class="mb-3 text-start">
                                                                                <label for="nama" class="form-label label-required">Alamat</label>
                                                                                <textarea class="form-control" name="address_add_billing" placeholder="Masukkan Alamat" v-model="addressReceiver.address"></textarea>
                                                                                <span v-if="allerrosreceiver.address" class="text-danger">{{allerrosreceiver.address[0]}}</span>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="col-sm-6">
                                                                                    <div class="mb-3 text-start">
                                                                                        <label for="province" class="form-label label-required">Provinsi</label>
                                                                                        <select id="province_add_billing" name="province_add_billing" class="form-select" aria-label="Default select example" v-model="selectedProvinceReceiver" @change="selectedCity='';getCities(selectedProvinceReceiver.id_province)">
                                                                                            <option value="" selected>--Pilih Provinsi--</option>
                                                                                            <option v-for="province in provinces" :key="province.province_id" :value="{id_province:province.province_id, name_province:province.province}">{{province.province}}</option>
                                                                                        </select>
                                                                                        <span v-if="allerrosreceiver.province" class="text-danger">{{allerrosreceiver.province[0]}}</span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <div class="mb-3 text-start">
                                                                                        <label for="cities" class="form-label label-required">Kota</label>
                                                                                        <select id="city_add_billing" name="city_add_billing" class="form-select" aria-label="Default select example" v-model="selectedCityReceiver">
                                                                                            <option value="" selected>--Pilih Kota--</option>
                                                                                            <option v-for="city in cities" :key="city.city_id" :value="{id_city:city.city_id, name_city:city.city_name, type_city:city.type}">{{city.type}} {{city.city_name}}</option>
                                                                                        </select>
                                                                                        <span v-if="allerrosreceiver.city" class="text-danger">{{allerrosreceiver.city[0]}}</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="col-6">
                                                                                <div class="mb-3 text-start">
                                                                                        <label for="price" class="form-label label-required">Nomor Telepon</label>
                                                                                        <input type="text" class="form-control" name="phonenumber_add_billing" id="priceInput" placeholder="Masukkan Nomor Telepon" v-model="addressReceiver.phone_number">
                                                                                        <span v-if="allerrosreceiver.phone_number" class="text-danger">{{allerrosreceiver.phone_number[0]}}</span>
                                                                                    </div>
                                                                                </div>
                                                                                                
                                                                                <div class="col-sm-6">
                                                                                    <div class="mb-3 text-start">
                                                                                        <label for="price" class="form-label label-required">Kode Pos</label>
                                                                                        <input type="text" class="form-control" name="postalcode_add_billing" id="priceInput" placeholder="Masukkan Kode Pos" v-model="addressReceiver.postalcode"> 
                                                                                        <span v-if="allerrosreceiver.postalcode" class="text-danger">{{allerrosreceiver.postalcode[0]}}</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            <div class="mb-3 text-start">
                                                                                <label for="price" class="form-label label-required">Referensi Alamat (ex:Alamat Rumah)</label>
                                                                                <input type="text" class="form-control" name="title_add_billing" id="priceInput" placeholder="Masukkan Referensi Alamat" v-model="addressReceiver.title">
                                                                                <span v-if="allerrosreceiver.title" class="text-danger">{{allerrosreceiver.title[0]}}</span>
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
                                            <!-- END ADD ALAMAT PENERIMA -->
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer">
                                     <button type="button" class="btn btn-success" id="address_add_bill_submit" @click="doCheckout()">Buat Pesanan</button> 
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
        name:"Checkout",
        components: {
            Header,
            Footer
        },
        data() {
            return {
                addAddressBillModal: false,
                editAddressBillModal: false,
                addAddressReceiverModal: false,
                editAddressReceiverModal:false,
                selectedProvinceBill:'',
                selectedCityBill:'',
                selectedProvinceReceiver:'',
                selectedCityReceiver:'',
                selectedBill:'',
                selectedReceiver:'',
                selectedOngkir:'',
                costOngkir:0,
                provinces:[],
                cities:[],
                keranjangUser:[],
                addressBill:{
                    id:'',
                    name:'',
                    address:'',
                    postalcode:'',
                    phone_number:'',
                    title:''
                },
                addressReceiver:{
                    id:'',
                    name:'',
                    address:'',
                    postal_code:'',
                    phone_number:'',
                    title:''
                },
                dataBill:'',
                dataReceiver:'',
                bills:[],
                receivers:[],
                differentAddress:false,
                ongkirs:[],
                allerros: [],
                allerrosreceiver: [],
                allerrosbill: [],
                success : false
            }
        },
        methods:{
            getCities(id){
            axios
            .get("http://127.0.0.1:8000/api/cities/"+id)
            .then(res=>{this.cities=res.data.data})
            .catch(err=>console.log(err));
            },
            addDataBill(){
                this.addressBill = {
                    id:'',
                    name:'',
                    address:'',
                    postalcode:'',
                    phone_number:'',
                    title:'',
                };
                this.selectedProvince = "";
                this.selectedCity = "";
                this.allerrosbill=[]

            },
            addDataReceiver(){
                this.addressReceiver = {
                    id:'',
                    name:'',
                    address:'',
                    postalcode:'',
                    phone_number:'',
                    title:'',
                };
                this.selectedProvince = "";
                this.selectedCity = "";
                this.allerrosreceiver=[]

            },
            saveDataBill(){
                let customer = JSON.parse(localStorage.getItem('customer'));
                let tempDataBill = {
                    "title":this.addressBill.title,
                    "name":this.addressBill.name, 
                    "address":this.addressBill.address,
                    "id_city":this.selectedCityBill.id_city,
                    "type_city":this.selectedCityBill.type_city, 
                    "city":this.selectedCityBill.name_city,
                    "id_province":this.selectedProvinceBill.id_province,
                    "province":this.selectedProvinceBill.name_province,
                    "postalcode" :this.addressBill.postalcode,
                    "phone_number":this.addressBill.phone_number,
                    "id_customer":customer.id
                };

                axios
                .post("http://127.0.0.1:8000/api/receiver/add",tempDataBill)
                .then(res => {
                    this.dataBill = res.data.data;
                    axios
                    .get("http://127.0.0.1:8000/api/receiver/customer/"+customer.id)
                    .then(res=>{this.bills=res.data.data;
                    this.receivers = res.data.data; 
                    this.selectedBill=this.dataBill.id;
                    if(this.differentAddress==false)
                    this.selectedReceiver=this.dataBill.id})
                    .catch(err=>console.log(err));
                    this.addAddressBillModal=false;
                })
                .catch(error=>{
                     if(error.response.status==422){
                        this.allerrosbill = error.response.data.errors;
                        this.success = false;
                    }
                });
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
                .then(res => {
                    this.dataReceiver = res.data.data;
                    axios
                    .get("http://127.0.0.1:8000/api/receiver/customer/"+customer.id)
                    .then(res=>{this.bills=res.data.data;
                        this.receivers = res.data.data; 
                        this.selectedReceiver=this.dataReceiver.id;
                    })
                    .catch(err=>console.log(err));
                    this.addAddressReceiverModal=false;
                })
                .catch(error=>{
                    if(error.response.status==422){
                        this.allerrosreceiver = error.response.data.errors;
                        this.success = false;
                    }
                });
            },
            getDataReceiver(id_receiver,type){
                if(type==1){
                    axios
                    .get("http://127.0.0.1:8000/api/receiver/"+id_receiver)
                    .then(res=>{this.dataBill = res.data.data;
                        if(this.differentAddress==false){
                            this.selectedReceiver = this.selectedBill;
                            this.dataReceiver=res.data.data;
                        }
                         this.checkOngkir(this.dataBill,this.dataReceiver);
                        
                    })
                    .catch(err=>console.log(err));   
                }
                else{
                    axios
                    .get("http://127.0.0.1:8000/api/receiver/"+id_receiver)
                    .then(res=>{this.dataReceiver = res.data.data
                     this.checkOngkir(this.dataBill,this.dataReceiver);
                    })
                    .catch(err=>console.log(err));   
                }   
            },
            editDataBill(){
                this.addressBill.id = this.dataBill.id;
                this.addressBill.name = this.dataBill.name;
                this.addressBill.address = this.dataBill.address;
                this.addressBill.phone_number = this.dataBill.phone_number;
                this.addressBill.postalcode = this.dataBill.postalcode;
                this.addressBill.title = this.dataBill.title;
                this.selectedProvinceBill = {
                    id_province:this.dataBill.id_province,
                    name_province: this.dataBill.province 
                };
                this.getCities(this.dataBill.id_province);
                this.selectedCityBill = {
                  id_city:this.dataBill.id_city,
                  type_city:this.dataBill.type_city, 
                  name_city:this.dataBill.city
                };
                this.allerrosbill=[];
            },
            editDataReceiver(){
                this.addressReceiver.id = this.dataReceiver.id;
                this.addressReceiver.name = this.dataReceiver.name;
                this.addressReceiver.address = this.dataReceiver.address;
                this.addressReceiver.phone_number = this.dataReceiver.phone_number;
                this.addressReceiver.postalcode = this.dataReceiver.postalcode;
                this.addressReceiver.title = this.dataReceiver.title;
                this.selectedProvinceReceiver = {
                    id_province:this.dataReceiver.id_province,
                    name_province: this.dataReceiver.province 
                };
                this.getCities(this.dataReceiver.id_province);
                this.selectedCityReceiver = {
                  id_city:this.dataReceiver.id_city,
                  type_city:this.dataReceiver.type_city, 
                  name_city:this.dataReceiver.city
                };
                this.allerrosreceiver=[];
            },
            updateDataBill(){
                 let customer = JSON.parse(localStorage.getItem('customer'));
                let tempDataReceiver = {
                    "title":this.addressBill.title,
                    "name":this.addressBill.name, 
                    "address":this.addressBill.address,
                    "id_city":this.selectedCityBill.id_city,
                    "type_city":this.selectedCityBill.type_city, 
                    "city":this.selectedCityBill.name_city,
                    "id_province":this.selectedProvinceBill.id_province,
                    "province":this.selectedProvinceBill.name_province,
                    "postalcode" :this.addressBill.postalcode,
                    "phone_number":this.addressBill.phone_number,
                    "id_customer":customer.id
                };

                axios
                .post("http://127.0.0.1:8000/api/receiver/update/"+this.dataBill.id,tempDataReceiver)
                .then(res => {
                    this.dataBill = res.data.data;
                    axios
                    .get("http://127.0.0.1:8000/api/receiver/customer/"+customer.id)
                    .then(res=>{this.bills=res.data.data;
                         this.receivers = res.data.data; 
                        this.selectedBill=this.dataBill.id;
                        if(this.differentAddress==false){
                            this.selectedReceiver = this.selectedBill;
                            this.dataReceiver = this.dataBill;
                        }
                    })
                    .catch(err=>console.log(err));
                    this.editAddressBillModal=false;
                })
                .catch(error=>{
                     if(error.response.status==422){
                        this.allerrosbill = error.response.data.errors;
                        this.success = false;
                    }
                });
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
                    .post("http://127.0.0.1:8000/api/receiver/update/"+this.dataReceiver.id,tempDataReceiver)
                    .then(res => {
                        this.dataReceiver = res.data.data;
                        axios
                        .get("http://127.0.0.1:8000/api/receiver/customer/"+customer.id)
                        .then(res=>{this.bills=res.data.data;
                        this.receivers = res.data.data; 
                        this.selectedReceiver=this.dataReceiver.id;})
                        .catch(err=>console.log(err));
                        this.editAddressReceiverModal=false;
                    })
                    .catch(error=>{
                        if(error.response.status==422){
                            this.allerrosreceiver = error.response.data.errors;
                            this.success = false;
                        }
                    });
            },
            checkOngkir(dataBill,dataReceiver){
                if(this.dataBill!=null && this.dataReceiver!=null){
                    
                    this.ongkirs.splice(0);
                    this.selectedOngkir = '';
                    
                    let dataOngkirJne = {
                    "origin":dataBill.id_city, 
                    "destination":dataReceiver.id_city, 
                    "weight":10,
                    "courier" :'jne' 
                    };
                    let dataOngkirTiki = {
                        "origin":dataBill.id_city, 
                        "destination":dataReceiver.id_city, 
                        "weight":10,
                        "courier" :'tiki' 
                    };
                  
                    console.log(dataOngkirJne);

                    axios
                    .post("http://127.0.0.1:8000/api/checkOngkir/",dataOngkirJne)
                    .then(res => {
                        var ongkir = res.data.data;
                        for(let i = 0; i<ongkir.length;i++){   
                            for(let j = 0; j<ongkir[i].costs.length;j++){
                                for(let k=0;k<ongkir[i].costs[j].cost.length;k++){
                                    let dataOngkir={
                                        id:j,
                                        code:ongkir[i].code,
                                        name:ongkir[i].code.toUpperCase(),
                                        service:ongkir[i].costs[j].service,
                                        etd:ongkir[i].costs[j].cost[k].etd,
                                        cost:ongkir[i].costs[j].cost[k].value
                                    }

                                    this.ongkirs.push(dataOngkir);
                                }
                            }
                        }
                    })
                    .catch(err=>console.log(err));

                    axios
                    .post("http://127.0.0.1:8000/api/checkOngkir/",dataOngkirTiki)
                    .then(res => {
                        var ongkir = res.data.data;
                        for(let i = 0; i<ongkir.length;i++){   
                            for(let j = 0; j<ongkir[i].costs.length;j++){
                                for(let k=0;k<ongkir[i].costs[j].cost.length;k++){
                                    let dataOngkir={
                                        id:j,
                                        code:ongkir[i].code,
                                        name:ongkir[i].code.toUpperCase(),
                                        service:ongkir[i].costs[j].service,
                                        etd:ongkir[i].costs[j].cost[k].etd,
                                        cost:ongkir[i].costs[j].cost[k].value
                                    }

                                    this.ongkirs.push(dataOngkir);
                                }
                            }
                        }
                    })
                    .catch(err=>console.log(err));
                }
            },
            doCheckout(){
                let customer = JSON.parse(localStorage.getItem('customer'));
                let products = this.keranjangUser.map(function(product){
                    return {
                        id_item:product.id,
                        qty:product.qty,
                        price:product.price,
                        discount:product.discount,
                        totalprice:product.totalprice,
                        total:product.totalprice*product.qty}
                });

                let checkoutData = {
                    'id_customer':customer.id,
                    'id_receiver':this.selectedReceiver,
                    'id_billing' : this.selectedBill,
                    'tax_percent':10,
                    'tax_price':this.totalPajak,
                    'shipping_name' : this.selectedOngkir.code,
                    'shipping_type' : this.selectedOngkir.service,
                    'shipping_price' : this.selectedOngkir.cost,
                    'transaction_total':this.total,
                    'transaction_status':"BELUM BAYAR",
                    'transaction_items':products
                };

                // console.log(checkoutData);
                axios
                .post("http://127.0.0.1:8000/api/checkout",checkoutData)
                .then(
                    (res)=>{
                    // this.success = true;
                      if(res.data.meta.code==200){
                            localStorage.removeItem('keranjangUser');
                          return this.$router.push({ name: 'Listorder'})
                      }
                    }  
                   )
                .catch((error) => {
                    if(error.response.status==422){
                        this.allerros = error.response.data.errors;
                        this.success = false;
                    }
                    
                });
            },
            formatPrice(value) {
                let val = (value/1).toFixed(2).replace('.', ',')
                return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
            }
        },
       
        mounted(){
            let customer = JSON.parse(localStorage.getItem('customer'));
            console.log(customer.id);
            axios
            .get("http://127.0.0.1:8000/api/provinces")
            .then(res=>{this.provinces=res.data.data})
            .catch(err=>console.log(err));
               
            axios
            .get("http://127.0.0.1:8000/api/receiver/customer/"+customer.id)
            .then(res=>{
                this.bills=res.data.data;
                this.receivers=res.data.data; 
            })
            .catch(err=>console.log(err));
            
            if(localStorage.getItem('keranjangUser')){
                try{
                    this.keranjangUser = JSON.parse(localStorage.getItem('keranjangUser'));
                }catch(e){
                    localStorage.removeItem('keranjangUser');
                }
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
                var ongkir = 0;
                if(this.selectedOngkir!=""){
                    ongkir = this.selectedOngkir.cost;
                }
                return this.subtotal+this.totalPajak+ongkir;
            }
        }
    }
</script>
