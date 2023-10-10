<?php
    // var_dump($ussername, $password);
    if (filter_input(INPUT_POST, 'belepesiAdatok', FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE)){
        // -- A kapott adatok feldolgozása;
        $username = htmlspecialchars(filter_input(INPUT_POST, 'username'));
        $password = htmlspecialchars(filter_input(INPUT_POST, 'InputPassword'));
        $db->login($username, $password);        
        if($username == 'Lajos' && $password == 'Lajos'){
           $_SESSION['login'] = true;
           $_SESSION['username'] = 'Lajos'; // változó érték
           $_SESSION['password'] = 'Lajos';
        }
    }
?>
<div class="container">
    <form action="#" method="post">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Felhasználói név: </label>
          <input type="text" class="form-control" id="username" name="username" aria-describedby="usernameHelp" >
          <div id="usernameHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" class="form-control" id="InputPassword" name="InputPassword">
        </div>
        <button type="submit" class="btn btn-primary" name="belepesiAdatok" value="true">Belépés</button>
        <a href="index.php?menu=regisztracio">Regisztáció</a>
    </form>
</div>
