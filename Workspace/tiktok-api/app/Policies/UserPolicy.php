<?
 namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $admin)
    {
        return $admin->isAdmin();
    }

    public function view(User $admin, User $user)
    {
        return $admin->isAdmin() || $admin->id === $user->id;
    }

    public function create(User $admin)
    {
        return $admin->isAdmin();
    }

    public function update(User $admin, User $user)
    {
        return $admin->isAdmin() && $admin->id !== $user->id;
    }

    public function delete(User $admin, User $user)
    {
        return $admin->isAdmin() && $admin->id !== $user->id;
    }
}
