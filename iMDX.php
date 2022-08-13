<?php

interface iMDX
{
    public function setNameCube(string $nameCube): MDX;

    public function setColumns(Expression $expression): MDX;

    public function setRows(Expression $expression): MDX;

    public function getNameCube(): string;

    public function getColumns(): string;

    public function getRows(): string;

    public function generateQuery(): string;
}