<template>
    <section>

        <div v-if="disabilita & this.cart != ''">
            <h1 class="text-center mt-5 mb-5">Il tuo carrello:</h1>
            <div v-if="cart !=''">
                <div>
                    <div class="card mb-5 col-12 col-md-8 " v-for="dish in cart" :key="dish.id">
                        <div class="card-body">
                            <h2 class="card-title text-uppercase" style="color: green">{{dish.name}}</h2>
                            <div >Prezzo: {{dish.price}} €</div>
                            <div>{{dish.qty}} porzioni</div>
                            <!-- input per passare id ristorante  -->
                            <input class="inputRestID none" :value="dish.Restid">
                        </div>
                        <div class="d-flex ">

                            <div @click="added(dish)" class="btn-add ms-3 me-3"> +1</div>
                            <div @click="remove(dish.id)" class="btn-add me-3"> -1</div>
                            <button @click="removeall(dish.id)" type="button" class="btn btn-danger ms-3 col-3 col-md-2">Elimina</button>
                        </div>

                    </div>
                </div>
            </div>
            <div class="text-center" v-if="!totalItem == 0">
                <h3>
                <b>Totale carrello:  €{{ totalItem }}</b>
                </h3>
            </div>

            <div id="pay" class="col-8" v-if="loading">
                    <Payment
                    ref="paymentRef"
                    :authorization="tokenApi"
                    @onSuccess="paymentOnSuccess"/>
            </div>

        </div>

        <div v-else>
            <h3 class="message">{{message}}</h3>
        </div>
        <div v-if="this.card == null">
            <h1 class="message"></h1>
        </div>
    </section>
</template>

<script>

import Payment from '../components/Payment.vue'
import Checkout from "./Checkout.vue";

export default {

    name: 'PageCart',
    components:{
        Payment,
        Checkout
    },
    data(){
        return{
            cart2: '',
            cart: '',
            prova: localStorage.getItem('cart'),
            user: "",
            tokenApi: "",
            loading: false,
            message: 'Loading...',
            amount2: '',
            disabilita: true,
        }

    },
    created(){

        this.message = '';
        this.cart2 = localStorage.getItem('cart');
        if(this.cart2 != null){
            this.cart = JSON.parse(this.cart2);
            axios.get("/api/orders/generate")
                .then(res => {
                if (res.data.success) {
                    this.tokenApi = res.data.token;
                    this.loading = true;
                }
            });
        }
    },
    mounted() {
        if(this.cart2 != null){
            this.amount = this.cart.reduce((total, item) => {
              return total + item.qty * item.price;
            }, 0);
        }
    },
    computed: {
    cartTotal: function () {
      //in this function we can show all data that add in cart and i use it to show total of price that user add
      var i;
      var total = 0;

      for (i = 0; i < this.cart.length; i++) {
        total += this.cart[i].price;
      }
      this.amount2 = total;
      return total;
    },
    totalItem: function () {
      // in this function we Plus all price of buy
      let sum = 0;
      let summ = 0;
      this.cart.forEach(function (item) {
        var sum = item.price;
        summ += sum * parseFloat(item.qty);
        if (summ < 1) {
          $(".modal").hide();
        }
      });

      return summ;
    },
  },
    methods:{
    findById(arr, id) {
        // this important to show one by one of Quantity
        return arr.find((x) => x.id === id);
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
    viewCart() {
      if (localStorage.getItem("cart")) {
        this.cart = JSON.parse(localStorage.getItem("cart"));
        this.badge = this.cart.length;
        this.totalprice = this.cart.reduce((total, item) => {
          return total + item.qty * item.price;
        }, 0);
      }
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
      }
    },
    removeall(id){
        var item = this.findById(this.cart, id);
        item.qty = 0;
        var index = this.cart.indexOf(item);
          this.cart.splice(index, 1);
        this.saveCats();
    },
    paymentOnSuccess(token){
        console.log(this.cart.price)
            axios.post("/api/orders/make/payment",{
                token: token,
                amount: this.amount
            })
            .then(res => {
            if (res.data.success) {
                this.message = res.data.message;
                this.loading = false;
            }
        });
              this.cart2= '';
             this.cart= '';
            this.disabilita= false;
        },
        error(){
        }
    },
}
</script>

<style lang="scss" scoped>

section{
    margin-top: 120px;
    h1{
            color: #027e74;
            font-weight: bolder;
        }
    .card{
        margin: 0 auto;
        border: none;

        .btn-add{
            background-color: #00ccbc;
            width: 50px;
            height: 50px;
            border-radius: 10%;
            color: white;
            font-size: 30px;
            padding-left: 8px;
            border: 1px solid #03d7c5;

            &:hover{
                background-color: #02aa9c;

            }
        }
    }
    .none{
        display: none;
    }

    #pay{
        margin: 0 auto;
    }
    .message{
        text-align: center;
        margin: 50px auto;
        max-width: 400px;
    }
}

</style>
