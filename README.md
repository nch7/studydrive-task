# About

This is a solution to the sample project that StudyDrive asked me to submit as a step for interview process.

# Requirements

Write the following example task in Laravel:

(estimated time 3-4 hours)


Create a registration/login page containing two fields:

1. email address (valid email format, unique)

2. password (min. 5 characters)


If a new email address is entered into the email field, you should treat it as a register attempt, otherwise it is a login attempt.

After a new registration, send an activation email to the user containing an activation link for his account. After clicking this link, mark the corresponding account as activated.


If a user registers / logs in, he is redirected to a new page that shows his user id, his email address, his activation status and a logout link.

This page is only accessible for logged in users, regardless of their activation status. After logout the user is redirected to the registration/login page.


Notes:

- Don't spend time on the design (just make it functional, it can be ugly) but try to achieve a code status that could be used in a production environment. So think about the structure, error handling, comments etc. 

- Please do not use the help of others. If you are stuck at a certain point, just move on. It's important that we get a realistic impression of your skills.

- When you are done, please send your results to join@studydrive.net until Monday the 4th of June, 8 pm CET and tell us how much time you needed

# Installation

Run following commands for setup:
```
composer install
npm install
cp .env.example .env
php artisan key:generate
```

Open `.env` file and set the email service provider and the API key for it (Mailgun has a free API for this and works out of the box on Laravel).

