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
            $enroll_date = "2015-08-25";
            $test_student = new Student($name, $enroll_date);

            //Act
            $result = $test_student->getName();

            //Assert
            $this->assertEquals($name, $result);
        }

        function test_getEnrollDate()
        {
            //Arrange
            $name = "Shmuel Irving-Jones";
            $enroll_date = "2015-08-25";
            $test_student = new Student($name, $enroll_date);

            //Act
            $result = $test_student->getEnrollDate();

            //Assert
            $this->assertEquals($enroll_date, $result);
        }

        function test_save()
        {
            //Arrange
            $name = "Shmuel Irving-Jones";
            $enroll_date = "2015-08-25";
            $test_student = new Student($name, $enroll_date);

            //Act
            $test_student->save();

            //Assert
            $result = Student::getAll();
            $this->assertEquals($test_student, $result[0]);
        }

        function test_getAll()
        {
            //Arrange
            $name = "Shmuel Irving-Jones";
            $enroll_date = "2015-08-25";
            $test_student = new Student($name, $enroll_date);
            $test_student->save();

            $name2 = "Billy Bartle-Barnaby";
            $enroll_date2 = "2015-07-09";
            $test_student2 = new Student($name2, $enroll_date2);
            $test_student2->save();

            //Act
            Student::getAll();

            //Assert
            $this->assertEquals([$test_student, $test_student2], $result);
        }

        function test_deleteAll()
        {
            //Arrange
            $name = "Shmuel Irving-Jones";
            $enroll_date = "2015-08-25";
            $test_student = new Student($name, $enroll_date);
            $test_student->save();

            $name2 = "Billy Bartle-Barnaby";
            $enroll_date2 = "2015-07-09";
            $test_student2 = new Student($name2, $enroll_date2);
            $test_student2->save();

            //Act
            Student::deleteAll();

            //Assert
            $result = Student::getAll();
            $this->assertEquals([], $result);
        }


    }

?>
