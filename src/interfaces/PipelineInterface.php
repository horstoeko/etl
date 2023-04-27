<?php

namespace horstoeko\etl\interfaces;

interface PipelineInterface
{
    /**
     * Returns the pipeline parameters
     *
     * @return VariableCollectionInterface
     */
    public function getParameters(): VariableCollectionInterface;

    /**
     * Returns the pipeline variables
     *
     * @return VariableCollectionInterface
     */
    public function getVariables(): VariableCollectionInterface;
}
