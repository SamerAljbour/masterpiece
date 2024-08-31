<?php

namespace App\Console\Commands;

use App\Models\DiscountCoupon;
use Illuminate\Console\Command;

class UpdateDiscountsStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'discounts:update-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the status of the discount codes based on today\'s date';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = now()->toDateString();

        // Corrected column name without extra space
        DiscountCoupon::whereDate('valid_from', '<=', $today)
            ->whereDate('valid_until', '>=', $today)
            ->update(['is_active' => true]);

        DiscountCoupon::whereDate('valid_until', '<', $today)
            ->update(['is_active' => false]);

        $this->info('Discount statuses have been updated.');
    }
}
