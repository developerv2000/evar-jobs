<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cvs', function (Blueprint $table) {
            $table->id();
            
            //PERSONAL
            $table->text('name');
            $table->text('birthday');
            $table->text('phone1');
            $table->text('phone2')->nullable();
            $table->text('email')->nullable();
            $table->string('photo');
            $table->boolean('married');
            $table->boolean('got_childs');
            $table->integer('childs_count');

            //POSITION
            $table->integer('position_id');

            // ADDRESS
            $table->text('city1');
            $table->text('area1')->nullable();
            $table->text('street1');
            $table->text('appartment1')->nullable();
            $table->boolean('registrated_address');
            $table->text('city2')->nullable();
            $table->text('area2')->nullable();
            $table->text('street2')->nullable();
            $table->text('appartment2')->nullable();

            // EDUCATION
            $table->integer('education1_lvl');
            $table->text('education1_inst_name');
            $table->text('education1_spec')->nullable();
            $table->text('education1_begin');
            $table->text('education1_end');
            $table->integer('education2_lvl')->nullable();
            $table->text('education2_inst_name')->nullable();
            $table->text('education2_spec')->nullable();
            $table->text('education2_begin')->nullable();
            $table->text('education2_end')->nullable();
            $table->integer('tajik');
            $table->integer('russian');
            $table->integer('english');

            // EXPERIENCE
            $table->boolean('experienced');
            $table->text('job1_org')->nullable();
            $table->text('job1_position')->nullable();
            $table->text('job1_duties')->nullable();
            $table->text('job1_begin')->nullable();
            $table->text('job1_end')->nullable();
            $table->text('job2_org')->nullable();
            $table->text('job2_position')->nullable();
            $table->text('job2_duties')->nullable();
            $table->text('job2_begin')->nullable();
            $table->text('job2_end')->nullable();

            // ADDITIONAL
            $table->boolean('diseases')->nullable();
            $table->text('diseases_desc')->nullable();
            $table->boolean('allergy')->nullable();
            $table->text('allergy_desc')->nullable();
            $table->boolean('pregnant')->nullable();
            $table->text('pregnant_desc')->nullable();
            $table->boolean('criminal')->nullable();
            $table->text('criminal_desc')->nullable();

            // SEND
            $table->boolean('relative')->nullable();
            $table->text('rel_name')->nullable();
            $table->text('rel_position')->nullable();
            $table->text('comment')->nullable() ;

            //OPTIONS
            $table->boolean('new')->default(true);

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
        Schema::dropIfExists('cvs');
    }
}
