<div id="contenu">
<div class="row">
<div class="large-12 columns">
<div class="large-8 columns">
<h2>Gestion de votre commande</h2>
<?php 
error_reporting(0);  // Suppression warning cf: session already start
session_start();
if (! isset($_SESSION["reference"])){
   echo "<h1>Acc&egrave;s interdit</h1>";
   exit(0);
} 
if(! isset($_POST["nomPrenomClie"]))  {  //  La première fois
   ?>
<form method="post" class="custom" action="./modules/visiteurs/vues/formulaires_infos_commande.php">
  <div>
    <div>
      <label for="nomPrenomClient" class="required">Nom et pr&eacute;nom</label>
      <input type="text" id="nomPrenomClie" name="nomPrenomClie" required="required" maxlength="32" />
    </div>
    <div>
      <label for="adresseRueClient" class="required">Adresse personnelle</label>
      <input type="text" id="adresseRueClie" name="adresseRueClie" required="required" maxlength="32" />
    </div>
    <div>
      <label for="cpClient" class="required">Code postal</label>
      <input type="text" id="cpClie" name="cpClie" required="required" maxlength="5" />
    </div>
    <div>
      <label for="villeClient" class="required">Ville</label>
      <input type="text" id="villeClie" name="villeClie" required="required" maxlength="32" />
    </div>
    <div>
      <label for="nomPrenomClie_mailClient" class="required">Mail</label>
      <input type="email" id="mailClie" name="mailClie" required="required" />
    </div>
    <div>
      <label for="codeCommandeClient" class="required">Num&eacute;ro de votre bon de commande</label>
      <input type="text" id="bonCdeClie" name="bonCdeClie" required="required" maxlength="10"/>
    </div>
  </div>
  <br>
  <input type="submit" id="submit" value="Envoyer" />
  <input type="reset" value="Effacer" />
</form>
<?php

} else {
	// La deuxième fois
	$nomPrenomClient = $_POST["nomPrenomClie"];
	$adresseRueClient = $_POST["adresseRueClie"];
	$cpClient = $_POST["cpClie"];
	$villeClient = $_POST["villeClie"];
	$mailClient = $_POST["mailClie"];
	$bonCdeClient = $_POST["bonCdeClie"];
	$idmax =0;
	
	$nbLignes=count($_SESSION["reference"]);
	if ($nbLignes>0) {
		$moment=date("Y-m-d");
		$idConnexion=mysql_connect("localhost","root","");
		if ($idConnexion) {
			mysql_select_db("lafleurmvc",$idConnexion);
			$requete0="select max(id) from commande;"; 
			$resultat=mysql_query($requete0); 
			$idmax=mysql_result($resultat,0,"max(id)"); 
			$idCommande = $idmax + 1; 
			$requete1="INSERT INTO commande (id, dateCommande, nomPrenomClient, adresseRueClient, cpClient, villeClient, mailClient, bonCdeClient) VALUES (";
			$requete1.= "'$idCommande', '$moment' , '$nomPrenomClient' , '$adresseRueClient' , '$cpClient' , '$villeClient' , '$mailClient' , '$bonCdeClient' ) ;";
			$ok=mysql_query($requete1,$idConnexion);
			if('ok') {
				for ($i=0;$i<$nbLignes;$i++)  {
					$ref=$_SESSION["reference"][$i];
					$qte=$_SESSION["quantite"][$i];
					$requete2="select prix from produit where id='".$ref."';";
					$produit=mysql_query($requete2,$idConnexion);
					$ligne=mysql_fetch_assoc($produit);
					$prix=$ligne["prix"];
					// nécessaire pour la première version
					$requete3="select * from contenir where idCommande = '$idCommande'  and idProduit='$ref';";
					$jeuResultat=mysql_query($requete3,$idConnexion);
					$ligneCde=mysql_fetch_assoc($jeuResultat);
					if ($ligneCde) {
						$qte=$qte+$ligneCde["quantite"];
						$requete4="update contenir set quantite=".$qte."  where idCommande = '$idCommande'  and idProduit='$ref';";
						mysql_query($requete4,$idConnexion);
					} else {

					$requete5="insert into contenir (idCommande, idProduit, quantite, prix) values (";
					$requete5.="'$idCommande' , '$ref' , '$qte' , '$prix');";
					mysql_query($requete5,$idConnexion);
				 }
				}
				// On vide alors le panier.
				$_SESSION["reference"]=array();
				$_SESSION["quantite"]=array();
				echo "Votre commande a bien &eacute;t&eacute; enregistr&eacute;e sous la r&eacute;f&eacute;rence $idCommande le $moment";
			} else	{
				echo "Commande non enregistr&eacute;e, authentification refus&eacute;e<br>
				";
			}
		} else  {
			echo "Commande non enregistr&eacute;e, probleme d'acces au serveur<br>
			";
		}
        mysql_close($idConnexion);
	}
} 
?>