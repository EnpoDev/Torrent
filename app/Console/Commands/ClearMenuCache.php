<?php
// App\Console\Commands\ClearMenuCache.php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class ClearMenuCache extends Command
{
    protected $signature = 'menu:clear-cache';
    protected $description = 'Clear header menu cache';

    public function handle()
    {
        Cache::forget('header_menu_items');
        $this->info('Header menu cache cleared successfully!');
        return 0;
    }
}
