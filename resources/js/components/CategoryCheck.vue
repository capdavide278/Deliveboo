<template>

  <div class="" @change="$emit('search', inputCategory)">
        <span><strong>Categorie:  </strong></span>
        <input type="checkbox" class=" form-check-input" name="ristorante" id="ristorante" value="ristorante" v-model="inputCategory" />
        <label class=" form-check-label" for="ristorante">ristorante</label>

        <input type="checkbox" class=" form-check-input" name="vegano"  id="vegano" value="vegano" v-model="inputCategory" />
        <label class=" form-check-label" for="vegano">vegano</label>

        <input type="checkbox" class=" form-check-input" name="pizzeria" id="pizzeria" value="pizzeria" v-model="inputCategory" />
        <label class=" form-check-label" for="pizzeria">pizzeria</label>
    </div>

</template>

<script>

export default {
    name: 'CategoryCheck',
    data(){
        return {
            categories : [ 'Pizzeria', 'Ristorante', 'Pesce', 'Vegetariano', 'Vegano', 'Bergamasco', 'Etnico', 'Asiatico',  'Messicano'],
            category: [],
            type: [],
            inputCategory: "",
        }
    },

}
</script>

<style lang="scss" scoped>

@import 'bootstrap/scss/bootstrap';



</style>
