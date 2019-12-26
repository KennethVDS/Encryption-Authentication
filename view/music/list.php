<!-- view/music/list.php -->
<?php 
$request = preg_replace("|/*(.+?)/*$|", "\\1", $_SERVER['PATH_INFO']);
$judul = 'Music Database' ;

$uri = explode('/', $request);

if ($uri[1] === 'search') {
    $title = 'Search Music';
    $form_action = "http://localhost/pdomvc/index.php/music/search";
} else {
    $title = 'Music';
    $form_action = "http://localhost/pdomvc/index.php/music";
}
?>

<?php ob_start() ?>
	<br>
    <center><h1>Music</h1></center>
	<br>
	<div class="table-responsive"> 
    <!-- Search form -->
    <div class="md-form mt-0">
    <form action="http://localhost/pdomvc/index.php/music/search" method="POST">
        <input type="text" name="search[]" class="form-control" aria-label="Search" placeholder="Search by Artist" />
        <input type="submit" name="submit" value="search" class="btn btn-primary" id="submit"  />
        <i class="fa fa-fw fa-search"></i>
    </form>
    </div>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Artist</th>
            <th>Track</th>
            <th>Album</th>
            <th>Year</th>
            <th>Detail</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php foreach ($music as $row): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name_decrypt'] ?></td>
            <td><?= $row['track'] ?></td>
            <td><?= $row['album'] ?></td>
            <td><?= $row['released'] ?></td>
            <td><a href="http://localhost/pdomvc/index.php/music/detail?id=<?= $row['id'] ?>" class="btn btn-success btn-xs"> Detail</a></td>
            <td><a href="http://localhost/pdomvc/index.php/music/edit?id=<?= $row['id'] ?>" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-edit"></span> Edit</a></td>
            <td><a href="http://localhost/pdomvc/index.php/music/delete?id=<?= $row['id']?>" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-xs"> <span class="glyphicon glyphicon-trash"></span> Delete</a></td>
        </tr>
        <?php endforeach ?>
    </table>
	</div>
    <br>
    <a href="http://localhost/pdomvc/index.php/music/create" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Add new</a>
<?php $isi = ob_get_clean() ?>

<?php include 'view/template.php' ?>