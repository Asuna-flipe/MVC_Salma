<?php
require_once 'Model/Student.php';
require_once 'Views/view.php';

class ControllerStudents
{
    private $student;
    
    //Constructeur Function

    public function __construct()
    {
        $this->student = new Student();
    }



    // Function That shows all The students

    public function students()
    {
        $students = $this->student->GetAllStudents();
        $view = new view("Students");
        $view->generate(array('students' => $students));

    }


    // Function that modify the 'etat' of a specific student

    public function activation($cnestudent)
    {
        $req=$this->student->changeetat($cnestudent); // change the etat
        $this->students(); // show the update list of student
    }

}