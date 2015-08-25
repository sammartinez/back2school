<?php
    class Course
    {

        private $name;
        private $code;
        private $id;

        function __construct($name, $code, $id = null)
        {
            $this->name = $name;
            $this->code = $code;
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

        function getCode()
        {
            return $this->code;
        }

        function setCode($new_code)
        {
            $this->code = $new_code;
        }

        function getId()
        {
            return $this->id;
        }






        // Database storage methods
        function save()
        {
            $GLOBALS['DB']->exec(
                "INSERT INTO courses (name, code) VALUES (
                    '{$this->getName()}',
                    '{$this->getCode()}'
                );"
            );
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        function update($new_name)
        {
            $GLOBALS['DB']->exec("UPDATE courses SET name = '{$new_name}' WHERE id = {$this->getId()};");
            $this->setName($new_name);
        }

        function delete()
        {

        }

        function addStudent($student)
        {

        }

        function getStudents()
        {

        }

        static function getAll()
        {
            $courses_query = $GLOBALS['DB']->query("SELECT * FROM courses;");
            $all_courses = array();
            foreach ($courses_query as $course) {
                $name = $course['name'];
                $code = $course['code'];
                $id = $course['id'];
                $new_course = new Course($name, $code, $id);
                array_push($all_courses, $new_course);
            }
            return $all_courses;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM courses;");
        }

        static function find($search_id)
        {
            $found_course = null;
            $courses = Course::getAll();
            foreach ($courses as $course) {
                $course_id = $course->getId();
                if ($course_id == $search_id) {
                    $found_course = $course;
                }
            }
            return $found_course;
        }

    }
 ?>
