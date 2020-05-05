<?php

namespace backend\api\v1;

use tecnocen\roa\controllers\ProfileResource;
use tecnocen\roa\urlRules\SingleRecord as SingleRecordUrlRule;

class Version extends \tecnocen\roa\modules\ApiVersion {
	/**
	 * @inheritdoc
	 */
	public $resources = [
		'perfil'   => [
			'class'   => ProfileResource::class ,
			'urlRule' => ['class' => SingleRecordUrlRule::class ]
		],
		'tipo-negocio',
		'negocios',
		'promociones',
		'clientes',
	];

	/**
	 * @inheritdoc
	 */
	public $controllerNamespace = 'backend\\api\\v1\\resources';
}