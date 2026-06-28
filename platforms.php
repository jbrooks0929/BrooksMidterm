<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

include 'includes/header.php';
include 'includes/nav.php';

// Get selected platform (if any)
$platform = isset($_GET['platform']) ? trim($_GET['platform']) : "";

$games = [];
$baseImageUrl = "";
$boxart = [];

// Platform list (simple display layer)
$platforms = [
    "PC",
    "PlayStation",
    "Xbox",
    "Nintendo",
    "Sega",
    "Atari"
];

if (!empty($platform)) {

    // Search games by platform name
    $url = $baseUrl .
        "Games/ByGameName?" .
        "apikey=" . $apiKey .
        "&name=" . urlencode($platform);

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

    <h1 class="mb-4">Browse by Platform</h1>

    <!-- Platform Buttons -->
    <div class="mb-4">

        <?php foreach ($platforms as $p): ?>

            <a href="platforms.php?platform=<?php echo urlencode($p); ?>"
               class="btn btn-outline-light m-1">
                <?php echo $p; ?>
            </a>

        <?php endforeach; ?>

    </div>

    

    <?php if (!empty($platform)): ?>

        <h3 class="mb-3">
            Results for "<?php echo sanitize($platform); ?>"
        </h3>

        <?php if (empty($games)): ?>

            <div class="alert alert-warning">
                No games found for this platform.
            </div>

        <?php else: ?>

            <div class="row">

                <?php foreach ($games as $game): ?>

                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">

                        <div class="card h-100">

                            <img src="<?php echo getGameImage($game['id'], $boxart, $baseImageUrl); ?>"
                                 class="card-img-top"
                                 alt="<?php echo sanitize($game['game_title']); ?>">

                            <div class="card-body d-flex flex-column">

                                <h5 class="card-title">
                                    <?php echo sanitize($game['game_title']); ?>
                                </h5>

                                <p class="card-text">
                                    <?php echo !empty($game['release_date'])
                                        ? formatDate($game['release_date'])
                                        : "Unknown release"; ?>
                                </p>

                                <a href="details.php?id=<?php echo $game['id']; ?>"
                                   class="btn btn-primary mt-auto">
                                    View Details
                                </a>

                            </div>

                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

        <?php endif; ?>

    <?php else: ?>

        <div class="alert alert-info">
            Select a platform above to view games.
        </div>

    <?php endif; ?>

</div>

<?php include 'includes/footer.php'; ?>