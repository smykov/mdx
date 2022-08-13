<?php

include_once 'iMDX.php';

class MDX implements iMDX
{

    /**
     * @var string
     */
    private string $nameCube;
    /**
     * @var Expression
     */
    private Expression $columns;
    /**
     * @var Expression
     */
    private Expression $rows;

    /**
     * @param string $nameCube
     * @return MDX
     */
    public function setNameCube(string $nameCube): MDX
    {
        $this->nameCube = $nameCube;
        return $this;
    }

    /**
     * @param Expression $expression
     * @return MDX
     */
    public function setColumns(Expression $expression): MDX
    {
        $this->columns = $expression;
        return $this;
    }

    /**
     * @param Expression $expression
     * @return MDX
     */
    public function setRows(Expression $expression): MDX
    {
        $this->rows = $expression;
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
    public function getColumns(): string
    {
        return $this->columns->getString();
    }


    /**
     * @return string
     */
    public function getRows(): string
    {
        return $this->rows->getString();
    }

    /**
     * @return string
     */
    public function generateQuery(): string
    {
        $query = "SELECT\n";
        if (!empty($this->columns)) {
            $query .= "\t{$this->getColumns()} ON COLUMNS";
        }
        if (!empty($this->rows)) {
            $query .= ",\n";
            $query .= "\t{$this->getRows()} ON ROWS\n";
        }
        $query .= "FROM {$this->getNameCube()}";

        return $query;
    }

}
