<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Draft()
 * @method static static Published()
 * @method static static UnderReview()
 * @method static static Hidden()
 * @method static static Suspended()
 * @method static static Resolved()
 * @method static static Archived()
 */
final class ProblemStatusEnum extends Enum
{
    const Draft = 'Draft';
    const Published = 'Published';
    const UnderReview = 'UnderReview';
    const Hidden = 'Hidden';
    const Suspended = 'Suspended';
    const Resolved = 'Resolved';
    const Archived = 'Archived';
}