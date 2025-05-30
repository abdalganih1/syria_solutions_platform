<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * Enum for problem urgency levels.
 *
 * @method static static Low()
 * @method static static Medium()
 * @method static static High()
 */
final class ProblemUrgencyEnum extends Enum
{
    // استخدم القيم النصية نفسها الموجودة في قاعدة البيانات
    const Low = 'Low';
    const Medium = 'Medium';
    const High = 'High';

    // يمكنك إضافة ترجمات أو تسميات ودية إذا أردت
    public static function getLabels(): array
    {
        return [
            self::Low => 'Low Urgency',
            self::Medium => 'Medium Urgency',
            self::High => 'High Urgency',
        ];
    }

    // مثال للحصول على تسمية ودية
    public function getLabel(): string
    {
        return self::getLabels()[$this->value] ?? $this->description;
    }
}