<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAuthRefidStatusShoppingcart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shoppingcart', function (Blueprint $table) {
            $table->string('auth')->nullable();
            $table->string('refid')->nullable();
            $table->string('status')->nullable();
            $table->string('qty')->nullable();
            $table->string('price')->nullable();
            $table->string('subtotal')->nullable();
            $table->string('feature')->nullable();
            $table->string('total')->nullable();
            $table->increments('id');

            //$table->primary(['id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('auth');
            $table->dropColumn('refid');
            $table->dropColumn('status');
            $table->dropColumn('qty');
            $table->dropColumn('price');
            $table->dropColumn('subtotal');
            $table->dropColumn('feature');
            $table->dropColumn('total');
        });
    }
}
