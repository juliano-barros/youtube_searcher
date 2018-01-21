# How to install<br><br>

Clone git repository<br>
git clone https://github.com/juliano-barros/youtube_searcher.git

Install composer components<br>
composer install<br><br>

Install and compile webpack<br>
npm install & npm run dev<br><br>

Create .env file<br>
php -r "file_exists('.env') || copy('.env.example', '.env');"<br><br>

Generate laravel APP_KEY<br>
php artisan key:generate<br><br>

At the end of .env file you must fill an youtube key on APP_KEY_YOUTUBE const.<br>
Ex.<br>
APP_KEY_YOUTUBE=somevalidkeyhere<br><br>

- **[Create key on youtube](https://developers.google.com/youtube/registering_an_application)**
<br><br>

You can see this app on<br>
- **[Youtube Searcher](https://newyoutubesearcher.herokuapp.com/)**
<br><br>




