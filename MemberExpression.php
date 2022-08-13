<?php
include_once 'Expression.php';

class MemberExpression extends Expression
{
    /**
     * @var string
     */
    protected string $prefix = "{";
    /**
     * @var string
     */
    protected string $postfix = "}";
}