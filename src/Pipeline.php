<?php

namespace horstoeko\etl;

use horstoeko\etl\interfaces\PipelineInterface;
use horstoeko\etl\interfaces\TaskCollectionInterface;
use horstoeko\etl\interfaces\VariableCollectionInterface;
use horstoeko\etl\variables\VariableCollection;

class Pipeline implements PipelineInterface
{
    /**
     * Parent pipeline
     *
     * @var PipelineInterface
     */
    protected $parentPipeline;

    /**
     * List of tasks
     *
     * @var TaskCollectionInterface
     */
    protected $tasks;

    /**
     * Pipeline parameters
     *
     * @var VariableCollectionInterface
     */
    protected $parameters;

    /**
     * Pipeline variables
     *
     * @var VariableCollectionInterface
     */
    protected $variables;

    /**
     * Constructor
     *
     * @param PipelineInterface|null $parentPipeline
     */
    public function __construct(?PipelineInterface $parentPipeline = null)
    {
        $this->parentPipeline = $parentPipeline;
        $this->tasks = new TaskCollection();
        $this->parameters = new VariableCollection();
        $this->variables = new VariableCollection();
    }

    /**
     * @inheritDoc
     */
    public function getParameters(): VariableCollectionInterface
    {
        return $this->parameters;
    }

    /**
     * @inheritDoc
     */
    public function getVariables(): VariableCollectionInterface
    {
        return $this->variables;
    }

    /**
     * Start a pipeline
     *
     * @return void
     */
    protected static function start()
    {
        return new self();
    }
}
