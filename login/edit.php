<?php
include "Datebase.php";
$id = $_GET["id"];
if (isset($_POST["submit"])) {
  $allatid = $_POST['allatid'];
  $allat_neve = $_POST['allat_neve'];
  $faj = $_POST['faj'];
  $fajta = $_POST['fajta'];
  $szuletesi_ido = $_POST['szuletesi_ido'];
  $nem = $_POST['nem'];
  $megjegyzes = $_POST['megjegyzet'];
  $nyilvantartas = $_POST['nyilvantartas'];
  $stmt = $this->db->prepare('SELECT `allatid`, `allat_neve`, `faj`,`fajta`, `szuletesi_ido`, `nem`, `megjegyzes`, `nyilvantartas` FROM `allat`');
  $result = mysqli_query($conn, $sql);
  if ($result) {
    header("Location: index.php?msg=Data updated successfully");
  } else {
    echo "Failed: " . mysqli_error($conn);
  }
}
?>
    <?php
    $sql = "SELECT * FROM `allat` WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

    <div class="container d-flex justify-content-center">
      <form action="" method="post" style="width:50vw; min-width:300px;">
        <div class="row mb-3">
          <div class="col">
            <label class="form-label">Állat_ID:</label>
            <input type="text" class="form-control" name="allatid" value="<?php echo $row['allatid'] ?>">
          </div>
          <div class="col">
            <label class="form-label">Állat neve:</label>
            <input type="text" class="form-control" name="allat_neve" value="<?php echo $row['allat_neve'] ?>">
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Faj:</label>
          <input type="text" class="form-control" name="faj" value="<?php echo $row['faj'] ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Fajta:</label>
          <input type="text" class="form-control" name="fajta" value="<?php echo $row['fajta'] ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Születési idő:</label>
          <input type="text" class="form-control" name="szuletesi_ido" value="<?php echo $row['szuletesi_ido'] ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Nem:</label>
          <input type="text" class="form-control" name="nem" value="<?php echo $row['nem'] ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Megjegyzés:</label>
          <input type="text" class="form-control" name="megjegyzes" value="<?php echo $row['megjegyzes'] ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Nyilvántartás:</label>
          <input type="text" class="form-control" name="nyilvantartas" value="<?php echo $row['nyilvantartas'] ?>">
        </div>
        <button type="submit" class="btn btn-success" name="submit">Update</button>
        <a href="index.php" class="btn btn-danger">Cancel</a>
      </form>
    </div>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>