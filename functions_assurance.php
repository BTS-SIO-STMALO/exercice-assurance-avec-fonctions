<?php

/* Etant donné que je vérifie à chaque fois que mes valeurs de $_POST sont bien initialisées et correspondent bien à des entiers, autant le faire une seule fois en créant une fonction que l'on va utiliser ensuite quand on veut.
Cette fonction pour fonctionner va prendre 2 paramètres :
1) un index
2) une valeur par défaut
Cette fonction nous allons l'appeler getNumericPostParam
*/

function getNumericPostParam($index, $valeurParDefaut = 0)
{
    // Dans un premier temps, ma fonction va vérifier que mon index n'est pas vide
    // s'il est vide, je veux que ma fonction me renvoie ma valeur par défaut
    if (!isset($index)){
        return $valeurParDefaut;
    }
    // Dans un second temps je veux que ma fonction vérifie que la valeur contenue dans ma variable $_POST soit bien un entier
    if(isset($_POST[$index]) && ctype_digit(($_POST[$index]))){
        return $_POST[$index];
    }else {
        return $valeurParDefaut;
    }
};

    /* Je crée une nouvelle fonction qui va me permettre de calculer mon niveau. Cette fonction s'appelle getLevel. Elle prend 4 paramatrès
    1) l'âge
    2) l'ancienneté de permis
    3) le nombre d'accidents responsables
    4) ancienneté d'assurance 
    */

    function getLevel($age, $seniorityDriverLicence, $responsibleAccidentCount, $seniorityInsurance)
    {
        // Par défaut, tout le monde entre au niveau 1
        $level = 1;
        // Le nombre d'accident réduit d'autant le nombre de niveau
        $level = $level - $responsibleAccidentCount;
        // Un permis de + de 2 ans permet d'augmenter d'un niveau
        if ($seniorityDriverLicence >= 2) {
            $level++;
        }
        // + 25 ans ? un niveau de plus
        if ($age > 25){
            $level++;
        }
        // + de 5 ans de permis + pas de refus d'assurance = un niveau de +
        if ($level > 0 && $seniorityInsurance > 5){
            $level++;
        }
        if ($level < 0){
            $level = 0;
        }
        if ($level > 4){
            $level = 4;
        }
        return $level;
    }
?>