## Design an API with following conditions (AbanTether - Ali Jomehri)

## What's included:

- Dockerized
- Swagger API Documentation
- <b>Repository Design Pattern</b>
- <b>Race condition</b> prevention (database locks: both MySql & Redis)
- SOLID, DRY, OOP, KISS
- Feature tests
- Form request validation
- Localization and translates
- dynamic coin prices within database

## Installation:

- cd docker
- docker-compose up
- cd ../src
- composer install
- cp .env.example .env
- sudo chmod 777 storage/ -R
- php artisan migrate:fresh --seed
- visit http://localhost:9085
- php artisan test

![Docker Images](src/public/images/docker-images.png)
![Docker Containers](src/public/images/docker-containers-up.png)
![Swagger](src/public/images/swagger.png)
![Feature Tests](src/public/images/testing.png)

## صورت مساله

1.        هر خرید باید موارد زیر را به عنوان ورودی بگیرید:

1.        نام رمز ارز جهت خریداری (مثال: ABAN)

2.       مقدار رمز ارز جهت خریداری (مثال: 1)

2.       برای انجام عملیات خرید باید دو کار انجام شود:

1.        کم کردن پول از حساب مشتری با توجه به قیمت آن رمز ارز و مقدار خریداری شده (برای سادگی، قیمت‌ها را می‌توانید Hard Code کنید)

2.       مقدار خریداری شده را با صرافی‌های بین‌المللی تصفیه کنید (یک متد خالی با نام buy_from_exchange ایجاد کنید که وظیفه تصفیه کردن خرید را داشته باشید. فرض کنید این متد یک ریکوئست HTTP به صرافی‌های بین‌المللی می‌زند)

3.      از آنجا که صرافی‌های بین‌المللی خریدهای زیر 10 دلار را پشتیبانی نمی‌کنند، برای این سفارش‌ها عمل تصفیه حساب باید به صورت تجمیعی با سفارش‌های زیر 10 دلار دیگر انجام دهید.

مثال:

برای درک بهتر مساله به مثال‌های زیر دقت کنید (قیمت رمز ارز ABAN در همه مثال‌ها 4 دلار است):

1.        سفارشی برای خرید 3 رمز ارز ABAN دریافت می‌کنید، در همان لحظه دریافت درخواست از طریق API باید مقدار 12 دلار از حساب کاربر کم شود و تابع buy_from_exchange با آرگومان‌های ABAN و 3 فراخوانی شود.

2.       3 سفارش مختلف از کاربران مختلف برای خرید یک عدد ABAN دریافت‌ می‌کنید. در لحظه دریافت هریک از درخواست‌ها از طریق API، فقط مقدار 4 دلار از حساب کاربر سفارش دهنده کم شود، اما تابع buy_from_exchange فقط یک بار و پس‌ از خرید آخر (در اولین زمان ممکن) با آرگومان‌های ABAN و 12 فراخوانی شود.

نکات پیاده‌سازی:

1.        زبان پیاده‌سازی باید Python باشد.

2.       استفاده از فریم‌ورک Django اولویت دارد اما ضرورت ندارد.

3.      سرویس‌هایی که استفاده‌ می‌کنید (مانند دیتابیس) به صلاح‌دید خودتان و با توجه به مساله انتخاب شود.

4.      تمیز بودن کد اهمیت زیادی دارد.

5.      استاندارد بودن کد (از نظر رعایت قواعد OOP، SOLID و …) پر اهمیت است.

6.       پرفورمنس اجرای کد پر اهمیت است.

7.      تست نویسی امتیاز مثبت دارد.

8.      داکرایز کردن پروژه امتیاز مثبت دارد.