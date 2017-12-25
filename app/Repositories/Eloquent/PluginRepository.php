<?php
/**
 * Pterodactyl - Panel
 * Copyright (c) 2015 - 2017 Dane Everitt <dane@daneeveritt.com>.
 *
 * This software is licensed under the terms of the MIT license.
 * https://opensource.org/licenses/MIT
 */

namespace Pterodactyl\Repositories\Eloquent;

use Pterodactyl\Models\Plugin;
use Pterodactyl\Contracts\Repository\PluginRepositoryInterface;

class PluginRepository extends EloquentRepository implements PluginRepositoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function model()
    {
        return Plugin::class;
    }

    /**
     * {@inheritdoc}
     */
    public function enablePlugin($server, $id)
    {
		$this->updateOrCreate('id', $id);
        return $this->getBuilder()->where('id', $id)->update(['server_id' => $server]);
    }

    /**
     * {@inheritdoc}
     */
    public function disablePlugin($server, $id)
    {
        return $this->getBuilder()->where('id', $id)->delete(['server_id' => $server]);
    }

    /**
     * {@inheritdoc}
     */
    public function getPluginStatesForServer($server)
    {
        return $this->getBuilder()->leftJoin('server_plugins', function($join) use($server)
															   {
																   $join->on('plugins.id', '=', 'server_plugins.plugin_id');
																   $join->where('server_plugins.server_id', '=', $server);
															   })->orderBy('plugins.name')->get();
    }

    /**
     * {@inheritdoc}
     */
    public function getConfigData($plugin)
    {
        return $this->getBuilder()->leftJoin('server_plugins', function($join) use($plugin)
															   {
																   $join->on('plugins.id', '=', 'server_plugins.plugin_id');
																   $join->where('server_plugins.plugin_id', '=', $plugin);
															   })->get();
    }
}
