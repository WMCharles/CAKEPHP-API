<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @since         3.7.0
 * @license       https://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace Cake\TestSuite\Constraint\Response;

/**
 * StatusOk
 *
 * @internal
 */
class StatusOk extends StatusCodeBase
{
    /**
     * @var array<int, int>|int
     */
    protected array|int $code = [200, 204];

    /**
     * Assertion message
     *
     * @return string
     */
    public function toString(): string
    {
        return sprintf('%d is between 200 and 204', $this->response->getStatusCode());
    }
}
