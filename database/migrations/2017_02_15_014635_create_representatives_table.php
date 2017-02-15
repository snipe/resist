<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepresentativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname')->index();
            $table->string('lastname')->index();
            $table->string('congress',7)->index();
            $table->string('rep_state',30)->index();
            $table->string('party',1)->index();
            $table->string('district')->nullable()->default(null);
            $table->string('current_term_ends')->nullable()->default(null);
            $table->string('next_term_ends')->nullable()->default(null);
            $table->string('phone')->nullable()->default(null);
            $table->string('email')->nullable()->default(null);
            $table->string('email2')->nullable()->default(null);
            $table->string('fax')->nullable()->default(null);
            $table->string('twitter')->nullable()->default(null);
            $table->string('facebook')->nullable()->default(null);
            $table->string('photo')->nullable()->default(null);
            $table->string('url')->nullable()->default(null);
            $table->string('address')->nullable()->default(null);
            $table->string('address2')->nullable()->default(null);
            $table->string('city')->nullable()->default(null);
            $table->string('state',2)->nullable()->default(null);
            $table->string('zip',10)->nullable()->default(null);
            $table->string('country',2)->nullable()->default(null);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::create('committees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index();
            $table->string('type')->index();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::create('committees_reps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rep_id')->index();
            $table->string('committee_id')->index();
            $table->string('membership_type');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reps');
        Schema::dropIfExists('committees');
        Schema::dropIfExists('committees_reps');
    }
}
