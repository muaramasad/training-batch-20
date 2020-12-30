<?php

namespace App;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\Client as OAuthClient;
use Laravel\Passport\HasApiTokens;

class Client extends OAuthClient
{
    use UsesUuid;
}
