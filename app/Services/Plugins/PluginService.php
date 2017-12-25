<?php

namespace Pterodactyl\Services\Plugins;

use Pterodactyl\Models\Server;
use Pterodactyl\Models\Plugin;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Database\ConnectionInterface;
use Pterodactyl\Contracts\Repository\ServerRepositoryInterface;
use Pterodactyl\Contracts\Repository\PluginRepositoryInterface;
use Pterodactyl\Exceptions\Http\Connection\DaemonConnectionException;
use Pterodactyl\Contracts\Repository\Daemon\ServerRepositoryInterface as DaemonRepositoryInterface;

class PluginService
{
    /**
     * @var \Illuminate\Database\ConnectionInterface
     */
    private $connection;

    /**
     * @var \Pterodactyl\Contracts\Repository\Daemon\ServerRepositoryInterface
     */
    private $daemonRepository;

    /**
     * @var \Pterodactyl\Contracts\Repository\PluginRepositoryInterface
     */
    private $repository;

    /**
     * @var \Pterodactyl\Contracts\Repository\ServerRepositoryInterface
     */
    private $serverRepository;

    /**
     * PluginService constructor.
     *
     * @param \Pterodactyl\Contracts\Repository\PluginRepositoryInterface    $repository
     * @param \Illuminate\Database\ConnectionInterface                           $connection
     * @param \Pterodactyl\Contracts\Repository\Daemon\ServerRepositoryInterface $daemonRepository
     * @param \Pterodactyl\Contracts\Repository\ServerRepositoryInterface        $serverRepository
     */
    public function __construct(
        PluginRepositoryInterface $repository,
        ConnectionInterface $connection,
        DaemonRepositoryInterface $daemonRepository,
        ServerRepositoryInterface $serverRepository
    ) {
        $this->connection = $connection;
        $this->daemonRepository = $daemonRepository;
        $this->repository = $repository;
        $this->serverRepository = $serverRepository;
    }

    /**
     * Update the default plugin for a server only if that plugin is currently
     * assigned to the specified server.
     *
     * @param int|\Pterodactyl\Models\Server $server
     * @param int                            $plugin
     * @return \Pterodactyl\Models\Plugin
     *
     * @throws \Pterodactyl\Exceptions\Http\Connection\DaemonConnectionException
     * @throws \Pterodactyl\Exceptions\Model\DataValidationException
     * @throws \Pterodactyl\Exceptions\Repository\RecordNotFoundException
     */
    public function handle($server, int $plugin): Plugin
    {
        if (! $server instanceof Server) {
            $server = $this->serverRepository->find($server);
        }

        $plugins = $this->repository->get();
        $model = $plugins->filter(function ($model) use ($plugin) {
            return $model->id === $plugin;
        })->first();

        //$this->connection->beginTransaction();
        $this->serverRepository->withoutFresh()->update($server->id, ['plugin_id' => $model->id]);

		/*
        // Update on the daemon.
        try {
            $this->daemonRepository->setAccessServer($server->uuid)->setNode($server->node_id)->update([
                'build' => [
                    'default' => [
                        'ip' => $model->ip,
                        'port' => $model->port,
                    ],
                    'ports|overwrite' => $plugins->groupBy('ip')->map(function ($item) {
                        return $item->pluck('port');
                    })->toArray(),
                ],
            ]);

            $this->connection->commit();
        } catch (RequestException $exception) {
            $this->connection->rollBack();
            throw new DaemonConnectionException($exception);
        }
		*/

        return $model;
    }
}
