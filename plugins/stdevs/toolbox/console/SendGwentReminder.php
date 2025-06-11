<?php

namespace StDevs\Toolbox\Console;

use Mail;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SendGwentReminder extends Command
{
    protected $name = 'toolbox:gwent';

    protected $description = 'Send Gwent Daily Puzzle reminder';

    public function handle()
    {
        try {
            $data = [
                'date' => Carbon::now()->format('d.m.Y'),
                'time' => Carbon::now()->format('H:i'),
                'content' => ''
            ];

            Mail::send('yourauthor.yourplugin::mail.morning-email', $data, function ($message) {
                $message->to('mateusz.rycombel84@gmail.com', 'Mateusz');
                $message->subject('Gwent Daily Puzzle - ' . Carbon::now()->format('d.m.Y'));
            });

            $this->info('Gwent Daily Puzzle reminder send successfully');
        } catch (\Exception $e) {
            $this->error('Something went wrong: ' . $e->getMessage());
        }
    }
}
