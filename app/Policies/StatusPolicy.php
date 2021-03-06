<?php

namespace App\Policies;

use App\Models\Status;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Log;

class StatusPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function destroy(User $currentUser, Status $status)
    {
        return $currentUser->id === $status->user_id;
    }

    public function update(User $currentUser, Status $status)
    {
        return $currentUser->id === $status->user_id;
    }
}
