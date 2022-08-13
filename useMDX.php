<?php

include 'MDX.php';

$mdx = new MDX();

$mdx->setNameCube("[Sales]")
    ->setMeasures(["[Measures].[Amount]"])
    ->setTuple(["[Product].[Product].[Name].&[Носок]", "[Product].[Product].[Name].&[Валенок]"]);

echo $mdx->generateQuery();