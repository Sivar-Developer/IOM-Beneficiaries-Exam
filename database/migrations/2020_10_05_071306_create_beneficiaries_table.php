<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeneficiariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiaries', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->date('birthdate')->nullable();
            $table->enum('gender', ['Male', 'Female'])->nullable();
            $table->string('phone_number')->nullable();
            $table->bigInteger('national_id_number')->nullable();
            $table->string('mother_name')->nullable();
            $table->enum('martial_status', ['Single','Married','Divorced'])->nullable();
            $table->boolean('employment_status')->nullable();
            $table->decimal('monthly_income',10,2)->nullable();
            $table->text('beneficiary_photo')->nullable();
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
        Schema::dropIfExists('beneficiaries');
    }
}
