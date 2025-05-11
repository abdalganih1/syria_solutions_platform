<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).




**شرح حقول قاعدة البيانات النهائية (باللغة العربية):**

سأقوم بشرح الحقول جدولاً تلو الآخر:

**1. جدول `Accounts` (الحسابات):**
   وظيفته الأساسية هي إدارة معلومات تسجيل الدخول وأنواع الحسابات والنقاط.
   *   `id`: رقم تسلسلي فريد لكل حساب (مفتاح أساسي).
   *   `username`: اسم المستخدم، يجب أن يكون فريدًا وغير فارغ.
   *   `email`: البريد الإلكتروني للمستخدم، يجب أن يكون فريدًا وغير فارغ.
   *   `password_hash`: تجزئة كلمة المرور (لتخزينها بشكل آمن).
   *   `account_type`: نوع الحساب (فردي، منظمة، مسؤول)، باستخدام قيم محددة مسبقًا (ENUM).
   *   `points`: عدد النقاط التي حصل عليها الحساب (افتراضيًا 0).
   *   `is_active`: يحدد ما إذا كان الحساب نشطًا أم لا (افتراضيًا نشط).
   *   `created_at`: تاريخ ووقت إنشاء الحساب (افتراضيًا الوقت الحالي).
   *   `updated_at`: تاريخ ووقت آخر تعديل للحساب (افتراضيًا الوقت الحالي).

**2. جدول `UserProfiles` (ملفات تعريف المستخدمين الأفراد):**
   يخزن المعلومات الشخصية للمستخدمين الأفراد.
   *   `id`: رقم تسلسلي فريد لكل ملف تعريف مستخدم (مفتاح أساسي).
   *   `account_id`: معرّف الحساب المرتبط بهذا الملف الشخصي (مفتاح خارجي يشير إلى `Accounts.id`، ويجب أن يكون فريدًا لضمان أن لكل حساب ملف شخصي واحد فقط من هذا النوع).
   *   `first_name`: الاسم الأول للمستخدم.
   *   `last_name`: الاسم الأخير للمستخدم.
   *   `phone`: رقم هاتف المستخدم.
   *   `address_id`: معرّف العنوان الخاص بالمستخدم (مفتاح خارجي يشير إلى `Addresses.id`).
   *   `bio`: نبذة تعريفية مختصرة عن المستخدم.

**3. جدول `OrganizationProfiles` (ملفات تعريف المنظمات):**
   يخزن معلومات المنظمات.
   *   `id`: رقم تسلسلي فريد لكل ملف تعريف منظمة (مفتاح أساسي).
   *   `account_id`: معرّف الحساب المرتبط بملف المنظمة (مفتاح خارجي يشير إلى `Accounts.id`، ويجب أن يكون فريدًا).
   *   `name`: اسم المنظمة (غير فارغ).
   *   `address_id`: معرّف عنوان المنظمة (مفتاح خارجي يشير إلى `Addresses.id`).
   *   `info`: معلومات إضافية عن المنظمة.
   *   `website_url`: رابط الموقع الإلكتروني للمنظمة.
   *   `contact_email`: البريد الإلكتروني العام للاتصال بالمنظمة.

**4. جدول `Countries` (الدول):**
   يخزن قائمة الدول.
   *   `id`: رقم تسلسلي فريد لكل دولة (مفتاح أساسي).
   *   `name`: اسم الدولة (فريد وغير فارغ).
   *   `code`: رمز الدولة المختصر (مثل SY لسوريا، فريد).

**5. جدول `Cities` (المدن):**
   يخزن قائمة المدن وربطها بالدول.
   *   `id`: رقم تسلسلي فريد لكل مدينة (مفتاح أساسي).
   *   `name`: اسم المدينة (غير فارغ).
   *   `country_id`: معرّف الدولة التي تنتمي إليها المدينة (مفتاح خارجي يشير إلى `Countries.id`).

**6. جدول `Addresses` (العناوين):**
   يخزن تفاصيل العناوين.
   *   `id`: رقم تسلسلي فريد لكل عنوان (مفتاح أساسي).
   *   `street_address`: تفاصيل عنوان الشارع.
   *   `city_id`: معرّف المدينة التي يقع بها العنوان (مفتاح خارجي يشير إلى `Cities.id`).
   *   `postal_code`: الرمز البريدي.

**7. جدول `ProblemCategories` (فئات المشاكل):**
   يستخدم لتصنيف المشاكل.
   *   `id`: رقم تسلسلي فريد لكل فئة (مفتاح أساسي).
   *   `name`: اسم الفئة (فريد وغير فارغ).
   *   `description`: وصف للفئة.
   *   `parent_category_id`: معرّف الفئة الأم (إذا كانت هناك فئات فرعية، مفتاح خارجي يشير إلى نفس الجدول `ProblemCategories.id`).

**8. جدول `Problems` (المشاكل):**
   يخزن تفاصيل المشاكل المطروحة في المنصة.
   *   `id`: رقم تسلسلي فريد لكل مشكلة (مفتاح أساسي).
   *   `title`: عنوان المشكلة (غير فارغ).
   *   `description`: وصف تفصيلي للمشكلة (غير فارغ).
   *   `submitted_by_account_id`: معرّف الحساب الذي قام بطرح المشكلة (مفتاح خارجي يشير إلى `Accounts.id`).
   *   `category_id`: معرّف فئة المشكلة (مفتاح خارجي يشير إلى `ProblemCategories.id`).
   *   `urgency`: درجة إلحاح المشكلة (منخفض، متوسط، عالي) باستخدام ENUM.
   *   `status`: حالة المشكلة (مسودة، منشورة، قيد المراجعة، إلخ) باستخدام ENUM.
   *   `tags`: كلمات مفتاحية أو وسوم للمشكلة (نص، يمكن فصلها بفواصل).
   *   `created_at`: تاريخ ووقت إنشاء المشكلة.
   *   `updated_at`: تاريخ ووقت آخر تعديل للمشكلة.

**9. جدول `Comments` (التعليقات):**
   يخزن التعليقات التي يدلي بها المستخدمون على المشاكل.
   *   `id`: رقم تسلسلي فريد لكل تعليق (مفتاح أساسي).
   *   `content`: محتوى التعليق (غير فارغ).
   *   `author_account_id`: معرّف حساب كاتب التعليق (مفتاح خارجي يشير إلى `Accounts.id`).
   *   `problem_id`: معرّف المشكلة التي يرتبط بها التعليق (مفتاح خارجي يشير إلى `Problems.id`).
   *   `parent_comment_id`: معرّف التعليق الأصلي إذا كان هذا التعليق ردًا على تعليق آخر (مفتاح خارجي يشير إلى `Comments.id` في نفس الجدول، لإنشاء سلاسل تعليقات).
   *   `total_votes`: إجمالي عدد الأصوات على التعليق (افتراضيًا 0، يتم تحديثه عبر التطبيق أو المشغلات).
   *   `created_at`: تاريخ ووقت إنشاء التعليق.
   *   `updated_at`: تاريخ ووقت آخر تعديل للتعليق.

