<template>
    <div>
        <div class="row">
            <a class="btn btn-info"  @click="input++">+</a>
        </div>
       
        <div class="row inputFile"  v-for="i in input" :key="i" :id='"item"+i'>
            <div class="file-field">
                <div class="btn btn-primary btn-sm float-left">
                    <i v-bind:class="icone" aria-hidden="true"></i>
                    <span>{{place}}</span>
                    <input type="file">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" :name='"item"+i' v-bind:value="def_loop" placeholder="Arquivo..."> 
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data: () => {
      return {
        input: 1
       }
    },
    props: ['icone','place', 'stilo', 'loop'],
    computed: {
        def_style: function() {
            return (this.stilo || "background-color: #ffa000 !important;")
        },
        def_loop: function() {
            return (this.loop || 1)
        }
    },
    methods: {
        
    }
}
</script>

<style>
.add {
    width: 3rem;
    height: 2rem;
    background: chartreuse;
    padding: 0;
}
.inputFile {
    position: relative;
    margin-top: 1.5rem;
    margin-bottom: 1.5rem;
}

.file-field input[type="file"] {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    width: 100%;
    padding: 0;
    margin: 0;
    cursor: pointer;
    filter: alpha(opacity=0);
    opacity: 0;
}

.file-field .file-path-wrapper {
    height: 2.25rem;
    padding-left: 10px;
    overflow: hidden;
}

.file-field input.file-path {
    width: 100%;
    height: 32px;
    border: 0.2px solid #ccc;
    border-left: none;
    border-top: none;
    padding-left: 10px;
}

</style>