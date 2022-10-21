<?php

namespace App\Core;

enum AlertStatus
{
    case SUCCESS;
    case DANGER;
    case WARNING;

    public function getStatus(): string
    {
        return match ($this) {
            AlertStatus::SUCCESS => 'success',
            AlertStatus::DANGER => 'danger',
            AlertStatus::WARNING => 'warning',
        };
    }
}