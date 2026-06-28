<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

include 'includes/header.php';
include 'includes/nav.php';
?>

<div class="container">

    
    <div class="hero">

        <h1>Game Explorer</h1>

        <p class="lead mt-3">
            Search thousands of video games using TheGamesDB API.
            Browse by title, discover new games, and learn more about your favorites.
        </p>

        <!-- Search Form -->
        <form action="search.php" method="GET" class="search-box">

            <div class="input-group input-group-lg">

                <input
                    type="text"
                    name="name"
                    class="form-control"
                    placeholder="Search for a game..."
                    required>

                <button class="btn btn-primary" type="submit">
                    Search
                </button>

            </div>

        </form>

    </div>

    

    <div class="row text-center mb-5">

        <div class="col-12">
            <h2 class="mb-4">Browse Popular Platforms</h2>
        </div>

        <div class="col-md-2 col-6 mb-3">
            <a href="platforms.php?platform=PC"
               class="btn btn-outline-light w-100 platform-btn">
                💻 PC
            </a>
        </div>

        <div class="col-md-2 col-6 mb-3">
            <a href="platforms.php?platform=PlayStation"
               class="btn btn-outline-light w-100 platform-btn">
                🎮 PlayStation
            </a>
        </div>

        <div class="col-md-2 col-6 mb-3">
            <a href="platforms.php?platform=Xbox"
               class="btn btn-outline-light w-100 platform-btn">
                🟢 Xbox
            </a>
        </div>

        <div class="col-md-2 col-6 mb-3">
            <a href="platforms.php?platform=Nintendo"
               class="btn btn-outline-light w-100 platform-btn">
                🔴 Nintendo
            </a>
        </div>

        <div class="col-md-2 col-6 mb-3">
            <a href="platforms.php?platform=Sega"
               class="btn btn-outline-light w-100 platform-btn">
                🔵 Sega
            </a>
        </div>

        <div class="col-md-2 col-6 mb-3">
            <a href="platforms.php?platform=Atari"
               class="btn btn-outline-light w-100 platform-btn">
                🕹 Atari
            </a>
        </div>

    </div>

    

    <div class="row">

        <div class="col-lg-10 mx-auto">

            <div class="card p-4">

                <div class="card-body">

                    <h2>About Game Explorer</h2>

                    <p>
                        Game Explorer is a PHP web application that connects to
                        <strong>TheGamesDB API</strong> to search and display
                        information about thousands of video games.
                    </p>

                    <p>
                        Search by title or browse games by platform to view
                        release dates, descriptions, genres, and more.
                    </p>

                    <p>
                        This project demonstrates PHP API integration,
                        JSON processing, reusable templates, Bootstrap 5,
                        and responsive web design.
                    </p>

                    <a href="about.php" class="btn btn-primary">
                        Learn More
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

<?php
include 'includes/footer.php';
?>