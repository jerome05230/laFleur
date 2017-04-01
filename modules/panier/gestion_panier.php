<?php  error_reporting(0);  // Suppression warning
session_start(); 

// Pas de vérification de droits d'accès nécessaire : tout le monde peut voir un profil utilisateur :)
// include CHEMIN_MODULE.'gestion_panier.php';
switch($_POST["action"])
{
		case "Vider le Panier":
			$_SESSION["reference"]=array();
			$_SESSION["quantite"]=array();
			// header('Location: ../../index.php?module=panier&action=afficher_panier_vide');
			break;
		case "Ajout au panier":
			$trouve = false;
			$i=count($_SESSION["reference"]);
			for ($k = 0; $k < $i ; $k++) { // Est ce que le produit à déja été commandé ?
 				if ( @$_POST["refPdt"] == $_SESSION["reference"][$k] )  { // Cas produit déja commandé
					$_SESSION["quantite"][$k] +=$_POST["quantite"];
					$trouve = true;
				} 
			} 
			if (! $trouve) {  // Cas produit pas déja commandé
				$_SESSION["reference"][$i]=$_POST["refPdt"];
				$_SESSION["quantite"][$i]=$_POST["quantite"];
			}
			break;
			case "Ajout au panier2":
			$trouve = false;
			$i=count($_SESSION["reference"]);
			for ($k = 0; $k < $i ; $k++) { // Est ce que le produit à déja été commandé ?
 				if ( @$_POST["refPdt"] == $_SESSION["reference"][$k] )  { // Cas produit déja commandé
					$_SESSION["quantite"][$k] +=$_POST["quantite"];
					$trouve = true;
				}  
			} 
			if (! $trouve) {  // Cas produit pas déja commandé
				$_SESSION["reference"][$i]=$_POST["refPdt"];
				$_SESSION["quantite"][$i]=$_POST["quantite"];
			}
			header('Location: ../../index.php?module=panier&action=afficher_panier');
			break;
		case "Supprimer du panier2":
			$i=count($_SESSION["reference"]);
			for ($k = 0; $k < $i ; $k++) { // Est ce que le produit à déja été commandé ?
 				if ( $_POST["refPdt"] == $_SESSION["reference"][$k] )  {  
					$_SESSION["quantite"][$k] -=$_POST["quantite"];
					if ($_SESSION["quantite"][$k]<=0 ){ 
						if ($k == $i-1) { // cas 1 occurrence ou dernière occurrence du tableau
						unset($_SESSION["reference"][$k]);
				        unset($_SESSION["quantite"][$k]);
						} else { 
						 	for($n=$k;$n<$i;$n++)  {
								$_SESSION["reference"][$n]=$_SESSION["reference"][$n+1]; 
								$_SESSION["quantite"][$n]=$_SESSION["quantite"][$n+1];   
                            }
						   	unset($_SESSION["reference"][$i-1]);
			        	   	unset($_SESSION["quantite"][$i-1]);
						 }
					}
				}   
			} 
			if (count($_SESSION["reference"]) != 0) {	// le panier est-il vide ?	
			  	header('Location: ../../index.php?module=panier&action=afficher_panier');
			} else	{
			 	header('Location: ../../index.php?module=panier&action=afficher_panier_vide');
			}
	        break;
}
