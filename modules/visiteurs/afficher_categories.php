<?php
// Pas de vérification de droits d'accès nécessaire : tout le monde peut voir un profil utilisateur :)
// On veut utiliser le modèle des visiteurs (~/modeles/visiteurs.php)
// include CHEMIN_MODELE.'visiteurs.php';
// afficher_categories() est défini dans ~/modeles/visiteurs.php
$infos_categories = afficher_categories();
include CHEMIN_VUE.'categories_infos.php';

// $infos_produits = afficher_produits(); 
// include CHEMIN_VUE.'produits_infos.php';
