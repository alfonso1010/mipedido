<?php

namespace backend\api\v1\resources;

use Yii;
use tecnocen\roa\controllers\Resource;
use backend\api\v1\models\Promociones;
use backend\api\v1\models\PromocionesSearch;

class PromocionesResource extends Resource
{
    /**
     * @inheritdoc
     */
    public $modelClass = Promociones::class;

    /**
    * @inheritdoc
    */
    public $searchClass = PromocionesSearch::class;


}
