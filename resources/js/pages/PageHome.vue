<template>
    <div id="containerHome">
        <div id="jumbotron" class="container-fluid">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-12 col-md-5">
                        <filter id="motion-blur-filter" filterUnits="userSpaceOnUse">
                            <feGaussianBlur stdDeviation="100 0"></feGaussianBlur>
                        </filter>
                        <span filter-content="S">I piatti che ami a domicilio</span>
                    </div>
                    <div class="col-5 d-none d-md-block ">
                        <img id="chef" src="../img/chef-jumbo.png" alt="">
                    </div>
                </div>
            </div>
        </div>

        <!-- immagine carrello e numerino -->
        <router-link :to="{name: 'cart'}">
        <div id="cartImage">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSX1QmFrtn2_2bB_fzXXqjvnmOoaLUnCI_tkQ&usqp=CAU" alt="cart">
            <div id="numCarrello">
                    <span id="shoppingCart">{{sum}}</span>
                </div>
            </div>
        </router-link>

        <!-- categorie -->
        <div class="container-fluid back-restaurant">
            <section class="container mb-5">
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
                            <div id="container-title">
                              <div class="highlight-container">
                                  <h2 class="highlight">
                                    Ristoranti che potrebbero piacerti:
                                   </h2>
                               </div>
                        </div>
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
                                    <button class="ordina btn btn-primary" @click="removeall(restaurant.id)">ORDINA</button>
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
                    <div id="container-title" class="mb-3">
                        <div class="highlight-container">
                            <h2 class="highlight">
                                La selezione di deliveboo scelta apposta per voi
                            </h2>
                        </div>
                    </div>
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

        <!-- partner -->
        <div id="partner" class="mt-5">
            <div class="container">
                <div class="row d-flex column align-items-center">
                    <div id="container-title" class="mb-5">
                        <div class="highlight-container">
                            <h2 class="highlight">
                                Uniamo le forze
                            </h2>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row d-flex column text-center">
                        <div id="cardPartner" class="row d-flex justify-content-evenly">
                            <div class="col-3">
                                 <img src="https://images.pexels.com/photos/9461776/pexels-photo-9461776.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="rider">
                                 <p class="mb-3 mt-3 fst-italic fw-bold">Diventa un Rider</p>
                                 <button class="btn btn-dark text-center mb-3">
                                    Unisciti a noi
                                 </button>
                           </div>
                           <div class="col-3">
                                 <img src="https://images.pexels.com/photos/2102934/pexels-photo-2102934.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="chef">
                                 <p class="mb-3 mt-3 fst-italic fw-bold">Diventa Partner</p>
                                 <button  class="btn btn-dark text-center mb-3">
                                    Unisciti a noi
                                 </button>
                           </div>
                           <div  class="col-3">
                                 <img src="https://images.pexels.com/photos/3184287/pexels-photo-3184287.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="job">
                                 <p class="mb-3 mt-3 fst-italic fw-bold">Lavora con noi</p>
                                 <button  class="btn btn-dark text-center mb-3">
                                    Unisciti a noi
                                 </button>
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
            color: #99eeb4;
            text-align: center;

            span {
            position: relative;
            font-family: "Avenir Next", sans-serif;
            font-weight: 900;
            font-size: 64px;
            text-transform: uppercase;
            font-style: italic;
            letter-spacing: 0.05em;
            display: inline-block;
            }
            #chef{
                max-width: 90%;
            }
        }
        //immaginina carrello
        #cartImage{
            width: 60px;
            height: 50px;
            position: fixed;
            top:30px;
            right:100px;
            z-index:600;

            &:hover{
                cursor: pointer;
            }

           img{
            width: 100%;
            height: 100%;
            border-radius: 20px;
            border: 2px solid #027e74;
           }
            #numCarrello{
            position: absolute;
            top:-5px;
            right:20px;
            z-index:700;
            color: #00ccbc;
            font-weight: bolder;
            }
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
            background-color: #525c66;

#ristoContainer{
    .restaurant {
            background-color: #202428;
            border-radius: 20px;
            width: 340px;
            margin-bottom: 20px;

            .white{
                color : white;
            }
            .max-width {
                object-fit: cover;
                max-width: 100%;
                height: 200px;
            }
        }
}


        #partner {

            #cardPartner{
                img{
                    border-radius: 50%;
                    width: 200px;
                    height: 300px;
                }
            }
        }
// fare un testo sottolineato
        #container-title{
                line-height: 1.4;
                text-align: center;
                padding: 44px;
                color: #333;
                .highlight-container{
                    position: relative;
                    display: inline-block;

                &:before{
                    content: " ";
                    display: block;
                    height: 90%;
                    width: 100%;
                    margin-left: -3px;
                    margin-right: -3px;
                    position: absolute;
                    background: #ffd500;
                    transform: rotate(2deg);
                    top: -1px;
                    left: -1px;
                    border-radius: 20% 25% 20% 24%;
                    padding: 10px 3px 3px 10px;
                }
                    .highlight{
                        position: relative;

                    }
                }

            }
    }

    .card{
        padding-top: 15px;
    }

    .ordina{
        background-color: rgb(42, 180, 235);
    }

</style>
