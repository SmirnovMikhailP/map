<?php

namespace Licard\Map\Loader;

use Bitrix\Iblock\ORM\Query;
use Bitrix\Main\ORM\Objectify\Collection;
use Bitrix\Main\ORM\Query\Filter\ConditionTree;
use Bitrix\Iblock\Elements\ElementMapTable;
use Bitrix\Main\ORM\Query\QueryHelper;
use Bitrix\Main\ORM\Query\Result;
use Bitrix\Main\UI\PageNavigation;
use FourPaws\AdoptionBundle\Entity\ORMCollection;

class Map
{
    public static function getDefaultSelect(): array
    {
        return [
            'ID',
            'NAME',
            'IBLOCK_SECTION',
            'LAT', 'LON',
            'FUEL.ITEM',
            'TYPE.ITEM',
            'EZS',
            'CONNECTOR',
            'CATEGORY_CARD',
            'NUMBER_AZS',
            'QUANTITY',
            'TRADEMARK',
        ];
    }
    
    public static function loadByConditionTree(ConditionTree $criteria = null, PageNavigation $navigation = null): Collection
    {
        try {
            $query = self::buildQuery();
            if ($criteria) {
                $query->where($criteria);
            }

            if ($navigation) {
                $query
                    ->setLimit($navigation->getPageSize())
                    ->setOffset($navigation->getOffset());
            }

            return QueryHelper::decompose($query);

        } catch (\Throwable $e) {
            // todo logs...
        }
        
        return self::emptyCollection();
    }
    
    private static function emptyCollection(): Collection
    {
        return ElementMapTable::createCollection();
    }
    
    private static function buildQuery(): Query
    {
        return ElementMapTable::query()
            ->setSelect(self::getDefaultSelect())
            ->where('ACTIVE', true);
    }
}
