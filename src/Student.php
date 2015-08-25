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
            $GLOBALS['DB']->exec("DELETE FROM students WHERE id = {$this->getId()};");
            //$GLOBALS['DB']->exec("DELETE FROM enrollments WHERE student_id = {$this->getId()};");
        }

        function getCourses()
        {
            $courses_query = $GLOBALS['DB']->query(
                "SELECT courses.* FROM
                    students JOIN enrollments ON (enrollments.student_id = students.id)
                             JOIN courses     ON (enrollments.course_id = courses.id)
                 WHERE students.id = {$this->getId()};
                "
            );
            $matching_courses = array();
            foreach ($courses_query as $course) {
                $name = $course['name'];
                $code = $course['code'];
                $id = $course['id'];
                $new_course = new Course($name, $code, $id);
                array_push($matching_courses, $new_course);
            }
            return $matching_courses;
        }

        function addCourse($new_course)
        {
            $GLOBALS['DB']->exec("INSERT INTO enrollments (student_id, course_id) VALUES(
                {$this->getId()},
                {$new_course->getId()}
            );");
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

            //if all students are gone, all enrollments should also be deleted
            $GLOBALS['DB']->exec("DELETE FROM enrollments;");
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
