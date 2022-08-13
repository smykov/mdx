<?php
include_once 'Expression.php';

class TupleExpression extends Expression
{
    /**
     * @var string
     */
    protected string $prefix = "(";
    /**
     * @var string
     */
    protected string $postfix = ")";

}