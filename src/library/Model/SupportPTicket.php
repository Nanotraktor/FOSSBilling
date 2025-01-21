<?php

/**
 * Copyright 2022-2024 FOSSBilling
 * Copyright 2011-2021 BoxBilling, Inc.
 * SPDX-License-Identifier: Apache-2.0.
 *
 * @copyright FOSSBilling (https://www.fossbilling.org)
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache-2.0
 */
class Model_SupportPTicket extends RedBeanPHP\SimpleModel
{
    final public const OPENED = 'open';
    final public const ONHOLD = 'on_hold';
    final public const CLOSED = 'closed';
}
