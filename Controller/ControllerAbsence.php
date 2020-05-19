<?php
require_once 'Model/Student.php';
require_once 'Model/Absence.php';
require_once 'Views/view.php';

class ControllerAbsence 
{
    private $student;
    private $absence;
    private $TabsenceMats;
    private $Tabsences;


    // Function Constructeur

    public function __construct()
    {
        $this->student = new Student();
        $this->absence = new Absence();

    }

    // Function that shows Details of a student

    public function detailsstudent($cnestudent)
    {
        $student = $this->student->GetStudent($cnestudent);
        $absences = $this->absence->GetAbsence($cnestudent);
        $TabsenceMats = $this->absence->TotalAbsenceMat($cnestudent);
        $Tabsences = $this->absence->TotalAbsence($cnestudent);
        $view = new view("Student");
        $view->generate(array('student' => $student, 'absences' => $absences, 
                        'TabsenceMats' => $TabsenceMats, 'Tabsences' => $Tabsences));

    }

    // ADD AN ABSENCE TO A STUDENT

    public function Add($nom_matiere, $date_seance, $nombre_heure, $Heure_debut,$Heure_fin,$cnestudent)
    {
        // ADD the Absence

        $this->absence->AddAbsence($nom_matiere,$date_seance,$nombre_heure,$Heure_debut,$Heure_fin,$cnestudent);

        // Updating the student display

        $this->detailsstudent($cnestudent);
    }

}