<?php

include 'MDX.php';

$mdx = new MDX();

$mdx->setNameCube("[Sales]")
    ->setMeasures(["[Amount]"])
    ->setDimensions(["[Product].[Product].[Name]"]);

echo $mdx->generateQuery();