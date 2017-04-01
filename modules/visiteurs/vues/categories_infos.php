  <ul id="categories">
  <?php 
	foreach($infos_categories as $item) {
	   echo "<li><a href='index.php?module=visiteurs&action=afficher_categorie&cat=$item[id]'>$item[libelle]</a></li>";
    }
	?>
 </ul>	