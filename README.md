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




 دعنا نجهز ملفات تلقيم البيانات (Seeders) بناءً على هيكل قاعدة البيانات النهائي الذي قدمته. سنتّبع الترتيب المنطقي لضمان عدم وجود مشاكل في المفاتيح الخارجية عند التشغيل.

أولاً، قم بإنشاء ملفات الـ Seeder باستخدام الأوامر التي ذكرناها:

```bash
php artisan make:seeder CountriesSeeder
php artisan make:seeder CitiesSeeder
php artisan make:seeder AddressesSeeder
php artisan make:seeder ProblemCategoriesSeeder
php artisan make:seeder AccountsSeeder
php artisan make:seeder UserProfilesSeeder
php artisan make:seeder OrganizationProfilesSeeder
php artisan make:seeder ProblemsSeeder
php artisan make:seeder CommentsSeeder
php artisan make:seeder CommentVotesSeeder
php artisan make:seeder BadgesSeeder
php artisan make:seeder AccountBadgesSeeder
php artisan make:seeder SolutionsSeeder
php artisan make:seeder OrganizationCategoryInterestsSeeder
```

الآن، سنملأ محتوى هذه الملفات.

**1. ملف `database/seeders/DatabaseSeeder.php`**

هذا هو الملف الرئيسي الذي سيستدعي جميع الـ Seeders الأخرى بالترتيب الصحيح.

```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Order matters due to foreign key constraints
        $this->call([
            CountriesSeeder::class,
            CitiesSeeder::class,
            AddressesSeeder::class, // Addresses need Cities
            ProblemCategoriesSeeder::class,
            AccountsSeeder::class, // Accounts needed for Profiles, Problems, Comments, Votes
            UserProfilesSeeder::class, // UserProfiles need Accounts and Addresses
            OrganizationProfilesSeeder::class, // OrganizationProfiles need Accounts and Addresses
            BadgesSeeder::class, // Badges are independent
            ProblemsSeeder::class, // Problems need Accounts and ProblemCategories
            CommentsSeeder::class, // Comments need Accounts and Problems
            CommentVotesSeeder::class, // CommentVotes need Accounts and Comments
            SolutionsSeeder::class, // Solutions need Comments and OrganizationProfiles
            AccountBadgesSeeder::class, // AccountBadges need Accounts and Badges
            OrganizationCategoryInterestsSeeder::class, // Needs OrganizationProfiles and ProblemCategories
        ]);
    }
}
```

**2. ملف `database/seeders/CountriesSeeder.php`**

لإضافة بعض الدول الأولية.

```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Country; // تأكد من استخدام النموذج الصحيح

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // يمكنك مسح الجدول قبل الإضافة لتجنب التكرار إذا كنت تعيد تشغيل Seeder
        // DB::table('countries')->truncate(); // استخدم truncate بحذر في الإنتاج

        $countries = [
            ['name' => 'Syria', 'code' => 'SY'],
            ['name' => 'Turkey', 'code' => 'TR'],
            ['name' => 'Lebanon', 'code' => 'LB'],
            ['name' => 'Jordan', 'code' => 'JO'],
            ['name' => 'Germany', 'code' => 'DE'], // مثال لدولة في الخارج
            ['name' => 'Egypt', 'code' => 'EG'],
        ];

        foreach ($countries as $country) {
            Country::firstOrCreate(['code' => $country['code']], $country);
        }
    }
}
```

**3. ملف `database/seeders/CitiesSeeder.php`**

لإضافة بعض المدن وربطها بالدول.

```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\City;
use App\Models\Country;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('cities')->truncate();

        $syria = Country::where('code', 'SY')->first();
        $turkey = Country::where('code', 'TR')->first();
        $lebanon = Country::where('code', 'LB')->first();
        $jordan = Country::where('code', 'JO')->first();
        $germany = Country::where('code', 'DE')->first();
        $egypt = Country::where('code', 'EG')->first();


        $cities = [];

        if ($syria) {
            $cities[] = ['name' => 'Damascus', 'country_id' => $syria->id];
            $cities[] = ['name' => 'Aleppo', 'country_id' => $syria->id];
            $cities[] = ['name' => 'Homs', 'country_id' => $syria->id];
            $cities[] = ['name' => 'Hama', 'country_id' => $syria->id];
            $cities[] = ['name' => 'Latakia', 'country_id' => $syria->id];
        }

        if ($turkey) {
             $cities[] = ['name' => 'Istanbul', 'country_id' => $turkey->id];
             $cities[] = ['name' => 'Gaziantep', 'country_id' => $turkey->id];
             $cities[] = ['name' => 'Mersin', 'country_id' => $turkey->id];
        }
         if ($lebanon) {
             $cities[] = ['name' => 'Beirut', 'country_id' => $lebanon->id];
        }
         if ($jordan) {
             $cities[] = ['name' => 'Amman', 'country_id' => $jordan->id];
        }
         if ($germany) {
             $cities[] = ['name' => 'Berlin', 'country_id' => $germany->id];
             $cities[] = ['name' => 'Munich', 'country_id' => $germany->id];
        }
         if ($egypt) {
             $cities[] = ['name' => 'Cairo', 'country_id' => $egypt->id];
        }

        foreach ($cities as $city) {
             // Check if city with the same name and country exists before creating
            $existingCity = City::where('name', $city['name'])
                                ->where('country_id', $city['country_id'])
                                ->first();
            if (!$existingCity) {
                 City::create($city);
            }
        }
    }
}
```

**4. ملف `database/seeders/AddressesSeeder.php`**

لإضافة بعض العناوين الأولية.

```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Address;
use App\Models\City;
use Faker\Factory as Faker;

class AddressesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('addresses')->truncate();
        $faker = Faker::create('ar_SY'); // حاول استخدام Faker للغة العربية السورية إن أمكن
        $cities = City::all();

        if ($cities->isEmpty()) {
            $this->command->info('Cities table is empty. Please run CitiesSeeder first.');
            return;
        }

        $numberOfAddresses = 50; // عدد العناوين الوهمية التي تريد إنشاءها

        for ($i = 0; $i < $numberOfAddresses; $i++) {
            $city = $cities->random(); // اختر مدينة عشوائية

            Address::create([
                'street_address' => $faker->streetAddress,
                'city_id' => $city->id,
                'postal_code' => $faker->postcode,
            ]);
        }
         $this->command->info("Seeded {$numberOfAddresses} addresses.");
    }
}
```
*ملاحظة:* قد تحتاج لضبط `Faker::create('ar_SY')` بناءً على اللغات المدعومة في مكتبة Faker المثبتة لديك. `en_US` هي القيمة الافتراضية والأكثر شيوعًا.

**5. ملف `database/seeders/ProblemCategoriesSeeder.php`**

لإضافة فئات المشاكل الأولية (مع أمثلة لفئات متداخلة).

```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProblemCategory;
use Illuminate\Support\Facades\DB;

class ProblemCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('problem_categories')->truncate();

        // Main categories
        $infra = ProblemCategory::firstOrCreate(
            ['name' => 'Infrastructure'],
            ['description' => 'Problems related to buildings, roads, utilities, etc.']
        );
        $edu = ProblemCategory::firstOrCreate(
             ['name' => 'Education'],
             ['description' => 'Problems related to schools, universities, curriculum, etc.']
        );
        $health = ProblemCategory::firstOrCreate(
             ['name' => 'Health'],
             ['description' => 'Problems related to hospitals, clinics, medical supplies, etc.']
        );
        $economy = ProblemCategory::firstOrCreate(
             ['name' => 'Economy'],
             ['description' => 'Problems related to unemployment, poverty, businesses, etc.']
        );
        $env = ProblemCategory::firstOrCreate(
             ['name' => 'Environment'],
             ['description' => 'Problems related to pollution, waste management, natural resources, etc.']
        );
        $energy = ProblemCategory::firstOrCreate(
             ['name' => 'Energy'],
             ['description' => 'Problems related to electricity, fuel, renewable energy, etc.']
        );
         $social = ProblemCategory::firstOrCreate(
             ['name' => 'Social Issues'],
             ['description' => 'Problems related to social cohesion, displacement, community support, etc.']
        );


        // Subcategories (linking to parents)
        if ($infra) {
             ProblemCategory::firstOrCreate(
                ['name' => 'Roads & Bridges', 'parent_category_id' => $infra->id],
                ['description' => 'Problems related to transportation networks.']
            );
             ProblemCategory::firstOrCreate(
                 ['name' => 'Water & Sanitation', 'parent_category_id' => $infra->id],
                 ['description' => 'Problems related to clean water and sewage systems.']
            );
        }

        if ($edu) {
             ProblemCategory::firstOrCreate(
                 ['name' => 'School Buildings', 'parent_category_id' => $edu->id],
                 ['description' => 'Problems related to the physical state of schools.']
            );
        }
         if ($health) {
             ProblemCategory::firstOrCreate(
                 ['name' => 'Healthcare Access', 'parent_category_id' => $health->id],
                 ['description' => 'Problems related to getting medical help.']
            );
        }

         $this->command->info("Seeded problem categories.");

    }
}
```

**6. ملف `database/seeders/AccountsSeeder.php`**

لإنشاء أنواع مختلفة من الحسابات.

```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Account;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class AccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('accounts')->truncate();
        $faker = Faker::create();

        // Create Admin Account
        Account::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'username' => 'admin',
                'password' => Hash::make('password'), // استخدم كلمة مرور آمنة في الإنتاج
                'account_type' => 'admin',
                'is_active' => true,
            ]
        );
         $this->command->info("Created admin account.");


        // Create some Individual Accounts
        $numberOfIndividuals = 30;
        for ($i = 0; $i < $numberOfIndividuals; $i++) {
            Account::firstOrCreate(
                ['email' => $faker->unique()->safeEmail],
                [
                    'username' => $faker->unique()->userName,
                    'password' => Hash::make('password'),
                    'account_type' => 'individual',
                    'is_active' => true,
                    'points' => $faker->numberBetween(0, 500), // نقاط عشوائية
                ]
            );
        }
         $this->command->info("Created {$numberOfIndividuals} individual accounts.");


        // Create some Organization Accounts
        $numberOfOrganizations = 10;
        for ($i = 0; $i < $numberOfOrganizations; $i++) {
             Account::firstOrCreate(
                ['email' => $faker->unique()->companyEmail],
                [
                    'username' => $faker->unique()->companySuffix . '_' . $faker->randomNumber(3),
                    'password' => Hash::make('password'),
                    'account_type' => 'organization',
                    'is_active' => true,
                    'points' => $faker->numberBetween(0, 1000), // نقاط عشوائية
                ]
            );
        }
        $this->command->info("Created {$numberOfOrganizations} organization accounts.");
    }
}
```

**7. ملف `database/seeders/UserProfilesSeeder.php`**

لإنشاء ملفات تعريف للمستخدمين الأفراد.

```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Account;
use App\Models\UserProfile;
use App\Models\Address;
use Faker\Factory as Faker;

class UserProfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('user_profiles')->truncate();
        $faker = Faker::create('ar_SY'); // حاول استخدام Faker للغة العربية السورية
        $individualAccounts = Account::where('account_type', 'individual')->get();
        $addresses = Address::all();

        if ($addresses->isEmpty()) {
             $this->command->info('Addresses table is empty. Please run AddressesSeeder first.');
             // يمكنك هنا إنشاء عناوين وهمية بسيطة إذا لم تكن موجودة
             // Example: $address = Address::factory()->create(['city_id' => City::inRandomOrder()->first()->id]);
             // Or just return and ask user to seed Addresses
             return;
        }

        foreach ($individualAccounts as $account) {
            // Check if profile already exists
            if (!$account->userProfile) {
                 UserProfile::create([
                    'account_id' => $account->id,
                    'first_name' => $faker->firstName,
                    'last_name' => $faker->lastName,
                    'phone' => $faker->phoneNumber,
                    'address_id' => $addresses->random()->id, // ربط بعنوان عشوائي موجود
                    'bio' => $faker->sentence,
                ]);
            }
        }
        $this->command->info("Seeded user profiles.");
    }
}
```
*ملاحظة:* نفس ملاحظة Faker للغة العربية.

**8. ملف `database/seeders/OrganizationProfilesSeeder.php`**

لإنشاء ملفات تعريف للمنظمات.

```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Account;
use App\Models\OrganizationProfile;
use App\Models\Address;
use Faker\Factory as Faker;

class OrganizationProfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('organization_profiles')->truncate();
        $faker = Faker::create();
        $organizationAccounts = Account::where('account_type', 'organization')->get();
        $addresses = Address::all();

         if ($addresses->isEmpty()) {
             $this->command->info('Addresses table is empty. Please run AddressesSeeder first.');
             return;
        }


        foreach ($organizationAccounts as $account) {
             // Check if profile already exists
            if (!$account->organizationProfile) {
                 OrganizationProfile::create([
                    'account_id' => $account->id,
                    'name' => $faker->unique()->company,
                    'address_id' => $addresses->random()->id, // ربط بعنوان عشوائي موجود
                    'info' => $faker->catchPhrase . ' focused on ' . $faker->bs,
                    'website_url' => $faker->url,
                    'contact_email' => $faker->unique()->companyEmail,
                ]);
            }
        }
        $this->command->info("Seeded organization profiles.");
    }
}
```

**9. ملف `database/seeders/BadgesSeeder.php`**

لتعريف الألقاب/الشارات.

```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Badge;
use Illuminate\Support\Facades\DB;

class BadgesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('badges')->truncate();

        $badges = [
            [
                'name' => 'Novice Contributor',
                'description' => 'Earned by posting your first comment.',
                'image_url' => '/images/badges/novice.png', // مثال لمسار الصورة
                'required_points' => 10, // يحتاج 10 نقاط
                'required_adopted_comments_count' => 0, // ولا يحتاج تعليقات معتمدة
            ],
            [
                'name' => 'Rising Thinker',
                'description' => 'Awarded for reaching 100 points.',
                'image_url' => '/images/badges/rising_thinker.png',
                'required_points' => 100,
                'required_adopted_comments_count' => 0,
            ],
            [
                'name' => 'Problem Solver I',
                'description' => 'Earned when one of your comments is adopted as a solution.',
                'image_url' => '/images/badges/solver_1.png',
                'required_points' => 0, // لا يحتاج نقاط محددة
                'required_adopted_comments_count' => 1, // يحتاج تعليق واحد معتمد
            ],
            [
                'name' => 'Problem Solver II',
                'description' => 'Awarded when 3 of your comments are adopted as solutions.',
                'image_url' => '/images/badges/solver_2.png',
                'required_points' => 0,
                'required_adopted_comments_count' => 3,
            ],
             [
                'name' => 'Community Favorite',
                'description' => 'Given for receiving 50 upvotes across your comments.',
                'image_url' => '/images/badges/favorite.png',
                'required_points' => 50, // قد تربط النقاط بالUpvotes
                'required_adopted_comments_count' => 0,
            ],
        ];

        foreach ($badges as $badge) {
            Badge::firstOrCreate(['name' => $badge['name']], $badge);
        }
        $this->command->info("Seeded badges.");
    }
}
```

**10. ملف `database/seeders/ProblemsSeeder.php`**

لإضافة مشاكل أولية.

```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Problem;
use App\Models\Account;
use App\Models\ProblemCategory;
use Faker\Factory as Faker;

class ProblemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('problems')->truncate();
        $faker = Faker::create('ar_SY'); // حاول استخدام Faker للغة العربية
        $submitters = Account::whereIn('account_type', ['individual', 'organization', 'admin'])->get();
        $categories = ProblemCategory::all();

        if ($submitters->isEmpty() || $categories->isEmpty()) {
            $this->command->info('Accounts or ProblemCategories table is empty. Please run previous seeders.');
            return;
        }

        $numberOfProblems = 30;

        for ($i = 0; $i < $numberOfProblems; $i++) {
            $submitter = $submitters->random();
            $category = $categories->random();

            Problem::create([
                'title' => $faker->sentence(mt_rand(5, 10)),
                'description' => $faker->paragraphs(mt_rand(2, 5), true),
                'submitted_by_account_id' => $submitter->id,
                'category_id' => $category->id,
                'urgency' => $faker->randomElement(['Low', 'Medium', 'High']),
                'status' => $faker->randomElement(['Published', 'Published', 'Published', 'UnderReview', 'Hidden']), // معظمها منشورة
                'tags' => implode(',', $faker->words(mt_rand(1, 5))),
            ]);
        }
        $this->command->info("Seeded {$numberOfProblems} problems.");
    }
}
```

**11. ملف `database/seeders/CommentsSeeder.php`**

لإضافة تعليقات أولية (مع بعض الردود).

```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\Account;
use App\Models\Problem;
use Faker\Factory as Faker;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('comments')->truncate();
        $faker = Faker::create('ar_SY'); // حاول استخدام Faker للغة العربية
        $authors = Account::whereIn('account_type', ['individual', 'organization'])->get(); // المنظمات يمكن أن تعلق
        $problems = Problem::all();

        if ($authors->isEmpty() || $problems->isEmpty()) {
            $this->command->info('Accounts or Problems table is empty. Please run previous seeders.');
            return;
        }

        $numberOfCommentsPerProblem = 5;
        $replyChance = 0.3; // 30% chance to be a reply

        foreach ($problems as $problem) {
            $rootComments = []; // Store comments created for this problem to use as parents

            for ($i = 0; $i < $numberOfCommentsPerProblem; $i++) {
                $author = $authors->random();
                $parent_comment_id = null;

                // Decide if this comment is a reply and if there are parent comments available
                if (!empty($rootComments) && $faker->randomFloat(1, 0, 1) < $replyChance) {
                    $parent_comment_id = $faker->randomElement($rootComments)->id;
                }

                $comment = Comment::create([
                    'content' => $faker->paragraph(mt_rand(1, 3)),
                    'author_account_id' => $author->id,
                    'problem_id' => $problem->id,
                    'parent_comment_id' => $parent_comment_id,
                    'total_votes' => $faker->numberBetween(0, 50), // تصويتات عشوائية مبدئية
                ]);

                // If it's a root comment, add it to the list of potential parents
                if ($parent_comment_id === null) {
                    $rootComments[] = $comment;
                }
            }
        }
        $this->command->info("Seeded comments for {$problems->count()} problems.");
    }
}
```

**12. ملف `database/seeders/CommentVotesSeeder.php`**

لإضافة تصويتات على التعليقات.

```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CommentVote;
use App\Models\Comment;
use App\Models\Account;
use Faker\Factory as Faker;

class CommentVotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('comment_votes')->truncate(); // Use truncate with caution
        $faker = Faker::create();
        $comments = Comment::all();
        $voters = Account::where('account_type', 'individual')->get(); // نفترض أن الأفراد هم من يصوتون بشكل أساسي

        if ($comments->isEmpty() || $voters->isEmpty()) {
            $this->command->info('Comments or Individual Accounts table is empty. Please run previous seeders.');
            return;
        }

        $votesPerComment = 5; // عدد متوسط من التصويتات لكل تعليق
        $voteValues = [-1, 1]; // القيم الممكنة للتصويت

        foreach ($comments as $comment) {
            $usedVoters = []; // لتجنب تكرار تصويت نفس المستخدم على نفس التعليق

            for ($i = 0; $i < $votesPerComment; $i++) {
                $voter = $voters->random();

                // Skip if this voter already voted on this comment in this seeding run
                if (in_array($voter->id, $usedVoters)) {
                    continue;
                }

                try {
                    CommentVote::create([
                        'comment_id' => $comment->id,
                        'voter_account_id' => $voter->id,
                        'vote_value' => $faker->randomElement($voteValues),
                    ]);
                    $usedVoters[] = $voter->id;
                } catch (\Illuminate\Database\QueryException $e) {
                    // Catch unique constraint violation if it happens despite checks
                    // This can happen if running multiple times without truncate or if logic is complex
                     // $this->command->warn("Skipping duplicate vote for Comment ID: {$comment->id} by Account ID: {$voter->id}");
                     continue; // Skip if duplicate vote constraint is violated
                }
            }
            // Optional: Update comment's total_votes after seeding votes for it
            // In a real app, this update should ideally happen via a database trigger
            // or a dedicated event/listener when a vote is cast.
            $comment->total_votes = $comment->votes()->sum('vote_value');
            $comment->save();
        }
        $this->command->info("Seeded comment votes and updated total_votes.");
    }
}
```

**13. ملف `database/seeders/SolutionsSeeder.php`**

لإنشاء بعض الأمثلة للتعليقات التي تم اعتمادها كحلول من قبل المنظمات.

```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Solution;
use App\Models\Comment;
use App\Models\OrganizationProfile;
use App\Models\Account; // Needed to find the author of the comment to give points
use Faker\Factory as Faker;

class SolutionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('solutions')->truncate();
        $faker = Faker::create();
        $comments = Comment::all();
        $organizations = OrganizationProfile::all();

        if ($comments->isEmpty() || $organizations->isEmpty()) {
            $this->command->info('Comments or Organization Profiles table is empty. Please run previous seeders.');
            return;
        }

        $numberOfAdoptedSolutions = 10; // عدد الحلول المعتمدة الوهمية

        $adoptedComments = []; // Keep track of comment IDs already adopted

        for ($i = 0; $i < $numberOfAdoptedSolutions; $i++) {
            // Find a comment that hasn't been adopted yet
            $comment = $comments->whereNotIn('id', $adoptedComments)->random();
            $organization = $organizations->random();

            if (!$comment) {
                $this->command->warn('Not enough unique comments to adopt.');
                break; // Stop if no more un-adopted comments are available
            }

            try {
                Solution::create([
                    'comment_id' => $comment->id,
                    'adopting_organization_profile_id' => $organization->id,
                    'status' => $faker->randomElement(['UnderConsideration', 'Adopted', 'ImplementationInProgress', 'ImplementationCompleted', 'RejectedByOrganization']),
                    'organization_notes' => $faker->sentence,
                ]);

                $adoptedComments[] = $comment->id; // Add to list of adopted comments

                // --- Logic to award points to the comment author (as per your project rules) ---
                $commentAuthor = Account::find($comment->author_account_id);
                if ($commentAuthor) {
                    $pointsToAdd = 50; // مثال: منح 50 نقطة عند اعتماد التعليق
                    $commentAuthor->points += $pointsToAdd;
                    $commentAuthor->save();
                    // $this->command->info("Awarded {$pointsToAdd} points to Account ID: {$commentAuthor->id} for adopted comment ID: {$comment->id}");
                }
                 // --- End of point awarding logic ---


            } catch (\Illuminate\Database\QueryException $e) {
                // Catch unique constraint violation if the same comment is somehow selected twice
                 // $this->command->warn("Skipping duplicate solution creation for Comment ID: {$comment->id}");
                 continue;
            }
        }
         $this->command->info("Seeded {$numberOfAdoptedSolutions} adopted solutions.");
    }
}
```

**14. ملف `database/seeders/AccountBadgesSeeder.php`**

لمنح بعض المستخدمين ألقابًا أولية.

```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AccountBadge;
use App\Models\Account;
use App\Models\Badge;
use Faker\Factory as Faker;

class AccountBadgesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('account_badges')->truncate();
        $faker = Faker::create();
        $accounts = Account::where('account_type', 'individual')->get(); // نفترض أن الأفراد هم من يحصلون على الألقاب
        $badges = Badge::all();

        if ($accounts->isEmpty() || $badges->isEmpty()) {
            $this->command->info('Accounts or Badges table is empty. Please run previous seeders.');
            return;
        }

        $numberOfBadgesToAward = 20; // عدد الألقاب الوهمية التي ستمنح

        for ($i = 0; $i < $numberOfBadgesToAward; $i++) {
            $account = $accounts->random();
            $badge = $badges->random();

            try {
                AccountBadge::create([
                    'account_id' => $account->id,
                    'badge_id' => $badge->id,
                    'awarded_at' => $faker->dateTimeBetween('-1 year', 'now'),
                ]);
            } catch (\Illuminate\Database\QueryException $e) {
                // Catch unique constraint violation (if account already has this badge)
                 // $this->command->warn("Skipping duplicate badge for Account ID: {$account->id}, Badge ID: {$badge->id}");
                 continue; // Skip this iteration if duplicate
            }
        }
        $this->command->info("Seeded {$numberOfBadgesToAward} account badges.");
    }
}
```

**15. ملف `database/seeders/OrganizationCategoryInterestsSeeder.php`**

لربط بعض المنظمات بفئات مشاكل معينة (اختياري).

```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrganizationProfile;
use App\Models\ProblemCategory;
use Illuminate\Support\Facades\DB; // استخدم DB Facade للجداول Pivot البسيطة

class OrganizationCategoryInterestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('organization_category_interests')->truncate(); // Use truncate with caution

        $organizations = OrganizationProfile::all();
        $categories = ProblemCategory::all();

        if ($organizations->isEmpty() || $categories->isEmpty()) {
            $this->command->info('Organization Profiles or Problem Categories table is empty. Please run previous seeders.');
            return;
        }

        $interestsToCreate = 15; // عدد الارتباطات بين المنظمات والفئات

        for ($i = 0; $i < $interestsToCreate; $i++) {
            $organization = $organizations->random();
            $category = $categories->random();

            try {
                 // Insert directly into the pivot table
                DB::table('organization_category_interests')->insert([
                    'organization_profile_id' => $organization->id,
                    'problem_category_id' => $category->id,
                    'created_at' => now(), // Add timestamps if they exist in migration
                    'updated_at' => now(), // Add timestamps if they exist in migration
                ]);
            } catch (\Illuminate\Database\QueryException $e) {
                // Catch unique constraint violation for the composite primary key
                 // $this->command->warn("Skipping duplicate interest for Org Profile ID: {$organization->id}, Category ID: {$category->id}");
                 continue; // Skip if duplicate
            }
        }
         $this->command->info("Seeded {$interestsToCreate} organization category interests.");
    }
}
```

**تشغيل الـ Seeders:**

بعد حفظ جميع هذه الملفات، يمكنك تشغيل جميع الـ Seeders دفعة واحدة باستخدام الأمر التالي:

```bash
php artisan db:seed
```

أو إذا أردت تشغيل Seeder معين فقط:

```bash
php artisan db:seed --class=AccountsSeeder
```

الآن أصبح لديك قاعدة بيانات مليئة ببيانات وهمية واقعية يمكنك استخدامها لاختبار وظائف تطبيقك المختلفة.

**ملاحظات هامة:**

*   **الاعتمادية:** تأكد من ترتيب استدعاء الـ Seeders في `DatabaseSeeder.php` لضمان وجود البيانات التي تشير إليها المفاتيح الخارجية قبل محاولة ربطها.
*   **البيانات الفريدة:** استخدم `firstOrCreate` في بعض الـ Seeders (مثل الدول والفئات) لتجنب تكرار إدخال نفس البيانات الثابتة إذا قمت بتشغيل الـ Seeder أكثر من مرة. بالنسبة للجداول التي تسمح بالتكرار (مثل التعليقات)، استخدم `create`.
*   **التعامل مع المفاتيح الخارجية:** استخدم `foreignId(...)->constrained(...)` في الهجرات لإنشاء المفاتيح الخارجية بشكل صحيح. في الـ Seeders، احصل على كائنات النماذج المرتبطة (مثل `$author = Account::find(...)`) واستخدم معرّفاتها (`$author->id`) لملء الحقول في الجدول الحالي.
*   **Faker:** مكتبة Faker رائعة لإنشاء بيانات وهمية. يمكنك استكشاف المزيد من أنواع البيانات التي تولدها (`$faker->name`, `$faker->text`, `$faker->dateTime`, إلخ) لجعل بياناتك أكثر تنوعًا.
*   **Truncate:** السطور التي تحتوي على `DB::table('table_name')->truncate();` تقوم بمسح جميع البيانات الموجودة في الجدول قبل إضافة البيانات الجديدة. هذا مفيد في بيئة التطوير لإعادة تعيين البيانات، لكن **كن حذرًا جدًا عند استخدامه في بيئة الإنتاج**.



تمام، بناءً على هيكل قاعدة البيانات النهائي ورؤية المشروع، سنقوم الآن بإنشاء المتحكمات اللازمة وتصميم ملف المسارات `routes/web.php`. سنركز على إنشاء بنية المتحكمات وتحديد وظيفة كل دالة (method) فيها، وتحديد المسارات التي ستستدعي هذه الدوال. ملفات الواجهة (Views) ستكون خطوتنا التالية.

**إنشاء المتحكمات (Controllers):**

سنستخدم الأمر `php artisan make:controller ControllerName` لإنشاء المتحكمات.

```bash
php artisan make:controller HomeController
php artisan make:controller AuthController # للمصادقة المخصصة باستخدام جدول Accounts
php artisan make:controller ProfileController # لملفات المستخدمين والمنظمات
php artisan make:controller ProblemController
php artisan make:controller CommentController
php artisan make:controller CommentVoteController # للتصويت على التعليقات
php artisan make:controller BadgeController # لعرض الألقاب
php artisan make:controller OrganizationController # لإدارة مهام المنظمات (مثل اعتماد الحلول)
php artisan make:controller SolutionController # لعرض الحلول المعتمدة وإدارة حالتها
php artisan make:controller AdminController # لوحة تحكم للمسؤولين
```

**ملف المسارات `routes/web.php`:**

سنقوم بتنظيم المسارات بناءً على المناطق الوظيفية (عامة، مصادقة، محمية للمستخدمين/المنظمات، خاصة بالمنظمات، لوحة المسؤول).

```php
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProblemController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CommentVoteController;
use App\Http\Controllers\BadgeController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\SolutionController;
use App\Http\Controllers\AdminController; // للمتحكمات الإدارية

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// --- Public Routes ---
// يمكن لأي زائر الوصول إليها

Route::get('/', [HomeController::class, 'index'])->name('home'); // الصفحة الرئيسية

// عرض قائمة المشاكل
Route::get('/problems', [ProblemController::class, 'index'])->name('problems.index');
// عرض مشكلة محددة وتفاصيلها وتعليقاتها
Route::get('/problems/{problem}', [ProblemController::class, 'show'])->name('problems.show');

// عرض جميع الألقاب المتاحة
Route::get('/badges', [BadgeController::class, 'index'])->name('badges.index');

// عرض ملفات المستخدمين والمنظمات بشكل عام (يمكن تعديلها لتكون للمسجلين فقط لاحقاً)
Route::get('/profiles/{account}', [ProfileController::class, 'show'])->name('profiles.show');

// --- Authentication Routes ---
// مسارات تسجيل الدخول والتسجيل والخروج باستخدام AuthController المخصص

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']); // معالجة بيانات التسجيل

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']); // معالجة بيانات تسجيل الدخول

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth'); // يتطلب تسجيل الدخول للخروج

// --- Authenticated User/Organization Routes ---
// تتطلب تسجيل الدخول (middleware 'auth')

Route::middleware('auth')->group(function () {

    // إدارة ملف المستخدم أو المنظمة الحالي
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update'); // استخدام PUT/PATCH للتعديل
    Route::get('/profile/badges', [ProfileController::class, 'showMyBadges'])->name('profile.badges'); // عرض ألقاب المستخدم الحالي

    // إنشاء مشكلة جديدة
    Route::get('/problems/create', [ProblemController::class, 'create'])->name('problems.create');
    Route::post('/problems', [ProblemController::class, 'store'])->name('problems.store'); // حفظ مشكلة جديدة

    // تعديل وحذف مشكلة (يجب أن يكون المستخدم هو صاحب المشكلة أو مسؤول)
    Route::get('/problems/{problem}/edit', [ProblemController::class, 'edit'])->name('problems.edit');
    Route::put('/problems/{problem}', [ProblemController::class, 'update'])->name('problems.update');
    Route::delete('/problems/{problem}', [ProblemController::class, 'destroy'])->name('problems.destroy');

    // إضافة تعليق جديد على مشكلة أو تعليق آخر
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

    // تعديل وحذف تعليق (يجب أن يكون المستخدم هو صاحب التعليق أو مسؤول)
    Route::get('/comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit'); // قد تحتاج هذه المسارات لصفحات تعديل فردية أو تستخدم Ajax
    Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

    // التصويت على التعليقات (يمكن أن تكون POST requests)
    Route::post('/comments/{comment}/vote', [CommentVoteController::class, 'vote'])->name('comments.vote');

});

// --- Organization Specific Routes ---
// تتطلب أن يكون الحساب مسجل دخول ونوعه 'organization'
// ستحتاج إلى Middleware مخصص 'isOrganization' أو التحقق داخل المتحكم

Route::middleware(['auth', 'isOrganization'])->prefix('organization')->name('organization.')->group(function () {
    // لوحة تحكم المنظمة (قد تكون صفحة داشبورد تعرض المشاكل ذات الصلة أو الحلول المعتمدة)
    // Route::get('/dashboard', [OrganizationController::class, 'dashboard'])->name('dashboard');

    // عملية اعتماد تعليق كحل
    // قد تكون هذه العملية كـ POST request من صفحة عرض المشكلة أو التعليق
    Route::post('/adopt-comment/{comment}', [OrganizationController::class, 'adoptComment'])->name('adoptComment');

    // عرض الحلول المعتمدة من قبل هذه المنظمة
    Route::get('/solutions', [OrganizationController::class, 'listAdoptedSolutions'])->name('listAdoptedSolutions');
    // عرض تفاصيل حل معتمد محدد
    Route::get('/solutions/{solution}', [OrganizationController::class, 'showAdoptedSolution'])->name('showAdoptedSolution');
    // تعديل حالة الحل المعتمد
    Route::put('/solutions/{solution}/status', [OrganizationController::class, 'updateAdoptedSolutionStatus'])->name('updateAdoptedSolutionStatus');

    // إدارة اهتمامات المنظمة بالفئات (ربط المنظمة بالفئات في organization_category_interests)
    Route::get('/categories/interests', [OrganizationController::class, 'editCategoryInterests'])->name('editCategoryInterests');
    Route::post('/categories/interests', [OrganizationController::class, 'updateCategoryInterests'])->name('updateCategoryInterests');

});

// --- Admin Routes ---
// تتطلب أن يكون الحساب مسجل دخول ونوعه 'admin'
// ستحتاج إلى Middleware مخصص 'isAdmin' أو التحقق داخل المتحكم

Route::middleware(['auth', 'isAdmin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // إدارة الحسابات (قائمة، تعديل، حذف، تفعيل/تعطيل، تغيير النوع)
    Route::resource('accounts', AdminController::class)->except(['show']); // أمثلة CRUD بسيطة في متحكم واحد

    // إدارة المشاكل (قائمة، تعديل، حذف، تغيير الحالة)
    Route::resource('problems', AdminController::class)->except(['create', 'store', 'show']); // أمثلة CRUD بسيطة

    // إدارة الفئات (قائمة، إنشاء، تعديل، حذف)
    Route::resource('categories', AdminController::class)->except(['show']);

    // إدارة الألقاب (قائمة، إنشاء، تعديل، حذف، منح للمستخدمين يدوياً)
    Route::resource('badges', AdminController::class)->except(['show']);

     // إدارة الحلول المعتمدة (عرض الكل، تغيير الحالة، إلغاء الاعتماد)
    Route::resource('solutions', AdminController::class)->except(['create', 'store', 'edit']);

    // قد تحتاج مسارات إضافية لإدارة التعليقات يدوياً أو الإبلاغات إن وجدت

});

```

