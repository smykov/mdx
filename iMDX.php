<?php

interface iMDX
{
    public function setNameCube(string $nameCube);

    public function setMeasures(array $measures);

    public function setDimensions(array $dimensions);

    public function getNameCube();

    public function getMeasures();

    public function getDimensions();

    public function generateQuery();
}