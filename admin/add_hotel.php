<?php
include "dbconnect.php";
if (!isset($_POST["submit"])) {
    $sql = "select * from  location ";
    $res=$con->query($sql);

    ?>
    <form action="admin/add_hotel.php" method="post">
        Hotel name : <input type="text" name="hname" /><br>
        Location: <select name="lname"> 
                                <?php
                                    while($row=$res->fetch_assoc()){
                                        ?>
                                        <option value="<?php echo$row['loc_name']?>"><?php  echo $row['loc_name'] ?></option>
                                        <?php
                                    }
                                    ?>
                                    </select><br>
                                
        Location (lat and long): <input type="text" name="lat" /><br>
        Rating(1-5): <input type="text" name="rate" class="hover:border-brand outline-none opacity-90 border-0 text-xl md:text-2xl px-10 py-3 md:px-16 md:py-4 placeholder:opacity-70 text-center placeholder:font-poppy bg-off-brand placeholder-color font-poppy hover:placeholder:-translate-y-20 placeholder:duration-[0.5s]"/><br>
        link (zomato link): <input type="text" name="link" /><br>
        description: <input type="text" name="disc" /><br>
        <input type="submit" name="submit" value="Add">
    </form>
    <?php
} else {
    $hname = $_POST["hname"];
    $lname = $_POST["lname"];
    $lat = $_POST["lat"];
    $rate=$_POST["rate"];
    $link=$_POST["link"];
    $desc=$_POST["disc"];
    $sql = "INSERT INTO `hotel` (`hotel_id`, `hotel_name`, `hotel_loc`, `loc_name`,`ratings`,`links`,`disc`) VALUES (NULL, '$hname', '$lat', '$lname','$rate','$link','desc')";
    $res = $con->query($sql);
    if ($res) {
        echo "<script>alert('Hotel $hname added successfully.')</script>";
        echo "<script>window.location.href='admin.php'</script>";
    }
}
?>