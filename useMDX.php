<?php

include 'MDX.php';
include 'MemberExpression.php';
include 'TupleExpression.php';

$mdx = new MDX();

$mdx->setNameCube("[Sales]")
    ->setColumns(new MemberExpression(["[Measures].[Amount]", "[Date].[Year]"]))
    ->setRows(new TupleExpression(["[Product].[Product].[Name].&[Носок]", "[Product].[Product].[Name].&[Валенок]"]));

echo $mdx->generateQuery();