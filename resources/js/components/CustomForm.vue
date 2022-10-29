<template>
    <form v-bind:class="css" v-bind:action="action" v-bind:method="defMethod" v-bind:enctype="enctype">
        <input v-if="alterMethod" type="hidden" name="_method" v-bind:value="alterMethod">
        <input v-if="token" type="hidden" name="_token" v-bind:value="token">
        <slot></slot>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{labelcancel}}</button>
            <button type="submit" class="btn btn-primary">{{labelenv}}</button>
        </div>
    </form>
</template>
<script>
export default {
    props: ['css','action','method','enctype','token','labelenv','labelcancel'],
    data: function(){
        return {
            alterMethod:""
        }
    },
    computed: {
        defMethod: function() {
            if(this.method.toLowerCase() == 'post' || this.method.toLowerCase() == 'get') {
                return this.method.toLowerCase();
            }

            if(this.method.toLowerCase() == 'put') {
                this.alterMethod = 'put'
            }

            if(this.method.toLowerCase() == 'delete') {
                this.alterMethod = 'delete'
            }
        }
    }
}
</script>