**10. جدول `CommentVotes` (تصويتات التعليقات):**
    لتسجيل تصويتات المستخدمين على التعليقات.
    *   `id`: رقم تسلسلي فريد لكل تصويت (مفتاح أساسي).
    *   `comment_id`: معرّف التعليق الذي تم التصويت عليه (مفتاح خارجي يشير إلى `Comments.id`).
    *   `voter_account_id`: معرّف حساب المستخدم الذي قام بالتصويت (مفتاح خارجي يشير إلى `Accounts.id`).
    *   `vote_value`: قيمة التصويت (+1 للإعجاب، -1 لعدم الإعجاب). يجب إضافة قيد (CHECK) لضمان أن القيمة هي 1 أو -1.
    *   `created_at`: تاريخ ووقت إجراء التصويت.
    *   **قيد فريد**: يجب أن يكون هناك قيد فريد على (`comment_id`, `voter_account_id`) لضمان أن المستخدم يصوت مرة واحدة فقط على كل تعليق.

**11. جدول `Solutions` (الحلول المعتمدة):**
    يمثل التعليقات التي تم اعتمادها كحلول من قبل المنظمات.
    *   `id`: رقم تسلسلي فريد لكل حل معتمد (مفتاح أساسي).
    *   `comment_id`: معرّف التعليق الذي تم اعتماده كحل (مفتاح خارجي يشير إلى `Comments.id`، ويجب أن يكون فريدًا لأن التعليق الواحد يمكن اعتماده كحل مرة واحدة فقط).
    *   `adopting_organization_profile_id`: معرّف ملف المنظمة التي اعتمدت هذا التعليق كحل (مفتاح خارجي يشير إلى `OrganizationProfiles.id`).
    *   `status`: حالة الحل المعتمد (قيد الدراسة، معتمد، قيد التنفيذ، إلخ) باستخدام ENUM.
    *   `organization_notes`: ملاحظات داخلية من المنظمة حول هذا الحل المعتمد.
    *   `created_at`: تاريخ ووقت اعتماد التعليق كحل.
    *   `updated_at`: تاريخ ووقت آخر تعديل لحالة الحل المعتمد.

**12. جدول `Badges` (الألقاب/الشارات):**
    يُعرّف الألقاب المختلفة التي يمكن للمستخدمين الحصول عليها.
    *   `id`: رقم تسلسلي فريد لكل لقب (مفتاح أساسي).
    *   `name`: اسم اللقب (فريد وغير فارغ).
    *   `description`: وصف اللقب.
    *   `image_url`: رابط صورة اللقب.
    *   `required_adopted_comments_count`: عدد التعليقات التي يجب أن يعتمدها المستخدم كحلول للحصول على هذا اللقب (افتراضيًا 0).
    *   `required_points`: الحد الأدنى من النقاط المطلوبة للحصول على هذا اللقب (افتراضيًا 0).
    *   `created_at`: تاريخ ووقت إنشاء اللقب.

**13. جدول `AccountBadges` (ألقاب الحسابات):**
    يربط الحسابات بالألقاب التي حصلوا عليها.
    *   `id`: رقم تسلسلي فريد (مفتاح أساسي).
    *   `account_id`: معرّف الحساب الحاصل على اللقب (مفتاح خارجي يشير إلى `Accounts.id`).
    *   `badge_id`: معرّف اللقب الذي تم الحصول عليه (مفتاح خارجي يشير إلى `Badges.id`).
    *   `awarded_at`: تاريخ ووقت منح اللقب.
    *   **قيد فريد**: يجب أن يكون هناك قيد فريد على (`account_id`, `badge_id`) لضمان أن الحساب يحصل على اللقب مرة واحدة فقط.

**14. جدول `OrganizationCategoryInterests` (اهتمامات المنظمات بالفئات - اختياري):**
    جدول وسيط إذا أرادت المنظمات متابعة فئات معينة من المشاكل.
    *   `organization_profile_id`: معرّف ملف المنظمة (مفتاح خارجي يشير إلى `OrganizationProfiles.id`).
    *   `problem_category_id`: معرّف فئة المشكلة (مفتاح خارجي يشير إلى `ProblemCategories.id`).
    *   **مفتاح أساسي مركب**: (`organization_profile_id`, `problem_category_id`).

---

**المقارنة بين القاعدة المقترحة سابقاً (من الصورة) والقاعدة النهائية المحسّنة:**

| الميزة/الجدول        | القاعدة الأصلية (من الصورة)                                  | القاعدة النهائية المحسّنة                                                                                                                              | سبب التعديل والتحسين                                                                                                                                                              |
| :------------------- | :------------------------------------------------------------ | :------------------------------------------------------------------------------------------------------------------------------------------------------ | :-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| **إدارة المستخدمين** | `Users` (Fname, Lname, Adress_id, ...) و `Accoounts` (Email, Password, Username, Type) | `Accounts` (للدخول، النوع، النقاط) و `UserProfiles` (لبيانات الأفراد) و `OrganizationProfiles` (لبيانات المنظمات).                                     | **فصل الاهتمامات**: `Accounts` مركزي للدخول وتحديد نوع الحساب والنقاط. الجداول الأخرى لتفاصيل الملف الشخصي حسب النوع (فرد/منظمة). هذا أكثر مرونة وقابلية للتوسع.             |
| **العناوين**          | `Adress_id` في `Users`، و `Address` كحقل نصي في `Organaization`. جداول منفصلة `Countries`, `cities`, `Address`. | `Countries`, `Cities`, `Addresses` (جداول منفصلة ومنظمة)، ثم ربط `UserProfiles` و `OrganizationProfiles` بها عبر `address_id`.                     | **التوحيد القياسي (Normalization)**: يقلل تكرار البيانات ويحسن تكاملها. يسهل البحث عن المستخدمين/المنظمات حسب الموقع الجغرافي.                                                 |
| **المشاكل**           | `Problems` (كان يتضمن Organaization_id، Urgence, States)         | `Problems` (يحتوي على `submitted_by_account_id`، `category_id`، `urgency`، `status` باستخدام ENUMs).                                                   | **وضوح أكبر**: `submitted_by_account_id` يوضح من قدم المشكلة (فرد/منظمة/مسؤول). استخدام `ENUMs` لقيم محددة (مثل الإلحاح والحالة) يحسن من سلامة البيانات.                           |
| **الحلول (Solutions)** | `Solutions` (كان يتضمن Comment_id, Organaization_id, States)     | `Solutions` (أصبح يمثل تعليقًا معتمدًا من منظمة: `comment_id`, `adopting_organization_profile_id`, `status` باستخدام ENUM).                               | **إعادة تعريف المفهوم**: بناءً على طلبك، "الحل" لم يعد كيانًا منفصلاً يقدمه المستخدم بمرفقات. بل هو "تعليق" مميز تتبناه منظمة. هذا يبسط الفكرة ويجعلها متوافقة مع سير العمل الجديد. |
| **مرفقات الحلول**     | (لم يكن واضحًا تمامًا، ولكن الفكرة الأولى تضمنت إمكانية وجود مرفقات للحلول) | **تمت إزالتها** من جدول `Solutions` (الجديد).                                                                                                           | **تبسيط الفكرة**: بناءً على طلبك، تم إلغاء فكرة المرفقات مع "الحلول" لأن الحلول أصبحت تعليقات معتمدة.                                                                       |
| **التصويت**           | `Votinguser` (كان مخصصًا للتصويت على التعليقات Id_comment)        | `CommentVotes` (مخصص للتصويت على التعليقات، يربط `comment_id` بـ `voter_account_id` وقيمة التصويت).                                                      | **توضيح آلية التصويت**: أصبح التصويت الآن على التعليقات بشكل واضح مشابه لـ StackOverflow. جدول `CommentVotes` يخدم هذا الغرض بدقة. تم إلغاء التصويت على "الحلول" (القديمة).        |
| **التعليقات**         | `Comments` (كان يتضمن Problem_id, User_id)                      | `Comments` (يتضمن `author_account_id`, `problem_id`, `parent_comment_id` للردود المتسلسلة, `total_votes` لجمع الأصوات).                                | **تحسينات**: `author_account_id` أوضح. `parent_comment_id` يسمح بتعليقات متداخلة. `total_votes` لسهولة عرض عدد الأصوات على التعليق.                                             |
| **الألقاب**           | `الألقاب` (Id, Name_اسم اللقب, Img_url, Count_of_solutions, Timestaps) | `Badges` (لتعريف الألقاب ومعاييرها مثل `required_adopted_comments_count` و `required_points`) و `AccountBadges` (لربط الحسابات بالألقاب المكتسبة).         | **هيكلة أفضل**: فصل تعريف الألقاب عن عملية منحها للمستخدمين. `Badges.required_adopted_comments_count` يحدد بوضوح عدد الحلول (التعليقات المعتمدة) المطلوبة للحصول على اللقب.      |
| **المنظمات**          | `Organaization` (كان يتضمن Account_id, Name, Address, Category_id, Info, Url) | `OrganizationProfiles` (يرتبط بـ `Accounts`، ويتضمن `name`, `address_id`, `info`, `website_url`, `contact_email`).                                  | **تكامل أفضل**: يندرج تحت نظام `Accounts` العام، مع فصل بياناته التعريفية.                                                                                                      |
| **أنواع الحقول**      | استخدام أنواع عامة في بعض الأحيان.                              | استخدام `ENUM` للحالات والأنواع، `timestamp` للتاريخ والوقت، `boolean` للقيم المنطقية.                                                              | **دقة البيانات**: استخدام أنواع بيانات أكثر تحديدًا يحسن من سلامة البيانات ويجعل الاستعلامات أكثر كفاءة.                                                                        |
| **التسميات**          | بعض التسميات كانت بالإنجليزية وبعضها غير متناسق (مثل Adress_id). | تسميات موحدة باللغة الإنجليزية (convention) باستخدام snake_case (مثل `account_id`).                                                                 | **الاتساق والوضوح**: يسهل فهم القاعدة والتعامل معها برمجيًا.                                                                                                                     |

