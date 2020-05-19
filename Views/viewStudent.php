<?php $this->title="Gestion de l'eleve - " .$student['nom'] .$student['prenom']; ?>
<article>
<header>
<h1 class="nomeleve"><?= $student['nom'] . " " .$student['prenom'] ?></h1>

</header>
<h1>CNE : <?= $student['cne'] ?></h1>
<h1>ETAT : <?= $student['etat'] ?></h1>
</article>
<hr />
<header>
<h1 id="absence">Recapitulatif des absences de <?= $student['nom'] ?></h1>
</header>
<table border="5px">
	<tr>
		<th>MATIERE</th>
		<th>DATE DE LA SEANCE</th>
        <th>NOMBRE_heure absentée</th>
        <th>Heure_Debut </th>
        <th>Heure_Fin </th>
</tr>
<?php foreach ($absences as $absence): ?>
    <tr>
		<td><?php echo $absence["nom_matiere"]; ?></td>
		<td><time><?php echo $absence["date_seance"]; ?></time></td>
        <td><?php echo $absence["nombre_heure"]; ?></td>
        <td><?php echo $absence["Heure_debut"]; ?></td>
        <td><?php echo $absence["Heure_fin"]; ?></td>
</tr>
<?php endforeach; ?>
</table>
</br>
<h1 id="absence">Le total des absences par matiere de <?= $student['nom'] ?></h1>
<table border="5px">
	<tr>
		<th>MATIERE</th>
        <th>TOTAL</th>
</tr>
<?php foreach ($TabsenceMats as $TabsenceMat): ?>
    <tr>
		<td><?php echo $TabsenceMat["nom_matiere"]; ?></td>
        <td><?php echo $TabsenceMat["sum(nombre_heure)"]; ?></td>
</tr>
<?php endforeach; ?>
</table>
<h1 id="absence">TOTAL DES HEURES ABSENTEE : </h1>
<?php foreach ($Tabsences as $Tabsence): ?>
<?php echo $Tabsence["sum(nombre_heure)"]; ?> Heure(s)<hr />
<?php endforeach; ?>
<h1> Ajouter une absence pour <?= $student['nom'] ?> ? </h1>
<form method="post" action="index.php?action=Add">
<input id="nom_matiere" name="matiere" type="text" placeholder="nom de la matiere"
required /> NOM MATIERE<br />
<input id="date_seance" name="date_seance" placeholder="YY-MM-DD" required> DATE SEANCE<br />
<input id="nombre_heure" name="heure" placeholder="nombre d heure" required> NOMBRE HEURES ABSENTEE<br />
<input id="Heure_debut" name="Heure_debut" placeholder="HH-MM-SS" required> HEURE DEBUT<br />
<input id="Heure_fin" name="Heure_fin" placeholder="HH-MM-SS" required> HEURE FIN<br />
<input type="hidden" name="cnestudent" value="<?= $student['cne'] ?>" />
<input type="submit" value="Add" />
</form>