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

         // Générer l'avatar à partir des initiales du nom + prénom
        $initials = $this->getInitials($user);

        $avatar = Avatar::create($initials)
            ->background('#0ea5e9')
            ->color('#ffffff')
            ->size(100)
            ->rounded()
            ->getImageObject()
            ->encode('png');

        //$filename = 'avatars/' . $user->id . '.png';
        $filename=User::AVATAR_PATH."/".$user->id.".png";
        Storage::disk('public')->put($filename, (string) $avatar);

        $user->avatar = $filename;
        $user->save();


        // $name=$user->first_name;
        // if(!empty($user->last_name))
        // {
        //     $name.=" ".$user->last_name;
        // }
        // $save=Storage::disk('public')->path(User::AVATAR_PATH."/".$user->id.".png");
        // Avatar::create($name)->save($save);
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


              // Générer l'avatar à partir des initiales du nom + prénom
                $initials = $this->getInitials($user);

                $avatar = Avatar::create($initials)
                    ->background('#0ea5e9')
                    ->color('#ffffff')
                    ->size(100)
                    ->rounded()
                    ->getImageObject()
                    ->encode('png');

                //$filename = 'avatars/' . $user->id . '.png';
                $filename=User::AVATAR_PATH."/".$user->id.".png";
                Storage::disk('public')->put($filename, (string) $avatar);

                $user->avatar = $filename;
                $user->save();

            // $name=$user->first_name;
            // if(!empty($user->last_name))
            // {
            //     $name.=" ".$user->last_name;
            // }
            // $save=Storage::disk('public')->path(User::AVATAR_PATH."/".$user->id.".png");
            // Avatar::create($name)->save($save);
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


    /**
     * Récupère les initiales du prénom/nom
     */
    protected function getInitials(User $user): string
    {
        $lastInitial = $user->last_name ? mb_substr($user->last_name, 0, 1) : '';
        $firstInitial = $user->first_name ? mb_substr($user->first_name, 0, 1) : '';

        // On met en majuscule et on concatène (nom + prénom)
        return mb_strtoupper(trim($lastInitial . $firstInitial));
    }
}
