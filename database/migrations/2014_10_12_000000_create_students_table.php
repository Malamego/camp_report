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
       Schema::disableForeignKeyConstraints(); // For Forgen Key Checks Disable
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
            $table->integer('trinity')->nullable();           //الثالوث
            $table->integer('incarnation')->nullable();           //التجسد
            $table->integer('steel')->nullable();           //الصلب
            $table->integer('misrepresentation')->nullable();           //التحريف
            $table->integer('biblestory')->nullable();           //قصص كتاب
            $table->integer('lesson1')->nullable();           //الدرس الاول
            $table->integer('lesson2')->nullable();
            $table->integer('lesson3')->nullable();
            $table->integer('lesson4')->nullable();
            $table->integer('lesson5')->nullable();
            $table->integer('lesson6')->nullable();
            $table->integer('lesson7')->nullable();
            $table->integer('lesson8')->nullable();
            $table->integer('lesson9')->nullable();
            $table->integer('lesson10')->nullable();
            $table->integer('friendmission')->nullable();       // كرازة لصديق
            $table->integer('frienddecision')->nullable();      // قرار صديق
            $table->integer('friendmissiontrain')->nullable();      // تدريب كرازة للاصدقاء
            $table->integer('friendfollowtrain')->nullable();      // تدريب متابعة للاصدقاء
            $table->integer('friendstudenttrain')->nullable();      // تدريب تلمذة للاصدقاء
            $table->integer('friendsubmittrain')->nullable(); // تدريب ارسال للاصدقاء

            $table->integer('score')->default(0);

            $table->rememberToken();
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
        Schema::dropIfExists('students');
    }
}
