<?php

namespace Stdevs\Toolbox\Console;

use Mail;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Stdevs\Toolbox\Classes\GwentApi;

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
                'name' => 'Mateusz',
                'flavor' => (new GwentApi())->getRandomFlavor(),
            ];

            Mail::send('stdevs.toolbox::mail.gwent', $data, function ($message) {
                $message->to('mateusz.rycombel84@gmail.com', 'Mateusz');
                $message->subject('Gwent Daily Puzzle - ' . Carbon::now()->format('d.m.Y'));
            });

            $this->info('Gwent Daily Puzzle reminder send successfully');
        } catch (\Exception $e) {
            $this->error('Something went wrong: ' . $e->getMessage());
        }
    }
}
