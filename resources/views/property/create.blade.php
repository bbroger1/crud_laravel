@extends('property.master')

@section('content')
    <div class="container  my-3">
        <h1>Cadastro de imóveis</h1>
        <form action="<?= url('/imoveis/store'); ?>" method="POST">
            <?= csrf_field(); ?>
            <div class="form-group">
                <label>Título do imóvel</label>
                <input class="form-control" type="text" name="title" id="title">
            </div>

            <div class="form-group">
                <label>Descrição</label>
                <textarea class="form-control"name="description" id="description" cols="30" rows="5"></textarea>
            </div>
                <div class="form-group">
                <label>Valor de Locação</label>
                <input class="form-control" type="text" name="rental_price" id="rental_price">
            </div>
            <div class="form-group">
                <label>Valor de Venda</label>
                <input class="form-control" type="text" name="sale_price" id="sale_price">
            </div>
            <button class="btn btn-success" type="submit"><b>Cadastrar</b></button>
        </form>
    </div>
@endsection
