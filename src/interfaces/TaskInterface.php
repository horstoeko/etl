<?php

namespace horstoeko\etl\interfaces;

interface TaskInterface
{
    /**
     * Returns the task name
     *
     * @return string
     */
    public function getName(): string;
}