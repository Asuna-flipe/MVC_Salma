<?php
/*An abstract method is simply 
a function definition that serves to 
tell the programmer that the method must be implemented in a CHILD CLASS*/
abstract class Model
{
    private $bdd; // The PDO Objectt of access to the database


     //the function that performs the connection to the database, instantiates and returns the associated PDO object
        private function GetBdd() //private method can only be accessed from within the class that defines it (Model)
        {
            if($this->bdd==null) // if no DB exists
            { // we will create one
                $this->bdd = new PDO('mysql:host=localhost;dbname=ensat;charset=utf8','root','',
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                //PDO::ERRMODE_EXCEPTION: This value throws exceptions. 
                //In exception mode, if there is an error in SQL, PDO will throw exceptions and script will stop running
            }
            return $this->bdd;
        } 
    
    // the function that executes an SQL query
        // protected method can only be accessed from within the class that defines it, or a descendant of that class
        // because we'll need it in the descendant classes
        protected function executeQuery($sql,$params = null)
        {
            if($params == null) //direct execution
            {
                $result = $this->GetBdd()->query($sql);
            }
            else           // prepared query execution
            {
                $result = $this->GetBdd()->prepare($sql);
                $result->execute($params);
            }
            return $result;
        }

}
