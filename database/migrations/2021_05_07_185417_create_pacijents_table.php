<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacijentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacijents', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name_and_surname');
            $table->string('description');
            $table->integer('user_id')->unsigned()->index();
    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacijents');
    }
}
