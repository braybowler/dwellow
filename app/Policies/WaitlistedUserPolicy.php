<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\WaitlistedUser;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Foundation\Auth\User as AuthUser;

class WaitlistedUserPolicy
{
    use HandlesAuthorization;

    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:WaitlistedUser');
    }

    public function view(AuthUser $authUser, WaitlistedUser $waitlistedUser): bool
    {
        return $authUser->can('View:WaitlistedUser');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:WaitlistedUser');
    }

    public function update(AuthUser $authUser, WaitlistedUser $waitlistedUser): bool
    {
        return $authUser->can('Update:WaitlistedUser');
    }

    public function delete(AuthUser $authUser, WaitlistedUser $waitlistedUser): bool
    {
        return $authUser->can('Delete:WaitlistedUser');
    }

    public function restore(AuthUser $authUser, WaitlistedUser $waitlistedUser): bool
    {
        return $authUser->can('Restore:WaitlistedUser');
    }

    public function forceDelete(AuthUser $authUser, WaitlistedUser $waitlistedUser): bool
    {
        return $authUser->can('ForceDelete:WaitlistedUser');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:WaitlistedUser');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:WaitlistedUser');
    }

    public function replicate(AuthUser $authUser, WaitlistedUser $waitlistedUser): bool
    {
        return $authUser->can('Replicate:WaitlistedUser');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:WaitlistedUser');
    }

}
