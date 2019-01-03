<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColsToBills extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('bills', function (Blueprint $table) {
            $table->string('customerName')->after('date');
            $table->string('vehicleNo')->after('customerName');
            $table->string('serviceDescription')->after('vehicleNo');
            $table->string('addedParts')->after('serviceDescription');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('bills', function (Blueprint $table) {
            $table->dropColumn('customerName');
            $table->dropColumn('vehicleNo');
            $table->dropColumn('serviceDescription');
            $table->dropColumn('addedParts');
        });
    }
}
