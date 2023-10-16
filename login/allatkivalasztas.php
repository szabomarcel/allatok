<?php
  var_dump($db->allatkivalasztas($id));
?>
    <table class="table table-hover text-center">
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
    </table>
