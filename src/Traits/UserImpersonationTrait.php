<?php

namespace Pentangle\LaravelBackpackImpersonationAddon\Traits;

use Lab404\Impersonate\Models\Impersonate;

trait UserImpersonationTrait
{
    use Impersonate;

    /**
     * @return bool
     */
    public function canImpersonate()
    {
        return true;
    }

    /**
     * @return bool
     */
    public function canBeImpersonated()
    {
        return true;
    }

    public function impersonateButton($crud = false)
    {
        return '<a href="'.route("impersonate", $this->id).'">Impersonate this user</a>';
    }
}
