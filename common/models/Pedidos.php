<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pedidos".
 *
 * @property int $id
 * @property int $id_cliente_negocio
 * @property int|null $no_pedido
 * @property string|null $fecha_retiro
 * @property string|null $hora_retiro
 * @property int|null $estatus
 * @property int|null $activo
 * @property string $fecha_alta
 * @property string $fecha_actualizacion
 *
 * @property ClientesNegocio $clienteNegocio
 * @property ProductosPedidos[] $productosPedidos
 */
class Pedidos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pedidos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_cliente_negocio', 'fecha_alta', 'fecha_actualizacion'], 'required'],
            [['id_cliente_negocio', 'no_pedido', 'estatus', 'activo'], 'integer'],
            [['fecha_retiro', 'hora_retiro', 'fecha_alta', 'fecha_actualizacion'], 'safe'],
            [['id_cliente_negocio'], 'exist', 'skipOnError' => true, 'targetClass' => ClientesNegocio::className(), 'targetAttribute' => ['id_cliente_negocio' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_cliente_negocio' => 'Id Cliente Negocio',
            'no_pedido' => 'No Pedido',
            'fecha_retiro' => 'Fecha Retiro',
            'hora_retiro' => 'Hora Retiro',
            'estatus' => 'Estatus',
            'activo' => 'Activo',
            'fecha_alta' => 'Fecha Alta',
            'fecha_actualizacion' => 'Fecha Actualizacion',
        ];
    }

    /**
     * Gets query for [[ClienteNegocio]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClienteNegocio()
    {
        return $this->hasOne(ClientesNegocio::className(), ['id' => 'id_cliente_negocio']);
    }

    /**
     * Gets query for [[ProductosPedidos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductosPedidos()
    {
        return $this->hasMany(ProductosPedidos::className(), ['id_pedido' => 'id']);
    }
}
