<template>
    <div class="container">
        <h1>DeliveBoo</h1>
        <div class="row g-3 mt-4">

            <div v-for="restaurant in restaurants" :key="restaurant.id" class="card col-sm-6 col-md-4 ">
                <!-- <img class="card-image-top" :src="restaurant.image" :alt=" restaurant.name_restaurant"> -->
                <div class="card-body">

                    <h1 class="card-title text-uppercase">{{ restaurant.name_restaurant }}</h1>
                    <p>Telefono: {{ restaurant.rest_phonenumber}}</p>
                    <p>Email: {{restaurant.rest_email}}</p>
                    <p>Indirizzo: {{ restaurant.address}}</p>
                    <div class="tags text-end">
                        <strong>Category: </strong>
                        <span v-for="category in restaurant.category" :key="category.id" class="tag">
                            {{ category.name }}
                        </span>
                    </div>
                    <router-link :to="{name:'PageShowDish', params: {idRest: restaurant.id}}" class="btn btn-primary  mt-4">ORDINA</router-link>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        name:'PageHome',
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

</style>
