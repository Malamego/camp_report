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
            $table->string('image')->nullable();
            $table->longtext('content');              // Notes
            $table->date('datenow');                  // تاريخ الاحصائية
            $table->integer('interact')->default(0);              // عدد التواصل
            $table->integer('mission')->default(0);              // عدد كرازة
            $table->integer('decision')->default(0);             // عدد الناس اللي اخدت قرار
            $table->integer('ob1')->default(0);                 // عدد الناس اللي اتعمل معاهم متابعة اولى
            $table->integer('ob2')->default(0);                // عدد الناس اللي اتعمل معاهم متابعة ثانية
            $table->integer('ob3')->default(0);               //   عدد الناس الي اتعمل معاهم متابعة ثالثة
            $table->integer('ob4')->default(0);               // عدد الناس اللي اتعمل معاهم متابعة رابعة
            $table->integer('ob5')->default(0);               // عدد الناس اللي اتعمل معاهم متابعة خامسة
            $table->integer('ob6')->default(0);                   // عدد الناس اللي اتعمل معاهم متابعة سادسة
            $table->integer('level1')->default(0);               // التوزيع
            $table->integer('level2')->default(0);              // الروح القدس
            $table->integer('level3')->default(0);             // كرازة لغير الطلبة
            $table->integer('level4')->default(0);            // كرازة جماعية
            $table->integer('tot')->default(0);             // كرازة جماعية
            $table->integer('pool')->default(0);           // حوض السباحة
            $table->longtext('story');                    // قصة مشوقة
            $table->integer('trinity')->default(0);           //الثالوث
            $table->integer('incarnation')->default(0);           //التجسد
            $table->integer('steel')->default(0);           //الصلب
            $table->integer('misrepresentation')->default(0);           //التحريف
            $table->integer('biblestory')->default(0);           //قصص كتاب
            $table->integer('lesson1')->default(0);           //الدرس الاول
            $table->integer('lesson2')->default(0);
            $table->integer('lesson3')->default(0);
            $table->integer('lesson4')->default(0);
            $table->integer('lesson5')->default(0);
            $table->integer('lesson6')->default(0);
            $table->integer('lesson7')->default(0);
            $table->integer('lesson8')->default(0);
            $table->integer('lesson9')->default(0);
            $table->integer('lesson10')->default(0);
            $table->integer('friendmission')->default(0);       // كرازة لصديق
            $table->integer('frienddecision')->default(0);      // قرار صديق
            $table->integer('friendmissiontrain')->default(0);      // تدريب كرازة للاصدقاء
            $table->integer('friendfollowtrain')->default(0);      // تدريب متابعة للاصدقاء
            $table->integer('friendstudenttrain')->default(0);      // تدريب تلمذة للاصدقاء
            $table->integer('friendsubmittrain')->default(0);      // تدريب ارسالية للاصدقاء
            $table->integer('loven')->default(0);      // اعمال محبة

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
