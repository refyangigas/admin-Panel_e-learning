<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class TestEmail extends Command
{
    protected $signature = 'mail:test';
    protected $description = 'Test email configuration';

    public function handle()
    {
        try {
            Mail::raw('Test email from Laravel App', function ($message) {
                $message->to('seykanyya@gmail.com')
                    ->subject('Test Email');
            });
            $this->info('Email sent successfully!');
        } catch (\Exception $e) {
            $this->error('Email failed: ' . $e->getMessage());
        }
    }
}
