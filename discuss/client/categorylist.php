
<?php

include("./common/db.php");

$query = "SELECT * FROM category";

$result = $conn->query($query);

?>

<div class="category-list">

    <?php

    foreach($result as $row){

        $name = ucfirst($row['name']);
        $id = $row['id'];

        echo "
        <a href='?c-id=$id' class='category-item'>

            <span class='category-name'>
                $name
            </span>

            <span class='category-arrow'>
                →
            </span>

        </a>";
    }

    ?>

</div>



