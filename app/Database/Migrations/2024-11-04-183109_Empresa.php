<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use Config\Database;

class Empresa extends Migration
{
    public function up()
    {

        $this->forge->addField([
            'id'=>[
                'type'=>'SERIAL',
                //'constraint'=>5,
                'unsigned'=>true,
                'auto_increment'=>true
            ],
            'codigo'=>[
                'type'=>'VARCHAR',
                'constraint'=>'5',
                'null'=>false
            ],
            'nombre'=>[
                'type'=>'VARCHAR',
                'constraint'=>'50',
                'null'=>false
            ]
        ]);

        $this->forge->addKey('id',true);
        $this->forge->createTable('empresa');

        //----------------------- Insert Data --------------------------

        $db = Database::connect();
        $builder = $db->table('empresa');

        $data = [
            [
                'codigo' => '77ABT',
                'nombre'  => 'MICROSOFT'

            ],
            [
                'codigo' => '91HFG',
                'nombre'  => 'HP'

            ],
            [
                'codigo' => '771FG',
                'nombre'  => 'DELL'

            ],
            [
                'codigo' => '11UHF',
                'nombre'  => 'ASUS'

            ],
            [
                'codigo' => '651HK',
                'nombre'  => 'OPEL'

            ]
        ];

        $builder->insertBatch($data);



    }

    public function down()
    {
        $this->forge->dropTable('empresa');
    }
}
