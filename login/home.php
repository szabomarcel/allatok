<div class="container">
    <div class="row">
        <?php
            foreach ($db->osszesAllat() as $row) {
            $image = null;
            if ("./kepek/allatkepek/".$row['allat_neve'].".jpg"){
                $image = "./kepek/allatkepek/".$row['allat_neve'].".jpg";
            }else if("./kepek/allatkepek/".$row['allat_neve'].".jpeg"){
                $image = "./kepek/allatkepek/".$row['allat_neve'].".jpeg";
            }else if("./kepek/allatkepek/".$row['allat_neve'].".png"){
                $image = "./kepek/allatkepek/".$row['allat_neve'].".png";
            }else{
                $image = "./kepek/noimage/.png";
            }
                
            $card = '<div class="card m-3" style="width: 18rem;">
                        <img src="'.$image.'" class="card-img-top"  alt="...">
                        <div class="card-body">
                            <h5 class="card-title">'.$row['allat_neve'].'</h5>
                            <p class="card-text">'.$row['allat_neve'].
                            '(született: '.$row['szuletesi_ido'].','.
                            'neme: '.$row['nem'].','.
                            'nálunk: '.$row['nyilvantartasban'].')'.
                            $row['megjegyzes'].
                            '</p>
                            <a href="index.php?menu=home&id='.$row['allatid'].'" class="btn btn-primary">Kiválaszt</a>
                        </div>
                    </div>';
                echo $card;
            }
        ?>
    </div>
</div>
