<?php 
function infos_panier() 
{
	$tableau=array();
	$pdo = PDO2::getInstance();
	for ($i=0;$i<count($_SESSION["reference"]);$i++)  {
		$tableau["ref"][$i]=$_SESSION["reference"][$i];
		$tableau["qpte"][$i]=$_SESSION["quantite"][$i];
		$id= $_SESSION["reference"][$i];
		$requete = $pdo->prepare("SELECT * FROM produit
		WHERE id = :id;");
		$requete->bindValue(':id', $id);
		$requete->execute();
		$result = $requete->fetch(PDO::FETCH_ASSOC);
		$tableau["description"][$i]=$result["description"];
		$tableau["prix"][$i]=$result["prix"];
		$tableau["image"][$i]=$result["image"];
		$requete->closeCursor();
	}
	return $tableau;
}
?>