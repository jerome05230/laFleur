<?php

function maj_avatar_membre($id , $avatar) {

	$pdo = PDO2::getInstance();

	$requete = $pdo->prepare("UPDATE visiteurs SET
		avatar = :avatar
		WHERE
		id = :id");

	$requete->bindValue(':id', $id);
	$requete->bindValue(':avatar',         $avatar);

	return $requete->execute();
}

?>
