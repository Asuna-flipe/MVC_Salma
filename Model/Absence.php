<?php

require_once 'Model/Model.php';

class Absence extends Model
{

    // the function that list all the absences of a student

    public function GetAbsence($cnestudent)
    {
        $sql = "SELECT * FROM absence WHERE CNE=?";
        $absences=$this->executeQuery($sql,array($cnestudent));
        return $absences;
    }


    // The function that returns the total absences by subject (matiere)

    public function TotalAbsenceMat($cnestudent)
    {
        $sql =" SELECT nom_matiere, sum(nombre_heure) FROM absence WHERE CNE=? GROUP BY nom_matiere";
        $TabsenceMats = $this->executeQuery($sql, array($cnestudent));
        return $TabsenceMats;
    }



    // The function that returns the total absences of a student 

    public function TotalAbsence($cnestudent)
    {
        $sql = "SELECT sum(nombre_heure) FROM absence WHERE CNE=?";
        $Tabsences = $this->executeQuery($sql,array($cnestudent));
        return $Tabsences;
    }



    // The function that Add an absence to a student

    public function AddAbsence($nom_matiere,$date_seance,$nombre_heure,$Heure_debut,$Heure_fin,$cnestudent)
    {
        $sql = "INSERT INTO absence(nom_matiere,date_seance,nombre_heure,Heure_debut,Heure_fin,CNE)
                        VALUES(?, ?, ?, ?, ?, ?)";
        $addabsence = $this->executeQuery($sql, array($nom_matiere,$date_seance,$nombre_heure,
                         $Heure_debut,$Heure_fin,$cnestudent));
        return $addabsence;
    }
}