<?php

require_once('database/products.php');

$new_product = isset($_POST['novo_produto'][0]) ? $_POST['novo_produto'][0] : null;
$products = isset($_POST['produtos'][0]) ? $_POST['produtos'][0] : null;
$edit_product = isset($_POST['produto'][0]) ? $_POST['produto'][0] : null;
$delete_product = isset($_POST['excluir_produto']) ? $_POST['excluir_produto'] : null;


if(isset($new_product)){

    $valor = str_replace('.', "", $new_product['valor']);
    $product = new Product($new_product['nome'], $new_product['descricao'], floatval($valor), $new_product['id_empresa']);
    try {
        $product->newProduct();
        echo 'novo_produto';
    } catch(Exception $e){
        echo 'erro_cadastro';
    }
    
}

if(isset($products)){
    $products = new Product(null, null, null, $products['id_empresa']);
    $return = $products->getProducts();
    $data = array();
    foreach($return as $r){
        array_push($data, $r);
    }
    echo json_encode($data);
}

if(isset($edit_product)){

    $valor = str_replace('.', "", $edit_product['valor']);
    $product = new Product($edit_product['nome'], $edit_product['descricao'], floatval($valor), $edit_product['id_empresa']);
    $return =  $product->editProduct($edit_product['id_produto']);
    if($return != false){
        echo 'produto_editado';
    } else {
        echo 'produto_nao_encontrado';
    }

}

if(isset($delete_product)){

    $delete = new Product(null, null, null, null);
    $return = $delete->deleteProduct(intval($delete_product));
    if($return != false){
        echo 'produto_excluido';
    } else {
        echo 'produto_nao_encontrado';
    }
}

?>