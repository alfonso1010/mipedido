<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "productos_pedidos".
 *
 * @property int $id
 * @property int $id_producto
 * @property int $id_pedido
 * @property int|null $cantidad
 * @property string|null $comentarios
 * @property int|null $activo
 * @property string $fecha_alta
 * @property string $fecha_actualizacion
 *
 * @property Pedidos $pedido
 * @property Productos $producto
 */
class ProductosPedidos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'productos_pedidos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_producto', 'id_pedido', 'fecha_alta', 'fecha_actualizacion'], 'required'],
            [['id_producto', 'id_pedido', 'cantidad', 'activo'], 'integer'],
            [['comentarios'], 'string'],
            [['fecha_alta', 'fecha_actualizacion'], 'safe'],
            [['id_pedido'], 'exist', 'skipOnError' => true, 'targetClass' => Pedidos::className(), 'targetAttribute' => ['id_pedido' => 'id']],
            [['id_producto'], 'exist', 'skipOnError' => true, 'targetClass' => Productos::className(), 'targetAttribute' => ['id_producto' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_producto' => 'Id Producto',
            'id_pedido' => 'Id Pedido',
            'cantidad' => 'Cantidad',
            'comentarios' => 'Comentarios',
            'activo' => 'Activo',
            'fecha_alta' => 'Fecha Alta',
            'fecha_actualizacion' => 'Fecha Actualizacion',
        ];
    }

    /**
     * Gets query for [[Pedido]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPedido()
    {
        return $this->hasOne(Pedidos::className(), ['id' => 'id_pedido']);
    }

    /**
     * Gets query for [[Producto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducto()
    {
        return $this->hasOne(Productos::className(), ['id' => 'id_producto']);
    }
}
