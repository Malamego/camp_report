<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddScoreToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('score')->default(0);
            $table->integer('last_lesson')->nullable();
            $table->string('identity')->nullable(); // To know the ٍStudent (ID) Number
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('score');
            $table->dropColumn('last_lesson');
            $table->dropColumn('identity');
        });
    }
}
