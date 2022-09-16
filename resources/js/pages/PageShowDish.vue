<template>
    <div>
        <Page404 v-if='is404'/>
        <section v-else-if="restaurant">

<h1>{{restaurant.name_restaurant}}</h1>
            <div class="card mb-3" v-for="dish in restaurant.dish" :key="dish.id">
                <img :src="dish.image"  :alt="dish.name">
                <div class="card-body">
                    <h2 class="card-title text-uppercase">{{dish.name}}</h2>
                    <p class="card-text">{{dish.description}}</p>
                    <div class="text-end">Prezzo: {{dish.price}} €</div>

                </div>
            </div>
        </section>
    </div>
</template>

<script>
import Page404 from './Page404.vue'


export default {
    name: 'PageShowDish',
    components:{
        Page404
    },
    props:{
        idRest: String,
    },
    data(){
    return {
        is404: false,
        restaurant: null,
    }
},
created(){
    axios.get('/api/restaurants/' + this.idRest)
    .then(risposta =>
    {
        console.log(risposta)

        if(risposta.data.success){
            this.restaurant = risposta.data.result;
            console.log(this.restaurant)

        } else{
            this.is404 = true;
        }
});
}
}
</script>

<style lang="scss" scoped>




</style>
