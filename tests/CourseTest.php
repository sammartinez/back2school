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
        function test_getAll()
        {
            //Arrange
            $name = "High Times";
            $code = "CHEM420";
            $test_course = new Course($name, $code);
            $test_course->save();

            $name2 = "Gavanese Jamelan";
            $code2 = "MUSC69";
            $test_course2 = new Course($name2, $code2);
            $test_course2->save();

            //Act
            $result = Course::getAll();

            //Assert
            $this->assertEquals([$test_course, $test_course2], $result);
        }

        //delete all test
        function test_deleteAll()
        {
            //Arrange
            $name = "High Times";
            $code = "CHEM420";
            $test_course = new Course($name, $code);
            $test_course->save();

            $name2 = "Gavanese Jamelan";
            $code2 = "MUSC69";
            $test_course2 = new Course($name2, $code2);
            $test_course2->save();

            //Act
            Course::deleteAll();

            //Assert
            $result = Course::getAll();
            $this->assertEquals([], $result);
        }

        function test_update()
        {
            //Arrange
            $name = "High Times";
            $code = "CHEM420";
            $test_course = new Course($name, $code);
            $test_course->save();

            //Act
            $new_name = "Boring Normal Chemistry";
            $test_course->update($new_name);

            //Assert
            $result = Course::getAll();
            $this->assertEquals($new_name, $result[0]->getName());
        }

        function test_find()
        {
            //Arrange
            $name = "High Times";
            $code = "CHEM420";
            $test_course = new Course($name, $code);
            $test_course->save();

            $name2 = "Gavanese Jamelan";
            $code2 = "MUSC69";
            $test_course2 = new Course($name2, $code2);
            $test_course2->save();

            //Act
            $result = Course::find($test_course->getId());

            //Assert
            $this->assertEquals($test_course, $result);
        }

        function test_delete()
        {
            //Arrange
            $name = "High Times";
            $code = "CHEM420";
            $test_course = new Course($name, $code);
            $test_course->save();

            $name2 = "Gavanese Jamelan";
            $code2 = "MUSC69";
            $test_course2 = new Course($name2, $code2);
            $test_course2->save();

            //Act
            $test_course->delete();
            $result = Course::getAll();

            //Assert
            $this->assertEquals($test_course2, $result[0]);
        }
    }
?>
