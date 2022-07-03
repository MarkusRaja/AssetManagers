<?php
    if(isset($_GET['asset_id'])) $asset_id=$_GET["asset_id"];
    $conn=mysqli_connect("localhost","id17582439_nft_block","Nftchain1234@","id17582439_nft");
    $idlist = mysqli_query($conn, "select asset_id, asset_name, location, timestamp, cname from assets where asset_id = '$asset_id'");
    $cek = mysqli_num_rows($idlist);
    if($cek > 0){
        while($rowlist = mysqli_fetch_array($idlist)){
        $asset_name = $rowlist['asset_name'];
        echo "<h3>Asset Name: $asset_name</h3>";
        
        $location = $rowlist['location'];
        printf('<img id = "productmenu" src="%s">', $location);
        $timestamp = $rowlist['timestamp'];
        echo "<p>Timestamp: $timestamp</p>";
        $cname = $rowlist['cname'];
        echo "<p>Made by: $cname</p>";;
        
        }
    }
    else {
        $passlog = "No More Product";
        echo $passlog;
    }
?>