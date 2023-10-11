<?php
    if(filter_input(INPUT_POST, "regisztraciosAdatok", FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE)){
        $pass1 = filter_input(INPUT_POST, "InputPassword");
        $pass2 = filter_input(INPUT_POST, "InputPassword2");
        $emailcim = filter_input(INPUT_POST, "emailcim");
        $orokbedogado_neve = filter_input(INPUT_POST, "orokbefogado_neve");
        $igazolvanyszam = filter_input(INPUT_POST, "igazolvanyszam");
        $name = htmlspecialchars(filter_input(INPUT_POST, "username"));
        //var_dump($pass1, $pass2, $emailcim, $orokbedogado_neve, $igazolvanyszam);
        if($pass1 != $pass2){
            echo '<p>Nem egyezik meg a jelszó</p>';
        }else{
            //-- regisztráció inditása
            $db -> register($name, $pass1, $emailcim, $orokbedogado_neve, $igazolvanyszam);
            header("Location: index.php"); // Átvált a nyitólapra.
        }
    }    
?>
<div class="container">
    <form action="#" method="post">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Felhasználói név: </label>
          <input type="text" class="form-control" id="username" name="username" aria-describedby="usernameHelp" minlength="3" maxlength="50" required>
          <div id="usernameHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
          <label for="emailcim" class="form-label">Emailcim: </label>
          <input type="email" class="form-control" id="emailcim" name="emailcim" required>
        </div>
        <div class="mb-3">
          <label for="orokbefogado_neve" class="form-label">Örökbefogado neve: </label>
          <input type="orokbefogado_neve" class="form-control" id="orokbefogado_neve" name="orokbefogado_neve" required> 
        </div>
        <div class="mb-3">
          <label for="igazolvanyszam" class="form-label">Igazolvanyszam: </label>
          <input type="igazolvanyszam" class="form-control" id="igazolvanyszam" name="igazolvanyszam" pattern="[1-9]{1}[0-9]{5}[A-Za-z]{2}" required>
        </div>
        <div class="mb-3">
          <label for="InputPassword" class="form-label">Jelszó: </label>
          <input type="password" class="form-control" id="InputPassword" name="InputPassword" required>
        </div>
        <div class="mb-3">
          <label for="InputPassword2" class="form-label">Jelszó: </label>
          <input type="password" class="form-control" id="InputPassword2" name="InputPassword2" required>
        </div>
        <button type="submit" class="btn btn-primary" name="regisztraciosAdatok" value="true">Regisztáció</button>
    </form>
</div>
