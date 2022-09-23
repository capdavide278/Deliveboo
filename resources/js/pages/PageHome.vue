<template>
    <div>
        <div id="jumbotron" class="container-fluid">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-5">
                        <h1 class="deliveboo-color mb-5">I piatti che ami a domicilio</h1>
                        <h2 class="deliveboo-color">Sei un ristoratore? <a href="/register">Registrati</a> per vendere i tuoi prodotti</h2>
                    </div>
                    <div class="col-5">
                        <img id="chef" src="../img/chef-jumbo.png" alt="">
                    </div>
                </div>
            </div>
        </div>

        <!-- categorie -->
        <div class="container-fluid back-restaurant pt-4">
            <h1 class="text-center my-5">SCEGLI IL RISTORANTE ADATTO A TE</h1>
            <section class="container">
                <div class="row">
                    <div class="col-12">

                        <div class="row justify-content-center categories">

                            <h4> Seleziona le Categorie:</h4>
                            <div class="col-10">
                                <div type="button" class="btn btn-success col-1 bt-selezioneCat me-2" v-for="(element, i) in categorie" :key="i" @click="IdCategoria(i+1)">
                                    <p>{{element}}</p>
                                </div>
                            </div>
                            <button class="col-2 btn btn-danger bt-selezioneCat" @click="resetCategory()">Annulla</button>
                        </div>
                    </div>
        <!-- ristoranti -->
                    <div class="col-12">
                        <div class="row justify-content-center">
                            <h4 class="text-center">Ristoranti che potrebbero piacerti:</h4>
                            <div v-for="restaurant in restaurants" :key="restaurant.id" class="card restaurant col-sm-6 col-md-3 mx-1 pb-5 my-2">
                                <img v-if="restaurant.image.includes('http')" class="card-image-top max-width" :src="restaurant.image " :alt=" restaurant.name_restaurant">
                                <img v-else class="card-image-top max-width" :src="`/storage/${restaurant.image}` " :alt=" restaurant.name_restaurant">
                                <div class="card-body">
                                    <h3 class="white card-title text-uppercase">{{ restaurant.name_restaurant }}</h3>
                                    <span class="white">Telefono: {{ restaurant.rest_phonenumber}}</span>
                                    <div class="white">Email: {{restaurant.rest_email}}</div>
                                    <span class="white">Indirizzo: {{ restaurant.address}}</span>
                                    <div class="tags text-end">
                                        <strong class="white">Category: </strong>
                                        <span v-for="category in restaurant.category" :key="category.id" class="white tag">
                                            {{ category.name }}
                                        </span>
                                    </div>
                                </div>
                                <router-link :to="{name:'PageShowDish', params: {idRest: restaurant.id}}" class="btn btn-primary  mt-4">ORDINA</router-link>
                            </div>

                        </div>

                    </div>
                </div>
            </section>
        </div>
        <!-- piatti -->
        <div class="container-fluid back-selection pt-3">
            <div class="container">
                <div class="row">
                    <h1 class="text-center mb-3">La selezione di deliveboo scelta apposta per voi</h1>
                    <div class="col-12 mt-4">
                        <div class="row justify-content-between align-items-center">

                            <div id="pizza" class="col-6">
                                <h1>Il grande classico italiano</h1>
                            </div>
                            <div class="col-5">
                                <h2>Il cibo italiano il migliore al mondo</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-4">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-5">
                                <h2>McDonald's i panini gustosi per te</h2>
                            </div>
                            <div class="col-6">
                                <div id="mc" class="col-6">
                                    <h1>McDonalds</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</template>

<script>
    export default {
        name:'PageHome',
    props:{
        categoria: String
    },
    data(){
        return {
            categorie : [ 'Pizzeria', 'Ristorante', 'Pesce', 'Vegetariano', 'Vegano', 'Bergamasco', 'Etnico', 'Asiatico',  'Messicano'],
            restaurants: [],
            categories: [], // categorie da mostrare
            arrRestaurants: [], // ristoranti filtrati in base alla categoria
            catIds: [], // id categoria che si trova nella funzione di ogni categoria per la chiamata api
            }
        },
    created(){
        this.search();
    },
    methods: {
        search(){
            axios.get('/api/restaurants')
            .then(res => {
            this.restaurants = res.data.response.data;
            });
        },
        trovaRistorante(){
            if(this.catIds[0] != undefined){
                axios.get('/api/category/restaurants' + '?category=' +this.catIds).then(response => {
            if (response.data.success) {
                this.restaurants = response.data.arrRestaurants
                console.log(response.data.arrRestaurants)
            }
            })} else {
                this.search();
            }
        },
        IdCategoria(cat){

            if (this.catIds.includes(cat)) {
                let posizione = this.catIds.indexOf(cat)
                this.catIds.splice(posizione, 1)
            } else {
                this.catIds.push(cat);
                console.log(this.catIds)
            }

            this.trovaRistorante();
        },
        resetCategory(){
            this.arrRestaurants = [];
            this.search();
        }
        },

        }
</script>

<style lang="scss" scoped>
    #jumbotron {
        background-color: #00ccbc;;
        max-width: 100%;
        margin-top: 120px;
        .deliveboo-color {
            color: #440063;
        }
        #chef{
            max-width: 100%;
        }
    }

    .back-selection {
       background-color: #ffeae4;
    }

    .categories{

        .big-check {
        padding: 20px;
    }
        .big-label {
            font-size: 20px;
        }

        .bt-selezioneCat{
            min-width: 110px;
            max-width: 110px;
            text-align: center;
            margin-bottom: 10px;
            height: 40px;
        }
    }

    #pizza {
        background-image: url('../img/pizza.jpg');
        background-size: cover;
        max-width: 100%;

        h1{
            padding: 100px;
            color: black;
        }
    }

    #mc {
        background-image: url('../img/mcdonald.jpg');
        background-size: cover;
        width: 100%;

        h1{
            padding: 100px;
            color: black;
        }
    }
    .restaurant {
        background-color: #202428;
        .white{
            color : white;
        }
    }
    .max-width {
        object-fit: cover;
        max-width: 100%;
        height: 200px;
    }

</style>
