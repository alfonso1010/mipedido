<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "promociones".
 *
 * @property int $id
 * @property int $id_negocio
 * @property string|null $titulo
 * @property int|null $imagen
 * @property string|null $texto_publicitario
 * @property string|null $descripcion
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property int|null $duracion_dias
 * @property int|null $activo
 * @property string $fecha_alta
 * @property string $fecha_actualizacion
 *
 * @property Negocios $negocio
 */
class Promociones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'promociones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_negocio', 'fecha_inicio', 'fecha_fin', 'fecha_alta', 'fecha_actualizacion'], 'required'],
            [['id_negocio', 'imagen', 'duracion_dias', 'activo'], 'integer'],
            [['texto_publicitario', 'descripcion'], 'string'],
            [['fecha_inicio', 'fecha_fin', 'fecha_alta', 'fecha_actualizacion'], 'safe'],
            [['titulo'], 'string', 'max' => 255],
            [['id_negocio'], 'exist', 'skipOnError' => true, 'targetClass' => Negocios::className(), 'targetAttribute' => ['id_negocio' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_negocio' => 'Id Negocio',
            'titulo' => 'Titulo',
            'imagen' => 'Imagen',
            'texto_publicitario' => 'Texto Publicitario',
            'descripcion' => 'Descripcion',
            'fecha_inicio' => 'Fecha Inicio',
            'fecha_fin' => 'Fecha Fin',
            'duracion_dias' => 'Duracion Dias',
            'activo' => 'Activo',
            'fecha_alta' => 'Fecha Alta',
            'fecha_actualizacion' => 'Fecha Actualizacion',
        ];
    }

    /**
     * Gets query for [[Negocio]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNegocio()
    {
        return $this->hasOne(Negocios::className(), ['id' => 'id_negocio']);
    }
}
