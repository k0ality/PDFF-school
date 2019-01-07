<?php

class StudentException extends Exception
{

}

class GenderException extends StudentException
{
    protected $message = 'Gender can be only female or male' . PHP_EOL;
}

class StatusException extends StudentException
{
    protected $message = 'Set status to freshman, sophomore, junior or senior' . PHP_EOL;
}

class GpaException extends StudentException
{
    protected $message = 'The highest possible GPA is a 4.0' . PHP_EOL;
}


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
        $this->setGender($gender);
        $this->setStatus($status);
        $this->setGpa($gpa);
    }

    protected function setGender($gender)
    {
        try {
            if (!in_array($gender, self::GENDER_RANGE, true)) {
                throw new GenderException;
            }
        } catch (StudentException $e) {
            die($e->getMessage());
        }
        $this->gender = $gender;
    }

    protected function setStatus($status)
    {
        try {
            if (!in_array($status, self::STATUS_RANGE, true)) {
                throw new StatusException;
            }
        } catch (StudentException $e) {
            die($e->getMessage());
        }
        $this->status = $status;
    }

    protected function setGpa($gpa)
    {
        try {
            if ($gpa > self::MAX_GPA) {
                throw new GpaException;
            }
        } catch (StudentException $e) {
            die($e->getMessage());
        }
        $this->gpa = $gpa;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getGpa()
    {
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
        if ($studyTime <= 0) {
            die('Study time equal or below 0 minutes will get you expelled' . PHP_EOL);
        }

        $this->gpa += log($studyTime);

        if ($this->gpa > self::MAX_GPA) {
            $this->gpa = self::MAX_GPA;
        };
    }

    public function __destruct()
    {
        echo 'Destroying instance of ' . __CLASS__ . PHP_EOL;
    }

    public function __toString()
    {
        return 'Student Identity Card: ' . $this->getFirstName() . ' ' .  $this->getLastName() . PHP_EOL .
            'Gender: ' . $this->getGender() . PHP_EOL . 'Status: ' . $this->getStatus() . PHP_EOL;
    }

    public function __debugInfo()
    {
        return [
            'FirstName' => $this->getFirstName(),
            'LastName' => $this->getLastName(),
            'Gender' => $this->getGender(),
            'Status' => $this->getStatus(),
            'GPA' => $this->getGpa(),
        ];
    }

    public function  __isset($property)
    {
        return isset($this->$property);
    }

    public function __unset($property)
    {
        unset($this->$property);
    }
}

$student_list = array(
    $studentOne = new Student('Mike', 'Barnes', 'male', 'freshman', 4),
    $studentTwo = new Student('Jim', 'Nickerson', 'male', 'sophomore', 3),
    $studentThree = new Student('Jack', 'Indabox', 'male', 'junior', 2.5),
    $studentFour = new Student('Jane', 'Miller', 'female', 'senior', 3.6),
    $studentFive = new Student('Mary', 'Scott', 'female', 'senior', 2.7)
);

echo('<<< INITIAL <<<' . PHP_EOL);

foreach ($student_list as $student_record) {
    $student_record->showMyself();
}

echo('>>> AFTER STUDYING >>>' . PHP_EOL);

$studentOne->studyTime(60);
$studentTwo->studyTime(100);
$studentThree->studyTime(40);
$studentFour->studyTime(300);
$studentFive->studyTime(1000);

foreach ($student_list as $student_record) {
    $student_record->showMyself();
}

echo $studentFour;
var_dump($studentFive);



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
