<template>
    <div> 
        <div class="for-inline">
            <a v-if="criar && !modal" v-bind:href="criar">Criar</a>
            <modal-link v-if="criar && modal" tipo='button' nome='adicionar' titulo='Novo'></modal-link>
            <div class="form-group pull-right">
                <input type="search" class="form-control" placeholder="Buscar" v-model="buscar">
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead v-bind:style="def_bg">
                <tr>
                    <th style="cursor:pointer;" v-on:click="ordenaColuna(index)" v-for="(titulo, index) in titulos" :key="titulo.index" >
                        {{titulo}} <span><i class="fa fa-sort" aria-hidden="true"></i></span>
                    </th>
                    <th v-if="detalhe || editar || deletar">Ação</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item, index) in lista" :key="index">
                    <!-- <th v-if="item[0]">{{item[0]}}</th> -->
                    <td v-for="(i, idx) in item" :key="idx">{{i}}</td>
                    <td v-if="detalhe || editar || deletar">
                        <form v-bind:id="index" v-if="deletar && token" v-bind:action="deletar" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" v-bind:value="token">

                            <a v-if="detalhe && !modal" v-bind:href="detalhe">Detalhe | </a>
                            <modal-link v-if="detalhe && modal" v-bind:item="item" tipo='link' nome='detalhe' titulo='Detalhe'></modal-link>
                            <a v-if="editar && !modal" v-bind:href="editar">Editar</a>
                            <modal-link v-if="editar && modal" v-bind:item="item" tipo='link' nome='editar' titulo='Editar'></modal-link>
                            <a href="#" v-on:click="executaForm(index)"> | Deletar</a>
                        </form>
                        <span v-if="!token || !deletar">
                            <a v-if="detalhe && !modal" v-bind:href="detalhe">Detalhe | </a>
                            <modal-link v-if="detalhe && modal" v-bind:item="item" tipo='button' nome='detalhe' titulo='Detalhe'></modal-link>
                            <a v-if="editar && !modal" v-bind:href="editar">Editar</a>
                            <modal-link v-if="editar && modal" v-bind:item="item" tipo='button' nome='editar' titulo='Editar'></modal-link>
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    props: ['titulos','itens','ordem','ordemCol','criar','detalhe','editar','deletar','token','bg','modal'],
    data: function() {
        return {
            buscar: '',
            ordemAux: this.ordem || 'asc',
            ordemAuxCol: this.orderCol || 0,
        }
    },
    methods: {
        executaForm: function(id) {
            document.getElementById(id).submit();
        }, 
        ordenaColuna: function(coluna) {
            this.ordemAuxCol = coluna;
            if(this.ordemAux.toLowerCase() == 'asc') {
                this.ordemAux = 'desc';
            } else {
                this.ordemAux = 'asc';
            }
        }
    },
    computed: {
        
        def_bg: function () {
            return this.bg || '';
        },
        lista: function() {
            let ordem = this.ordemAux;
            let ordemCol = this.ordemAuxCol;

            if(ordem == 'asc') {
                this.itens.sort(function(a,b){
                    if(Object.values(a)[ordemCol] > Object.values(b)[ordemCol]) {return 1;}
                    if(Object.values(a)[ordemCol] < Object.values(b)[ordemCol]) {return -1;}
                    return 0
                });
            } else {
                this.itens.sort(function(a,b){
                    if(Object.values(a)[ordemCol] < Object.values(b)[ordemCol]) {return 1;}
                    if(Object.values(a)[ordemCol] > Object.values(b)[ordemCol]) {return -1;}
                    return 0
                });
            }
            if(this.buscar) {
                return this.itens.filter(res => {
                    for(let i = 0; i < res.length; i++) {

                        if((res[i]+"").toLowerCase().indexOf(this.buscar.toLowerCase()) >= 0){
                            return true;
                        }
                    } 
                    return false;
                });
            } 
            return this.itens;
        }
    }
}
</script>