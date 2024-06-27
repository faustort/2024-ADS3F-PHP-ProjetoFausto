<?php

class Database
{
    private $host = "localhost";
    private $dbname = "test";
    private $user = "root";
    private $password = "";
    public $conn;

    public function getConnection()
    {
        // try = tente realizar o código abaixo
        try {
            // vamos iniciar a conexão PDO com o banco
            $this->conn = new PDO(
                // primeiro parâmetro é a string de conexão
                // ex: mysql:host=endereço;dbname=nomedobanco
                "mysql:host=" . $this->host . ";dbname=" . $this->dbname,
                // usuário do banco de dados
                $this->user,
                // senha do banco de dados
                $this->password
            );
        // Pegue o erro caso não consiga conexão 
        } catch (PDOException $e) {
            // tranforme a conexão em nula
            $this->conn = null;
            // escreva o erro
            echo "Erro de conexão com o banco: " . $e->getMessage();
        }
        // retorne a conexão seja ela completa ou nula
        return $this->conn;
    }
}
