<template>
    <section>
        <div v-if="!allDone" class="container-payment">

         <!-- Form dati ordine -->
        <form @submit.prevent="sendForm">
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
                    <label for="phonenumber">Telefono</label>
                    <input type="text" v-model="phonenumber" maxlength="10" class="form-control" name="phonenumber" id="phonenumber" placeholder="Inserisci il tuo numero">
                </div>

                <div class="form-group mb-3">
                    <label for="address">Indirizzo</label>
                    <input type="text" v-model="address" maxlength="100" class="form-control" name="address" id="address" placeholder="Inserisci il tuo indirizzo" required/>
                </div>

                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" v-model="email" maxlength="100" class="form-control" name="email" id="email" placeholder="Inserisci la tua email" required/>
                </div>
                <div class="form-group mb-3">
                    <label for="date">Giorno consegna</label>
                    <input type="date" v-model="date" class="form-control" name="date" id="date" required>
                </div>
            </div>
            <div class="col-4">
                <v-braintree
                :authorization="authorization"
                locale="it_IT"
                @success="onSuccess"
                @error="onError"></v-braintree>
            </div>
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
        date: '',
        email: "",
        phonenumber: "0",
        allDone: false,
        cart: JSON.parse(window.localStorage.getItem("cart")),
        error: '',
        inputRestID: '',
        successMessage: '',
        errorMessage: '',
        sending: false,
        inputserrorMessages: {},
    }
    },
    mounted(){
        this.inputRestID = document.querySelector('.inputRestID').value;
    },
    methods: {

    findById(arr, id) {
    // this important to show one by one of Quantity
    return arr.find((x) => x.id === id);
        },
        onSuccess (payload) {
            const token = payload.nonce
            this.$emit('onSuccess', token);
                this.sendForm();
            },
        onError (error){
            let message = error.message
            if (message === 'No payment method is available.') {
            this.error = 'Seleziona un metodo di Pagamento'
            } else {
                this.error = message
            }
            this.$emit('onError', message)
        },
        sendForm(){
                    let total = JSON.parse(window.localStorage.getItem("cart"))
                    .reduce((amount, dish) => amount + dish.price * dish.qty, 0)
                    .toFixed(2);
                    axios.post("/api/transaction", {
                        name: this.name,
                        lastname: this.lastname,
                        address: this.address,
                        email: this.email,
                        restaurant_id: this.inputRestID,
                        date: this.date,
                        // cart: new_cart,
                        phonenumber: this.phonenumber,
                        total: total,
                    })
                        .then(
                            (res) =>{
                if (res.data.success) {
                    localStorage.clear();
                    this.submitMessage();
                }
            }
                        )
                        .catch(function (error) {
                console.log(error);
            });
        },
        submitMessage(){
            this.sending = true;
            axios.post('/api/leads', {
                name: this.name,
                lastname: this.lastname,
                address: this.address,
                email: this.email,
                // cart: new_cart,
                phonenumber: this.phonenumber,
            })
            .then(res => {
                if(res.data.success) {
                    this.successMessage = res.data.response;
                } else {
                    this.inputserrorMessages = res.data.response;
                }
            })
            .catch(error => this.errorMessage = 'Errore imprevisto, riprova!')
            .finally(data => this.sending = false);
        },
    }
    }



</script>

<style lang="scss" scoped>




</style>
