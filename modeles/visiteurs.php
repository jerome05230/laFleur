<?php 

function afficher_categories() 
{
	$tableau=array();
	$pdo = PDO2::getInstance();
    $requete = $pdo->prepare("select * from categorie;");
	$requete->execute();
	$i=0;
	while ($result = $requete->fetch(PDO::FETCH_ASSOC)) {
		$tableau[$i]=$result;
		$i++;
	}
	$requete->closeCursor();
	return $tableau;
}

function afficher_categorie($cat) 
{
	$tableau=array();
	$pdo = PDO2::getInstance();
	$requete = $pdo->prepare("SELECT * FROM produit
		WHERE idcategorie = :idcategorie;");
	$requete->bindValue(':idcategorie', $cat);
	$requete->execute();
	$i=0;
	while ($result = $requete->fetch(PDO::FETCH_ASSOC)) {
		$tableau[$i]=$result;
		$i++;
    }
	$requete->closeCursor();
	return $tableau;
}


function existe_session()
{
  $estVide=false;
  if(!isset($_SESSION['reference'][0])) {
    $estVide=true;
  }
  
  return $estVide;
}
?>