<?php
    /*function validSzig($param) {
      $pattern = "/[1-9]{1}[0-9]{5}[A-Za-z]{2}/";
      echo '<pre>';
      var_dump("123", preg_match($pattern, "123"));
      var_dump("12356AA", preg_match($pattern, "123"));
      echo '</pre>';
      return preg_match($pattern, $param);
    }*/

    if(filter_input(INPUT_POST, "regisztraciosAdatok", FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE)){
        $pass1 = filter_input(INPUT_POST, "InputPassword");
        $pass2 = filter_input(INPUT_POST, "InputPassword2");
        $emailcim = filter_input(INPUT_POST, "emailcim");
        $orokbefogado_neve = filter_input(INPUT_POST, "orokbefogado_neve");
        $igazolvanyszam = filter_input(INPUT_POST, "igazolvanyszam");
        $name = htmlspecialchars(filter_input(INPUT_POST, "username"));
        var_dump($pass1, $pass2, $emailcim, $orokbefogado_neve, $igazolvanyszam);
        if($pass1 != $pass2){
            echo '<p>Nem egyezik meg a jelszó</p>';
        }else{
            //-- regisztráció inditása
            $db -> register($name, $pass1, $emailcim, $orokbefogado_neve, $igazolvanyszam);
            header("Location: index.php"); // Átvált a nyitólapra.
        }
    }    
?>
<div class="container">
    <form action="#" method="post">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Felhasználói név: </label>
          <input type="text" class="form-control" id="username" name="username" aria-describedby="usernameHelp" minlength="3" maxlength="50" aria-describedby="emailHelp" required>
          <div id="usernameHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="row">
          <div class="mb-3 col-7 has validation">
            <label for="emailcim" class="form-label">Email cim: </label>
            <input type="email" class="form-control" id="emailcim" minlength="1" name="emailcim" required>
          </div>
          <div class="mb-3 col-5">
            <label for="igazolvanyszam" class="form-label">Igazolvanyszam: </label>
            <input type="text" class="form-control" id="igazolvanyszam" name="igazolvanyszam" pattern="[1-9]{1}[0-9]{5}[A-Za-z]{2}" maxlength="8" required>
          </div>
        </div>
        <div class="mb-3">
          <label for="orokbefogado_neve" class="form-label">Örökbefogado neve: </label>
          <input type="text" class="form-control" id="orokbefogado_neve" name="orokbefogado_neve" pattern="[A-Za-z]{0,10}" minlength="1" required> 
        </div>        
        <div class="row">
          <div class="mb-3 col-6">
            <label for="InputPassword" class="form-label">Jelszó: </label>
            <input type="password" class="form-control" id="InputPassword" name="InputPassword" pattern="[A-Za-z]{0,100}" minlength="2" required>
          </div>
          <div class="mb-3 col-6">
            <label for="InputPassword2" class="form-label">Jelszó: </label>
            <input type="password" class="form-control" id="InputPassword2" name="InputPassword2" pattern="[A-Za-z]{0,100}" minlength="2" required>
          </div>
        </div>
        <button type="submit" class="btn btn-primary" name="regisztraciosAdatok" value="true">Regisztáció</button>
    </form>
</div>