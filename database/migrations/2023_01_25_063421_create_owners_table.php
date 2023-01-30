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
        Schema::create('owners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->string('image_src')->nullable();
            $table->enum('title', config('enum.owner_title'));
            $table->date('move_in_date');
            $table->date('move_out_date')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name')->nullable();
            $table->string('suffix_name')->nullable();
            $table->enum('gender', config('enum.owner_gender'));
            $table->date('birthdate')->nullable();
            $table->string('nationality');
            $table->string('contact_no');
            $table->string('email');
            $table->string('occupation')->nullable();
            $table->string('utility_bond');
            $table->date('date_of_ar')->nullable();
            $table->string('electric_reading');
            $table->string('water_reading');
            $table->string('or_number')->nullable();
            $table->string('remarks');
            $table->foreignId('unit_id')->nullable()->constrained('units')->onDelete('set null');
            $table->enum('residency_status', config('enum.owner_residency_status'));
            $table->boolean('is_occupant');
            $table->string('address');
            $table->string('proof_of_identity_src')->nullable();
            $table->string('proof_of_ownership_src')->nullable();
            $table->string('signature_src')->nullable();
            $table->string('spa_name')->nullable();
            $table->string('spa_contact_no')->nullable();
            $table->string('household_name')->nullable();
            $table->string('household_contact_no')->nullable();
            $table->string('broker_name')->nullable();
            $table->string('broker_contact_no')->nullable();
            
            # Proof of ownership:
            #-Condominium Certificate of Title
            #-Deed/s of Absolute Sale
            $table->boolean('pow_condo');
            $table->boolean('pow_deeds');


            #SPA & Gov't IDs
            #-SPA from Unit Owner
            #-2 Government ID of the SPA
            #-2 Government ID of All Occupants
            $table->boolean('spa_unit_owner');
            $table->boolean('spa_spa');
            $table->boolean('spa_all');


            #Other Requirements
            #-Health Certificate of All Occupants
            #-Utility Deposit for Owner
            #-Cleared Accounts
            #-Paid Utility Bills (current)
            #-Clearance From Security
            $table->boolean('other_health');
            $table->boolean('other_utility');
            $table->boolean('other_cleared');
            $table->boolean('other_paid');
            $table->boolean('other_clearance');


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
        Schema::dropIfExists('owners');
    }
};
