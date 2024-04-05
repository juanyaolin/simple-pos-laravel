<?php

namespace App\Traits;

trait UsingTableNameAsMorphClass
{
    /**
     * Get the class name for polymorphic relations.
     */
    public function getMorphClass(): string
    {
        return $this->getTable();
    }
}
