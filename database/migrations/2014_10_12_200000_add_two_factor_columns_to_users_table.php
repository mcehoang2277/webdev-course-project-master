<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Laravel\Fortify\Fortify;
use MongoDB\Laravel\Schema\Blueprint;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::connection('mongodb')->table('users', function (Blueprint $collection) {
            $collection->text('two_factor_secret')
                ->nullable();

            $collection->text('two_factor_recovery_codes')
                ->nullable();

            if (Fortify::confirmsTwoFactorAuthentication()) {
                $collection->timestamp('two_factor_confirmed_at')
                    ->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mongodb')->table('users', function (Blueprint $collection) {
            if ($collection->hasColumn('two_factor_secret')) {
                $collection->dropColumn('two_factor_secret');
            }

            if ($collection->hasColumn('two_factor_recovery_codes')) {
                $collection->dropColumn('two_factor_recovery_codes');
            }

            if ($collection->hasColumn('two_factor_confirmed_at')) {
                $collection->dropColumn('two_factor_confirmed_at');
            }
        });
    }
};
