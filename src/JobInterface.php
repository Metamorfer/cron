<?php

namespace Osi\Cron;

use DateTime;

interface JobInterface
{
    public function isDue(DateTime $datetime = null) : bool;
}
