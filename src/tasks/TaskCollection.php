<?php

namespace horstoeko\etl;

use horstoeko\etl\tasks\Task;
use horstoeko\etl\interfaces\TaskCollectionInterface;

class TaskCollection implements TaskCollectionInterface
{
    /**
     * Tasks (internal)
     *
     * @var Task[]
     */
    protected $tasks;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tasks = [];
    }
}