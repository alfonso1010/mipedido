<?php

namespace backend\api\v1\resources;

use Yii;
use tecnocen\roa\controllers\Resource;
use backend\api\v1\models\Licencias;
use backend\api\v1\models\LicenciasSearch;

class LicenciasResource extends Resource
{
    /**
     * @inheritdoc
     */
    public $modelClass = Licencias::class;

    /**
    * @inheritdoc
    */
    public $searchClass = LicenciasSearch::class;


}
