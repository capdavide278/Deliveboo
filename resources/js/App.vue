<template>
    <div id="containerTotal">
        <nav-bar></nav-bar>
    

        <!-- in base all'URL deciderà il contenuto della pagina -->
        <router-view></router-view>

        <foo-ter></foo-ter>
    
    </div>
</template>

<script>
    import NavBar from './components/NavBar.vue';
    import FooTer from './components/FooTer.vue';
    export default {
        name:'App',
        components : {
            NavBar,
            FooTer
        }
    }
</script>

<style lang="scss">
@import 'bootstrap/scss/bootstrap';
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
#containerTotal{
    width: 100%;
    min-height: 100vh;
    }
</style>
