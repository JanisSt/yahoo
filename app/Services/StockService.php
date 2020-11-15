<?php

namespace App\Services;

use App\Models\Stock;

use App\Repositories\StockRepository;

class StockService
{

    private StockRepository $stockRepository;

    public function __construct()
    {
        $this->stockRepository = new StockRepository();
    }

    public function getByName()
    {
        $value = $this->stockRepository->getByName();


        return new Stock(
            (string)$value['name'],
            (float)$value['close'],
            (float)$value['open'],
            (float)$value['bid'],
            (float)$value['bid_size'],
            (float)$value['ask'],
            (float)$value['ask_size'],
            (float)$value['day_low'],
            (float)$value['day_high'],
            (float)$value['year_low'],
            (float)$value['year_high'],
            (float)$value['volume'],
            (float)$value['avg_volume'],
            (string)$value['createdAt']
        );

    }

    public function show()
    {
        return $this->stockRepository->getStock();
    }


}