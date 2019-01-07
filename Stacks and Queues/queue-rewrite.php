<?php

/**
 * In a queue, the element deleted is always the one that has been in the set for the longest time:
 * the queue implements a first-in, first-out, or FIFO, policy
 */
class Queue
{
    private $container = [];
    private $head = 0;
    private $tail = 0;
    private $length = 10;

    /**
     * We call the INSERT operation on a queue ENQUEUE
     */
    public function enqueue($x)
    {
        $this->container[$this->tail] = $x;
        if ($this->tail == $this->length - 1) {
            $this->tail = 0;
        } else {
            $this->tail = $this->tail + 1;
        }
    }

    /**
     * The element dequeued is always the one at the head of the queue,
     * like the customer at the head of the linewho has waited the longest.
     */
    public function dequeue()
    {
        $x = $this->container[$this->head];
        if ($this->head === $this->length - 1) {
            $this->head = 0;
        } else {
            $this->head = $this->head + 1;
        }
        return $x;
    }
}


/*
Exercise 1: Rewrite ENQUEUE and DEQUEUE to detect underflow and overflow of a queue.
Refactor the class if needed.

Enqueue inserts the following line as the first line:
if head[Q] = tail[Q] + 1 or (head[Q] = 1 and tail[Q] = length[Q]) then error “overflow”

Dequeue inserts the following line as the first line:
if head[Q] = tail[Q] then error “underflow”
*/
