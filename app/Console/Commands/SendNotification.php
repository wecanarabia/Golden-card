<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Notification;
use Illuminate\Console\Command;
use App\Traits\NotificationTrait;
use Illuminate\Support\Facades\Log;

class SendNotification extends Command
{
    use NotificationTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $notifications = Notification::whereDate('date_time', Carbon::now()->format('Y-m-d'))->whereSent(0)->get();
        foreach ($notifications as $notification) {
            if ($notification->sending_times=='One Time') {
                if (Carbon::parse($notification->date_time)->lt(Carbon::now())||Carbon::parse($notification->date_time)->eq(Carbon::now())) {
                    $notification->update(['sent'=>1]);
                    $this->send($notification->body, $notification->title,$notification->date_time, $many = true);
                }
            }

            if ($notification->sending_times=='Multible Times') {
                if ($notification->number_of_times>0) {
                    if (Carbon::parse($notification->date_time)->lt(Carbon::now())||Carbon::parse($notification->date_time)->eq(Carbon::now())) {
                        $number_of_times = $notification->number_of_times-1;
                        $date_time = $notification->date_time->addHours($notification->scheduale_time);
                        $notification->update([
                            'number_of_times'=>$number_of_times,
                            'date_time'=>$date_time,
                            'sent'=>$number_of_times==0?1:2
                        ]);

                        $this->send($notification->body, $notification->title,$notification->date_time, $many = true);
                    }
                }

            }


        }
    }
}
