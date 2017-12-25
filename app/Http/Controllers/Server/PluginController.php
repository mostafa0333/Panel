<?php

namespace Pterodactyl\Http\Controllers\Server;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Pterodactyl\Http\Controllers\Controller;
use Pterodactyl\Contracts\Extensions\HashidsInterface;
use Pterodactyl\Services\Plugins\PluginService;
use Pterodactyl\Traits\Controllers\JavascriptInjection;
use Pterodactyl\Contracts\Repository\PluginRepositoryInterface;

class PluginController extends Controller
{
    use JavascriptInjection;

    /**
     * @var \Pterodactyl\Contracts\Repository\PluginRepositoryInterface
     */
    protected $repository;

    /**
     * @var \Pterodactyl\Contracts\Extensions\HashidsInterface
     */
    private $hashids;

    /**
     * @var \Pterodactyl\Services\Plugins\PluginService
     */
    protected $pluginService;

    /**
     * PluginController constructor.
     *
     * @param \Pterodactyl\Contracts\Repository\PluginRepositoryInterface $repository
     * @param \Pterodactyl\Contracts\Extensions\HashidsInterface          $hashids
     * @param \Pterodactyl\Services\Plugins\PluginService                 $pluginService
     */
    public function __construct(
        PluginRepositoryInterface $repository,
        HashidsInterface $hashids,
        PluginService $pluginService
    ) {
        $this->repository = $repository;
        $this->hashids = $hashids;
        $this->pluginService = $pluginService;
    }

    /**
     * Displays the plugin overview index.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(Request $request): View
    {
        $server = $request->attributes->get('server');
        $this->authorize('list-plugins', $server);
        $this->setRequest($request)->injectJavascript();
		
		$plugins = $this->repository->getPluginStatesForServer($server->id);

        return view('server.plugins.index', [
            'plugins' => $plugins,
            'plugin_count' => $this->repository->getPluginStatesForServer($server->id),
            'used_plugin_count' => $this->repository->getPluginStatesForServer($server->id),
        ]);
    }

    /**
     * Displays the plugin overview index.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function config(Request $request): View
    {
        $server = $request->attributes->get('server');
        $this->authorize('config-plugins', $server);
		
		$plugin = $this->hashids->decodeFirst($request->input('plugin'), 0);
        $this->setRequest($request)->injectJavascript();

        return view('server.plugins.config', [
			'server' => $server,
            'plugin' => $this->repository->getConfigData($plugin),
        ]);
    }

    /**
     * Handles editing a plugin.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \Pterodactyl\Exceptions\Http\Connection\DaemonConnectionException
     * @throws \Pterodactyl\Exceptions\DisplayException
     * @throws \Pterodactyl\Exceptions\Model\DataValidationException
     * @throws \Pterodactyl\Exceptions\Repository\RecordNotFoundException
     */
    public function update(Request $request): JsonResponse
    {
        $server = $request->attributes->get('server');
        //$this->authorize('edit-allocation', $server);

        $plugin = $this->hashids->decodeFirst($request->input('plugin'), 0);

        $this->pluginService->handle($server->id, $plugin);

        return response()->json();
    }
}
