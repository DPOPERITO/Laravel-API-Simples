@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h2>Teste de uso API.</h2>
            <hr>
            <h4>Cadastro.</h4>
            <form class="form-inline">
                <div class="row">
                    <div class="col-md-6">
                        <label><b>Nome</b></label>
                        <input type="text" class="form-control" id="nome" placeholder="Nome">
                    </div>

                    <div class="col-md-3">
                        <label><b>Marca</b></label>
                        <select class="form-control" name="marca" id="marca">
                            <option value="">Selecione...</option>
                            @foreach ($marcas as $marca)
                                <option value="{{ $marca->id }}">{{ $marca->nome }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label><b>Tensão elétrica</b></label>
                        <select class="form-control" name="tensao" id="tensao">
                            <option value="">Selecione</option>
                            <option value="127">127 Volts</option>
                            <option value="220">220 Volts</option>
                            <option value="380">380 Volts</option>
                            <option value="440">440 Volts</option>
                        </select>
                    </div>

                    <div class="col-md-12">
                        <label><b>Descrição</b></label>
                        <textarea class="form-control" id="descricao" placeholder="Descrição"> </textarea>
                    </div>

                    <div class="col-md-12 mt-4 text-center">
                        <button class="btn btn-primary" type="button" onclick="createEletro()">Salvar o registro</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="row mt-5">
            <h4>Listagem de dados</h4>
            <hr>
            <form action="{{ route('search') }}" method="post" class="mb-3">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <label><b>Nome</b></label>
                        <input class="form-control" type="text" value="{{ old('_nome') }}" name="_nome" placeholder="Nome do produto">
                    </div>
                    <div class="col-md-3">
                        <label><b>Marca</b></label>
                        <select class="form-control" name="_marca">
                            <option value="">Selecione...</option>
                            @foreach ($marcas as $marca)
                                <option value="{{ $marca->id }}" {{ (old('_marca') === $marca->id) ? 'selected' : '' }} >{{ $marca->nome }}</option>
                            @endforeach
                        </select>
                       
                    </div>
                    <div class="col-md-3">
                        <label><b>Tensão elétrica</b></label>
                        <select class="form-control" name="_tensao">
                            <option value="">Selecione</option>
                            <option value="127" {{ (old('_tensao') === 127) ? 'selected' : '' }}>127 Volts</option>
                            <option value="220" {{ (old('_tensao') === 220) ? 'selected' : '' }}>220 Volts</option>
                            <option value="380" {{ (old('_tensao') === 380) ? 'selected' : '' }}>380 Volts</option>
                            <option value="440" {{ (old('_tensao') === 440) ? 'selected' : '' }}>440 Volts</option>
                        </select>
                    </div>
                    <div class="col-md-2 mt-4">
                        <button type="submit" class="btn btn-info">Pesquisar</button>
                    </div>
                </div>
            </form>
        
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
                    @foreach ($eletro as $item)
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
            {{-- <div class="d-flex">
                {{ $dados->links('pagination::bootstrap-4') }}
            </div> --}}
        </div>
    </div>
    <script type="application/javascript">

    function deleteEletro(vId) {
        if(confirm("Você confirma e exclusão do registro "+vId+"?")) 
        {
            $.ajax({
            url: 'http://localhost/apiLaravel/public/api/eletro/delete',
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
            url: 'http://localhost/apiLaravel/public/api/eletro/create',
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
            },
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
