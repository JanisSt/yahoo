<?php

namespace App\Models;

class Stock
{

    private string $name;
    private float $close;
    private float $open;
    private float $bid;
    private float $bidSize;
    private float $ask;
    private float $askSize;
    private float $day_low;
    private float $day_high;
    private float $year_low;
    private float $year_high;
    private float $volume;
    private float $avgVolume;
    private ?string $createdAt;

    public function __construct(
        string $name, float $close, float $open,
        float $bid, float $bidSize, float $ask, float $askSize, float $day_low,
        float $day_high, float $year_low,
        float $year_high, float $volume, float $avgVolume, string $createdAt = null)
    {

        $this->name = $name;
        $this->close = $close;
        $this->open = $open;
        $this->bid = $bid;
        $this->bidSize = $bidSize;
        $this->ask = $ask;
        $this->askSize = $askSize;
        $this->day_low = $day_low;
        $this->day_high = $day_high;
        $this->year_low = $year_low;
        $this->year_high = $year_high;
        $this->volume = $volume;
        $this->avgVolume = $avgVolume;
        $this->createdAt = $createdAt;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getClose(): float
    {
        return $this->close;
    }

    public function getOpen(): float
    {
        return $this->open;
    }

    public function getBid(): string
    {
        return ($this->bid . ' x ' . $this->bidSize * 100);
    }

    public function getAsk(): string
    {
        return ($this->ask . ' x ' . $this->askSize * 100);
    }

    public function getDayRange(): string
    {
        return ($this->day_low . ' - ' . $this->day_high);
    }

    public function getYearRate(): string
    {
        return ($this->year_low . ' - ' . $this->year_high);
    }

    public function getVolume(): string
    {
        return number_format($this->volume, 0, ',', ',');
    }

    public function getAvgVolume(): string
    {
        return number_format($this->avgVolume, 0, ',', ',');

    }

    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

}