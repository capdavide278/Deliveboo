<template>
    <div class="container">
        <h1>DeliveBoo</h1>
        <!-- <CategoryCheck  @search="search" /> -->
        <section>

            <div class="" @change="search(inputCategory)" method="get">
                <span><strong>Categorie:  </strong></span>



                <input type="checkbox" class=" form-check-input" name="pizzeria" id="1" value="1" v-model="inputCategory" />
                <label class=" form-check-label" for="pizzeria">pizzeria</label>
               <input type="checkbox" class=" form-check-input" name="ristorante"  id="2" value="2" v-model="inputCategory" />
                <label class=" form-check-label" for="ristorante">ristorante</label>

                <input type="checkbox" class=" form-check-input" name="pesce"  id="3" value="3" v-model="inputCategory" />
                <label class=" form-check-label" for="pesce">pesce</label>

                <input type="checkbox" class=" form-check-input" name="vegetariano"  id="4" value="4" v-model="inputCategory" />
                <label class=" form-check-label" for="vegetariano">vegetariano</label>
                <input type="checkbox" class=" form-check-input" name="vegano"  id="5" value="5" v-model="inputCategory" />
                <label class=" form-check-label" for="vegano">vegano</label>


                <input type="checkbox" class=" form-check-input" name="bergamasco" id="6" value="6" v-model="inputCategory" />
                <label class=" form-check-label" for="bergamasco">bergamasco</label>
                <input type="checkbox" class=" form-check-input" name="etnico"  id="7" value="7" v-model="inputCategory" />
                <label class=" form-check-label" for="etnico">etnico</label>

                <input type="checkbox" class=" form-check-input" name="asiatico"  id="8" value="8" v-model="inputCategory" />
                <label class=" form-check-label" for="asiatico">asiatico</label>

                <input type="checkbox" class=" form-check-input" name="messicano" id="9" value="9" v-model="inputCategory" />
                <label class=" form-check-label" for="messicano">messicano</label>
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

</style>
