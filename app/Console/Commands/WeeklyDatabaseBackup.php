<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class WeeklyDatabaseBackup extends Command
{
    protected $signature = 'backup:weekly';
    protected $description = 'Backup system data to another database';

    public function handle()
    {
        $this->info("Database backup started");
        $filename = "db_bkp-".time().".sql";
        $backup_path = storage_path()."/app/backup";
        if(!file_exists($backup_path)){
            mkdir($backup_path);
        }
        $backup_path .= "/". $filename;
        $command = "mysqldump --user=". env('DB_USERNAME') . " --password=". env('DB_PASSWORD'). " --host=" . env('DB_HOST'). " " . env('DB_DATABASE'). " > " . $backup_path;
        $returnVar = null;
        $output = null;
        @exec($command, $output, $returnVar);
        $this->newLine();
        $this->info("Database backup end");

    }
}
