<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "productos".
 *
 * @property int $id
 * @property string|null $nombre
 * @property int|null $unidad_medida
 * @property int|null $id_cliente
 * @property int|null $id_negocio
 * @property int|null $activo
 * @property string $fecha_alta
 * @property string $fecha_actualizacion
 *
 * @property ProductosPedidos[] $productosPedidos
 */
class Productos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'productos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['unidad_medida', 'id_cliente', 'id_negocio', 'activo'], 'integer'],
            [['fecha_alta', 'fecha_actualizacion'], 'required'],
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
            'unidad_medida' => 'Unidad Medida',
            'id_cliente' => 'Id Cliente',
            'id_negocio' => 'Id Negocio',
            'activo' => 'Activo',
            'fecha_alta' => 'Fecha Alta',
            'fecha_actualizacion' => 'Fecha Actualizacion',
        ];
    }

    /**
     * Gets query for [[ProductosPedidos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductosPedidos()
    {
        return $this->hasMany(ProductosPedidos::className(), ['id_producto' => 'id']);
    }
}
