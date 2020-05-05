<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "negocios".
 *
 * @property int $id
 * @property int $id_usuario
 * @property int $id_tipo_negocio
 * @property string|null $codigo
 * @property string|null $nombre
 * @property string|null $slogan
 * @property string|null $telefono
 * @property string|null $hora_apertura
 * @property string|null $hora_cierre
 * @property string|null $dias_apertura
 * @property int|null $logo
 * @property int|null $activo
 * @property string $fecha_alta
 * @property string $fecha_actualizacion
 *
 * @property ClientesNegocio[] $clientesNegocios
 * @property ComentariosClientes[] $comentariosClientes
 * @property LicenciaNegocios[] $licenciaNegocios
 * @property User $usuario
 * @property TipoNegocio $tipoNegocio
 * @property Promociones[] $promociones
 */
class Negocios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'negocios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_usuario', 'id_tipo_negocio','codigo','nombre','hora_apertura','hora_cierre','dias_apertura'], 'required'],
            [['id_usuario', 'id_tipo_negocio', 'logo', 'activo'], 'integer'],
            [['fecha_alta', 'fecha_actualizacion'], 'safe'],
            [['codigo', 'nombre', 'slogan', 'telefono'], 'string', 'max' => 255],
            [['hora_apertura', 'hora_cierre', 'dias_apertura'], 'string', 'max' => 20],
            [['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_usuario' => 'id']],
            [['id_tipo_negocio'], 'exist', 'skipOnError' => true, 'targetClass' => TipoNegocio::className(), 'targetAttribute' => ['id_tipo_negocio' => 'id']],
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
            'id_tipo_negocio' => 'Id Tipo Negocio',
            'codigo' => 'Codigo',
            'nombre' => 'Nombre',
            'slogan' => 'Slogan',
            'telefono' => 'Telefono',
            'hora_apertura' => 'Hora Apertura',
            'hora_cierre' => 'Hora Cierre',
            'dias_apertura' => 'Dias Apertura',
            'logo' => 'Logo',
            'activo' => 'Activo',
            'fecha_alta' => 'Fecha Alta',
            'fecha_actualizacion' => 'Fecha Actualizacion',
        ];
    }

    /**
     * Gets query for [[ClientesNegocios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClientesNegocios()
    {
        return $this->hasMany(ClientesNegocio::className(), ['id_negocio' => 'id']);
    }

    /**
     * Gets query for [[ComentariosClientes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComentariosClientes()
    {
        return $this->hasMany(ComentariosClientes::className(), ['id_negocio' => 'id']);
    }

    /**
     * Gets query for [[LicenciaNegocios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLicenciaNegocios()
    {
        return $this->hasMany(LicenciaNegocios::className(), ['id_negocio' => 'id']);
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
     * Gets query for [[TipoNegocio]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTipoNegocio()
    {
        return $this->hasOne(TipoNegocio::className(), ['id' => 'id_tipo_negocio']);
    }

    /**
     * Gets query for [[Promociones]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPromociones()
    {
        return $this->hasMany(Promociones::className(), ['id_negocio' => 'id']);
    }
}
