<?php

//NOT READY YET, SORRY

class Stack
{
    protected $array;
    protected $length;

    public function __construct($length = 10)
    {
        // initialize the stack
        $this->array = [];
        // stack can only contain this many items
        $this->length = $length;
    }

    public function push($item)
    {
        // trap for stack overflow
        if (count($this->array) < $this->length) {
            // prepend item to the start of the array
            array_unshift($this->array, $item);
        } else {
            throw new RunTimeException('Stack is full!');
        }
    }

    public function pop()
    {
        if ($this->isEmpty()) {
            // trap for stack underflow
            throw new RunTimeException('Stack is empty!');
        } else {
            // pop item from the start of the array
            return array_shift($this->array);
        }
    }

    public function top()
    {
        return current($this->array);
    }

    public function isEmpty()
    {
        return empty($this->array);
    }
}


/*
Exercise 3: Implement a stack using two queues
*/
