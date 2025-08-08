<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSocialMediaToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('facebook_url')->nullable()->after('bio');
            $table->string('twitter_url')->nullable()->after('facebook_url');
            $table->string('github_url')->nullable()->after('twitter_url');
            $table->string('linkedin_url')->nullable()->after('github_url');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['facebook_url', 'twitter_url', 'github_url', 'linkedin_url']);
        });
    }
}
