<?php
	if(isset($_POST['submit']))
	{
		$ville = $_POST['ville'];
		echo 'ville:', $ville;
	}

try
{
      // On se connecte à MySQL
      $bdd = new PDO('mysql:host=localhost;dbname=bdd_temperaturevilles', 'root', '');
}
catch(Exception $e)
{
      // En cas d'erreur, on affiche un message et on arrête tout
      die('Erreur : '.$e->getMessage());
}
// Si tout va bien, on peut continuer
// On récupère tout le contenu de la table 
$bdd->query("SET lc_time_names = 'fr_FR'");
$reponse = $bdd->query("SELECT ville , temperature, date(last_update) as date, time(last_update) as heure FROM `temperaturesvilles` WHERE `ville`='$ville'");


// On affiche chaque entrée une à une
$donnees = $reponse->fetch()

?>
<p><center>Sur <font color="fuchsia"><?php echo ucfirst($donnees['ville']); ?></font> il fait <font color="red"><?php echo $donnees['temperature']; ?></font>°C le <?php echo $donnees['date']; ?> à <?php echo $donnees['heure']; ?></center></p>

<?php
$reponse->closeCursor(); // Termine le traitement de la requête
?>