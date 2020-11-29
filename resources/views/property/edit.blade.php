@extends('property.master')

@section('content')
    <div class="container  my-3">
        <h1>Editar de imóveis</h1>

        <?php foreach ($property as $prop) { ?>
            <form action="<?= url('/imoveis/update', ['id' => $prop->id]); ?>" method="POST">
                <?= csrf_field(); ?>
                <?= method_field('PUT'); ?>

                <div class="form-group">
                    <label>Título do imóvel</label>
                    <input class="form-control" type="text" name="title" id="title" value="<?= $prop->title; ?>">
                </div>

                <div class="form-group">
                    <label>Descrição</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="5"><?= $prop->description; ?></textarea>
                </div>
                <div class="form-group">
                    <label>Valor de Locação</label>
                    <input class="form-control" type="text" name="rental_price" id="rental_price" value="<?= $prop->rental_price; ?>">
                </div>
                <div class="form-group">
                    <label>Valor de Venda</label>
                    <input class="form-control" type="text" name="sale_price" id="sale_price" value="<?= $prop->sale_price; ?>">
                </div>

                <button class="btn btn-success" type="submit">Editar Imóvel</button>
            </form>
        <?php } ?>
    </div>
@endsection
