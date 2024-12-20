<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::table('ec_shipments', function (Blueprint $table): void {
            $table->string('tracking_id')->nullable();
            $table->string('shipping_company_name')->nullable();
            $table->string('tracking_link')->nullable();
            $table->dateTime('estimate_date_shipped')->nullable();
            $table->dateTime('date_shipped')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('ec_shipments', function (Blueprint $table): void {
            $table->dropColumn([
                'tracking_id',
                'shipping_company_name',
                'tracking_link',
                'estimate_date_shipped',
                'date_shipped',
            ]);
        });
    }
};
