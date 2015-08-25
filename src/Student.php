<?php
    class Student
    {
        private $name;
        private $enroll_date;
        private $id;

        function __construct($name, $enroll_date, $id = null)
        {
            $this->name = $name;
            $this->enroll_date = $enroll_date;
            $this->id = $id;
        }



        // Getters and Setters
        function getName()
        {
            return $this->name;
        }

        function setName($new_name)
        {
            $this->name = $new_name;
        }

        function getEnrollDate()
        {
            return $this->enroll_date;
        }

        function setEnrollDate($new_enroll_date)
        {
            $this->enroll_date = $new_enroll_date;
        }

        function getId()
        {
            return $this->id;
        }



        // Database methods

        function save()
        {
            $GLOBALS['DB']->exec(
                "INSERT INTO students (name, enroll_date) VALUES(
                    '{$this->getName()}',
                    '{$this->getEnrollDate()}'
                );"
            );
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        function update($new_name)
        {
            $GLOBALS['DB']->exec("UPDATE students SET name = '{$new_name}' WHERE id = {$this->getId()};");
            $this->setName($new_name);
        }

        function delete()
        {

        }

        function getCourses()
        {

        }

        function addCourse($new_course)
        {

        }

        static function getAll()
        {
            $students_query = $GLOBALS['DB']->query("SELECT * FROM students;");
            $all_students = array();
            foreach ($students_query as $student) {
                $name = $student['name'];
                $enroll_date = $student['enroll_date'];
                $id = $student['id'];
                $new_student = new Student($name, $enroll_date, $id);
                array_push($all_students, $new_student);
            }
            return $all_students;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM students;");
        }

        static function find($search_id)
        {
            $found_student = null;
            $all_students = Student::getAll();
            foreach ($all_students as $student) {
                if ($student->getId() == $search_id) {
                    $found_student = $student;
                }
            }
            return $found_student;
        }

    }

?>
