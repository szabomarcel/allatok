<?php
    if(filter_input(INPUT_POST, 'adatmodositas', FILTER_VALIDATE_BOOL, FILTER_NULL_ON_FAILURE)){
        $adatok = $_POST;
        var_dump($_FILTER);
        if($_FILES['kepfajl']['error'] == 0){
            $kiterjesztes = null;
            switch ($_FILES['kepfajl']['type']) {
                case 'image/png':
                    $kiterjesztes = '.png';
                    break;
                case 'image/jpeg':
                    $kiterjesztes = '.jpg';
                    break;
                default:
                    break;
            }
            $forras = $_FILES['kepfajl']['tmp_name'];
            $cel = DIRECTORY_SEPARATOR ."\\kepek\\allatkepek\\". DIRECTORY_SEPARATOR.$adatok['allat_neve'].$kiterjesztes;
            copy($cel, $forras);
        }
    }else{
        $adatok = $db->allatkivalasztas($id);
    }
    
?>
<!--array (size=8)
  'allatid' => string '7' (length=1)
  'allat_neve' => string 'Gazsi' (length=5)
  'faj' => string 'kutya' (length=5)
  'fajta' => string 'Mobsz' (length=5)
  'szuletesi_ido' => string '2021-01-11' (length=10)
  'nem' => string 'szuka' (length=5)
  'megjegyzes' => string 'csinos' (length=6)
  'nyilvantartasban' => string '2023-05-10' (length=10) -->
<form method="post"  enctype="multipart/form-data">
    <input type="hidden" name="allatid" >
    <div class="mb-3">
        <label for="allat_neve" class="form-label">Állat neve</label>
        <input type="text" class="form-control" name="allat_neve" id="allat_neve">
    </div>
    <div class="row">
        <div class="mb-3 col-6">
            <label for="fajselect" class="form-label">Allatfaj</label>            
            <select name="fajeselect" id="fajselect" class="form-select">
                <?php
                foreach ($db ->getFajok() as $value){
                    if($adatok['fajta'] == $value){
                        echo '<option select value="'.$value[0].'">'.$value[0].'</option>';
                    }else{
                        echo '<option value="'.$value[0].'">'.$value[0].'</option>';
                    }                    
                }
                ?>
            </select>            
        </div>
        <div class="mb-3 col-6">
            <label for="fajtaSelect" class="form-label">Állatfajta</label>
            <select id="fajtaSelect" name="fajtaSelect" class="form-select">
                <?php
                foreach ($db->getFajtak() as $value) {
                    if ($adatok['fajta'] == $value[0]) {
                        echo '<option selected value="' . $value[0] . '">' . $value[0] . '</option>';
                    } else {
                        echo '<option value="' . $value[0] . '">' . $value[0] . '</option>';
                    }
                }
                ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="mb-3 col-6">
            <label for="szuletesi_ido" class="form-label">Dátum: </label>
            <input type="date" class="form-control" name="szuletesi_ido" id="szuletesi_ido" aria-describedby="szuletesi_idoHelp" max="<?php echo date("Y-m-d");?>" >
        </div>    
        <div class="mb-3 col-6">
            <label for="nem" class="form-label">Az állat neme: </label>
            <select name="nemselect" id="nemselect" class="form-select">                
                <option value="kan">Kan</option>
                <option value="szuka">Szuka</option>
            </select>   
        </div>    
    </div>    
    <div class="row">
         <div class="mb-3 col-6">
            <label for="nyilvantartas" class="form-label">Nyilvántartásban vétel: </label>
            <input type="date" class="form-control" name="nyilvantartas" id="nyilvantartas" aria-describedby="nyilvantartasHelp">
        </div>
        <div class="mb-3 col-6">
            <label for="megjegyzes" class="form-label">Megjegyzés: </label>
            <input type="text" class="form-control" name="megjegyzes" id="megjegyzes" aria-describedby="megjegyzesHelp">
        </div>    
    </div>
    <div class="row">
        <div class="mb-3 col-6">
            <label for="kepfajl" class="form-label">Képfajl: </label>
            <input type="file" class="form-control" name="kepfajl" id="kepfajl" aria-describedby="kepfajlHelp">
        </div> 
    </div>
    <button type="submit" class="btn btn-success" value="1" name="adatmodositas">Módositás</button>
</form>
<!--<table class="table table-hover text-center">
  <thead class="table-dark">
    <tr>
      <th scope="col">Állat_ID</th>
      <th scope="col">Állat neve</th>
      <th scope="col">Faj</th>
      <th scope="col">Fajta</th>
      <th scope="col">Születési idő</th>
      <th scope="col">Nem</th>
      <th scope="col">Megjegyzés</th>
      <th scope="col">Nyilvántartás</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      <tr>
        <td> <?php echo $row["allatid"]?></td>
        <td> <?php echo $row["allat_neve"]?></td>
        <td> <?php echo $row["faj"]?></td>
        <td> <?php echo $row["fajta"]?></td>
        <td> <?php echo $row["szuletesi_ido"] ?></td>
        <td> <?php echo $row["nem"] ?></td>
        <td> <?php echo $row["megjegyzes"] ?></td>
        <td> <?php echo $row["nyilvantartas"] ?></td>
        <td>
          <a href="edit.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
          <a href="delete.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
        </td>
      </tr>
  </tbody>
</table>-->