**التحسينات النهائية وأسبابها:**

1.  **نمذجة أوضح للعلاقة بين الحسابات والملفات الشخصية:**
    *   **السبب:** القاعدة الأصلية كانت تدمج جزئيًا معلومات الحساب مع معلومات المستخدم. الفصل إلى `Accounts` (لبيانات الدخول المشتركة) و `UserProfiles`/`OrganizationProfiles` (للبيانات الخاصة بكل نوع) يوفر مرونة أكبر إذا أردت إضافة أنواع أخرى من الملفات الشخصية مستقبلاً، ويجعل هيكل البيانات أنظف.

2.  **إعادة تعريف "الحلول" لتناسب متطلبات المشروع المحدثة:**
    *   **السبب:** بناءً على طلبك، لم تعد "الحلول" كيانات مستقلة يتم إنشاؤها من الصفر مع مرفقات. بدلاً من ذلك، أصبحت "الحلول" عبارة عن تعليقات بارزة تختارها المنظمات وتتبناها. هذا التعديل يبسط آلية العمل ويجعلها تتركز حول التفاعل مع التعليقات.

3.  **نظام تصويت مركّز على التعليقات:**
    *   **السبب:** يتماشى هذا مع آلية عمل منصات مثل StackOverflow التي أشرت إليها، حيث يتم تقييم المساهمات (التعليقات في حالتنا) من قبل المجتمع.

4.  **هيكلة محسنة للألقاب (Badges):**
    *   **السبب:** فصل تعريف اللقب (`Badges`) عن عملية منح اللقب للمستخدم (`AccountBadges`) هو ممارسة جيدة في تصميم قواعد البيانات (Normalization). إضافة حقل `required_adopted_comments_count` و `required_points` في جدول `Badges` يجعل معايير الحصول على اللقب واضحة ومباشرة.

5.  **توحيد قياسي للعناوين:**
    *   **السبب:** استخدام جداول منفصلة للدول والمدن والعناوين التفصيلية يمنع تكرار البيانات ويسهل عمليات البحث والتصفية بناءً
        على الموقع.

6.  **استخدام أنواع بيانات دقيقة (ENUMs، Timestamps):**
    *   **السبب:** يضمن سلامة البيانات ويجعلها ذات معنى أكبر. مثلاً، حقل `status` بقيم ENUM أفضل من حقل نصي يمكن أن يحتوي على قيم خاطئة.

7.  **تسميات متناسقة وواضحة للحقول والجداول:**
    *   **السبب:** يسهل على المطورين فهم بنية القاعدة والتعامل معها.

بشكل عام، القاعدة النهائية أصبحت أكثر تنظيماً، وأكثر مرونة، وأكثر تماشياً مع المتطلبات المحددة لمشروعك، مع التركيز على تبسيط بعض المفاهيم الأولية وجعل آلية العمل أكثر وضوحًا.






أهلاً بك! يسعدني مساعدتك في بناء مشروعك باستخدام Laravel بناءً على تصميم قاعدة البيانات الذي قدمته. سنتخذ الخطوات بشكل متسلسل، بدءًا من الإعداد الأولي وحتى تجهيز ملفات الهجرة والنماذج.

**الخطوة الأولى: إنشاء مشروع Laravel**

للبدء، سنقوم بإنشاء مشروع Laravel جديد. تأكد من تثبيت PHP و Composer على نظامك. افتح سطر الأوامر أو Terminal وانتقل إلى المجلد الذي تريد إنشاء المشروع فيه، ثم نفّذ الأمر التالي:

```bash
composer create-project laravel/laravel syria-reconstruction-platform
```

سيقوم هذا الأمر بإنشاء مجلد جديد باسم `syria-reconstruction-platform` يحتوي على بنية مشروع Laravel الأساسية.

**الخطوة الثانية: إعداد قاعدة البيانات وملف البيئة**

بعد إنشاء المشروع، ادخل إلى مجلد المشروع:

```bash
cd syria-reconstruction-platform
```

ستجد ملفًا باسم `.env` في جذر المشروع. هذا الملف يحتوي على إعدادات البيئة الخاصة بمشروعك، بما في ذلك تفاصيل الاتصال بقاعدة البيانات. قم بتحرير هذا الملف باستخدام محرر النصوص المفضل لديك (مثل VS Code, Sublime Text, Nano, etc.).

