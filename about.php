<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

include 'includes/header.php';
include 'includes/nav.php';
?>

<div class="container py-5">

    <div class="row">

        <div class="col-lg-10 mx-auto">

            <h1 class="mb-4">About Game Explorer</h1>

            <div class="card p-4 mb-4">

                <h3>🎮 Project Overview</h3>

                <p>
                    <strong>Game Explorer</strong> is a PHP-based web application that allows users to search and browse video games using
                    <strong>TheGamesDB API</strong>.
                    The website provides game details such as titles, release dates, platforms, genres, and cover images.
                </p>

                <p>
                    The goal of this project is to demonstrate how a server-side language like PHP can interact with an external API
                    and dynamically generate a responsive website.
                </p>

            </div>

            <div class="card p-4 mb-4">

                <h3>🌐 Data Source (API)</h3>

                <p>
                    This website uses <strong>TheGamesDB API</strong>:
                </p>

                <p>
                    It provides structured JSON data about video games including:
                </p>

                <ul>
                    <li>Game titles</li>
                    <li>Release dates</li>
                    <li>Platforms</li>
                    <li>Genres</li>
                    <li>Box art (images)</li>
                </ul>

                <p>
                    The data is retrieved using PHP’s <code>file_get_contents()</code> function and processed using
                    <code>json_decode()</code>.
                </p>

            </div>

            <div class="card p-4 mb-4">

                <h3>⚙️ How the Website Works</h3>

                <ol>
                    <li>User enters a game name in the search bar</li>
                    <li>PHP sends a request to TheGamesDB API</li>
                    <li>API returns JSON data</li>
                    <li>PHP decodes and loops through results</li>
                    <li>Data is displayed using Bootstrap cards</li>
                    <li>User can click “View Details” for more information</li>
                </ol>

            </div>

            <div class="card p-4 mb-4">

                <h3>💻 Technologies Used</h3>

                <ul>
                    <li>PHP (server-side logic)</li>
                    <li>Bootstrap 5 (responsive design)</li>
                    <li>HTML & CSS</li>
                    <li>JSON (API data format)</li>
                    <li>TheGamesDB API</li>
                </ul>

            </div>

            <div class="card p-4">

                <h3>📱 Features</h3>

                <ul>
                    <li>Search games by title</li>
                    <li>Browse by platform</li>
                    <li>View detailed game information</li>
                    <li>Responsive mobile-friendly design</li>
                    <li>Dynamic API-driven content</li>
                </ul>

            </div>

        </div>

    </div>

</div>

<?php include 'includes/footer.php'; ?>