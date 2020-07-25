<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Invite
 *
 * @property int $id
 * @property string $max_count_register
 * @property string $invite_symbols
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $is_frozen
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Invite newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Invite newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Invite query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Invite whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Invite whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Invite whereInviteSymbols($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Invite whereIsFrozen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Invite whereMaxCountRegister($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Invite whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Invite extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'max_count_register', 'invite_symbols'
    ];

    public function registered_users()
    {
    	return $this->hasMany(User::class);
    }
}
