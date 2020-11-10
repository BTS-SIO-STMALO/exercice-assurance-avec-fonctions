<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assurance</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    
    include "functions_assurance.php";

    if (!empty($_POST)){

        $age = getNumericPostParam("age", 17);
        $seniorityDriverLicence = getNumericPostParam("anciennete-permis");
        $responsibleAccidentCount = getNumericPostParam("accident");
        $seniorityInsurance = getNumericPostParam("anciennete-assureur");

        $level = getLevel($age, $seniorityDriverLicence, $responsibleAccidentCount, $seniorityInsurance);
    }
    
    ;?>
    
    
    
    <h1>Calculer votre tarif d'assurance</h1>

    <?php if(isset($level)) : ?>
        <?php 
        if ($level ==0){
            $message = "Refus d'assurer";
            $cssClass = "grey";
        }elseif ($level==1){
            $message = "Rouge";
            $cssClass ="red";
        }elseif ($level == 2){
            $message = "Orange";
            $cssClass= "orange";
        }elseif ($level == 3){
            $message = "Vert";
            $cssClass ="green";
        }elseif($level== 4){
            $message ="Bleu";
            $cssClass ="blue";
        }
        ?>
        <p>Vous avez le droit au tarif <strong class="<?= $cssClass; ?>"> <?= $message ?></strong></p>

        <p>Vous avez le droit au tarif <strong style="color:<?=$cssClass?>"><?= $message ?> </strong></p>

    <?php endif;?>

    <form action="" method="post">
        <div>
            <label>Indiquez votre âge svp</label>
            <input type="number" name="age" placeholder="xx ans" required min="17" max="99">
        </div>
        <div>
            <label>Indiquez votre ancienneté de permis</label>
            <input type="number" name="anciennete-permis" placeholder="xx ans" required min="0">
        </div>
        <div>
            <label>Indiquez le nombre d'accidents responsables</label>
            <input type="number" name="accident" placeholder="xx accidents" min="0">
        </div>
        <div>
            <label>Indiquez votre ancienneté chez votre assureur</label>
            <input type="number" name="anciennete-assureur" placeholder="xx ans" min="0">
        </div>
        <button type="submit">Calculer le tarif</button>
    </form>
</body>
</html>