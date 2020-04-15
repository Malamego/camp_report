<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints(); // For Forgen Key Checks Disable
        Schema::create('sheet2statistics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('image')->nullable();
            $table->longtext('content');              // Notes
            $table->date('datenow');                  // تاريخ الاحصائية
            $table->integer('allnet')->nullable();              // النت الجماعي
            $table->integer('course1')->nullable();             // دورة اولى
            $table->integer('course2')->nullable();                 // دورة ثانية
            $table->integer('course3')->nullable();                // دورة ثالثة
            $table->integer('course4')->nullable();               //  دورة رابعة
            $table->integer('TT')->nullable();               // TT
            $table->integer('friends')->nullable();               // عدد الاصدقاء
            $table->integer('week_id')->unsigned();
            $table->foreign('week_id')->references('id')->on('weeks')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('weeks')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints(); // For Forgen Key Checks Enable
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sheet2statistics');
    }
}
