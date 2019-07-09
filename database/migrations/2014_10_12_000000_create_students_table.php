<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('students')->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('phone'); // For mobile Phone
            $table->integer('class_id')->nullable(); // To know class name
            $table->string('imei')->nullable(); // To know the Machine (tablet) Number
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('identity')->nullable(); // To know the ٍStudent (ID) Number
            // $table->enum('type', ['user', 'admin'])->default('user');
            $table->integer('score')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
