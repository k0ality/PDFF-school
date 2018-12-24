<?php

//NOT READY YET

class Student
{
    private $firstName;
    private $lastName;
    private $gender;
    private $status;
    private $gpa;

    private const GENDER_RANGE  = ['female', 'male'];
    private const STATUS_RANGE = ['freshman', 'sophomore', 'junior', 'senior'];
    private const MAX_GPA = 4.0;

    public function __construct($firstName, $lastName, $gender, $status, $gpa)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->gender = setGender($gender);
        $this->status = setStatus($status);
        $this->gpa = setGpa($gpa);
    }

    protected function setGender($gender)
    {
        if (in_array($gender, self::GENDER_RANGE, true)) {
            throw new Exception('Set male or female for gender');
        }
        $this->gender = $gender;
        return $this;
    }

    protected function setStatus($status)
    {
        if (in_array($status, self::STATUS_RANGE, true)) {
            throw new Exception('Set status to freshman, sophomore, junior or senior');
        }
        $this->status = $status;
        return $this;
    }

    protected function setGpa($gpa)
    {
        if ($gpa > self::MAX_GPA) {
            throw new Exception('The highest possible GPA is a 4.0');
        }

        $this->gpa = $gpa;
        return $this;
    }

    public function getGender() {
        return $this->gender;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getGpa() {
        return $this->gpa;
    }

    public function showMyself()
    {
        foreach ($this as $key => $value) {
            print ("$key => $value" . PHP_EOL);
        }
    }

    public function studyTime($studyTime)
    {
        $this->gpa += log($studyTime);

        if ($this->gpa > self::MAX_GPA) {
            $this->gpa = self::MAX_GPA;
        };
    }
}

$inputStudents = [
    ['firstName' => 'Mike', 'lastName' => 'Barnes', 'gender' => 'male', 'status' => 'freshman', 'gpa' => 4],
    ['firstName' => 'Jim', 'lastName' => 'Nickerson', 'gender' => 'helicopter', 'status' => 'sophomore', 'gpa' => 3],
    ['firstName' => 'Jack', 'lastName' => 'Indabox', 'gender' => 'male', 'status' => 'junior', 'gpa' => 2.5],
    ['firstName' => 'Jane', 'lastName' => 'Miller', 'gender' => 'female', 'status' => 'senior', 'gpa' => 3.6],
    ['firstName' => 'Mary', 'lastName' => 'Scott', 'gender' => 'female', 'status' => 'senior', 'gpa' => 2.7],
];
$inputStudyTime = [60, 100, 40, 300, 1000];


$studentObj = new Student();
$studentObj->gpa = Student::MAX_GPA;



/*
Exercise 1

Define a student class.

A student has the following attributes:
firstname,
lastname,
gender which can be male or female,
status which can be equal to freshman, sophomore, junior, and senior
and gpa.

Then define the following methods for the student class.

The show_myself method will simply print all the attribute variables when called upon the object.
This method has no input arguments.
The study_time method will increment the gpa of the student according to the following formula:
` gpa = gpa + log(study_time)`.
The only input argument of this method is the variable study_time.
In addition make sure that the gpa variable never exceeds 4.0 even if the student studies for a very long time.

Exercise 2

Now define 5 student objects and store the objects in a list called student_list.
The five students are: Mike Barnes, Jim Nickerson, Jack Indabox, Jane Miller and Mary Scott.
Mike is a freshman, Jim a sophomore, Jack a junior, Jane and Mary are seniors.
Their respective GPAs are: 4, 3, 2.5, 3.6 and 2.7.
Make sure you assign the gender when you instantiate the objects.

Then call the show_myself method on all of them.
I suggest you use a loop for making the objects and a separate loop for showing the objects.

Exercise 3

Use your objects from above and let each one of the 5 students study
for 60, 100, 40, 300, 1000 minutes, respectively.
So the first student studies 60 minutes, the second studies 100 minutes, etc.
After that call the show_myself methods on all 5 again
and check whether their new gpa reflects how much they studied.

Exercise 4

Now use magic methods from the link http://php.net/manual/en/language.oop5.magic.php
and try to refactor your code using these methods.
Imagine additional cases for your code if needed.
*/
