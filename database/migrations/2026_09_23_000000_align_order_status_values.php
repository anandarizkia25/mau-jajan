<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (DB::getDriverName() === 'mysql') {
            DB::statement("ALTER TABLE orders MODIFY status ENUM('Pending', 'Diproses', 'Selesai') NOT NULL DEFAULT 'Pending'");
            DB::table('orders')->where('status', 'pending')->update(['status' => 'Pending']);
            DB::table('orders')->where('status', 'selesai')->update(['status' => 'Selesai']);
        }
    }

    public function down(): void
    {
        if (DB::getDriverName() === 'mysql') {
            DB::table('orders')->where('status', 'Pending')->update(['status' => 'pending']);
            DB::table('orders')->where('status', 'Selesai')->update(['status' => 'selesai']);
            DB::statement("ALTER TABLE orders MODIFY status ENUM('pending', 'Diproses', 'selesai') NOT NULL DEFAULT 'pending'");
        }
    }
};
