<?php

namespace backend\api\v1\resources;

use Yii;
use tecnocen\roa\controllers\Resource;
use backend\api\v1\models\Pedidos;
use backend\api\v1\models\PedidosSearch;

class PedidosResource extends Resource
{
    /**
     * @inheritdoc
     */
    public $modelClass = Pedidos::class;

    /**
    * @inheritdoc
    */
    public $searchClass = PedidosSearch::class;


}
