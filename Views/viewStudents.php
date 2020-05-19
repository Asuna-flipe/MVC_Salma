<?php $this->title = 'Gestion des élèves GINF1 ENSAT 2019-2020'; ?>
<h1 id="title">Liste des élèves GINF1 2019-2020</h1>
<table border="7px" >
	<tr >
		<th>CNE</th>
		<th>NOM</th>
		<th>PRENOM</th>
        <th>ETAT</th>
        <th>PRESS FOR DETAILS</th>
	</tr>
<?php
foreach ($students as $student) {
	$et="";
	$lien="";
	if($student["etat"]=="true") {
		$et="active";
		$lien="index.php?action=changeetat&cnestudent=".$student["cne"]."&etat=false"; }
	else {
		$et="desactive";
		$lien="index.php?action=changeetat&cnestudent=".$student["cne"]."&etat=true"; }
	?>
		<tr>
		<td><?php echo $student["cne"]; ?></td>
		<td><?php echo $student["nom"]; ?></td>
		<td><?php echo $student["prenom"]; ?></td>
		<td><a href="<?php echo $lien; ?>"><?php echo $et; ?></a></td>
		<td><a href ="<?= "index.php?action=detailsstudent&cnestudent=".$student['cne'] ?>"><button type='button'>
      Details</button></a></td>
	</tr>
	<?php	
}  ?>
</table>

