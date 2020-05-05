<?php

use yii\db\Migration;

/**
 * Class m200503_034023_create_table_promociones
 */
class m200503_034023_create_table_promociones extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
         $this->createTable('promociones', [
            'id' => $this->integer(11)->unsigned()->notNull()->append('AUTO_INCREMENT PRIMARY KEY'),
            'id_negocio' => $this->integer(11)->unsigned()->notNull(),
            'titulo' => $this->string(),
            'imagen' => $this->integer(),
            'texto_publicitario' => $this->text(),
            'descripcion' => $this->text(),
            'fecha_inicio' => $this->dateTime()->notNull(),
            'fecha_fin' => $this->dateTime()->notNull(),
            'duracion_dias' => $this->integer(),
            'activo' => $this->tinyInteger(1)->defaultValue(0),
            'fecha_alta' => $this->dateTime()->notNull(),
            'fecha_actualizacion' => $this->dateTime()->notNull()
        ]);

        $this->createIndex(
            'idx-promociones_negocios',
            'promociones',
            'id_negocio'
        );

        $this->addForeignKey(
            'fk-promociones-id_negocio',
            'promociones',
            'id_negocio',
            'negocios', //tbl_foranea
            'id', // pk tbl_foranea
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200503_034023_create_table_promociones cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200503_034023_create_table_promociones cannot be reverted.\n";

        return false;
    }
    */
}
