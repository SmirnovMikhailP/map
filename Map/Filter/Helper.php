<?php

namespace Licard\Map\Filter;

use Bitrix\Main\ORM\Query\Filter\ConditionTree;
use Licard\Map\Dto\FilterRequest;

class Helper
{
    public static function createFromRequest(FilterRequest $request): ConditionTree
    {
        $filter = new ConditionTree();

        if (!empty($request->getFuel())) {
            $filter->whereIn('FUEL.ITEM.XML_ID', $request->getFuel());
        }
        if (!empty($request->getTypeShop())) {
            $filter->whereIn('TYPE.ITEM.XML_ID', $request->getTypeShop());
        }
        if (!empty($request->getEzs())) {
            $filter->whereIn('EZS.ITEM.XML_ID', $request->getEzs());
        }
        if (!empty($request->getEzs())) {
            $filter->whereIn('CONNECTOR.ITEM.XML_ID', $request->getConnector());
        }
        if (!empty($request->getCity())) {
            if ($request->getCity()[0]) {
                $filter->whereIn('IBLOCK_SECTION_ID', $request->getCity());
            }
        }
        
        return $filter;
    }
}
