<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            if (!Schema::hasColumn('posts', 'views')) {
                $table->unsignedInteger('views')->default(0)->after('content');
            }
            if (!Schema::hasColumn('posts', 'likes')) {
                $table->unsignedInteger('likes')->default(0)->after('views');
            }
        });
    }

    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn(['views', 'likes']);
        });
    }
};
