<template>
    <div id="containerHome">
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
        <!-- TODO: sistemare con immagine carrello e numerino -->
        <router-link :to="{name: 'cart'}" class="nav-link active">
            <button type="" class="btn btn-primary" id="shoppingCart">Shopping Cart: {{sum}}</button>
        </router-link>

        <!-- categorie -->
        <div class="container-fluid back-restaurant pt-4">
            <section class="container">
                <div class="row">
                    <div class="col-2">
                        <div class="row justify-content-center categories">

                                <button class="button" v-for="(element, i) in categorie" :key="i" @click="IdCategoria(i+1)">
                                    {{element}}
                                    <div class="button__horizontal"></div>
	                                <div class="button__vertical"></div>
                                </button>
                                <button class="button bt-annulla" @click="resetCategory()">
                                    ANNULLA
                                    <div class="button__horizontal"></div>
	                                <div class="button__vertical"></div>
                                </button>

                        </div>
                    </div>
        <!-- ristoranti -->
                    <div class="col-9">
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
                                <router-link :to="{name:'PageShowDish', params: {idRest: restaurant.id}}" class="mt-4">
                                    <button class="btn btn-primary" @click="removeall(restaurant.id)">ORDINA</button>
                                </router-link>
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
            // isActive : false,
            // YesButton : false,
            cart : '',
            cart2 : '',
            sum: 0,

            }
        },
    created(){
        this.search();
        this.iconShopping();
    },
    methods: {
        search(){
            axios.get('/api/restaurants')
            .then(res => {
            this.restaurants = res.data.response.data;
            });
        },

        warningPauroso() {
            // this.isActive = true;

        },
        yesButton() {
            this.YesButton=true;
        },
        removeall(element){
            this.cart2 = localStorage.getItem('cart');
            this.cart = JSON.parse(this.cart2);
            this.cart.forEach(elemento => {
                if (element != elemento.Restid) {
                    localStorage.clear()
                }
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
        },
        iconShopping(){
        this.sum = 0;
        let cartLOcalStorage = '';
        cartLOcalStorage = localStorage.getItem('cart');
        // cart = '';
        if(cartLOcalStorage != null){
            let cart = JSON.parse(cartLOcalStorage);
            let qtyTot= [];
            cart.forEach(element => {
                this.sum += element.qty;
            });
        }
    }
        },
        }
</script>

<style lang="scss" scoped>

    #containerHome{
        position: relative;

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
        #shoppingCart{
            position: absolute;
            top:50px;
            right:20px;
            color: white;
            z-index:600;
        }
        .back-selection {
           background-color: #ffeae4;
        }

        .categories{

            .button {
            text-align: center;
            --offset: 10px;
            --border-size: 2px;
            margin-bottom: 40px;
            display: block;
            position: relative;
            padding: 1.5em 3em;
            appearance: none;
            border: 0;
            background: transparent;
            color:#00ccbc;
            text-transform: uppercase;
            letter-spacing: .25em;
            outline: none;
            cursor: pointer;
            font-weight: bold;
            border-radius: 0;
            box-shadow: inset 0 0 0 var(--border-size) currentcolor;
            transition: background .8s ease;

            &:hover {
                background: rgba(100, 0, 0, .03);
            }

            .button__horizontal,
            .button__vertical {
                position: absolute;
                top: var(--horizontal-offset, 0);
                right: var(--vertical-offset, 0);
                bottom: var(--horizontal-offset, 0);
                left: var(--vertical-offset, 0);
                transition: transform .8s ease;
                will-change: transform;

                &::before {
                    content: '';
                    position: absolute;
                    border: inherit;
                }
            }

            .button__horizontal {
                --vertical-offset: calc(var(--offset) * -1);
                border-top: var(--border-size) solid currentcolor;
                border-bottom: var(--border-size) solid currentcolor;

                &::before {
                    top: calc(var(--vertical-offset) - var(--border-size));
                    bottom: calc(var(--vertical-offset) - var(--border-size));
                    left: calc(var(--vertical-offset) * -1);
                    right: calc(var(--vertical-offset) * -1);
                }
            }

            &:hover .button__horizontal {
                transform: scaleX(0);
            }

            .button__vertical {
                --horizontal-offset: calc(var(--offset) * -1);
                border-left: var(--border-size) solid currentcolor;
                border-right: var(--border-size) solid currentcolor;

                &::before {
                    top: calc(var(--horizontal-offset) * -1);
                    bottom: calc(var(--horizontal-offset) * -1);
                    left: calc(var(--horizontal-offset) - var(--border-size));
                    right: calc(var(--horizontal-offset) - var(--border-size));
                }
            }

            &:hover .button__vertical {
                transform: scaleY(0);
            }


        }
            .big-label {
                font-size: 20px;
            }

            .bt-annulla{
                color:#7acc00;
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


    }


</style>
