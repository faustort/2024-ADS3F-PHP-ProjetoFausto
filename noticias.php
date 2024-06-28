<?php
include "header.php";
?>

<div class="container">
    <div class="row">
        <div class="col">

            <?php
            if (!isset($_SESSION['nome'])) {

                $_SESSION['nome'] = $nome;
            }

            echo $_SESSION['nome'];
            require_once "connection/Database.php";
            session_destroy();

            $database = new Database();
            $db = $database->getConnection();

            // preparação do SQL da consulta
            $stmt = $db->prepare("SELECT * FROM noticias");
            // execução da consulta 
            // mas pq preciso executar? Pq eu posso preparar e depois 
            // criar parametros de inserção na consulta 
            // neste caso eu chamo a execução
            $stmt->execute();

            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($resultado as $row) :
            ?>
                <article>
                    <h2><?php echo $row['titulo']; ?></h2>
                    <div><?php echo $row['texto']; ?></div>
                </article>
            <?php
            endforeach;
            ?>
        </div>
    </div>
</div>


<?php
include "footer.php";
?>