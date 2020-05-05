<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "licencias".
 *
 * @property int $id
 * @property int|null $tipo_licencia
 * @property int|null $duracion_dias
 * @property int|null $dias_aviso_pago
 * @property float|null $precio
 * @property int|null $porcentaje_descuento
 * @property int|null $activo
 * @property string $fecha_alta
 * @property string $fecha_actualizacion
 *
 * @property LicenciaCodigos[] $licenciaCodigos
 * @property LicenciaNegocios[] $licenciaNegocios
 */
class Licencias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'licencias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo_licencia', 'duracion_dias', 'dias_aviso_pago', 'porcentaje_descuento', 'activo'], 'integer'],
            [['precio'], 'number'],
            [['fecha_alta', 'fecha_actualizacion'], 'required'],
            [['fecha_alta', 'fecha_actualizacion'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipo_licencia' => 'Tipo Licencia',
            'duracion_dias' => 'Duracion Dias',
            'dias_aviso_pago' => 'Dias Aviso Pago',
            'precio' => 'Precio',
            'porcentaje_descuento' => 'Porcentaje Descuento',
            'activo' => 'Activo',
            'fecha_alta' => 'Fecha Alta',
            'fecha_actualizacion' => 'Fecha Actualizacion',
        ];
    }

    /**
     * Gets query for [[LicenciaCodigos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLicenciaCodigos()
    {
        return $this->hasMany(LicenciaCodigos::className(), ['id_licencia' => 'id']);
    }

    /**
     * Gets query for [[LicenciaNegocios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLicenciaNegocios()
    {
        return $this->hasMany(LicenciaNegocios::className(), ['id_licencia' => 'id']);
    }
}
