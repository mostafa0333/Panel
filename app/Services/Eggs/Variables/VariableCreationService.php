<?php
/**
 * Pterodactyl - Panel
 * Copyright (c) 2015 - 2017 Dane Everitt <dane@daneeveritt.com>.
 *
 * This software is licensed under the terms of the MIT license.
 * https://opensource.org/licenses/MIT
 */

namespace Pterodactyl\Services\Eggs\Variables;

use Pterodactyl\Models\EggVariable;
use Pterodactyl\Contracts\Repository\EggVariableRepositoryInterface;
use Pterodactyl\Exceptions\Service\Egg\Variable\ReservedVariableNameException;

class VariableCreationService
{
    /**
     * @var \Pterodactyl\Contracts\Repository\EggVariableRepositoryInterface
     */
    protected $repository;

    /**
     * VariableCreationService constructor.
     *
     * @param \Pterodactyl\Contracts\Repository\EggVariableRepositoryInterface $repository
     */
    public function __construct(EggVariableRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Create a new variable for a given Egg.
     *
     * @param int   $egg
     * @param array $data
     * @return \Pterodactyl\Models\EggVariable
     *
     * @throws \Pterodactyl\Exceptions\Model\DataValidationException
     * @throws \Pterodactyl\Exceptions\Service\Egg\Variable\ReservedVariableNameException
     */
    public function handle(int $egg, array $data): EggVariable
    {
        if (in_array(strtoupper(array_get($data, 'env_variable')), explode(',', EggVariable::RESERVED_ENV_NAMES))) {
            throw new ReservedVariableNameException(sprintf(
                'Cannot use the protected name %s for this environment variable.',
                array_get($data, 'env_variable')
            ));
        }

        $options = array_get($data, 'options', []);

        return $this->repository->create(array_merge($data, [
            'egg_id' => $egg,
            'user_viewable' => in_array('user_viewable', $options),
            'user_editable' => in_array('user_editable', $options),
        ]));
    }
}
