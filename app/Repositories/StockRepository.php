<?php

namespace App\Repositories;

use App\Models\Stock;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Scheb\YahooFinanceApi\ApiClientFactory;


class StockRepository
{

    public function getByName()
    {
        return query()
            ->select('*')
            ->from('yahoo')
            ->where('name = :name')
            ->setParameter('name', $_GET['name'])
            ->orderBy('id', 'asc')
            ->execute()
            ->fetchAllAssociative();

    }

    public function update()
    {
        $client = ApiClientFactory::createApiClient();
        $guzzleClient = new Client();
        $client = ApiClientFactory::createApiClient($guzzleClient);
        //TODO pulksteni
        $quote = $client->getQuote($_GET['name']);
        query()
            ->update('yahoo')
            ->set('name', ':name')
            ->set('close', ':close')
            ->set('open', ':open')
            ->set('bid', ':bid')
            ->set('bid_size', ':bid_size')
            ->set('ask', ':ask')
            ->set('ask_size', ':ask_size')
            ->set('day_low', ':day_low')
            ->set('day_high', ':day_high')
            ->set('year_low', ':year_low')
            ->set('year_high', ':year_high')
            ->set('volume', ':volume')
            ->set('avg_volume', ':avg_volume')
            ->set('createdAt', ':createdAt')
            ->setParameter('name', $quote->getSymbol())
            ->setParameter('close', $quote->getRegularMarketPreviousClose())
            ->setParameter('open', $quote->getRegularMarketOpen())
            ->setParameter('bid', $quote->getBid())
            ->setParameter('bid_size', $quote->getBidSize())
            ->setParameter('ask', $quote->getAsk())
            ->setParameter('ask_size', $quote->getAskSize())
            ->setParameter('day_low', $quote->getRegularMarketDayLow())
            ->setParameter('day_high', $quote->getRegularMarketDayHigh())
            ->setParameter('year_low', $quote->getFiftyTwoWeekLow())
            ->setParameter('year_high', $quote->getFiftyTwoWeekHigh())
            ->setParameter('volume', $quote->getRegularMarketVolume())
            ->setParameter('avg_volume', $quote->getAverageDailyVolume10Day())
            ->setParameter('createdAt', Carbon::now()->format('Y-m-d H:i:s'))
            ->where('name = :name')
            ->execute();
    }

    public function insert()
    {
        $client = ApiClientFactory::createApiClient();
        $guzzleClient = new Client();
        $client = ApiClientFactory::createApiClient($guzzleClient);
        //TODO pulksteni
        $quote = $client->getQuote($_GET['name']);
        query()
            ->insert('yahoo')
            ->values([
                'name' => ':name',
                'close' => ':close',
                'open' => ':open',
                'bid' => ':bid',
                'bid_size' => ':bid_size',
                'ask' => ':ask',
                'ask_size' => ':ask_size',
                'day_low' => ':day_low',
                'day_high' => ':day_high',
                'year_low' => ':year_low',
                'year_high' => ':year_high',
                'volume' => ':volume',
                'avg_volume' => ':avg_volume',
                'createdAt' => ':createdAt'
            ])
            ->setParameter('name', $quote->getSymbol())
            ->setParameter('close', $quote->getRegularMarketPreviousClose())
            ->setParameter('open', $quote->getRegularMarketOpen())
            ->setParameter('bid', $quote->getBid())
            ->setParameter('bid_size', $quote->getBidSize())
            ->setParameter('ask', $quote->getAsk())
            ->setParameter('ask_size', $quote->getAskSize())
            ->setParameter('day_low', $quote->getRegularMarketDayLow())
            ->setParameter('day_high', $quote->getRegularMarketDayHigh())
            ->setParameter('year_low', $quote->getFiftyTwoWeekLow())
            ->setParameter('year_high', $quote->getFiftyTwoWeekHigh())
            ->setParameter('volume', $quote->getRegularMarketVolume())
            ->setParameter('avg_volume', $quote->getAverageDailyVolume10Day())
            ->setParameter('createdAt', Carbon::now()->format('Y-m-d H:i:s'))
            ->execute();
    }

    public function getStock()
    {
        $value = query()
            ->select('*')
            ->from('yahoo')
            ->where('name = :name')
            ->setParameter('name', $_GET['name'])
            ->orderBy('id', 'asc')
            ->execute()
            ->fetchAssociative();


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
            $value['createdAt']
        );
    }


}