<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "licencia_codigos".
 *
 * @property int $id
 * @property int $id_licencia
 * @property string|null $codigo
 * @property int|null $descuento_aplicar
 * @property string $vigencia
 * @property int|null $activo
 * @property string $fecha_alta
 * @property string $fecha_actualizacion
 *
 * @property Licencias $licencia
 */
class LicenciaCodigos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'licencia_codigos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_licencia', 'vigencia', 'fecha_alta', 'fecha_actualizacion'], 'required'],
            [['id_licencia', 'descuento_aplicar', 'activo'], 'integer'],
            [['vigencia', 'fecha_alta', 'fecha_actualizacion'], 'safe'],
            [['codigo'], 'string', 'max' => 25],
            [['id_licencia'], 'exist', 'skipOnError' => true, 'targetClass' => Licencias::className(), 'targetAttribute' => ['id_licencia' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_licencia' => 'Id Licencia',
            'codigo' => 'Codigo',
            'descuento_aplicar' => 'Descuento Aplicar',
            'vigencia' => 'Vigencia',
            'activo' => 'Activo',
            'fecha_alta' => 'Fecha Alta',
            'fecha_actualizacion' => 'Fecha Actualizacion',
        ];
    }

    /**
     * Gets query for [[Licencia]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLicencia()
    {
        return $this->hasOne(Licencias::className(), ['id' => 'id_licencia']);
    }
}
