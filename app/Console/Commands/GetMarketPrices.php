<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetMarketPrices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-market-prices {product? : Product name (default: "nothing")}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retrieves market prices from supermarkets, takes a string for a product.';

    //Clamps the final results.
    private int $responseSize = 5;

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $product = $this->argument('product') ?? 'krieltjes';
        $this->info("Fetching prices for: {$product}");
        $AHdata = $this->getAHProducts($product);

        $this->info(json_encode($AHdata));
        return 0;
    }

    private function getAHProducts(string $product): array
    {
        //AH token bits.
        $tokenResponse = Http::withHeaders([
            'User-Agent' => 'Appie/8.22.3',
            'Content-Type' => 'application/json',
        ])->post('https://api.ah.nl/mobile-auth/v1/auth/token/anonymous', [
            'clientId' => 'appie',
        ]);

        $accessToken = $tokenResponse->json('access_token');

        $this->info("Token for Albert Heijn is: {$accessToken}");

        //Retrieve data from Albert Heijn.

        $response = Http::withHeaders([
            'User-Agent' => 'Appie/8.22.3',
            'Content-Type' => 'application/json',
            'Authorization' => "Bearer {$accessToken}",
            'x-application' => 'AHBEWEBSHOP',
        ])->get('https://api.ah.nl/mobile-services/product/search/v2', [
            'query' => $product,
            'sortBy' => 'RELEVANCE',
            'application' => 'AHWEBSHOP',
            'availableOnline' => 'true',
            'bonus' => 'NONE',
            'orderable' => 'any',
            'page' => 0,
            'size' => $this->responseSize,
        ]);
        //Cut down my results into pure names, and prices. up to 5!
        $products = $response->json('products');

        $trimmedProducts = array_map(function ($product) {
            return [
                'name' => $product['title'],
                'price' => $product['price'] ?? $product['priceBeforeBonus'] ?? null,
                'unit' => $product['salesUnitSize'] ?? null,
                'available' => $product['orderAvailabilityStatus'] === 'IN_ASSORTMENT',
            ];
        }, $products);

        return $trimmedProducts;
    }
}
