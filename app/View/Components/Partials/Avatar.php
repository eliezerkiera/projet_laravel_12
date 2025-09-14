<?php

namespace App\View\Components\Partials;

use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Avatar extends Component
{
    public User $user;
    public string $size;

    /**
     * Crée une nouvelle instance du composant.
     */
    public function __construct(User $user, string $size = '16')
    {
        $this->user = $user;
        $this->size = $size;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.partials.avatar');
    }
}
