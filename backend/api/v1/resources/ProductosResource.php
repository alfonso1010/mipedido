<?php

namespace backend\api\v1\resources;

use Yii;
use tecnocen\roa\controllers\Resource;
use backend\api\v1\models\Productos;
use backend\api\v1\models\ProductosSearch;

class ProductosResource extends Resource
{
    /**
     * @inheritdoc
     */
    public $modelClass = Productos::class;

    /**
    * @inheritdoc
    */
    public $searchClass = ProductosSearch::class;


}
