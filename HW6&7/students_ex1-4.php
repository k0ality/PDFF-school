<?php

//namespace University;

class Student
{
    public $firstName;
    public $lastName;
    public $gender;
    public $status;
    public $gpa;
    private const MAX_GPA = 4.0;
    private const STATUS = ['freshman', 'sophomore', 'junior', 'senior'];

    public function __construct($firstName, $lastName, $gender, $status, $gpa)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;

        setGender($gender);
        setStatus($status);
        //to code or not to code

        $this->gpa = $gpa;
    }

    protected function setGender($gender)
    {
        if ('male' !== $gender and 'female' !== $gender) {
            throw new Exception('Set male or female for gender');
        }
        $this->gender = $gender;
        return $this;
    }

    protected function setStatus($status)
    {
        if (in_array($status, self::STATUS, true)) {
            throw new Exception('Set status to freshman, sophomore, junior or senior');
        }
        $this->status = $status;
        return $this;
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



/*
Define a student class.
A student has the following attributes:
`firstname`,
`lastname`,
`gender` which can be "male" or "female",
`status` which can be equal to "freshman", "sophomore", "junior", and "senior"
and 'gpa'.
*/
