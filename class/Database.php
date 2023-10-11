<?php
class Database{
    private $db = null;
    public function __construct($host,  $username, $pass, $db) {
        $this->db = new mysqli($host,$username, $pass, $db);
    }
    public function login($name, $pass) {
        //-- jelezzük a végrehajtandó SQL parancsot
        $stmt = $this->db->prepare('SELECT * FROM `users` WHERE user LIKE ?;');
        //-- leküldjük a végrehajtáshoz szükséges adatok
        $stmt -> bind_param("s", $name);
        if($stmt ->execute()){
            //-- sikeres végrehajtás után lekérjük az adatokat
            $result = $stmt ->get_result();
            $row = $result ->fetch_assoc();
            var_dump($row);            
            if ($pass == $row['password']) {
               //-- felhasználónév és jelszó helyes
                $_SESSION['username'] = $row['user'];
                $_SESSION['login'] = true;
            } else {
                $_SESSION['username'] = '';
                $_SESSION['login'] = false;
            }
            /*echo '<pre>';
            var_dump($row);
            echo '</pre>';
            echo "Return rows atr: " . $result->num_rows;*/
            //Free result set
            $result->free_result();
        }
        return false;
    }
    
    public function register($name, $pass, $emailcim, $orokbedogado_neve, $igazolvamyszam) {
        //$password = password_hash($pass, PASSWORD_BCRYPT);
        $stmt = $this->db->prepare('INSERT INTO `users`(`user`, `password`, `emailcim`, `orokbefogado_neve`, `igazolvanyszam`) VALUES(?,?,?,?,?);') ;
        $stmt->bind_param("sssss", $name, $pass, $emailcim, $orokbedogado_neve, $igazolvamyszam);
        if ($stmt->execute()) {
            //echo $stmt->affected_rows();
            $_SESSION['login'] = true;
            //header("Location: index.php");
        } else {
            $_SESSION['login'] = false;
            echo '<p>Rögzítés sikertelen!</p>';
        }
    }
}