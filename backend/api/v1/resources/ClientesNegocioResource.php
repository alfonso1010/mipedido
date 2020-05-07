<?php

namespace backend\api\v1\resources;

use Yii;
use tecnocen\roa\controllers\Resource;
use backend\api\v1\models\ClientesNegocio;
use backend\api\v1\models\ClientesNegocioSearch;

class ClientesNegocioResource extends Resource
{
    /**
     * @inheritdoc
     */
    public $modelClass = ClientesNegocio::class;

    /**
    * @inheritdoc
    */
    public $searchClass = ClientesNegocioSearch::class;


}
