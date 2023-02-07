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
    'owner_residency_status' => ['owner', 'reopen', 'repossessed', 'eelhi'],
    'tenant_occupant_type' => ['tenant', 'immediate_family', 'authorized_representative'],
    'ticket_status' => ['new', 'ongoing', 'solved', 'cancelled'],
    'task_stage' => ['open', 'ongoing', 'completed'],
    'leave_status' => ['pending', 'approved', 'rejected'],
    'payment_status' => ['pending', 'paid', 'rejected'],
    'vehicles' => ['car', 'motorcycle', 'bike', 'b-slot'],
];

?>