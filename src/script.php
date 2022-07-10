<?php 

require 'vendor/autoload.php';

use Symfony\Component\DomCrawler\Crawler;

$url= "https://www.magpiehq.com/developer-challenge/smartphones";
$html= file_get_contents($url);

$crawler = new Crawler($html);
$products =[];
$crawler->filter('#products .product')->each(function(Crawler $li,$index) use (&$products){
$product = [
    'title'=>$li->filter('span.product-name')->text(''),
    'price'=>$li->filter('div.my-8.block.text-center.text-lg')->text(''),
    'imageUrl'=>$li->filter('img')->text(''),
    'capacityMB'=>$li->filter('span.product-capacity')->text(''),
    'colour'=>$li->filter('span.product-name')->text(''),
    'availabilityText'=>$li->filter('div.my-4.text-sm.block.text-center')->text(''),
    'isAvailable'=>$li->filter('span.product-name')->text(''),
    'shippingText'=>$li->filter('span.product-name')->text(''),
    'shippingDate'=>$li->filter('span.product-capacity')->text(''),
];

$products[] =$product;
});

print_r($products);

//print_r(json_encode($products));

   // var_dump($crawler->filter('h1')->count());
