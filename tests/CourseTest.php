<?php

    /**
    * @backupGlobals disabled
    * @backupStatic Attributes disabled
    */

    require_once "src/Course.php";
    //require_once "src/Student.php";

    $server = 'mysql:host=localhost;dbname=back2school_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class CourseTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Course::deleteAll();
            // Student::deleteAll();
        }

        function test_getName()
        {
            //Arrange
            $name = "High Times";
            $code = "CHEM420";
            $test_course = new Course($name, $code);

            //Act
            $result = $test_course->getName();

            //Assert
            $this->assertEquals($name, $result);
        }

        function test_getCode()
        {
            //Arrange
            $name = "High Times";
            $code = "CHEM420";
            $test_course = new Course($name, $code);

            //Act
            $result = $test_course->getCode();

            //Assert
            $this->assertEquals($code, $result);
        }

        //save test
        function test_save()
        {
            //Arrange
            $name = "Gavanese Jamelan";
            $code = "MUSC69";
            $test_course = new Course($name, $code);
            $test_course->save();

            //Act
            $result = Course::getAll();

            //Assert
            $this->assertEquals($test_course, $result[0]);
        }


        //getall test

        //delete all test
    }
?>
