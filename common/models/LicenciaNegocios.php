<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "licencia_negocios".
 *
 * @property int $id
 * @property int $id_licencia
 * @property int $id_negocio
 * @property string $fecha_inicio_licencia
 * @property string $fecha_fin_licencia
 * @property int|null $vencida
 * @property int|null $activo
 * @property string $fecha_alta
 * @property string $fecha_actualizacion
 *
 * @property Licencias $licencia
 * @property Negocios $negocio
 */
class LicenciaNegocios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'licencia_negocios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_licencia', 'id_negocio', 'fecha_inicio_licencia', 'fecha_fin_licencia', 'fecha_alta', 'fecha_actualizacion'], 'required'],
            [['id_licencia', 'id_negocio', 'vencida', 'activo'], 'integer'],
            [['fecha_inicio_licencia', 'fecha_fin_licencia', 'fecha_alta', 'fecha_actualizacion'], 'safe'],
            [['id_licencia'], 'exist', 'skipOnError' => true, 'targetClass' => Licencias::className(), 'targetAttribute' => ['id_licencia' => 'id']],
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
            'id_licencia' => 'Id Licencia',
            'id_negocio' => 'Id Negocio',
            'fecha_inicio_licencia' => 'Fecha Inicio Licencia',
            'fecha_fin_licencia' => 'Fecha Fin Licencia',
            'vencida' => 'Vencida',
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
