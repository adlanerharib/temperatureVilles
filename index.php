<center><form method="post" action="affichage_temperature.php">

     <label for="ville">De quelle ville voulez vous connaître la température ?</label><br />
     <select name="ville" id="ville">
<?php
try
{
      $bdd = new PDO('mysql:host=localhost;dbname=bdd_temperaturevilles', 'root', '');
}
catch(Exception $e)
{
          die('Erreur : '.$e->getMessage());
}
$reponse = $bdd->query('SELECT ville FROM temperaturesvilles');

while ($donnees = $reponse->fetch())
{
?>
         <option name="ville" value="<?php echo htmlspecialchars($donnees['ville']);?>">
         	<?php echo ucfirst($donnees['ville']) ?></option>
<?php
}

$reponse->closeCursor();

?>
</select>
<input type="submit" value="Afficher" name="submit">
</form>
</center>



