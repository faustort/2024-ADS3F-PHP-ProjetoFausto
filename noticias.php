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
            
            $stmt = $db->prepare("SELECT * FROM noticias");
            $stmt->execute();

            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);


            foreach( $resultado as $row ) {
                echo "<h2>". $row["titulo"] ."</h2>";
                echo "<article>". $row["texto"]."</article>";
            }

            ?>


        </div>
    </div>
</div>


<?php
include "footer.php";
?>