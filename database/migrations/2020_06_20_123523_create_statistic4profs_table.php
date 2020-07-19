<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Createstatistic4profsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistic4profs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('image')->nullable();
            $table->longtext('content');              // مشاركة من الخلوة
            $table->date('datenow');                  // تاريخ الاحصائية
            $table->integer('mission')->default(0);              // عدد كرازة
            $table->integer('decision')->default(0);             // عدد الناس اللي اخدت قرار
            $table->integer('ob1')->default(0);                 // عدد الناس اللي اتعمل معاهم متابعة اولى
            $table->integer('ob2')->default(0);                // عدد الناس اللي اتعمل معاهم متابعة ثانية
            $table->integer('ob3')->default(0);               //   عدد الناس الي اتعمل معاهم متابعة ثالثة
            $table->integer('ob4')->default(0);               // عدد الناس اللي اتعمل معاهم متابعة رابعة
            $table->integer('ob5')->default(0);               // عدد الناس اللي اتعمل معاهم متابعة خامسة
            $table->integer('ob6')->default(0);                   // عدد الناس اللي اتعمل معاهم متابعة سادسة
            $table->integer('friendmission')->default(0);       // كرازة لصديق
            $table->integer('frienddecision')->default(0);      // قرار صديق
            $table->integer('friendfollow')->default(0);      // متابعة صديق
            $table->integer('level1')->default(0);               // المستوى الاول
            $table->integer('level2')->default(0);              // المستوى الثاني
            $table->integer('level3')->default(0);             // المستوى الثالث
            $table->integer('level4')->default(0);            //المستوى الرابع
            $table->integer('tot')->default(0);             //TOT
            $table->integer('talmazagroup')->default(0);           // مجموعات تلمذة
            $table->integer('missionhours')->default(0);           //عدد ساعات خدمة مباشر
            $table->integer('jesustime')->default(0);           // الخلوة from 0 to 7
            $table->string('church')->default("");           //الكنيسة
            $table->enum('traininteract', ['absence', 'presence'])->default('absence'); // مشاركة تدريب
            $table->integer('loven')->default(0);      // اعمال محبة

            $table->integer('week_id')->unsigned();
            $table->foreign('week_id')->references('id')->on('weeks')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('status', ['active', 'inactive'])->default('inactive');
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
        Schema::dropIfExists('statistic4profs');
    }
}
