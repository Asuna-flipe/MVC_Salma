<?php

class view
{
    private $file; //Name of the file associated with the view
    private $title; // the title associated with the view


    // The function that Determin the name of the file viewed from the action

    public function __construct($action)
    {
        $this->file= "Views/view" . $action . ".php";
    }


    //the function that Generate and display the view

    public function generate($data)
    {
        // generate the view 
        
        $content = $this->generatefile($this->file, $data);
         
        // generate the 'gabarit'

        $view = $this->generatefile('Views/gabarit.php', array('title' => $this->title, 'content' => $content));

        // Display the view 

        echo $view;
    }



    // The function that generate the file 

private function generatefile($file, $data) {
    if (file_exists($file))  // we will test if the file exist
     {

    extract($data);          // Make the elements of the $data array accessible in the view (title and content)
    // Démarrage de la temporisation de sortie
    ob_start();      // Start of exit delay 
    // hadi katkhli dok les donnes mkhaznin 
    //mo2a9atan o kanbyno l motassafi7 hir dekshi li bayn dok ro2oss o shi lakhor kankheznoh mo2a9Atan

   //include the view of the file
    require $file;   

    return ob_get_clean(); // erase the contents of this tempon
    }
    else
        {
            throw new Exception("Fichier '$fichier' introuvable");
        }
 }



}