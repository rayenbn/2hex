<?php

namespace App\Models\Session\Enum;

use App\Classes\Enum\AbstractEnum;

/**
 * Class Type
 * @package App\Models\Session\Enum
 */
class Type extends AbstractEnum
{
    // Grips
    const SAVE_GRIP = 'Save Grip';
    const SAVE_GRIP_BATCH = 'Save Grip to Batch';
    const DELETE_GRIP = 'Delete Grip';
    // Orders
    const SAVE_ORDER = 'Save Order';
    const SAVE_ORDER_BATCH = 'Save Order to Batch';
    const DELETE_ORDER = 'Delete Order';
    // Wheels
    const SAVE_WHEEL = 'Save Wheel';
    const UPDATE_WHEEL = 'Update Wheel';
    const SAVE_WHEEL_BATCH = 'Save Wheel To Batch';
    const DELETE_WHEEL = 'Delete Wheel';

    // Heat Transfer
    const SAVE_HEAT_TRANSFER = 'Save Heat Transfer';
    const DELETE_HEAT_TRANSFER = 'Delete Heat Transfer';
    const SAVE_HEAT_TRANSFER_BATCH = 'Save Heat Transfer To Batch';

    // Other
    const UPLOAD = 'Upload';
    const CLICKED = 'clicked';
    const LOGIN = 'login';
}