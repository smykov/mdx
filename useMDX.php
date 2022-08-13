<?php

include 'MDX.php';

$mdx = new MDX();

$mdx->setNameCube("[Sales]")
    ->setMeasures(["[Measures].[Amount]"])
    ->setDimensions(["[Product].[Product].[Name]", "[Date].[Year]"]);

echo $mdx->generateQuery();