<?php

namespace backend\api\v1\resources;

use Yii;
use tecnocen\roa\controllers\Resource;
use backend\api\v1\models\ComentariosClientes;
use backend\api\v1\models\ComentariosClientesSearch;

class ComentariosClientesResource extends Resource
{
    /**
     * @inheritdoc
     */
    public $modelClass = ComentariosClientes::class;

    /**
    * @inheritdoc
    */
    public $searchClass = ComentariosClientesSearch::class;


}
