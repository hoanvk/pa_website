<?php

namespace App\Policies;

use App\User;
use App\Models\Master\Agent;
use Illuminate\Auth\Access\HandlesAuthorization;

class AgentPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any agents.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the agent.
     *
     * @param  \App\User  $user
     * @param  \App\Agent  $agent
     * @return mixed
     */
    public function view(User $user, Agent $agent)
    {
        //
    }

    /**
     * Determine whether the user can create agents.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the agent.
     *
     * @param  \App\User  $user
     * @param  \App\Agent  $agent
     * @return mixed
     */
    public function update(User $user, Agent $agent)
    {
        //
    }

    /**
     * Determine whether the user can delete the agent.
     *
     * @param  \App\User  $user
     * @param  \App\Agent  $agent
     * @return mixed
     */
    public function delete(User $user, Agent $agent)
    {
        //
    }

    /**
     * Determine whether the user can restore the agent.
     *
     * @param  \App\User  $user
     * @param  \App\Agent  $agent
     * @return mixed
     */
    public function restore(User $user, Agent $agent)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the agent.
     *
     * @param  \App\User  $user
     * @param  \App\Agent  $agent
     * @return mixed
     */
    public function forceDelete(User $user, Agent $agent)
    {
        //
    }
}
