<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->rememberToken();
            $table->timestamps();
        });

        
        DB::table('users')->insert(
            array(
                'name' => 'Clarice Lispector',
            )
        );
        
        DB::table('users')->insert(
            array(
                'name' => 'George Orwell',
            )
        );

        DB::table('users')->insert(
            array(
                'name' => 'William Shakespeare',
            )
        );

        DB::table('users')->insert(
            array(
                'name' => 'Edgar Allan Poe',
            )
        );

        DB::table('users')->insert(
            array(
                'name' => 'Mary Shelley',
            ),
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
