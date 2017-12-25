<?php
/**
 * Pterodactyl - Panel
 * Copyright (c) 2015 - 2017 Dane Everitt <dane@daneeveritt.com>.
 *
 * This software is licensed under the terms of the MIT license.
 * https://opensource.org/licenses/MIT
 */

namespace Pterodactyl\Repositories\Eloquent;

use Pterodactyl\Models\ServerPlugin;
use Pterodactyl\Contracts\Repository\ServerPluginRepositoryInterface;

class ServerPluginRepository extends EloquentRepository implements ServerPluginRepositoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function model()
    {
        return ServerPlugin::class;
    }
}
