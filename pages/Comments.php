<h2>Comments</h2>
<hr>
<?php
$msq = connect();
if (isset($_POST['selcountry']))
{

    $id= $_POST['countryid'];
    var_dump($id);
    $ins = "INSERT INTO messages (id_hotel, message) VALUES ('{$id}','{$_POST['message']}')";
    var_dump($ins);
    $res = mysqli_query($msq, $ins);
    unset($_POST['selcountry']);

}
echo '<form action="index.php?page=2" method="post">';
$res = mysqli_query($msq, "SELECT * FROM hotels ORDER BY hotel");

echo '<select name="countryid" class="col-sm-3 col-md-3 col-lg-3">';



echo '<option value="0">Select hotel...</option>';
while ($row = mysqli_fetch_array($res, MYSQLI_NUM)) {

    echo '<option value="' . $row[0] . '">' . $row[1] . '</option>';
}
?>
<div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
    <textarea name="message" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>
<?php
echo '<input type="submit" name="selcountry" value="Select Country"
	class="btn btn-xs btn-primary">';
echo '</select>';
echo '</form>';
$res = mysqli_query($msq, "SELECT * FROM messages limit 5");
//var_dump(mysqli_fetch_array($res, MYSQLI_NUM));
?>

<?php while ($row = mysqli_fetch_array($res, MYSQLI_NUM)):?>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><?=$row[2]?></h5>
            <p class="card-text"><?=$row[3]?></p>
            <p class="card-text"></p>
        </div>
    </div>

<?php endwhile;?>


