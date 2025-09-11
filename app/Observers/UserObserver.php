<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Laravolt\Avatar\Facade as Avatar;


class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        $name=$user->first_name;
        if(!empty($user->last_name))
        {
            $name.=" ".$user->last_name;
        }
        $save=Storage::disk('public')->path(User::AVATAR_PATH."/".$user->id.".png");
        Avatar::create($name)->save($save);
    }


    public function updating(User $user): void
    {
        if($user->isDirty('first_name') || $user->isDirty('last_name'))
        {
            $av=User::AVATAR_PATH."/".$user->id.".png";
            if(Storage::disk('public')->exists($av))
            {
                Storage::disk('public')->delete($av);
            }

            $name=$user->first_name;
            if(!empty($user->last_name))
            {
                $name.=" ".$user->last_name;
            }
            $save=Storage::disk('public')->path(User::AVATAR_PATH."/".$user->id.".png");
            Avatar::create($name)->save($save);
            }
    }


    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        $av=User::AVATAR_PATH."/".$user->id.".png";
        if(Storage::disk('public')->exists($av))
        {
            Storage::disk('public')->delete($av);
        }
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
