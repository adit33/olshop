<?php

namespace App\Http\Traits;

use App\Models\User;
use App\Models\SocialAccount;
use Laravel\Socialite\Contracts\User as ProviderUser;

trait SocialCheckService
{
    protected function checkUser(ProviderUser $providerUser, $provider)
    {
        $account = SocialAccount::whereProvider($provider)
            ->whereProviderUserId($providerUser->getId())
            ->first();
        if ($account){
            $this->updateIfExistUser($providerUser, $account->user);
            return $account->user;
        }else{
            $existEmail = User::whereEmail($providerUser->getEmail())->first();
            if($existEmail){
                $this->updateIfExistUser($providerUser, $existEmail);
                $user = $existEmail;
            }else{
                $user = User::firstOrCreate([
                    'name' => $providerUser->getName(),
                    'email' => $providerUser->getEmail(),
                    // 'avatar' => $providerUser->getAvatar(),
                ]);
            }
            $account = $user->socialAccount()->create([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $provider,
            ]);
        }
        return $user;
    }
    // Jika emailnya pernah daftar update user where email sama dengan yang login
    private function updateIfExistUser($providerUser, $existEmail)
    {
        $existEmail->update([
            'name' => $providerUser->getName(),
            'avatar' => $providerUser->getAvatar(),
        ]);
    }
}