<template>
    <div id="containerTotal">

    <div class="container">

        <!-- in base all'URL deciderà il contenuto della pagina -->
        <router-view></router-view>
    </div>
</div>
</template>

<script>
    export default {
        name:'App',

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
