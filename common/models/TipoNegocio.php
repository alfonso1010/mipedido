<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tipo_negocio".
 *
 * @property int $id
 * @property string|null $nombre
 * @property string|null $descripcion
 * @property int|null $activo
 * @property string $fecha_alta
 * @property string $fecha_actualizacion
 *
 * @property Negocios[] $negocios
 */
class TipoNegocio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipo_negocio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion'], 'string'],
            [['nombre'], 'required'],
            [['activo'], 'integer'],
            [['fecha_alta', 'fecha_actualizacion'], 'safe'],
            [['nombre'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
            'activo' => 'Activo',
            'fecha_alta' => 'Fecha Alta',
            'fecha_actualizacion' => 'Fecha Actualizacion',
        ];
    }

    /**
     * Gets query for [[Negocios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNegocios()
    {
        return $this->hasMany(Negocios::className(), ['id_tipo_negocio' => 'id']);
    }
}
