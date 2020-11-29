@extends('property.master')

@section('content')
    <div class="container my-3">
        <?php
        if (!empty($property)) {
            foreach ($property as $prop) { ?>
                <h2><?= $prop->title; ?></h2>

                <p>Descrição: <?= $prop->description; ?></p>
                <p>Valor de Locação: R$ <?= number_format($prop->rental_price, 2, ',', '.'); ?></p>
                <p>VAlor de Venda: R$ <?= number_format($prop->sale_price, 2, ',', '.'); ?></p>
        <?php }
        }
        ?>
    </div>
@endsection
