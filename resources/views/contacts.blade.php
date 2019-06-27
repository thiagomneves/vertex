@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="card mt-3">
            <div class="card-header d-flex justify-content-between">
                <h1 class="card-title">Contatos</h1>
                <div>
                    <a id="novoContato" class="btn btn-primary" href=""><i class="fas fa-plus"></i> Novo</a>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-hover">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Cep</th>
                        <th scope="col">Ações</th>
                    </tr>
                    </thead>
                    <tbody id="tbody">
                    </tbody>
                </table>

                <div class="card-footer d-flex justify-content-center">
                    <nav id="paginator">
                        <ul class="pagination">
{{--                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>--}}
{{--                            <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
{{--                            <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                            <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                            <li class="page-item"><a class="page-link" href="#">Next</a></li>--}}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modal')
    <div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="contactModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contactModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formContact" action="{{route('contact.store')}}" method="post">

                        <input type="hidden" id="id" name="id">

                        <div class="row">

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="name">Nome</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nome">
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="phone">Telefone</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Telefone">
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="E-mail">
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="cep">CEP</label>
                                    <input type="text" class="form-control" id="cep" name="cep" placeholder="CEP">
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="street">Logradouro</label>
                                    <input type="text" class="form-control" id="street" name="street" placeholder="Logradouro">
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="number">Número</label>
                                    <input type="text" class="form-control" id="number" name="number" placeholder="Número">
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="complement">Complemento</label>
                                    <input type="text" class="form-control" id="complement" name="complement"
                                           placeholder="Complemento">
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="district">Bairro</label>
                                    <input type="text" class="form-control" id="district" name="district" placeholder="Bairro">
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="city">Cidade</label>
                                    <input type="text" class="form-control" id="city" name="city" placeholder="Cidade">
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="state">Estado</label>
                                    <input type="text" class="form-control" id="state" name="state" placeholder="Estado">
                                </div>
                            </div>

                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button id="btnSave" type="button" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<script>
    $(document).ready(function () {
        $("#cep").mask("99999-999");
        $("#phone").mask("(99) 99999-9999");

        $('#cep').focusout(function () {
            const cep = $(this).val().replace(/[^\d]+/g,'');
            $.get(`https://viacep.com.br/ws/${cep}/json/`, function (data) {
                if (data) {
                    $('#street').val(data.logradouro);
                    $('#complement').val(data.complemento);
                    $('#district').val(data.bairro);
                    $('#city').val(data.localidade);
                    $('#state').val(data.uf);
                }
            });
        });

        carregarContatos(1);

    });

    function carregarContatos(pagina) {
        $('#tbody').html('');
        $.getJSON('/contact/json', {page: pagina}, function (data) {
            if (data) {
                data.data.forEach(function (contact) {
                    montaLinha(contact);
                    montarPaginator(data);
                    $("#paginator>ul>li>a").click(function(){
                        carregarContatos($(this).attr('pagina'));
                    })
                });
            }
        });
    }

    function montaLinha(contact) {
        let tableLine = `<tr id="tr${contact.id}">
                    <th scope="row">${contact.id}</th>
                        <td>${contact.name}</td>
                        <td><a href="tel:${contact.phone}">${contact.phone}</a></td>
                        <td><a href="mailto:${contact.email}">${contact.email}</a></td>
                        <td>${contact.cep}</td>
                        <td><button class="btn btn-primary btn-sm" onclick="editarContato('${contact.id}')" title="Editar ${contact.name}"><i class="fas fa-edit"></i> Editar</button>
                        <button class="btn btn-danger btn-sm" onclick="removerContato('${contact.id}')"  title="Excluir ${contact.name}"><i class="fas fa-times"></i> Excluir</button></td>
                    </tr>`;
        $('#tbody').append(tableLine)
    }

    function getItemAnterior(data) {
        i = data.current_page -1;
        if (1 == data.current_page)
            s= '<li class="page-item active disabled">';
        else
            s= '<li class="page-item">';
        s += '<a class="page-link" '+ ' pagina="' + i +'" href="javascript:void(0)">Anterior</a></li>';
        return s;
    }
    
    function getItemProximo(data) {
        i = data.current_page +1;
        if(data.last_page == data.current_page)
            s= '<li class="page-item disabled">';
        else
            s= '<li class="page-item">';
        s += '<a class="page-link" '+ ' pagina="' + i +'" href="javascript:void(0)">Proximo</a></li>';
        return s;
    }
    
    function getItem(data, i) {
        if (i == data.current_page)
            s= '<li class="page-item active">';
        else
            s= '<li class="page-item">';
        s += '<a class="page-link" '+ ' pagina="' + i +'" href="javascript:void(0)">' + i + '</a></li>';
        return s;
    }

    function montarPaginator(data) {
        $('#paginator>ul>li').remove();
        $('#paginator>ul').append(getItemAnterior(data));

        n = 10;
        if(data.current_page - n/2 <= 1)
            inicio = 1;
        else if (data.last_page - data.current_page < n)
            inicio = data.last_page - n + 1
        else
            inicio = data.current_page - n/2;
        inicio = 1;
        fim = data.last_page <= inicio + n - 1 ? data.last_page : inicio + n - 1;
        for(i=1;i<=fim;i++) {
            s = getItem(data, i);
            $('#paginator>ul').append(s)
        }
        $('#paginator>ul').append(getItemProximo(data));
    }

    $('#novoContato').click(function (e) {
        e.preventDefault();
        $('#contactModalLabel').html('Novo Contato');
        $('#id').val('');
        $('#name').val('');
        $('#phone').val('');
        $('#email').val('');
        $('#cep').val('');
        $('#street').val('');
        $('#number').val('');
        $('#complement').val('');
        $('#district').val('');
        $('#city').val('');
        $('#state').val('');
        $('#contactModal').modal('show');
    });

    function editarContato(id) {
        $.getJSON('/contact/' + id, function (data) {
            if (data) {
                $('#contactModalLabel').html('Editar Contato');
                $('#id').val(data.id);
                $('#name').val(data.name);
                $('#phone').val(data.phone);
                $('#email').val(data.email);
                $('#cep').val(data.cep);
                $('#street').val(data.email);
                $('#number').val(data.number);
                $('#complement').val(data.complement);
                $('#district').val(data.district);
                $('#city').val(data.city);
                $('#state').val(data.state);
                $('#contactModal').modal('show');
            }
        });
    }

    function removerContato(id) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            type: "DELETE",
            url: '/contact/' + id,
            content: this,
            success: function () {
                $('#tr' + id).fadeOut();
            },
            error: function (error) {
                console.log(error)
            }
        });
    }

    $('#btnSave').click(function () {
        if ($('#id').val() != '') {
            salvarContato();
        } else {
            criarContato();
        }

        $('#contactModal').modal('hide');
    });


    function criarContato() {

        let contact = {
            name: $('#name').val(),
            phone: $('#phone').val(),
            email: $('#email').val(),
            cep: $('#cep').val(),
            street: $('#street').val(),
            number: $('#number').val(),
            complement: $('#complement').val(),
            district: $('#district').val(),
            city: $('#city').val(),
            state: $('#state').val(),
            _token: '{{ csrf_token() }}'
        };
        $.post('/contact', contact, function (data) {
            montaLinha(JSON.parse(data));
        });
    }

    function salvarContato() {

        let id = $('#id').val();
        let contact = {
            id: $('#id').val(),
            name: $('#name').val(),
            phone: $('#phone').val(),
            email: $('#email').val(),
            cep: $('#cep').val(),
            street: $('#street').val(),
            number: $('#number').val(),
            complement: $('#complement').val(),
            district: $('#district').val(),
            city: $('#city').val(),
            state: $('#state').val(),
            _token: '{{ csrf_token() }}'
        };
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            type: "PUT",
            url: '/contact/' + id,
            content: this,
            data: contact,
            success: function (data) {
                if(data) {
                    let contact = JSON.parse(data);
                    let tableLine = `                    <th scope="row">${contact.id}</th>
                        <td>${contact.name}</td>
                        <td><a href="tel:${contact.phone}">${contact.phone}</a></td>
                        <td><a href="mailto:${contact.email}">${contact.email}</a></td>
                        <td>${contact.cep}</td>
                        <td><button class="btn btn-primary btn-sm" onclick="editarContato('${contact.id}')" title="Editar ${contact.name}"><i class="fas fa-edit"></i> Editar</button>
                        <button class="btn btn-danger btn-sm" onclick="removerContato('${contact.id}')"  title="Excluir ${contact.name}"><i class="fas fa-times"></i> Excluir</button></td>`;
                    $('#tr'+ id).html(tableLine);
                }
            },
            error: function (error) {
                console.log(error)
            }
        });
    }



</script>
@endsection