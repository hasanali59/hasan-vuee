<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AccountOpportunities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_opportunities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account_id');
            $table->string('name');
            $table->boolean('online');
            $table->boolean('live');
            $table->boolean('hybrid');
            $table->boolean('group');
            $table->string('course_name');
            $table->string('amount');
            $table->string('number_of_learners');
            $table->string('proposal_amount');
            $table->string('delivery_data');
            $table->string('payment_method');
            $table->string('estimated_closing_date');
            $table->boolean('add_to_forecast');
            $table->string('TDR');
            $table->string('national_account_manager');
            $table->string('ISDR');
            $table->string('created_by');
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
        //
    }
}
