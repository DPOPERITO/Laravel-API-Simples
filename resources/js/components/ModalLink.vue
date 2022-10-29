<template>
    <span>
        <span v-if="item">
            <button v-on:click="preencheForm()" v-if="!tipo ||(tipo != 'button' && tipo != 'link')" type="button" v-bind:class="css || 'btn btn-primary'" data-toggle="modal" v-bind:data-target="'#'+nome">{{titulo}}</button>
            <button v-on:click="preencheForm()" v-if="tipo =='button'" type="button" v-bind:class="css || 'btn btn-primary'" data-toggle="modal" v-bind:data-target="'#'+nome">{{titulo}}</button>
            <a v-on:click="preencheForm()" v-if="tipo =='link'" href="#" v-bind:class="css || ''" data-toggle="modal" v-bind:data-target="'#'+nome">{{titulo}}</a>
        </span>
        <span v-if="!item">
            <button  v-if="!tipo ||(tipo != 'button' && tipo != 'link')" type="button" v-bind:class="css || 'btn btn-primary'" data-toggle="modal" v-bind:data-target="'#'+nome">{{titulo}}</button>
            <button  v-if="tipo =='button'" type="button" v-bind:class="css || 'btn btn-primary'" data-toggle="modal" v-bind:data-target="'#'+nome">{{titulo}}</button>
            <a  v-if="tipo =='link'" href="#" v-bind:class="css || ''" data-toggle="modal" v-bind:data-target="'#'+nome">{{titulo}}</a>
        </span>
        <span v-if="!item">
            <button  v-if="!tipo ||(tipo != 'button' && tipo != 'link')" type="button" v-bind:class="css || 'btn btn-primary'" data-toggle="modal" v-bind:data-target="'#'+nome">{{titulo}} </button>
            <button  v-if="tipo =='button'" type="button" v-bind:class="css || 'btn btn-primary'" data-toggle="modal" v-bind:data-target="'#'+nome">{{titulo}} </button>
            <a  v-if="tipo =='link'" href="#" v-bind:class="css || ''" data-toggle="modal" v-bind:data-target="'#'+nome">{{titulo}}</a>
            <a  v-if="tipo =='link' && icon" href="#" v-bind:class="css || ''" data-toggle="modal" v-bind:data-target="'#'+nome"> <i v-bind:class="icon" aria-hidden="true"></i> </a>
        </span>
        
    </span>
</template>
<script>
export default {
    props: ['tipo','nome','titulo','css','item','icon'],
    methods: {
        preencheForm() {
           this.$store.commit('setItem', this.item);
        }
    }
}
</script>