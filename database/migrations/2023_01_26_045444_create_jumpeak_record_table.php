<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jumpeak_records', function (Blueprint $table) {
            $table->id();
            $table->double('amount');
            $table->string('type');
            $table->integer('qty');
            $table->integer('full_price');
            $table->integer('sell_price');
            $table->boolean('all_owe')->default(true);
            $table->double('paid')->nullable();
            $table->string('going_to_pay')->nullable();
            $table->boolean('is_active')->default(true);
            // $table->string('customer_name');
            $table->foreignId('customer_name')->constrained('jumpeak_customers', 'name')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('jumpeak_records');
    }
};
