<?php
$titulo = "Inserir notícia";
include "header.php";

require_once "connection/Database.php";

// pergunto se a página esta sendo acessada
// por meio de POST ou se é uma requisição normal
// de navegação
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // aqui começo a receber as variáveis postadas
    $titulo = $_POST['titulo'];
    $data = $_POST['data'];
    $texto = $_POST['texto'];

    // aqui inicio o processo instanciar o banco
    $database = new Database();
    $db = $database->getConnection();

    // aqui começo a preparar a consulta de inserção
    $stmt  = $db->prepare("
            INSERT INTO noticias 
                (titulo, data, texto) 
            VALUES (:titulo, :data, :texto)
        ");
    // aqui começo a substituir os valores
    // acima pelas variáveis adquiridas 
    $stmt->bindParam(":titulo", $titulo);
    $stmt->bindParam(":data", $data);
    $stmt->bindParam(":texto", $texto);

    // aqui pergunto se deu tudo certo com a 
    // inserção dos dados
    if ($stmt->execute()) {
        echo '<div class="alert alert-success text-center">Conseguimos inserir a notícia</div>';
    } else {
        echo 'Estamos com problema o inserir';
    }
}


?>

<div class="container">

    <div class="row">

        <div class="col">

            <form action="" method="post">
                <label for="titulo" class="form-label">Digite o título da notícia</label>
                <input type="text" name="titulo" id="titulo" class="form-control">
                <label for="data" class="form-label">Digite a data da notícia</label>
                <input type="text" name="data" id="data" class="form-control">
                <label for="texto" class="form-label">Digite o conteúdo da notícia</label>
                <textarea class="form-control" name="texto" id="texto"></textarea>

                <button type="submit">Enviar</button>


            </form>

        </div>

    </div>

</div>


<?php

include "footer.php";

?>