# FlixFlex API

FlixFlex is a Laravel-based API for managing movies and series.

## Table of Contents

- [Overview](#overview)
- [Setup](#setup)
  - [Installation](#installation)
  - [Database](#database)
  - [API Keys](#api-keys)
- [Endpoints](#endpoints)
  - [Movies](#movies)
  - [Series](#series)
- [Models](#models)
- [Authentication](#authentication)

## Overview

FlixFlex API is designed to provide a simple and efficient way to manage movies and series. It utilizes the Laravel framework for robustness and flexibility.

## Setup

### Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/your-username/flixflex-api.git

2. Install dependencies:

    ```bash
    composer install


### Database

1. uses the Guzzle HTTP client for making HTTP requests:

   ```bash
   composer require guzzlehttp/guzzle

2. Create an Artisan Command:
    You can use a command to fetch data from the TMDB API and populate your database.

    ```bash
    php artisan make:command PopulateDatabase

    This will create a new command file in the app/Console/Commands directory. Open the generated command file (e.g., PopulateDatabase.php) and modify the handle method to fetch data from the TMDB API and insert it into your database.

    I already provided a script for that you can customize it to fit with your needs if you want after that launch the following after having an API KEY from the TMDB API

    ```bash
    php artisan populate:database

    This command will fetch popular movies and series from the TMDB API and insert them into your "movies" and "series" tables.
    Remember to replace API KEY with your actual TMDB API key.

### API Keys

1. TMDB API KEY:

    Sign up and get your free key in their website.

2. Youtube Data API V3 key:

    I already left my key presented and not hidden in order to let you test the project quickly, you can also get your free key as well if you want.


## Endpoints
    Checkout FlixFlex_Endpoints_details.json file you find all the endpoints details with theirs results
### Movies
    GET /movies : Retrieve list of movies on different pages.
    GET /movies/top : Retrieve list of top 5 movies.
    GET /movies/{id} : Retrieve a movie details.
    POST /favorites/movies/{movieId} : Add a movie to favorite user's movies. (Allowed only after user login)
    Authorization: Bearer {token}
    DELETE /favorites/movies/{moviesId} : Delete a movie to favorite user's movies. (Allowed only after user login).
    Authorization: Bearer {token}

### Series
    GET /series : Retrieve list of series on different pages.
    GET /series/top : Retrieve list of top 5 series.
    GET /series/{id} : Retrieve a serie details.
    POST /favorites/series/{serieId} : Add a serie to favorite user's series. (Allowed only after user login).
    Authorization: Bearer {token}
    DELETE /favorites/series/{seriesId} : Delete a serie to favorite user's series. (Allowed only after user login).
    Authorization: Bearer {token}

### Search
    GET /search : Search by title and/or name for a movie and/or serie.

### Trailer
    GET /watch-trailer/{type}/{id} : Watch trailer for a type of ( movie or serie ) with the given id of ( movie or serie ).

### Favorite
    GET /favorites : Retrieve user's favorite movies and series.
    Authorization: Bearer {token}

## Models

    List of models used in the project:
        - User
        - Movie
        - Serie
        - Favorite

## Authentication

   I used Laravel Sanctum a lightweight package to handle API token authentication for Laravel applications.

   Laravel Sanctum provides a convenient token method on the User model :

   ```bash
   $token = $user->createToken('token-name')->plainTextToken;

   This token can be used for authenticating API requests.