**محتوى ملفات المتحكمات (Controllers):**

سنقوم بإنشاء هيكل لكل متحكم مع الدوال التي ستؤدي المهام المحددة في المسارات. ستحتوي الدوال على منطق بسيط (مثل جلب البيانات أو توجيه إلى واجهة) لأن الواجهات والمنطق المعقد (مثل التحقق من الصلاحيات الدقيق) سيتم بناؤه لاحقًا.

**1. `app/Http/Controllers/HomeController.php`**

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Problem; // لاستخدام نموذج المشكلة

class HomeController extends Controller
{
    /**
     * Display the home page with recent problems.
     */
    public function index()
    {
        // جلب أحدث المشاكل المنشورة
        $recentProblems = Problem::where('status', 'Published')
                                  ->latest() // ترتيب حسب الأحدث
                                  ->with('submittedBy', 'category') // جلب بيانات الناشر والفئة
                                  ->limit(10) // عرض 10 مشاكل مثلاً
                                  ->get();

        // إرجاع الواجهة (View) وتمرير البيانات إليها
        // ستنشئ هذا الملف لاحقاً: resources/views/home.blade.php
        return view('home', compact('recentProblems'));
    }
}
```

**2. `app/Http/Controllers/AuthController.php`**

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account; // استخدام نموذج الحساب المخصص
use App\Models\UserProfile; // لإنشاء ملف شخصي للمستخدم الفردي
use App\Models\OrganizationProfile; // لإنشاء ملف شخصي للمنظمة
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; // لاستخدام نظام المصادقة في Laravel
use Illuminate\Validation\Rule; // لاستخدام قواعد التحقق المخصصة

class AuthController extends Controller
{
    // عرض نموذج التسجيل
    public function showRegistrationForm()
    {
        // ستنشئ هذا الملف لاحقاً: resources/views/auth/register.blade.php
        return view('auth.register');
    }

    // معالجة بيانات التسجيل
    public function register(Request $request)
    {
        // التحقق من صحة البيانات
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:accounts'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:accounts'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            // التحقق من أن account_type هي إحدى القيم المسموح بها
            'account_type' => ['required', 'string', Rule::in(['individual', 'organization'])],
            // يمكن إضافة قواعد تحقق إضافية هنا إذا كانت حقول ملفات التعريف إلزامية عند التسجيل
            // 'first_name' => Rule::requiredIf($request->account_type === 'individual'),
            // 'name' => Rule::requiredIf($request->account_type === 'organization'),
        ]);

        // إنشاء الحساب في جدول Accounts
        $account = Account::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'account_type' => $request->account_type,
            'is_active' => true, // تفعيل الحساب مباشرة
        ]);

        // إنشاء ملف التعريف المرتبط بناءً على نوع الحساب
        if ($account->account_type === 'individual') {
            UserProfile::create([
                'account_id' => $account->id,
                // يمكن ملء الحقول الإضافية هنا إذا كانت موجودة في نموذج التسجيل
            ]);
        } elseif ($account->account_type === 'organization') {
             OrganizationProfile::create([
                'account_id' => $account->id,
                'name' => $request->name ?? $account->username, // استخدام الاسم المقدم أو اسم المستخدم كاسم مبدئي للمنظمة
                // يمكن ملء الحقول الإضافية هنا
            ]);
        }

        // تسجيل دخول المستخدم تلقائياً بعد التسجيل
        Auth::login($account);

        // إعادة التوجيه إلى الصفحة الرئيسية أو صفحة الملف الشخصي
        return redirect()->route('home')->with('success', 'Account created successfully!');
    }

    // عرض نموذج تسجيل الدخول
    public function showLoginForm()
    {
         // إذا كان المستخدم مسجل دخول بالفعل، قم بإعادة توجيهه
        if (Auth::check()) {
            return redirect()->route('home');
        }
        // ستنشئ هذا الملف لاحقاً: resources/views/auth/login.blade.php
        return view('auth.login');
    }

    // معالجة بيانات تسجيل الدخول
    public function login(Request $request)
    {
        // التحقق من صحة البيانات
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // محاولة تسجيل الدخول باستخدام البريد الإلكتروني وكلمة المرور
        // هنا يستخدم Laravel Guards ونموذج User (الذي أعدنا تسميته Account)
        if (Auth::attempt($credentials, $request->remember)) {
            // التحقق مما إذا كان الحساب نشطاً
            if (!Auth::user()->is_active) {
                 Auth::logout(); // تسجيل الخروج إذا كان الحساب غير نشط
                 $request->session()->invalidate();
                 $request->session()->regenerateToken();
                 return back()->withErrors([
                    'email' => 'Your account is not active.',
                 ])->onlyInput('email');
            }

            $request->session()->regenerate();

            // إعادة التوجيه إلى الصفحة المقصودة أو الرئيسية
            return redirect()->intended(route('home'))->with('success', 'Logged in successfully!');
        }

        // في حالة فشل تسجيل الدخول
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    // تسجيل الخروج
    public function logout(Request $request)
    {
        Auth::logout(); // تسجيل الخروج

        $request->session()->invalidate(); // إبطال الجلسة
        $request->session()->regenerateToken(); // إعادة توليد رمز CSRF

        return redirect('/')->with('success', 'Logged out successfully!'); // إعادة التوجيه إلى الصفحة الرئيسية
    }
}
```

**3. `app/Http/Controllers/ProfileController.php`**

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\UserProfile;
use App\Models\OrganizationProfile;
use App\Models\Address; // لاستخدام نموذج العنوان إذا تم تعديله
use App\Models\City; // لاستخدام نموذج المدينة
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    /**
     * Display a user or organization profile.
     */
    public function show(Account $account)
    {
        // تحميل العلاقة المناسبة (UserProfile أو OrganizationProfile)
        $account->load('userProfile', 'organizationProfile', 'accountBadges.badge'); // حمل الألقاب أيضاً

        // تحديد نوع الملف الشخصي لعرض الواجهة المناسبة
        $profile = $account->isIndividual() ? $account->userProfile : $account->organizationProfile;

        if (!$profile) {
             abort(404, 'Profile not found.'); // إذا لم يتم العثور على ملف شخصي (رغم أن الحساب موجود)
        }

        // ستنشئ الواجهة لاحقاً: resources/views/profiles/show.blade.php
        return view('profiles.show', compact('account', 'profile'));
    }

    /**
     * Show the form for editing the authenticated user's profile.
     */
    public function edit()
    {
        $account = Auth::user(); // الحساب المسجل دخوله
        $account->load('userProfile', 'organizationProfile');

        // تأكد من أن الحساب لديه ملف شخصي
        if (!$account->userProfile && !$account->organizationProfile) {
             return redirect()->route('home')->with('error', 'Your account does not have a profile.');
        }

        $profile = $account->isIndividual() ? $account->userProfile : $account->organizationProfile;
        $cities = City::all(); // لجلب المدن في نموذج العنوان

        // ستنشئ الواجهة لاحقاً: resources/views/profiles/edit.blade.php
        return view('profiles.edit', compact('account', 'profile', 'cities'));
    }

    /**
     * Update the authenticated user's profile in storage.
     */
    public function update(Request $request)
    {
        $account = Auth::user();
        $account->load('userProfile', 'organizationProfile');

        // تحديد قواعد التحقق بناءً على نوع الحساب
        if ($account->isIndividual()) {
            $profile = $account->userProfile;
            $rules = [
                'first_name' => 'nullable|string|max:100',
                'last_name' => 'nullable|string|max:100',
                'phone' => 'nullable|string|max:30',
                'bio' => 'nullable|string',
                'city_id' => 'nullable|exists:cities,id', // التحقق من وجود المدينة
                'street_address' => 'nullable|string|max:255',
                'postal_code' => 'nullable|string|max:20',
            ];
        } elseif ($account->isOrganization()) {
            $profile = $account->organizationProfile;
             $rules = [
                'name' => 'required|string|max:255',
                'info' => 'nullable|string',
                'website_url' => 'nullable|url|max:255',
                'contact_email' => 'nullable|email|max:255',
                'city_id' => 'nullable|exists:cities,id',
                'street_address' => 'nullable|string|max:255',
                'postal_code' => 'nullable|string|max:20',
            ];
        } else {
             // لن يسمح middleware 'auth' بوصول المسؤولين هنا عادةً، لكن من الجيد التحقق
             return redirect()->route('home')->with('error', 'Unauthorized profile update.');
        }

        // التحقق من صحة البيانات
        $request->validate($rules);

        // تحديث بيانات الملف الشخصي
        $profile->fill($request->except(['_token', '_method', 'city_id', 'street_address', 'postal_code']))->save();

        // تحديث أو إنشاء العنوان إذا تم تقديمه
        if ($request->filled('city_id')) {
            // البحث عن العنوان الحالي أو إنشاء عنوان جديد
            $address = $profile->address ?: new Address();
            $address->city_id = $request->city_id;
            $address->street_address = $request->street_address;
            $address->postal_code = $request->postal_code;
            $address->save();

            // ربط العنوان بملف التعريف إذا كان جديدًا
            if (!$profile->address_id) {
                $profile->address_id = $address->id;
                $profile->save();
            }
        } elseif ($profile->address) {
            // حذف العنوان إذا لم يتم تقديم بيانات عنوان جديدة وكان هناك عنوان سابق
             // $profile->address->delete(); // يمكن اختيار حذف العنوان أو لا
             // $profile->address_id = null;
             // $profile->save();
        }


        return redirect()->route('profiles.show', $account)->with('success', 'Profile updated successfully!');
    }

    /**
     * Display the authenticated user's badges.
     */
     public function showMyBadges()
     {
         $account = Auth::user();
         $account->load('accountBadges.badge'); // تحميل الألقاب التي حصل عليها الحساب

         $badges = $account->accountBadges; // collection of AccountBadge models

         // ستنشئ الواجهة لاحقاً: resources/views/profiles/my_badges.blade.php
         return view('profiles.my_badges', compact('account', 'badges'));
     }
}
```

**4. `app/Http/Controllers/ProblemController.php`**

```php
<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use App\Models\ProblemCategory; // لاستخدام نموذج فئات المشاكل
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // للتأكد من المستخدم المسجل دخوله
use Illuminate\Validation\Rule; // لاستخدام قواعد التحقق

class ProblemController extends Controller
{
    /**
     * Display a listing of the problems.
     */
    public function index()
    {
        // جلب جميع المشاكل المنشورة مع معلومات الناشر والفئة
        $problems = Problem::where('status', 'Published')
                           ->with('submittedBy.userProfile', 'submittedBy.organizationProfile', 'category') // تحميل العلاقات
                           ->latest() // ترتيب حسب الأحدث
                           ->paginate(15); // تقسيم النتائج على صفحات

        // ستنشئ الواجهة لاحقاً: resources/views/problems/index.blade.php
        return view('problems.index', compact('problems'));
    }

    /**
     * Show the form for creating a new problem.
     */
    public function create()
    {
        // يجب أن يكون المستخدم مسجل دخول
        // هذا مضمون بواسطة middleware 'auth' على المسار
        $categories = ProblemCategory::all(); // لجلب الفئات لعرضها في النموذج

        // ستنشئ الواجهة لاحقاً: resources/views/problems/create.blade.php
        return view('problems.create', compact('categories'));
    }

    /**
     * Store a newly created problem in storage.
     */
    public function store(Request $request)
    {
        // يجب أن يكون المستخدم مسجل دخول
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:problem_categories,id', // التحقق من وجود الفئة
            'urgency' => ['required', Rule::in(['Low', 'Medium', 'High'])], // التحقق من قيم ENUM
            'tags' => 'nullable|string', // يمكن إضافة تحقق على التنسيق لاحقاً
        ]);

        // إنشاء المشكلة وربطها بالحساب المسجل دخوله
        $problem = Problem::create([
            'title' => $request->title,
            'description' => $request->description,
            'submitted_by_account_id' => Auth::id(), // ربط المشكلة بالمستخدم الحالي
            'category_id' => $request->category_id,
            'urgency' => $request->urgency,
            'status' => 'Published', // الحالة الافتراضية عند الإنشاء
            'tags' => $request->tags,
        ]);

        // إعادة التوجيه إلى صفحة المشكلة التي تم إنشاؤها
        return redirect()->route('problems.show', $problem)->with('success', 'Problem created successfully!');
    }

    /**
     * Display the specified problem.
     */
    public function show(Problem $problem)
    {
        // تحميل العلاقة مع الناشر، الفئة، والتعليقات (مع مؤلفي التعليقات والردود والألقاب والحلول المعتمدة)
        $problem->load([
            'submittedBy.userProfile',
            'submittedBy.organizationProfile',
            'category',
            'comments' => function ($query) {
                $query->whereNull('parent_comment_id') // جلب التعليقات الجذرية فقط
                      ->with('author.userProfile', 'author.organizationProfile', 'replies.author.userProfile', 'replies.author.organizationProfile', 'adoptedSolution'); // تحميل مؤلفي التعليقات والردود الحلول المعتمدة
            }
        ]);

        // ستنشئ الواجهة لاحقاً: resources/views/problems/show.blade.php
        return view('problems.show', compact('problem'));
    }

    /**
     * Show the form for editing the specified problem.
     */
    public function edit(Problem $problem)
    {
        // التحقق من أن المستخدم هو صاحب المشكلة أو مسؤول
        // يمكن استخدام Policies هنا لمزيد من التنظيم: php artisan make:policy ProblemPolicy
        if ($problem->submitted_by_account_id !== Auth::id() && !Auth::user()->isAdmin()) {
            abort(403, 'Unauthorized action.');
        }

        $categories = ProblemCategory::all(); // لجلب الفئات لعرضها في النموذج

        // ستنشئ الواجهة لاحقاً: resources/views/problems/edit.blade.php
        return view('problems.edit', compact('problem', 'categories'));
    }

    /**
     * Update the specified problem in storage.
     */
    public function update(Request $request, Problem $problem)
    {
         // التحقق من أن المستخدم هو صاحب المشكلة أو مسؤول
         if ($problem->submitted_by_account_id !== Auth::id() && !Auth::user()->isAdmin()) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:problem_categories,id',
            'urgency' => ['required', Rule::in(['Low', 'Medium', 'High'])],
            'tags' => 'nullable|string',
            // إذا كان المسؤول يمكنه تغيير الحالة: 'status' => ['required', Rule::in(['Published', 'UnderReview', 'Hidden', 'Suspended', 'Resolved', 'Archived'])],
        ]);

        // تحديث بيانات المشكلة
        $problem->update($request->only(['title', 'description', 'category_id', 'urgency', 'tags']));

        // يمكن هنا إضافة منطق لتغيير الحالة إذا كان المستخدم مسؤولاً
        // if (Auth::user()->isAdmin() && $request->filled('status')) {
        //    $problem->status = $request->status;
        //    $problem->save();
        // }


        return redirect()->route('problems.show', $problem)->with('success', 'Problem updated successfully!');
    }

    /**
     * Remove the specified problem from storage.
     */
    public function destroy(Problem $problem)
    {
        // التحقق من أن المستخدم هو صاحب المشكلة أو مسؤول
         if ($problem->submitted_by_account_id !== Auth::id() && !Auth::user()->isAdmin()) {
            abort(403, 'Unauthorized action.');
        }

        $problem->delete(); // حذف المشكلة (المفاتيح الخارجية مع onDelete('cascade') ستحذف التعليقات المرتبطة تلقائياً)

        return redirect()->route('problems.index')->with('success', 'Problem deleted successfully!');
    }
}
```

**5. `app/Http/Controllers/CommentController.php`**

```php
<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Problem; // قد نحتاج للتحقق من وجود المشكلة
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; // قد نحتاجه لتحديث total_votes

class CommentController extends Controller
{
    /**
     * Store a newly created comment or reply in storage.
     */
    public function store(Request $request)
    {
        // يجب أن يكون المستخدم مسجل دخول
        $request->validate([
            'content' => 'required|string',
            'problem_id' => 'required|exists:problems,id', // التحقق من وجود المشكلة
            'parent_comment_id' => 'nullable|exists:comments,id', // التحقق من وجود التعليق الأم إذا كان رداً
        ]);

        // التأكد من أن التعليق الأم (إن وجد) ينتمي لنفس المشكلة (للحفاظ على التسلسل)
        if ($request->filled('parent_comment_id')) {
            $parentComment = Comment::findOrFail($request->parent_comment_id);
            if ($parentComment->problem_id !== $request->problem_id) {
                 return back()->withErrors(['parent_comment_id' => 'Parent comment does not belong to this problem.'])->withInput();
            }
        }


        // إنشاء التعليق
        $comment = Comment::create([
            'content' => $request->content,
            'author_account_id' => Auth::id(), // ربط التعليق بالمستخدم الحالي
            'problem_id' => $request->problem_id,
            'parent_comment_id' => $request->parent_comment_id,
             'total_votes' => 0, // القيمة الأولية للتصويتات
        ]);

        // إعادة التوجيه غالباً إلى صفحة المشكلة مع التعليق الجديد
        return redirect()->route('problems.show', $request->problem_id)
                         ->with('success', 'Comment added successfully!')
                         ->withFragment('comment-' . $comment->id); // يمكن التوجيه إلى التعليق الجديد

    }

    /**
     * Show the form for editing the specified comment.
     * (May be handled via AJAX or modal in the view)
     */
    public function edit(Comment $comment)
    {
         // التحقق من أن المستخدم هو صاحب التعليق أو مسؤول
        if ($comment->author_account_id !== Auth::id() && !Auth::user()->isAdmin()) {
            abort(403, 'Unauthorized action.');
        }

        // إرجاع الواجهة أو بيانات التعليق للتعديل
        // ستنشئ الواجهة لاحقاً: resources/views/comments/edit.blade.php (أو استخدمها لـ AJAX)
        return view('comments.edit', compact('comment'));
    }

    /**
     * Update the specified comment in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        // التحقق من أن المستخدم هو صاحب التعليق أو مسؤول
         if ($comment->author_account_id !== Auth::id() && !Auth::user()->isAdmin()) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'content' => 'required|string',
        ]);

        // تحديث محتوى التعليق
        $comment->update($request->only(['content']));

        // إعادة التوجيه إلى صفحة المشكلة أو مكان التعليق
        return redirect()->route('problems.show', $comment->problem_id)
                         ->with('success', 'Comment updated successfully!')
                         ->withFragment('comment-' . $comment->id);

    }

    /**
     * Remove the specified comment from storage.
     */
    public function destroy(Comment $comment)
    {
        // التحقق من أن المستخدم هو صاحب التعليق أو مسؤول
         if ($comment->author_account_id !== Auth::id() && !Auth::user()->isAdmin()) {
            abort(403, 'Unauthorized action.');
        }

        $problemId = $comment->problem_id; // حفظ معرّف المشكلة قبل الحذف

        // ملاحظة: حذف تعليق أم سيحذف التعليقات الأبناء أيضاً إذا كان onDelete('cascade')
        // الحلول المعتمدة المرتبطة بهذا التعليق ستُحذف أيضاً
        $comment->delete();


        return redirect()->route('problems.show', $problemId)->with('success', 'Comment deleted successfully!');
    }
}
```

**6. `app/Http/Controllers/CommentVoteController.php`**

```php
<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\CommentVote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; // قد نحتاجه للتحديثات المجمعة أو المشغلات

class CommentVoteController extends Controller
{
    /**
     * Handle a vote on a comment.
     * Expects comment_id and vote_type (+1 or -1).
     */
    public function vote(Request $request, Comment $comment)
    {
        // يجب أن يكون المستخدم مسجل دخول
        // هذا مضمون بواسطة middleware 'auth' على المسار

        $request->validate([
            'vote_value' => ['required', 'integer', Rule::in([-1, 1])], // التحقق من أن القيمة هي +1 أو -1
        ]);

        $userAccount = Auth::user();

        // لا يمكن للمستخدم التصويت على تعليقاته الخاصة
        if ($comment->author_account_id === $userAccount->id) {
            // يمكنك إرجاع رسالة خطأ أو تجاهل التصويت
             return back()->with('error', 'You cannot vote on your own comment.');
             // أو في حالة AJAX/API: return response()->json(['message' => 'Cannot vote on own comment'], 403);
        }

        // البحث عن التصويت الحالي لهذا المستخدم على هذا التعليق
        $existingVote = CommentVote::where('comment_id', $comment->id)
                                   ->where('voter_account_id', $userAccount->id)
                                   ->first();

        $newVoteValue = $request->vote_value;
        $voteChange = 0; // التغيير الذي سيطرأ على total_votes

        if ($existingVote) {
            // إذا كان التصويت الحالي هو نفس التصويت الجديد، فهذا يعني سحب التصويت
            if ($existingVote->vote_value === $newVoteValue) {
                $existingVote->delete();
                $voteChange = -$newVoteValue; // عكس قيمة التصويت المسحوب (إذا كان +1 يصبح -1، وإذا كان -1 يصبح +1)
                $message = 'Vote removed.';
            } else { // إذا كان التصويت الحالي مختلفاً عن التصويت الجديد، فهذا يعني تغيير التصويت
                $existingVote->vote_value = $newVoteValue;
                $existingVote->save();
                $voteChange = $newVoteValue * 2; // مثال: من -1 إلى +1 يعني +2، من +1 إلى -1 يعني -2
                $message = 'Vote changed successfully.';
            }
        } else {
            // إذا لم يكن هناك تصويت سابق، قم بإنشاء تصويت جديد
            CommentVote::create([
                'comment_id' => $comment->id,
                'voter_account_id' => $userAccount->id,
                'vote_value' => $newVoteValue,
            ]);
            $voteChange = $newVoteValue; // إضافة قيمة التصويت الجديدة
            $message = 'Vote recorded successfully.';
        }

        // تحديث إجمالي التصويتات في جدول Comments
        // هذه طريقة بسيطة، يفضل استخدام مشغل (Trigger) في قاعدة البيانات
        // أو نظام رسائل (Queues) لضمان مزامنة دقيقة وغير مانعة للطلب
        $comment->total_votes += $voteChange;
        $comment->save();

        // يمكن هنا إضافة منطق لمنح نقاط للمستخدم الذي يتلقى upvotes لتعليقاته

        // إعادة التوجيه أو إرجاع استجابة JSON إذا كانت العملية عبر AJAX
        if ($request->expectsJson()) {
             return response()->json(['message' => $message, 'new_total_votes' => $comment->total_votes]);
        }

        return back()->with('success', $message)->withFragment('comment-' . $comment->id); // التوجيه إلى التعليق

    }
}
```

**7. `app/Http/Controllers/BadgeController.php`**

```php
<?php

namespace App\Http\Controllers;

use App\Models\Badge;
use Illuminate\Http\Request;

class BadgeController extends Controller
{
    /**
     * Display a listing of all available badges.
     */
    public function index()
    {
        $badges = Badge::all(); // جلب جميع الألقاب

        // ستنشئ الواجهة لاحقاً: resources/views/badges/index.blade.php
        return view('badges.index', compact('badges'));
    }

    // لا حاجة لدوال show, create, store, edit, update, destroy هنا
    // إدارة الألقاب ستكون في لوحة تحكم المسؤول
}
```

**8. `app/Http/Controllers/OrganizationController.php`**

```php
<?php

namespace App\Http\Controllers;

use App\Models\OrganizationProfile;
use App\Models\Comment;
use App\Models\Solution; // نموذج الحل المعتمد
use App\Models\Account; // لجلب مؤلف التعليق لمنحه النقاط
use App\Models\ProblemCategory; // لإدارة اهتمامات الفئات
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrganizationController extends Controller
{
     // يجب تطبيق middleware 'isOrganization' على جميع دوال هذا المتحكم عبر المسارات أو في الدالة الإنشائية (__construct)

     public function __construct()
     {
        $this->middleware('isOrganization'); // هذا الـ middleware يجب أن تنشئه يدوياً (تحقق من نوع الحساب)
     }

    /**
     * Handle the action of an organization adopting a comment as a solution.
     */
    public function adoptComment(Request $request, Comment $comment)
    {
        // التأكد أن المستخدم الحالي هو منظمة
        $organizationAccount = Auth::user();
        if (!$organizationAccount->isOrganization() || !$organizationAccount->organizationProfile) {
             abort(403, 'Unauthorized action.'); // هذا يجب أن يتم بواسطة middleware 'isOrganization'
        }

        // التأكد من أن التعليق لم يتم اعتماده كحل بالفعل
        if ($comment->adoptedSolution) {
             return back()->with('error', 'This comment has already been adopted as a solution.');
        }

        // التأكد من أن التعليق ليس من تأليف نفس المنظمة (قاعدة عمل، يمكن تعديلها)
         if ($comment->author_account_id === $organizationAccount->id) {
             return back()->with('error', 'You cannot adopt your own comment as a solution.');
         }

        // الحصول على ملف المنظمة الحالي
        $organizationProfile = $organizationAccount->organizationProfile;

        // إنشاء سجل الحل المعتمد
        $solution = Solution::create([
            'comment_id' => $comment->id,
            'adopting_organization_profile_id' => $organizationProfile->id,
            'status' => 'UnderConsideration', // الحالة الأولية
            'organization_notes' => 'Comment adopted for review.', // ملاحظة أولية
        ]);

        // --- منح نقاط لمؤلف التعليق ---
        $authorAccount = Account::find($comment->author_account_id);
        if ($authorAccount) {
            $pointsToAdd = 100; // مثال: نقاط تمنح عند اعتماد تعليق كحل
            $authorAccount->points += $pointsToAdd;
            $authorAccount->save();

            // هنا يمكنك إضافة منطق لفحص إذا كان المستخدم يستحق شارة جديدة بناءً على النقاط وعدد الحلول المعتمدة
            // يمكنك استدعاء دالة مساعدة أو بث حدث (Event) هنا.
            // Example: event(new \App\Events\CommentAdopted($comment, $organizationAccount, $pointsToAdd));
        }
         // --- نهاية منطق منح النقاط ---


        return redirect()->route('organization.showAdoptedSolution', $solution)
                         ->with('success', 'Comment adopted as a solution successfully! Points awarded to author.');
    }

    /**
     * Display a listing of solutions adopted by the current organization.
     */
    public function listAdoptedSolutions()
    {
        $organizationAccount = Auth::user();
        $organizationProfile = $organizationAccount->organizationProfile;

        if (!$organizationProfile) {
             return redirect()->route('home')->with('error', 'Organization profile not found.');
        }

        // جلب الحلول المعتمدة من قبل هذه المنظمة، مع تحميل التعليق الأصلي والمشكلة
        $adoptedSolutions = Solution::where('adopting_organization_profile_id', $organizationProfile->id)
                                     ->with('adoptedComment.problem', 'adoptedComment.author.userProfile', 'adoptedComment.author.organizationProfile')
                                     ->latest()
                                     ->paginate(10);

        // ستنشئ الواجهة لاحقاً: resources/views/organization/adopted_solutions/index.blade.php
        return view('organization.adopted_solutions.index', compact('adoptedSolutions', 'organizationProfile'));
    }

    /**
     * Display the specified adopted solution for the organization.
     */
    public function showAdoptedSolution(Solution $solution)
    {
         $organizationAccount = Auth::user();

         // التأكد أن هذه المنظمة هي من اعتمدت هذا الحل
         if ($solution->adopting_organization_profile_id !== $organizationAccount->organizationProfile->id) {
             abort(403, 'Unauthorized action.');
         }

         // تحميل العلاقات اللازمة
         $solution->load('adoptedComment.problem', 'adoptedComment.author.userProfile', 'adoptedComment.author.organizationProfile');

        // ستنشئ الواجهة لاحقاً: resources/views/organization/adopted_solutions/show.blade.php
        return view('organization.adopted_solutions.show', compact('solution'));
    }


     /**
     * Update the status of the specified adopted solution.
     */
    public function updateAdoptedSolutionStatus(Request $request, Solution $solution)
    {
        $organizationAccount = Auth::user();

         // التأكد أن هذه المنظمة هي من اعتمدت هذا الحل
         if ($solution->adopting_organization_profile_id !== $organizationAccount->organizationProfile->id) {
             abort(403, 'Unauthorized action.');
         }

        $request->validate([
            'status' => ['required', Rule::in(['UnderConsideration', 'Adopted', 'ImplementationInProgress', 'ImplementationCompleted', 'RejectedByOrganization'])],
             'organization_notes' => 'nullable|string',
        ]);

        // تحديث الحالة والملاحظات
        $solution->update($request->only(['status', 'organization_notes']));

        return redirect()->route('organization.showAdoptedSolution', $solution)
                         ->with('success', 'Solution status updated successfully!');
    }

     /**
     * Show the form for editing organization category interests.
     */
    public function editCategoryInterests()
    {
        $organizationAccount = Auth::user();
        $organizationProfile = $organizationAccount->organizationProfile;

        if (!$organizationProfile) {
             return redirect()->route('home')->with('error', 'Organization profile not found.');
        }

        $allCategories = ProblemCategory::whereNull('parent_category_id')->with('children')->get(); // جلب الفئات الرئيسية مع الفئات الفرعية
        $organizationInterests = $organizationProfile->categoryInterests()->pluck('problem_category_id')->toArray(); // جلب معرّفات الفئات التي تهتم بها المنظمة حالياً

        // ستنشئ الواجهة لاحقاً: resources/views/organization/category_interests/edit.blade.php
        return view('organization.category_interests.edit', compact('organizationProfile', 'allCategories', 'organizationInterests'));
    }

     /**
     * Update organization category interests.
     */
    public function updateCategoryInterests(Request $request)
    {
        $organizationAccount = Auth::user();
        $organizationProfile = $organizationAccount->organizationProfile;

        if (!$organizationProfile) {
             return redirect()->route('home')->with('error', 'Organization profile not found.');
        }

        $request->validate([
            'categories' => 'nullable|array', // يجب أن يكون مصفوفة
            'categories.*' => 'exists:problem_categories,id', // كل عنصر في المصفوفة يجب أن يكون معرّف فئة موجود
        ]);

        $categoriesToSync = $request->input('categories', []); // الحصول على مصفوفة معرّفات الفئات المختارة

        // استخدام دالة sync() للربط في الجداول Pivot
        // هذه الدالة تحذف الارتباطات القديمة وتضيف الارتباطات الجديدة بناءً على المصفوفة المقدمة
        $organizationProfile->categoryInterests()->sync($categoriesToSync);

        return redirect()->route('organization.listAdoptedSolutions')->with('success', 'Category interests updated successfully!'); // يمكن التوجيه لصفحة أخرى مناسبة
    }

    // الدوال المتعلقة بـ SolutionController يمكن دمجها هنا أيضاً إذا أردت تبسيط الهيكل
    // أو بقاؤها في SolutionController إذا كان المنطق المشترك بين المنظمات والمسؤولين (مثلاً عرض الحلول لكل المنظمات) أكثر منطقية هناك.
}
```
**ملاحظة**: تحتاج لإنشاء Middleware باسم `IsOrganization` للتحقق من نوع الحساب. يمكنك إنشاءه باستخدام `php artisan make:middleware IsOrganization` وتعديل دالة `handle` للتحقق من `Auth::user()->isOrganization()`. ثم تسجيله في `app/Http/Kernel.php`.

**9. `app/Http/Controllers/SolutionController.php`**

هذا المتحكم يمكن استخدامه لعرض قائمة بجميع الحلول المعتمدة أو تفاصيل حل معين بشكل عام (للمسؤولين مثلاً أو في صفحة عرض الحلول المعتمدة بشكل عام).

```php
<?php

namespace App\Http\Controllers;

use App\Models\Solution;
use Illuminate\Http\Request;

class SolutionController extends Controller
{
    /**
     * Display a listing of all adopted solutions (potentially for admin or general viewing).
     */
    public function index()
    {
        // يمكن تصفية هذه القائمة للمسؤولين فقط أو عرضها بشكل عام
        // لنفترض هنا أنها لوحة عرض عامة للحلول الناجحة
        $adoptedSolutions = Solution::with('adoptedComment.problem', 'adoptingOrganization.account', 'adoptedComment.author.userProfile', 'adoptedComment.author.organizationProfile')
                                     // يمكن إضافة تصفية للحالة مثلاً 'ImplementationCompleted' أو 'Adopted'
                                     // ->where('status', 'ImplementationCompleted')
                                     ->latest('updated_at') // ترتيب حسب آخر تحديث للحالة
                                     ->paginate(15);

        // ستنشئ الواجهة لاحقاً: resources/views/solutions/index.blade.php
        return view('solutions.index', compact('adoptedSolutions'));
    }

