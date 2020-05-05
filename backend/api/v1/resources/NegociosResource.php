<?php

namespace backend\api\v1\resources;

use Yii;
use tecnocen\roa\controllers\Resource;
use backend\api\v1\models\Negocios;
use backend\api\v1\models\NegociosSearch;

class NegociosResource extends Resource
{
    /**
     * @inheritdoc
     */
    public $modelClass = Negocios::class;

    /**
    * @inheritdoc
    */
    public $searchClass = NegociosSearch::class;


}
