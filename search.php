<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

include 'includes/header.php';
include 'includes/nav.php';

// Get the search term
$search = isset($_GET['name']) ? trim($_GET['name']) : "";

$games = [];
$baseImageUrl = "";
$boxart = [];

if (!empty($search)) {

    $url = $baseUrl .
        "Games/ByGameName?" .
        "apikey=" . $apiKey .
        "&name=" . urlencode($search);

    $data = callAPI($url);

    if ($data && isset($data['data']['games'])) {

        $games = $data['data']['games'];

        if (isset($data['include']['boxart']['base_url']['medium'])) {
            $baseImageUrl = $data['include']['boxart']['base_url']['medium'];
        }

        if (isset($data['include']['boxart']['data'])) {
            $boxart = $data['include']['boxart']['data'];
        }
    }
}


function getGameImage($gameID, $boxart, $baseImageUrl)
{
    foreach ($boxart as $image) {

        if ($image['id'] == $gameID && $image['side'] == "front") {

            return $baseImageUrl . $image['filename'];

        }

    }

    return "https://via.placeholder.com/300x420?text=No+Image";
}

?>

<div class="container py-5">

    <h1 class="mb-4">
        Search Results
    </h1>

    <?php if(empty($search)): ?>

        <div class="alert alert-warning">
            Please enter a game title to search.
        </div>

    <?php elseif(empty($games)): ?>

        <div class="alert alert-danger">
            No games were found matching
            <strong><?php echo sanitize($search); ?></strong>.
        </div>

    <?php else: ?>

        <p class="lead">
            Found <?php echo count($games); ?> game(s) for
            "<strong><?php echo sanitize($search); ?></strong>"
        </p>

        <div class="row">

        <?php foreach($games as $game): ?>

            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">

                <div class="card h-100">

                    <img
                        src="<?php echo getGameImage($game['id'], $boxart, $baseImageUrl); ?>"
                        class="card-img-top"
                        alt="<?php echo sanitize($game['game_title']); ?>">

                    <div class="card-body d-flex flex-column">

                        <h5 class="card-title">
                            <?php echo sanitize($game['game_title']); ?>
                        </h5>

                        <p class="card-text">

                            <strong>Release Date:</strong><br>

                            <?php
                            echo isset($game['release_date'])
                                ? formatDate($game['release_date'])
                                : "Unknown";
                            ?>

                        </p>

                        <a
                            href="details.php?id=<?php echo $game['id']; ?>"
                            class="btn btn-primary mt-auto">

                            View Details

                        </a>

                    </div>

                </div>

            </div>

        <?php endforeach; ?>

        </div>

    <?php endif; ?>

</div>

<?php
include 'includes/footer.php';
?>