    /**
     * Display the specified adopted solution.
     */
    public function show(Solution $solution)
    {
        // تحميل العلاقات اللازمة
        $solution->load('adoptedComment.problem', 'adoptingOrganization.account', 'adoptedComment.author.userProfile', 'adoptedComment.author.organizationProfile');

        // ستنشئ الواجهة لاحقاً: resources/views/solutions/show.blade.php
        return view('solutions.show', compact('solution'));
    }

    // يمكن إضافة دوال أخرى هنا إذا كانت هناك عمليات عامة على الحلول (غير خاصة بالمنظمة التي اعتمدتها)
    // إدارة الحالة أو الحذف ستكون في متحكم المسؤول
}
```

**10. `app/Http/Controllers/AdminController.php`**

هذا المتحكم سيكون نقطة الدخول لإدارة الموقع من قبل المسؤولين. المتحكمات المنفصلة ضمن مجلد `Admin` (مثل `Admin\AccountsController`, `Admin\ProblemsController`) هي ممارسة أفضل لمشروع أكبر، لكن لهذا المثال سنضع الوظائف الأساسية هنا.

```php
<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Problem;
use App\Models\Comment;
use App\Models\Solution;
use App\Models\ProblemCategory;
use App\Models\Badge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // يجب تطبيق middleware 'isAdmin' على جميع دوال هذا المتحكم عبر المسارات أو في الدالة الإنشائية (__construct)

    public function __construct()
    {
       $this->middleware('isAdmin'); // هذا الـ middleware يجب أن تنشئه يدوياً (تحقق من نوع الحساب 'admin')
    }

    /**
     * Display the admin dashboard.
     */
    public function dashboard()
    {
        // جلب إحصائيات سريعة للمسؤول (عدد المستخدمين، المشاكل، الحلول، إلخ)
        $accountsCount = Account::count();
        $problemsCount = Problem::count();
        $commentsCount = Comment::count();
        $adoptedSolutionsCount = Solution::count();

        // ستنشئ الواجهة لاحقاً: resources/views/admin/dashboard.blade.php
        return view('admin.dashboard', compact('accountsCount', 'problemsCount', 'commentsCount', 'adoptedSolutionsCount'));
    }

    // --- Account Management ---
    // تستخدم للمسارات admin/accounts

    public function indexAccounts() // استخدم تسمية مميزة لتجنب التضارب إذا دمجت جداول متعددة في متحكم واحد
    {
        $accounts = Account::with('userProfile', 'organizationProfile')->paginate(20);
        // ستنشئ الواجهة لاحقاً: resources/views/admin/accounts/index.blade.php
        return view('admin.accounts.index', compact('accounts'));
    }

    public function editAccount(Account $account)
    {
        $account->load('userProfile', 'organizationProfile');
        // ستنشئ الواجهة لاحقاً: resources/views/admin/accounts/edit.blade.php
         return view('admin.accounts.edit', compact('account'));
    }

     public function updateAccount(Request $request, Account $account)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255', Rule::unique('accounts')->ignore($account->id)],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('accounts')->ignore($account->id)],
            'account_type' => ['required', 'string', Rule::in(['individual', 'organization', 'admin'])],
            'points' => 'required|integer|min:0',
            'is_active' => 'boolean',
            // يمكن إضافة تحقق لحقول ملفات التعريف هنا أو في دوال تحديث منفصلة
        ]);

        $account->update($request->only(['username', 'email', 'account_type', 'points', 'is_active']));

        // تحديث ملف التعريف المرتبط إذا لزم الأمر (منطق أكثر تعقيداً إذا سمح بتغيير النوع)

        return redirect()->route('admin.accounts.index')->with('success', 'Account updated successfully.');
    }

    public function destroyAccount(Account $account)
    {
        // تحذير: حذف حساب سيحذف كل شيء مرتبط به بسبب onDelete('cascade')
        // يجب تأكيد هذه العملية في الواجهة
        $account->delete();
        return redirect()->route('admin.accounts.index')->with('success', 'Account deleted successfully.');
    }


    // --- Problem Management ---
    // تستخدم للمسارات admin/problems (resource)

     public function indexProblems() // استخدم تسمية مميزة
    {
        $problems = Problem::with('submittedBy', 'category')->latest()->paginate(20);
        // ستنشئ الواجهة لاحقاً: resources/views/admin/problems/index.blade.php
        return view('admin.problems.index', compact('problems'));
    }

     public function editProblem(Problem $problem) // تستخدم للمسار problems/{problem}/edit
    {
         $categories = ProblemCategory::all();
        // ستنشئ الواجهة لاحقاً: resources/views/admin/problems/edit.blade.php
         return view('admin.problems.edit', compact('problem', 'categories'));
    }

    public function updateProblem(Request $request, Problem $problem) // تستخدم للمسار problems/{problem} (PUT)
    {
         $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:problem_categories,id',
            'urgency' => ['required', Rule::in(['Low', 'Medium', 'High'])],
            'status' => ['required', Rule::in(['Draft', 'Published', 'UnderReview', 'Hidden', 'Suspended', 'Resolved', 'Archived'])], // المسؤول يمكنه تغيير كل الحالات
            'tags' => 'nullable|string',
        ]);

        $problem->update($request->only(['title', 'description', 'category_id', 'urgency', 'status', 'tags']));

        return redirect()->route('admin.problems.index')->with('success', 'Problem updated successfully.');
    }

    public function destroyProblem(Problem $problem) // تستخدم للمسار problems/{problem} (DELETE)
    {
        $problem->delete();
        return redirect()->route('admin.problems.index')->with('success', 'Problem deleted successfully.');
    }

    // --- Category Management ---
    // تستخدم للمسارات admin/categories (resource)

    public function indexCategories() { /* ... */ }
    public function createCategory() { /* ... */ }
    public function storeCategory(Request $request) { /* ... */ }
    public function editCategory(ProblemCategory $category) { /* ... */ }
    public function updateCategory(Request $request, ProblemCategory $category) { /* ... */ }
    public function destroyCategory(ProblemCategory $category) { /* ... */ }


    // --- Badge Management ---
    // تستخدم للمسارات admin/badges (resource)

    public function indexBadges() { /* ... */ }
    public function createBadge() { /* ... */ }
    public function storeBadge(Request $request) { /* ... */ }
    public function editBadge(Badge $badge) { /* ... */ }
    public function updateBadge(Request $request, Badge $badge) { /* ... */ }
    public function destroyBadge(Badge $badge) { /* ... */ }
    // يمكن إضافة دالة لمنح شارة لمستخدم معين يدوياً

    // --- Adopted Solution Management ---
    // تستخدم للمسارات admin/solutions (resource)

    public function indexAdoptedSolutions() // استخدم تسمية مميزة
    {
        $adoptedSolutions = Solution::with('adoptedComment.problem', 'adoptingOrganization.account', 'adoptedComment.author')->latest('updated_at')->paginate(20);
         // ستنشئ الواجهة لاحقاً: resources/views/admin/solutions/index.blade.php
        return view('admin.solutions.index', compact('adoptedSolutions'));
    }

     public function showAdoptedSolution(Solution $solution) // تستخدم للمسار solutions/{solution}
    {
         $solution->load('adoptedComment.problem', 'adoptingOrganization.account', 'adoptedComment.author.userProfile', 'adoptedComment.author.organizationProfile');
         // ستنشئ الواجهة لاحقاً: resources/views/admin/solutions/show.blade.php
        return view('admin.solutions.show', compact('solution'));
    }

    public function updateAdoptedSolution(Request $request, Solution $solution) // تستخدم للمسار solutions/{solution} (PUT)
    {
         $request->validate([
            'status' => ['required', Rule::in(['UnderConsideration', 'Adopted', 'ImplementationInProgress', 'ImplementationCompleted', 'RejectedByOrganization'])],
             'organization_notes' => 'nullable|string',
             // المسؤول قد يغير المنظمة المعتمدة أو التعليق المرتبط! (لكن هذا نادر ومعقد)
        ]);

        $solution->update($request->only(['status', 'organization_notes']));

        return redirect()->route('admin.solutions.index')->with('success', 'Adopted solution updated successfully.');
    }

     public function destroyAdoptedSolution(Solution $solution) // تستخدم للمسار solutions/{solution} (DELETE)
    {
        $solution->delete();
        return redirect()->route('admin.solutions.index')->with('success', 'Adopted solution deleted successfully.');
    }

    // ... يمكن إضافة المزيد من الدوال الإدارية للتعليقات يدوياً، التقارير، إلخ.
}
```

**ملاحظات هامة:**

*   **Middleware:** تحتاج لإنشاء Middleware باسم `IsOrganization` و `IsAdmin` للتحقق من نوع الحساب المسجل دخوله قبل السماح بالوصول إلى المسارات الخاصة بالمنظمات أو المسؤولين. قم بإنشاء هذه الـ Middlewares باستخدام `php artisan make:middleware IsOrganization` و `php artisan make:middleware IsAdmin`، ثم قم بتسجيلها في ملف `app/Http/Kernel.php` في مصفوفة `$routeMiddleware`. داخل دالة `handle` في كل Middleware، قم بالتحقق من `Auth::check()` ثم من `Auth::user()->account_type`.
*   **Authorization (الصلاحيات):** بالإضافة إلى التحقق من نوع الحساب (Middleware)، يجب عليك تطبيق منطق التحقق من الصلاحيات الدقيق داخل المتحكمات. مثلاً، التأكد أن المستخدم الذي يحاول تعديل مشكلة هو فعلاً صاحب المشكلة أو مسؤول. Laravel Policies هي الأداة المناسبة لذلك (`php artisan make:policy ProblemPolicy`).
*   **Validation:** تم إضافة قواعد تحقق أساسية في معظم الدوال التي تستقبل بيانات (`store`, `update`). يجب عليك توسيع هذه القواعد لتغطية جميع الحالات.
*   **الواجهات (Views):** المتحكمات الآن جاهزة لاستدعاء الواجهات المناسبة (`return view(...)`). خطوتك التالية هي إنشاء مجلد `resources/views` داخله مجلدات فرعية مثل `auth`, `problems`, `profiles`, `admin`, إلخ، ووضع ملفات `blade.php` بداخلها لتصميم الواجهة الأمامية.
*   **Ajax/API:** بعض العمليات (مثل التصويت على التعليقات، أو ربما إضافة التعليقات والردود بدون تحديث كامل للصفحة) قد تكون أفضل عبر Ajax أو API. إذا اخترت ذلك، ستحتاج لتعريف مسارات API في `routes/api.php` وتعديل المتحكمات المعنية لترجع استجابات JSON بدلاً من إعادة التوجيه أو الواجهات. المتحكم `CommentVoteController` مهيأ بالفعل ليرجع JSON إذا كان الطلب يتوقع ذلك.
*   **المرونة:** الهيكل المقترح يحاول الفصل بين الاهتمامات قدر الإمكان. يمكنك دمج بعض الدوال في متحكمات أقل إذا كان المشروع صغيراً، أو توسيعها إلى متحكمات أكثر تخصصًا إذا أصبح المشروع كبيراً ومعقداً (كما أشرت لمتحكمات Admin المنفصلة).

الآن لديك أساس المتحكمات والمسارات لمشروعك. الخطوة التالية الأكثر وضوحًا هي البدء في بناء الواجهات (Views) لكل صفحة تشير إليها المتحكمات.



-----------

تمام، دعنا ننفذ الملاحظات الهامة المتعلقة بالـ Middleware والصلاحيات (Policies).

**أولاً: إنشاء وتسجيل Middleware للتحقق من نوع الحساب**

سنقوم بإنشاء اثنين من Middlewares: واحد للمنظمات (`IsOrganization`) والآخر للمسؤولين (`IsAdmin`).

1.  **إنشاء ملفات Middleware:**

    نفّذ الأوامر التالية في سطر الأوامر داخل مجلد مشروعك:

    ```bash
    php artisan make:middleware IsOrganization
    php artisan make:middleware IsAdmin
    ```

    سيتم إنشاء الملفين في المجلد `app/Http/Middleware`.

2.  **ملء محتوى ملف `IsOrganization.php`:**

    افتح الملف `app/Http/Middleware/IsOrganization.php` واملأ دالة `handle` كالتالي:

    ```php
    <?php

    namespace App\Http\Middleware;

    use Closure;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth; // لاستخدام Auth Facade
    use Symfony\Component\HttpFoundation\Response;

    class IsOrganization
    {
        /**
         * Handle an incoming request.
         *
         * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
         */
        public function handle(Request $request, Closure $next): Response
        {
            // التحقق أولاً إذا كان المستخدم مسجل دخول
            if (!Auth::check()) {
                // إذا لم يكن مسجل دخول، قم بإعادة التوجيه إلى صفحة تسجيل الدخول أو عرض خطأ 403
                 return redirect()->route('login'); // أو abort(403, 'Unauthorized.');
            }

            // التحقق إذا كان الحساب المسجل دخوله هو من نوع 'organization'
            if (Auth::user()->account_type !== 'organization') {
                // إذا لم يكن من نوع منظمة، عرض خطأ 403 ممنوع
                abort(403, 'Access Denied. Organizations only.');
            }

            // إذا كان مسجل دخول ومن نوع منظمة، استمر في معالجة الطلب
            return $next($request);
        }
    }
    ```

3.  **ملء محتوى ملف `IsAdmin.php`:**

    افتح الملف `app/Http/Middleware/IsAdmin.php` واملأ دالة `handle` كالتالي:

    ```php
    <?php

    namespace App\Http\Middleware;

    use Closure;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth; // لاستخدام Auth Facade
    use Symfony\Component\HttpFoundation\Response;

    class IsAdmin
    {
        /**
         * Handle an incoming request.
         *
         * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
         */
        public function handle(Request $request, Closure $next): Response
        {
            // التحقق أولاً إذا كان المستخدم مسجل دخول
            if (!Auth::check()) {
                 return redirect()->route('login'); // أو abort(403, 'Unauthorized.');
            }

            // التحقق إذا كان الحساب المسجل دخوله هو من نوع 'admin'
            if (Auth::user()->account_type !== 'admin') {
                // إذا لم يكن من نوع مسؤول، عرض خطأ 403 ممنوع
                abort(403, 'Access Denied. Admins only.');
            }

            // إذا كان مسجل دخول ومن نوع مسؤول، استمر في معالجة الطلب
            return $next($request);
        }
    }
    ```

4.  **تسجيل Middleware في `app/Http/Kernel.php`:**

    افتح الملف `app/Http/Kernel.php`، وابحث عن المصفوفة `$routeMiddleware`. أضف مفتاحًا وقيمة لكل Middleware جديد:

    ```php
    protected $routeMiddleware = [
        // ... Middlewares الأخرى الموجودة
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,

        // سجل Middlewares المخصصة هنا
        'isOrganization' => \App\Http\Middleware\IsOrganization::class,
        'isAdmin' => \App\Http\Middleware\IsAdmin::class,
    ];
    ```

الآن يمكنك استخدام المفاتيح `'isOrganization'` و `'isAdmin'` في تعريف المسارات لتطبيق هذه القيود.

**ثانياً: إنشاء Policy للتحقق من الصلاحيات الدقيقة (ProblemPolicy كمثال)**

Policy هي فئة تنظم منطق الصلاحيات لموديل معين.

1.  **إنشاء ملف Policy:**

    نفّذ الأمر التالي:

    ```bash
    php artisan make:policy ProblemPolicy --model=Problem
    ```

    سيتم إنشاء الملف في `app/Policies/ProblemPolicy.php` وتضمين النموذج `Problem` تلقائيًا.

2.  **ملء محتوى ملف `ProblemPolicy.php`:**

    سنقوم بتعريف الدوال الأساسية للتحقق من صلاحيات إنشاء، تعديل، وحذف المشاكل.

    ```php
    <?php

    namespace App\Policies;

    use App\Models\Account; // استخدم نموذج الحساب الخاص بك
    use App\Models\Problem;
    use Illuminate\Auth\Access\Response;

    class ProblemPolicy
    {
        /**
         * Determine whether the user can view any models.
         */
        public function viewAny(Account $account): bool
        {
            // يمكن لأي مستخدم مسجل دخول عرض قائمة المشاكل المنشورة
            // منطق العرض نفسه (فلترة المشاكل المنشورة) يتم في المتحكم
            return true;
        }

        /**
         * Determine whether the user can view the model.
         */
        public function view(Account $account, Problem $problem): bool
        {
            // يمكن لأي مستخدم مسجل دخول عرض مشكلة منشورة
            // يمكن تعديل هذا إذا كانت هناك حالات خاصة (مسودات للمالك، إلخ)
             return $problem->status === 'Published' || ($problem->status === 'Draft' && $account->id === $problem->submitted_by_account_id) || $account->isAdmin();
        }


         /**
         * Determine whether the user can create models.
         */
        public function create(Account $account): bool
        {
            // يمكن للأفراد والمنظمات إنشاء مشاكل
            // المسؤولين يمكنهم إنشاء مشاكل أيضاً (يمكن تعديل الشرط إذا كانوا لا يفعلون ذلك عبر الواجهة العادية)
            return in_array($account->account_type, ['individual', 'organization', 'admin']);
        }

        /**
         * Determine whether the user can update the model.
         */
        public function update(Account $account, Problem $problem): bool
        {
            // يمكن للمستخدم تحديث المشكلة إذا كان هو صاحبها
            return $account->id === $problem->submitted_by_account_id;

            // ملاحظة: صلاحية المسؤول للتحكم بالمشاكل ستتم معالجتها في دالة before
        }

        /**
         * Determine whether the user can delete the model.
         */
        public function delete(Account $account, Problem $problem): bool
        {
            // يمكن للمستخدم حذف المشكلة إذا كان هو صاحبها
            return $account->id === $problem->submitted_by_account_id;

            // ملاحظة: صلاحية المسؤول للحذف ستتم معالجتها في دالة before
        }

        // يمكنك إضافة المزيد من الدوال مثل forceDelete, restore إذا كانت منطقية لتطبيقك

        /**
         * Determine whether the user can permanently delete the model.
         */
        public function forceDelete(Account $account, Problem $problem): bool
        {
            // عادةً، فقط المسؤول يمكنه الحذف النهائي
            return $account->isAdmin();
        }

        /**
         * Determine whether the user can restore the model.
         */
        public function restore(Account $account, Problem $problem): bool
        {
            // عادةً، فقط المسؤول يمكنه استعادة مشكلة محذوفة (soft delete)
             return $account->isAdmin();
        }


         /**
         * Perform pre-authorization checks.
         * تسمح للمسؤول بتجاوز جميع الفحوصات الأخرى.
         * تُستدعى قبل أي دالة صلاحية أخرى في هذا Policy.
         */
        public function before(Account $account, string $ability): bool|null
        {
            // إذا كان المستخدم مسؤولاً، اسمح له بالقيام بأي شيء
            if ($account->isAdmin()) {
                return true;
            }

            // أرجع null للسماح للدالة المحددة (update, delete, etc.) بمعالجة الطلب
            return null;
        }
    }
    ```

3.  **تسجيل Policy في `AuthServiceProvider`:**

    افتح الملف `app/Providers/AuthServiceProvider.php`. ابحث عن المصفوفة `$policies` وأضف السطر التالي لربط نموذج `Problem` بـ `ProblemPolicy`:

    ```php
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy', // مثال افتراضي
        \App\Models\Problem::class => \App\Policies\ProblemPolicy::class,
         \App\Models\Comment::class => \App\Policies\CommentPolicy::class, // ستنشئها لاحقاً
         \App\Models\Solution::class => \App\Policies\SolutionPolicy::class, // ستنشئها لاحقاً للمسؤولين أو المنظمات
         \App\Models\Account::class => \App\Policies\AccountPolicy::class, // لصلاحيات تعديل الحسابات (للمسؤول أو صاحب الحساب)
         // ... إلخ لباقي النماذج التي تتطلب صلاحيات دقيقة
    ];
    ```

**ثالثاً: استخدام Policies في المتحكمات (تعديل ProblemController كمثال)**

الآن، بدلًا من التحقق اليدوي من الصلاحيات داخل دالة المتحكم، سنستخدم الدالة المساعدة `authorize` المتوفرة.

افتح ملف `app/Http/Controllers/ProblemController.php` وعدّل الدوال التالية لاستخدام `authorize`:

```php
<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use App\Models\ProblemCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Auth\Access\AuthorizationException; // استورد هذا لاستخدامه في catch إذا لزم الأمر

class ProblemController extends Controller
{
     // يمكن هنا تعريف middleware auth في الدالة الإنشائية للتأكد أن المستخدم مسجل دخول لجميع الدوال باستثناء index و show
    public function __construct()
    {
       $this->middleware('auth')->except(['index', 'show']);
       // Middleware الصلاحيات الدقيقة (can) يمكن تطبيقه هنا أيضاً أو تركه في الدالة نفسها
       // $this->middleware('can:create,App\Models\Problem')->only(['create', 'store']);
       // $this->middleware('can:update,problem')->only(['edit', 'update']);
       // $this->middleware('can:delete,problem')->only(['destroy']);
    }

    /**
     * Show the form for creating a new problem.
     */
    public function create()
    {
        // التحقق من صلاحية إنشاء مشكلة باستخدام Policy
        $this->authorize('create', Problem::class); // يمرر اسم النموذج للفحص في Policy

        $categories = ProblemCategory::all();
        return view('problems.create', compact('categories'));
    }

