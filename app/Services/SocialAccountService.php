<?php
namespace App\Services;

use Laravel\Socialite\Contracts\User as ProviderUser;
use App\Models\Customer;

class SocialAccountService
{
    public static function createOrGetUser(ProviderUser $providerUser, $social)
    {
        $data = [];
        $account = Customer::whereProvider($social)
            ->whereProviderId($providerUser->getId())
            ->first();

        $email = $providerUser->getEmail() ?? $providerUser->getNickname();
        //Check email for login other ( normal or other provider)
        $check_customer = Customer::where('email',$email)
                        ->where(function($query) use ($social){
                            $query->where('provider','!=',$social)
                            ->orWhere('provider',null);
                        })->count();

        $data['customer'] = $account;

        if($check_customer > 0){
            $data['status'] = 'danger';
            return $data;
        }else{
            if (!$account)
            {
                $data['customer'] = Customer::create([
                    'email' => $email,
                    'name' => $providerUser->getName(),
                    'password' => $providerUser->getName(),
                    'provider_id' => $providerUser->getId(),
                    'provider' => $social
                ]);
            }

            return $data;
        }
    }
}