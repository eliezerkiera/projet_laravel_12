<?php

namespace App\Policies;

use App\Models\Market\MarketCollection;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class MarketCollectionPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, MarketCollection $marketCollection): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, MarketCollection $marketCollection): bool
    {
         return $user->id === $marketCollection->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, MarketCollection $marketCollection): bool
    {
         return $user->id === $marketCollection->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, MarketCollection $marketCollection): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, MarketCollection $marketCollection): bool
    {
        return false;
    }
}
