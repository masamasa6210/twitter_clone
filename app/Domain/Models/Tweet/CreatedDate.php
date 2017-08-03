<?php

namespace App\Domain\Models\Tweet;

use Carbon\Carbon;

class CreatedDate
{
    /**
     * @var \Carbon\Carbon
     */
    private $date;

    /**
     * CreatedDate constructor.
     *
     * @param \Carbon\Carbon $date
     */
    public function __construct(Carbon $date)
    {
        $this->date = $date;
    }

    /**
     * 1時間経過したかどうか
     *
     * @return bool
     */
    private function hasPassedOneHour(): bool
    {
        return Carbon::now()->diffInHours($this->date) > 1;
    }

    /**
     * 1日経過したかどうか
     *
     * @return bool
     */
    private function hasPassedOneDay(): bool
    {
        return Carbon::now()->diffInHours($this->date) > 24;
    }

    /**
     * 1年経過したかどうか
     *
     * @return bool
     */
    private function hasPassedOneYear(): bool
    {
        return Carbon::now()->diffInYears($this->date) > 1;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        if ($this->hasPassedOneYear()) {
            return $this->date->format('j M Y');
        } elseif ($this->hasPassedOneDay()) {
            return $this->date->format('M j');
        } elseif ($this->hasPassedOneHour()) {
            return sprintf('%sh', Carbon::now()->diffInHours($this->date));
        }

        return sprintf('%sm', Carbon::now()->diffInMinutes($this->date));
    }
}
