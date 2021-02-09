<?php
namespace App\Services;
use App\User;
use App\Applicant;

use Laravel\Socialite\Contracts\User as ProviderUser;
class SocialFacebookAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = User::whereProvider('facebook')
            ->whereProviderId($providerUser->getId())
            ->first();
        if ($account) {
            return $account->user;
        } else {
            $user = User::whereEmail($providerUser->getEmail())->first();
            if (!$user) {
                $user = User::create(
                    [
                    'email' => $providerUser->getEmail(),
                    'first_name' => $providerUser->getName(),
                    'password' => md5(rand(1, 10000)),
                    'provider_avatar' => $providerUser->getAvatar(),
                    'user_type_id' => '5',
                    'provider_user_id' => $providerUser->getId(),
                    'provider' => 'facebook'
                    ]
                );
                Applicant::create(
                    [
                    'user_id' => $user->id,
                    'avatar_image_path' => $user->provider_avatar
                    ]
                );
            }
            return $user;
        }
    }
}