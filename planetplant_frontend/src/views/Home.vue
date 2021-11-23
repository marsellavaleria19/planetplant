<template>
  <div class="home">
      <Header/>
      <div class="container">
           <Carousel/>
            <Detail/>
            <NewProduct/>
      </div>
      <Footer/>
  </div>
</template>

<script>
import Header from '@/components/Header.vue';
import Carousel from '@/components/Carousel.vue';
import Detail from '@/components/Detail.vue';
import NewProduct from '@/components/NewProduct.vue';
import Footer from '@/components/Footer.vue';
export default {
  name: 'Home',
  components: {
      Header,
      Carousel,
      Detail,
      NewProduct,
      Footer
  }
}
</script>
