<?php

namespace horstoeko\etl\tasks;

use horstoeko\etl\interfaces\PipelineInterface;
use horstoeko\etl\interfaces\TaskInterface;
use horstoeko\etl\interfaces\VariableCollectionInterface;
use horstoeko\etl\variables\VariableCollection;

class Task implements TaskInterface
{
    /**
     * Task name
     *
     * @var string
     */
    protected $name = "";

    /**
     * Pipeline
     *
     * @var PipelineInterface
     */
    protected $pipeline;

    /**
     * Task settings
     *
     * @var VariableCollectionInterface
     */
    protected $settings;

    /**
     * Constructor
     */
    public function __construct(PipelineInterface $pipeline)
    {
        $this->pipeline = $pipeline;
        $this->settings = new VariableCollection();
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return $this->name;
    }
}