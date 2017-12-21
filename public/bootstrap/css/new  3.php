            <h2> les services des opérateurs</h2>
			<select name=liste[] size=5 multiple>
            <option value="présentation du numéro">présentation du numéro</option>
            <option value="forfait illimité">forfait illimité</option>
			<option value="Activer votre carte SIM">Activer votre carte SIM</option>
			<option value="Utiliser la messagerie vocale (répondeur) en ligne">Utiliser la messagerie vocale (répondeur) en ligne</option>
			<option value="service 4G">service 4G</option>
            <option value="Bloquer son forfait">Bloquer son forfait</option>
			<option value="Utiliser les services Free à l’étranger">Utiliser les services Free à l’étranger</option>
			<option value="Migrer du forfait 19,99 euros vers le forfait 2 euros">Migrer du forfait 19,99 euros vers le forfait 2 euros</option>
			<option value="Gérer l’annuaire">Gérer l’annuaire</option>
            <option value="Résilier">Résilier</option>
			
			</select>



			<?php
if(!empty($_GET['liste'])){
	$tab1 = $_GET['liste'];
    foreach ($tab1 as $liste) {
	echo $liste."," ;}
}
else{
	echo 'Sélectionner un choix';
}
?>