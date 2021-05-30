<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('profile_pic')->nullable();
            $table->enum('verified', ['No','Yes'])->default('No');
            $table->string('verification_doc')->nullable();
            $table->enum('verification_status', [null,'Approved','Pending','Declined'])->default(null);
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('user_type', ['Seller', 'Buyer', 'Admin']);
            $table->string('mobile_no');
            $table->string('address');
            $table->enum('device_type', ['Web', 'Android', 'Ios']);
            $table->string('device_token')->nullable();
            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
