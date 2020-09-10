<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('support_tickets', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name')->nullable(false);
            $table->text('problem_description');
            $table->string('email', 100)->nullable(false);
            $table->string('phone_number');
            $table->string('reference_number')->nullable(false);
            $table->unique('reference_number');
            $table->tinyInteger('status')->default(0);
            $table->text('agent_reply')->nullable(true);
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
        Schema::dropIfExists('support_tickets');
    }
}
