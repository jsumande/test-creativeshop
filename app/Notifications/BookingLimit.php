<?php 

namespace App\Notifications;

use App\Booking;
use App\Traits\SmtpSettings;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;


class BookingLimit extends Notification {


	// use Queueable, SmtpSettings;
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->setMailConfigs();
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

         $Business_id = DB::table('business_user')
              ->select('business_user.*')
              ->where('user_id',auth()->user()->id)
              ->pluck('business_id')->first();

        $plan = Booking::where('business_id',$Business_id)->count();

        if($plan == 9){
            $percent = "90%";
        }
        else{
            $percent = "100%";
        }

        return (new MailMessage)
            ->subject(__('email.newContact.subject').' '.config('app.name').'!')
            ->greeting(__('email.hello').' '.ucwords($notifiable->name).'!')
            ->line('You have reached '.$percent.' from your subscribed plan. Please upgrade your plan as soonest possible. Thank you')
            ->line(__('email.thankyouNote'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }



}

 ?>