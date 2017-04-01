<?php 
// error_reporting(0);  // Suppression warning cf: session already start
// Pas de v�rification de droits d'acc�s n�cessaire : tout le monde peut voir un profil utilisateur :)

// Ne pas oublier d'inclure la librairie Form
include_once CHEMIN_LIB.'form.php';
if (@$_POST['action'] != "Passer la Commande")  {
	$formVCommander = new Form('formVCommander'); // � mettre ici obligatoirement
	$formVCommander->method('POST');
	$formVCommander->add('hidden', 'action')
				   ->Required(true)
				   ->value("Passer la Commande");
	$formVCommander->add('Submit', 'submit')
				   ->value("Commander");
	// Pr�-remplissage avec les valeurs pr�c�demment entr�es (s'il y en a)
	// $formVCommander->bound($_POST);

}

if ((@$_POST['action'] != "Vider le Panier") &&  (@$_POST['action'] != "Passer la Commande")) {
	$formViderPanier = new Form('formViderPanier'); // � mettre ici obligatoirement
	$formViderPanier->method('POST');
	$formViderPanier->add('hidden', 'action')
				   ->Required(true)
				   ->value("Vider le Panier");
	$formViderPanier->add('Submit', 'submit')
				   ->value("Vider\nPanier");
	// Pr�-remplissage avec les valeurs pr�c�demment entr�es (s'il y en a)
	//$formViderPanier->bound($_POST);
	include_once 'modeles/panier.php';
	$infos_panier = infos_panier();
	include 'modules/panier/vues/panier_infos.php';
} if (@$_POST['action'] =="Vider le Panier") {  // On vide le panier
	include 'modules/panier/gestion_panier.php'; // On vide le panier ici puisque action="Vider le Panier"
	include 'modules/panier/vues/panier_vide.php';
}

if (@isset ($_POST['Ajout au panier'])) {  // On ajoute au panier
	echo "Ajout au panier ici";
	include_once 'modules/panier/infos_panier.php';
	$infos_panier = infos_panier();
	include 'modules/panier/gestion_panier.php'; // On ajoute au panier
	include 'modules/panier/vues/panier_infos.php';
} if (@$_POST['action'] == "Passer la Commande")  {  // ON PASSE LA COMMANDE
    	include 'modules/panier/afficher_commande.php';
}
