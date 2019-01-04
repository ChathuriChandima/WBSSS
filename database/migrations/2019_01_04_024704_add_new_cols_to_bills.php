<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewColsToBills extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bills', function (Blueprint $table) {
            
                $table->integer('stockQty')->after('addedParts');
                $table->decimal('serviceCharge')->after('stockQty');
                $table->decimal('stockCharge')->after('serviceCharge');
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bills', function (Blueprint $table) {
            $table->dropColumn('stockQty');
            $table->dropColumn('serviceCharge');
            $table->dropColumn('stockCharge');
        });
    }
}
