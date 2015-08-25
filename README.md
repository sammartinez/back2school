# Back2School

##### , 08/25/15

#### By Ashlin Aronin and Deron Johnson

## Description


## Setup
* Clone this repository

* Run the following command in the project directory
```console
$ composer install
```

* Start MySQL and run the following commands:
```console
mysql> CREATE DATABASE back2school;
mysql> USE back2school;
mysql> CREATE TABLE students (id serial PRIMARY KEY, name VARCHAR (255), enrollment_date DATE);
mysql> CREATE TABLE courses (id serial PRIMARY KEY, name VARCHAR (255), code VARCHAR (255));
mysql> CREATE TABLE enrollments (id serial PRIMARY KEY, student_id BIGINT(20) UNSIGNED, course_id BIGINT(20) UNSIGNED);
```
(To run tests with PHPUnit, create a copy of the 'back2school' database called 'back2school_test')

* Start Apache server with the following command:
```console
$ apachectl start
```

* Start a PHP server in the web directory
```console
$ php -S localhost:8000
```

* Navigate your browser to localhost:8000

* Enjoy!

## Technologies Used

PHP, MySQL, PHPUnit, Silex, Twig, HTML, CSS, Bootstrap

### Legal

Copyright (c) Ashlin Aronin and Deron Johnson

This software is licensed under the MIT license.

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
