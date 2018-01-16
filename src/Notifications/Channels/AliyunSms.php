<?php
/**
 * Created by PhpStorm.
 * User: zed
 * Date: 17-12-10
 * Time: 下午3:14
 */

namespace App\Channels;


use Dezsidog\AliyunSDK\Core\DefaultAcsClient;
use Dezsidog\AliyunSDK\Sms\Notifications\Messages\AliyunSmsMessage;
use Dezsidog\AliyunSDK\Sms\Request\SendSmsRequest;
use Illuminate\Notifications\Notification;

class AliyunSms
{
    /**
     * Send the given notification.
     *
     * @param  mixed  $notifiable
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return void
     */
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toAliyunSms($notifiable);

        $client = app()->make(DefaultAcsClient::class);

        if ($message instanceof AliyunSmsMessage) {
            $client->getAcsResponse($message->getRequest());
        }else{
            $client->getAcsResponse($message);
        }

    }
}
