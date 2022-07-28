# Schoolticket

This is a ticketing system for academic institutions such as universities.

## Installation

Install [xampp](https://www.apachefriends.org/download.html) and start the Apache and MySQL services.

Copy the folder into C:%USERNAME%/xampp/htdocs folder

Open the browser and paste the url below:

```bash
localhost/schoolticket/signin.php
```

The superuser/admin login number is '0101'

Creating a student account requires setting up an account with [Twilio](https://www.twilio.com/blog/passwordless-authentication-php-twilio-verify) and obtaining API keys for passwordless authentication. The keys will be copied into the code.php and signin.php files.

To run the react-native app, navigate into the app/tickets directory and run: 
```bash
npm install
```
to install the required packages then run:
```bash
npm run android
```
to view the application on an android emulator or connected device.
