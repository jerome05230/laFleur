<?php
// Pas de v�rification de droits d'acc�s n�cessaire : tout le monde peut voir un profil utilisateur :)
// On veut utiliser le mod�le des visiteurs (~/modeles/visiteurs.php)
// include CHEMIN_MODELE.'visiteurs.php';
// afficher_categories() est d�fini dans ~/modeles/visiteurs.php
$infos_categories = afficher_categories();
include CHEMIN_VUE.'categories_infos.php';

// $infos_produits = afficher_produits(); 
// include CHEMIN_VUE.'produits_infos.php';
