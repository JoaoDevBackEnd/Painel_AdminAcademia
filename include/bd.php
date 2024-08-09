<?php
class Conexao {

    private $dsn;
    private $user;
    private $senha;
    private $bd;

    public function banco() {

		$this->dsn = "mysql:dbname=academia;host=localhost";
		$this->user = "root";
		$this->senha = "";

        $this->bd = new PDO($this->dsn, $this->user, $this->senha);
        
        return $this->bd;
    }

}

$Conexao = new Conexao();
$db = $Conexao->banco();

session_start();

?>