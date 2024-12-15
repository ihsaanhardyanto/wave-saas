<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('role')->default('user');
            $table->string('profile_picture')->nullable();
            $table->unsignedBigInteger('subscription_id')->nullable();
            $table->integer('gas_limit')->default(0);
            $table->integer('gas_used')->default(0);
            $table->timestamps();
            $table->foreign('subscription_id')->references('id')->on('subscriptions')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
