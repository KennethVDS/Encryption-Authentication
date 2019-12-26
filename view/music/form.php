<!-- view/music/form.php -->
<?php
$request = preg_replace("|/*(.+?)/*$|", "\\1", $_SERVER['PATH_INFO']);
$uri = explode('/', $request);

// Set form action
if ($uri[1] === 'edit') {
    $title = 'Edit Music';
    $form_action = "http://localhost/pdomvc/index.php/music/edit?id=" . $_GET['id'];
} else {
    $title = 'Add Music';
    $form_action = "http://localhost/pdomvc/index.php/music/create";
}

$valName = isset($music['name_decrypt']) ? $music['name_decrypt'] : '';
$valTrack = isset($music['track']) ? $music['track'] : '';
$valAlbum = isset($music['album']) ? $music['album'] : '';
$valYear = isset($music['released']) ? $music['released'] : '';
$valId = isset($music['id']) ? $music['id'] : '';
?>

<?php ob_start() ?>
    <h1><?= $title ?></h1>

    <form action="<?= $form_action ?>" method="post">
        <?php if ($valId): ?>
            <input type="hidden" name="id" value="<?= $valId ?>">
        <?php endif ?>

        <div class="form-group">
            <label for="name">Name of the artist</label>
            <input name="name" type="text" value="<?= $valName ?>" class="form-control" id="name" placeholder="Name of the artist">
        </div>

        <div class="form-group">
            <label for="track">Track name</label>
            <input name="track" type="text" value="<?= $valTrack ?>" class="form-control" id="track" placeholder="Track name">
        </div>

        <div class="form-group">
            <label for="album">Album</label>
            <input name="album" type="text" value="<?= $valAlbum ?>" class="form-control" id="album" placeholder="Album Title">
        </div>    
		
		<div class="form-group">
            <label for="released">Album Year</label>
            <input name="released" type="text" value="<?= $valYear ?>" class="form-control" id="released" placeholder="Album released">
        </div>

        <button class="btn btn-primary" type="submit">Add</button>
    </form>
<?php $isi = ob_get_clean() ?>

<?php include 'view/template.php' ?>