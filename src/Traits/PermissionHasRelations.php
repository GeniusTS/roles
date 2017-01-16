<?php

namespace HskyZhou\Roles\Traits;


trait PermissionHasRelations
{

    /**
     * Permission belongs to many roles.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(config('roles.models.role'))->withTimestamps();
    }

    /**
     * Permission belongs to many users.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(config('auth.providers.users.model'))->withTimestamps();
    }

    /**
     * Permission belongs to many permissions.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function prePermissions()
    {
        return $this->belongsToMany(config('roles.models.permission'), 'pre_permissions', 'permission_id', 'pre_permission_id')->withTimestamps();
    }
}
