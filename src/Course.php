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

        }

        function getCode()
        {
            return $this->code;
        }

        function setCode($new_code)
        {

        }

        function getId()
        {

        }






        // Database storage methods
        function save()
        {

        }

        function update($new_name)
        {

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

        }

        static function deleteAll()
        {

        }

        static function find($search_id)
        {

        }

    }
 ?>
