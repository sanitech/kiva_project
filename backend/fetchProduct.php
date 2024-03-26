<?php

require('../config/connection.php');

$connect = new dbConnect();

$db = $connect->dbConnection();

$key = $_POST['key'];
$status = $_POST['status'];
$key = "%$key%";

if ($status == "items") {
    $stm = $db->prepare("SELECT * FROM product WHERE  item LIKE :key ");
} else {

    $stm = $db->prepare("SELECT * FROM product WHERE product LIKE :key OR location LIKE :key OR model LIKE :key OR item LIKE :key OR price LIKE :key OR dep LIKE :key");
}

$stm->bindValue(':key', $key, PDO::PARAM_STR);
$stm->execute();
foreach ($stm->fetchAll() as $row) {
    $pimage = $row['p_image'];

?>
    <tr>
        <td><?php echo $row['item'] ?></td>
        <td><?php echo $row['model'] ?></td>
        <td><?php echo $row['sn'] ?></td>
        <td><?php echo $row['product'] ?></td>
        <td><?php echo $row['dep'] ?></td>
        <td><?php echo $row['price'] ?></td>
        <td><?php echo $row['employee'] ?></td>
        <td><?php echo $row['location'] ?></td>
        <td><?php echo $row['date'] ?></td>
        <td><?php echo $row['status'] ?></td>
        <td>
            <button type="button" class="btn btn-danger cause" style="display: <?php echo $users['cause'] === '' ? 'block' : 'none' ?> ;" data-bs-toggle="modal" data-bs-target="#basicModal" onclick="viewProductImage('<?php echo $pimage ?>')" style="background: transparent;">
                <img src="<?php echo $row['p_image'] ?>" alt="Product Image" style="max-width: 100px; max-height: 100px;">
            </button>
        </td>
        <td><a href="editProduct.php?sn=<?php echo $row['sn'] ?>">
                <label class="badge badge-warning pointer"><i class="mdi mdi-pen"></i></label></a>
            <a href="../backend/removeProduct.php?sn=<?php echo $row['sn'] ?>">
                <label class="badge badge-danger pointer"><i class="mdi mdi-delete-forever"></i></label></a>
        </td>

    </tr>
<?php  }
