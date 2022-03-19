<?php 

require_once('database/database-app.php');

session_start();

if(isset($_POST['id'])){
    
    $data = array();

    $queryGetBusiness = 'SELECT * FROM business WHERE id = :ID';
    $param = ['ID' => intval($_POST['id'])];

    $connect = new DatabaseApp();
    $business = $connect->Sql($queryGetBusiness, $param);
    $business = $business->fetchAll(PDO::FETCH_ASSOC);

    $data['business'] = $business;

    $queryGetActivities = 'SELECT id, activity, description, DATE_FORMAT(activity_date, "%d/%m/%Y") as date FROM activities WHERE id_company = :ID_COMPANY';
    $param = ['ID_COMPANY' => intval($_POST['id'])];
    
    $activities = $connect->Sql($queryGetActivities, $param);
    $activities = $activities->fetchAll(PDO::FETCH_ASSOC);



    $html_activities = "";
    if(count($activities) == 0){
     $html_activities .= "<p class='atividade'> Nenhuma atividade registrada neste negócio.</p>";
    } else {
        foreach($activities as $activity){
            $html_activities .= "  <div class='atividade' rel='{$activity['id']}'>
                                    <div class='row'>
                                        <div class='col-md-12'>
                                                <h6>
                                                 <i class='material-icons' style='position:relative; top:5px;'>";
                                    if($activity['activity'] == "C"){
                                            $html_activities .= "call </i> Ligação";
                                    } else if($activity['activity'] == "E"){
                                        $html_activities .= "email </i> E-mail";
                                    } else if($activity['activity'] == "D"){
                                        $html_activities .= "computer </i> Demonstração";
                                    } else {
                                        $html_activities .= "people </i> Pós-Venda";
                                    }
                            $html_activities .= "<div class='data'>{$activity['date']}</div>
                                                </h6>
                                                <p>  Descrição: 
                                                    <span class='desc-atividade'> 
                                                      {$activity['description']}
                                                    <span>
                                                </p> 
                                            </div>
                                        </div>
                                    </div>
                                </div>";
        }
    }

    $data['activities'] = $html_activities;


    echo json_encode($data);
}

if(isset($_POST['etapa'])){
   $queryStage = 'UPDATE business set stage = :STAGE WHERE id = :ID';
   $params = ['STAGE' => $_POST['etapa'], 'ID' => intval($_POST['id_negocio'])];
   
   $connect = new DatabaseApp();
   $connect->Sql($queryStage, $params);
    
}


if(isset($_POST['atividade'])){
    $atividade = explode('&', $_POST['atividade']);
    foreach($atividade as $a){
        $a = explode('=', $a); //Explode na variável $atividade para armazenar parametros que vieram como string.
        $dados[$a[0]] = $a[1];
    }

    $db = new DatabaseApp();

    if($dados['id_atividade'] != ""){
        $queryActivity = "UPDATE activities SET activity = :ACTIVITY,  activity_date = :DATE, description = :DESCRIPTION WHERE id = :ID";
        $params = ['ID' => $dados['id_atividade'], 'ACTIVITY' => $dados['tipo-atividade'], 'DATE' => $dados['data-atividade'], 'DESCRIPTION' => $dados['desc-atividade']];
    } else {
        $queryActivity = "INSERT INTO activities (id_company, id_user, activity, activity_date, description) VALUES (:ID_COMPANY, :ID_USER, :ACTIVITY, :DATE, :DESCRIPTION)";
        $params = ['ID_COMPANY' => $dados['id-negocio'], 'ID_USER' => $_SESSION['user']['id'], 'ACTIVITY' => $dados['tipo-atividade'], 'DATE' => $dados['data-atividade'], 'DESCRIPTION' => $dados['desc-atividade']];
    }

    try{
        $db->Sql($queryActivity, $params);
        echo 'atividade_atualizada';
    } catch (Exception $e){
        echo 'erro';
    }
}

if(isset($_GET['id_atividade'])){
    $queryGetActivity = 'SELECT description, activity_date as date, activity FROM activities WHERE id = :ID';
    $param['ID'] = intval($_GET['id_atividade']);
    
    $db = new DatabaseApp();

    try {
      $activity = $db->Sql($queryGetActivity, $param);
      echo json_encode($activity->fetchAll(PDO::FETCH_ASSOC));
    } catch(Exception $e) {
      echo json_encode($e->getMessages());
    }
}

if(isset($_GET['id_company'])){
    $sqlProducts = 'SELECT b.id, b.id_product, b.quantity, p.value, p.name as product
                       FROM business_products as b
                       JOIN products as p on p.id = b.id_product
                    WHERE b.id_business =  :ID_COMPANY';
    $param = array('ID_COMPANY' => intval($_GET['id_company']));

    $db = new DatabaseApp();
    $products = $db->Sql($sqlProducts, $param);
    $products = $products->fetchAll(PDO::FETCH_ASSOC);

    if(count($products) > 0){
      echo json_encode($products);
    } else {
      echo 0;
    }
    
}

