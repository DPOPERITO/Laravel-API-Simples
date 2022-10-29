<template>
    <div class="modal fade" v-bind:id="nome" tabindex="-1" role="dialog" v-bind:aria-labelledby="nome" aria-hidden="true">
        <div v-bind:class="def_width" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{titulo}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <slot></slot>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: ['nome','titulo','width'],
    computed: {
        def_width: function() {
            if(this.width) {
                return 'modal-dialog '+ this.width;
            } else {
                return 'modal-dialog';
            }
        }
    }
}
</script>
<style>

</style>