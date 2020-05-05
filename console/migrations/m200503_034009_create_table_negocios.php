<?php

use yii\db\Migration;

/**
 * Class m200503_034009_create_table_negocios
 */
class m200503_034009_create_table_negocios extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {   

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'COLLATE latin1_swedish_ci ENGINE=InnoDB';
        }

         $this->createTable('negocios', [
            'id' => $this->integer(11)->unsigned()->notNull()->append('AUTO_INCREMENT PRIMARY KEY'),
            'id_usuario' => $this->integer(11)->unsigned()->notNull(),
            'id_tipo_negocio' => $this->integer(11)->unsigned()->notNull(),
            'codigo' => $this->string(),
            'nombre' => $this->string(),
            'slogan' => $this->string(),
            'telefono' => $this->string(),
            'hora_apertura' => $this->string(20),
            'hora_cierre' => $this->string(20),
            'dias_apertura' => $this->string(20),
            'logo' => $this->integer(),
            'activo' => $this->tinyInteger(1)->defaultValue(0),
            'fecha_alta' => $this->dateTime()->notNull(),
            'fecha_actualizacion' => $this->dateTime()->notNull()
        ],$tableOptions);

        $this->createIndex(
            'idx_negocios_usuario',
            'negocios',
            'id_usuario'
        );

        $this->createIndex(
            'idx_negocios_tipo_negocio',
            'negocios',
            'id_tipo_negocio'
        );

       
        $this->addForeignKey(
            'fk_negocios_tipo_negocio',
            'negocios',
            'id_tipo_negocio',
            'tipo_negocio', //tbl_foranea
            'id', // pk tbl_foranea
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_negocios_id_usuario',
            'negocios',
            'id_usuario',
            'user', //tbl_foranea
            'id', // pk tbl_foranea
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200503_034009_create_table_negocios cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200503_034009_create_table_negocios cannot be reverted.\n";

        return false;
    }
    */
}
