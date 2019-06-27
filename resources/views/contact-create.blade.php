@extends('layouts.app')

@section('content')

    <div class="container mt-4">
        <form action="{{route('contact.store')}}">
            @csrf

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

            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>

@endsection

@section('javascript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#cep").mask("99.999-999");
            $("#phone").mask("(99) 99999-9999");

            $('#cep').focusout(function () {
                const cep = $(this).val();
                $.get(`https://viacep.com.br/ws/${cep}/json/`, function (data) {
                    console.log(data)
                    if (data) {
                        $('#street').val(data.logradouro)
                        $('#complement').val(data.complemento)
                        $('#district').val(data.bairro)
                        $('#city').val(data.localidade)
                        $('#state').val(data.uf)
                    }
                });
            })
        })
    </script>
@endsection