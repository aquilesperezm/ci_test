<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use Config\Database;

class Empleado extends Migration
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
            ],
            'descansa_comida'=>[
                'type'=>'BOOLEAN',
                'default'=>false
            ],
            'horas_laborables'=>[
                'type'=>'INT'
            ],
            'horario_nocturno'=>[
                'type'=>'BOOLEAN',
                'default'=>false
            ]
        ]);

        $this->forge->addKey('id',true);
        $this->forge->createTable('empleado');

        //------------------------------------ Inserting Data ---------------------------------

        $db = Database::connect();
        $builder = $db->table('empleado');

        $data = [
            [
                'codigo' => '56ABT',
                'nombre'  => 'Peter',
                'descansa_comida'  => false,
                'horas_laborables'=> 8,
                'horario_nocturno'=> false

            ],
            [
                'codigo' => '115FG',
                'nombre'  => 'Mikel',
                'descansa_comida'  => false,
                'horas_laborables'=> 8,
                'horario_nocturno'=> true

            ]
        ];

        $builder->insertBatch($data);

    }

    public function down()
    {

        $this->forge->dropTable('empleado');

    }
}
