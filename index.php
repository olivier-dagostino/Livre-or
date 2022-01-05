
<?php
include('include/bdd.inc.php');
require('header.php');
?>

<main>


    <h2>Test Sony WH-1000XM4 : la référence des casques sans fil à réduction de bruit s'améliore encore</h2>
    <div class="img-1">
        <img id="design-mx4" src="asset/img/mx4.webp" alt="photo-casque">
    </div>

    <div class="container1">
        <div class="left-container1">
            <img id="img-avis1" src="asset/img/IMG_0024.jpg" alt="">
        </div>
        <div class="middle-container1">
            <p>
                On serait bien en peine de reprocher au Sony WH-1000XM4</br>
                sa similarité extrême avec le WH-1000XM3. L'aîné était</br>
                déjà extrêmement proche d'une certaine forme de perfection,</br>
                et à coup de petits ajustements fonctionnels souvent minimes,</br>
                parfois notables (la connexion Bluetooth multipoint, enfin !),</br>
                le cadet prend tout naturellement la relève en tant que référence</br>
                des casques sans fil à réduction de bruit. Seule précaution à prendre</br>
                avant l'achat : s'assurer que l'on ne sera pas incommodé par une sonorité</br>
                certes remarquablement précise et musicale, mais au penchant vers</br>
                les graves très prononcé.
            </p> <br><br><br>
            <p>Pour laisser un Commentaires inscrivez-vous, puis connectez-vous à votre espace</p>
        </div>
        <div class="right-container1">
            <img id="img-avis2" src="asset/img/IMG_0025.jpg" alt="">
        </div>

    </div>
    <div id="alignement-com">
        <div class="commentaire">
            <?php
                if($result = mysqli_query($connect,"SELECT commentaires.*, utilisateurs.login FROM commentaires INNER JOIN utilisateurs ON commentaires.id_utilisateur = utilisateurs.id ORDER BY `date` ASC")){
                    while ($infos = mysqli_fetch_assoc($result)){
                        
                        ?>
                        <div class="screen_com">
                            <div class="screen-com1">
                                <p>
                                    Commentaire posté par <?php echo $infos['login']; ?> le <?php echo $infos['date']; ?>
                                </p>
                            </div>
                            <div class="screen-com2">	
                            <?php echo $infos['commentaire']; ?>
                            </div>
                        </div>
                        <?php 
                    }
                }
            ?>

        </div>
    </div>

</main>

<?php require('footer.php'); ?>