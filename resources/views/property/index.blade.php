@extends('property.master')

@section('content')
    <div class="container my-3">
    <h1>Listagem de Produtos</h1>
        <?php
        if (!empty($properties)) {
            echo "<table class='table table-striped table-hover'>";
            echo "<thead class='bg-primary text-white '>
                    <td>Título</td>
                    <td class='text-center'>Valor Locação</td>
                    <td class='text-center'>Valor Venda</td>
                    <td class='text-center'>Ações</td>
                </thead>";
            foreach ($properties as $property) {

                $linkReadMode = url('/imoveis/' . $property->uri);
                $linkEditItem = url('/imoveis/editar/' . $property->uri);
                $linkRemoveItem = url('/imoveis/remover/' . $property->uri);


                echo "<tr>
                        <td>{$property->title}</td>
                        <td class='text-center'>R$ " . number_format($property->rental_price, 2, ',', '.') . "</td>
                        <td class='text-center'>R$ " . number_format($property->sale_price, 2, ',', '.') . "</td>
                        <td class='text-center'><a class='btn btn-sm btn-primary mr-2' href='{$linkReadMode}'>Ver</a> <a href='{$linkEditItem}' class='btn btn-sm btn-warning mr-2'>Editar</a> <a href='{$linkRemoveItem}' class='btn btn-sm btn-danger'>Excluir</a></td>
                    </tr>";
            }
            echo "</table>";
        }
        ?>
    </div>
@endsection
