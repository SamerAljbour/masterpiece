<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Reference to the user receiving the notification
            $table->boolean('admin')->nullable(); // Adding admin_id column
            $table->string('type');
            $table->morphs('notifiable'); // Polymorphic relationship
            $table->text('data'); // Notification data (JSON)
            $table->timestamp('read_at')->nullable(); // Timestamp for read notifications
            $table->timestamps(); // Created and updated timestamps

            // Index for fast searching
            $table->index(['user_id', 'read_at']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('notifications'); // Drop notifications table
    }
}
