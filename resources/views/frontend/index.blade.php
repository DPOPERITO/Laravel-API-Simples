@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h2>Teste de uso API.</h2>
            <hr>
            <h4>Cadastro.</h4>
            <form class="row row-cols-lg-auto g-3 align-items-center">
                <div class="row mb-3">
                    <label for="colFormLabel" class="col-sm-4 col-form-label">Nome</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="nome" placeholder="Nome">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="colFormLabel" class="col-sm-4 col-form-label">Descrição</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="descricao" placeholder="Descrição">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="colFormLabel" class="col-sm-12 col-form-label">Tensão elétrica</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="tensao" placeholder="Tensão">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="colFormLabel" class="col-sm-12 col-form-label">Marca</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="marca" placeholder="Marca">
                    </div>
                </div>
                <button class="btn btn-primary" type="button" onclick="createEletro()">Salvar</button>
            </form>
        </div>

        <div class="row mt-5">
            <h4>Listagem de dados</h4>
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <td>#</td>
                        <td>Nome</td>
                        <td>Marca</td>
                        <td>Tensão</td>
                        <td>Descrição</td>
                        <td class="text-center">Ação</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dados as $item)
                        <tr>
                            <th>{{ $item->id }}</th>
                            <th>{{ $item->nome }}</th>
                            <th>{{ $item->marca }}</th>
                            <th>{{ $item->tensao }}</th>
                            <th>{{ $item->descricao }}</th>
                            <th class="text-center">
                                <button class="badge btn btn-warning">Editar</button>
                                <button class="badge btn btn-danger"
                                    onclick="deleteEletro({{ $item->id }})">Deletar</button>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex">
                {{ $dados->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
    <script type="application/javascript">

    function deleteEletro(vId) {
        if(confirm("Você confirma e exclusão do registro "+vId+"?")) 
        {
            $.ajax({
            url: '{{ route('eletro.delete') }}',
            type: "POST",
            data: {
                id: vId
            },
            cache: false,
            success: function(data) {
                toastrss(data);
            }
        });
        }
    }
    function createEletro() {
        var vNome = $("#nome").val();
        var vDescricao = $("#descricao").val();
        var vTensao = $("#tensao").val();
        var vMarca = $("#marca").val();
        $.ajax({
            url: '{{ route('eletro.create') }}',
            type: "POST",
            data: {
                nome: vNome,
                descricao: vDescricao,
                tensao: vTensao,
                marca_id: vMarca
            },
            cache: false,
            success: function(data) {
                toastrss(data);
            }
        });
    }
        function toastrss(data) {
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
                "newestOnTop": false,
                "showMethod": 'slideDown',
                "hideMethod": 'slideUp',
                "closeMethod ": 'slideUp',
                "timeOut": "2000",
                "showDuration": "1000",
                
            } 
            if (data.nome == "De um nome ao eletrodoméstico.") {
                toastr.warning(data.nome);
            } else if (data.descricao == "A descrição precisa existir." || data.descricao == "A descrição deverá conter ao menos 5 caracteres.") {
                toastr.warning(data.descricao);
            } else if (data.tensao == "Selecione uma tenção elétrica.") {
                toastr.warning(data.tensao);
            } else if (data.marca_id == "Selecione a marca.") {
                toastr.warning(data.marca_id);
            } else if (data.Success) {
                toastr.options = {
                    "progressBar": true,
                    "closeButton": true,
                    "newestOnTop": false,
                    "showDuration": "500",
                    "onHidden": function() {
                        location.reload();
                    }
                }
                toastr.success(data.Success);
            } else {
                toastr.options = {
                    "progressBar": true,
                    "closeButton": true,
                    "newestOnTop": false,
                    "showDuration": "500",
                    "onHidden": function() {
                        location.reload();
                    }
                }
                toastr.success("Registro inserido com sucesso.");
            }    
        }
    </script>
@endsection
