<?php

namespace backend\api\v1\resources;

use Yii;
use tecnocen\roa\controllers\Resource;
use backend\api\v1\models\LicenciaNegocios;
use backend\api\v1\models\LicenciaNegociosSearch;

class LicenciaNegociosResource extends Resource
{
    /**
     * @inheritdoc
     */
    public $modelClass = LicenciaNegocios::class;

    /**
    * @inheritdoc
    */
    public $searchClass = LicenciaNegociosSearch::class;


}
