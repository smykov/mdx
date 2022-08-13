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
     * @var array
     */
    private array $tuple;

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
        $rows = "";
        if (!empty($this->dimensions)) {
            $rows = $this->getDimensions();
        }
        if (!empty($this->tuple)) {
            $rows = $this->getTuple();
        }

        $query = "SELECT\n";
        if (!empty($this->measures)) {
            $query .= "\t{$this->getMeasures()} ON COLUMNS";
        }
        if ($rows != "") {
            $query .= ",\n";
            $query .= "\t$rows ON ROWS\n";
        }
        $query .= "FROM {$this->getNameCube()}";

        return $query;
    }

    /**
     * @return string
     */
    public function getTuple(): string
    {
        if (count($this->tuple) > 1) {
            return "{" . implode(", ", $this->tuple) . "}";
        }
        return $this->tuple[0];
    }

    /**
     * @param array $tuple
     */
    public function setTuple(array $tuple): MDX
    {
        $this->tuple = $tuple;
        return $this;
    }
}
