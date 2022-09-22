<template>
    <section>
        <h1>Il tuo carrello:</h1>
        <div class="card mb-3" v-for="dish in cart" :key="dish.id">
                <!-- <img :src="dish.image"  :alt="dish.name"> -->
                <div class="card-body">
                    <h2 class="card-title text-uppercase">{{dish.name}}</h2>
                    <div >Prezzo: {{dish.price}} €</div>
                    <div>{{dish.qty}} porzioni</div>
                </div>
                <div class="d-flex justify-content-around">

                    <button @click="added(dish)" type="button" class="btn btn-primary col-3 me-3">Aggiungi</button>
                    <button @click="remove(dish.id)" type="button" class="btn btn-success col-3 me-3">Elimina porzione</button>
                    <button @click="removeall(dish.id)" type="button" class="btn btn-danger col-3">Elimina</button>
                </div>

            </div>
            <div v-if="!totalItem == 0">
        <h3>
          <b>Totale carrello:  €{{ totalItem }}</b>
        </h3>
        <router-link :to="{name:'PageCheckout',  params: {Totalprice: totalItem}}" class="btn btn-primary mt-4">Paga</router-link>
      </div>
    </section>
</template>

<script>

export default {
    name: 'PageCart',
    data(){
        return{
            cart2: '',
            cart: '',
            prova: localStorage.getItem('cart'),
        }

    },

    created(){
        this.cart2 = localStorage.getItem('cart');
        this.cart = JSON.parse(this.cart2);
        console.log(localStorage.getItem('cart'));


    },
    computed: {
    cartTotal: function () {
      //in this function we can show all data that add in cart and i use it to show total of price that user add
      var i;
      var total = 0;

      for (i = 0; i < this.cart.length; i++) {
        total += this.cart[i].price;
      }

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
        console.log(localStorage.getItem('cart'))

      }
    },
    removeall(id){
        var item = this.findById(this.cart, id);
        item.qty = 0;
        var index = this.cart.indexOf(item);
          this.cart.splice(index, 1);
        this.saveCats();

    }
}

}
</script>

<style lang="scss" scoped>




</style>
