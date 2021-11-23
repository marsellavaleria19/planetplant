<template>
    <carousel :items="1" :nav="false" autoplay="true">
        <img src="/img_application/img_1.jpg" height="600px" width="700px">
        <img src="/img_application/img_2.jpg" height="600px" width="700px">
        <img src="/img_application/img_3.jpg" height="600px" width="700px">
    </carousel>
</template>

<script>
import carousel from 'vue-owl-carousel'
export default {
    name:"Carousel",
    components:{
        carousel
    }
}
</script>
