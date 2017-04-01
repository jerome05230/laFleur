<div id="fondNav">
    <div class="row"><div class="large-12 columns">
        <nav class="top-bar">
            <ul class="title-area">
                <!-- Title Area -->
                <li class="name">
                    <h1><a href="index.php">Accueil</a></h1>
                </li>
                <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
                <li class="toggle-topbar" ><a href="#"><span>Menu</span></a></li>
            </ul>
       <section class="top-bar-section">
    <!-- Right Nav Section -->
	<?php 
        echo "<ul class='right'>
		<ul class='left'>
			<li><a href='index.php?module=visiteurs&amp;action=afficher_categories'>Voir le catalogue de fleurs</a></li>";
				if (! existe_session()) {
					echo"<li><a href='index.php?module=panier&amp;action=afficher_panier'>Votre panier</a></li>
					<li><a href='index.php?module=panier&amp;action=afficher_commande'>Commander</a></li>";
				}

	?>
    </section>
</div>
</div>
