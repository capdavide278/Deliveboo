<template>
    <div>
          <div class="d-flex justify-content-end">
            <router-link :to="{name: 'cart' }">
                <button type="" class="btn btn-primary">CARRELLO</button>
                {{this.qty}}
            </router-link>
          </div>
            
        <Page404 v-if='is404'/>
        <section v-else-if="restaurant">

<h1>{{restaurant.name_restaurant}}</h1>
            <div class="card mb-3" v-for="dish in restaurant.dish" :key="dish.id">
                <img :src="dish.image"  :alt="dish.name">
                <div class="card-body">
                    <!-- <img class="card-image-top" :src="dish.image" alt=""> -->
                    <h2 class="card-title text-uppercase">{{dish.name}}</h2>
                    <p class="card-text">{{dish.description}}</p>
                    <div class="text-end">Prezzo: {{dish.price}} €</div>
                    <div id="alertmsg" class="alert none alert-success" role="alert">
                      <h2 class="blue">{{alert}}</h2>
                    </div>
                </div>


                <button v-if="dish.is_visible" @click="added(dish), product_alert()" id="cart_button" type="button" class="btn btn-primary col-3">Aggiungi al carrello</button>
                <h5 v-else> Il piatto non è al momento disponibile</h5>
                
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
        cart: [],
        cartadd: {
            id: "",
            name: "",
            price: "",
            image: "",
        },
        alert: '',
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

    this.viewCart();

},
methods : {
   findById(arr, id) {
  // this important to show one by one of Quantity
  return arr.find((x) => x.id === id);
},
    viewCart() {
      if (localStorage.getItem("cart")) {
        this.cart = JSON.parse(localStorage.getItem("cart"));
        this.badge = this.cart.length;
        this.totalprice = this.cart.reduce((total, item) => {
          return total + item.qty * item.price;
        }, 0);
      }
    },

    added(item) {
      // when user choose a buy, this function add that in cart

      var itemm = this.findById(this.cart, item.id);
      if (itemm !== undefined) {
        itemm.qty += 1;
        this.saveCats();
      } else {
        // cartadd is here to get all things that click or chosen by user
        this.cartadd.id = item.id;
        this.cartadd.Restid = item.restaurant_id;
        this.cartadd.name = item.name;
        this.cartadd.price = item.price;
        // this.cartadd.image = item.image;
        this.cartadd.qty = 1;
        this.cart.push(this.cartadd);
        this.cartadd = {};
        this.saveCats(); // this function most important to save all inform of products
        console.log(localStorage.getItem('cart'))
      }
    },

    product_alert(){
        const alertmess = document.getElementById('alertmsg')   
          alertmess.classList.add('block')
          this.alert = "piatto aggiunto al carrello"      
    },
    

    saveCats() {
      // for save in local storage set the below code
      let parsed = JSON.stringify(this.cart);
      localStorage.setItem("cart", parsed);
      this.viewCart(); // by this function we can see all products are save in web
    },

    remove(id) {
      // this function remove buy, one by one according id in cart & main page
      var item = this.findById(this.cart, id);
      if (item !== undefined) {
        item.qty -= 1;
        if (item.qty <= 0) {
          var index = this.cart.indexOf(item);
          this.cart.splice(index, 1);
        }
        this.saveCats();
        console.log(localStorage.getItem('cart'))

      }
    },

    // Card() {
    //   // in this part user can log in cart. infact this part is a button to show all choose buy
    //   $("#myDIV").toggleClass("hide").fadeTo("slow"); // in this part when user click, cart show
    //   $(".page").addClass("hide"); // in this part when user click, main page hide and cart show for user
    // },

    // back() {
    //   // in this part user can back from cart to main page
    //   $("#myDIV").addClass("hide");
    //   $(".page").removeClass("hide");
    // },
}
}
</script>

<style lang="scss" scoped>

.none {
  display: none;
}
.block {
  display: block;
}
.blue {
  color: #0d6efd;
}


</style>
