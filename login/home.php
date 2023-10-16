<h1>Nyitólap</h1>
        <?php
            foreach ($db->osszesAllat() as $row) {
            $card = '<div class="card" style="width: 18rem;">
                        <img src="./kepek/noimage.png" class="card-img-top"  alt="...">
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
