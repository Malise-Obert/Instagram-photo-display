# Instagram-photo-display
Playing with Instagram API

*** This trivial app was developed in Laravel 5.7.9 on an ubuntu 16.04 LTS environment

### Installation

To setup this App on LAMP server/environment with easy requires Composer. If you do not already have it, get it her [Composer](https://getcomposer.org/).

clone the The Instagram-photo-Display App Repository from Github (https://github.com/Malise-Obert/Instagram-photo-display.git) to your desired folder if familiar with git or github otherwise use following instructions:

```
$ git clone https://github.com/Malise-Obert/Instagram-photo-display.git
$ cd instagram-photo-display
$ composer install
```
'Composer install' will pull all your required dependancies for this code base.

Next if not already done login to your instagram online, and then using this developer link: (https://www.instagram.com/developer/) manage / create a new client whichever is appropriate. This process will help setp and offer the config details needed for your environment file as specified in the .env.example file at the end as follows:

You may need to copy and create an .env from .env.example using the cp command

``$ cp .env.example`` to ``.env`` and adjust the following section to your desired varibales as specified in the create / manage client on instagram developer section:
```
INSTAGRAM_CLIENT_ID=YOUR_INSTAGRAM_CLIENT_ID
INSTAGRAM_CLIENT_SECRET=YOUR_INSTAGRAM_CLIENT_SECRET
INSTAGRAM_REDIRECT_URI=YOUR_INSTAGRAM_REDIRECT_URI
```

If all is set and Composer has pulled your dependancies then you are ready to run the small app.

```
php artisan serve
```

Follow the link that php artisan will serve on the prompt

Lastly, please give feed and give me a star for this attempt above!
