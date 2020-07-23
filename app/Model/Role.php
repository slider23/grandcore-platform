<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Role
 *
 * @property int $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Role whereName($value)
 * @mixin \Eloquent
 */
class Role extends Model
{
    public $timestamps = false;

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_roles');
    }
}
