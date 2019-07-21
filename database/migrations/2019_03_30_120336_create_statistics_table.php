<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSheet2statisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints(); // For Forgen Key Checks Disable
        Schema::create('statistics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('image');
            $table->longtext('content');              // Notes
            $table->date('datenow');                  // تاريخ الاحصائية
            $table->integer('mission')->nullable();              // عدد كرازة
            $table->integer('decision')->nullable();             // عدد الناس اللي اخدت قرار
            $table->integer('ob1')->nullable();                 // عدد الناس اللي اتعمل معاهم متابعة اولى
            $table->integer('ob2')->nullable();                // عدد الناس اللي اتعمل معاهم متابعة ثانية
            $table->integer('ob3')->nullable();               //   عدد الناس الي اتعمل معاهم متابعة ثالثة
            $table->integer('ob4')->nullable();               // عدد الناس اللي اتعمل معاهم متابعة رابعة
            $table->integer('ob5')->nullable();               // عدد الناس اللي اتعمل معاهم متابعة خامسة
            $table->integer('ob6')->nullable();              // عدد الناس اللي اتعمل معاهم متابعة سادسة
            $table->integer('papers')->nullable();             // التوزيع
            $table->integer('holy_spirit')->nullable();        // الروح القدس
            $table->integer('mission_no_student')->nullable();  // كرازة لغير الطلبة
            $table->integer('mission_all')->nullable();          // كرازة جماعية
            $table->integer('week_id')->unsigned();
            $table->foreign('week_id')->references('id')->on('weeks')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('weeks')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('status', ['active', 'inactive'])->default('inactive');
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
        Schema::dropIfExists('statistics');
    }
}
