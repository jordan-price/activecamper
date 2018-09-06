<p align="center">
  <img width="135" src="./documentation/activecamper.png">
</p>

# ActiveCamper

ActiveCamper is a simple app that lets you schedule one-time and recurring email campaigns using the ActiveCampaign API.

## Coding exercise Directions

1. Open a trial account with ActiveCampaign ([http://www.activecampaign.com](http://www.activecampaign.com/))
2. Write python or PHP code to connect to ActiveCampaign API with this documentation (<http://www.activecampaign.com/api/>).
3. Create, schedule and send a campaign for your contacts via the API (create your own dummy list of emails).

## About the Project

**See it in action https://ActiveCamper.co**

**Services**

The business logic of this application lives in the `ActiveCampaign` Service.

```php 
App\Services\ActiveCampaign
```

**API Wrapper**

I used the [activecampaign/api-php](https://github.com/ActiveCampaign/activecampaign-api-php)  API wrapper to communicate with the ActiveCampaign API. 

To connect the [activecampaign/api-php](https://github.com/ActiveCampaign/activecampaign-api-php) API wrapper, I created an ActiveCampaign service provider to tie it into the IoC container.

```php
App\Providers\ActiveCampaignProvider
```

**Repositories**

I created repositories to wrap the API calls. This approach avoided tightly coupling the code with the package's implementation of interacting with the ActiveCampaign API.

```php
App\Repositories\Campaigns
App\Repositories\Lists
App\Repositories\Messages
```

**Controller**

For this small of an application I could have added all the business logic to the controller. However I wanted to showcase my abilities to decouple code, code to an interface, and create clean and scalable code.

```php
App\Http\Controllers\CampaignController
```

**Frontend**

I created a simple UI to create campaigns and interact with the ActiveCampaign API.

```php
App\Resources\Views\Campaigns
```

I hope you enjoy the project! It was fun getting to know the ActiveCampaign API.

## Setup

This application was built using Laravel. 
For in depth documentation on setting up a laravel application, please refer to the laravel website https://laravel.com/docs/5.6/installation

- Clone the Repository
- Set up your .env (The example .env includes the ActiveCampaign API Credentials)
- Add your local database credentials to the .env

### Build

Next `cd` into the application folder and run the following commands:

- run `composer install`
- run `php artisan migrate` (This will create a users table for authentication)
- run `npm install`
- run `npm run dev`

**You should be good to go!**
**But don't waste your time setting this up just head over to https://activecamper.co**

## Ways to Improve

- Add caching to the API calls to improve performance
- Add more options and customizations when creating campaigns
- Implement automated tests
- Implement Docker for easier setup
