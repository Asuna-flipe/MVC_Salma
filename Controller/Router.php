<?php
require_once 'Controller/ControllerStudents.php';
require_once 'Controller/ControllerAbsence.php';
require_once 'Views/view.php';

class Router
{
    private $ctrlStudents;
    private $ctrlAbsence;


    // Shows the list of all students

    public function __construct()
    {
        $this->ctrlStudents = new ControllerStudents();
        $this->ctrlAbsence = new ControllerAbsence();

    }


    // Search a params on a table 

    private function getParam($tableau,$nom)
    {
        if(isset($tableau[$nom]))
        {
            return $tableau[$nom];
        }
        else
        {
            throw new Exception("parameter '$nom' absent");

        }

    }


    // Function that Processes an incoming request

    public function routerQuery()
    {
        try
        {
            if (isset($_GET['action']))
            {
                if($_GET['action'] == 'detailsstudent')
                {
                    if(isset($_GET['cnestudent']))
                    {
                        $cnestudent = intval($this->getParam($_GET,'cnestudent'));
                        if($cnestudent != 0)
                        {
                            $this->ctrlAbsence->detailsstudent($cnestudent);

                        }
                        else
                        {
                            throw new Exception ("Invalid student CNE");
                        }
                    }
                    else
                    {
                        throw new Exception ("Student CNE not defined");
                    }
                }
                elseif($_GET['action'] == 'changeetat')
                {
                    if(isset($_GET['cnestudent']))
                    {
                        $cnestudent = intval($this->getParam($_GET, 'cnestudent'));
                        if($cnestudent != 0)
                        {
                            $this->ctrlStudents->activation($cnestudent);
                        }
                            
                        else
                        {
                            throw new Exception("Invalid student CNE");
                        }
                    }
                    else
                    {
                        throw new Exception ("Student CNE not defined");
                    }

                }
                elseif($_GET['action'] == 'Add')
                {
                    $nom_matiere = $this->getParam($_POST, 'matiere');
                    $date_seance = $this->getParam($_POST, 'date_seance');
                    $nombre_heure = $this->getParam($_POST,'heure');
                    $Heure_debut = $this->getParam($_POST, 'Heure_debut');
                    $Heure_fin = $this->getParam($_POST, 'Heure_fin');
                    $cnestudent = $this->getParam($_POST, 'cnestudent');
                    $this->ctrlAbsence-> Add($nom_matiere, $date_seance, $nombre_heure, $Heure_debut,$Heure_fin,$cnestudent);

                }
                else
                {
                    throw new Exception("Invalid action");
                }
            }
            else
            {
                 $this->ctrlStudents->students();
            }     
        }

        catch (Exception $msg)
         {
            $this-> error($msg->getMessage());
         }
    }


    //FUNCTION that show ERROR MSG

    private function error($msgError)
    {
        $view = new view("Error");
        $view->generate(array('msgError' => $msgError));
    }



}
