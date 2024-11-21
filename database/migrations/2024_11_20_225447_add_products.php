<?php

use App\Models\BlsSeries;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private static $products = [
        array("title" => "Alcoholic beverages at home", "category" => "Alcohol", "index" => "cpi", "series_id" => "CUSR0000SEFW"),
        array("title" => "Apparel", "category" => "Clothing", "index" => "cpi", "series_id" => "CUSR0000SAA"),
        array("title" => "Bread", "category" => "Bread", "index" => "cpi", "series_id" => "CUSR0000SEFB01"),
        array("title" => "Canned fruits and vegetables", "category" => "Canned Goods", "index" => "cpi", "series_id" => "CUSR0000SEFM01"),
        array("title" => "Soups", "category" => "Canned Goods", "index" => "cpi", "series_id" => "CUSR0000SEFT01"),
        array("title" => "Food away from home", "category" => "Eating Out", "index" => "cpi", "series_id" => "CUSR0000SEFV"),
        array("title" => "Eggs", "category" => "Eggs", "index" => "cpi", "series_id" => "CUSR0000SEFH"),
        array("title" => "Fuel oil", "category" => "Energy", "index" => "cpi", "series_id" => "CUSR0000SEHE01"),
        array("title" => "Electricity", "category" => "Energy", "index" => "cpi", "series_id" => "CUSR0000SEHF01"),
        array("title" => "Utility (piped) gas service", "category" => "Energy", "index" => "cpi", "series_id" => "CUSR0000SEHF02"),
        array("title" => "Coal", "category" => "Energy", "index" => "ppi", "series_id" => "WPS051"),
        array("title" => "Fruits and vegetables", "category" => "Fresh Fruit And Vegetables", "index" => "cpi", "series_id" => "CUSR0000SAF113"),
        array("title" => "Fresh fruits and vegetables", "category" => "Fresh Fruit And Vegetables", "index" => "cpi", "series_id" => "CUSR0000SAF1131"),
        array("title" => "Fresh fruits", "category" => "Fresh Fruit And Vegetables", "index" => "cpi", "series_id" => "CUSR0000SEFK"),
        array("title" => "Apples", "category" => "Fresh Fruit And Vegetables", "index" => "cpi", "series_id" => "CUSR0000SEFK01"),
        array("title" => "Bananas", "category" => "Fresh Fruit And Vegetables", "index" => "cpi", "series_id" => "CUSR0000SEFK02"),
        array("title" => "Citrus fruits", "category" => "Fresh Fruit And Vegetables", "index" => "cpi", "series_id" => "CUSR0000SEFK03"),
        array("title" => "Fresh vegetables", "category" => "Fresh Fruit And Vegetables", "index" => "cpi", "series_id" => "CUSR0000SEFL"),
        array("title" => "Potatoes", "category" => "Fresh Fruit And Vegetables", "index" => "cpi", "series_id" => "CUSR0000SEFL01"),
        array("title" => "Lettuce", "category" => "Fresh Fruit And Vegetables", "index" => "cpi", "series_id" => "CUSR0000SEFL02"),
        array("title" => "Tomatoes", "category" => "Fresh Fruit And Vegetables", "index" => "cpi", "series_id" => "CUSR0000SEFL03"),
        array("title" => "Frozen and freeze dried prepared foods", "category" => "Frozen Food", "index" => "cpi", "series_id" => "CUSR0000SEFT02"),
        array("title" => "Gas", "category" => "Gas", "index" => "ppi", "series_id" => "WPS0571"),
        array("title" => "No 2 Diesel", "category" => "Gas", "index" => "ppi", "series_id" => "WPS057303"),
        array("title" => "Housing", "category" => "Housing", "index" => "cpi", "series_id" => "CUSR0000SAH"),
        array("title" => "Rent of primary residence", "category" => "Housing", "index" => "cpi", "series_id" => "CUSR0000SEHA"),
        array("title" => "Lumber", "category" => "Lumber", "index" => "ppi", "series_id" => "WPS081"),
        array("title" => "Meats, poultry, and fish", "category" => "Meat", "index" => "cpi", "series_id" => "CUSR0000SAF1121"),
        array("title" => "Beef and veal", "category" => "Meat", "index" => "cpi", "series_id" => "CUSR0000SEFC"),
        array("title" => "Pork", "category" => "Meat", "index" => "cpi", "series_id" => "CUSR0000SEFD"),
        array("title" => "Poultry", "category" => "Meat", "index" => "cpi", "series_id" => "CUSR0000SEFF"),
        array("title" => "Fish and seafood", "category" => "Meat", "index" => "cpi", "series_id" => "CUSR0000SEFG"),
        array("title" => "Medical care", "category" => "Medical Care", "index" => "cpi", "series_id" => "CUSR0000SAM"),
        array("title" => "Prescription drugs", "category" => "Medical Care", "index" => "cpi", "series_id" => "CUSR0000SEMF01"),
        array("title" => "Nonprescription drugs", "category" => "Medical Care", "index" => "cpi", "series_id" => "CUSR0000SEMF02"),
        array("title" => "Milk", "category" => "Milk", "index" => "cpi", "series_id" => "CUSR0000SEFJ01"),
        array("title" => "Frozen fruits and vegetables", "category" => "Frozen Food", "index" => "cpi", "series_id" => "CUSR0000SEFM02"),
        array("title" => "Snacks", "category" => "Snacks", "index" => "cpi", "series_id" => "CUSR0000SEFT03"),
        array("title" => "Carbonated drinks", "category" => "Soda", "index" => "cpi", "series_id" => "CUSR0000SEFN01"),
        array("title" => "New vehicles", "category" => "New And Used Vehicles", "index" => "cpi", "series_id" => "CUSR0000SETA01"),
        array("title" => "Used vehicles", "category" => "New And Used Vehicles", "index" => "cpi", "series_id" => "CUSR0000SETA02"),
    ];
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        foreach (self::$products as $row) {
            $obj = new BlsSeries($row);
            $obj->save();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
