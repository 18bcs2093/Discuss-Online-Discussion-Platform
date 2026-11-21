<select class="form-control" name="category" id="category" required>
    <option value="">Select A Category</option>
    <?php
        include("./common/db.php");
        $query="Select * from category";
        $result=$conn->query($query); 
        foreach($result as $row){
            $name=ucfirst($row['name']);
            $id=$row['id'];
            echo "<option value='$id'>$name</option>";
        }    
    ?>
</select>