<?php

include 'iMDX.php';

class MDX implements iMDX
{

    /**
     * @var string
     */
    private string $nameCube;
    /**
     * @var array
     */
    private array $measures;
    /**
     * @var array
     */
    private array $dimensions;

    /**
     * @param string $nameCube
     */
    public function setNameCube(string $nameCube): MDX
    {
        $this->nameCube = $nameCube;
        return $this;
    }

    /**
     * @param array $measures
     */
    public function setMeasures(array $measures): MDX
    {
        $this->measures = $measures;
        return $this;
    }

    /**
     * @param array $dimensions
     */
    public function setDimensions(array $dimensions): MDX
    {
        $this->dimensions = $dimensions;
        return $this;
    }

    /**
     * @return string
     */
    public function getNameCube(): string
    {
        return $this->nameCube;
    }

    /**
     * @return string
     */
    public function getMeasures(): string
    {
        if (count($this->measures) > 1) {
            return "{" . implode(", ", $this->measures) . "}";
        }
        return $this->measures[0];
    }

    /**
     * @return string
     */
    public function getDimensions(): string
    {
        if (count($this->dimensions) > 1) {
            return "{" . implode(", ", $this->dimensions) . "}";
        }
        return $this->dimensions[0];
    }

    /**
     * @return string
     */
    public function generateQuery(): string
    {
        $query = "SELECT\n";
        if (!empty($this->measures)) {
            $query .= "\t{$this->getMeasures()} ON COLUMNS";
        }
        if (!empty($this->dimensions)) {
            $query .= ",\n";
            $query .= "\t{$this->getDimensions()} ON ROWS\n";
        }
        $query .= "FROM {$this->getNameCube()}";

        return $query;
    }
}
