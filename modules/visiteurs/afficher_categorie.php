<?php
// error_reporting(0);  // Suppression warning cf: session already start
// Pas de vérification de droits d'accès nécessaire : tout le monde peut voir :)

$infos_produits = afficher_categorie($_GET['cat']);
// Ne pas oublier d'inclure la librairie Form
    include_once CHEMIN_LIB.'form.php';

if (@$_POST['action'] == "Vider le Panier") {  // On vide le panier
	include_once 'modules/panier/gestion_panier.php'; // On vide le panier ici puisque action="Vider le Panier"
	include_once 'modules/panier/vues/panier_vide.php'; // inutile
} 

if ((@$_POST['action'] != "Vider le Panier") &&  (@$_POST['action'] != "Passer la Commande")) {
	if (! isset ($_POST['refPdt'])) { 
		$i=0;
		foreach($infos_produits as $ligne) {
			$id = $ligne['id'];
			$description  = $ligne['description'];
			$prix = $ligne['prix'];
			$image = $ligne['image'];
			unset($formAjouterPanier); // Inutile
			
			$formAjouterPanier = new Form('formAjouterPanier'.$i);
			$formAjouterPanier->method('POST');
			$formAjouterPanier->add('hidden', 'refPdt')
						   ->Required(true)
						   ->value("$id");
			$formAjouterPanier->add('text', 'quantite')
						   ->Required(true)
						   ->value("1");
			$formAjouterPanier->add('hidden', 'action')
						   ->Required(true)
						   ->value("Ajout au panier");
						   // <input type='image' src='./images/mettrepanier.png'>  
			$formAjouterPanier->add('Submit', 'submit')
						   ->value("+");
			// Pré-remplissage avec les valeurs précédemment entrées (s'il y en a)
			// $formAjouterPanier->bound($_POST);
			include CHEMIN_VUE.'produits_infos.php';
			$i++;
		}
	} 

	if (@isset ($_POST['refPdt'])) { 
		include_once 'modules/panier/gestion_panier.php';
		include_once 'modules/panier/afficher_panier.php';
	}
} 

if (@$_POST['action'] == "Passer la Commande")  {  // ON PASSE LA COMMANDE
    	include 'modules/panier/afficher_commande.php';
}