<template>
    <div>
        <div id="jumbotron" class="container-fluid">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-5">
                        <h1 class="deliveboo-color mb-5">I piatti che ami a domicilio</h1>
                        <h2 class="deliveboo-color">Sei un ristoratore? <a href="/login">Registrati</a> per vendere i tuoi prodotti</h2>
                    </div>
                    <div class="col-5">
                        <img id="chef" src="../img/chef-jumbo.png" alt="">
                    </div>
                </div>
            </div> 
        </div>


        <div class="container-fluid mt-4">
            <section class="container">
                <div class="row">
                    <div class="col-4">
                        <div class="width" @change="search(inputCategory)" method="get">
                            <h1> Seleziona le Categorie:</h1>


                            <div>
                                <input type="checkbox" class="big-check form-check-input" name="pizzeria" id="1" value="1" v-model="inputCategory" />
                                <label class="big-label form-check-label" for="pizzeria">pizzeria</label>
                            </div>
                            <div>
                                <input type="checkbox" class="big-check form-check-input" name="ristorante"  id="2" value="2" v-model="inputCategory" />
                                <label class="big-label form-check-label" for="ristorante">ristorante</label>
                            </div>
                            <div>
                                <input type="checkbox" class="big-check form-check-input" name="pesce"  id="3" value="3" v-model="inputCategory" />
                                <label class="big-label form-check-label" for="pesce">pesce</label>
                            </div>
                            
                            <div>
                                <input type="checkbox" class="big-check form-check-input" name="vegetariano"  id="4" value="4" v-model="inputCategory" />
                                <label class="big-label form-check-label" for="vegetariano">vegetariano</label>
                            </div>
                            <div>
                                <input type="checkbox" class="big-check form-check-input" name="vegano"  id="5" value="5" v-model="inputCategory" />
                                <label class="big-label form-check-label" for="vegano">vegano</label>
                            </div>    

                            <div>
                                <input type="checkbox" class="big-check form-check-input" name="bergamasco" id="6" value="6" v-model="inputCategory" />
                                <label class="big-label form-check-label" for="bergamasco">bergamasco</label>
                            </div>
                            <div>
                                <input type="checkbox" class="big-check form-check-input" name="etnico"  id="7" value="7" v-model="inputCategory" />
                                <label class="big-label form-check-label" for="etnico">etnico</label>
                            </div>
                            <div>
                                <input type="checkbox" class="big-check form-check-input" name="asiatico"  id="8" value="8" v-model="inputCategory" />
                                <label class="big-label form-check-label" for="asiatico">asiatico</label>
                            </div>
                            <div>
                                <input type="checkbox" class="big-check form-check-input" name="messicano" id="9" value="9" v-model="inputCategory" />
                                <label class="big-label form-check-label" for="messicano">messicano</label>
                            </div>
                            
                        </div>
                    </div>
                
            
                
            
                    <div class="col-8">
                       
                        <div class="row justify-content-center">
                            <h1 class="text-center">Ristoranti che potrebbero piacerti:</h1>
                            <div v-for="restaurant in restaurants" :key="restaurant.id" class="card col-sm-6 col-md-3 mx-1 my-2">
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
                                </div>    
                                <router-link :to="{name:'PageShowDish', params: {idRest: restaurant.id}}" class="btn btn-primary  mt-4">ORDINA</router-link>
                            </div>

                        </div>
                        
                    </div>
                </div> 
            </section>       
        </div>        
    </div>

    
</template>

<script>
import { computed } from 'vue';
// import CategoryCheck from '../components/CategoryCheck.vue'

    export default {
        name:'PageHome',
        components:{
        // CategoryCheck,
    },
    props:{
categoria: String
    },


        data(){
            return {
                categories : [ 'Pizzeria', 'Ristorante', 'Pesce', 'Vegetariano', 'Vegano', 'Bergamasco', 'Etnico', 'Asiatico',  'Messicano'],
                checkedNames: '',
                restaurants: [],
                restaurantsCat: [],
                category: [],
                userValue: '',
                inputCategory: [],
                genereApi: {},
            genereVari: [],
            stringa : ''
            }
        },
        created(){

            axios.get('/api/restaurants')
            .then(res => {
            this.restaurants = res.data.response.data;
            });
            },
            methods: {
                search(cat){
                    console.log('chi sei?'+cat)
                    this.inputCategory = cat;
                    console.log(this.inputCategory[0]);

                    const checked = document.querySelectorAll('.form-check-input').checked;
                    console.log(checked +'check')


                     if (this.inputCategory[0] != undefined ) {
                     this.stringa = this.inputCategory.toString();

                         if (this.inputCategory[1] != undefined ) {
                            this.stringa = this.inputCategory.toString();
                            this.stringa = this.stringa.replace(/,/g,'&');
                      }

                      axios.get('/api/restaurants/search?category='+this.stringa )
                      .then(res => {
                          this.restaurants = res.data.response;
                           console.log(this.restaurants);
                           console.log('/api/restaurants/search?category='+this.stringa)
                       });
                     }

                      if (this.inputCategory[0] == undefined)  {
                         axios.get('/api/restaurants')
                        .then(res => {
                        this.restaurants = res.data.response.data;
                        });
                        }

                }
            },

        }
</script>

<style lang="scss" scoped>
    #jumbotron {
        background-color: #00ccbc;;
        max-width: 100%;
        .deliveboo-color {
            color: #440063;
        }
        #chef{
            max-width: 100%;
        }
    }
    .card-body {
        max-height: 200px;
    }
    .big-check {
        padding: 20px;
    }
    .big-label {
        font-size: 20px;
    }
</style>
