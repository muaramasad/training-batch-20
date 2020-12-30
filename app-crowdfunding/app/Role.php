<?php

namespace App;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use UsesUuid;
    protected $guarded = [];

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public static function getIdByRoleName($name = 'admin')
    {
        $roles = Role::all();
        if(count($roles) > 0){
            $role = Role::where('role_name',$name)->first('id');
            return $role->id;
        } else {
            abort(400,'Empty roles record, please run db:seed first');
        }

    }

}
