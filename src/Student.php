<?php
    class Student
    {
        private $name;
        private $enrollment_date;
        private $id;

        function __construct($name, $enrollment_date, $id = null)
        {
            $this->name = $name;
            $this->enrollment_date = $enrollment_date;
            $this->id = $id;
        }



        // Getters and Setters
        function getName()
        {

        }

        function setName($new_name)
        {

        }

        function getEnrollmentDate()
        {

        }

        function setEnrollmentDate($new_enrollment_date)
        {

        }

        function getId()
        {

        }



        // Database methods

        function save()
        {

        }
        function update()
        {

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

        }

        static function deleteAll()
        {

        }

        static function find($search_id)
        {

        }

    }

?>
