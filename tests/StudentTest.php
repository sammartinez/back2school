<?php

    /**
    * @backupGlobals disabled
    * @backupStatic Attributes disabled
    */

    require_once "src/Course.php";
    require_once "src/Student.php";

    $server = 'mysql:host=localhost;dbname=back2school_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StudentTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Student::deleteAll();
            Course::deleteAll();
        }

        function test_getName()
        {
            //Arrange
            $name = "Shmuel Irving-Jones";
            // very new student
            $enrollment_date = "2015-08-25";
            $test_student = new Student($name, $enrollment_date);

            //Act
            $result = $test_student->getName();

            //Assert
            $this->assertEquals($name, $result);
        }

        
    }

?>
