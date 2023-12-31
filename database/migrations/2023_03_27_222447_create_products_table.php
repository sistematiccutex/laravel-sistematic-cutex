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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('photo');
            $table->string('name', 125);
            $table->string('reference', 30)->unique();
            $table->text('description');
            $table->integer('stock');
            $table->double('price', 10, 2);
            $table->double('measure', 10, 2);
            $table->enum('status', ["active", "inactive"])->default("active");
            //Declaración llave foranea
            $table->bigInteger('company_id')->unsigned();
            $table->bigInteger('provider_id')->unsigned();
            $table->bigInteger('color_id')->unsigned();
            $table->bigInteger('subcategory_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
