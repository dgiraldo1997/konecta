<?php

use Carbon\Carbon;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('perfiles',function (Blueprint $table){
            $table->increments('id');
            $table->string('nombre')->unique();
            $table->timestamps();
        });

        Schema::create('menus',function (Blueprint $table){
            $table->increments('id');
            $table->string('codigo',3)->unique();
            $table->string('nombre')->unique();
            $table->string('glyph');
            $table->timestamps();
        });

        Schema::create('menus_detalle',function (Blueprint $table){
            $table->increments('id')->unsigned();
            $table->string('codigo',3)->unique();
            $table->string('nombre')->unique();
            $table->integer('menu')->unsigned();
            $table->foreign('menu')->references('id')->on('menus_detalle');
            $table->string('glyph');
            $table->boolean('acceso');
            $table->boolean('crear');
            $table->boolean('editar');
            $table->boolean('borrar');
            $table->timestamps();
        });

        Schema::create('permisos',function (Blueprint $table){
            $table->increments('id');
            $table->integer('perfil')->unsigned();
            $table->foreign('perfil')->references('id')->on('perfiles');
            $table->string('menu',3);
            $table->foreign('menu')->references('codigo')->on('menus_detalle');
            $table->boolean('acceso');
            $table->boolean('crear');
            $table->boolean('editar');
            $table->boolean('borrar');
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('documento');
            $table->string('name')->unique();
            $table->string('telefono');
            $table->string('direccion');
            $table->integer('perfil')->unsigned();
            $table->foreign('perfil')->references('id')->on('perfiles');
            $table->boolean('activo');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('documento');
            $table->string('name')->unique();
            $table->string('telefono');
            $table->string('direccion');
            $table->boolean('activo');
            $table->string('email')->unique();
            $table->timestamps();
        });

        //CREACION DE LOS MENUS...
        $menus = array(
            array('id' => 1, 'codigo' => 'ADM', 'nombre' => 'Administracion', 'glyph' => 'icon-earth', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('id' => 2, 'codigo' => 'SEG', 'nombre' => 'Seguridad', 'glyph' => 'glyphicon glyphicon-lock','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()),
            array('id' => 3, 'codigo' => 'AYU', 'nombre' => 'Ayuda', 'glyph' => 'glyphicon glyphicon-question-sign','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()),
        );

        //CREACION DE LOS MENU_ITEMS...
        $i=1;
        $items = array(
            array('id' => $i++, 'codigo' => 'ACL', 'nombre' => 'Clientes', 'menu' => 1, 'glyph' => 'glyphicon glyphicon-user-tie', 'acceso' => 1, 'crear' => 1, 'editar' => 1, 'borrar' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),

            array('id' => $i++, 'codigo' => 'PER', 'nombre' => 'Perfiles', 'menu' => 2, 'glyph' => 'glyphicon glyphicon-lock', 'acceso' => 1, 'crear' => 1, 'editar' => 1, 'borrar' => 1,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()),
            array('id' => $i++, 'codigo' => 'USU', 'nombre' => 'Usuarios', 'menu' => 2, 'glyph' => 'glyphicon glyphicon-user', 'acceso' => 1, 'crear' => 1, 'editar' => 1, 'borrar' => 1,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()),
            array('id' => $i++, 'codigo' => 'PRM', 'nombre' => 'Permisos', 'menu' => 2, 'glyph' => 'glyphicon glyphicon-wrench', 'acceso' => 1, 'crear' => 0, 'editar' => 0, 'borrar' => 0,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()),

            array('id' => $i++, 'codigo' => 'ACE', 'nombre' => 'Acerca de', 'menu' => 3, 'glyph' => 'glyphicon glyphicon-info-sign', 'acceso' => 1, 'crear' => 0, 'editar' => 0, 'borrar' => 0,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()),
            array('id' => $i++, 'codigo' => 'CMN', 'nombre' => 'Enviar Comentario', 'menu' => 3, 'glyph' => 'glyphicon glyphicon-comment', 'acceso' => 1, 'crear' => 0, 'editar' => 0, 'borrar' => 0,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()),
        );

        //FIN DE CREACION DE MENUS ITEMS...
        \DB::table('menus')->insert($menus);

        \DB::table('menus_detalle')->insert($items);

        \DB::table('perfiles')->insert(array(
            'id' => '1',
            'nombre' => 'Administrador',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ));

        \DB::table('users')->insert(array(
            'id' => '1',
            'username' => 'adminkonecta',
            'documento' => '1006106759',
            'name' => 'Konecta',
            'telefono' => 'Konecta',
            'direccion' => 'Konecta',
            'perfil' => '1',
            'activo' => 1,
            'email' => 'danielgiraldo1997@gmail.com',
            'password' => \Hash::make('Konecta2021'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ));

        foreach ($items AS $item) {
            \DB::table('permisos')->insert(array(
                'id' => $item['id'],
                'perfil' => 1,
                'menu' => $item['codigo'],
                'acceso' => 1,
                'crear' => 1,
                'editar' => 1,
                'borrar' => 1,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ));
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('clientes');
        Schema::drop('users');
        Schema::drop('permisos');
        Schema::drop('menus_detalle');
        Schema::drop('menus');
        Schema::drop('perfiles');
    }
}
