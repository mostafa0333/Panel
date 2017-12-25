<?php
/**
 * Pterodactyl - Panel
 * Copyright (c) 2015 - 2017 Dane Everitt <dane@daneeveritt.com>.
 *
 * This software is licensed under the terms of the MIT license.
 * https://opensource.org/licenses/MIT
 */

namespace Pterodactyl\Contracts\Repository;

interface PluginRepositoryInterface extends RepositoryInterface
{
    /**
     * Enable a plugin on a server
     *
     * @param int $server
     * @param int $id
     * @return int
     */
    public function enablePlugin($server, $id);

    /**
     * Disable a plugin on a server
     *
     * @param int $server
     * @param int $id
     * @return int
     */
    public function disablePlugin($server, $id);

    /**
     * Return all of the plugins enabled/disabled state for a specific server.
     *
     * @param int $server
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getPluginStatesForServer($server);

    /**
     * Return all of the plugins enabled/disabled state for a specific server.
     *
     * @param int $server
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getConfigData($plugin);
}
