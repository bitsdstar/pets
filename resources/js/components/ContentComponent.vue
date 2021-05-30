<template>
    <div class="content">
        <Banner />
        <Search />
        <Promot />
    </div>
</template>
<script>
import Banner from './home/BannerComponent.vue';
import Search from './home/SearchComponent.vue';
import Promot from './home/PromotComponent.vue';
export default {
    name:'Content',
       components:{
        Banner,
        Search,
        Promot
    }
}
</script>