<?php

namespace Osi\Cron;

use DateTime;
use Cron\CronExpression;

class Job implements JobInterface
{
    protected string $expression;

    /**
     * @var mixed
     */
    protected $data;

    /**
     * @param mixed $data
     */
    public function __construct(string $expression, $data)
    {
        $this->expression = $expression;
        $this->data       = $data;
    }

    public function getExpression() : string
    {
        return $this->expression;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    public function isDue(DateTime $datetime = null) : bool
    {
        $cronExpression = CronExpression::factory(
            $this->getExpression()
        );

        return $cronExpression->isDue($datetime);
    }
}
