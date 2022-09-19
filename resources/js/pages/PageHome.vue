<template>
    <div class="container">
        <h1>DeliveBoo</h1>
        <!-- <CategoryCheck  @search="search" /> -->
        <section>

            <div class="" @change="search(inputCategory)" method="get">
                <span><strong>Categorie:  </strong></span>
                <!-- <div v-for="(category, i) in categories" :key="i">

                    <input type="checkbox" class=" form-check-input" :name="category" :id="category" :value="category" v-model="checkedNames" />
                    <label class=" form-check-label" :for="category">{{category}}</label>
                </div> -->


               <input type="checkbox" class=" form-check-input" name="ristorante"  id="2" value="2" v-model="inputCategory" />
                <label class=" form-check-label" for="ristorante">ristorante</label>

                <input type="checkbox" class=" form-check-input" name="vegano"  id="5" value="5" v-model="inputCategory" />
                <label class=" form-check-label" for="vegano">vegano</label>

                <input type="checkbox" class=" form-check-input" name="pizzeria" id="1" value="1" v-model="inputCategory" />
                <label class=" form-check-label" for="pizzeria">pizzeria</label>
            </div>
        </section>

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
                    this.inputCategory = cat;
                    console.log(this.inputCategory[0]);


                     if (this.inputCategory[0] != 0 ) {
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
                     } else if (this.inputCategory = undefined)  {
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

</style>