ابحث عن الأسطر التي تبدأ بـ `DB_` وقم بتعديلها لتناسب إعدادات قاعدة البيانات التي قمت بإنشائها (أو ستقوم بإنشائها لاحقًا) على خادم قاعدة البيانات الخاص بك (عادةً MySQL).

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=syria_reconstruction_db  # اختر اسمًا لقاعدة البيانات الخاصة بمشروعك
DB_USERNAME=your_db_username          # اسم مستخدم قاعدة بياناتك
DB_PASSWORD=your_db_password          # كلمة مرور قاعدة بياناتك
```

تأكد من إنشاء قاعدة البيانات بالاسم الذي اخترته (`syria_reconstruction_db` في هذا المثال) باستخدام أداة إدارة قواعد البيانات الخاصة بك (مثل phpMyAdmin أو DBeaver أو سطر الأوامر).

**الخطوة الثالثة: اختيار أدوات الواجهة والمصادقة (UI & Auth)**

Laravel يوفر عدة خيارات لإعداد نظام المصادقة (تسجيل الدخول، التسجيل، استعادة كلمة المرور).
*   **Laravel UI:** حزمة توفر scaffolding أساسي باستخدام Blade أو Vue/React.
*   **Laravel Breeze:** scaffolding بسيط وأدنى حد ممكن يعتمد على Blade أو Livewire/Alpine.
*   **Laravel Jetstream:** scaffolding أقوى مع ميزات إضافية (إدارة الفرق، التحقق بخطوتين) يعتمد على Livewire/Alpine أو Inertia/Vue.

نظرًا لأن لديك هيكل حسابات مخصص (`Accounts` مع أنواع فرد ومنظمة)، فإن scaffolding التلقائي قد لا يتناسب تمامًا مع هيكلك دون تعديلات كبيرة.

*   إذا كنت مبتدئًا وتريد رؤية كيفية عمل نظام المصادقة بشكل سريع، يمكنك تثبيت Laravel UI واستخدام خيار Auth:
    ```bash
    composer require laravel/ui
    php artisan ui bootstrap --auth  # أو ui vue --auth إذا كنت تفضل Vue للواجهة الأمامية
    npm install && npm run dev
    ```
    **لكن انتبه:** هذا سينشئ جدول `users` افتراضي ونموذج `User` افتراضي. سنحتاج إلى تجاهل هذا الجدول أو إعادة تسميته وتعديل نموذج `User` ليتوافق مع جدول `Accounts` الخاص بك. الخيار الأفضل هو *عدم* استخدام `--auth` في هذه المرحلة والتركيز على بناء جداولك ونماذجك أولاً، ثم بناء المصادقة يدويًا أو تكييف Breeze/Jetstream لاحقًا.

لأغراض هذه الإجابة، سنفترض أننا **لن** نستخدم `--auth` التلقائي مع `laravel/ui` الآن، وسنركز على بناء القاعدة والNodels الخاصة بك. سنبني نظام المصادقة الخاص بك بناءً على جدول `Accounts`.

**الخطوة الرابعة: إنشاء ملفات الهجرة والنماذج (Migrations & Models)**

الآن سنقوم بإنشاء ملفات الهجرة لإنشاء جداول قاعدة البيانات الخاصة بك والنماذج (Models) المرتبطة بها. النماذج في Laravel (Eloquent) هي كائنات تمثل صفوفًا في جداولك وتسمح لك بالتفاعل مع قاعدة البيانات بسهولة.

سنستخدم الأمر `php artisan make:model ModelName -m` لإنشاء النموذج وملف الهجرة المقابل له في نفس الوقت.

*   **ملاحظة حول جدول `users` الافتراضي:** Laravel يأتي مع هجرة افتراضية لجدول `users` ونموذج `User`. بما أن لدينا جدول `Accounts` وهو الأساسي للمصادقة بأنواع مختلفة، فلن نستخدم جدول `users` الافتراضي. يمكنك حذف ملف الهجرة الافتراضي لجدول `users` (عادةً شيء مثل `xxxx_xx_xx_xxxxxx_create_users_table.php`) بعد إنشاء ملفات الهجرة الخاصة بك، أو إعادة تسمية جدول `users` إلى `accounts` وتعديل الهجرة الافتراضية ونموذج `User` ليتطابق مع هيكل جدول `Accounts`. الخيار الثاني (إعادة تسمية وتعديل) هو الأنسب إذا أردت الاستفادة من خصائص المصادقة في Laravel التي تعتمد على نموذج `User` الذي ينفذ الواجهة `Authenticatable`. دعنا نتبع هذا النهج.

1.  **تعديل هجرة `users` الافتراضية ونموذج `User` لـ `Accounts`:**
    *   ابحث عن ملف الهجرة الذي يحتوي على `create_users_table`.
    *   غيّر اسم الجدول إلى `accounts` داخل الهجرة: `$table->string('name');` ليست لدينا، سنحتاج لحذفها واستبدالها بحقول `Accounts`.
    *   غيّر اسم ملف الهجرة نفسه ليعكس أنه لجدول `accounts`.
    *   عدّل نموذج `User` في `app/Models/User.php` ليتوافق مع حقول جدول `Accounts`.

    **الطريقة الأسهل (إعادة تسمية وتعديل):**
    *   عادةً ما يكون اسم ملف الهجرة الافتراضي لجدول `users` هو `YYYY_MM_DD_HHMMSS_create_users_table.php`. غيّر اسمه إلى `YYYY_MM_DD_HHMMSS_create_accounts_table.php`.
    *   افتح ملف الهجرة المعدل (الذي كان لـ `users`) واعدل محتواه ليتناسب مع جدول `Accounts` الخاص بك:

```php
// database/migrations/YYYY_MM_DD_HHMMSS_create_accounts_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id(); // pk, increment integer
            $table->string('username')->unique(); // varchar(255), unique, not null
            $table->string('email')->unique(); // varchar(255), unique, not null
            // Laravel uses 'password' field name for authentication
            $table->string('password'); // varchar(255), not null (password_hash)
            // Using string for ENUM, will validate in application code
            $table->string('account_type'); // not null, enum: individual, organization, admin
            $table->integer('points')->default(0); // integer, default 0, not null
            $table->boolean('is_active')->default(true); // boolean, default true, not null

            // Default Laravel auth fields (optional but good practice if using auth features)
            $table->rememberToken();

            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
```

    *   عدّل نموذج `User` في `app/Models/User.php` ليتناسب مع جدول `accounts`:

```php
// app/Models/User.php (Rename this file to Account.php and the class name to Account)
<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail; // Uncomment if needed later
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Keep Authenticatable trait for auth
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; // Keep if planning to use API tokens

class Account extends Authenticatable // Rename User to Account
{
    use HasApiTokens, HasFactory, Notifiable;

