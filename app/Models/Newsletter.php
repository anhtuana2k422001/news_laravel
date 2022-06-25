<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Newsletter extends Model
{
    use HasFactory;

    protected $table = "newsletter";
    
    protected $fillable = ['email'];

    public static function store($request)
    {
        self::create( $request->all() );
        $mailchimp = new \MailchimpMarketing\ApiClient();

        $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.apikey'),
            'server' => config('services.mailchimp.prefix')
        ]);

        $list_id = '8eda8e1d87';

        try {
            $response = $mailchimp->lists->addListMember($list_id, [
                "email_address" => $request->input('email'),
                "status" => "subscribed"
                 
            ]);
            return response()->json([
                'message' => 'Cảm ơn bạn đã subscribe website chúng tôi'
            ], 200);
        } catch (\MailchimpMarketing\ApiException $e) {
            return response()->json([
                'message' => 'Email này đã subscribe website chúng tôi'
            ], 500);
        }
    }

}
