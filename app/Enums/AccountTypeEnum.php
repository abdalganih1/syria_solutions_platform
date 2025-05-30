<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * Enum for different account types.
 *
 * @method static static Individual()
 * @method static static Organization()
 * @method static static Admin()
 */
final class AccountTypeEnum extends Enum
{
    // استخدم القيم النصية نفسها الموجودة في قاعدة البيانات
    const Individual = 'individual';
    const Organization = 'organization';
    const Admin = 'admin';

    // يمكنك إضافة تسميات ودية إذا أردت
    public static function getLabels(): array
    {
        return [
            self::Individual => 'Individual User',
            self::Organization => 'Organization Account',
            self::Admin => 'Administrator Account',
        ];
    }

    // مثال للحصول على تسمية ودية
    public function getLabel(): string
    {
        return self::getLabels()[$this->value] ?? $this->description;
    }
}