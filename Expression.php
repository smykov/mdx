<?php
include_once "iExpression.php";

class Expression implements iExpression
{
    /**
     * @var array
     */
    protected array $data;

    /**
     * @var string
     */
    protected string $prefix;
    /**
     * @var string
     */
    protected string $postfix;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return string
     */
    public function getString(): string
    {
        if (count($this->data) > 1) {
            return $this->prefix . implode(", ", $this->data) . $this->postfix;
        }
        return $this->data[0];
    }
}