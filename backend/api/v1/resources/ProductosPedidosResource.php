<?php

namespace backend\api\v1\resources;

use Yii;
use tecnocen\roa\controllers\Resource;
use backend\api\v1\models\ProductosPedidos;
use backend\api\v1\models\ProductosPedidosSearch;

class ProductosPedidosResource extends Resource
{
    /**
     * @inheritdoc
     */
    public $modelClass = ProductosPedidos::class;

    /**
    * @inheritdoc
    */
    public $searchClass = ProductosPedidosSearch::class;


}
