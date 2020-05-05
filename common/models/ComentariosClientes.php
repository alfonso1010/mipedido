<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "comentarios_clientes".
 *
 * @property int $id
 * @property int $id_cliente
 * @property int $id_negocio
 * @property int|null $tipo_comentario
 * @property string|null $comentario
 * @property int|null $activo
 * @property string $fecha_alta
 * @property string $fecha_actualizacion
 *
 * @property Clientes $cliente
 * @property Negocios $negocio
 */
class ComentariosClientes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comentarios_clientes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_cliente', 'id_negocio', 'fecha_alta', 'fecha_actualizacion'], 'required'],
            [['id_cliente', 'id_negocio', 'tipo_comentario', 'activo'], 'integer'],
            [['comentario'], 'string'],
            [['fecha_alta', 'fecha_actualizacion'], 'safe'],
            [['id_cliente'], 'exist', 'skipOnError' => true, 'targetClass' => Clientes::className(), 'targetAttribute' => ['id_cliente' => 'id']],
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
            'id_cliente' => 'Id Cliente',
            'id_negocio' => 'Id Negocio',
            'tipo_comentario' => 'Tipo Comentario',
            'comentario' => 'Comentario',
            'activo' => 'Activo',
            'fecha_alta' => 'Fecha Alta',
            'fecha_actualizacion' => 'Fecha Actualizacion',
        ];
    }

    /**
     * Gets query for [[Cliente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Clientes::className(), ['id' => 'id_cliente']);
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
