<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignkey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('role_user', function (Blueprint $table) {
          
            $table->foreign('user_id')->on('users')->references('id');
            $table->foreign('role_id')->on('roles')->references('id');
        
        });
        Schema::table('orders', function (Blueprint $table) {
            $table->foreign('user_id','user_order_user_fk')->on('users')->references('id');
         
        });
        Schema::table('nomenclatures', function (Blueprint $table) {
            $table->index('id','nomeclature_provider_provider_idx');
            $table->foreign('order_id','order_nomeclature_order_fk')->references('id')->on('orders');
            $table->foreign('provider_id','nomeclature_provider_provider_fk')->references('id')->on('providers');
            $table->foreign('product_id','nomeclature_product_product_fk')->references('id')->on('products');
         
        });
        Schema::table('product_provider', function (Blueprint $table) {
            $table->foreign('product_id','product_provider_product_product_fk')->references('id')->on('products');
            $table->foreign('provider_id','product_provider_provider_provider_fk')->references('id')->on('providers');
         
        });
        Schema::table('providers', function (Blueprint $table) {
            
         
        });
        Schema::table('cities', function (Blueprint $table) {
            $table->foreign('country_id','city_country_country_fk')->on('countries')->references('id');
         
        });
        Schema::table('contacts', function (Blueprint $table) {
            $table->foreign('provider_id','provider_contact_provider_fk')->on('providers')->references('id');
         
        });
        Schema::table('city_provider', function (Blueprint $table) {
            $table->foreign('provider_id','provider_city_provider_fk')->on('providers')->references('id');
            $table->foreign('city_id','provider_city_city_fk')->on('cities')->references('id');
         
        });
        Schema::table('country_provider', function (Blueprint $table) {
            $table->foreign('provider_id','provider_country_provider_fk')->on('providers')->references('id');
            $table->foreign('country_id','provider_country_country_fk')->on('countries')->references('id');
         
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
}