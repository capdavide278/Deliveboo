<template>
    <section>
        <div v-if="!allDone" class="container-payment">

         <!-- Form dati ordine -->
        <form @submit.prevent="sendForm()">
            <div class="card mt-4 p-4 container-payment-data">
                <h3 class="card-title p-3 title-payment-data">
                    <strong>Inserisci i tuoi dati per concludere l'ordine</strong >
                </h3>
                <div class="form-group mb-3">
                    <label for="name">Nome</label>
                    <input type="text" v-model="name" maxlength="100" class="form-control" name="name" id="name" placeholder="Inserisci il tuo nome" required/>
                </div>

                <div class="form-group mb-3">
                    <label for="lastname">Cognome</label>
                    <input type="text" v-model="lastname" maxlength="100" class="form-control" name="lastname" id="lastname" placeholder="Inserisci il tuo cognome" required/>
                </div>

                <div class="form-group mb-3">
                    <label for="address">Indirizzo</label>
                    <input type="text" v-model="address" maxlength="100" class="form-control" name="address" id="address" placeholder="Inserisci il tuo indirizzo" required/>
                </div>

                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" v-model="email" maxlength="100" class="form-control" name="email" id="email" placeholder="Inserisci la tua email" required/>
                </div>
            </div>
            <v-braintree
            :authorization="authorization"
            locale="it_IT"
            @success="onSuccess"
            @error="onError"></v-braintree>
            <!-- @load="onLoad"> -->
            <p v-if="error" class="text-red-500 mb-4">{{ error }}</p>
        </form>
        </div>
    </section>
</template>

<script>

export default {
    name: 'Payment',
    props: {
        authorization: {
        required: true,
        type: String
    },
        type: Array,
         default() {
         return JSON.parse(window.localStorage.getItem("cart"));
        },
        },
    data () {
    return {
        name: "",
            lastname: "",
            address: "",
            email: "",
            allDone: false,
            cart: JSON.parse(window.localStorage.getItem("cart")),
            error: ''
    }
    },
    methods: {
    //  onLoad () {
    //    this.$emit('loading')
    // },
    onSuccess (payload) {
        const token = payload.nonce
        this.$emit('onSuccess', token)
        // const nonce = payload.nonce
        let amount = this.cart
            .reduce((total, dish) => total + dish.price * dish.qty, 0)
            .toFixed(2);
            console.log('tot'+ amount);
        },
    onError (error){
        let message = error.message
        if (message === 'No payment method is available.') {
        this.error = 'Seleziona un metodo di Pagamento'
      } else {
        this.error = message
      }
      this.$emit('onError', message)
    }
    },

    sendForm(){
        console.log('ciao')
    }
  }


</script>

<style lang="scss" scoped>




</style>
