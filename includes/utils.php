<?php

/**
 *   NR le 24/12/2020
 * Ce fichier sera inclus dans toutes les pages
 * Il permet de définir des fonctions générales
 * qui peuvent être utilisés dans toutes les pages
 * la fonction escape peut être utilisées pour éviter des injections XSS



 * Escape retourne la chaine de caractères avec chanement
 * des doubles quotes en simple quote
 * $date reprséente la chaine de caractères à traiter
 */
function escape(string $data): string
{
    return htmlentities($data, ENT_QUOTES, 'UTF-8');
}


/*
* Passer toutes les saisies qu'on veut controler à travers cette fonction, en utilisant une expression regulière
*/
function controleSaisie(string $saisie, string $regex)
{
    $saisie = escape($saisie);
    if (preg_match($regex, $saisie)) {
        return $saisie;
    };
}
// Pour une saisie générique, par exemple un nom, une adresse, une ville etc
function saisieGenerique(string $saisie)
{
    return escape($saisie);
}

// Fonctions de controles de saisie pour un type spécifique
function saisieMail(string $saisie)
{
    $saisie = escape($saisie);
    // On utilise filter_var au lieu d'une expression régulière : plus fiable
    if (filter_var($saisie, FILTER_VALIDATE_EMAIL)) {
        return $saisie;
    }
}

function saisieCodePostal(string $saisie)
{
    return controleSaisie($saisie, " /^[0-9]{5}$/ ");
}

function saisieNumTel(string $saisie)
{
    return controleSaisie($saisie, " /^[0-9]{10}$/ ");
}
