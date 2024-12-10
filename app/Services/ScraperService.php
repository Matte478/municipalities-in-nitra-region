<?php

namespace App\Services;

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpClient\HttpClient;

class ScraperService
{
    private const DISTRICT_URL = 'https://www.e-obce.sk/kraj/NR.html';

    public function scrapeSubDistricts(): array
    {
        $html = $this->getHtmlContent(self::DISTRICT_URL);
        $crawler = new Crawler($html);

        $anchors = $crawler->filter('.telo > table td:nth-of-type(2) td:nth-of-type(3) tr:nth-of-type(3) > td > a');

        $subDistricts = [];
        $anchors->each(function (Crawler $anchor) use (&$subDistricts) {
            $subDistricts[] = [
                'name' => $anchor->text(),
                'url' => $anchor->attr('href'),
            ];
        });

        return $subDistricts;
    }

    public function scrapeCities(string $url): array
    {
        $html = $this->getHtmlContent($url);
        $crawler = new Crawler($html);

        $anchors = $crawler->filter('.telo > table td:nth-of-type(2) td:nth-of-type(3) table:nth-of-type(2) a');

        $cities = [];
        $anchors->each(function (Crawler $anchor) use (&$cities) {
            if ($anchor->attr('href') !== '#') {
                $cities[] = [
                    'name' => $anchor->text(),
                    'url' => $anchor->attr('href'),
                ];
            }
        });

        return $cities;
    }

    public function scrapeCity(string $url): array
    {
        $html = $this->getHtmlContent($url);
        $crawler = new Crawler($html);

        $infoBox = $crawler->filter('.telo > table td:nth-of-type(2) td:nth-of-type(3)');

        $name = $infoBox->filter('table:first-of-type > tr:first-of-type h1')->text();
        $name = preg_replace(['/^Obec /', '/^Mesto /'], '', $name);

        $address = $infoBox->filter('table:first-of-type tr:nth-of-type(5) td:first-of-type')->text();
        $address .= ', ' . $infoBox->filter('table:first-of-type tr:nth-of-type(6) td:first-of-type')->text();

        $emails = [];
        $infoBox->filter('table:first-of-type tr:nth-of-type(5) td:nth-of-type(3) a')->each(function (Crawler $email) use (&$emails) {
            $emails[] = $email->text();
        });

        return [
            'name' => $name,
            'mayor' => $infoBox->filter('table:nth-of-type(2) tr:nth-of-type(8) td:nth-of-type(2)')->text(),
            'address' => $address,
            'phone' => $infoBox->filter('table:first-of-type tr:nth-of-type(3) td:nth-of-type(4)')->text(),
            'fax' => $infoBox->filter('table:first-of-type tr:nth-of-type(4) td:nth-of-type(3)')->text(),
            'email' => implode(', ', $emails),
            'web' => $infoBox->filter('table:first-of-type tr:nth-of-type(6) td:nth-of-type(3)')->text(),
            'coat-of-arms' => $infoBox->filter('table:first-of-type tr:nth-of-type(3) img')->attr('src'),
        ];
    }

    private function getHtmlContent(string $url): string
    {
        $browser = new HttpBrowser(HttpClient::create());
        $browser->request('GET', $url);
        $html = $browser->getResponse()->getContent();
        $html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');

        return $html;
    }
}