if(isset($_POST['novo_produto'])){


    $quantity = validateQuantity(intval($_POST['novo_produto']['quantidade']));
    $price = str_replace(array(',', '.'), "", $_POST['novo_produto']['preco']);
    if(strlen($price) >=  3) {
        $price = substr($price, 0, -2);
    } 

    $sqlNewProduct = 'INSERT INTO business_products (id_business, id_product, value, quantity) VALUES (:ID_COMPANY, :ID_PRODUCT, :VALUE, :QUANTITY)';
    $params = ['QUANTITY' => $quantity, 'ID_COMPANY' => intval($_POST['novo_produto']['id_empresa']),'ID_PRODUCT' => intval($_POST['novo_produto']['id_produto']), 'VALUE' => $price];

    $sqlGetValue = 'SELECT sum(value) as final_value from business_products WHERE id_business = :ID';
    $param = ['ID' => intval($_POST['novo_produto']['id_empresa'])];

    $db = new DatabaseApp();

    try{
        $new_product = $db->Sql($sqlNewProduct, $params, true);
    } catch(Exception $e){
        die(json_encode(array('error' => true)));
    }

    try{

       $value = $db->Sql($sqlGetValue, $param);
       $value = $value->fetch();

       updateCompany($value, intval($_POST['novo_produto']['id_empresa']));
       $product = getRegisterProduct(intval($new_product));

       echo json_encode(array('success' => 'produto_cadastrado', 'value' => $value, 'product' => $product));
    } catch(Exeception $e){
        echo json_encode(array('atualizar' => true));
    }
   
}

if(isset($_POST['edita_produto'])){
    $quantity = validateQuantity(intval($_POST['edita_produto']['quantidade']));
    $price = str_replace(array(',', '.', 'R$'), "", $_POST['edita_produto']['preco']);
    if(strlen($price) >=  3) {
        $price = substr($price, 0, -2);
    } 

    $sqlUpdateProduct = "UPDATE business_products set id_product = :ID_PRODUCT, quantity = :QUANTITY, 
                         value = :VALUE WHERE id = :ID";

    $params = ['ID_PRODUCT' => intval($_POST['edita_produto']['id_produto']), 'QUANTITY' => $quantity, 'VALUE' => $price, 
              'ID' => intval($_POST['edita_produto']['id'])];


    $sqlGetValue = 'SELECT sum(value) as final_value from business_products WHERE id_business = :ID';
    $param = ['ID' => intval($_POST['edita_produto']['id_empresa'])];


    
    try{
        $db = new DatabaseApp();
        $db->Sql($sqlUpdateProduct, $params);

        $value = $db->Sql($sqlGetValue, $param);
        $value = $value->fetch();

        updateCompany($value, intval($_POST['edita_produto']['id_empresa']));

        echo json_encode(['success' => 'produto_editado', 'value' => $value]);
    } catch(Exception $e){
        echo json_encode(['error' => true]);
    }

    
}

if(isset($_POST['delete'])){
    $sqlDeleteProduct = "DELETE FROM business_products WHERE id = :ID";
    $param = ["ID" => intval($_POST['delete'])];

    $sqlGetValue = 'SELECT sum(value) as final_value from business_products WHERE id_business = :ID_BUSINESS';
    $parameter = ['ID_BUSINESS' => intval($_POST['id_empresa'])];
    
    try{
      $db = new DatabaseApp();
      $db->Sql($sqlDeleteProduct, $param);

      $value = $db->Sql($sqlGetValue, $parameter);
      $value = $value->fetch();

      updateCompany($value, intval($_POST['id_empresa']));

      echo json_encode(['success' => true, 'value' => $value]);
    } catch(Exeception $e){
       echo json_encode(['error' => true]);
    }


}

function validateQuantity($total)
{
    if($total > 100) { 
        $quantidade = 100;
    } else if($total < 1){
        $quantidade = 1;
    } else {
       $quantidade = $total;
    }

    return $quantidade;
}

function updateCompany($value, $id_company)
{
    $sqlUpdateValue = 'UPDATE business  set value = :VALUE WHERE id = :ID_COMPANY';
    $param = ['ID_COMPANY' => $id_company, 'VALUE' => $value[0]];

    $db = new DatabaseApp();
    $db->Sql($sqlUpdateValue, $param);

}
 
function getRegisterProduct($id)
{
    $sqlGetProduct= 'SELECT b.id, b.id_product, b.quantity, p.value, p.name as product
                      FROM business_products as b
                         JOIN products as p on p.id = b.id_product
                      WHERE b.id=  :ID';

    $param = ['ID' => $id];

    $db = new DatabaseApp();
    $product  = $db->Sql($sqlGetProduct, $param);

    return $product->fetchAll(PDO::FETCH_ASSOC);
}

?>