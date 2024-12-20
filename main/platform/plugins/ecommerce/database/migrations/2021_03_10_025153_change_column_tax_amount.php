<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::table('ec_orders', function (Blueprint $table): void {
            $table->decimal('tax_amount', 15)->nullable()->change();
            $table->decimal('shipping_amount', 15)->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('ec_orders', function (Blueprint $table): void {
            $table->decimal('tax_amount')->nullable()->change();
            $table->decimal('shipping_amount')->nullable()->change();
        });
    }
};
