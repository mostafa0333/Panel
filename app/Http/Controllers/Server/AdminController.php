<?php

namespace Pterodactyl\Http\Controllers\Server;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Pterodactyl\Http\Controllers\Controller;
use Pterodactyl\Contracts\Extensions\HashidsInterface;
use Pterodactyl\Services\Admins\AdminService;
use Pterodactyl\Traits\Controllers\JavascriptInjection;

class AdminController extends Controller
{
    use JavascriptInjection;

    /**
     * @var \Pterodactyl\Contracts\Extensions\HashidsInterface
     */
    private $hashids;

    /**
     * @var \Pterodactyl\Services\Admins\AdminService
     */
    protected $adminService;

    /**
     * AdminController constructor.
     *
     * @param \Pterodactyl\Contracts\Repository\AdminRepositoryInterface $repository
     * @param \Pterodactyl\Contracts\Extensions\HashidsInterface          $hashids
     * @param \Pterodactyl\Services\Admins\AdminService                 $adminService
     */
    public function __construct(
        HashidsInterface $hashids,
        AdminService $adminService
    ) {
        $this->hashids = $hashids;
        $this->adminService = $adminService;
    }

    /**
     * Displays the admin overview index.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(Request $request): View
    {
        $server = $request->attributes->get('server');
        $this->authorize('list-admins', $server);
        $this->setRequest($request)->injectJavascript();
		
		//$admins = $this->repository->getAdminStatesForServer($server->id);

        return view('server.admins.index', 
			['admins' => [
							(object) ['steamid' => 'STEAM_1:0:18505619', 'flags' => 'abcdefgh', 'immunity' => '100', 'notes' => 'kgns', 'hashid' => 'dasdasd'], 
							(object) ['steamid' => 'STEAM_1:1:67629493', 'flags' => 'abcdefh', 'immunity' => '99', 'notes' => 'relre', 'hashid' => 'dfasdf']
						 ]
			]
		);
    }
}
