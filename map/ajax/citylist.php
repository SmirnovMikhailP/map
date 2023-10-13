<?php

use Bitrix\Main\Loader;
use Licard\BitrixHelper\Iblock as IblockHelper;

require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");

header('Content-Type: application/json');

$response = [
    'success' => false,
    'message' => '',
    'data' => []
];

$mapIblockId = IblockHelper::getIblockId('map');

Loader::includeModule('iblock');

try {
    $rsSection = \Bitrix\Iblock\SectionTable::getList(array(
        'filter' => array(
            'GLOBAL_ACTIVE' => 'Y',
            'IBLOCK_ID' => $mapIblockId,
        ),
    ));
    while($arSection=$rsSection->Fetch())
    {
        $response['data'][] = [
            'cityName' => $arSection['NAME'],
            'cityId' => $arSection['ID']
        ];

    }

    $response['success'] = true;
} catch (\LogicException $e) {
    $response['success'] = false;
    $response['message'] = $e->getMessage();
} catch (\Throwable $e) {
    // todo logs...
    $response['message'] = 'Неизвестная ошибка.'. $e->getMessage();
}

echo json_encode($response);
