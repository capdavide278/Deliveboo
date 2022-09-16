<template>
    <div class="container">
        <div v-for="restaurant in restaurants" :key="restaurant.id" class="card mb-3">
            <div class="card-body">

                <h1 class="card-title text-uppercase">{{ restaurant.name_restaurant }}</h1>
                 <img :src="restaurant.image" :alt=" restaurant.name_restaurant">
                <h3>Telefono: {{ restaurant.rest_phonenumber}}</h3>
                <h3>Email: {{restaurant.rest_email}}</h3>
                <h3>Indirizzo: {{ restaurant.address}}</h3>
                <div class="tags text-end">
                <strong>Category: </strong>
                <span v-for="category in restaurant.category" :key="category.id" class="tag">
                    {{ category.name }}
                </span>
                </div>
            </div>
        </div>






    </div>
</template>

<script>
    export default {
        name:'App',
        data(){
            return {
                restaurants: []
            }
        },
        created(){
            axios.get('/api/restaurants')
            .then(res => {
            this.restaurants = res.data.response.data;
    });
    }
    }
</script>

<style lang="scss" scoped>
@import 'bootstrap/scss/bootstrap';

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
</style>
