<?php

namespace backend\api\v1\resources;

use Yii;
use tecnocen\roa\controllers\Resource;
use backend\api\v1\models\LicenciaCodigos;
use backend\api\v1\models\LicenciaCodigosSearch;

class LicenciaCodigosResource extends Resource
{
    /**
     * @inheritdoc
     */
    public $modelClass = LicenciaCodigos::class;

    /**
    * @inheritdoc
    */
    public $searchClass = LicenciaCodigosSearch::class;


}
