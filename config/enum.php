<?php
/*
|--------------------------------------------------------------------------
| ENUM CHOICES
|--------------------------------------------------------------------------
| - NEED SEPARATE ENUM LABEL FOR 'UNIT STATUS'
*/

return [
    'unit_type' => ['residential', 'commercial'],
    'unit_status' => ['occupied_by_tenant', 'occupied_by_owner', 'occupied_by_spa', 'repossessed', 'reopen', 'eelhi'],
    'owner_title' => ['mr', 'ms', 'mrs'],
    'owner_gender' => ['male', 'female'],
    'owner_residency_status' => ['owner', 'reopen', 'repossessed', 'eelhi']
];

?>