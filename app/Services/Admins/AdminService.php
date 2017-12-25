<?php

namespace Pterodactyl\Services\Admins;

use Pterodactyl\Models\Server;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Database\ConnectionInterface;
use Pterodactyl\Contracts\Repository\ServerRepositoryInterface;
use Pterodactyl\Exceptions\Http\Connection\DaemonConnectionException;
use Pterodactyl\Contracts\Repository\Daemon\ServerRepositoryInterface as DaemonRepositoryInterface;

class AdminService
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
     * @var \Pterodactyl\Contracts\Repository\ServerRepositoryInterface
     */
    private $serverRepository;

    /**
     * AdminService constructor.
     *
     * @param \Illuminate\Database\ConnectionInterface                           $connection
     * @param \Pterodactyl\Contracts\Repository\Daemon\ServerRepositoryInterface $daemonRepository
     * @param \Pterodactyl\Contracts\Repository\ServerRepositoryInterface        $serverRepository
     */
    public function __construct(
        ConnectionInterface $connection,
        DaemonRepositoryInterface $daemonRepository,
        ServerRepositoryInterface $serverRepository
    ) {
        $this->connection = $connection;
        $this->daemonRepository = $daemonRepository;
        $this->serverRepository = $serverRepository;
    }

    /**
     * Update the default admin for a server only if that admin is currently
     * assigned to the specified server.
     *
     * @param int|\Pterodactyl\Models\Server $server
     * @param int                            $admin
     * @return \Pterodactyl\Models\Admin
     *
     * @throws \Pterodactyl\Exceptions\Http\Connection\DaemonConnectionException
     * @throws \Pterodactyl\Exceptions\Model\DataValidationException
     * @throws \Pterodactyl\Exceptions\Repository\RecordNotFoundException
     */
    public function handle($server, int $admin): Server
    {
        if (! $server instanceof Server) {
            $server = $this->serverRepository->find($server);
        }

        $admins = $this->repository->get();
        $model = $admins->filter(function ($model) use ($admin) {
            return $model->id === $admin;
        })->first();

        //$this->connection->beginTransaction();
        $this->serverRepository->withoutFresh()->update($server->id, ['admin_id' => $model->id]);

		/*
        // Update on the daemon.
        try {
            $this->daemonRepository->setAccessServer($server->uuid)->setNode($server->node_id)->update([
                'build' => [
                    'default' => [
                        'ip' => $model->ip,
                        'port' => $model->port,
                    ],
                    'ports|overwrite' => $admins->groupBy('ip')->map(function ($item) {
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
