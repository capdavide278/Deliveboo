<template>
    <div id="showDish">
                <!-- immagine carrello e numerino -->
        <router-link :to="{name: 'cart'}">
            <div id="cartImage">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSX1QmFrtn2_2bB_fzXXqjvnmOoaLUnCI_tkQ&usqp=CAU" alt="cart">
                <div id="numCarrello">
                    <span id="shoppingCart">{{sum}}</span>
                </div>
            </div>
        </router-link>

        <Page404 v-if='is404'/>
        <section v-else-if="restaurant">
          <h3 id="addDish" class="none ms-5" style="color:red">Il piatto è stato aggiunto al carrello!</h3>
          <h1 class="text-center text-uppercase mb-3" style="color:blue">{{restaurant.name_restaurant}}</h1>
            <div id="card" class="card col-12 col-md-8 mb-4 mt-3 d-flex flex-row" v-for="dish in restaurant.dish" :key="dish.id">
                <div class="d-none d-md-block col-md-4 text-center">
                    <img v-if="dish.image.includes('http')" class="card-image-top max-width" :src="dish.image " :alt=" dish.name">
                    <img v-else class="card-image-top max-width" :src="`/storage/${dish.image}` " :alt=" dish.name">
                </div>
                <div class="col-12 col-md-6 text-center text-md-end">
                    <div class="card-body">
                        <h2 class="card-title text-uppercase">{{dish.name}}</h2>
                        <p class="card-text">{{dish.description}}</p>
                        <div class="">Prezzo: {{dish.price}} €</div>
                    </div>
                    <div v-if="dish.is_visible">
                        <div>
                            <button v-if="carrelloVuoto == false" @click="removeall(dish)"  id="cart_button" type="button" class="btn js-delete btn-primary">Aggiungi al carrello</button>
                            <button v-else-if="carrelloVuoto == true" @click="added(dish)"  id="cart_button" type="button" class="btn btn-primary">Aggiungi al carrello</button>
                        </div>
                    </div>
                    <h5 v-else> Il piatto non è al momento disponibile</h5>
                </div>
            </div>
            <section class="overlay d-none">
            <div class="col-3 popup" action="" >
                <h3>Per effettuare un'ordine da questo ristorante devi prima svuotare il carrello precedente. Vuoi procedere?</h3>
                <button type="submit" class="btn btn-warning js-yes mb-3">Si, cancella l'ordine precedente</button>
                <button type="button" class="btn btn-danger js-no">No, mantieni l'ordine</button>
            </div>
        </section>
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
        sum: 0,
        carrelloVuoto: true,

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
    this.iconShopping();
    this.controlCart();
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
    saveCats() {
      // for save in local storage set the below code
      let parsed = JSON.stringify(this.cart);
      localStorage.setItem("cart", parsed);
      this.iconShopping();
      this.viewCart(); // by this function we can see all products are save in web
        document.getElementById('addDish').classList.remove('none');
        setTimeout(myFunctionTimeAlert, 3000);

        function myFunctionTimeAlert(){
        document.getElementById('addDish').classList.add('none');

        }
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
    iconShopping(){
        this.sum = 0;
        let cartLOcalStorage = '';
        cartLOcalStorage = localStorage.getItem('cart');
        if(cartLOcalStorage != null){
            let cart = JSON.parse(cartLOcalStorage);
            cart.forEach(element => {
                this.sum += element.qty;
            });
        }
    },
    controlCart(){
        let cartLOcalStorage = '';
        cartLOcalStorage = localStorage.getItem('cart');
        cart = '';
        let cart = JSON.parse(cartLOcalStorage);
        if(cartLOcalStorage != null){

        cart.forEach(element => {
            if (this.idRest != element.Restid ) {
                // per pulsante carrello in sovraimpressione
                 this.carrelloVuoto = false;


                    } else if(this.idRest = element.Restid){
                        this.carrelloVuoto = true;


                    }
                  });}
        },
    removeall( dish){
        if(this.carrelloVuoto = true){

            const eleOverlay = document.querySelector('.overlay');
            const deleteButtons = document.querySelectorAll('.js-delete');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function () {

                    eleOverlay.classList.remove('d-none');
                })
            });

            document.querySelector('.js-yes').addEventListener('click', function() {

                    localStorage.clear();
                    eleOverlay.classList.add('d-none');
                    document.getElementById('shoppingCart').innerText= 0;
                    this.carrelloVuoto = true;
                    console.log(this.carrelloVuoto)
                });


                document.querySelector('.js-no').addEventListener('click', function() {
                    eleOverlay.classList.add('d-none');
                    this.carrelloVuoto = false;

            });

        }
        // else if (this.carrelloVuoto = true) {
        //     console.log('ma perchè?')
        //     this.added(dish);

        // }

}
}
}
</script>

<style lang="scss" scoped>
#showDish{
    margin-top: 120px;
    position: relative;

    .none{
        display:none;
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

        #card{
        margin: 0 auto;
        align-content: center;
        border: none;

        .card-image-top{
            width: 300px;
            height: 200px;
            object-fit: contain;
        }
            .none {
              display: none;
            }
            .block {
              display: block;
            }
            .blue {
              color: #0d6efd;
            }
            img{
              width: 200px;
            }
        }
    .overlay {
            display: flex;
            position: fixed;
            inset: 0;
            background-color: rgba($color: #000000, $alpha: 0.4);
            z-index: 10000;

        .popup {
                margin: auto;
                padding: 2rem;
                background-color: #FFFFFF;
                border-radius: 1rem;
                width:400px
        }
    }
}



</style>
