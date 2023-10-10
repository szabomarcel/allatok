<?php
    // --a visszaküldendő fajl tartalmának a beállitása
    header('Content-Type: text/html; charset=utf-8');
    session_start(); //-- munkamenet adatainak tárolására $_SESSION[]
    require_once './class/Database.php';
    $db = new Database("localhost", "root", "", "menhely");    
    if(!isset($_SESSION['login'])) {$_SESSION['login'] = false;}

    require_once './layout/head.php';
?>
<body>
<?php
    $menu = filter_input(INPUT_GET, 'menu');
    require_once './layout/header.php';
    require_once './layout/menu.php';
    require_once './tartalom.php';
    require_once './layout/footer.php';
?>    
<script src="./bootstrap-5.2.3-dist/js/bootstrap.bundle.min.js"></script>    
</body>
</html>
