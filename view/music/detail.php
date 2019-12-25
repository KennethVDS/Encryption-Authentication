<!-- view/music/detail.php -->
<?php $judul = 'Musical Details' ?>

<?php ob_start() ?>
    <h1><?= $music['name_decrypt'] ?></h1>

    <dl>
        <dt>Artist Name : </dt>
        <dd><?= $music['name_decrypt'] ?></dd>
        <dt>Track Name : </dt>
        <dd><?= $music['track'] ?></dd>
        <dt>Album Name: </dt>
        <dd><?= $music['album'] ?></dd>
		<dt>Year : </dt>
        <dd><?= $music['released'] ?></dd>
    </dl>
<?php $isi = ob_get_clean() ?>

<?php include 'view/template.php' ?>