    /**
     * Store a newly created problem in storage.
     */
    public function store(Request $request)
    {
        // التحقق من صلاحية إنشاء مشكلة باستخدام Policy
        $this->authorize('create', Problem::class);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:problem_categories,id',
            'urgency' => ['required', Rule::in(['Low', 'Medium', 'High'])],
            'tags' => 'nullable|string',
        ]);

        $problem = Problem::create([
            'title' => $request->title,
            'description' => $request->description,
            'submitted_by_account_id' => Auth::id(),
            'category_id' => $request->category_id,
            'urgency' => $request->urgency,
            'status' => 'Published',
            'tags' => $request->tags,
        ]);

        return redirect()->route('problems.show', $problem)->with('success', 'Problem created successfully!');
    }

    /**
     * Show the form for editing the specified problem.
     */
    public function edit(Problem $problem)
    {
        // التحقق من صلاحية تحديث هذه المشكلة بالذات باستخدام Policy
        $this->authorize('update', $problem); // يمرر كائن النموذج للفحص في Policy

        $categories = ProblemCategory::all();
        return view('problems.edit', compact('problem', 'categories'));
    }

    /**
     * Update the specified problem in storage.
     */
    public function update(Request $request, Problem $problem)
    {
         // التحقق من صلاحية تحديث هذه المشكلة بالذات باستخدام Policy
        $this->authorize('update', $problem);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:problem_categories,id',
            'urgency' => ['required', Rule::in(['Low', 'Medium', 'High'])],
            'tags' => 'nullable|string',
        ]);

        $problem->update($request->only(['title', 'description', 'category_id', 'urgency', 'tags']));

        return redirect()->route('problems.show', $problem)->with('success', 'Problem updated successfully!');
    }

    /**
     * Remove the specified problem from storage.
     */
    public function destroy(Problem $problem)
    {
        // التحقق من صلاحية حذف هذه المشكلة بالذات باستخدام Policy
        $this->authorize('delete', $problem);

        $problem->delete();

        return redirect()->route('problems.index')->with('success', 'Problem deleted successfully!');
    }

     /**
     * Display a listing of the problems.
     * (هذه الدالة لا تتطلب تسجيل دخول، لكن منطق فلترة المشاكل يتم داخل الدالة نفسها)
     */
    public function index()
    {
        // لا نستخدم authorize هنا لأن عرض القائمة عام، ولكن يمكن إضافة policy viewAny إذا أردنا قيوداً على من يمكنه رؤية القائمة بالكامل.
         // $this->authorize('viewAny', Problem::class);

        $problems = Problem::where('status', 'Published')
                           ->with('submittedBy.userProfile', 'submittedBy.organizationProfile', 'category')
                           ->latest()
                           ->paginate(15);

        return view('problems.index', compact('problems'));
    }

    /**
     * Display the specified problem.
     * (هذه الدالة أيضاً يمكن أن تكون عامة، ولكن policy view يمكن أن تفرض قيوداً على عرض المشاكل غير المنشورة)
     */
    public function show(Problem $problem)
    {
        // هنا يمكن استخدام policy للتأكد من أن المستخدم يمكنه رؤية هذه المشكلة بالذات
        // مثلاً، مشكلة حالة 'Draft' لا يمكن رؤيتها إلا من قبل صاحبها أو المسؤول
         try {
            $this->authorize('view', $problem);
         } catch (AuthorizationException $e) {
             abort(404); // أو 403 حسب الرغبة، 404 يخفي وجودها تماماً
         }


        $problem->load([
            'submittedBy.userProfile',
            'submittedBy.organizationProfile',
            'category',
            'comments' => function ($query) {
                $query->whereNull('parent_comment_id')
                      ->with('author.userProfile', 'author.organizationProfile', 'replies.author.userProfile', 'replies.author.organizationProfile', 'adoptedSolution');
            }
        ]);

        return view('problems.show', compact('problem'));
    }

}
```

**الخلاصة للملاحظات الهامة:**

*   **Middleware:** تم إنشاء Middlewares `IsOrganization` و `IsAdmin` وتسجيلها في `Kernel.php` لتطبيق قيود الوصول على مستوى المسار بناءً على نوع الحساب.
*   **Authorization (Policies):** تم إنشاء `ProblemPolicy` لتعريف منطق صلاحيات التعامل مع المشاكل (إنشاء، تعديل، حذف، عرض). تم استخدام دالة `before` للسماح للمسؤول بتجاوز الفحوصات الأخرى. تم تعديل `ProblemController` لاستخدام الدالة المساعدة `authorize()` للتحقق من الصلاحيات قبل تنفيذ الإجراءات.
*   **Validation:** تم إضافة قواعد تحقق أساسية في الدوال التي تستقبل بيانات، ولكن كما ذكرنا سابقًا، يجب توسيعها لتغطية جميع السيناريوهات المطلوبة.
*   **الواجهات (Views):** المتحكمات الآن تستدعي الواجهات. الخطوة التالية هي بناء ملفات `.blade.php` في المجلد `resources/views/` لتقديم المحتوى للمستخدمين.
*   **Ajax/API:** تم التلميح إلى أن بعض العمليات (مثل التصويت) يمكن التعامل معها بشكل تفاعلي عبر Ajax/API. متحكم `CommentVoteController` مهيأ لإرجاع JSON لهذا الغرض.

الآن لديك هيكل قوي للمصادقة والصلاحيات. الخطوة التالية المنطقية هي البدء في بناء الواجهة الأمامية باستخدام Blade Views أو أي تقنية واجهة أمامية أخرى تفضلها.



بالتأكيد. بعد إعداد قاعدة البيانات، النماذج، الهجرات، الـ Seeders (كهيكل)، المسارات، والمتحكمات (مع Middleware والصلاحيات الأساسية)، الخطوة التالية المنطقية لتشغيل المشروع على الويب ورؤية أي شيء في المتصفح هي **إنشاء ملفات الواجهة (Views)**.

المتحكمات جاهزة الآن لجلب البيانات وإرسالها إلى الواجهات باستخدام `return view(...)`. يجب علينا الآن إنشاء هذه الملفات في المكان الصحيح (`resources/views`) وإعطائها بنية أساسية حتى يمكن عرضها.

سنبدأ بإنشاء ملف تخطيط أساسي (layout) لتجنب تكرار عناصر مثل رأس الصفحة وتذييلها وقائمة التنقل، ثم سننشئ ملفات Blade لكل واجهة مطلوبة بناءً على المتحكمات والمسارات التي عرفناها.

**الخطوة التالية: إنشاء ملفات الواجهة (Views)**

1.  **إنشاء ملف التخطيط الأساسي (Layout):**
    سننشئ ملفًا رئيسيًا يمكن لجميع الواجهات الأخرى أن ترث منه.
    أنشئ المجلدات اللازمة: `resources/views/layouts/`
    أنشئ الملف: `resources/views/layouts/app.blade.php`

    ```html
    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'Syria Reconstruction Platform')</title>
        <!-- يمكنك إضافة روابط لملفات CSS هنا -->
        {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> {{-- مثال Bootstrap --}}
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> {{-- مثال Font Awesome --}}
        <style>
            .navbar { margin-bottom: 20px; }
            .footer { margin-top: 20px; padding: 20px 0; background-color: #f8f9fa; }
        </style>
    </head>
    <body>
        <div id="app"> {{-- يمكن استخدام هذا للواجهة الأمامية التي تستخدم Vue/React --}}
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Syria Reconstruction Platform
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('problems.index') }}">Problems</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('badges.index') }}">Badges</a>
                            </li>
                             {{-- Add more navigation links here --}}
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->username }} {{-- عرض اسم المستخدم المسجل دخوله --}}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('profiles.show', Auth::user()) }}">My Profile</a>
                                        <a class="dropdown-item" href="{{ route('profile.edit') }}">Edit Profile</a>
                                         <a class="dropdown-item" href="{{ route('profile.badges') }}">My Badges</a>

                                        {{-- Add organization specific links if user is an organization --}}
                                         @if (Auth::user()->isOrganization())
                                             <a class="dropdown-item" href="{{ route('organization.listAdoptedSolutions') }}">My Adopted Solutions</a>
                                             <a class="dropdown-item" href="{{ route('organization.editCategoryInterests') }}">My Interests</a>
                                         @endif

                                         {{-- Add admin specific links if user is an admin --}}
                                         @if (Auth::user()->isAdmin())
                                             <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
                                         @endif

                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            <main class="py-4">
                <div class="container">
                     {{-- Display success or error messages --}}
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    @yield('content') {{-- هذا هو الجزء الذي سيتم ملؤه بمحتوى كل صفحة فردية --}}
                </div>
            </main>

            <footer class="footer">
                <div class="container text-center">
                    <p>&copy; {{ date('Y') }} Syria Reconstruction Platform. All rights reserved.</p>
                </div>
            </footer>
        </div>

        <!-- يمكنك إضافة روابط لملفات JavaScript هنا -->
        {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
    </html>
    ```
    **ملاحظة:** هذا التخطيط يستخدم Bootstrap 4 كمثال بسيط للإطار (framing). يمكنك استبداله بأي مكتبة CSS/JS أخرى أو بناء التصميم الخاص بك. كما أنه يفترض أنك قمت بإعداد `npm install && npm run dev` أو `npm run build` إذا كنت تستخدم ملفات الأصول (assets) المضمنة في Laravel.

2.  **إنشاء ملفات الواجهات الفردية:**
    الآن سنقوم بإنشاء ملف `.blade.php` لكل واجهة استدعيناها في المتحكمات. سنضع فيها بنية أساسية وعلامات `yield` و `section`.

    *   **Home (`HomeController@index`)**
        *   المسار: `resources/views/home.blade.php`
        *   البيانات المتاحة: `$recentProblems` (مجموعة من نماذج Problem مع تحميل submitterBy و category)

        ```html
        @extends('layouts.app')

        @section('title', 'Home')

        @section('content')
            <h1>Welcome to the Syria Reconstruction Platform</h1>
            <p>Share ideas and find solutions for post-liberation challenges.</p>

            <h2>Recent Problems</h2>

            @if ($recentProblems->isEmpty())
                <p>No problems have been published yet.</p>
            @else
                <div class="list-group">
                    @foreach ($recentProblems as $problem)
                        <a href="{{ route('problems.show', $problem) }}" class="list-group-item list-group-item-action">
                            <h5 class="mb-1">{{ $problem->title }}</h5>
                            <p class="mb-1">{{ \Illuminate\Support\Str::limit($problem->description, 150) }}</p> {{-- مثال لاستخدام Str::limit --}}
                            <small>Category: {{ $problem->category->name ?? 'N/A' }} | Submitted by: {{ $problem->submittedBy->username ?? 'N/A' }} | Urgency: {{ $problem->urgency }}</small>
                        </a>
                    @endforeach
                </div>
            @endif

            {{-- يمكنك إضافة المزيد من الأقسام هنا (إحصائيات، آخر الحلول المعتمدة، إلخ) --}}

        @endsection
        ```
        *ملاحظة:* تحتاج لاستخدام Facade `Str` لتحديد طول النص، تأكد من استيرادها في بداية ملف الـ Blade إذا لم تكن متاحة تلقائياً: `@use Illuminate\Support\Str;` (في Laravel 8+) أو استخدامها مباشرة مع `\` (`\Illuminate\Support\Str::limit(...)`).

    *   **Authentication Views (`AuthController`)**
        *   المجلد: `resources/views/auth/`

        *   Login (`AuthController@showLoginForm`)
            *   المسار: `resources/views/auth/login.blade.php`
            *   البيانات المتاحة: (لا يوجد بيانات محددة يتم تمريرها عادةً، فقط يعتمد على جلسة الأخطاء أو النجاح)

            ```html
            @extends('layouts.app')

            @section('title', 'Login')

            @section('content')
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Login</div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf {{-- CSRF Token --}}

                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="remember">
                                                    Remember Me
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                Login
                                            </button>

                                            {{-- يمكنك إضافة رابط "Forgot Your Password?" هنا إذا كان لديك هذه الميزة --}}
                                            {{-- @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    Forgot Your Password?
                                                </a>
                                            @endif --}}
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endsection
            ```

        *   Register (`AuthController@showRegistrationForm`)
            *   المسار: `resources/views/auth/register.blade.php`
            *   البيانات المتاحة: (لا يوجد بيانات محددة، فقط يعتمد على جلسة الأخطاء)

            ```html
            @extends('layouts.app')

            @section('title', 'Register')

            @section('content')
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Register</div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf {{-- CSRF Token --}}

                                    <div class="form-group row">
                                        <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>
                                        <div class="col-md-6">
                                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>

                                     <div class="form-group row">
                                        <label for="account_type" class="col-md-4 col-form-label text-md-right">Account Type</label>
                                        <div class="col-md-6">
                                            <select id="account_type" class="form-control @error('account_type') is-invalid @enderror" name="account_type" required>
                                                <option value="">Select Type</option>
                                                <option value="individual" {{ old('account_type') === 'individual' ? 'selected' : '' }}>Individual</option>
                                                <option value="organization" {{ old('account_type') === 'organization' ? 'selected' : '' }}>Organization</option>
                                                 {{-- 'admin' type is not for public registration --}}
                                            </select>
                                             @error('account_type')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                     {{-- Add conditional fields here based on account_type selection if needed --}}
                                     {{-- Example: Organization Name field --}}
                                     {{-- <div class="form-group row" id="organization-name-group" style="display: none;">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">Organization Name</label>
                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div> --}}
                                    {{-- You'll need JavaScript to show/hide these fields based on account_type select --}}


                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                Register
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Add JavaScript for conditional fields here --}}
                 {{-- <script>
                     document.getElementById('account_type').addEventListener('change', function () {
                         var orgNameGroup = document.getElementById('organization-name-group');
                         if (this.value === 'organization') {
                             orgNameGroup.style.display = 'flex'; // or 'block' depending on layout
                         } else {
                             orgNameGroup.style.display = 'none';
                         }
                     });
                     // Trigger on page load in case old('account_type') is organization
                     document.getElementById('account_type').dispatchEvent(new Event('change'));
                 </script> --}}
            @endsection
            ```

    *   **Problems Views (`ProblemController`)**
        *   المجلد: `resources/views/problems/`

        *   Index (`ProblemController@index`)
            *   المسار: `resources/views/problems/index.blade.php`
            *   البيانات المتاحة: `$problems` (Pagination Collection of Problem models)

            ```html
            @extends('layouts.app')

            @section('title', 'Problems')

            @section('content')
                <h1>Problems</h1>

                @auth {{-- Only show create button if authenticated --}}
                    <p><a href="{{ route('problems.create') }}" class="btn btn-primary">Post a New Problem</a></p>
                @endauth

                @if ($problems->isEmpty())
                    <p>No problems found.</p>
                @else
                    <div class="list-group">
                        @foreach ($problems as $problem)
                            <div class="list-group-item"> {{-- Use div instead of a if you add internal links --}}
                                <a href="{{ route('problems.show', $problem) }}" class="text-decoration-none text-dark">
                                    <h5 class="mb-1">{{ $problem->title }}</h5>
                                </a>
                                <p class="mb-1">{{ \Illuminate\Support\Str::limit($problem->description, 200) }}</p>
                                <small>
                                    Category: {{ $problem->category->name ?? 'N/A' }} |
                                    Submitted by:
                                    @if ($problem->submittedBy->isIndividual() && $problem->submittedBy->userProfile)
                                        {{ $problem->submittedBy->userProfile->first_name ?? $problem->submittedBy->username }}
                                    @elseif ($problem->submittedBy->isOrganization() && $problem->submittedBy->organizationProfile)
                                         {{ $problem->submittedBy->organizationProfile->name ?? $problem->submittedBy->username }}
                                    @else
                                        {{ $problem->submittedBy->username ?? 'N/A' }}
                                    @endif
                                    | Urgency: {{ $problem->urgency }} | Status: {{ $problem->status }}
                                    | Posted: {{ $problem->created_at->diffForHumans() }} {{-- مثال لعرض الوقت بشكل ودي --}}
                                </small>

                                {{-- Edit/Delete buttons for the owner or admin --}}
                                @auth
                                    @if (Auth::user()->id === $problem->submitted_by_account_id || Auth::user()->isAdmin())
                                        <div class="mt-2">
                                            <a href="{{ route('problems.edit', $problem) }}" class="btn btn-sm btn-secondary">Edit</a>
                                            <form action="{{ route('problems.destroy', $problem) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this problem?');">Delete</button>
                                            </form>
                                        </div>
                                    @endif
                                @endauth

                            </div>
                        @endforeach
                    </div>

                    <div class="mt-3">
                        {{ $problems->links() }} {{-- لعرض روابط ترقيم الصفحات --}}
                    </div>

                @endif

            @endsection
            ```

        *   Show (`ProblemController@show`)
            *   المسار: `resources/views/problems/show.blade.php`
            *   البيانات المتاحة: `$problem` (Problem model مع تحميل submittedBy, category, comments (with author, replies, adoptedSolution))

            ```html
            @extends('layouts.app')

            @section('title', $problem->title)

            @section('content')
                <h1>{{ $problem->title }}</h1>

                <p>Category: {{ $problem->category->name ?? 'N/A' }} | Urgency: {{ $problem->urgency }} | Status: {{ $problem->status }}</p>
                <p>Submitted by:
                    @if ($problem->submittedBy->isIndividual() && $problem->submittedBy->userProfile)
                        {{ $problem->submittedBy->userProfile->first_name ?? $problem->submittedBy->username }}
                    @elseif ($problem->submittedBy->isOrganization() && $problem->submittedBy->organizationProfile)
                         {{ $problem->submittedBy->organizationProfile->name ?? $problem->submittedBy->username }}
                    @else
                        {{ $problem->submittedBy->username ?? 'N/A' }}
                    @endif
                     on {{ $problem->created_at->format('Y-m-d') }}
                 </p>
                 @if ($problem->tags)
                     <p>Tags: {{ $problem->tags }}</p> {{-- يمكنك تحويلها لروابط tags لاحقاً --}}
                 @endif

                <hr>

                <p>{{ $problem->description }}</p>

                 {{-- Edit/Delete buttons for the owner or admin --}}
                @auth
                    @if (Auth::user()->id === $problem->submitted_by_account_id || Auth::user()->isAdmin())
                        <div class="mt-2">
                            <a href="{{ route('problems.edit', $problem) }}" class="btn btn-sm btn-secondary">Edit Problem</a>
                            <form action="{{ route('problems.destroy', $problem) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this problem?');">Delete Problem</button>
                            </form>
                        </div>
                    @endif
                @endauth


                <hr>

                <h2>Comments ({{ $problem->comments->count() }})</h2>

                {{-- Form to add a new root comment --}}
                @auth
                    <div class="card mb-3">
                        <div class="card-header">Add a Comment</div>
                        <div class="card-body">
                            <form action="{{ route('comments.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="problem_id" value="{{ $problem->id }}">
                                <div class="form-group">
                                    <textarea name="content" class="form-control" rows="3" required>{{ old('content') }}</textarea>
                                    @error('content') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Submit Comment</button>
                            </form>
                        </div>
                    </div>
                @else
                     <p>Please <a href="{{ route('login') }}">login</a> to post a comment.</p>
                @endauth


                {{-- Display comments (recursive for replies could be complex, a simple flat list or limited nesting is easier initially) --}}
                @if ($problem->comments->isEmpty())
                    <p>No comments yet. Be the first to comment!</p>
                @else
                    <div id="comments-section"> {{-- Anchor for navigating to comments --}}
                        @include('partials.comments', ['comments' => $problem->comments]) {{-- استخدام جزء منفصل لعرض التعليقات والردود --}}
                    </div>
                @endif

            @endsection

            {{-- تحتاج لإنشاء جزء (Partial) لعارض التعليقات والردود: resources/views/partials/comments.blade.php --}}
            {{-- هذا الجزء سيتم استدعاؤه بشكل متكرر لعرض الردود --}}

            ```
            *   **Partials: comments.blade.php**
                *   المسار: `resources/views/partials/comments.blade.php`
                *   البيانات المتاحة: `$comments` (مجموعة من نماذج Comment)

                ```html
                {{-- resources/views/partials/comments.blade.php --}}

                @foreach ($comments as $comment)
                    <div class="media mb-4 border p-3" id="comment-{{ $comment->id }}" style="margin-left: {{ ($comment->parent_comment_id !== null) ? '40px' : '0' }};"> {{-- مسافة بادئة للردود --}}
                        @if ($comment->author->isIndividual() && $comment->author->userProfile)
                             <img src="https://via.placeholder.com/50?text={{ substr($comment->author->userProfile->first_name ?? $comment->author->username, 0, 1) }}" class="mr-3 rounded-circle" alt="User Avatar"> {{-- صورة وهمية --}}
                        @elseif ($comment->author->isOrganization() && $comment->author->organizationProfile)
                             <img src="https://via.placeholder.com/50?text={{ substr($comment->author->organizationProfile->name ?? $comment->author->username, 0, 1) }}" class="mr-3 rounded-circle" alt="Organization Logo"> {{-- صورة وهمية --}}
                        @else
                             <img src="https://via.placeholder.com/50?text=?" class="mr-3 rounded-circle" alt="Avatar"> {{-- صورة وهمية --}}
                        @endif

                        <div class="media-body">
                            <h5 class="mt-0">{{ $comment->author->username ?? 'N/A' }} <small class="text-muted">- {{ $comment->created_at->diffForHumans() }}</small></h5>

                            <p>{{ $comment->content }}</p>

                            {{-- Comment Votes (Stack Overflow style) --}}
                            <div class="d-flex align-items-center">
                                @auth
                                     {{-- Upvote Button --}}
                                    <form action="{{ route('comments.vote', $comment) }}" method="POST" class="d-inline vote-form">
                                        @csrf
                                        <input type="hidden" name="vote_value" value="1">
                                        <button type="submit" class="btn btn-sm btn-outline-success @if(Auth::user()->commentVotes()->where('comment_id', $comment->id)->where('vote_value', 1)->exists()) active @endif">
                                            <i class="fas fa-arrow-up"></i>
                                        </button>
                                    </form>

                                     {{-- Vote Count (will update via JS eventually) --}}
                                    <span class="mx-2 font-weight-bold comment-vote-count">{{ $comment->total_votes }}</span>

                                     {{-- Downvote Button --}}
                                    <form action="{{ route('comments.vote', $comment) }}" method="POST" class="d-inline vote-form">
                                        @csrf
                                        <input type="hidden" name="vote_value" value="-1">
                                        <button type="submit" class="btn btn-sm btn-outline-danger @if(Auth::user()->commentVotes()->where('comment_id', $comment->id)->where('vote_value', -1)->exists()) active @endif">
                                            <i class="fas fa-arrow-down"></i>
                                        </button>
                                    </form>

                                    {{-- Reply Button --}}
                                    <button class="btn btn-sm btn-link ml-2 reply-button" data-comment-id="{{ $comment->id }}">Reply</button>

                                    {{-- Edit/Delete buttons for owner or admin --}}
                                     @if (Auth::user()->id === $comment->author_account_id || Auth::user()->isAdmin())
                                         <a href="{{ route('comments.edit', $comment) }}" class="btn btn-sm btn-link ml-2">Edit</a>
                                         <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="d-inline">
                                             @csrf
                                             @method('DELETE')
                                             <button type="submit" class="btn btn-sm btn-link text-danger" onclick="return confirm('Are you sure you want to delete this comment?');">Delete</button>
                                         </form>
                                     @endif

                                     {{-- Adopt as Solution Button (for Organizations only) --}}
                                     @if (Auth::user()->isOrganization())
                                         @if (!$comment->adoptedSolution) {{-- Show only if not already adopted --}}
                                              <form action="{{ route('organization.adoptComment', $comment) }}" method="POST" class="d-inline ml-2">
                                                 @csrf
                                                 <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('Are you sure your organization wants to adopt this comment as a solution?');">Adopt as Solution</button>
                                             </form>
                                         @else {{-- Indicate if already adopted and by whom --}}
                                            <span class="badge badge-info ml-2">Adopted by {{ $comment->adoptedSolution->adoptingOrganization->name ?? 'Organization' }}</span>
                                         @endif
                                     @endif

                                @endauth
                                 @guest {{-- Display votes even for guests --}}
                                     <span class="ml-2 font-weight-bold">{{ $comment->total_votes }} votes</span>
                                @endguest

                            </div>

                            {{-- Reply Form (initially hidden) --}}
                             @auth
                                <div class="reply-form mt-3" id="reply-form-{{ $comment->id }}" style="display: none;">
                                    <h6>Reply to {{ $comment->author->username }}</h6>
                                    <form action="{{ route('comments.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="problem_id" value="{{ $comment->problem_id }}"> {{-- مهم تمرير معرّف المشكلة --}}
                                        <input type="hidden" name="parent_comment_id" value="{{ $comment->id }}">
                                        <div class="form-group">
                                            <textarea name="content" class="form-control" rows="2" required>{{ old('content') }}</textarea>
                                            @error('content') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <button type="submit" class="btn btn-sm btn-primary">Submit Reply</button>
                                    </form>
                                </div>
                            @endauth


                            {{-- Display replies recursively --}}
                            @if ($comment->replies->isNotEmpty())
                                <div class="mt-4">
                                    @include('partials.comments', ['comments' => $comment->replies])
                                </div>
                            @endif

                        </div>
                    </div>
                @endforeach

                {{-- Simple JavaScript to toggle reply forms --}}
                 {{-- Add this script once in your main layout or a dedicated script file loaded on the page --}}
                 {{--
                 <script>
                     document.addEventListener('DOMContentLoaded', function () {
                         document.querySelectorAll('.reply-button').forEach(button => {
                             button.addEventListener('click', function () {
                                 const commentId = this.dataset.commentId;
                                 const replyForm = document.getElementById('reply-form-' + commentId);
                                 if (replyForm.style.display === 'none') {
                                     replyForm.style.display = 'block';
                                 } else {
                                     replyForm.style.display = 'none';
                                 }
                             });
                         });

                         // Optional: Simple AJAX for votes (requires JS library like Axios or Fetch)
                         // document.querySelectorAll('.vote-form').forEach(form => {
                         //     form.addEventListener('submit', function(e) {
                         //         e.preventDefault();
                         //         const formData = new FormData(this);
                         //         const voteButton = this.querySelector('button');
                         //         const voteCountSpan = this.closest('.media-body').querySelector('.comment-vote-count');

                         //         fetch(this.action, {
                         //             method: 'POST',
                         //             body: formData,
                         //             headers: {
                         //                  'X-Requested-With': 'XMLHttpRequest', // Identify as AJAX request
                         //                  'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Get CSRF token
                         //             }
                         //         })
                         //         .then(response => response.json())
                         //         .then(data => {
                         //             if(data.new_total_votes !== undefined) {
                         //                 voteCountSpan.textContent = data.new_total_votes;
                         //                 // Optional: Toggle 'active' class on buttons based on current vote status
                         //                 // This requires more complex state tracking
                         //             }
                         //             if(data.message) {
                         //                  console.log(data.message); // Or display as a flash message
                         //             }
                         //         })
                         //         .catch(error => {
                         //             console.error('Error:', error);
                         //             // Handle errors (e.g., show a message to the user)
                         //         });
                         //     });
                         // });


                     });
                 </script>
                 --}}
                ```

        *   Create (`ProblemController@create`)
            *   المسار: `resources/views/problems/create.blade.php`
            *   البيانات المتاحة: `$categories` (Collection of ProblemCategory models)

            ```html
            @extends('layouts.app')

            @section('title', 'Post a New Problem')

            @section('content')
                <h1>Post a New Problem</h1>

                <form action="{{ route('problems.store') }}" method="POST">
                    @csrf {{-- CSRF Token --}}

                    <div class="form-group">
                        <label for="title">Problem Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
                        @error('title') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Detailed Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="6" required>{{ old('description') }}</textarea>
                        @error('description') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                            <option value="">Select a Category</option>
                            @foreach ($categories as $category)
                                 {{-- يمكنك تحسين هذا لعرض الفئات المتداخلة بشكل مناسب --}}
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                     <div class="form-group">
                        <label for="urgency">Urgency Level</label>
                        <select class="form-control @error('urgency') is-invalid @enderror" id="urgency" name="urgency" required>
                            <option value="">Select Urgency</option>
                            <option value="Low" {{ old('urgency') === 'Low' ? 'selected' : '' }}>Low</option>
                            <option value="Medium" {{ old('urgency') === 'Medium' ? 'selected' : '' }}>Medium</option>
                            <option value="High" {{ old('urgency') === 'High' ? 'selected' : '' }}>High</option>
                        </select>
                         @error('urgency') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="tags">Tags (comma-separated)</label>
                        <input type="text" class="form-control @error('tags') is-invalid @enderror" id="tags" name="tags" value="{{ old('tags') }}">
                        @error('tags') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>


                    <button type="submit" class="btn btn-primary">Submit Problem</button>
                     <a href="{{ route('problems.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            @endsection
            ```

        *   Edit (`ProblemController@edit`)
            *   المسار: `resources/views/problems/edit.blade.php`
            *   البيانات المتاحة: `$problem` (Problem model), `$categories` (Collection of ProblemCategory models)

            ```html
            @extends('layouts.app')

            @section('title', 'Edit Problem: ' . $problem->title)

            @section('content')
                <h1>Edit Problem</h1>

                <form action="{{ route('problems.update', $problem) }}" method="POST">
                    @csrf {{-- CSRF Token --}}
                    @method('PUT') {{-- Method spoofing for PUT request --}}

                    <div class="form-group">
                        <label for="title">Problem Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $problem->title) }}" required>
                        @error('title') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Detailed Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="6" required>{{ old('description', $problem->description) }}</textarea>
                        @error('description') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                            <option value="">Select a Category</option>
                            @foreach ($categories as $category)
                                 {{-- يمكنك تحسين هذا لعرض الفئات المتداخلة بشكل مناسب --}}
                                <option value="{{ $category->id }}" {{ old('category_id', $problem->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                     <div class="form-group">
                        <label for="urgency">Urgency Level</label>
                        <select class="form-control @error('urgency') is-invalid @enderror" id="urgency" name="urgency" required>
                            <option value="">Select Urgency</option>
                            <option value="Low" {{ old('urgency', $problem->urgency) === 'Low' ? 'selected' : '' }}>Low</option>
                            <option value="Medium" {{ old('urgency', $problem->urgency) === 'Medium' ? 'selected' : '' }}>Medium</option>
                            <option value="High" {{ old('urgency', $problem->urgency) === 'High' ? 'selected' : '' }}>High</option>
                        </select>
                         @error('urgency') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="tags">Tags (comma-separated)</label>
                        <input type="text" class="form-control @error('tags') is-invalid @enderror" id="tags" name="tags" value="{{ old('tags', $problem->tags) }}">
                        @error('tags') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                     {{-- حالة المشكلة يمكن تعديلها بواسطة المسؤول فقط، يمكن إضافتها هنا بشرط عرضها للمسؤول فقط --}}
                     @auth
                         @if (Auth::user()->isAdmin())
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                                    <option value="Draft" {{ old('status', $problem->status) === 'Draft' ? 'selected' : '' }}>Draft</option>
                                    <option value="Published" {{ old('status', $problem->status) === 'Published' ? 'selected' : '' }}>Published</option>
                                    <option value="UnderReview" {{ old('status', $problem->status) === 'UnderReview' ? 'selected' : '' }}>Under Review</option>
                                    <option value="Hidden" {{ old('status', $problem->status) === 'Hidden' ? 'selected' : '' }}>Hidden</option>
                                    <option value="Suspended" {{ old('status', $problem->status) === 'Suspended' ? 'selected' : '' }}>Suspended</option>
                                    <option value="Resolved" {{ old('status', $problem->status) === 'Resolved' ? 'selected' : '' }}>Resolved</option>
                                    <option value="Archived" {{ old('status', $problem->status) === 'Archived' ? 'selected' : '' }}>Archived</option>
                                </select>
                                @error('status') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                         @endif
                     @endauth


                    <button type="submit" class="btn btn-primary">Update Problem</button>
                     <a href="{{ route('problems.show', $problem) }}" class="btn btn-secondary">Cancel</a>
                </form>
            @endsection
            ```

    *   **Badges Views (`BadgeController`)**
        *   المجلد: `resources/views/badges/`

        *   Index (`BadgeController@index`)
            *   المسار: `resources/views/badges/index.blade.php`
            *   البيانات المتاحة: `$badges` (Collection of Badge models)

            ```html
            @extends('layouts.app')

            @section('title', 'Available Badges')

            @section('content')
                <h1>Available Badges</h1>

                @if ($badges->isEmpty())
                    <p>No badges defined yet.</p>
                @else
                    <div class="row">
                        @foreach ($badges as $badge)
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    @if ($badge->image_url)
                                        <img src="{{ asset($badge->image_url) }}" class="card-img-top" alt="{{ $badge->name }}" style="max-height: 150px; object-fit: contain;"> {{-- يمكنك تعديل الحجم والتنسيق --}}
                                    @endif
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $badge->name }}</h5>
                                        <p class="card-text">{{ $badge->description }}</p>
                                        <p class="card-text"><small class="text-muted">Criteria:</small></p>
                                        <ul class="card-text">
                                            @if ($badge->required_points > 0)
                                                <li>Earn {{ $badge->required_points }} points.</li>
                                            @endif
                                            @if ($badge->required_adopted_comments_count > 0)
                                                <li>Have {{ $badge->required_adopted_comments_count }} comment(s) adopted as solutions.</li>
                                            @endif
                                             @if ($badge->required_points == 0 && $badge->required_adopted_comments_count == 0 && $badge->criteria_description)
                                                 <li>{{ $badge->criteria_description }}</li> {{-- إذا كان هناك وصف يدوي --}}
                                             @elseif ($badge->required_points == 0 && $badge->required_adopted_comments_count == 0)
                                                  <li>Criteria not specified.</li> {{-- لعدم وجود معيار محدد --}}
                                             @endif

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            @endsection
            ```

    *   **Profiles Views (`ProfileController`)**
        *   المجلد: `resources/views/profiles/`

        *   Show (`ProfileController@show`)
            *   المسار: `resources/views/profiles/show.blade.php`
            *   البيانات المتاحة: `$account` (Account model with loaded profile and accountBadges.badge), `$profile` (UserProfile or OrganizationProfile model)

            ```html
            @extends('layouts.app')

            @section('title', ($account->isIndividual() ? 'User Profile' : 'Organization Profile') . ': ' . ($profile->name ?? $profile->first_name ?? $account->username))

            @section('content')
                <h1>Profile: {{ $profile->name ?? $profile->first_name ?? $account->username }}</h1>

                <div class="card mb-3">
                    <div class="card-header">Account Information</div>
                    <div class="card-body">
                        <p><strong>Username:</strong> {{ $account->username }}</p>
                        <p><strong>Account Type:</strong> {{ ucfirst($account->account_type) }}</p>
                        <p><strong>Points:</strong> {{ $account->points }}</p>
                         <p><strong>Joined:</strong> {{ $account->created_at->format('Y-m-d') }}</p>

                        {{-- Link to edit profile if authenticated user owns this profile --}}
                        @auth
                             @if (Auth::id() === $account->id)
                                 <a href="{{ route('profile.edit') }}" class="btn btn-secondary">Edit My Profile</a>
                             @endif
                        @endauth
                    </div>
                </div>

                <div class="card mb-3">
                     <div class="card-header">{{ $account->isIndividual() ? 'Personal' : 'Organization' }} Details</div>
                     <div class="card-body">
                         @if ($account->isIndividual())
                              {{-- Display User Profile Fields --}}
                             <p><strong>Full Name:</strong> {{ $profile->first_name ?? 'N/A' }} {{ $profile->last_name ?? 'N/A' }}</p>
                             <p><strong>Phone:</strong> {{ $profile->phone ?? 'N/A' }}</p>
                             <p><strong>Bio:</strong> {{ $profile->bio ?? 'N/A' }}</p>
                         @elseif ($account->isOrganization())
                             {{-- Display Organization Profile Fields --}}
                            <p><strong>Organization Name:</strong> {{ $profile->name ?? 'N/A' }}</p>
                             <p><strong>Website:</strong> <a href="{{ $profile->website_url ?? '#' }}">{{ $profile->website_url ?? 'N/A' }}</a></p>
                             <p><strong>Contact Email:</strong> {{ $profile->contact_email ?? 'N/A' }}</p>
                            <p><strong>Info:</strong> {{ $profile->info ?? 'N/A' }}</p>
                         @endif

                         {{-- Display Address if available --}}
                         @if ($profile->address)
                             <p><strong>Address:</strong> {{ $profile->address->street_address ?? '' }}, {{ $profile->address->city->name ?? '' }}, {{ $profile->address->city->country->name ?? '' }} - {{ $profile->address->postal_code ?? '' }}</p>
                         @endif
                     </div>
                </div>

                 {{-- Display Badges --}}
                 @if ($account->accountBadges->isNotEmpty())
                      <div class="card mb-3">
                         <div class="card-header">Earned Badges</div>
                         <div class="card-body">
                             <div class="row">
                                 @foreach ($account->accountBadges as $accountBadge)
                                     <div class="col-auto mb-3">
                                         <div class="text-center">
                                             @if ($accountBadge->badge->image_url)
                                                 <img src="{{ asset($accountBadge->badge->image_url) }}" alt="{{ $accountBadge->badge->name }}" style="width: 50px; height: 50px;">
                                             @endif
                                             <p class="mt-1 mb-0"><small>{{ $accountBadge->badge->name }}</small></p>
                                              <p><small class="text-muted">Awarded: {{ $accountBadge->awarded_at->format('Y-m-d') }}</small></p>
                                         </div>
                                     </div>
                                 @endforeach
                             </div>
                             <p><a href="{{ route('profile.badges') }}" class="btn btn-sm btn-info">View All My Badges</a></p>
                         </div>
                     </div>
                 @endif

                 {{-- Display problems submitted by this account (optional) --}}
                 {{--
                 @if ($account->problems->isNotEmpty())
                      <div class="card mb-3">
                         <div class="card-header">Submitted Problems</div>
                         <div class="card-body">
                            // ... display problems list here
                         </div>
                     </div>
                 @endif
                 --}}


            @endsection
            ```

        *   Edit (`ProfileController@edit`)
            *   المسار: `resources/views/profiles/edit.blade.php`
            *   البيانات المتاحة: `$account` (Authenticated Account model with loaded profile), `$profile` (UserProfile or OrganizationProfile model), `$cities` (Collection of City models)

            ```html
            @extends('layouts.app')

            @section('title', 'Edit My Profile')

            @section('content')
                <h1>Edit My Profile</h1>

                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf {{-- CSRF Token --}}
                    @method('PUT') {{-- Method spoofing for PUT request --}}

                    <div class="card mb-3">
                        <div class="card-header">Account Settings (Limited)</div> {{-- Keep sensitive account fields minimal here --}}
                        <div class="card-body">
                             <div class="form-group">
                                <label for="username">Username</label>
                                {{-- Username/Email/Password changes might be in a separate page --}}
                                 <input type="text" class="form-control" id="username" value="{{ $account->username }}" disabled>
                             </div>
                        </div>
                    </div>


                     <div class="card mb-3">
                        <div class="card-header">{{ $account->isIndividual() ? 'Edit Personal' : 'Edit Organization' }} Details</div>
                        <div class="card-body">
                            @if ($account->isIndividual())
                                 {{-- Edit User Profile Fields --}}
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ old('first_name', $profile->first_name) }}">
                                     @error('first_name') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                                 <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ old('last_name', $profile->last_name) }}">
                                     @error('last_name') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $profile->phone) }}">
                                     @error('phone') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="bio">Bio</label>
                                    <textarea class="form-control @error('bio') is-invalid @enderror" id="bio" name="bio" rows="3">{{ old('bio', $profile->bio) }}</textarea>
                                     @error('bio') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                            @elseif ($account->isOrganization())
                                {{-- Edit Organization Profile Fields --}}
                               <div class="form-group">
                                   <label for="name">Organization Name</label>
                                   <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $profile->name) }}" required>
                                   @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
                               </div>
                                <div class="form-group">
                                   <label for="website_url">Website URL</label>
                                   <input type="url" class="form-control @error('website_url') is-invalid @enderror" id="website_url" name="website_url" value="{{ old('website_url', $profile->website_url) }}">
                                    @error('website_url') <span class="invalid-feedback">{{ $message }}</span> @enderror
                               </div>
                                <div class="form-group">
                                   <label for="contact_email">Contact Email</label>
                                   <input type="email" class="form-control @error('contact_email') is-invalid @enderror" id="contact_email" name="contact_email" value="{{ old('contact_email', $profile->contact_email) }}">
                                    @error('contact_email') <span class="invalid-feedback">{{ $message }}</span> @enderror
                               </div>
                               <div class="form-group">
                                   <label for="info">Info</label>
                                   <textarea class="form-control @error('info') is-invalid @enderror" id="info" name="info" rows="3">{{ old('info', $profile->info) }}</textarea>
                                    @error('info') <span class="invalid-feedback">{{ $message }}</span> @enderror
                               </div>
                            @endif

                             {{-- Address Fields --}}
                             <div class="card mt-4">
                                 <div class="card-header">Address Information</div>
                                 <div class="card-body">
                                     <div class="form-group">
                                         <label for="city_id">City</label>
                                          <select class="form-control @error('city_id') is-invalid @enderror" id="city_id" name="city_id">
                                             <option value="">Select City</option>
                                              @foreach ($cities as $city)
                                                 <option value="{{ $city->id }}" {{ old('city_id', $profile->address->city_id ?? null) == $city->id ? 'selected' : '' }}>
                                                     {{ $city->name }} ({{ $city->country->name ?? 'N/A' }})
                                                 </option>
                                             @endforeach
                                         </select>
                                          @error('city_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                     </div>
                                      <div class="form-group">
                                         <label for="street_address">Street Address</label>
                                         <input type="text" class="form-control @error('street_address') is-invalid @enderror" id="street_address" name="street_address" value="{{ old('street_address', $profile->address->street_address ?? null) }}">
                                          @error('street_address') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                     </div>
                                     <div class="form-group">
                                         <label for="postal_code">Postal Code</label>
                                         <input type="text" class="form-control @error('postal_code') is-invalid @enderror" id="postal_code" name="postal_code" value="{{ old('postal_code', $profile->address->postal_code ?? null) }}">
                                          @error('postal_code') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                     </div>
                                 </div>
                             </div>


                         </div>
                    </div>


                    <button type="submit" class="btn btn-primary">Update Profile</button>
                     <a href="{{ route('profiles.show', Auth::user()) }}" class="btn btn-secondary">Cancel</a>
                </form>
            @endsection
            ```

        *   My Badges (`ProfileController@showMyBadges`)
            *   المسار: `resources/views/profiles/my_badges.blade.php`
            *   البيانات المتاحة: `$account` (Authenticated Account model with loaded accountBadges.badge), `$badges` (Collection of AccountBadge models)

            ```html
             @extends('layouts.app')

            @section('title', 'My Badges')

            @section('content')
                 <h1>My Badges - {{ $account->username }}</h1>

                 <p>Total Points: {{ $account->points }}</p>

                @if ($badges->isEmpty())
                    <p>You haven't earned any badges yet. Keep contributing!</p>
                @else
                    <div class="row">
                        @foreach ($badges as $accountBadge)
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    @if ($accountBadge->badge->image_url)
                                        <img src="{{ asset($accountBadge->badge->image_url) }}" class="card-img-top" alt="{{ $accountBadge->badge->name }}" style="max-height: 150px; object-fit: contain;">
                                    @endif
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $accountBadge->badge->name }}</h5>
                                        <p class="card-text">{{ $accountBadge->badge->description }}</p>
                                        <p class="card-text"><small class="text-muted">Awarded On: {{ $accountBadge->awarded_at->format('Y-m-d H:i') }}</small></p>
                                         {{-- Criteria can be shown again if needed --}}
                                         <p><a href="{{ route('badges.index') }}">View All Badges</a></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            @endsection
            ```

    *   **Organization Views (`OrganizationController`)**
        *   المجلد: `resources/views/organization/` (يمكن إنشاء مجلدات فرعية مثل `adopted_solutions` و `category_interests`)

        *   List Adopted Solutions (`OrganizationController@listAdoptedSolutions`)
            *   المسار: `resources/views/organization/adopted_solutions/index.blade.php`
            *   البيانات المتاحة: `$adoptedSolutions` (Pagination Collection of Solution models), `$organizationProfile` (OrganizationProfile model)

            ```html
            @extends('layouts.app')

            @section('title', $organizationProfile->name . ' - Adopted Solutions')

            @section('content')
                <h1>Adopted Solutions by {{ $organizationProfile->name }}</h1>

                @if ($adoptedSolutions->isEmpty())
                    <p>Your organization has not adopted any comments as solutions yet.</p>
                @else
                     <div class="list-group">
                        @foreach ($adoptedSolutions as $solution)
                             <a href="{{ route('organization.showAdoptedSolution', $solution) }}" class="list-group-item list-group-item-action">
                                 <h5 class="mb-1">Solution for: {{ $solution->adoptedComment->problem->title ?? 'N/A Problem' }}</h5>
                                 <p class="mb-1">{{ \Illuminate\Support\Str::limit($solution->adoptedComment->content, 150) }}</p>
                                 <small>
                                     Author: {{ $solution->adoptedComment->author->username ?? 'N/A' }} |
                                     Status: {{ $solution->status }} |
                                     Adopted On: {{ $solution->created_at->format('Y-m-d') }}
                                 </small>
                             </a>
                        @endforeach
                     </div>

                     <div class="mt-3">
                         {{ $adoptedSolutions->links() }}
                     </div>
                @endif

            @endsection
            ```

        *   Show Adopted Solution (`OrganizationController@showAdoptedSolution`)
            *   المسار: `resources/views/organization/adopted_solutions/show.blade.php`
            *   البيانات المتاحة: `$solution` (Solution model with loaded adoptedComment.problem, adoptedComment.author, adoptingOrganization)

            ```html
            @extends('layouts.app')

            @section('title', 'Adopted Solution Details')

            @section('content')
                <h1>Adopted Solution Details</h1>

                <div class="card mb-3">
                    <div class="card-header">Original Comment & Problem</div>
                    <div class="card-body">
                        <p><strong>Problem:</strong> <a href="{{ route('problems.show', $solution->adoptedComment->problem) }}">{{ $solution->adoptedComment->problem->title ?? 'N/A' }}</a></p>
                        <p><strong>Original Comment Author:</strong> {{ $solution->adoptedComment->author->username ?? 'N/A' }}</p>
                        <p><strong>Comment Content:</strong></p>
                        <div class="border p-3 mb-3">{{ $solution->adoptedComment->content ?? 'N/A' }}</div>
                         <p><a href="{{ route('problems.show', $solution->adoptedComment->problem) }}#comment-{{ $solution->comment_id }}">View original comment in problem</a></p>
                    </div>
                </div>

                 <div class="card mb-3">
                     <div class="card-header">Adoption Details by {{ $solution->adoptingOrganization->name ?? 'Your Organization' }}</div>
                     <div class="card-body">
                         <p><strong>Adopting Organization:</strong> {{ $solution->adoptingOrganization->name ?? 'N/A' }}</p>
                         <p><strong>Adoption Status:</strong> {{ $solution->status }}</p>
                         <p><strong>Adopted On:</strong> {{ $solution->created_at->format('Y-m-d H:i') }}</p>
                         <p><strong>Last Updated:</strong> {{ $solution->updated_at->format('Y-m-d H:i') }}</p>

                         <p><strong>Organization Notes:</strong></p>
                         <div class="border p-3">{{ $solution->organization_notes ?? 'No notes added yet.' }}</div>

                         {{-- Form to update status and notes --}}
                         <h6 class="mt-4">Update Status and Notes</h6>
                         <form action="{{ route('organization.updateAdoptedSolutionStatus', $solution) }}" method="POST">
                             @csrf
                             @method('PUT')
                             <div class="form-group">
                                 <label for="status">Status</label>
                                 <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                                     <option value="UnderConsideration" {{ old('status', $solution->status) === 'UnderConsideration' ? 'selected' : '' }}>Under Consideration</option>
                                     <option value="Adopted" {{ old('status', $solution->status) === 'Adopted' ? 'selected' : '' }}>Adopted</option>
                                     <option value="ImplementationInProgress" {{ old('status', $solution->status) === 'ImplementationInProgress' ? 'selected' : '' }}>Implementation In Progress</option>
                                     <option value="ImplementationCompleted" {{ old('status', $solution->status) === 'ImplementationCompleted' ? 'selected' : '' }}>Implementation Completed</option>
                                     <option value="RejectedByOrganization" {{ old('status', $solution->status) === 'RejectedByOrganization' ? 'selected' : '' }}>Rejected by Organization</option>
                                 </select>
                                  @error('status') <span class="invalid-feedback">{{ $message }}</span> @enderror
                             </div>
                              <div class="form-group">
                                 <label for="organization_notes">Notes</label>
                                 <textarea class="form-control @error('organization_notes') is-invalid @enderror" id="organization_notes" name="organization_notes" rows="3">{{ old('organization_notes', $solution->organization_notes) }}</textarea>
                                  @error('organization_notes') <span class="invalid-feedback">{{ $message }}</span> @enderror
                             </div>
                              <button type="submit" class="btn btn-primary">Update Solution Details</button>
                               <a href="{{ route('organization.listAdoptedSolutions') }}" class="btn btn-secondary">Back to List</a>
                         </form>

                     </div>
                 </div>


            @endsection
            ```

        *   Edit Category Interests (`OrganizationController@editCategoryInterests`)
            *   المسار: `resources/views/organization/category_interests/edit.blade.php`
            *   البيانات المتاحة: `$organizationProfile` (OrganizationProfile model), `$allCategories` (Collection of main ProblemCategory models with children), `$organizationInterests` (Array of IDs of categories the organization is currently interested in)

            ```html
             @extends('layouts.app')

            @section('title', $organizationProfile->name . ' - Manage Interests')

            @section('content')
                 <h1>Manage Category Interests for {{ $organizationProfile->name }}</h1>

                 <p>Select the problem categories your organization is interested in:</p>

                 <form action="{{ route('organization.updateCategoryInterests') }}" method="POST">
                     @csrf

                     <div class="form-group">
                         @error('categories') <span class="text-danger">Please select at least one valid category.</span> @enderror

                         @foreach ($allCategories as $category)
                             <div class="form-check">
                                 <input class="form-check-input" type="checkbox" name="categories[]" value="{{ $category->id }}" id="category_{{ $category->id }}" {{ in_array($category->id, old('categories', $organizationInterests)) ? 'checked' : '' }}>
                                 <label class="form-check-label" for="category_{{ $category->id }}">
                                     <strong>{{ $category->name }}</strong>
                                 </label>
                             </div>
                             @if ($category->children->isNotEmpty())
                                 <div class="ml-4"> {{-- Indent subcategories --}}
                                     @foreach ($category->children as $childCategory)
                                         <div class="form-check">
                                              <input class="form-check-input" type="checkbox" name="categories[]" value="{{ $childCategory->id }}" id="category_{{ $childCategory->id }}" {{ in_array($childCategory->id, old('categories', $organizationInterests)) ? 'checked' : '' }}>
                                              <label class="form-check-label" for="category_{{ $childCategory->id }}">
                                                 {{ $childCategory->name }}
                                             </label>
                                         </div>
                                     @endforeach
                                 </div>
                             @endif
                         @endforeach
                     </div>


                     <button type="submit" class="btn btn-primary">Update Interests</button>
                     {{-- Redirect to a relevant page, e.g., list of adopted solutions --}}
                     <a href="{{ route('organization.listAdoptedSolutions') }}" class="btn btn-secondary">Cancel</a>

                 </form>
            @endsection
            ```

    *   **General Solutions Views (`SolutionController`)**
        *   المجلد: `resources/views/solutions/`

        *   Index (`SolutionController@index`) - *Assuming this is a public list of successfully implemented solutions*
            *   المسار: `resources/views/solutions/index.blade.php`
            *   البيانات المتاحة: `$adoptedSolutions` (Pagination Collection of Solution models)

            ```html
            @extends('layouts.app')

            @section('title', 'Approved Solutions')

            @section('content')
                 <h1>Approved Solutions</h1>

                 <p>Browse comments that organizations have adopted and are working on.</p>

                 @if ($adoptedSolutions->isEmpty())
                     <p>No adopted solutions found yet.</p>
                 @else
                      <div class="list-group">
                         @foreach ($adoptedSolutions as $solution)
                              {{-- Link to the general solution show page --}}
                              <a href="{{ route('solutions.show', $solution) }}" class="list-group-item list-group-item-action">
                                  <h5 class="mb-1">Solution for: {{ $solution->adoptedComment->problem->title ?? 'N/A Problem' }}</h5>
                                  <p class="mb-1">{{ \Illuminate\Support\Str::limit($solution->adoptedComment->content, 150) }}</p>
                                  <small>
                                      Adopted by: {{ $solution->adoptingOrganization->name ?? 'N/A Organization' }} |
                                      Status: {{ $solution->status }} |
                                      Adopted On: {{ $solution->created_at->format('Y-m-d') }}
                                  </small>
                              </a>
                         @endforeach
                      </div>

                      <div class="mt-3">
                          {{ $adoptedSolutions->links() }}
                      </div>
                 @endif
            @endsection
            ```

        *   Show (`SolutionController@show`) - *General view of a specific adopted solution*
            *   المسار: `resources/views/solutions/show.blade.php`
            *   البيانات المتاحة: `$solution` (Solution model with loaded relationships)

            ```html
            @extends('layouts.app')

            @section('title', 'Solution for: ' . ($solution->adoptedComment->problem->title ?? ''))

            @section('content')
                 <h1>Solution Details</h1>

                 <div class="card mb-3">
                     <div class="card-header">Problem & Original Comment</div>
                     <div class="card-body">
                         <p><strong>Problem:</strong> <a href="{{ route('problems.show', $solution->adoptedComment->problem) }}">{{ $solution->adoptedComment->problem->title ?? 'N/A' }}</a></p>
                         <p><strong>Original Comment Author:</strong> {{ $solution->adoptedComment->author->username ?? 'N/A' }}</p>
                         <p><strong>Comment Content:</strong></p>
                         <div class="border p-3 mb-3">{{ $solution->adoptedComment->content ?? 'N/A' }}</div>
                          <p><a href="{{ route('problems.show', $solution->adoptedComment->problem) }}#comment-{{ $solution->comment_id }}">View original comment in problem</a></p>
                     </div>
                 </div>

                  <div class="card mb-3">
                      <div class="card-header">Adoption Details</div>
                      <div class="card-body">
                          <p><strong>Adopting Organization:</strong> {{ $solution->adoptingOrganization->name ?? 'N/A' }}</p>
                          <p><strong>Adoption Status:</strong> {{ $solution->status }}</p>
                          <p><strong>Adopted On:</strong> {{ $solution->created_at->format('Y-m-d H:i') }}</p>
                          <p><strong>Last Updated:</strong> {{ $solution->updated_at->format('Y-m-d H:i') }}</p>

                          {{-- Organization notes are internal, usually not shown in public view --}}
                           {{-- <p><strong>Organization Notes:</strong> {{ $solution->organization_notes ?? 'N/A' }}</p> --}}

                      </div>
                  </div>

                   {{-- Link back to problem or list of solutions --}}
                   <a href="{{ route('problems.show', $solution->adoptedComment->problem) }}" class="btn btn-secondary">Back to Problem</a>
                    <a href="{{ route('solutions.index') }}" class="btn btn-secondary">Back to Solutions List</a>


            @endsection
            ```

    *   **Admin Views (`AdminController`)**
        *   المجلد: `resources/views/admin/` (مع مجلدات فرعية مثل `accounts`, `problems`, `categories`, `badges`, `solutions`)

        *   Dashboard (`AdminController@dashboard`)
            *   المسار: `resources/views/admin/dashboard.blade.php`
            *   البيانات المتاحة: `$accountsCount`, `$problemsCount`, `$commentsCount`, `$adoptedSolutionsCount`

            ```html
            @extends('layouts.app')

            @section('title', 'Admin Dashboard')

            @section('content')
                <h1>Admin Dashboard</h1>

                <div class="row">
                    <div class="col-md-3">
                        <div class="card text-white bg-primary mb-3">
                            <div class="card-header">Total Accounts</div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $accountsCount }}</h5>
                                <p class="card-text"><a href="{{ route('admin.accounts.index') }}" class="text-white">Manage Accounts</a></p>
                            </div>
                        </div>
                    </div>
                     <div class="col-md-3">
                         <div class="card text-white bg-info mb-3">
                            <div class="card-header">Total Problems</div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $problemsCount }}</h5>
                                <p class="card-text"><a href="{{ route('admin.problems.index') }}" class="text-white">Manage Problems</a></p>
                            </div>
                        </div>
                    </div>
                     <div class="col-md-3">
                         <div class="card text-white bg-success mb-3">
                            <div class="card-header">Total Comments</div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $commentsCount }}</h5>
                                {{-- Add link to manage comments if needed --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                         <div class="card text-white bg-warning mb-3">
                            <div class="card-header">Adopted Solutions</div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $adoptedSolutionsCount }}</h5>
                                <p class="card-text"><a href="{{ route('admin.solutions.index') }}" class="text-white">Manage Solutions</a></p>
                            </div>
                        </div>
                    </div>
                </div>

                 {{-- Links to other admin sections --}}
                 <div class="mt-4">
                     <h3>Management Sections</h3>
                     <ul>
                         <li><a href="{{ route('admin.categories.index') }}">Manage Problem Categories</a></li>
                         <li><a href="{{ route('admin.badges.index') }}">Manage Badges</a></li>
                         {{-- Add more links as needed --}}
                     </ul>
                 </div>


            @endsection
            ```

        *   Accounts Index (`AdminController@indexAccounts`) - *Based on `Route::resource('accounts')->except(['show', 'create', 'store'])`*
            *   المسار: `resources/views/admin/accounts/index.blade.php`
            *   البيانات المتاحة: `$accounts` (Pagination Collection of Account models)

            ```html
            @extends('layouts.app')

            @section('title', 'Manage Accounts')

            @section('content')
                <h1>Manage Accounts</h1>

                 {{-- Link to create new account manually by admin if needed --}}
                 {{-- <p><a href="{{ route('admin.accounts.create') }}" class="btn btn-primary">Add New Account</a></p> --}}

                @if ($accounts->isEmpty())
                    <p>No accounts found.</p>
                @else
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Type</th>
                                <th>Points</th>
                                <th>Active</th>
                                <th>Registered At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($accounts as $account)
                                <tr>
                                    <td>{{ $account->id }}</td>
                                    <td>{{ $account->username }}</td>
                                    <td>{{ $account->email }}</td>
                                    <td>{{ ucfirst($account->account_type) }}</td>
                                    <td>{{ $account->points }}</td>
                                    <td>{{ $account->is_active ? 'Yes' : 'No' }}</td>
                                    <td>{{ $account->created_at->format('Y-m-d') }}</td>
                                    <td>
                                        <a href="{{ route('admin.accounts.edit', $account) }}" class="btn btn-sm btn-secondary">Edit</a>
                                        @if (Auth::id() !== $account->id) {{-- لا تسمح للمسؤول بحذف حسابه من هنا --}}
                                            <form action="{{ route('admin.accounts.destroy', $account) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this account and all its data?');">Delete</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-3">
                        {{ $accounts->links() }}
                    </div>
                @endif
            @endsection
            ```

        *   Accounts Edit (`AdminController@editAccount`) - *Based on `Route::resource('accounts')->except(['show', 'create', 'store'])`*
            *   المسار: `resources/views/admin/accounts/edit.blade.php`
            *   البيانات المتاحة: `$account` (Account model with loaded profile)

            ```html
             @extends('layouts.app')

            @section('title', 'Edit Account: ' . $account->username)

            @section('content')
                 <h1>Edit Account</h1>

                 <form action="{{ route('admin.accounts.update', $account) }}" method="POST">
                    @csrf
                    @method('PUT')

                     <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username', $account->username) }}" required>
                         @error('username') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                     <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $account->email) }}" required>
                         @error('email') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                     {{-- Password change should be a separate form/feature for security --}}
                     {{-- <div class="form-group">
                        <label for="password">New Password (leave blank to keep current)</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                         @error('password') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div> --}}

                     <div class="form-group">
                        <label for="account_type">Account Type</label>
                         <select class="form-control @error('account_type') is-invalid @enderror" id="account_type" name="account_type" required>
                             <option value="individual" {{ old('account_type', $account->account_type) === 'individual' ? 'selected' : '' }}>Individual</option>
                             <option value="organization" {{ old('account_type', $account->account_type) === 'organization' ? 'selected' : '' }}>Organization</option>
                             <option value="admin" {{ old('account_type', $account->account_type) === 'admin' ? 'selected' : '' }}>Admin</option>
                         </select>
                          @error('account_type') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="points">Points</label>
                        <input type="number" class="form-control @error('points') is-invalid @enderror" id="points" name="points" value="{{ old('points', $account->points) }}" required min="0">
                         @error('points') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                     <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input @error('is_active') is-invalid @enderror" id="is_active" name="is_active" value="1" {{ old('is_active', $account->is_active) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">Is Active</label>
                         @error('is_active') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    {{-- Note: Editing user/org profile details (name, phone, bio, address) would require
                         fetching/saving the associated profile model based on account_type.
                         For simplicity here, we only include Account table fields.
                    --}}


                    <button type="submit" class="btn btn-primary">Update Account</button>
                     <a href="{{ route('admin.accounts.index') }}" class="btn btn-secondary">Cancel</a>
                 </form>
            @endsection
            ```

        *   Problems Index (`AdminController@indexProblems`) - *Based on `Route::resource('problems')->except(['create', 'store', 'show'])`*
            *   المسار: `resources/views/admin/problems/index.blade.php`
            *   البيانات المتاحة: `$problems` (Pagination Collection of Problem models)

            ```html
             @extends('layouts.app')

            @section('title', 'Manage Problems')

            @section('content')
                 <h1>Manage Problems</h1>

                 {{-- Admin might create problems from here too --}}
                 {{-- <p><a href="{{ route('admin.problems.create') }}" class="btn btn-primary">Create New Problem</a></p> --}}

                @if ($problems->isEmpty())
                    <p>No problems found.</p>
                @else
                     <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Submitter</th>
                                <th>Category</th>
                                <th>Urgency</th>
                                <th>Status</th>
                                <th>Posted At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($problems as $problem)
                                <tr>
                                    <td>{{ $problem->id }}</td>
                                    <td><a href="{{ route('problems.show', $problem) }}">{{ \Illuminate\Support\Str::limit($problem->title, 50) }}</a></td> {{-- رابط لصفحة عرض المشكلة العامة --}}
                                    <td>{{ $problem->submittedBy->username ?? 'N/A' }}</td>
                                    <td>{{ $problem->category->name ?? 'N/A' }}</td>
                                    <td>{{ $problem->urgency }}</td>
                                    <td>{{ $problem->status }}</td>
                                    <td>{{ $problem->created_at->format('Y-m-d') }}</td>
                                    <td>
                                         {{-- Link to admin edit page --}}
                                        <a href="{{ route('admin.problems.edit', $problem) }}" class="btn btn-sm btn-secondary">Edit</a>
                                        <form action="{{ route('admin.problems.destroy', $problem) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this problem and all associated data (comments, solutions)?');">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                     <div class="mt-3">
                         {{ $problems->links() }}
                     </div>
                @endif
            @endsection
            ```

        *   Problems Edit (`AdminController@editProblem`) - *Based on `Route::resource('problems')->except(['create', 'store', 'show'])`*
            *   المسار: `resources/views/admin/problems/edit.blade.php`
            *   البيانات المتاحة: `$problem` (Problem model), `$categories` (Collection of ProblemCategory models)

            ```html
            @extends('layouts.app')

            @section('title', 'Admin Edit Problem: ' . $problem->title)

            @section('content')
                 <h1>Admin Edit Problem</h1>

                 <form action="{{ route('admin.problems.update', $problem) }}" method="POST">
                     @csrf
                     @method('PUT')

                     <div class="form-group">
                         <label for="title">Problem Title</label>
                         <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $problem->title) }}" required>
                          @error('title') <span class="invalid-feedback">{{ $message }}</span> @enderror
                     </div>

                     <div class="form-group">
                         <label for="description">Detailed Description</label>
                         <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="6" required>{{ old('description', $problem->description) }}</textarea>
                          @error('description') <span class="invalid-feedback">{{ $message }}</span> @enderror
                     </div>

                     <div class="form-group">
                         <label for="category_id">Category</label>
                         <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                             <option value="">Select a Category</option>
                             @foreach ($categories as $category)
                                  <option value="{{ $category->id }}" {{ old('category_id', $problem->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                             @endforeach
                         </select>
                         @error('category_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
                     </div>

                      <div class="form-group">
                         <label for="urgency">Urgency Level</label>
                         <select class="form-control @error('urgency') is-invalid @enderror" id="urgency" name="urgency" required>
                             <option value="Low" {{ old('urgency', $problem->urgency) === 'Low' ? 'selected' : '' }}>Low</option>
                             <option value="Medium" {{ old('urgency', $problem->urgency) === 'Medium' ? 'selected' : '' }}>Medium</option>
                             <option value="High" {{ old('urgency', $problem->urgency) === 'High' ? 'selected' : '' }}>High</option>
                         </select>
                          @error('urgency') <span class="invalid-feedback">{{ $message }}</span> @enderror
                     </div>

                     <div class="form-group">
                         <label for="status">Status</label>
                         <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                             <option value="Draft" {{ old('status', $problem->status) === 'Draft' ? 'selected' : '' }}>Draft</option>
                             <option value="Published" {{ old('status', $problem->status) === 'Published' ? 'selected' : '' }}>Published</option>
                             <option value="UnderReview" {{ old('status', $problem->status) === 'UnderReview' ? 'selected' : '' }}>Under Review</option>
                             <option value="Hidden" {{ old('status', $problem->status) === 'Hidden' ? 'selected' : '' }}>Hidden</option>
                             <option value="Suspended" {{ old('status', $problem->status) === 'Suspended' ? 'selected' : '' }}>Suspended</option>
                             <option value="Resolved" {{ old('status', $problem->status) === 'Resolved' ? 'selected' : '' }}>Resolved</option>
                             <option value="Archived" {{ old('status', $problem->status) === 'Archived' ? 'selected' : '' }}>Archived</option>
                         </select>
                          @error('status') <span class="invalid-feedback">{{ $message }}</span> @enderror
                     </div>

                     <div class="form-group">
                         <label for="tags">Tags (comma-separated)</label>
                         <input type="text" class="form-control @error('tags') is-invalid @enderror" id="tags" name="tags" value="{{ old('tags', $problem->tags) }}">
                          @error('tags') <span class="invalid-feedback">{{ $message }}</span> @enderror
                     </div>

                     <button type="submit" class="btn btn-primary">Update Problem</button>
                      <a href="{{ route('admin.problems.index') }}" class="btn btn-secondary">Cancel</a>
                 </form>
            @endsection
            ```

        *   Categories Index (`AdminController@indexCategories`) - *Based on `Route::resource('categories')->except(['show'])`*
            *   المسار: `resources/views/admin/categories/index.blade.php`
            *   البيانات المتاحة: `$categories` (Collection of ProblemCategory models)

            ```html
            @extends('layouts.app')

            @section('title', 'Manage Categories')

            @section('content')
                 <h1>Manage Problem Categories</h1>

                 <p><a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Add New Category</a></p>

                 @if ($categories->isEmpty())
                     <p>No categories found.</p>
                 @else
                      <table class="table table-bordered">
                         <thead>
                             <tr>
                                 <th>ID</th>
                                 <th>Name</th>
                                 <th>Parent</th>
                                 <th>Description</th>
                                 <th>Actions</th>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach ($categories as $category)
                                 <tr>
                                     <td>{{ $category->id }}</td>
                                     <td>{{ $category->name }}</td>
                                     <td>{{ $category->parent->name ?? '-' }}</td>
                                     <td>{{ \Illuminate\Support\Str::limit($category->description, 100) }}</td>
                                     <td>
                                          <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-sm btn-secondary">Edit</a>
                                         <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="d-inline">
                                             @csrf
                                             @method('DELETE')
                                             <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this category? (Problems in this category may be affected)');">Delete</button>
                                         </form>
                                     </td>
                                 </tr>
                             @endforeach
                         </tbody>
                     </table>
                     {{-- No pagination added in controller, but can be added --}}
                 @endif
            @endsection
            ```
            *ملاحظة:* نحتاج لإضافة دوال `indexCategories`, `createCategory`, `storeCategory`, `editCategory`, `updateCategory`, `destroyCategory` في `AdminController` لتعمل هذه الواجهة والمسارات بشكل صحيح. حالياً، متحكم `AdminController` يخلط بين إدارة الموارد المختلفة.

        *   Categories Create (`AdminController@createCategory`) - *Based on `Route::resource('categories')->except(['show'])`*
            *   المسار: `resources/views/admin/categories/create.blade.php`
            *   البيانات المتاحة: `$categories` (Collection of ProblemCategory models لعرض الفئات الأم المحتملة)

            ```html
            @extends('layouts.app')

            @section('title', 'Admin Create Category')

            @section('content')
                 <h1>Admin Create Problem Category</h1>

                 <form action="{{ route('admin.categories.store') }}" method="POST">
                     @csrf

                     <div class="form-group">
                         <label for="name">Category Name</label>
                         <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                          @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
                     </div>

                     <div class="form-group">
                         <label for="description">Description</label>
                         <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                          @error('description') <span class="invalid-feedback">{{ $message }}</span> @enderror
                     </div>

                     <div class="form-group">
                         <label for="parent_category_id">Parent Category (Optional)</label>
                         <select class="form-control @error('parent_category_id') is-invalid @enderror" id="parent_category_id" name="parent_category_id">
                             <option value="">-- No Parent --</option>
                             @foreach ($categories as $category) {{-- $categories يجب أن تأتي من المتحكم --}}
                                  <option value="{{ $category->id }}" {{ old('parent_category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                             @endforeach
                         </select>
                          @error('parent_category_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
                     </div>


                     <button type="submit" class="btn btn-primary">Create Category</button>
                      <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Cancel</a>
                 </form>
            @endsection
            ```
            *ملاحظة:* يجب تحديث دالة `createCategory` في `AdminController` لتمرير `$categories` ( ProblemCategory::all() ).

        *   Categories Edit (`AdminController@editCategory`) - *Based on `Route::resource('categories')->except(['show'])`*
            *   المسار: `resources/views/admin/categories/edit.blade.php`
            *   البيانات المتاحة: `$category` (ProblemCategory model), `$categories` (Collection of ProblemCategory models excluding the current one, for parent selection)

            ```html
            @extends('layouts.app')

            @section('title', 'Admin Edit Category: ' . $category->name)

            @section('content')
                 <h1>Admin Edit Problem Category</h1>

                 <form action="{{ route('admin.categories.update', $category) }}" method="POST">
                     @csrf
                     @method('PUT')

                     <div class="form-group">
                         <label for="name">Category Name</label>
                         <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $category->name) }}" required>
                          @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
                     </div>

                     <div class="form-group">
                         <label for="description">Description</label>
                         <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description', $category->description) }}</textarea>
                          @error('description') <span class="invalid-feedback">{{ $message }}</span> @enderror
                     </div>

                     <div class="form-group">
                         <label for="parent_category_id">Parent Category (Optional)</label>
                         <select class="form-control @error('parent_category_id') is-invalid @enderror" id="parent_category_id" name="parent_category_id">
                             <option value="">-- No Parent --</option>
                             @foreach ($categories as $parentCategory) {{-- $categories يجب أن تأتي من المتحكم --}}
                                  {{-- لا تسمح للفئة بأن تكون ابناً لنفسها أو لأبنائها --}}
                                  @if ($parentCategory->id !== $category->id && ! $category->children->contains('id', $parentCategory->id) ) {{-- Child check might be complex --}}
                                     <option value="{{ $parentCategory->id }}" {{ old('parent_category_id', $category->parent_category_id) == $parentCategory->id ? 'selected' : '' }}>{{ $parentCategory->name }}</option>
                                  @endif
                             @endforeach
                         </select>
                          @error('parent_category_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
                     </div>


                     <button type="submit" class="btn btn-primary">Update Category</button>
                      <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Cancel</a>
                 </form>
            @endsection
            ```
             *ملاحظة:* يجب تحديث دالة `editCategory` في `AdminController` لتمرير `$categories` ( ProblemCategory::all() أو مجموعة الفئات الصالحة كآباء).

        *   Badges Index (`AdminController@indexBadges`) - *Based on `Route::resource('badges')->except(['show'])`*
            *   المسار: `resources/views/admin/badges/index.blade.php`
            *   البيانات المتاحة: `$badges` (Collection of Badge models)

            ```html
            @extends('layouts.app')

            @section('title', 'Admin Manage Badges')

            @section('content')
                 <h1>Admin Manage Badges</h1>

                 <p><a href="{{ route('admin.badges.create') }}" class="btn btn-primary">Create New Badge</a></p>

                 @if ($badges->isEmpty())
                     <p>No badges found.</p>
                 @else
                      <table class="table table-bordered">
                         <thead>
                             <tr>
                                 <th>ID</th>
                                 <th>Name</th>
                                 <th>Image</th>
                                 <th>Req. Points</th>
                                 <th>Req. Adopted Comments</th>
                                 <th>Description</th>
                                 <th>Actions</th>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach ($badges as $badge)
                                 <tr>
                                     <td>{{ $badge->id }}</td>
                                     <td>{{ $badge->name }}</td>
                                     <td>
                                         @if ($badge->image_url)
                                             <img src="{{ asset($badge->image_url) }}" alt="{{ $badge->name }}" style="width: 30px; height: 30px;">
                                         @else
                                             No Image
                                         @endif
                                     </td>
                                     <td>{{ $badge->required_points }}</td>
                                     <td>{{ $badge->required_adopted_comments_count }}</td>
                                     <td>{{ \Illuminate\Support\Str::limit($badge->description, 100) }}</td>
                                     <td>
                                          <a href="{{ route('admin.badges.edit', $badge) }}" class="btn btn-sm btn-secondary">Edit</a>
                                         <form action="{{ route('admin.badges.destroy', $badge) }}" method="POST" class="d-inline">
                                             @csrf
                                             @method('DELETE')
                                             <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this badge?');">Delete</button>
                                         </form>
                                     </td>
                                 </tr>
                             @endforeach
                         </tbody>
                     </table>
                     {{-- No pagination added in controller --}}
                 @endif
            @endsection
            ```
            *ملاحظة:* نحتاج لإضافة دوال `indexBadges`, `createBadge`, `storeBadge`, `editBadge`, `updateBadge`, `destroyBadge` في `AdminController`.

        *   Badges Create (`AdminController@createBadge`) - *Based on `Route::resource('badges')->except(['show'])`*
            *   المسار: `resources/views/admin/badges/create.blade.php`
            *   البيانات المتاحة: (لا يوجد بيانات)

            ```html
             @extends('layouts.app')

            @section('title', 'Admin Create Badge')

            @section('content')
                 <h1>Admin Create Badge</h1>

                 <form action="{{ route('admin.badges.store') }}" method="POST">
                     @csrf

                     <div class="form-group">
                         <label for="name">Badge Name</label>
                         <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                          @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
                     </div>

                      <div class="form-group">
                         <label for="description">Description</label>
                         <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                          @error('description') <span class="invalid-feedback">{{ $message }}</span> @enderror
                     </div>

                      <div class="form-group">
                         <label for="image_url">Image URL</label>
                         <input type="text" class="form-control @error('image_url') is-invalid @enderror" id="image_url" name="image_url" value="{{ old('image_url') }}">
                          @error('image_url') <span class="invalid-feedback">{{ $message }}</span> @enderror
                     </div>

                      <div class="form-group">
                         <label for="required_points">Required Points</label>
                         <input type="number" class="form-control @error('required_points') is-invalid @enderror" id="required_points" name="required_points" value="{{ old('required_points', 0) }}" required min="0">
                          @error('required_points') <span class="invalid-feedback">{{ $message }}</span> @enderror
                     </div>

                      <div class="form-group">
                         <label for="required_adopted_comments_count">Required Adopted Comments Count</label>
                         <input type="number" class="form-control @error('required_adopted_comments_count') is-invalid @enderror" id="required_adopted_comments_count" name="required_adopted_comments_count" value="{{ old('required_adopted_comments_count', 0) }}" required min="0">
                          @error('required_adopted_comments_count') <span class="invalid-feedback">{{ $message }}</span> @enderror
                     </div>

                     <button type="submit" class="btn btn-primary">Create Badge</button>
                      <a href="{{ route('admin.badges.index') }}" class="btn btn-secondary">Cancel</a>
                 </form>
            @endsection
            ```
             *ملاحظة:* نحتاج لإضافة دالتي `createBadge` و `storeBadge` في `AdminController`.

        *   Badges Edit (`AdminController@editBadge`) - *Based on `Route::resource('badges')->except(['show'])`*
            *   المسار: `resources/views/admin/badges/edit.blade.php`
            *   البيانات المتاحة: `$badge` (Badge model)

            ```html
            @extends('layouts.app')

            @section('title', 'Admin Edit Badge: ' . $badge->name)

            @section('content')
                 <h1>Admin Edit Badge</h1>

                 <form action="{{ route('admin.badges.update', $badge) }}" method="POST">
                     @csrf
                     @method('PUT')

                     <div class="form-group">
                         <label for="name">Badge Name</label>
                         <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $badge->name) }}" required>
                          @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
                     </div>

                      <div class="form-group">
                         <label for="description">Description</label>
                         <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description', $badge->description) }}</textarea>
                          @error('description') <span class="invalid-feedback">{{ $message }}</span> @enderror
                     </div>

                      <div class="form-group">
                         <label for="image_url">Image URL</label>
                         <input type="text" class="form-control @error('image_url') is-invalid @enderror" id="image_url" name="image_url" value="{{ old('image_url', $badge->image_url) }}">
                          @error('image_url') <span class="invalid-feedback">{{ $message }}</span> @enderror
                     </div>

                      <div class="form-group">
                         <label for="required_points">Required Points</label>
                         <input type="number" class="form-control @error('required_points') is-invalid @enderror" id="required_points" name="required_points" value="{{ old('required_points', $badge->required_points) }}" required min="0">
                          @error('required_points') <span class="invalid-feedback">{{ $message }}</span> @enderror
                     </div>

                      <div class="form-group">
                         <label for="required_adopted_comments_count">Required Adopted Comments Count</label>
                         <input type="number" class="form-control @error('required_adopted_comments_count') is-invalid @enderror" id="required_adopted_comments_count" name="required_adopted_comments_count" value="{{ old('required_adopted_comments_count', $badge->required_adopted_comments_count) }}" required min="0">
                          @error('required_adopted_comments_count') <span class="invalid-feedback">{{ $message }}</span> @enderror
                     </div>

                     <button type="submit" class="btn btn-primary">Update Badge</button>
                      <a href="{{ route('admin.badges.index') }}" class="btn btn-secondary">Cancel</a>
                 </form>
            @endsection
            ```
             *ملاحظة:* نحتاج لإضافة دالتي `editBadge` و `updateBadge` في `AdminController`.

        *   Adopted Solutions Index (`AdminController@indexAdoptedSolutions`) - *Based on `Route::resource('solutions')->except(['create', 'store', 'edit'])`*
            *   المسار: `resources/views/admin/solutions/index.blade.php`
            *   البيانات المتاحة: `$adoptedSolutions` (Pagination Collection of Solution models)

            ```html
            @extends('layouts.app')

            @section('title', 'Admin Manage Adopted Solutions')

            @section('content')
                 <h1>Admin Manage Adopted Solutions</h1>

                 @if ($adoptedSolutions->isEmpty())
                     <p>No adopted solutions found.</p>
                 @else
                      <table class="table table-bordered">
                         <thead>
                             <tr>
                                 <th>ID</th>
                                 <th>Comment ID</th>
                                 <th>Problem Title</th>
                                 <th>Original Author</th>
                                 <th>Adopting Org</th>
                                 <th>Status</th>
                                 <th>Adopted At</th>
                                 <th>Actions</th>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach ($adoptedSolutions as $solution)
                                 <tr>
                                     <td>{{ $solution->id }}</td>
                                     <td>{{ $solution->comment_id }}</td>
                                     <td><a href="{{ route('problems.show', $solution->adoptedComment->problem) }}">{{ \Illuminate\Support\Str::limit($solution->adoptedComment->problem->title ?? 'N/A', 50) }}</a></td>
                                     <td>{{ $solution->adoptedComment->author->username ?? 'N/A' }}</td>
                                     <td>{{ $solution->adoptingOrganization->name ?? 'N/A' }}</td>
                                     <td>{{ $solution->status }}</td>
                                     <td>{{ $solution->created_at->format('Y-m-d') }}</td>
                                     <td>
                                         {{-- Link to admin show page --}}
                                          <a href="{{ route('admin.solutions.show', $solution) }}" class="btn btn-sm btn-info">View</a>
                                          {{-- No edit link based on routes, status is updated via show page form --}}
                                         <form action="{{ route('admin.solutions.destroy', $solution) }}" method="POST" class="d-inline">
                                             @csrf
                                             @method('DELETE')
                                             <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this adopted solution?');">Delete</button>
                                         </form>
                                     </td>
                                 </tr>
                             @endforeach
                         </tbody>
                     </table>

                     <div class="mt-3">
                         {{ $adoptedSolutions->links() }}
                     </div>
                 @endif
            @endsection
            ```
             *ملاحظة:* نحتاج لإضافة دالتي `indexAdoptedSolutions` و `destroyAdoptedSolution` في `AdminController`.

        *   Adopted Solutions Show (`AdminController@showAdoptedSolution`) - *Based on `Route::resource('solutions')->except(['create', 'store', 'edit'])`*
            *   المسار: `resources/views/admin/solutions/show.blade.php`
            *   البيانات المتاحة: `$solution` (Solution model with loaded relationships)

            ```html
            @extends('layouts.app')

            @section('title', 'Admin Adopted Solution: ' . ($solution->adoptedComment->problem->title ?? ''))

            @section('content')
                 <h1>Admin View Adopted Solution</h1>

                 <div class="card mb-3">
                     <div class="card-header">Original Comment & Problem</div>
                     <div class="card-body">
                         <p><strong>Problem:</strong> <a href="{{ route('problems.show', $solution->adoptedComment->problem) }}">{{ $solution->adoptedComment->problem->title ?? 'N/A' }}</a></p>
                         <p><strong>Original Comment Author:</strong> {{ $solution->adoptedComment->author->username ?? 'N/A' }}</p>
                         <p><strong>Comment Content:</strong></p>
                         <div class="border p-3 mb-3">{{ $solution->adoptedComment->content ?? 'N/A' }}</div>
                          <p><a href="{{ route('problems.show', $solution->adoptedComment->problem) }}#comment-{{ $solution->comment_id }}">View original comment in problem</a></p>
                     </div>
                 </div>

                  <div class="card mb-3">
                      <div class="card-header">Adoption Details by {{ $solution->adoptingOrganization->name ?? 'N/A Organization' }}</div>
                      <div class="card-body">
                          <p><strong>Adopting Organization:</strong> {{ $solution->adoptingOrganization->name ?? 'N/A' }}</p>
                          <p><strong>Adoption Status:</strong> {{ $solution->status }}</p>
                          <p><strong>Adopted On:</strong> {{ $solution->created_at->format('Y-m-d H:i') }}</p>
                          <p><strong>Last Updated:</strong> {{ $solution->updated_at->format('Y-m-d H:i') }}</p>

                           <p><strong>Organization Notes:</strong></p>
                          <div class="border p-3">{{ $solution->organization_notes ?? 'No notes added yet.' }}</div>


                          {{-- Form to update status and notes (similar to OrganizationController but for Admin) --}}
                          <h6 class="mt-4">Update Status and Notes</h6>
                          <form action="{{ route('admin.solutions.update', $solution) }}" method="POST">
                              @csrf
                              @method('PUT')
                              <div class="form-group">
                                  <label for="status">Status</label>
                                  <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                                      <option value="UnderConsideration" {{ old('status', $solution->status) === 'UnderConsideration' ? 'selected' : '' }}>Under Consideration</option>
                                      <option value="Adopted" {{ old('status', $solution->status) === 'Adopted' ? 'selected' : '' }}>Adopted</option>
                                      <option value="ImplementationInProgress" {{ old('status', $solution->status) === 'ImplementationInProgress' ? 'selected' : '' }}>Implementation In Progress</option>
                                      <option value="ImplementationCompleted" {{ old('status', $solution->status) === 'ImplementationCompleted' ? 'selected' : '' }}>Implementation Completed</option>
                                      <option value="RejectedByOrganization" {{ old('status', $solution->status) === 'RejectedByOrganization' ? 'selected' : '' }}>Rejected by Organization</option>
                                  </select>
                                   @error('status') <span class="invalid-feedback">{{ $message }}</span> @enderror
                              </div>
                               <div class="form-group">
                                  <label for="organization_notes">Notes</label>
                                  <textarea class="form-control @error('organization_notes') is-invalid @enderror" id="organization_notes" name="organization_notes" rows="3">{{ old('organization_notes', $solution->organization_notes) }}</textarea>
                                   @error('organization_notes') <span class="invalid-feedback">{{ $message }}</span> @enderror
                              </div>
                               <button type="submit" class="btn btn-primary">Update Solution Details</button>
                          </form>
                      </div>
                  </div>

                  {{-- Delete button --}}
                  <form action="{{ route('admin.solutions.destroy', $solution) }}" method="POST" class="d-inline">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this adopted solution?');">Delete Adopted Solution</button>
                  </form>
                   <a href="{{ route('admin.solutions.index') }}" class="btn btn-secondary">Back to List</a>


            @endsection
            ```
            *ملاحظة:* نحتاج لإضافة دالتي `showAdoptedSolution` و `updateAdoptedSolution` في `AdminController`.

**الخطوة التالية بعد إنشاء الواجهات:**

الآن بعد أن أصبحت ملفات الواجهات موجودة، أصبح بإمكانك تشغيل مشروعك باستخدام `php artisan serve` وزيارة العناوين URL المختلفة (مثل `/`, `/problems`, `/login`) ورؤية الصفحات تعرض الهيكل الأساسي والبيانات التي تم تلقيمها باستخدام الـ Seeders.

الخطوة العملية التالية هي:

1.  **إكمال Seeders:** العودة إلى ملفات الـ Seeder التي أنشأناها في الخطوة السابقة وملء محتواها الفعلي وتشغيلها (`php artisan db:seed`). هذا سيجعل لديك بيانات حقيقية (وهمية) لتجربتها.
2.  **إكمال منطق المتحكمات:** مراجعة الدوال في المتحكمات وملء أي منطق مفقود (مثل التحقق من الصلاحيات الدقيقة باستخدام Policies التي أنشأناها، معالجة تحميل الملفات إذا كانت جزءًا من ميزة أخرى، تحديث عدادات النقاط، إلخ).
3.  **تحسين الواجهات:** البدء في تصميم وتنسيق ملفات Blade التي أنشأناها لتبدو أفضل، وإضافة المزيد من عناصر التفاعل (مثل استخدام Ajax للتصويت على التعليقات بدون تحديث كامل للصفحة).
4.  **إنشاء Policies المتبقية:** إنشاء Policies للنماذج الأخرى التي تحتاج صلاحيات دقيقة (مثل `CommentPolicy`, `SolutionPolicy`, `AccountPolicy`) وتطبيقها في المتحكمات المعنية.
5.  **إضافة ميزات مفقودة:** بناء الميزات الإضافية التي لم نغطها بالكامل (مثل استعادة كلمة المرور، صفحات عرض ملفات تعريف المستخدمين والمنظمات بشكل كامل، نظام الإشعارات، إلخ).

الآن لديك قاعدة قوية جداً للبدء في بناء تطبيقك.


تمام، هذا الخطأ `Argument #2 ($provider) must be of type Illuminate\Contracts\Auth\UserProvider, null given` يعني أن نظام المصادقة في Laravel (الـ Guard المحدد، وهو 'web' افتراضيًا) لا يستطيع العثور على الـ User Provider (مزود المستخدمين) الذي تم تكوينه له.

السبب هو أنك قمت بتغيير اسم الـ provider من `'users'` إلى `'accounts'` في قسم `providers` بملف `config/auth.php`، وهو صحيح لتوجيهه إلى نموذج `Account` الجديد. ولكنك لم تقم بتحديث الـ **Guard** (`web` في قسم `guards`) ليشير إلى اسم الـ provider الجديد هذا.

Guard 'web' لا يزال يبحث عن provider اسمه 'users'، والذي إما لم يعد موجودًا أو لا يشير بشكل صحيح إلى نموذج `Account`.

**الحل:**

تحتاج إلى تحديث قسم `guards` في ملف `config/auth.php` ليشير إلى اسم الـ provider الصحيح (`'accounts'`).

افتح ملف `config/auth.php` وتأكد من أن التغييرات كالتالي:

```php
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'accounts', // تأكد أن هذا يشير إلى قسم passwords الصحيح
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Next, you may define every authentication guard for your application.
    | Of course, a great default configuration has been defined for you
    | here which uses session storage and the Eloquent user provider.
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | Supported: "session"
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'accounts', // <--- يجب تغيير هذا من 'users' إلى 'accounts'
        ],
        // يمكنك إضافة Guards أخرى هنا إذا لزم الأمر (مثل 'api')
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | If you have multiple user tables or models you may configure multiple
    | sources which represent each model / table. These sources may then
    | be assigned to any extra authentication guards you have defined.
    |
    | Supported: "database", "eloquent"
    |
    */

    'providers' => [
        'accounts' => [ // <--- اسم Provider الصحيح الذي يشير إلى نموذج Account
            'driver' => 'eloquent',
            'model' => App\Models\Account::class, // <--- يشير إلى نموذج Account
        ],

        // تأكد من حذف أو تعطيل تعريف Provider 'users' القديم إذا كان موجودًا هنا
        // 'users' => [
        //     'driver' => 'eloquent',
        //     'model' => App\Models\User::class, // هذا النموذج غير موجود الآن
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | You may specify multiple password reset configurations if you have more
    | than one user table or model in the application and you want to have
    | separate password reset settings based on the specific user types.
    |
    | The expiry time is the number of minutes that each reset token will be
    | considered valid. This security feature keeps tokens short-lived so
    | they have less time to be guessed. You may change this as needed.
    |
    | The throttle setting is the number of seconds a user must wait before
    | generating more password reset tokens. This prevents the user from
    | quickly generating a very large amount of password reset tokens.
    |
    */

    'passwords' => [
        'accounts' => [ // <--- تأكد أن هذا يشير إلى الـ Provider الصحيح
            'provider' => 'accounts', // <--- يجب تغيير هذا من 'users' إلى 'accounts'
            'table' => 'password_reset_tokens', // جدول رموز استعادة كلمة المرور (يمكن تركه أو تغييره لaccount_password_reset_tokens إذا أردت فصله)
            'expire' => 60,
            'throttle' => 60,
        ],
        // تأكد من حذف أو تعطيل تعريف passwords 'users' القديم إذا كان موجودًا هنا
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    |
    | Here you may define the amount of seconds before a password confirmation
    | times out and the user is prompted to re-enter their password via the
    | confirmation screen. By default, the timeout lasts for three hours.
    |
    */

    'password_timeout' => 10800,

];
```

بعد إجراء هذا التعديل في ملف `config/auth.php` (خاصة تغيير `'provider'` في `guards['web']` إلى `'accounts'`)، قم بتشغيل أوامر تنظيف الكاش مرة أخرى للتأكد من تحميل التكوين الجديد:

```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
composer dump-autoload
```

هذا يجب أن يحل مشكلة الـ `null` provider، حيث سيتم الآن توجيه الـ Guard 'web' لاستخدام الـ provider المعرف باسم 'accounts' والذي يشير بشكل صحيح إلى نموذج `App\Models\Account`.



---


تمام، أنت على حق. الخطأ يحدث لأنك تستخدم `Route::resource` مع متحكم واحد (`AdminController`) لعدة موارد مختلفة (`accounts`, `problems`, `categories`, `badges`, `solutions`). `Route::resource` يتوقع وجود دوال بالأسماء القياسية (مثل `index`, `create`, `store`, `edit`, `update`, `destroy`) داخل المتحكم للمورد المحدد.

عندما تكتب `Route::resource('accounts', AdminController::class)`, يتوقع Laravel وجود الدوال التالية في `AdminController` لإدارة **الحسابات**:
*   `index()` لعرض قائمة الحسابات.
*   `create()` لعرض نموذج إنشاء حساب.
*   `store()` لمعالجة إنشاء حساب.
*   `show(Account $account)` لعرض حساب واحد.
*   `edit(Account $account)` لعرض نموذج تعديل حساب.
*   `update(Request $request, Account $account)` لمعالجة تعديل حساب.
*   `destroy(Account $account)` لمعالجة حذف حساب.

لكنك في متحكمك `AdminController`، استخدمت أسماء دوال مثل `indexAccounts`, `editAccount`, `updateAccount`, `destroyAccount` لإدارة الحسابات. هذا يسبب عدم تطابق.

**الحل الأفضل والأكثر تنظيمًا في Laravel** هو استخدام متحكم منفصل لكل مورد تديره، خاصة في منطقة مثل لوحة التحكم الإدارية. سنقوم بإنشاء مجلد `Admin` داخل مجلد `app/Http/Controllers` ونضع متحكمًا لكل مورد فيه.

**الخطوات:**

1.  **إنشاء متحكمات جديدة في مجلد Admin:**
    سنقوم بإنشاء متحكم لكل مورد إداري:
    ```bash
    php artisan make:controller Admin/AccountController
    php artisan make:controller Admin/ProblemController
    php artisan make:controller Admin/CategoryController
    php artisan make:controller Admin/BadgeController
    php artisan make:controller Admin/SolutionController
    ```
    سيتم إنشاء هذه الملفات في `app/Http/Controllers/Admin/`.

2.  **تحديث ملف المسارات `routes/web.php`:**
    سنقوم بتعديل المسارات ضمن مجموعة `admin` لتشير كل `Route::resource` إلى المتحكم المخصص لها.

    ```php
    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\HomeController;
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\ProfileController;
    use App\Http\Controllers\ProblemController;
    use App\Http\Controllers\CommentController;
    use App\Http\Controllers\CommentVoteController;
    use App\Http\Controllers\BadgeController;
    use App\Http\Controllers\OrganizationController;
    use App\Http\Controllers\SolutionController as PublicSolutionController; // إعادة تسمية لتجنب التضارب
    use App\Http\Controllers\AdminController; // المتحكم العام للمسؤول
    // استيراد المتحكمات الجديدة في مجلد Admin
    use App\Http\Controllers\Admin\AccountController as AdminAccountController;
    use App\Http\Controllers\Admin\ProblemController as AdminProblemController;
    use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
    use App\Http\Controllers\Admin\BadgeController as AdminBadgeController;
    use App\Http\Controllers\Admin\SolutionController as AdminSolutionController;


    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider and all of them will
    | be assigned to the "web" middleware group. Make something great!
    |
    */

    // --- Public Routes ---
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/problems', [ProblemController::class, 'index'])->name('problems.index');
    Route::get('/problems/{problem}', [ProblemController::class, 'show'])->name('problems.show');
    Route::get('/badges', [BadgeController::class, 'index'])->name('badges.index');
    Route::get('/profiles/{account}', [ProfileController::class, 'show'])->name('profiles.show');
    Route::get('/solutions', [PublicSolutionController::class, 'index'])->name('solutions.index'); // استخدام المتحكم العام للحلول للعرض العام
    Route::get('/solutions/{solution}', [PublicSolutionController::class, 'show'])->name('solutions.show'); // عرض تفاصيل حل عام


    // --- Authentication Routes ---
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


    // --- Authenticated User/Organization Routes ---
    Route::middleware('auth')->group(function () {
        Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::get('/profile/badges', [ProfileController::class, 'showMyBadges'])->name('profile.badges');

        Route::get('/problems/create', [ProblemController::class, 'create'])->name('problems.create');
        Route::post('/problems', [ProblemController::class, 'store'])->name('problems.store');

        Route::get('/problems/{problem}/edit', [ProblemController::class, 'edit'])->name('problems.edit');
        Route::put('/problems/{problem}', [ProblemController::class, 'update'])->name('problems.update');
        Route::delete('/problems/{problem}', [ProblemController::class, 'destroy'])->name('problems.destroy');

        Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
        Route::get('/comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
        Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
        Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

        Route::post('/comments/{comment}/vote', [CommentVoteController::class, 'vote'])->name('comments.vote');
    });


    // --- Organization Specific Routes ---
    Route::middleware(['auth', 'isOrganization'])->prefix('organization')->name('organization.')->group(function () {
        // Route::get('/dashboard', [OrganizationController::class, 'dashboard'])->name('dashboard'); // يمكن إضافة لوحة تحكم للمنظمة هنا

        Route::post('/adopt-comment/{comment}', [OrganizationController::class, 'adoptComment'])->name('adoptComment');

        Route::get('/solutions', [OrganizationController::class, 'listAdoptedSolutions'])->name('listAdoptedSolutions');
        Route::get('/solutions/{solution}', [OrganizationController::class, 'showAdoptedSolution'])->name('showAdoptedSolution');
        Route::put('/solutions/{solution}/status', [OrganizationController::class, 'updateAdoptedSolutionStatus'])->name('updateAdoptedSolutionStatus');

        Route::get('/categories/interests', [OrganizationController::class, 'editCategoryInterests'])->name('editCategoryInterests');
        Route::post('/categories/interests', [OrganizationController::class, 'updateCategoryInterests'])->name('updateCategoryInterests');

    });

    // --- Admin Routes ---
    // استخدم المتحكمات المخصصة لكل مورد في منطقة المسؤول
    Route::middleware(['auth', 'isAdmin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        // إدارة الحسابات باستخدام Admin\AccountController
        Route::resource('accounts', AdminAccountController::class)->except(['show']);

        // إدارة المشاكل باستخدام Admin\ProblemController
        Route::resource('problems', AdminProblemController::class)->except(['create', 'store', 'show']);

        // إدارة الفئات باستخدام Admin\CategoryController
        Route::resource('categories', AdminCategoryController::class)->except(['show']);

        // إدارة الألقاب باستخدام Admin\BadgeController
        Route::resource('badges', AdminBadgeController::class)->except(['show']);

         // إدارة الحلول المعتمدة باستخدام Admin\SolutionController
        Route::resource('solutions', AdminSolutionController::class)->except(['create', 'store', 'edit']);

        // يمكن إضافة مسارات إضافية هنا لميزات المسؤول الأخرى (مثل إدارة التعليقات يدوياً، الإبلاغات)

    });

    ```
    *ملاحظة:* قمت بإعادة تسمية `SolutionController` العامة إلى `PublicSolutionController` في الاستيراد لتجنب التضارب مع `Admin\SolutionController`.

3.  **نقل وتعديل الدوال في المتحكمات الجديدة:**
    سنقوم الآن بنقل الدوال ذات الصلة من `AdminController` إلى المتحكمات الجديدة في مجلد `Admin`، مع تغيير أسماء الدوال لتتوافق مع اتفاقية `Route::resource` (أي استخدام `index`, `edit`, `update`, `destroy`).

    **أ. تعديل `app/Http/Controllers/AdminController.php`:**
    اجعل هذا المتحكم يحتوي فقط على الدالة `dashboard` والـ constructor.

    ```php
    <?php

    namespace App\Http\Controllers;

    use App\Models\Account; // قد تحتاجها للإحصائيات في الداشبورد
    use App\Models\Problem; // قد تحتاجها للإحصائيات
    use App\Models\Comment; // قد تحتاجها للإحصائيات
    use App\Models\Solution; // قد تحتاجها للإحصائيات
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth; // للتأكد من المستخدم في الـ middleware
    // لا حاجة لاستيراد النماذج الأخرى مثل ProblemCategory, Badge هنا

    class AdminController extends Controller
    {
        // تطبيق middleware 'isAdmin' على جميع دوال هذا المتحكم
        public function __construct()
        {
           $this->middleware('isAdmin');
        }

        /**
         * Display the admin dashboard.
         */
        public function dashboard()
        {
            // جلب إحصائيات سريعة للمسؤول
            $accountsCount = Account::count();
            $problemsCount = Problem::count();
            $commentsCount = Comment::count();
            $adoptedSolutionsCount = Solution::count();

            // ستنشئ الواجهة لاحقاً: resources/views/admin/dashboard.blade.php
            return view('admin.dashboard', compact('accountsCount', 'problemsCount', 'commentsCount', 'adoptedSolutionsCount'));
        }

        // تم نقل جميع دوال إدارة الموارد الأخرى إلى متحكمات مخصصة في مجلد Admin
    }
    ```

    **ب. إنشاء `app/Http/Controllers/Admin/AccountController.php`:**
    نقل الدوال المتعلقة بالحسابات.

    ```php
    <?php

    namespace App\Http\Controllers\Admin; // لاحظ namespace

    use App\Http\Controllers\Controller; // استيراد المتحكم الأساسي
    use App\Models\Account;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Validation\Rule;
    use Illuminate\Support\Facades\Hash; // إذا أردت إضافة تغيير كلمة مرور هنا

    class AccountController extends Controller // لاحظ اسم الفئة
    {
        public function __construct()
        {
            // تطبيق middleware 'isAdmin' على جميع دوال هذا المتحكم
            $this->middleware('isAdmin');
            // يمكنك إضافة policies هنا إذا أردت صلاحيات أدق للمسؤولين الفرعيين مثلاً
            // $this->authorizeResource(Account::class, 'account');
        }

        /**
         * Display a listing of the accounts. (admin/accounts GET)
         */
        public function index() // اسم الدالة القياسي
        {
            $accounts = Account::with('userProfile', 'organizationProfile')->paginate(20);
            // الواجهة: resources/views/admin/accounts/index.blade.php
            return view('admin.accounts.index', compact('accounts'));
        }

        /**
         * Show the form for creating a new account. (admin/accounts/create GET)
         * لم نضف مسار create/store لـ accounts في admin resource في routes/web.php
         * إذا احتجت هذه الميزة، يجب تفعيلها في routes/web.php وإضافة هذه الدالة ودالة store هنا.
         */
        // public function create() { }
        // public function store(Request $request) { }


        /**
         * Show the form for editing the specified account. (admin/accounts/{account}/edit GET)
         */
        public function edit(Account $account) // Model binding
        {
            $account->load('userProfile', 'organizationProfile'); // تحميل البيانات المرتبطة للواجهة
            // الواجهة: resources/views/admin/accounts/edit.blade.php
            return view('admin.accounts.edit', compact('account'));
        }

        /**
         * Update the specified account in storage. (admin/accounts/{account} PUT)
         */
        public function update(Request $request, Account $account) // Model binding
        {
            $request->validate([
                'username' => ['required', 'string', 'max:255', Rule::unique('accounts')->ignore($account->id)],
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('accounts')->ignore($account->id)],
                'account_type' => ['required', 'string', Rule::in(['individual', 'organization', 'admin'])],
                'points' => 'required|integer|min:0',
                'is_active' => 'boolean',
                // التحقق من حقول ملف التعريف سيحتاج منطقاً إضافياً هنا أو فصله
                // 'profile_name' => Rule::requiredIf($request->account_type !== 'individual'), // مثال
            ]);

            // تحديث حقول جدول Accounts
            $account->update($request->only(['username', 'email', 'account_type', 'points', 'is_active']));

            // هنا يمكن إضافة منطق لتحديث ملف التعريف المرتبط (UserProfile أو OrganizationProfile)
            // بناءً على نوع الحساب وبيانات الطلب

            return redirect()->route('admin.accounts.index')->with('success', 'Account updated successfully.');
        }

        /**
         * Remove the specified account from storage. (admin/accounts/{account} DELETE)
         */
        public function destroy(Account $account) // Model binding
        {
            // منع المسؤول من حذف حسابه الخاص من هذه الواجهة
            if (Auth::id() === $account->id) {
                return back()->with('error', 'You cannot delete your own account.');
            }

            // تحذير: حذف حساب سيحذف كل شيء مرتبط به بسبب onDelete('cascade')
            $account->delete();

            return redirect()->route('admin.accounts.index')->with('success', 'Account deleted successfully.');
        }
    }
    ```

    **ج. إنشاء `app/Http/Controllers/Admin/ProblemController.php`:**
    نقل الدوال المتعلقة بالمشاكل.

    ```php
    <?php

    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
    use App\Models\Problem;
    use App\Models\ProblemCategory;
    use Illuminate\Http\Request;
    use Illuminate\Validation\Rule;

    class ProblemController extends Controller
    {
         public function __construct()
         {
            $this->middleware('isAdmin');
            // يمكنك إضافة policy هنا إذا أردت صلاحيات أدق
            // $this->authorizeResource(Problem::class, 'problem'); // يمكن استخدامها لتطبيق policy ProblemPolicy
         }

        /**
         * Display a listing of the problems. (admin/problems GET)
         */
        public function index() // اسم الدالة القياسي
        {
            $problems = Problem::with('submittedBy', 'category')->latest()->paginate(20);
            // الواجهة: resources/views/admin/problems/index.blade.php
            return view('admin.problems.index', compact('problems'));
        }

        /**
         * Show the form for editing the specified problem. (admin/problems/{problem}/edit GET)
         */
        public function edit(Problem $problem) // Model binding
        {
            $categories = ProblemCategory::all(); // لجلب الفئات في النموذج
            // الواجهة: resources/views/admin/problems/edit.blade.php
            return view('admin.problems.edit', compact('problem', 'categories'));
        }

        /**
         * Update the specified problem in storage. (admin/problems/{problem} PUT)
         */
        public function update(Request $request, Problem $problem) // Model binding
        {
             $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'category_id' => 'required|exists:problem_categories,id',
                'urgency' => ['required', Rule::in(['Low', 'Medium', 'High'])],
                'status' => ['required', Rule::in(['Draft', 'Published', 'UnderReview', 'Hidden', 'Suspended', 'Resolved', 'Archived'])], // المسؤول يمكنه تغيير كل الحالات
                'tags' => 'nullable|string',
            ]);

            $problem->update($request->only(['title', 'description', 'category_id', 'urgency', 'status', 'tags']));

            return redirect()->route('admin.problems.index')->with('success', 'Problem updated successfully.');
        }

        /**
         * Remove the specified problem from storage. (admin/problems/{problem} DELETE)
         */
        public function destroy(Problem $problem) // Model binding
        {
             // يمكن إضافة فحص policy هنا إذا كنت تستخدمها
            // $this->authorize('delete', $problem);

            $problem->delete(); // حذف المشكلة وكل ما يتعلق بها (تعليقات، حلول معتمدة)

            return redirect()->route('admin.problems.index')->with('success', 'Problem deleted successfully.');
        }

        // الدوال create, store, show ليست مطلوبة لهذا الـ resource حسب تعريف routes/web.php
    }
    ```

    **د. إنشاء `app/Http/Controllers/Admin/CategoryController.php`:**
    نقل الدوال المتعلقة بالفئات.

    ```php
    <?php

    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
    use App\Models\ProblemCategory;
    use Illuminate\Http\Request;
    use Illuminate\Validation\Rule;

    class CategoryController extends Controller
    {
         public function __construct()
         {
            $this->middleware('isAdmin');
            // $this->authorizeResource(ProblemCategory::class, 'category'); // يمكن استخدامها لتطبيق policy
         }

        /**
         * Display a listing of the categories. (admin/categories GET)
         */
        public function index() // اسم الدالة القياسي
        {
            $categories = ProblemCategory::with('parent')->get(); // جلب الفئات وعلاقتها بالفئة الأم
            // الواجهة: resources/views/admin/categories/index.blade.php
            return view('admin.categories.index', compact('categories'));
        }

        /**
         * Show the form for creating a new category. (admin/categories/create GET)
         */
        public function create() // اسم الدالة القياسي
        {
            $categories = ProblemCategory::all(); // لجلب الفئات الأم المحتملة
            // الواجهة: resources/views/admin/categories/create.blade.php
            return view('admin.categories.create', compact('categories'));
        }

        /**
         * Store a newly created category in storage. (admin/categories POST)
         */
        public function store(Request $request) // اسم الدالة القياسي
        {
            $request->validate([
                'name' => 'required|string|max:100|unique:problem_categories', // اسم فريد
                'description' => 'nullable|string',
                'parent_category_id' => 'nullable|exists:problem_categories,id', // التحقق من وجود الفئة الأم
            ]);

            ProblemCategory::create($request->only(['name', 'description', 'parent_category_id']));

            return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
        }


        /**
         * Show the form for editing the specified category. (admin/categories/{category}/edit GET)
         */
        public function edit(ProblemCategory $category) // Model binding
        {
             $categories = ProblemCategory::where('id', '!=', $category->id)->get(); // جلب الفئات الأخرى كآباء محتملين
            // الواجهة: resources/views/admin/categories/edit.blade.php
            return view('admin.categories.edit', compact('category', 'categories'));
        }

        /**
         * Update the specified category in storage. (admin/categories/{category} PUT)
         */
        public function update(Request $request, ProblemCategory $category) // Model binding
        {
            $request->validate([
                'name' => ['required', 'string', 'max:100', Rule::unique('problem_categories')->ignore($category->id)],
                'description' => 'nullable|string',
                // منع الفئة من أن تكون ابناً لنفسها أو لأحد أبنائها لمنع الحلقات (منطق معقد يحتاج Policy أو تحقق إضافي)
                'parent_category_id' => [
                    'nullable',
                    'exists:problem_categories,id',
                     // إضافة تحقق مخصص لمنع الفئة من أن تكون أبناً لنفسها أو أبنائها
                    Rule::notIn([$category->id]), // منع أن تكون هي الفئة الأم
                    // التحقق من الأبناء يتطلب منطقاً خاصاً، يمكن تركه بسيطاً مبدئياً
                ],
            ]);

            $category->update($request->only(['name', 'description', 'parent_category_id']));

            return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
        }

        /**
         * Remove the specified category from storage. (admin/categories/{category} DELETE)
         */
        public function destroy(ProblemCategory $category) // Model binding
        {
             // ملاحظة: حذف فئة قد يتطلب تحديث المشاكل التي تنتمي إليها (مثلاً تعيين category_id إلى null أو حذف المشاكل)
             // بناءً على onDelete في الهجرة (في حالتنا cascade تحذف المشاكل)
             // إذا كانت onDelete('set null') في الهجرة، يجب التأكد من أن العمود nullable وأنك لا تحتاج لخطوات إضافية هنا

            $category->delete(); // حذف الفئة

            return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
        }

        // دالة show ليست مطلوبة لهذا الـ resource
    }
    ```

    **هـ. إنشاء `app/Http/Controllers/Admin/BadgeController.php`:**
    نقل الدوال المتعلقة بالألقاب.

    ```php
    <?php

    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
    use App\Models\Badge;
    use Illuminate\Http\Request;
    use Illuminate\Validation\Rule;

    class BadgeController extends Controller
    {
         public function __construct()
         {
            $this->middleware('isAdmin');
            // $this->authorizeResource(Badge::class, 'badge'); // يمكن استخدامها لتطبيق policy
         }

        /**
         * Display a listing of the badges. (admin/badges GET)
         */
        public function index() // اسم الدالة القياسي
        {
            $badges = Badge::all(); // لا حاجة لتقسيم الصفحات لعدد قليل من الألقاب عادةً
            // الواجهة: resources/views/admin/badges/index.blade.php
            return view('admin.badges.index', compact('badges'));
        }

        /**
         * Show the form for creating a new badge. (admin/badges/create GET)
         */
        public function create() // اسم الدالة القياسي
        {
            // الواجهة: resources/views/admin/badges/create.blade.php
            return view('admin.badges.create');
        }

        /**
         * Store a newly created badge in storage. (admin/badges POST)
         */
        public function store(Request $request) // اسم الدالة القياسي
        {
            $request->validate([
                'name' => 'required|string|max:100|unique:badges', // اسم فريد
                'description' => 'nullable|string',
                'image_url' => 'nullable|string|max:255|url', // التحقق من أنه رابط صالح
                'required_points' => 'required|integer|min:0',
                'required_adopted_comments_count' => 'required|integer|min:0',
            ]);

            Badge::create($request->all()); // يمكن استخدام $request->only() أيضاً

            return redirect()->route('admin.badges.index')->with('success', 'Badge created successfully.');
        }

        /**
         * Show the form for editing the specified badge. (admin/badges/{badge}/edit GET)
         */
        public function edit(Badge $badge) // Model binding
        {
            // الواجهة: resources/views/admin/badges/edit.blade.php
            return view('admin.badges.edit', compact('badge'));
        }

        /**
         * Update the specified badge in storage. (admin/badges/{badge} PUT)
         */
        public function update(Request $request, Badge $badge) // Model binding
        {
            $request->validate([
                 'name' => ['required', 'string', 'max:100', Rule::unique('badges')->ignore($badge->id)],
                'description' => 'nullable|string',
                'image_url' => 'nullable|string|max:255|url',
                'required_points' => 'required|integer|min:0',
                'required_adopted_comments_count' => 'required|integer|min:0',
            ]);

            $badge->update($request->all());

            return redirect()->route('admin.badges.index')->with('success', 'Badge updated successfully.');
        }

        /**
         * Remove the specified badge from storage. (admin/badges/{badge} DELETE)
         */
        public function destroy(Badge $badge) // Model binding
        {
             // يمكن إضافة فحص قبل الحذف إذا كان هناك AccountBadge مرتبط (حذف AccountBadge المرتبط قد يكون تلقائيًا بسبب onDelete)
            $badge->delete();

            return redirect()->route('admin.badges.index')->with('success', 'Badge deleted successfully.');
        }

        // دالة show ليست مطلوبة لهذا الـ resource
    }
    ```

    **و. إنشاء `app/Http/Controllers/Admin/SolutionController.php`:**
    نقل الدوال المتعلقة بالحلول المعتمدة (Adopted Solutions).

    ```php
    <?php

    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
    use App\Models\Solution;
    use Illuminate\Http\Request;
    use Illuminate\Validation\Rule;

    class SolutionController extends Controller
    {
         public function __construct()
         {
            $this->middleware('isAdmin');
             // $this->authorizeResource(Solution::class, 'solution'); // يمكن استخدامها لتطبيق policy
         }

        /**
         * Display a listing of the adopted solutions. (admin/solutions GET)
         */
        public function index() // اسم الدالة القياسي
        {
            $adoptedSolutions = Solution::with('adoptedComment.problem', 'adoptingOrganization.account', 'adoptedComment.author')
                                         ->latest('updated_at')
                                         ->paginate(20);
            // الواجهة: resources/views/admin/solutions/index.blade.php
            return view('admin.solutions.index', compact('adoptedSolutions'));
        }


        /**
         * Display the specified adopted solution. (admin/solutions/{solution} GET)
         */
        public function show(Solution $solution) // اسم الدالة القياسي, Model binding
        {
             $solution->load('adoptedComment.problem', 'adoptingOrganization.account', 'adoptedComment.author.userProfile', 'adoptedComment.author.organizationProfile');
            // الواجهة: resources/views/admin/solutions/show.blade.php
            return view('admin.solutions.show', compact('solution'));
        }

        /**
         * Update the specified adopted solution in storage. (admin/solutions/{solution} PUT)
         * ملاحظة: مسار edit غير موجود لهذا الـ resource، التعديل يتم مباشرة من صفحة show.
         */
        public function update(Request $request, Solution $solution) // Model binding
        {
             $request->validate([
                'status' => ['required', Rule::in(['UnderConsideration', 'Adopted', 'ImplementationInProgress', 'ImplementationCompleted', 'RejectedByOrganization'])],
                 'organization_notes' => 'nullable|string',
            ]);

            $solution->update($request->only(['status', 'organization_notes']));

            // يمكن هنا إضافة منطق إضافي عند تغيير الحالة (مثلاً إرسال إشعار للمستخدم، أو تحديث حالة المشكلة المرتبطة)

            return redirect()->route('admin.solutions.index')->with('success', 'Adopted solution updated successfully.');
        }

        /**
         * Remove the specified adopted solution from storage. (admin/solutions/{solution} DELETE)
         */
        public function destroy(Solution $solution) // Model binding
        {
             // حذف الحل المعتمد لا يؤثر على التعليق الأصلي
            $solution->delete();

            return redirect()->route('admin.solutions.index')->with('success', 'Adopted solution deleted successfully.');
        }

        // الدوال create, store, edit ليست مطلوبة لهذا الـ resource
    }
    ```

4.  **تنظيف ذاكرة التخزين المؤقت (مهم):**
    بعد هذه التغييرات الجوهرية في المسارات والمتحكمات، قم بتنظيف ذاكرة التخزين المؤقت مجدداً.
    ```bash
    php artisan config:clear
    php artisan cache:clear
    php artisan route:clear
    php artisan view:clear
    composer dump-autoload
    ```

الآن، كل `Route::resource` ضمن مجموعة `admin` يشير إلى متحكم مخصص له (`Admin\AccountController`, `Admin\ProblemController`, إلخ). كل من هذه المتحكمات يحتوي على الدوال القياسية (مثل `index`, `edit`, `update`, `destroy`) التي يتوقعها `Route::resource` لإدارة المورد الخاص به.

مشاكل مثل `Method App\Http\Controllers\AdminController::index does not exist.` يجب أن تختفي الآن لأن Laravel سيبحث عن الدالة `index` في المتحكم الصحيح (`Admin\AccountController`, `Admin\ProblemController`, إلخ) اعتماداً على المسار.


---
تمام، فهمت طلبك بشكل واضح. تريد تعديل صفحة تسجيل الدخول (`login.blade.php`) لتشمل أزرارًا خاصة لتسجيل الدخول السريع بحسابات الاختبار (مدير، مستخدم، منظمة) التي سيتم إنشاؤها ببيانات معروفة في الـ Seeder. هذا مفيد جدًا لأغراض التطوير والاختبار.

سنقوم بتعديل ملف `AccountsSeeder.php` أولاً لإضافة حسابات اختبار محددة يمكننا استخدامها بسهولة في صفحة تسجيل الدخول، ثم سنعدل ملف `resources/views/auth/login.blade.php` لإضافة هذه الأزرار.

**أولاً: تعديل ملف `database/seeders/AccountsSeeder.php`**

سنضيف تعريفًا صريحًا لحساب مستخدم فردي وحساب منظمة محددين ببيانات معروفة (مثل البريد الإلكتروني وكلمة المرور). سنحتفظ أيضًا بإنشاء الحسابات العشوائية الأخرى لملء القاعدة ببيانات أكبر.

```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Account;
use App\Models\UserProfile; // نحتاج لإنشاء ملف شخصي للحسابات المحددة
use App\Models\OrganizationProfile; // نحتاج لإنشاء ملف شخصي للحسابات المحددة
use App\Models\Address; // نحتاج لربط ملفات التعريف بعناوين
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class AccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('accounts')->truncate(); // يمكن استخدام truncate إذا أردت إعادة التلقيم من الصفر تماماً في كل مرة

        $faker = Faker::create();
        $addresses = Address::all(); // جلب العناوين المتاحة لربطها بملفات التعريف

        if ($addresses->isEmpty()) {
             $this->command->warn('Addresses table is empty. Cannot create profiles for specific accounts. Run AddressesSeeder first.');
             // يمكنك هنا اختيار التوقف أو المتابعة بدون ملفات تعريف كاملة
             // For now, let's continue but note that profiles for specific accounts might be incomplete
        }

        // --- حسابات اختبار محددة لسهولة تسجيل الدخول ---

        // 1. حساب المدير
        $adminAccount = Account::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'username' => 'admin',
                'password' => Hash::make('password'), // كلمة المرور الافتراضية 'password'
                'account_type' => 'admin',
                'is_active' => true,
                'points' => 0, // نقطة بداية للمدير
            ]
        );
         $this->command->info("Created/found Admin account: " . $adminAccount->email);


        // 2. حساب مستخدم فردي محدد
        $individualAccount = Account::firstOrCreate(
            ['email' => 'user@example.com'],
            [
                'username' => 'testuser',
                'password' => Hash::make('password'), // كلمة المرور الافتراضية 'password'
                'account_type' => 'individual',
                'is_active' => true,
                'points' => 50, // نقطة بداية للمستخدم الاختبار
            ]
        );
         // إنشاء ملف التعريف المرتبط إذا لم يكن موجوداً
         if ($individualAccount->wasRecentlyCreated || !$individualAccount->userProfile) {
             UserProfile::firstOrCreate(
                 ['account_id' => $individualAccount->id],
                 [
                     'first_name' => 'Test',
                     'last_name' => 'User',
                     'phone' => $faker->phoneNumber,
                     'address_id' => $addresses->random()->id ?? null, // ربط بعنوان عشوائي أو null
                     'bio' => 'This is a test individual user account.',
                 ]
             );
         }
         $this->command->info("Created/found Individual account: " . $individualAccount->email);


        // 3. حساب منظمة محدد
         $organizationAccount = Account::firstOrCreate(
            ['email' => 'org@example.com'],
            [
                'username' => 'testorg',
                'password' => Hash::make('password'), // كلمة المرور الافتراضية 'password'
                'account_type' => 'organization',
                'is_active' => true,
                'points' => 100, // نقطة بداية للمنظمة الاختبار
            ]
        );
         // إنشاء ملف التعريف المرتبط إذا لم يكن موجوداً
         if ($organizationAccount->wasRecentlyCreated || !$organizationAccount->organizationProfile) {
             OrganizationProfile::firstOrCreate(
                 ['account_id' => $organizationAccount->id],
                 [
                     'name' => 'Test Organization',
                      'address_id' => $addresses->random()->id ?? null, // ربط بعنوان عشوائي أو null
                     'info' => 'This is a test organization account for testing purposes.',
                     'website_url' => $faker->url,
                     'contact_email' => $organizationAccount->email,
                 ]
             );
         }
        $this->command->info("Created/found Organization account: " . $organizationAccount->email);


        // --- حسابات عشوائية إضافية (للمستخدمين والمنظمات) ---

        // إنشاء بعض الحسابات الفردية العشوائية الإضافية
        $numberOfIndividuals = 30; // يمكن زيادة هذا العدد حسب الحاجة
        for ($i = 0; $i < $numberOfIndividuals; $i++) {
            $acc = Account::firstOrCreate(
                ['email' => $faker->unique()->safeEmail],
                [
                    'username' => $faker->unique()->userName,
                    'password' => Hash::make($faker->password), // كلمة مرور عشوائية لهم
                    'account_type' => 'individual',
                    'is_active' => true,
                    'points' => $faker->numberBetween(0, 500),
                ]
            );
             // إنشاء ملف تعريف لهم أيضاً
             if ($acc->wasRecentlyCreated || !$acc->userProfile) {
                 UserProfile::firstOrCreate(
                     ['account_id' => $acc->id],
                     [
                         'first_name' => $faker->firstName,
                         'last_name' => $faker->lastName,
                         'phone' => $faker->phoneNumber,
                         'address_id' => $addresses->random()->id ?? null,
                         'bio' => $faker->sentence,
                     ]
                 );
             }
        }
         $this->command->info("Created {$numberOfIndividuals} additional random individual accounts.");


        // إنشاء بعض حسابات المنظمات العشوائية الإضافية
        $numberOfOrganizations = 3; // يمكن زيادة هذا العدد حسب الحاجة
        for ($i = 0; $i < $numberOfOrganizations; $i++) {
             $acc = Account::firstOrCreate(
                ['email' => $faker->unique()->companyEmail],
                [
                    'username' => $faker->unique()->companySuffix . '_' . $faker->randomNumber(3),
                    'password' => Hash::make($faker->password), // كلمة مرور عشوائية لهم
                    'account_type' => 'organization',
                    'is_active' => true,
                    'points' => $faker->numberBetween(0, 1000),
                ]
            );
             // إنشاء ملف تعريف لهم أيضاً
             if ($acc->wasRecentlyCreated || !$acc->organizationProfile) {
                 OrganizationProfile::firstOrCreate(
                     ['account_id' => $acc->id],
                     [
                         'name' => $faker->unique()->company,
                         'address_id' => $addresses->random()->id ?? null,
                         'info' => $faker->catchPhrase . ' focused on ' . $faker->bs,
                         'website_url' => $faker->url,
                         'contact_email' => $acc->email,
                     ]
                 );
             }
        }
        $this->command->info("Created {$numberOfOrganizations} additional random organization accounts.");
    }
}
```
*ملاحظة:* أضفت في الـ Seeder ربط ملفات التعريف بالعناوين، ولذا يجب تشغيل `AddressesSeeder` قبل هذا الـ Seeder. `migrate:fresh --seed` يقوم بذلك تلقائيًا إذا كان `AddressesSeeder` مُستدعى في `DatabaseSeeder`.

**ثانياً: تعديل ملف الواجهة `resources/views/auth/login.blade.php`**

سنضيف قسمًا جديدًا أسفل نموذج تسجيل الدخول القياسي يحتوي على الأزرار التي تقوم تلقائيًا بإرسال بيانات حسابات الاختبار.

```html
@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Login</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf {{-- CSRF Token --}}

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                {{-- يمكنك إضافة رابط "Forgot Your Password?" هنا إذا كان لديك هذه الميزة --}}
                                {{-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        Forgot Your Password?
                                    </a>
                                @endif --}}
                            </div>
                        </div>
                    </form>

                    {{-- --- Development Login Buttons (for testing) --- --}}
                    {{-- هذا القسم يظهر فقط لسهولة الاختبار في بيئة التطوير --}}
                    @if (app()->environment('local') || app()->environment('staging')) {{-- يمكنك التحكم في بيئات الظهور --}}
                        <hr class="my-4">
                        <div class="text-center">
                            <h5>Quick Login (Development)</h5>
                            <p class="text-muted">Password for all test accounts: <strong>password</strong></p>

                            {{-- Admin Login Form --}}
                            <form method="POST" action="{{ route('login') }}" class="d-inline-block mr-2">
                                @csrf
                                <input type="hidden" name="email" value="admin@example.com">
                                <input type="hidden" name="password" value="password">
                                <button type="submit" class="btn btn-danger btn-sm">Login as Admin</button>
                            </form>

                             {{-- Individual User Login Form --}}
                            <form method="POST" action="{{ route('login') }}" class="d-inline-block mr-2">
                                @csrf
                                <input type="hidden" name="email" value="user@example.com">
                                <input type="hidden" name="password" value="password">
                                <button type="submit" class="btn btn-secondary btn-sm">Login as Test User</button>
                            </form>

                             {{-- Organization Login Form --}}
                            <form method="POST" action="{{ route('login') }}" class="d-inline-block mr-2">
                                @csrf
                                <input type="hidden" name="email" value="org@example.com">
                                <input type="hidden" name="password" value="password">
                                <button type="submit" class="btn btn-info btn-sm">Login as Test Organization</button>
                            </form>
                        </div>
                     @endif
                    {{-- --- End Development Login Buttons --- --}}

                </div>
            </div>
        </div>
    </div>
@endsection
```

**شرح التعديلات:**

1.  **في `AccountsSeeder.php`:**
    *   تم إضافة تعريفين صريحين لحساب مستخدم فردي ببريد إلكتروني `user@example.com` وحساب منظمة ببريد إلكتروني `org@example.com`. كلاهما يستخدم كلمة المرور 'password'.
    *   تم استخدام `firstOrCreate` لضمان عدم تكرار هذه الحسابات إذا تم تشغيل الـ Seeder أكثر من مرة بدون مسح القاعدة.
    *   تم إضافة منطق لإنشاء ملف تعريف (`UserProfile` أو `OrganizationProfile`) لهذه الحسابات المحددة وربطها بعنوان عشوائي موجود إذا أمكن.
    *   تم الحفاظ على loops لإنشاء حسابات عشوائية إضافية لملء القاعدة ببيانات أكثر واقعية.

2.  **في `login.blade.php`:**
    *   تم إضافة قسم جديد يحتوي على عنوان وأزرار تسجيل الدخول السريع.
    *   تم وضع هذا القسم داخل شرط `@if (app()->environment('local') || app()->environment('staging'))` للتأكد من ظهوره فقط في بيئات التطوير أو الـ staging وليس في بيئة الإنتاج النهائية.
    *   لكل حساب اختبار (Admin, Test User, Test Organization)، تم إنشاء نموذج `<form>` صغير خاص به.
    *   يحتوي كل نموذج على حقول `hidden` (مخفية) لإرسال البريد الإلكتروني وكلمة المرور المحددة لهذا الحساب تلقائيًا إلى مسار تسجيل الدخول (`route('login')`).
    *   تم إضافة `@csrf` لكل نموذج منفصل لضمان حماية CSRF.
    *   تم استخدام فئات Bootstrap (`d-inline-block`, `mr-2`, `btn-sm`, `btn-danger`, `btn-secondary`, `btn-info`) لتنسيق الأزرار بشكل بسيط.

**لجعل هذا يعمل:**

1.  احفظ التعديلات في ملفي `AccountsSeeder.php` و `login.blade.php`.
2.  تأكد من أن ملف `config/auth.php` معدّل بشكل صحيح ليشير إلى نموذج `Account` كما شرحنا سابقاً.
3.  قم بتنظيف الكاش وإعادة تشغيل الهجرات والتلقيم باستخدام الأمر التالي:

    ```bash
    php artisan migrate:fresh --seed
    ```
    سيؤدي هذا إلى مسح قاعدة البيانات، تشغيل جميع ملفات الهجرة (مما ينشئ الجداول بما في ذلك جدول `accounts` وملفات التعريف والعناوين)، ثم تشغيل جميع الـ Seeders (بما في ذلك `AddressesSeeder` و `AccountsSeeder` بالترتيب الصحيح).

4.  بعد انتهاء الأمر، قم بتشغيل خادم Laravel:

    ```bash
    php artisan serve
    ```

الآن، عند زيارة صفحة `http://127.0.0.1:8000/login` في متصفحك (في بيئة `local`)، يجب أن ترى نموذج تسجيل الدخول القياسي بالإضافة إلى الأزرار الثلاثة الجديدة التي تسمح لك بتسجيل الدخول فورًا بحسابات الاختبار بكلمة المرور 'password' لكل منهم.

---


تمام، دعنا نتابع ونجهز ملفات الواجهة الأمامية (Views) الخاصة بقسم المنظمات كما هو مطلوب. المتحكم `OrganizationController` يشير إلى هذه الواجهات، لذا سنقوم الآن بإنشائها.

لا يوجد أمر `php artisan make:view` تلقائيًا في Laravel لإنشاء ملفات الـ Blade. تقوم بإنشائها يدويًا في المجلدات المناسبة داخل `resources/views`.

**الخطوات:**

1.  **تأكد من وجود المجلدات:**
    تأكد من وجود بنية المجلدات التالية داخل `resources/views/`:
    ```
    resources/views/
    ├── layouts/
    │   └── app.blade.php   (ملف التخطيط الأساسي الذي أنشأناه سابقاً)
    ├── organization/
    │   ├── adopted_solutions/
    │   └── category_interests/
    ├── ... باقي المجلدات (auth, problems, profiles, admin)
    ```
    إذا لم تكن موجودة، قم بإنشائها يدوياً.

2.  **إنشاء وتصميم ملفات الواجهة:**

    *   **ملف `resources/views/organization/adopted_solutions/index.blade.php`**
        *   المتحكم: `OrganizationController@listAdoptedSolutions`
        *   البيانات المتاحة: `$adoptedSolutions` (Pagination Collection of Solution models), `$organizationProfile` (OrganizationProfile model)

        ```html
        @extends('layouts.app')

        @section('title', ($organizationProfile->name ?? 'Your Organization') . ' - Adopted Solutions')

        @section('content')
            <h1>Adopted Solutions by {{ $organizationProfile->name ?? 'Your Organization' }}</h1>

            <p>Here are the comments that your organization has officially adopted as potential solutions.</p>

            @if ($adoptedSolutions->isEmpty())
                <div class="alert alert-info">
                    Your organization has not adopted any comments as solutions yet. Explore the <a href="{{ route('problems.index') }}">problems</a> and find comments that align with your mission!
                </div>
            @else
                 <div class="list-group">
                    @foreach ($adoptedSolutions as $solution)
                         <a href="{{ route('organization.showAdoptedSolution', $solution) }}" class="list-group-item list-group-item-action">
                             <h5 class="mb-1">Solution for: {{ $solution->adoptedComment->problem->title ?? 'N/A Problem' }}</h5>
                             <p class="mb-1">{{ \Illuminate\Support\Str::limit($solution->adoptedComment->content, 150) }}</p>
                             <small>
                                 Original Comment by: {{ $solution->adoptedComment->author->username ?? 'N/A' }} |
                                 Current Status: <strong>{{ $solution->status }}</strong> |
                                 Adopted On: {{ $solution->created_at->format('Y-m-d') }}
                             </small>
                         </a>
                    @endforeach
                 </div>

                 <div class="mt-3">
                     {{ $adoptedSolutions->links() }} {{-- لعرض روابط ترقيم الصفحات --}}
                 </div>
            @endif

        @endsection
        ```

    *   **ملف `resources/views/organization/adopted_solutions/show.blade.php`**
        *   المتحكم: `OrganizationController@showAdoptedSolution`
        *   البيانات المتاحة: `$solution` (Solution model with loaded adoptedComment.problem, adoptedComment.author, adoptingOrganization)

        ```html
        @extends('layouts.app')

        @section('title', 'Adopted Solution Details - ' . ($solution->adoptingOrganization->name ?? ''))

        @section('content')
            <h1>Adopted Solution Details</h1>

            <div class="card mb-3">
                <div class="card-header">Original Comment & Problem</div>
                <div class="card-body">
                    @if ($solution->adoptedComment && $solution->adoptedComment->problem)
                         <p><strong>Problem:</strong> <a href="{{ route('problems.show', $solution->adoptedComment->problem) }}">{{ $solution->adoptedComment->problem->title }}</a></p>
                         <p><strong>Category:</strong> {{ $solution->adoptedComment->problem->category->name ?? 'N/A' }}</p>
                         <p><strong>Problem Status:</strong> {{ $solution->adoptedComment->problem->status ?? 'N/A' }}</p>
                    @else
                        <p class="text-muted">Problem or original comment not found.</p>
                    @endif

                    @if ($solution->adoptedComment && $solution->adoptedComment->author)
                         <p><strong>Original Comment Author:</strong>
                             @if ($solution->adoptedComment->author->isIndividual() && $solution->adoptedComment->author->userProfile)
                                 {{ $solution->adoptedComment->author->userProfile->first_name ?? $solution->adoptedComment->author->username }} (Individual)
                             @elseif ($solution->adoptedComment->author->isOrganization() && $solution->adoptedComment->author->organizationProfile)
                                  {{ $solution->adoptedComment->author->organizationProfile->name ?? $solution->adoptedComment->author->username }} (Organization)
                             @else
                                 {{ $solution->adoptedComment->author->username ?? 'N/A' }}
                             @endif
                         </p>
                         <p><strong>Comment Content:</strong></p>
                         <div class="border p-3 mb-3">{{ $solution->adoptedComment->content }}</div>
                          <p><a href="{{ route('problems.show', $solution->adoptedComment->problem) }}#comment-{{ $solution->comment_id }}" class="btn btn-sm btn-outline-secondary">View original comment in problem</a></p>
                    @else
                        <p class="text-muted">Original comment or author not found.</p>
                    @endif

                </div>
            </div>

             <div class="card mb-3">
                 <div class="card-header">Adoption Details by {{ $solution->adoptingOrganization->name ?? 'Your Organization' }}</div>
                 <div class="card-body">
                     <p><strong>Adopting Organization:</strong> {{ $solution->adoptingOrganization->name ?? 'N/A' }}</p>
                     <p><strong>Adoption Status:</strong> <strong>{{ $solution->status }}</strong></p>
                     <p><strong>Adopted On:</strong> {{ $solution->created_at->format('Y-m-d H:i') }}</p>
                     <p><strong>Last Updated:</strong> {{ $solution->updated_at->format('Y-m-d H:i') }}</p>

                     <p><strong>Organization Notes:</strong></p>
                     <div class="border p-3">{{ $solution->organization_notes ?? 'No notes added yet.' }}</div>

                     {{-- Form to update status and notes --}}
                     <h6 class="mt-4">Update Status and Notes</h6>
                     <form action="{{ route('organization.updateAdoptedSolutionStatus', $solution) }}" method="POST">
                         @csrf
                         @method('PUT')
                         <div class="form-group">
                             <label for="status">Status</label>
                             <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                                 @foreach (\App\Enums\AdoptedSolutionStatusEnum::cases() as $case) {{-- مثال لاستخدام Enums إذا قمت بتعريفها كـ PHP Enum --}}
                                    <option value="{{ $case->value }}" {{ old('status', $solution->status) === $case->value ? 'selected' : '' }}>
                                        {{ $case->name }} {{-- أو ترجمة الاسم --}}
                                    </option>
                                @endforeach
                                {{-- البديل اليدوي بدون PHP Enum:
                                 <option value="UnderConsideration" {{ old('status', $solution->status) === 'UnderConsideration' ? 'selected' : '' }}>Under Consideration</option>
                                 <option value="Adopted" {{ old('status', $solution->status) === 'Adopted' ? 'selected' : '' }}>Adopted</option>
                                 <option value="ImplementationInProgress" {{ old('status', $solution->status) === 'ImplementationInProgress' ? 'selected' : '' }}>Implementation In Progress</option>
                                 <option value="ImplementationCompleted" {{ old('status', $solution->status) === 'ImplementationCompleted' ? 'selected' : '' }}>Implementation Completed</option>
                                 <option value="RejectedByOrganization" {{ old('status', $solution->status) === 'RejectedByOrganization' ? 'selected' : '' }}>Rejected by Organization</option>
                                 --}}
                             </select>
                              @error('status') <span class="invalid-feedback">{{ $message }}</span> @enderror
                         </div>
                          <div class="form-group">
                             <label for="organization_notes">Notes</label>
                             <textarea class="form-control @error('organization_notes') is-invalid @enderror" id="organization_notes" name="organization_notes" rows="3">{{ old('organization_notes', $solution->organization_notes) }}</textarea>
                              @error('organization_notes') <span class="invalid-feedback">{{ $message }}</span> @enderror
                         </div>
                          <button type="submit" class="btn btn-primary">Update Solution Details</button>
                           <a href="{{ route('organization.listAdoptedSolutions') }}" class="btn btn-secondary">Back to List</a>
                     </form>

                 </div>
             </div>

            {{-- يمكنك إضافة قسم لعرض المرفقات المرتبطة بالحل (إذا أعدت إضافتها للمشروع) --}}

        @endsection
        ```
        *ملاحظة:* إذا كنت تريد استخدام `\App\Enums\AdoptedSolutionStatusEnum::cases()`, يجب عليك تعريف هذه الـ Enum في PHP. يمكنك إنشاء ملف `app/Enums/AdoptedSolutionStatusEnum.php` كالتالي:

        ```php
        <?php declare(strict_types=1); // لتفعيل Strict Types

        namespace App\Enums;

        use BenSampo\Enum\Enum; // تحتاج لتثبيت حزمة BenSampo/laravel-enum

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
        ```
        وتحتاج لتثبيت الحزمة: `composer require bensampo/laravel-enum`. إذا لم تكن ترغب في استخدام هذه الحزمة، استخدم القائمة المنسدلة اليدوية كما هو موضح في التعليقات.

    *   **ملف `resources/views/organization/category_interests/edit.blade.php`**
        *   المتحكم: `OrganizationController@editCategoryInterests`
        *   البيانات المتاحة: `$organizationProfile` (OrganizationProfile model), `$allCategories` (Collection of main ProblemCategory models with children), `$organizationInterests` (Array of IDs of categories the organization is currently interested in)

        ```html
        @extends('layouts.app')

        @section('title', ($organizationProfile->name ?? 'Your Organization') . ' - Manage Interests')

        @section('content')
             <h1>Manage Category Interests for {{ $organizationProfile->name ?? 'Your Organization' }}</h1>

             <p>Select the problem categories your organization is interested in. This might help us show you relevant problems and comments.</p>

             <form action="{{ route('organization.updateCategoryInterests') }}" method="POST">
                 @csrf

                 <div class="form-group">
                     <label>Problem Categories:</label>
                     @error('categories') <div class="text-danger">Please select valid categories.</div> @enderror

                     @foreach ($allCategories as $category)
                         <div class="form-check">
                             <input class="form-check-input @error('categories') is-invalid @enderror" type="checkbox" name="categories[]" value="{{ $category->id }}" id="category_{{ $category->id }}" {{ in_array($category->id, old('categories', $organizationInterests)) ? 'checked' : '' }}>
                             <label class="form-check-label" for="category_{{ $category->id }}">
                                 <strong>{{ $category->name }}</strong>
                                 @if ($category->description)
                                      <small class="text-muted">({{ \Illuminate\Support\Str::limit($category->description, 50) }})</small>
                                 @endif
                             </label>
                         </div>
                         @if ($category->children->isNotEmpty())
                             <div class="ml-4"> {{-- Indent subcategories --}}
                                 @foreach ($category->children as $childCategory)
                                     <div class="form-check">
                                          <input class="form-check-input @error('categories') is-invalid @enderror" type="checkbox" name="categories[]" value="{{ $childCategory->id }}" id="category_{{ $childCategory->id }}" {{ in_array($childCategory->id, old('categories', $organizationInterests)) ? 'checked' : '' }}>
                                          <label class="form-check-label" for="category_{{ $childCategory->id }}">
                                             {{ $childCategory->name }}
                                              @if ($childCategory->description)
                                                <small class="text-muted">({{ \Illuminate\Support\Str::limit($childCategory->description, 50) }})</small>
                                             @endif
                                         </label>
                                     </div>
                                 @endforeach
                             </div>
                         @endif
                     @endforeach
                     {{-- @error('categories.*') <span class="text-danger">{{ $message }}</span> @enderror --}} {{-- إذا أردت عرض خطأ لكل عنصر في المصفوفة --}}
                 </div>


                 <button type="submit" class="btn btn-primary">Update Interests</button>
                 {{-- Redirect to a relevant page after updating, e.g., list of adopted solutions --}}
                 <a href="{{ route('organization.listAdoptedSolutions') }}" class="btn btn-secondary">Cancel</a>

             </form>
        @endsection
        ```

الآن لديك ملفات الواجهة الأمامية الأساسية لقسم المنظمات. بعد إنشاء هذه الملفات وحفظها في المواقع الصحيحة، يجب أن تتمكن من زيارة المسارات المرتبطة بها في متصفحك (بعد تسجيل الدخول كمنظمة) ورؤية المحتوى يعرض البيانات من قاعدة البيانات. تذكر أن هذا هو مجرد هيكل أساسي، وستحتاج إلى المزيد من التنسيق والتصميم لجعلها تبدو جذابة وسهلة الاستخدام.

---

---
نعم، يبدو أن هناك مشكلة في طريقة استخدام دالة `cases()` في واجهة Blade.  خطأ `Cannot construct an instance of AdoptedSolutionStatusEnum using the key (string) cases` يشير إلى أن Laravel يحاول تحويل السلسلة النصية `'cases'` إلى قيمة Enum داخل الكاست، وهو ما ليس صحيحاً.

هذا يحدث غالباً عندما تحاول الوصول إلى دالة static في Blade باستخدام طريقة خاطئة أو عندما تتداخل عملية التحويل (Casting) مع عملية استدعاء الدالة.

الحزمة `BenSampo\laravel-enum` توفر طريقة أفضل لجلب جميع القيم (الـ Enum Instances) للاستخدام في الواجهات، وهي الدالة `toSelectArray()` أو `toCollection()`.

**الحل:**

بدلاً من استخدام `\App\Enums\AdoptedSolutionStatusEnum::cases()` مباشرة داخل حلقة `foreach` في Blade، استخدم الدالة `toSelectArray()` أو `toCollection()`. `toSelectArray()` تعيد مصفوفة مناسبة للاستخدام في قائمة منسدلة (select).

قم بتعديل السطر الذي يسبب المشكلة في ملف `resources/views/organization/adopted_solutions/show.blade.php`:

```html
{{-- resources/views/organization/adopted_solutions/show.blade.php --}}

{{-- ... الجزء العلوي من الملف ... --}}

            {{-- Form to update status and notes --}}
            <h6 class="mt-4">Update Status and Notes</h6>
            <form action="{{ route('organization.updateAdoptedSolutionStatus', $solution) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                        {{-- استخدم toSelectArray() لجلب القيم المناسبة للقائمة المنسدلة --}}
                        @foreach (\App\Enums\AdoptedSolutionStatusEnum::toSelectArray() as $value => $description)
                            <option value="{{ $value }}" {{ old('status', $solution->status->value ?? $solution->status) === $value ? 'selected' : '' }}>
                                {{ $description }}
                            </option>
                        @endforeach
                        {{-- (ملاحظة: $solution->status هو الآن كائن Enum، للوصول إلى القيمة استخدم $solution->status->value) --}}
                         {{-- تأكد من التعامل مع الحالة التي قد يكون فيها $solution->status لا يزال سلسلة نصية إذا لم يعمل الكاست بشكل كامل --}}

                         {{-- الكود السابق الذي كان يسبب المشكلة:
                         @foreach (\App\Enums\AdoptedSolutionStatusEnum::cases() as $case)
                            <option value="{{ $case->value }}" {{ old('status', $solution->status) === $case->value ? 'selected' : '' }}>
                                {{ $case->name }}
                            </option>
                         @endforeach
                         --}}

                    </select>
                     @error('status') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>
                 <div class="form-group">
                    <label for="organization_notes">Notes</label>
                    <textarea class="form-control @error('organization_notes') is-invalid @enderror" id="organization_notes" name="organization_notes" rows="3">{{ old('organization_notes', $solution->organization_notes) }}</textarea>
                     @error('organization_notes') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>
                 <button type="submit" class="btn btn-primary">Update Solution Details</button>
                  <a href="{{ route('organization.listAdoptedSolutions') }}" class="btn btn-secondary">Back to List</a>
            </form>

        </div>
    </div>

{{-- ... الجزء السفلي من الملف ... --}}

@endsection
```

**شرح التعديل:**

*   `\App\Enums\AdoptedSolutionStatusEnum::toSelectArray()`: هذه الدالة الثابتة في الـ Enum (من حزمة BenSampo) تعيد مصفوفة يكون مفتاحها هو قيمة الـ Enum (مثلاً 'UnderConsideration') وقيمتها هي اسم الـ Enum (مثلاً 'UnderConsideration'). هذا هو التنسيق المثالي لملء قائمة `select`.
*   استخدمنا `$value` كـ `value` للـ `<option>` و `$description` (الذي هو اسم الـ Enum في هذه الحالة) كنص ظاهر للـ `<option>`.
*   في التحقق من `selected`، استخدمنا `old('status', $solution->status->value ?? $solution->status)` للتعامل مع حالتين: إذا كان الـ cast يعمل بشكل صحيح، فإن `$solution->status` سيكون كائن Enum ويمكن الوصول إلى قيمته عبر `$solution->status->value`. إذا لم يعمل الـ cast لسبب ما أو كانت القيمة لا تزال في `old()`, فإنها ستكون مجرد سلسلة نصية، لذا نستخدم `?? $solution->status` للتعامل مع كلا الاحتمالين.

**الخطوات اللازمة بعد هذا التعديل:**

1.  احفظ ملف `resources/views/organization/adopted_solutions/show.blade.php`.
2.  كرر نفس عملية التعديل لأي واجهة أخرى تستخدم `ProblemUrgencyEnum::cases()` أو `ProblemStatusEnum::cases()` في قوائم منسدلة (مثلاً في واجهات إنشاء/تعديل المشاكل أو واجهات المسؤول). استخدم الدوال المناسبة لكل Enum (مثلاً `ProblemUrgencyEnum::toSelectArray()`, `ProblemStatusEnum::toSelectArray()`).
3.  تأكد من أن الـ Enum نفسه لديه تعريفات القيم الثابتة بشكل صحيح (والتي هي صحيحة في الكود الذي أرسلته).
4.  تأكد من أن نماذج Eloquent (Problem, Solution, Account) لا تزال تستخدم `EnumCast::class . ':' . YourEnum::class` في مصفوفة `$casts` كما صححنا سابقاً.
5.  قم بتنظيف ذاكرة التخزين المؤقت مرة أخرى:
    ```bash
    php artisan optimize:clear
    composer dump-autoload
    ```

**إذا استمرت المشاكل مع الـ Enums:**

إذا استمرت هذه المشاكل بعد تطبيق جميع التصحيحات وتأكيد أن الـ Casts تستخدم `EnumCast` وأن الـ Enums تستخدم دوال مثل `toSelectArray()` في الواجهات، فقد يكون هناك مشكلة أعمق في تثبيت الحزمة أو في طريقة عمل الـ Casting في بيئة Laravel الخاصة بك. في هذه الحالة، إذا كان ذلك يؤخر تقدمك بشكل كبير، **يمكنك العودة إلى استخدام القيم النصية (strings)** في النماذج والهجرات والواجهات وإزالة الـ Enum Casts بالكامل.

**العودة بدون Enums (إذا لزم الأمر):**

إذا قررت العودة، ستحتاج إلى:
1.  إزالة استخدام `EnumCast` من مصفوفة `$casts` في جميع النماذج (`Account`, `Problem`, `Solution`).
2.  إزالة استيراد الـ Enums (مثل `use App\Enums\AccountTypeEnum;`) من النماذج.
3.  تغيير الـ Casts في النماذج إلى `'string'` أو تركها بدون cast إذا كانت حقول `varchar` أو `enum` في القاعدة.
    ```php
    // Example in Account.php
    protected $casts = [
        // ... casts أخرى ...
        // 'account_type' => EnumCast::class . ':' . AccountTypeEnum::class, // أزل هذا
        'account_type' => 'string', // أو لا تضع cast إذا كانتvarchar
    ];
    ```
4.  في الواجهات (Views)، استخدم القائمة المنسدلة اليدوية التي وضعت كتعليق:
    ```html
     <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
         <option value="UnderConsideration" {{ old('status', $solution->status) === 'UnderConsideration' ? 'selected' : '' }}>Under Consideration</option>
         <option value="Adopted" {{ old('status', $solution->status) === 'Adopted' ? 'selected' : '' }}>Adopted</option>
         {{-- ... باقي الخيارات ... --}}
     </select>
    ```
5.  في المتحكمات (Controllers) وفي أي مكان آخر تستخدم فيه الـ Enums للتحقق، استخدم القيم النصية مباشرة:
    ```php
    // Example in AuthController
    if ($account->account_type !== 'organization') { // بدلاً من $account->account_type->is(AccountTypeEnum::Organization)
        abort(403, 'Access Denied. Organizations only.');
    }
    ```

الـ Enums مع BenSampo مفيدة لسلامة النوع وقابلية القراءة، لكن إذا تسببت في مشاكل تعيق تقدمك، فالبديل هو استخدام القيم النصية مباشرة والتحقق منها في الكود (وهي الطريقة التي كانت مستخدمة على نطاق واسع قبل ظهور حزم الـ Enums).

آمل أن يحل التعديل الأول باستخدام `toSelectArray()` المشكلة.

---

تمام، سؤال ممتاز! أنت على الطريق الصحيح في التفكير حول أين يجب أن يحدث منطق منح المكافآت (الألقاب).

المنطق الذي يحسب ما إذا كان المستخدم قد استوفى شروط لقب معين **لا ينبغي أن يكون داخل `BadgeController@index`** (الدالة التي تعرض قائمة بجميع الألقاب المتاحة). هذه الدالة وظيفتها فقط عرض قائمة الألقاب وتعريفاتها. هي لا تعرف شيئًا عن المستخدمين ولا نقاطهم ولا إنجازاتهم.

أيضًا، إعادة حساب نقاط المستخدم عند عرض صفحة الألقاب الخاصة به ليست هي المكان المناسب. النقاط يجب أن يتم تحديثها في الوقت الفعلي عند حدوث الإجراء الذي يكسبه نقاطاً (مثل اعتماد تعليق كحل).

**أين يجب أن يتم حساب ومنح الألقاب؟**

المنطق الذي يتحقق مما إذا كان المستخدم يستحق لقباً ويمنحه إياه يجب أن يتم تنفيذه في **الأوقات التي يحتمل أن يكون المستخدم قد استوفى فيها شروط اللقب**. هذه الأوقات هي:

1.  **عندما تزداد نقاط المستخدم:** أي إجراء يؤدي إلى زيادة نقاط المستخدم (مثل اعتماد تعليق له كحل، أو ربما الحصول على عدد معين من upvotes على تعليقاته إذا قررت منح نقاط على ذلك لاحقاً).
2.  **عندما يتم اعتماد أحد تعليقاته كحل:** هذه هي النقطة التي يزيد فيها عداد `required_adopted_comments_count`.

**أفضل مكان لتنفيذ هذا المنطق هو في الدوال التي تسبب هذه التغييرات.**

*   في حالتك الحالية، الدالة `OrganizationController@adoptComment` هي نقطة مهمة جداً. عند اعتماد تعليق، تزداد نقاط المستخدم (الشرط الأول للألقاب) ويزداد عدد تعليقاته المعتمدة (الشرط الثاني للألقاب). هذا هو المكان المثالي للتحقق من الألقاب ومنحها فوراً.
*   إذا أضفت لاحقاً ميزة منح نقاط على Upvotes في `CommentVoteController@vote`، فستكون هذه الدالة أيضاً مكاناً مناسباً لاستدعاء نفس منطق التحقق من الألقاب بعد تحديث النقاط.

**كيفية تنفيذ الدالة وأين توضع؟**

يمكنك إنشاء دالة مساعدة (helper function) أو دالة كعضو (method) في نموذج `Account` نفسه للتحقق من جميع الألقاب المتاحة ومقارنة شروطها بإنجازات المستخدم الحالي. ثم تستدعي هذه الدالة من الأماكن المناسبة (مثل `OrganizationController@adoptComment`).

**الخيار المقترح: دالة في نموذج `Account`**

إنشاء الدالة في نموذج `Account` منطقي لأنها تتعلق بالحساب نفسه الذي يحصل على الألقاب.

1.  **إضافة العلاقة اللازمة إلى نموذج `Account`:**
    للحساب عدد من التعليقات التي قام بتأليفها. نحتاج علاقة للوصول إلى هذه التعليقات، ثم يمكننا عد التعليقات التي تم اعتمادها كحلول.
    افتح ملف `app/Models/Account.php` وأضف العلاقة التالية:

    ```php
    // app/Models/Account.php

    // ... العلاقات الأخرى ...

    /**
     * Get the comments authored by the account.
     */
    public function authoredComments()
    {
        return $this->hasMany(Comment::class, 'author_account_id');
    }

    // ... الدوال المساعدة الأخرى ...
    ```

2.  **إضافة الدالة `checkAndAwardBadges` إلى نموذج `Account`:**
    هذه الدالة ستقوم بجلب جميع الألقاب، والتحقق لكل لقب ما إذا كان المستخدم يستوفيه ولا يملكه بعد، ثم منح اللقب إذا لزم الأمر.

    افتح ملف `app/Models/Account.php` وأضف الدالة التالية:

    ```php
    <?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Illuminate\Notifications\Notifiable;
    use Laravel\Sanctum\HasApiTokens;
    use App\Enums\AccountTypeEnum;
    use BenSampo\Enum\Casts\EnumCast;
    // استيراد النماذج اللازمة داخل الدالة
    use App\Models\Badge;
    use App\Models\AccountBadge;
    use App\Models\Solution;
    use App\Models\Comment; // نحتاجها لعد التعليقات المعتمدة

    class Account extends Authenticatable
    {
        // ... الخصائص والعلاقات الأخرى ...

        /**
         * Get the comments authored by the account.
         */
        public function authoredComments()
        {
            return $this->hasMany(Comment::class, 'author_account_id');
        }

        /**
         * Check if the account has earned any new badges and award them.
         * هذه الدالة يجب استدعاؤها عند حدوث أي حدث قد يؤدي إلى كسب لقب (زيادة نقاط، اعتماد تعليق).
         */
        public function checkAndAwardBadges(): void
        {
            $allBadges = Badge::all(); // جلب جميع تعريفات الألقاب المتاحة
            $currentPoints = $this->points; // نقاط المستخدم الحالية

            // حساب عدد تعليقات المستخدم التي تم اعتمادها كحلول
            // نستخدم علاقة adoptedSolution على نموذج Comment ونبحث في جدول Solutions
            $adoptedCommentsCount = $this->authoredComments()
                                         ->whereHas('adoptedSolution') // تحقق ما إذا كان التعليق مرتبط بسجل في جدول solutions
                                         ->count();

            foreach ($allBadges as $badge) {
                // التحقق من استيفاء الشروط
                $meetsPointsCriteria = $currentPoints >= $badge->required_points;
                $meetsAdoptedCommentsCriteria = $adoptedCommentsCount >= $badge->required_adopted_comments_count;

                // التحقق مما إذا كان المستخدم يمتلك اللقب بالفعل
                $hasBadge = $this->accountBadges()->where('badge_id', $badge->id)->exists();

                // إذا تم استيفاء الشروط والمستخدم لا يملك اللقب، قم بمنحه
                if ($meetsPointsCriteria && $meetsAdoptedCommentsCriteria && !$hasBadge) {
                     AccountBadge::create([
                        'account_id' => $this->id,
                        'badge_id' => $badge->id,
                        'awarded_at' => now(), // تعيين وقت منح اللقب الحالي
                     ]);

                     // (اختياري) يمكنك هنا بث حدث (Event) للإشارة إلى أن المستخدم كسب لقباً جديداً
                     // مثلاً لإرسال إشعار له
                     // event(new \App\Events\BadgeEarned($this, $badge));

                     // (اختياري) تسجيل في السجلات (logging)
                     // \Illuminate\Support\Facades\Log::info("Account #{$this->id} ({$this->username}) earned badge: {$badge->name}");
                }
            }
        }

        // ... الدوال المساعدة الأخرى مثل isIndividual(), isOrganization(), isAdmin() ...
    }
    ```
    *ملاحظة:* تأكد من استيراد النماذج `Badge`, `AccountBadge`, `Solution`, `Comment` داخل الدالة إذا كنت تستخدمها بدون استيرادها في بداية الملف (أو قم باستيرادها). الأفضل هو استيرادها في بداية الملف.

3.  **استدعاء الدالة من الأماكن المناسبة:**

    *   **في `OrganizationController@adoptComment`:**
        بعد منح النقاط لمؤلف التعليق، استدع الدالة:
        ```php
        // app/Http/Controllers/OrganizationController.php

        // ...

        public function adoptComment(Request $request, Comment $comment)
        {
            // ... منطق التحقق من المنظمة والتعليق ...

            // إنشاء سجل الحل المعتمد
            $solution = Solution::create([
                // ... بيانات الحل ...
            ]);

            // --- منح نقاط لمؤلف التعليق ---
            $authorAccount = Account::find($comment->author_account_id);
            if ($authorAccount) {
                $pointsToAdd = 100; // مثال: نقاط تمنح عند اعتماد تعليق كحل
                $authorAccount->points += $pointsToAdd;
                $authorAccount->save(); // حفظ النقاط الجديدة

                // --- هنا نستدعي الدالة للتحقق من الألقاب ومنحها ---
                $authorAccount->checkAndAwardBadges();
                // --- نهاية استدعاء الدالة ---
            }
             // --- نهاية منطق منح النقاط ---

            // ... إعادة التوجيه ...
            return redirect()->route('organization.showAdoptedSolution', $solution)
                             ->with('success', 'Comment adopted as a solution successfully! Points awarded to author.'); // يمكن تعديل الرسالة
        }

        // ... باقي دوال المتحكم ...
        ```

    *   **في `ProfileController@showMyBadges` (للتأكد أو كفحص عند العرض):**
        يمكنك استدعاء الدالة في هذه الدالة لضمان أن المستخدم يحصل على أي لقب فاته عند زيارة صفحة الألقاب الخاصة به. هذا يعطي بعض التسامح مع الأخطاء إذا فاتك استدعاء الدالة من مكان آخر يغير النقاط أو التعليقات المعتمدة.

        ```php
        // app/Http/Controllers/ProfileController.php

        // ...

        /**
         * Display the authenticated user's badges.
         */
         public function showMyBadges()
         {
             $account = Auth::user();

             // --- استدعاء الدالة للتحقق من الألقاب ومنحها ---
             // هذا يضمن تحديث قائمة الألقاب عند زيارة الصفحة
             $account->checkAndAwardBadges();

             // --- ثم جلب الألقاب التي حصل عليها للعرض ---
             // يجب إعادة تحميل العلاقة بعد استدعاء الدالة في حال تم منح ألقاب جديدة
             $account->load('accountBadges.badge');

             $badges = $account->accountBadges; // مجموعة نماذج AccountBadge

             // الواجهة: resources/views/profiles/my_badges.blade.php
             return view('profiles.my_badges', compact('account', 'badges'));
         }

        // ... باقي دوال المتحكم ...
        ```

    *   **في أي مكان آخر يتم فيه تغيير نقاط المستخدم أو عدد تعليقاته المعتمدة:**
        إذا أضفت أي ميزة أخرى تزيد من نقاط المستخدم (مثل التصويت على التعليقات إذا كان Upvote يمنح نقطة)، استدع `Auth::user()->checkAndAwardBadges()` (أو `$userAccount->checkAndAwardBadges()`) بعد تحديث النقاط.

**لماذا لم يحصل المستخدم على الألقاب برغم أن لديه نقاط كافية في الـ Seeder؟**

الـ Seeder يقوم بإنشاء البيانات (الحسابات، النقاط، الألقاب، التعليقات، الحلول المعتمدة)، ولكنه لا يقوم تلقائيًا بتشغيل منطق التحقق من الألقاب ومنحها. أنت قمت بإنشاء بيانات الحسابات والألقاب بشكل منفصل. حتى لو كانت نقاط مستخدم وهمي كافية، فإن سجل الربط في جدول `account_badges` لم يتم إنشاؤه إلا إذا قمت بإنشاء سجلات يدوياً في `AccountBadgesSeeder` أو إذا تم استدعاء الدالة التي تمنح الألقاب (التي أنشأناها الآن) أثناء تشغيل الـ Seeder.

بتطبيق الدالة `checkAndAwardBadges()` واستدعائها في الأماكن الصحيحة (خاصة في `ProfileController@showMyBadges` مبدئياً وفي `OrganizationController@adoptComment`)، سيتم التحقق من شروط الألقاب ومنح المستخدم أي ألقاب يستحقها عند زيارة صفحة الألقاب أو عند اعتماد تعليق له كحل.

الآن، عندما تزور صفحة My Badges، سيتم تشغيل `checkAndAwardBadges()`، وسيتم فحص إذا كان لدى المستخدم 350 نقطة (نعم) وهل هذا كافٍ لأي لقب (نعم، Rising Thinker يتطلب 100). إذا لم يكن يمتلك هذا اللقب في جدول `account_badges`، فسيتم إنشاؤه وسيظهر في الصفحة بعد إعادة تحميل العلاقة.

---

تمام، فهمت طلبك. تريد إضافة رابط في قائمة التعليقات يؤدي إلى صفحة ملف شخصي عام للمستخدم أو المنظمة التي كتبت التعليق. هذه الصفحة يجب أن تظهر بعض المعلومات بشكل عام للجميع (حتى لو لم يكونوا مسجلين دخول أو كانوا مستخدمين آخرين)، ولكن تخفي المعلومات الحساسة (مثل رقم الهاتف).

لقد قمت بالفعل بتعريف مسار `profiles.show` (`Route::get('/profiles/{account}', [ProfileController::class, 'show'])->name('profiles.show');`) ومتحكم `ProfileController@show` الذي يستقبل نموذج `Account` ويحمّل بيانات `UserProfile` أو `OrganizationProfile` المرتبطة. هذا هو المسار والمتحكم المثالي لاستخدامه.

الآن، سنقوم بتعديل الأماكن التالية:

1.  **ملف الواجهة الجزئي `partials.comments.blade.php`:** لإضافة الرابط حول اسم مؤلف التعليق.
2.  **ملف المتحكم `ProfileController.php`:** للتأكد من تحميل الألقاب أيضاً عند عرض الملف الشخصي العام.
3.  **ملف الواجهة `profiles.show.blade.php`:** لإضافة منطق إخفاء/إظهار الحقول بناءً على ما إذا كان المستخدم الذي يعرض الصفحة هو صاحب الملف أم لا.

**الخطوات:**

**1. تعديل ملف `resources/views/partials/comments.blade.php`:**

سنقوم بلف اسم المستخدم/المنظمة في التعليقات برابط يشير إلى صفحة عرض الملف الشخصي (`profiles.show`)، مع تمرير نموذج الحساب (`$comment->author`).

```html
{{-- resources/views/partials/comments.blade.php --}}

@foreach ($comments as $comment)
    <div class="media mb-4 border p-3" id="comment-{{ $comment->id }}" style="margin-left: {{ ($comment->parent_comment_id !== null) ? '40px' : '0' }};">
        @if ($comment->author->isIndividual() && $comment->author->userProfile)
             {{-- يمكنك هنا إضافة صورة المستخدم/المنظمة إذا كانت متوفرة --}}
             <img src="https://via.placeholder.com/50?text={{ substr($comment->author->userProfile->first_name ?? $comment->author->username, 0, 1) }}" class="mr-3 rounded-circle" alt="User Avatar"> {{-- صورة وهمية --}}
        @elseif ($comment->author->isOrganization() && $comment->author->organizationProfile)
             <img src="https://via.placeholder.com/50?text={{ substr($comment->author->organizationProfile->name ?? $comment->author->username, 0, 1) }}" class="mr-3 rounded-circle" alt="Organization Logo"> {{-- صورة وهمية --}}
        @else
             <img src="https://via.placeholder.com/50?text=?" class="mr-3 rounded-circle" alt="Avatar"> {{-- صورة وهمية --}}
        @endif

        <div class="media-body">
            <h5 class="mt-0">
                {{-- إضافة الرابط حول اسم المستخدم --}}
                <a href="{{ route('profiles.show', $comment->author) }}" class="text-dark">{{ $comment->author->username ?? 'N/A' }}</a>
                <small class="text-muted">- {{ $comment->created_at->diffForHumans() }}</small>
            </h5>

            <p>{{ $comment->content }}</p>

            {{-- Comment Votes (Stack Overflow style) --}}
            <div class="d-flex align-items-center">
                @auth
                     {{-- Upvote Button --}}
                    <form action="{{ route('comments.vote', $comment) }}" method="POST" class="d-inline vote-form">
                        @csrf
                        <input type="hidden" name="vote_value" value="1">
                        <button type="submit" class="btn btn-sm btn-outline-success @if(Auth::user()->commentVotes()->where('comment_id', $comment->id)->where('vote_value', 1)->exists()) active @endif">
                            <i class="fas fa-arrow-up"></i>
                        </button>
                    </form>

                     {{-- Vote Count (will update via JS eventually) --}}
                    <span class="mx-2 font-weight-bold comment-vote-count">{{ $comment->total_votes }}</span>

                     {{-- Downvote Button --}}
                    <form action="{{ route('comments.vote', $comment) }}" method="POST" class="d-inline vote-form">
                        @csrf
                        <input type="hidden" name="vote_value" value="-1">
                        <button type="submit" class="btn btn-sm btn-outline-danger @if(Auth::user()->commentVotes()->where('comment_id', $comment->id)->where('vote_value', -1)->exists()) active @endif">
                            <i class="fas fa-arrow-down"></i>
                        </button>
                    </form>

                    {{-- Reply Button --}}
                    <button class="btn btn-sm btn-link ml-2 reply-button" data-comment-id="{{ $comment->id }}">Reply</button>

                    {{-- Edit/Delete buttons for owner or admin --}}
                     @if (Auth::user()->id === $comment->author_account_id || Auth::user()->isAdmin())
                         <a href="{{ route('comments.edit', $comment) }}" class="btn btn-sm btn-link ml-2">Edit</a>
                         <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="d-inline">
                             @csrf
                             @method('DELETE')
                             <button type="submit" class="btn btn-sm btn-link text-danger" onclick="return confirm('Are you sure you want to delete this comment?');">Delete</button>
                         </form>
                     @endif

                     {{-- Adopt as Solution Button (for Organizations only) --}}
                     @if (Auth::user()->isOrganization())
                         @if (!$comment->adoptedSolution) {{-- Show only if not already adopted --}}
                              <form action="{{ route('organization.adoptComment', $comment) }}" method="POST" class="d-inline ml-2">
                                 @csrf
                                 <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('Are you sure your organization wants to adopt this comment as a solution?');">Adopt as Solution</button>
                             </form>
                         @else {{-- Indicate if already adopted and by whom --}}
                            <span class="badge badge-info ml-2">Adopted by {{ $comment->adoptedSolution->adoptingOrganization->name ?? 'Organization' }}</span>
                         @endif
                     @endif

                @endauth
                 @guest {{-- Display votes even for guests --}}
                     <span class="ml-2 font-weight-bold">{{ $comment->total_votes }} votes</span>
                @endguest

            </div>

            {{-- Reply Form (initially hidden) --}}
             @auth
                <div class="reply-form mt-3" id="reply-form-{{ $comment->id }}" style="display: none;">
                    <h6>Reply to {{ $comment->author->username }}</h6>
                    <form action="{{ route('comments.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="problem_id" value="{{ $comment->problem_id }}">
                        <input type="hidden" name="parent_comment_id" value="{{ $comment->id }}">
                        <div class="form-group">
                            <textarea name="content" class="form-control" rows="2" required>{{ old('content') }}</textarea>
                            @error('content') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary">Submit Reply</button>
                    </form>
                </div>
            @endauth


            {{-- Display replies recursively --}}
            @if ($comment->replies->isNotEmpty())
                <div class="mt-4">
                    @include('partials.comments', ['comments' => $comment->replies])
                </div>
            @endif

        </div>
    </div>
@endforeach

{{-- Simple JavaScript to toggle reply forms --}}
{{-- Add this script once in your main layout or a dedicated script file loaded on the page --}}
{{-- <script>
     document.addEventListener('DOMContentLoaded', function () {
         document.querySelectorAll('.reply-button').forEach(button => {
             button.addEventListener('click', function () {
                 const commentId = this.dataset.commentId;
                 const replyForm = document.getElementById('reply-form-' + commentId);
                 if (replyForm.style.display === 'none') {
                     replyForm.style.display = 'block';
                 } else {
                     replyForm.style.display = 'none';
                 }
             });
         });
         // Optional: Simple AJAX for votes
     });
</script> --}}
```

**2. تعديل ملف `app/Http/Controllers/ProfileController.php`:**

تأكد أن الدالة `show` تحمّل العلاقة الخاصة بالألقاب (`accountBadges.badge`)، وهذا ما فعلناه بالفعل في الخطوات السابقة، لذا لا حاجة لتعديل هنا.

```php
// app/Http/Controllers/ProfileController.php

// ... use statements ...

class ProfileController extends Controller
{
    // ... __construct() ...

    /**
     * Display a user or organization profile.
     */
    public function show(Account $account)
    {
        // تحميل العلاقة المناسبة (UserProfile أو OrganizationProfile)
        // تأكد من تحميل الألقاب أيضاً هنا
        $account->load('userProfile', 'organizationProfile', 'accountBadges.badge'); // العلاقة accountBadges محملة

        // تحديد نوع الملف الشخصي لعرض الواجهة المناسبة
        $profile = $account->isIndividual() ? $account->userProfile : $account->organizationProfile;

        if (!$profile) {
             // يمكن معالجة الحسابات التي لا تزال بدون ملف شخصي هنا،
             // مثلاً عرض رسالة أو إعادة التوجيه
             abort(404, 'Profile not found.');
        }

        // لا نحتاج لحساب الألقاب ومنحها هنا، فهذا يتم عند كسب النقاط أو زيارة صفحة الألقاب الخاصة بالمستخدم.
        // هنا فقط نعرض الألقاب الموجودة بالفعل في القاعدة.


        // ستنشئ الواجهة لاحقاً: resources/views/profiles/show.blade.php
        return view('profiles.show', compact('account', 'profile'));
    }

    // ... باقي الدوال (edit, update, showMyBadges) ...
}
```

**3. تعديل ملف `resources/views/profiles/show.blade.php`:**

سنضيف منطق التحقق لمعرفة ما إذا كان المستخدم الحالي (المسجل دخوله) هو نفس المستخدم الذي يتم عرض ملفه الشخصي. بناءً على ذلك، سنقوم بإخفاء أو إظهار الحقول.

```html
@extends('layouts.app')

@section('title', ($account->isIndividual() ? 'User Profile' : 'Organization Profile') . ': ' . ($profile->name ?? $profile->first_name ?? $account->username))

@section('content')
    {{-- تحديد ما إذا كان المستخدم الحالي هو صاحب الملف --}}
    @php
        $isOwner = Auth::check() && (Auth::id() === $account->id);
    @endphp

    <h1>Profile: {{ $profile->name ?? $profile->first_name ?? $account->username }}</h1>

     {{-- زر تعديل الملف الشخصي يظهر فقط إذا كان المستخدم هو صاحب الملف --}}
     @auth
          @if ($isOwner)
              <p><a href="{{ route('profile.edit') }}" class="btn btn-secondary">Edit My Profile</a></p>
          @endif
     @endauth


    <div class="card mb-3">
        <div class="card-header">Account Information</div>
        <div class="card-body">
            <p><strong>Username:</strong> {{ $account->username }}</p>
            <p><strong>Account Type:</strong> {{ ucfirst($account->account_type->value ?? $account->account_type) }}</p> {{-- استخدام value للـ Enum --}}
            <p><strong>Points:</strong> {{ $account->points }}</p>
             <p><strong>Joined:</strong> {{ $account->created_at->format('Y-m-d') }}</p>

            {{-- إظهار البريد الإلكتروني فقط للمالك أو المسؤول --}}
             @if ($isOwner || (Auth::check() && Auth::user()->isAdmin()))
                <p><strong>Email:</strong> {{ $account->email }}</p>
             @endif


        </div>
    </div>

    <div class="card mb-3">
         <div class="card-header">{{ $account->isIndividual() ? 'Personal' : 'Organization' }} Details</div>
         <div class="card-body">
             @if ($account->isIndividual())
                  {{-- Display User Profile Fields --}}
                 <p><strong>Full Name:</strong> {{ $profile->first_name ?? 'N/A' }} {{ $profile->last_name ?? 'N/A' }}</p>

                 {{-- إظهار رقم الهاتف فقط للمالك أو المسؤول --}}
                 @if ($isOwner || (Auth::check() && Auth::user()->isAdmin()))
                     <p><strong>Phone:</strong> {{ $profile->phone ?? 'N/A' }}</p>
                 @endif

                 <p><strong>Bio:</strong> {{ $profile->bio ?? 'N/A' }}</p>
             @elseif ($account->isOrganization())
                 {{-- Display Organization Profile Fields --}}
                <p><strong>Organization Name:</strong> {{ $profile->name ?? 'N/A' }}</p>
                 <p><strong>Website:</strong> <a href="{{ $profile->website_url ?? '#' }}">{{ $profile->website_url ?? 'N/A' }}</a></p>

                 {{-- إظهار البريد الإلكتروني للاتصال بالمنظمة (هذا قد يكون عاماً أو خاصاً حسب الحاجة) --}}
                 {{-- لنفترض أنه عام مبدئياً --}}
                 <p><strong>Contact Email:</strong> {{ $profile->contact_email ?? 'N/A' }}</p>

                <p><strong>Info:</strong> {{ $profile->info ?? 'N/A' }}</p>
             @endif

             {{-- Display Address if available (يمكن إظهاره بشكل عام أو جعله خاصاً) --}}
              @if ($profile->address)
                 <p><strong>Address:</strong>
                     {{ $profile->address->street_address ?? '' }}@if($profile->address->street_address), @endif
                     {{ $profile->address->city->name ?? '' }}@if($profile->address->city->name), @endif
                     {{ $profile->address->city->country->name ?? '' }}
                     {{-- إظهار الرمز البريدي فقط للمالك أو المسؤول --}}
                     @if ($isOwner || (Auth::check() && Auth::user()->isAdmin()))
                         - {{ $profile->address->postal_code ?? '' }}
                     @endif
                 </p>
             @endif
         </div>
    </div>

     {{-- Display Badges for the ACCOUNT BEING VIEWED --}}
     @if ($account->accountBadges->isNotEmpty())
          <div class="card mb-3">
             <div class="card-header">Earned Badges</div>
             <div class="card-body">
                 <div class="row">
                     @foreach ($account->accountBadges as $accountBadge)
                         <div class="col-auto mb-3">
                             <div class="text-center">
                                 @if ($accountBadge->badge->image_url)
                                     <img src="{{ asset($accountBadge->badge->image_url) }}" alt="{{ $accountBadge->badge->name }}" style="width: 50px; height: 50px;">
                                 @else
                                      <div style="width: 50px; height: 50px; background-color: #ccc; display: inline-block;"></div> {{-- Placeholder if no image --}}
                                 @endif
                                 <p class="mt-1 mb-0"><small>{{ $accountBadge->badge->name }}</small></p>
                                  <p><small class="text-muted">Awarded: {{ $accountBadge->awarded_at->format('Y-m-d') }}</small></p>
                             </div>
                         </div>
                     @endforeach
                 </div>
                 {{-- رابط "View All My Badges" يجب أن يظهر فقط إذا كان المستخدم هو صاحب الملف --}}
                  @if ($isOwner)
                    <p><a href="{{ route('profile.badges') }}" class="btn btn-sm btn-info">View All My Badges</a></p>
                 @else
                     <p><a href="{{ route('badges.index') }}">View All Available Badges</a></p> {{-- رابط عام لقائمة الألقاب --}}
                 @endif
             </div>
         </div>
     @else
          <div class="card mb-3">
             <div class="card-header">Earned Badges</div>
             <div class="card-body">
                <p>{{ $account->username }} hasn't earned any badges yet.</p>
                <p><a href="{{ route('badges.index') }}">View All Available Badges</a></p>
             </div>
         </div>
     @endif


     {{-- يمكنك إضافة قسم لعرض المشاكل التي نشرها هذا الحساب (إذا كانت عامة) --}}
     {{-- أو التعليقات التي كتبها (إذا كانت عامة) --}}

@endsection
```

**شرح التعديلات في الواجهة:**

*   تم إضافة متغير Blade `@php $isOwner = Auth::check() && (Auth::id() === $account->id); @endphp` للتحقق بسهولة ما إذا كان المستخدم الحالي هو صاحب الملف.
*   تم استخدام `@if ($isOwner)` أو `@if ($isOwner || (Auth::check() && Auth::user()->isAdmin()))` لإحاطة الحقول التي يجب أن تكون مرئية فقط للمالك أو للمسؤول.
*   تم التأكيد على أن عرض الألقاب هو للألقاب المرتبطة بالـ `$account` الذي يتم عرضه (`$account->accountBadges`).
*   تم تعديل رابط "View All My Badges" ليظهر فقط للمالك، أو يتم عرض رابط عام لقائمة الألقاب المتاحة للآخرين.
*   تم إضافة placeholders بسيطة للصور إذا كانت غير موجودة.

**لجعل هذا يعمل:**

1.  احفظ التعديلات في ملفي `partials.comments.blade.php` و `profiles.show.blade.php`.
2.  تأكد من أن `ProfileController@show` يحمّل العلاقة `accountBadges.badge`.
3.  تأكد من أن `Auth::check()` تعمل بشكل صحيح وأن نظام المصادقة يعمل كما هو متوقع.
4.  تأكد من أن الـ Middleware `isAdmin` يعمل بشكل صحيح للتحقق من نوع حساب المسؤول.
5.  قم بتنظيف الكاش: `php artisan optimize:clear`.

الآن، عند عرض مشكلة، يمكنك النقر على اسم مؤلف التعليق للانتقال إلى ملفه الشخصي. إذا كنت مسجل دخول كصاحب الملف، سترى جميع المعلومات. إذا كنت مسجل دخول كمستخدم آخر أو لم تكن مسجلاً، فسترى نسخة محدودة من المعلومات.

---





