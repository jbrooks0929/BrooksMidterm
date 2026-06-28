<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

include 'includes/header.php';
include 'includes/nav.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<div class='container py-5'>
            <div class='alert alert-danger'>Invalid game ID.</div>
          </div>";
    include 'includes/footer.php';
    exit;
}

$gameID = intval($_GET['id']);

$url = $baseUrl .
    "Games/ByGameID?" .
    "apikey=" . $apiKey .
    "&id=" . $gameID;

$data = callAPI($url);

$game = null;
$image = "https://via.placeholder.com/500x700?text=No+Image";

if ($data && isset($data['data']['games'][0])) {
    $game = $data['data']['games'][0];

    if (
        isset($data['include']['boxart']['base_url']['large']) &&
        isset($data['include']['boxart']['data'])
    ) {
        $base = $data['include']['boxart']['base_url']['large'];

    foreach ($data['include']['boxart']['data'] as $box) {

    if ($box['game_id'] == $gameID) {

        if ($box['side'] == "front") {
            $image = $base . $box['filename'];
            break;
        }

        // fallback if no front found yet
        if ($image === "https://via.placeholder.com/500x700?text=No+Image") {
            $image = $base . $box['filename'];
        }
    }
}
    }
}
?>

<div class="container py-5">

<?php if (!$game): ?>

    <div class="alert alert-danger">
        Game not found.
    </div>

<?php else: ?>

    <div class="row g-4">

        
        <div class="col-md-4">
            <img src="<?php echo $image; ?>"
                 class="img-fluid rounded shadow game-cover"
                 alt="<?php echo sanitize($game['game_title']); ?>">
        </div>

        
        <div class="col-md-8">

            <h1 class="mb-3">
                <?php echo sanitize($game['game_title']); ?>
            </h1>

            <div class="game-info mb-4">

                <p><strong>Release Date:</strong>
                    <?php echo !empty($game['release_date'])
                        ? formatDate($game['release_date'])
                        : "Unknown"; ?>
                </p>

                <p><strong>Players:</strong>
                    <?php echo $game['players'] ?? "Unknown"; ?>
                </p>

                <p><strong>Platform ID:</strong>
                    <?php echo $game['platform'] ?? "Unknown"; ?>
                </p>

                <p><strong>Genres:</strong>
                    <?php
                    if (!empty($game['genres']) && is_array($game['genres'])) {
                        echo implode(", ", $game['genres']);
                    } else {
                        echo "Unknown";
                    }
                    ?>
                </p>

            </div>

            <?php if (!empty($game['overview'])): ?>

                <h4>About the Game</h4>

                <p class="lead">
                    <?php echo sanitize($game['overview']); ?>
                </p>

            <?php endif; ?>

            <a href="javascript:history.back()"
               class="btn btn-secondary mt-3">
                ← Back
            </a>

        </div>

    </div>

<?php endif; ?>

</div>

<?php include 'includes/footer.php'; ?>