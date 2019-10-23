<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Createstatistic4dsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints(); // For Forgen Key Checks Disable
        Schema::create('statistic4ds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('image');
            $table->longtext('content');              // Notes
            $table->date('datenow');                  // تاريخ الاحصائية
            $table->integer('interact')->nullable();              // عدد التواصل
            $table->integer('mission')->nullable();              // عدد كرازة
            $table->integer('decision')->nullable();             // عدد الناس اللي اخدت قرار
            $table->integer('ob1')->nullable();                 // عدد الناس اللي اتعمل معاهم متابعة اولى
            $table->integer('ob2')->nullable();                // عدد الناس اللي اتعمل معاهم متابعة ثانية
            $table->integer('ob3')->nullable();               //   عدد الناس الي اتعمل معاهم متابعة ثالثة
            $table->integer('ob4')->nullable();               // عدد الناس اللي اتعمل معاهم متابعة رابعة
            $table->integer('ob5')->nullable();               // عدد الناس اللي اتعمل معاهم متابعة خامسة
            $table->integer('ob6')->nullable();                   // عدد الناس اللي اتعمل معاهم متابعة سادسة
            $table->integer('level1')->nullable();               // التوزيع
            $table->integer('level2')->nullable();              // الروح القدس
            $table->integer('level3')->nullable();             // كرازة لغير الطلبة
            $table->integer('level4')->nullable();            // كرازة جماعية
            $table->integer('tot')->nullable();             // كرازة جماعية
            $table->integer('pool')->nullable();           // حوض السباحة
            $table->longtext('story');                   // قصة مشوقة
            $table->integer('week_id')->unsigned();
            $table->foreign('week_id')->references('id')->on('weeks')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('tool_id')->unsigned();
            $table->foreign('tool_id')->references('id')->on('tools')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('statistic4ds');
    }
}
