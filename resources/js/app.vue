<template>
    <div class="app">  
          <Header />
   <router-view></router-view>
          <Footer/>
    </div>
</template>

<script src="./assets/js/jquery.min.js"></script>
<script src="./assets/js/popper.min.js"></script>
<script src="./assets/js/bootstrap.bundle.min.js"></script>
<script src="./assets/js/custom.js"></script>
<script src="./assets/js/jquery-3.0.0.min.js"></script>
<script src="./assets/js/plugin.js"></script>

<script>
import Header from './components/HeaderComponent.vue';
import Footer from './components/FooterComponent.vue';
export default {
    name: 'app',
    components:{
       Header,
       Footer
    }

}
</script>

<style  src="./assets/css/bootstrap.min.css"></style>
<style  src="./assets/css/style.css"></style>
<style  src="./assets/css/responsive.css"></style>
