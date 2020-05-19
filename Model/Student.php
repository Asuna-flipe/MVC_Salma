<?php

require_once 'Model/Model.php';
class Student extends Model
{

    //The function that returns the list of informations of all students

    public function GetAllStudents()
    {
        $sql = 'SELECT * FROM eleves';
        $students = $this->executeQuery($sql);
        return $students;

    }


    // The function that returns The informations about a student

    public function GetStudent($cnestudent)
    {
        $sql = 'SELECT * FROM eleves WHERE cne=?';
        $student = $this->executeQuery($sql,array($cnestudent));
        if ($student->rowCount() ==1)
        {
            return $student->fetch(); // access to the first line of the result
        }
        else
        {
            throw new Exception("THERE IS NO STUDENT WITH THE CNE '$cnestudent'");
        }
        
    }


    // The function that change the ' etat ' of the student

    public function changeetat($cnestudent)
    {
        $student = $this->GetStudent($cnestudent);
        if($student["etat"] == "true")
        {
            $sql = "UPDATE eleves SET etat='false' WHERE cne='".$cnestudent."'";
            $req = $this->executeQuery($sql);
        }
        else
        {
            $sql = "UPDATE eleves SET etat='true' WHERE cne='".$cnestudent."'";
            $req = $this->executeQuery($sql);
        }
        return $req;
    }


}

