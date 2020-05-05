<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "clientes".
 *
 * @property int $id
 * @property int $id_usuario
 * @property string|null $nombre
 * @property string|null $apellidos
 * @property string|null $celular
 * @property int|null $activo
 * @property string $fecha_alta
 * @property string $fecha_actualizacion
 *
 * @property User $usuario
 * @property ClientesNegocio[] $clientesNegocios
 * @property ComentariosClientes[] $comentariosClientes
 */
class Clientes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clientes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_usuario', 'fecha_alta', 'fecha_actualizacion'], 'required'],
            [['id_usuario', 'activo'], 'integer'],
            [['fecha_alta', 'fecha_actualizacion'], 'safe'],
            [['nombre', 'apellidos', 'celular'], 'string', 'max' => 255],
            [['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_usuario' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_usuario' => 'Id Usuario',
            'nombre' => 'Nombre',
            'apellidos' => 'Apellidos',
            'celular' => 'Celular',
            'activo' => 'Activo',
            'fecha_alta' => 'Fecha Alta',
            'fecha_actualizacion' => 'Fecha Actualizacion',
        ];
    }

    /**
     * Gets query for [[Usuario]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(User::className(), ['id' => 'id_usuario']);
    }

    /**
     * Gets query for [[ClientesNegocios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClientesNegocios()
    {
        return $this->hasMany(ClientesNegocio::className(), ['id_cliente' => 'id']);
    }

    /**
     * Gets query for [[ComentariosClientes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComentariosClientes()
    {
        return $this->hasMany(ComentariosClientes::className(), ['id_cliente' => 'id']);
    }
}