    // Specify the table if the class name doesn't match the pluralized table name (optional here, Account -> accounts matches)
    // protected $table = 'accounts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password', // Note: Laravel uses 'password'
        'account_type',
        'points',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        // Consider adding a cast for account_type if you use an accessor/mutator
        'email_verified_at' => 'datetime', // Keep if using email verification
        'password' => 'hashed', // Added in Laravel 10+ for automatic hashing
        'is_active' => 'boolean',
        'points' => 'integer',
    ];

    // Define relationships

    public function userProfile()
    {
        return $this->hasOne(UserProfile::class);
    }

    public function organizationProfile()
    {
        return $this->hasOne(OrganizationProfile::class);
    }

    public function problems()
    {
        return $this->hasMany(Problem::class, 'submitted_by_account_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'author_account_id');
    }

    public function commentVotes()
    {
        return $this->hasMany(CommentVote::class, 'voter_account_id');
    }

    public function accountBadges()
    {
        return $this->hasMany(AccountBadge::class);
    }

    // Helper method to check account type
    public function isIndividual()
    {
        return $this->account_type === 'individual';
    }

    public function isOrganization()
    {
        return $this->account_type === 'organization';
    }

    public function isAdmin()
    {
        return $this->account_type === 'admin';
    }

    // --- Scopes or other custom methods can go here ---
}
```
    *   أعد تسمية ملف `app/Models/User.php` إلى `app/Models/Account.php`.

2.  **إنشاء باقي الهجرات والنماذج:**
    نفّذ الأوامر التالية لإنشاء باقي النماذج والهجرات:

    ```bash
    php artisan make:model UserProfile -m
    php artisan make:model OrganizationProfile -m
    php artisan make:model Country -m
    php artisan make:model City -m
    php artisan make:model Address -m
    php artisan make:model ProblemCategory -m
    php artisan make:model Problem -m
    php artisan make:model Comment -m
    php artisan make:model CommentVote -m
    php artisan make:model Solution -m # Solution هنا يمثل التعليق المعتمد
    php artisan make:model Badge -m
    php artisan make:model AccountBadge -m
    php artisan make:model OrganizationCategoryInterest -m
    ```

3.  **ملء ملفات الهجرة:**
    افتح كل ملف هجرة تم إنشاؤه في المجلد `database/migrations/` واملأ دالة `up()` لإنشاء الجدول ودالة `down()` لحذف الجدول. تأكد من الترتيب إذا كنت ستنفذ الهجرات دفعة واحدة (التي تحتوي على مفاتيح خارجية يجب أن تأتي بعد الجداول التي تشير إليها). Laravel عادةً ما ينفذها بترتيب زمني.

    *   **`create_user_profiles_table.php`**
    ```php
    // database/migrations/YYYY_MM_DD_HHMMSS_create_user_profiles_table.php
    <?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    return new class extends Migration
    {
        public function up(): void
        {
            Schema::create('user_profiles', function (Blueprint $table) {
                $table->id(); // pk, increment integer
                $table->foreignId('account_id')->unique()->constrained('accounts')->onDelete('cascade'); // unique, not null, ref: > Accounts.id
                $table->string('first_name', 100)->nullable(); // varchar(100)
                $table->string('last_name', 100)->nullable(); // varchar(100)
                $table->string('phone', 30)->nullable(); // varchar(30)
                $table->foreignId('address_id')->nullable()->constrained('addresses')->onDelete('set null'); // ref: > Addresses.id
                $table->text('bio')->nullable(); // text
                $table->timestamps();
            });
        }
        public function down(): void
        {
            Schema::dropIfExists('user_profiles');
        }
    };
    ```

    *   **`create_organization_profiles_table.php`**
    ```php
    // database/migrations/YYYY_MM_DD_HHMMSS_create_organization_profiles_table.php
    <?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    return new class extends Migration
    {
        public function up(): void
        {
            Schema::create('organization_profiles', function (Blueprint $table) {
                $table->id(); // pk, increment integer
                $table->foreignId('account_id')->unique()->constrained('accounts')->onDelete('cascade'); // unique, not null, ref: > Accounts.id
                $table->string('name', 255)->notNull(); // varchar(255), not null
                $table->foreignId('address_id')->nullable()->constrained('addresses')->onDelete('set null'); // ref: > Addresses.id
                $table->text('info')->nullable(); // text
                $table->string('website_url', 255)->nullable(); // varchar(255)
                $table->string('contact_email', 255)->nullable(); // varchar(255)
                $table->timestamps();
            });
        }
        public function down(): void
        {
            Schema::dropIfExists('organization_profiles');
        }
    };
    ```

    *   **`create_countries_table.php`**
    ```php
    // database/migrations/YYYY_MM_DD_HHMMSS_create_countries_table.php
    <?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    return new class extends Migration
    {
        public function up(): void
        {
            Schema::create('countries', function (Blueprint $table) {
                $table->id(); // pk, increment integer
                $table->string('name', 100)->unique(); // varchar(100), unique, not null
                $table->char('code', 2)->unique()->nullable(); // char(2), unique
                $table->timestamps(); // Optional timestamps for static data tables, but harmless
            });
        }
        public function down(): void
        {
            Schema::dropIfExists('countries');
        }
    };
    ```

    *   **`create_cities_table.php`**
    ```php
    // database/migrations/YYYY_MM_DD_HHMMSS_create_cities_table.php
    <?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    return new class extends Migration
    {
        public function up(): void
        {
            Schema::create('cities', function (Blueprint $table) {
                $table->id(); // pk, increment integer
                $table->string('name', 100)->notNull(); // varchar(100), not null
                $table->foreignId('country_id')->constrained('countries')->onDelete('cascade'); // not null, ref: > Countries.id
                $table->timestamps(); // Optional
            });
        }
        public function down(): void
        {
            Schema::dropIfExists('cities');
        }
    };
    ```

    *   **`create_addresses_table.php`**
    ```php
    // database/migrations/YYYY_MM_DD_HHMMSS_create_addresses_table.php
    <?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    return new class extends Migration
    {
        public function up(): void
        {
            Schema::create('addresses', function (Blueprint $table) {
                $table->id(); // pk, increment integer
                $table->string('street_address', 255)->nullable(); // varchar(255)
                $table->foreignId('city_id')->constrained('cities')->onDelete('cascade'); // not null, ref: > Cities.id
                $table->string('postal_code', 20)->nullable(); // varchar(20)
                $table->timestamps(); // Optional
            });
        }
        public function down(): void
        {
            Schema::dropIfExists('addresses');
        }
    };
    ```

    *   **`create_problem_categories_table.php`**
    ```php
    // database/migrations/YYYY_MM_DD_HHMMSS_create_problem_categories_table.php
    <?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    return new class extends Migration
    {
        public function up(): void
        {
            Schema::create('problem_categories', function (Blueprint $table) {
                $table->id(); // pk, increment integer
                $table->string('name', 100)->unique(); // varchar(100), unique, not null
                $table->text('description')->nullable(); // text
                $table->foreignId('parent_category_id')->nullable()->constrained('problem_categories')->onDelete('set null'); // ref: > ProblemCategories.id (self-reference)
                $table->timestamps();
            });
        }
        public function down(): void
        {
            Schema::dropIfExists('problem_categories');
        }
    };
    ```

    *   **`create_problems_table.php`**
    ```php
    // database/migrations/YYYY_MM_DD_HHMMSS_create_problems_table.php
    <?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    return new class extends Migration
    {
        public function up(): void
        {
            Schema::create('problems', function (Blueprint $table) {
                $table->id(); // pk, increment integer
                $table->string('title', 255)->notNull(); // varchar(255), not null
                $table->text('description')->notNull(); // text, not null
                $table->foreignId('submitted_by_account_id')->constrained('accounts')->onDelete('cascade'); // not null, ref: > Accounts.id
                $table->foreignId('category_id')->constrained('problem_categories')->onDelete('cascade'); // not null, ref: > ProblemCategories.id
                // Using string for ENUM: problem_urgency_enum { Low, Medium, High }
                $table->string('urgency')->default('Medium'); // not null, default 'Medium'
                 // Using string for ENUM: problem_status_enum { Draft, Published, UnderReview, Hidden, Suspended, Resolved, Archived }
                $table->string('status')->default('Published'); // not null, default 'Published'
                $table->text('tags')->nullable(); // text
                $table->timestamps();
            });
        }
        public function down(): void
        {
            Schema::dropIfExists('problems');
        }
    };
    ```

    *   **`create_comments_table.php`**
    ```php
    // database/migrations/YYYY_MM_DD_HHMMSS_create_comments_table.php
    <?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    return new class extends Migration
    {
        public function up(): void
        {
            Schema::create('comments', function (Blueprint $table) {
                $table->id(); // pk, increment integer
                $table->text('content')->notNull(); // text, not null
                $table->foreignId('author_account_id')->constrained('accounts')->onDelete('cascade'); // not null, ref: > Accounts.id
                $table->foreignId('problem_id')->constrained('problems')->onDelete('cascade'); // not null, ref: > Problems.id
                $table->foreignId('parent_comment_id')->nullable()->constrained('comments')->onDelete('cascade'); // ref: - Comments.id (self-reference), nullable
                $table->integer('total_votes')->default(0)->notNull(); // integer, default 0, not null
                $table->timestamps();
            });
        }
        public function down(): void
        {
            Schema::dropIfExists('comments');
        }
    };
    ```

    *   **`create_comment_votes_table.php`**
    ```php
    // database/migrations/YYYY_MM_DD_HHMMSS_create_comment_votes_table.php
    <?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    return new class extends Migration
    {
        public function up(): void
        {
            Schema::create('comment_votes', function (Blueprint $table) {
                $table->id(); // pk, increment integer
                $table->foreignId('comment_id')->constrained('comments')->onDelete('cascade'); // not null, ref: > Comments.id
                $table->foreignId('voter_account_id')->constrained('accounts')->onDelete('cascade'); // not null, ref: > Accounts.id
                $table->integer('vote_value')->notNull(); // integer, not null (+1 or -1)
                $table->timestamps(); // Using timestamps() for created_at/updated_at
                // Add unique constraint for composite key
                $table->unique(['comment_id', 'voter_account_id']);
                 // Note: Add CHECK constraint in database for vote_value IN (1, -1)
            });
        }
        public function down(): void
        {
            Schema::dropIfExists('comment_votes');
        }
    };
    ```

    *   **`create_solutions_table.php`**
    ```php
    // database/migrations/YYYY_MM_DD_HHMMSS_create_solutions_table.php
    <?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    return new class extends Migration
    {
        public function up(): void
        {
            Schema::create('solutions', function (Blueprint $table) {
                $table->id(); // pk, increment integer
                $table->foreignId('comment_id')->unique()->constrained('comments')->onDelete('cascade'); // unique, not null, ref: > Comments.id
                $table->foreignId('adopting_organization_profile_id')->constrained('organization_profiles')->onDelete('cascade'); // not null, ref: > OrganizationProfiles.id
                // Using string for ENUM: adopted_solution_status_enum { UnderConsideration, Adopted, ImplementationInProgress, ImplementationCompleted, RejectedByOrganization }
                $table->string('status')->default('UnderConsideration'); // not null, default 'UnderConsideration'
                $table->text('organization_notes')->nullable(); // text
                $table->timestamps();
            });
        }
        public function down(): void
        {
            Schema::dropIfExists('solutions');
        }
    };
    ```

    *   **`create_badges_table.php`**
    ```php
    // database/migrations/YYYY_MM_DD_HHMMSS_create_badges_table.php
    <?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    return new class extends Migration
    {
        public function up(): void
        {
            Schema::create('badges', function (Blueprint $table) {
                $table->id(); // pk, increment integer
                $table->string('name', 100)->unique(); // varchar(100), unique, not null
                $table->text('description')->nullable(); // text
                $table->string('image_url', 255)->nullable(); // varchar(255)
                $table->integer('required_adopted_comments_count')->default(0)->notNull(); // integer, default 0, not null
                $table->integer('required_points')->default(0)->notNull(); // integer, default 0, not null
                $table->timestamps();
            });
        }
        public function down(): void
        {
            Schema::dropIfExists('badges');
        }
    };
    ```

    *   **`create_account_badges_table.php`**
    ```php
    // database/migrations/YYYY_MM_DD_HHMMSS_create_account_badges_table.php
    <?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    return new class extends Migration
    {
        public function up(): void
        {
            Schema::create('account_badges', function (Blueprint $table) {
                $table->id(); // pk, increment integer
                $table->foreignId('account_id')->constrained('accounts')->onDelete('cascade'); // not null, ref: > Accounts.id
                $table->foreignId('badge_id')->constrained('badges')->onDelete('cascade'); // not null, ref: > Badges.id
                $table->timestamp('awarded_at')->useCurrent(); // timestamp, not null, default current time
                // Add unique constraint for composite key
                $table->unique(['account_id', 'badge_id']);
                // No timestamps() here as awarded_at is sufficient
            });
        }
        public function down(): void
        {
            Schema::dropIfExists('account_badges');
        }
    };
    ```

    *   **`create_organization_category_interests_table.php`**
    ```php
    // database/migrations/YYYY_MM_DD_HHMMSS_create_organization_category_interests_table.php
    <?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    return new class extends Migration
    {
        public function up(): void
        {
            Schema::create('organization_category_interests', function (Blueprint $table) {
                $table->foreignId('organization_profile_id')->constrained('organization_profiles')->onDelete('cascade'); // ref: > OrganizationProfiles.id
                $table->foreignId('problem_category_id')->constrained('problem_categories')->onDelete('cascade'); // ref: > ProblemCategories.id
                $table->timestamps(); // Optional

                // Primary key for composite key
                $table->primary(['organization_profile_id', 'problem_category_id']);
            });
        }
        public function down(): void
        {
            Schema::dropIfExists('organization_category_interests');
        }
    };
    ```

4.  **ملء ملفات النماذج (Models):**
    افتح كل ملف نموذج تم إنشاؤه في المجلد `app/Models/` واملأه بالخصائص والعلاقات المناسبة. لقد قمنا بالفعل بتعديل نموذج `Account` (الذي كان `User`). الآن نكمل الباقي.

    *   **`UserProfile.php`**
    ```php
    // app/Models/UserProfile.php
    <?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    class UserProfile extends Model
    {
        use HasFactory;
        protected $fillable = [
            'account_id',
            'first_name',
            'last_name',
            'phone',
            'address_id',
            'bio',
        ];
        public function account()
        {
            return $this->belongsTo(Account::class);
        }
        public function address()
        {
            return $this->belongsTo(Address::class);
        }
    }
    ```

    *   **`OrganizationProfile.php`**
    ```php
    // app/Models/OrganizationProfile.php
    <?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    class OrganizationProfile extends Model
    {
        use HasFactory;
        protected $fillable = [
            'account_id',
            'name',
            'address_id',
            'info',
            'website_url',
            'contact_email',
        ];
        public function account()
        {
            return $this->belongsTo(Account::class);
        }
        public function address()
        {
            return $this->belongsTo(Address::class);
        }
        // Organization adopts Solutions (Comments)
        public function adoptedSolutions()
        {
            return $this->hasMany(Solution::class, 'adopting_organization_profile_id');
        }
         // Organization interests in Problem Categories
        public function categoryInterests()
        {
            return $this->belongsToMany(ProblemCategory::class, 'organization_category_interests', 'organization_profile_id', 'problem_category_id');
        }
    }
    ```

    *   **`Country.php`**
    ```php
    // app/Models/Country.php
    <?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    class Country extends Model
    {
        use HasFactory;
        protected $fillable = [
            'name',
            'code',
        ];
        public function cities()
        {
            return $this->hasMany(City::class);
        }
    }
    ```

    *   **`City.php`**
    ```php
    // app/Models/City.php
    <?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    class City extends Model
    {
        use HasFactory;
        protected $fillable = [
            'name',
            'country_id',
        ];
        public function country()
        {
            return $this->belongsTo(Country::class);
        }
        public function addresses()
        {
            return $this->hasMany(Address::class);
        }
    }
    ```

    *   **`Address.php`**
    ```php
    // app/Models/Address.php
    <?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    class Address extends Model
    {
        use HasFactory;
        protected $fillable = [
            'street_address',
            'city_id',
            'postal_code',
        ];
        public function city()
        {
            return $this->belongsTo(City::class);
        }
        public function userProfiles()
        {
            return $this->hasMany(UserProfile::class);
        }
        public function organizationProfiles()
        {
            return $this->hasMany(OrganizationProfile::class);
        }
    }
    ```

    *   **`ProblemCategory.php`**
    ```php
    // app/Models/ProblemCategory.php
    <?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    class ProblemCategory extends Model
    {
        use HasFactory;
        protected $fillable = [
            'name',
            'description',
            'parent_category_id',
        ];
        public function problems()
        {
            return $this->hasMany(Problem::class, 'category_id');
        }
        public function parent()
        {
            return $this->belongsTo(ProblemCategory::class, 'parent_category_id');
        }
        public function children()
        {
            return $this->hasMany(ProblemCategory::class, 'parent_category_id');
        }
        // Problems categories an Organization is interested in
        public function organizationInterests()
        {
            return $this->belongsToMany(OrganizationProfile::class, 'organization_category_interests', 'problem_category_id', 'organization_profile_id');
        }
    }
    ```

    *   **`Problem.php`**
    ```php
    // app/Models/Problem.php
    <?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    class Problem extends Model
    {
        use HasFactory;
        protected $fillable = [
            'title',
            'description',
            'submitted_by_account_id',
            'category_id',
            'urgency',
            'status',
            'tags',
        ];
        protected $casts = [
            // Cast ENUM fields as strings or use custom accessors/mutators
            'urgency' => 'string',
            'status' => 'string',
        ];
        public function submittedBy()
        {
            return $this->belongsTo(Account::class, 'submitted_by_account_id');
        }
        public function category()
        {
            return $this->belongsTo(ProblemCategory::class, 'category_id');
        }
        public function comments()
        {
            return $this->hasMany(Comment::class);
        }
    }
    ```

    *   **`Comment.php`**
    ```php
    // app/Models/Comment.php
    <?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    class Comment extends Model
    {
        use HasFactory;
        protected $fillable = [
            'content',
            'author_account_id',
            'problem_id',
            'parent_comment_id',
            'total_votes',
        ];
        public function author()
        {
            return $this->belongsTo(Account::class, 'author_account_id');
        }
        public function problem()
        {
            return $this->belongsTo(Problem::class);
        }
        // Parent comment (if it's a reply)
        public function parent()
        {
            return $this->belongsTo(Comment::class, 'parent_comment_id');
        }
        // Replies to this comment
        public function replies()
        {
            return $this->hasMany(Comment::class, 'parent_comment_id');
        }
        public function votes()
        {
            return $this->hasMany(CommentVote::class);
        }
        // Check if this comment has been adopted as a solution
        public function adoptedSolution()
        {
            return $this->hasOne(Solution::class);
        }
    }
    ```

    *   **`CommentVote.php`**
    ```php
    // app/Models/CommentVote.php
    <?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    class CommentVote extends Model
    {
        use HasFactory;
        protected $fillable = [
            'comment_id',
            'voter_account_id',
            'vote_value', // +1 or -1
        ];
         protected $casts = [
            'vote_value' => 'integer',
        ];
        public function comment()
        {
            return $this->belongsTo(Comment::class);
        }
        public function voter()
        {
            return $this->belongsTo(Account::class, 'voter_account_id');
        }
    }
    ```

    *   **`Solution.php` (التعليق المعتمد)**
    ```php
    // app/Models/Solution.php
    <?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    class Solution extends Model
    {
        use HasFactory;
        // Note: Solution table now represents an adopted Comment
        protected $fillable = [
            'comment_id', // The adopted comment
            'adopting_organization_profile_id', // The organization that adopted it
            'status', // Status of the adoption/implementation process
            'organization_notes', // Notes from the organization
        ];
         protected $casts = [
            'status' => 'string', // Cast ENUM as string
        ];
        public function adoptedComment()
        {
            return $this->belongsTo(Comment::class, 'comment_id');
        }
        public function adoptingOrganization()
        {
            return $this->belongsTo(OrganizationProfile::class, 'adopting_organization_profile_id');
        }
        // Convenience methods to access comment author and problem
        public function author()
        {
            return $this->adoptedComment->author();
        }
         public function problem()
        {
            return $this->adoptedComment->problem();
        }
    }
    ```

    *   **`Badge.php`**
    ```php
    // app/Models/Badge.php
    <?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    class Badge extends Model
    {
        use HasFactory;
        protected $fillable = [
            'name',
            'description',
            'image_url',
            'required_adopted_comments_count',
            'required_points',
        ];
        protected $casts = [
            'required_adopted_comments_count' => 'integer',
            'required_points' => 'integer',
        ];
        public function accountBadges()
        {
            return $this->hasMany(AccountBadge::class);
        }
        // Accounts that have this badge
        public function accounts()
        {
             return $this->belongsToMany(Account::class, 'account_badges', 'badge_id', 'account_id')
                         ->withPivot('awarded_at'); // Include pivot table column
        }
    }
    ```

    *   **`AccountBadge.php`**
    ```php
    // app/Models/AccountBadge.php
    <?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    class AccountBadge extends Model
    {
        use HasFactory;
        // This is a pivot-like table linking Accounts and Badges
        // Laravel automatically handles created_at/updated_at unless $timestamps is set to false.
        // Since we have awarded_at, you might set $timestamps = false; or remove timestamps() from migration
        public $timestamps = false; // Remove Laravel's default timestamps
        protected $fillable = [
            'account_id',
            'badge_id',
            'awarded_at',
        ];
        protected $casts = [
             'awarded_at' => 'datetime',
        ];
        public function account()
        {
            return $this->belongsTo(Account::class);
        }
        public function badge()
        {
            return $this->belongsTo(Badge::class);
        }
    }
    ```

    *   **`OrganizationCategoryInterest.php`**
    ```php
    // app/Models/OrganizationCategoryInterest.php
    <?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    class OrganizationCategoryInterest extends Model
    {
        use HasFactory;
        // This is a pivot table for many-to-many relationship
        // Laravel expects pivot tables to not have an 'id' column by default,
        // and uses composite primary key. Our migration reflects this.
        // If using timestamps in the pivot table, set $timestamps = true; otherwise false.
        public $timestamps = true; // Set true if you kept timestamps() in migration
         protected $fillable = [
            'organization_profile_id',
            'problem_category_id',
        ];
         // Define the primary key columns for this model
         protected $primaryKey = ['organization_profile_id', 'problem_category_id'];
         public $incrementing = false; // Disable auto-incrementing ID
         protected $keyType = 'integer'; // Set key type if not integer (though FKs are integer here)

        public function organizationProfile()
        {
            return $this->belongsTo(OrganizationProfile::class);
        }
        public function problemCategory()
        {
            return $this->belongsTo(ProblemCategory::class);
        }
    }
    ```

**الخطوة الخامسة: تشغيل الهجرات**

الآن بعد أن قمت بإنشاء وتعديل جميع ملفات الهجرة والنماذج، يمكنك تشغيل الهجرات لإنشاء الجداول في قاعدة البيانات. تأكد أنك في مجلد المشروع في سطر الأوامر ونفّذ:

```bash
php artisan migrate
```

إذا تمت الأمور بنجاح، سترى رسائل تفيد بإنشاء كل جدول.

**الخطوة السادسة: التخطيط لملفات تلقيم البيانات (Seeders)**

في الخطوة القادمة، ستقوم بإنشاء ملفات تلقيم البيانات لملء الجداول ببيانات أولية. هذا ضروري لجعل بيئة التطوير تعمل بشكل واقعي ولتجربة الميزات. ستحتاج إلى إنشاء ملف seeder لكل جدول رئيسي يحتاج لبيانات أولية، أو seeder واحد يقوم باستدعاء seeders أخرى.

الأمر لإنشاء seeder هو:

```bash
php artisan make:seeder DatabaseSeederName
```

على سبيل المثال:
```bash
php artisan make:seeder CountriesTableSeeder
php artisan make:seeder ProblemCategoriesTableSeeder
php artisan make:seeder AccountsSeeder # لإنشاء أنواع مختلفة من الحسابات
php artisan make:seeder ProblemsSeeder
php artisan make:seeder BadgesSeeder
// ... وغيرها حسب حاجتك
```

ثم ستفتح ملف `DatabaseSeeder.php` لتستدعي الـ seeders الأخرى بالترتيب الصحيح (الجداول التي لا تعتمد على غيرها أولاً).

ستقوم هذه الـ seeders بإنشاء بيانات واقعية:
*   بيانات ثابتة مثل الدول وفئات المشاكل.
*   حسابات بأنواع مختلفة (فرد، منظمة، مسؤول) ببيانات ملفات شخصية مرتبطة.
*   بعض المشاكل التي تم نشرها بواسطة بعض الحسابات.
*   بعض التعليقات على المشاكل، وبعض التصويتات على التعليقات.
*   ربما مثال واحد لتعليق تم اعتماده كحل من قبل منظمة معينة.
*   تعريف لبعض الألقاب/الشارات.
*   ربما مثال واحد لحساب حصل على شارة.

تذكر أن الغرض هو توفير بيانات كافية لاختبار معظم جوانب التطبيق التي تعتمد على هذه الجداول.

**الخطوات التالية المتوقعة لتشغيل المشروع على الويب:**

بعد إعداد قاعدة البيانات والنماذج وتلقيمها بالبيانات الأولية باستخدام seeders (التي سنكتبها في الخطوة القادمة)، يصبح لديك العمود الفقري لبيانات تطبيقك جاهزًا. الخطوة التالية هي جعل هذا التطبيق يتفاعل مع المستخدمين عبر الويب.

أولًا، يجب أن تقوم بتعريف المسارات (Routes). هذه المسارات تحدد عناوين URL التي يمكن للمستخدمين زيارتها (مثل `/problems`, `/problems/{id}`, `/login`, `/register`). ستفتح ملفات `routes/web.php` (لصفحات الويب القياسية) وربما `routes/api.php` (إذا كان لديك واجهة برمجية للموبايل أو واجهة أمامية منفصلة مبنية بـ Vue/React).

بعد تعريف المسارات، ستحتاج إلى إنشاء المتحكمات (Controllers). المتحكمات هي الفئة التي تستقبل الطلبات الواردة عبر المسارات. كل دالة (method) في المتحكم ستكون مسؤولة عن معالجة طلب معين: جلب البيانات من قاعدة البيانات باستخدام النماذج (Models)، إجراء عمليات منطقية (مثل التحقق من صحة البيانات، حساب النقاط)، ثم إرجاع استجابة. يمكن أن تكون الاستجابة صفحة HTML (View) أو بيانات بصيغة JSON (لواجهة برمجية). ستحتاج إلى متحكمات لإدارة المشاكل، التعليقات، ملفات المستخدمين والمنظمات، ونظام المصادقة (تسجيل الدخول، التسجيل).

أثناء بناء المتحكمات، ستحتاج إلى إنشاء الواجهات (Views). هذه هي القوالب التي سيعرضها المستخدمون في المتصفح (باستخدام Blade أو Vue Components كما أشرت). ستقوم المتحكمات بتمرير البيانات التي تم جلبها من النماذج إلى هذه الواجهات لعرضها ديناميكيًا.

سيتضمن بناء نظام المصادقة إنشاء مسارات خاصة للتسجيل وتسجيل الدخول والخروج، متحكمات تتعامل مع هذه العمليات باستخدام نموذج `Account` الذي قمنا بإعداده ليحل محل نموذج `User` الافتراضي، وواجهات لعرض نماذج تسجيل الدخول والتسجيل. ستحتاج إلى استخدام خصائص المصادقة المضمنة في Laravel (مثل Auth Facade) لإدارة جلسات المستخدمين والتحقق مما إذا كان المستخدم مسجلاً دخوله.

لجعل التصويت على التعليقات يعمل بشكل تفاعلي، ستحتاج على الأرجح إلى استخدام JavaScript في الواجهة الأمامية لإرسال طلبات (ربما AJAX أو fetch) إلى نقاط نهاية API محددة في المتحكمات (مثل `CommentVoteController`). هذه النقاط ستسجل التصويت في جدول `CommentVotes` وتقوم بتحديث `total_votes` في جدول `Comments`.

بالنسبة لميزة اعتماد التعليقات كحلول من قبل المنظمات، ستحتاج إلى منطق في المتحكمات خاص بالمنظمات للسماح لهم بإنشاء سجل في جدول `Solutions` بناءً على `comment_id` و `organization_profile_id` الخاص بهم. عند إنشاء هذا السجل، يجب عليك تحديث نقاط صاحب التعليق المرتبط في جدول `Accounts`.

وأخيرًا، ستحتاج إلى تطوير المنطق الخاص بمنح الألقاب. يمكن أن يتم ذلك تلقائيًا (على سبيل المثال، عند تحديث نقاط المستخدم أو عند اعتماد تعليق له، تقوم بفحص إذا كان قد استوفى شروط أي لقب لم يحصل عليه بعد، وإذا كان كذلك، قم بإنشاء سجل في جدول `AccountBadges`) أو يمكن أن يتم يدويًا بواسطة المسؤولين.

كخطة ثانية مقترحة، يمكنك التفكير في هيكلة المتحكمات كالتالي:
*   `HomeController`: للصفحة الرئيسية والمحتوى العام.
*   `AuthController`: لعمليات تسجيل الدخول والتسجيل والخروج واستعادة كلمة المرور.
*   `ProfileController`: لإدارة ملفات المستخدمين الأفراد والمنظمات.
*   `ProblemController`: لعرض المشاكل، إنشاء مشاكل جديدة، وتعديلها.
*   `CommentController`: لعرض التعليقات، إضافة تعليقات جديدة، والرد عليها.
*   `CommentVoteController`: لمعالجة طلبات التصويت على التعليقات.
*   `OrganizationController`: لعرض معلومات المنظمات وإدارة مهامها الخاصة (مثل اعتماد الحلول).
*   `SolutionController`: (قد لا تحتاج متحكم منفصل تمامًا إذا كانت إدارة "الحلول" تتم بالكامل من خلال متحكم `OrganizationController` أو `CommentController`، أو قد تحتاجه لعرض الحلول المعتمدة).
*   `AdminController`: لوحة تحكم للمسؤولين لإدارة المستخدمين، المشاكل، الفئات، الألقاب، وغيرها.
*   `BadgeController`: لعرض الألقاب المتاحة.

بهذه الخطوات، تكون قد وضعت الأساس القوي لمشروعك في Laravel، جاهزًا للبدء في بناء منطق التطبيق والواجهة الأمامية.




