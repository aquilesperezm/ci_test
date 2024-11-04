<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use Config\Database;

class Tarjeta extends Migration
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
            'empresa_id'=>[
                'type'=>'INTEGER',
                'null'=>false
            ],
            'empleado_id'=>[
                'type'=>'INTEGER',
                'null'=>false
            ],
            'noticket'=>[
                'type'=>'INTEGER',
                'null'=>false
            ],
            'creado'=>[
                'type'=>'TIMESTAMP'
            ],
            'fecha'=>[
                'type'=>'DATE'
            ],
            'hora'=>[
                'type'=>'TIME'
            ]
        ]);

        $this->forge->addKey('id',true);

        //$this->forge->addUniqueKey(['empleado_id','noticket','fecha']);
        $this->forge->addForeignKey('empleado_id','empleado','id','NO ACTION','NO ACTION','fk_empleado_id');
        $this->forge->addForeignKey('empresa_id','empresa','id','NO ACTION','NO ACTION','fk_empresa_id');

        $this->forge->createTable('tarjeta');

        //------------------------------- Inserting Data -------------------------------

        $db = Database::connect();
        $builder = $db->table('tarjeta');

        $data = [
            //------------------ 1 Fila -----------------------------------------
            [
                'empresa_id'=>1,
                'empleado_id'=>2,
                'noticket'=>0,                 //-- valores 0 - entrada,   1 - salida
                'creado'=>date('Y-m-d H:i:s'),
                'fecha'=>date_format(date_create('2024-10-01'),'Y-m-d'),
                'hora'=>date_format(date_create('22:09:00'),'H:i:s')
            ],
            [
                'empresa_id'=>1,
                'empleado_id'=>2,
                'noticket'=>1,                 //-- valores 0 - entrada,   1 - salida
                'creado'=>date('Y-m-d H:i:s'),
                'fecha'=>date_format(date_create('2024-10-01'),'Y-m-d'),
                'hora'=>date_format(date_create('06:43:03'),'H:i:s')
            ],
           //--------------------- 2 Fila ------------------------------------------
            [
                'empresa_id'=>1,
                'empleado_id'=>2,
                'noticket'=>0,                 //-- valores 0 - entrada,   1 - salida
                'creado'=>date('Y-m-d H:i:s'),
                'fecha'=>date_format(date_create('2024-10-02'),'Y-m-d'),
                'hora'=>date_format(date_create('21:55:25'),'H:i:s')
            ],
            [
                'empresa_id'=>1,
                'empleado_id'=>2,
                'noticket'=>1,                 //-- valores 0 - entrada,   1 - salida
                'creado'=>date('Y-m-d H:i:s'),
                'fecha'=>date_format(date_create('2024-10-02'),'Y-m-d'),
                'hora'=>date_format(date_create('06:32:03'),'H:i:s')
            ],
            //--------------------- 3 Fila ------------------------------------------
            [
                'empresa_id'=>1,
                'empleado_id'=>2,
                'noticket'=>0,                 //-- valores 0 - entrada,   1 - salida
                'creado'=>date('Y-m-d H:i:s'),
                'fecha'=>date_format(date_create('2024-10-03'),'Y-m-d'),
                'hora'=>date_format(date_create('21:55:20'),'H:i:s')
            ],
            [
                'empresa_id'=>1,
                'empleado_id'=>2,
                'noticket'=>1,                 //-- valores 0 - entrada,   1 - salida
                'creado'=>date('Y-m-d H:i:s'),
                'fecha'=>date_format(date_create('2024-10-03'),'Y-m-d'),
                'hora'=>date_format(date_create('07:32:35'),'H:i:s')
            ],
            //--------------------- 4 Fila ------------------------------------------
            [
                'empresa_id'=>5,
                'empleado_id'=>1,
                'noticket'=>0,                 //-- valores 0 - entrada,   1 - salida
                'creado'=>date('Y-m-d H:i:s'),
                'fecha'=>date_format(date_create('2024-10-01'),'Y-m-d'),
                'hora'=>date_format(date_create('06:44:44'),'H:i:s')
            ],
            [
                'empresa_id'=>5,
                'empleado_id'=>1,
                'noticket'=>1,                 //-- valores 0 - entrada,   1 - salida
                'creado'=>date('Y-m-d H:i:s'),
                'fecha'=>date_format(date_create('2024-10-01'),'Y-m-d'),
                'hora'=>date_format(date_create('12:30:05'),'H:i:s')
            ],[
                'empresa_id'=>5,
                'empleado_id'=>1,
                'noticket'=>0,                 //-- valores 0 - entrada,   1 - salida
                'creado'=>date('Y-m-d H:i:s'),
                'fecha'=>date_format(date_create('2024-10-01'),'Y-m-d'),
                'hora'=>date_format(date_create('12:58:31'),'H:i:s')
            ],
            [
                'empresa_id'=>5,
                'empleado_id'=>1,
                'noticket'=>1,                 //-- valores 0 - entrada,   1 - salida
                'creado'=>date('Y-m-d H:i:s'),
                'fecha'=>date_format(date_create('2024-10-01'),'Y-m-d'),
                'hora'=>date_format(date_create('16:11:13'),'H:i:s')
            ],
        ];

        $builder->insertBatch($data);


    }

    public function down()
    {
       $this->forge->dropTable('tarjeta');
    }
}
