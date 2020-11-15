<?php

namespace App\Controllers;

use App\Services\StockService;
use Carbon\Carbon;

use App\Repositories\StockRepository;

class StockController
{
    private array $stocks;

    public function index()
    {
        return require_once __DIR__ . '/../Views/StockView.php';
    }

    public function add()
    {
        $timer = (new StockService())->show();
        $time = $timer->getCreatedAt();


        if (empty((new StockRepository())->getByName())) {
            (new StockRepository())->insert();

        }
        if (Carbon::now()->diffInMinutes($time) > 10) {
            (new StockRepository())->update();

        }
        $stock = (new StockService())->show();

        return require_once __DIR__ . '/../Views/StockView.php';
    }


}