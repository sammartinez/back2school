<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Course.php";
    require_once __DIR__."/../src/Student.php";

    $app = new Silex\Application();
    $server = 'mysql:host=localhost;dbname=back2school';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__."/../views"
    ));

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    //Get Calls
    $app->get("/", function() use ($app) {
        return $app['twig']->render("index.html.twig", array('students' => Student::getAll(),'courses' => Course::getAll()));
    });

    $app->get("/students", function() use ($app) {
        return $app['twig']->render("students.html.twig", array('students' => Student::getAll(), 'courses' => Course::getAll()));
    });

    $app->get("/courses", function() use ($app) {
        return $app['twig']->render("courses.html.twig", array('courses' => Course::getAll()));
    });

    $app->get("/courses/{id}", function($id) use ($app) {

        $course = Course::find($id);
        return $app['twig']->render("course.html.twig", array('course' => $course, 'students' => $course->getStudents()));
    });

    //Post Calls
    $app->post("/students", function() use ($app) {
        $name = $_POST['name'];
        $enroll_date = $_POST['enroll_date'];
        $student = new Student($name, $enroll_date);
        $student->save();

        return $app['twig']->render('students.html.twig', array('students' => Student::getAll()));
    });

    $app->post("/courses", function() use ($app) {
        $name = $_POST['name'];
        $code = $_POST['code'];
        $course = new Course($name, $code);
        $course->save();

        return $app['twig']->render('courses.html.twig', array('courses' => Course::getAll()));
    });





    return $app;
?>
