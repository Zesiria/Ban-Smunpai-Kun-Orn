<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DropAllTableCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'table:down';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        DB::statement("DROP TABLE COURSE_REQUIRED");
        DB::statement("DROP TABLE COURSE_USED");
        DB::statement("DROP TABLE EMPLOYEE_REQUIRED");
        DB::statement("DROP TABLE EMPLOYEE_USED");
        DB::statement("DROP TABLE SERVICE_ORDER");
        DB::statement("DROP TABLE QUEUE");
        DB::statement("DROP TABLE TIME");
        DB::statement("DROP TABLE TOOL");
        DB::statement("DROP TABLE MATERIAL");
        DB::statement("DROP TABLE EMPLOYEE");
        DB::statement("DROP TABLE CUSTOMER");
        DB::statement("DROP TABLE COURSE");
        DB::statement("DROP TABLE MANAGER");
        return Command::SUCCESS;
    }
}
