<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('names', 125);
            $table->string('surnames', 125);
            $table->string('document_number', 30);
            $table->string('address', 125);
            $table->string('cellphone', 20);
            $table->string('email')->unique();
            $table->enum('gender', ["masculino", "femenino"]);
            $table->enum('status', ["active", "inactive"])->default("active");
            //Declaración llave foranea
            $table->bigInteger('document_id')->unsigned();
            $table->bigInteger('rol_id')->unsigned();
            $table->bigInteger('company_id')->unsigned();
            //Unión llave foranea
            $table->foreign('document_id')->references('id')->on('documents');
            $table->foreign('rol_id')->references('id')->on('roles');
            $table->foreign('company_id')->references('id')->on('companies');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
