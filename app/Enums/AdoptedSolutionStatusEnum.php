<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static UnderConsideration()
 * @method static static Adopted()
 * @method static static ImplementationInProgress()
 * @method static static ImplementationCompleted()
 * @method static static RejectedByOrganization()
 */
final class AdoptedSolutionStatusEnum extends Enum
{
    const UnderConsideration =   'UnderConsideration';
    const Adopted =   'Adopted';
    const ImplementationInProgress =   'ImplementationInProgress';
    const ImplementationCompleted =   'ImplementationCompleted';
    const RejectedByOrganization =   'RejectedByOrganization';
}