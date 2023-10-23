<?php

class Database {
    private $db = null;
    public function __construct($host, $user, $pass, $db) {
        $this->db = new mysqli($host, $user, $pass, $db);
    }
    public function login($email, $username, $pass) {
    $stmt = $this->db->prepare('SELECT  `emailcim`, `user`, `password` FROM `users` WHERE user = ? and emailcim = ? and password = ?');
    $stmt->bind_param("sss", $username, $email, $pass); 
    if ($stmt->execute()) {
        $stmt->store_result();
            if ($stmt->num_rows > 0) {
                $_SESSION['login'] = true;
                header("Location: index.php");
            } else {
                echo "Nem megfelelő bejelentkezési adat!"; 
            }
        }
        $stmt->close();
    }
    public function register($name, $pass1 , $emailcim, $orokbefogado_neve, $igazolvamyszam) {
        //$password = password_hash($pass, PASSWORD_BCRYPT);
        $stmt = $this->db->prepare('INSERT INTO `users`(`user`, `password`, `emailcim`, `orokbefogado_neve`, `igazolvanyszam`) VALUES(?,?,?,?,?);') ;
        $stmt->bind_param("sssss", $name, $pass1 , $emailcim, $orokbefogado_neve, $igazolvamyszam);
        try {
            if ($stmt->execute()) {
                $_SESSION['login'] = true;
                header("location: index.php");
            }
        } catch (Exception $e) {

            echo 'Error: ' . $e->getMessage();
        }
        /*if ($stmt->execute()) {
            //echo $stmt->affected_rows();
            $_SESSION['login'] = true;
            //header("Location: index.php");
        } else {
            $_SESSION['login'] = false;
            echo '<p>Rögzítés sikertelen!</p>';
        }*/
    }
    public function osszesallat(){
        $result = $this->db->query("SELECT * FROM `allat`");
        return $result->fetch_all(MYSQLI_ASSOC);        
    }
    public function getallatkivalasztas($id){
        $result = $this->db->query("SELECT * FROM `allat` WHERE allatid=".$id);
        return $result->fetch_all(MYSQLI_ASSOC);        
    }
    /*public function setKivalasztottAllat($allatid, $allat_neve, $faj, $fajta, $szuletesi_ido, $nem, $megjegyzes, $nyilvantartasban) {
        $stmt = $this->db->prepare("UPDATE `allat` SET `allat_neve`= ?,`faj`= ?,`fajta`= ?,`szuletesi_ido`= ?,`nem`= ?,`megjegyzes`= ?,`nyilvantartasban`= ? WHERE allatid= ?");
        $stmt->bind_param('isssssss', $allatid, $allat_neve, $faj, $fajta, $szuletesi_ido, $nem, $megjegyzes, $nyilvantartasban);
        return $stmt->execute();
    }*/
    public function getFajok() {
        $result = $this->db->query("SELECT DISTINCT `faj` FROM `allat`;");         
        return $result->fetch_all();
    }
    public function getfajtak() {
        $result = $this->db->query("SELECT DISTINCT `fajta` FROM `allat`;");         
        return $result->fetch_all();
    }
}