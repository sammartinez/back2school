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
