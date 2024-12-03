<?php
class Mysql{
    private $conn;
    public function __construct($servername, $dbname, $username, $password)
    {
        $this->conn = new PDO(
            "mysql:host=$servername;dbname=$dbname",
            $username,
            $password
        );
        $this->conn->setAttribute(
            PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION
        );
    }

    public function login($userName, $password){
        $flag=0;
        $query ="SELECT * FROM user";

        $stmt=$this->conn->prepare($query);
        $stmt->execute();

        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $user) {
            if($user['name']==$userName && $user['user_pass']==$password){
                $flag=1;
                return true; 
            }
        }

        if($flag==0){
            return false;
        }

    }

    public function usuarioExiste($user){
        $query="SELECT * FROM user WHERE name=:user";
        
        $stmt=$this->conn->prepare($query);
        $stmt->bindParam(':user', $user);
        $stmt->execute();

        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        if(empty($result)){
            return false;
        }else{
            return true;
        }
    }

    public function insertarUsuario($name, $pass){
        $query="
        INSERT INTO user (name, user_pass)
        VALUES(:name, :pass)
        ";
        $stmt=$this->conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':pass',  $pass);
        $stmt->execute();
    }

    public function pesoSemanaPasada($user){
        $query='
        SELECT weight FROM weight
        WHERE user_name=:user
        ORDER BY id DESC
        LIMIT 1 
        ';

        $stmt=$this->conn->prepare($query);
        $stmt->bindParam(':user', $user);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertarPeso($peso){
        $query='
        INSERT INTO weight(user_name, weight)
        VALUES(:user, :peso)
        ';

        $stmt=$this->conn->prepare($query);
        $stmt->bindParam(':user', $_SESSION['user']);
        $stmt->bindParam(':peso', $peso);
        $stmt->execute();
    }

    public function getId($user){
        $query='
        SELECT id FROM user
        WHERE name=:user
        ';

        $stmt=$this->conn->prepare($query);
        $stmt->bindParam(':user', $user);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertarObjetivo($id,$obj){
        $query='
        INSERT INTO objetivo(id, tipo_objetivo)
        VALUES(:id, :obj)
        ';

        $stmt=$this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':obj', $obj);
        $stmt->execute();
    }

    public function actualizarObjetivo($id, $obj){
        $query='
        UPDATE objetivo
        SET tipo_objetivo=:obj
        WHERE id=:id
        ';

        $stmt=$this->conn->prepare($query);
        $stmt->bindParam(':id', $id[0]['id']);
        $stmt->bindParam(':obj', $obj);
        $stmt->execute();
    }

    public function getObjtivo($id){
        $query='
        SELECT tipo_objetivo FROM objetivo
        WHERE id=:id
        ';

        $stmt=$this->conn->prepare($query);
        $stmt->bindParam(':id', $id[0]['id']);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function datos(){
        $query='
        SELECT weight, date_weighted
        FROM weight
        WHERE user_name=:name
        ';

        $stmt=$this->conn->prepare($query);
        $stmt->bindParam(':name', $_SESSION['user']);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
