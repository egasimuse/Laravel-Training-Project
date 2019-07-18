<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Company;

class AddCompanyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'contact:company';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->ask('What is the company name?');
        $phone = $this->ask('What is the company\'s phone number?');
        
        if($this->confirm('Are you ready to insert "'. $name .'"?')){
            $company = Company::create([
                'name' => $name,
                'phone' => $phone,
            ]);
            return $this->info('Added: ' . $company->name);
        }else {
            $this->warn('No new company was added.');
        }
    }
}
