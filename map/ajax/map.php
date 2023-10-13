<?php

use Bitrix\Main\Loader;
use Licard\Map\Dto\FilterRequest;
use Licard\Map\Filter\Helper;
use Licard\Map\Loader\Map;

require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");

header('Content-Type: application/json');

$response = [
    'success' => false,
    'message' => '',
    'data' => []
];

Loader::includeModule('iblock');

try {
    $filter = Helper::createFromRequest(
        FilterRequest::createFromSuperGlobal($_REQUEST)
    );

    $shopListArr = [];
    foreach (Map::loadByConditionTree($filter) as $element) {
        if (!$element->getLat()->getValue() || !$element->getLon()->getValue()) {
            continue;
        }

        $fuel = [];

        foreach ($element->getFuel()->getAll() as $value) {
            if (!$item = $value->getItem()) {
                continue;
            }

            $fuel[] = ["name" => $item->getValue(), 'fuelId' => $item->getXmlId()];
        }

        // Сервис / TYPE
        $typeShop = null;

        foreach ($element->getType()->getAll() as $value) {
            if (!$item = $value->getItem()) {
                continue;
            }

            $typeShop[] = ["name" => $item->getValue(), 'typeId' => $item->getXmlId()];
        }

        $shop = [
            "coordinates" => [
                (float) $element->getLat()->getValue(),
                (float) $element->getLon()->getValue()
            ],
            "adr" => $element->getName(),
            "fuel" => $fuel,
            "typeShop" => $typeShop,
            // Тип ЭЗС / EZS
            "ezs" => $element->getEzs() ? $element->getEzs()->getValue() : null,
            // Тип разъема / CONNECTOR
            "connector" => $element->getConnector() ? $element->getConnector()->getValue() : null,
            // Категория (для Мультикарты Teboil) / CATEGORY_CARD
            "categoryCard" => $element->getCategoryCard() ? $element->getCategoryCard()->getValue() : null,
            // Количество рукавов / QUANTITY
            "quantity" => $element->getQuantity() ? $element->getQuantity()->getValue() : null,
            //  Торговая марка, стиль / TRADEMARK
            "trademark" => $element->getTrademark() ? $element->getTrademark()->getValue() : null,
            //  АЗС № / NUMBER_AZS
            "numberAzs" => $element->getNumberAzs() ? $element->getNumberAzs()->getValue() : null,

        ];

        $shopListArr[0][] = $shop;
    }

    foreach ($shopListArr as $city => $shopList) {
        $response['data'][] = [
            'cityName' => "",
            'shops' => $shopList
        ];
    }

    $response['success'] = true;
} catch (\LogicException $e) {
    $response['success'] = false;
    $response['message'] = $e->getMessage();
} catch (\Throwable $e) {
    // todo logs...
    $response['message'] = 'Неизвестная ошибка.' . $e->getMessage();
}

echo json_encode($response);