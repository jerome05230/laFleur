<?php
if (utilisateur_est_connecte()) {
	?>
	<h1>Bienvenue, <?php echo htmlspecialchars($_SESSION['pseudonyme']); ?>.</h1>
	<?php
} else {
?>
<div id="contenu">
  <div class="row">
    <div class="large-12 columns"><br>
      <div class="large-8 columns">
      
<h1>"Dites-le avec Lafleur"</h1>
<div align="center">Appelez notre service commercial au 03.22.84.65.74 pour recevoir un bon de commande</div>
      </div>
      <img src="images/ACCUEIL.JPG" alt="Lafleur accueil" /> </div>
    <div class="row">
      <div class="large-4 columns">
        <div class="row">
          <div class="large-12 columns"> 
                 la...
		  </div>
        </div>
      </div>
      <div class="large-8 columns">
         + loin...
       </div>
    </div>
    <hr />
  </div>
</div>
<?php
}
?>
