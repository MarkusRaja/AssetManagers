<?php
    if(isset($_GET['susername'])) $susername=$_GET["susername"];
    if(isset($_GET['spassword'])) $spassword=$_GET["spassword"];
    $conn=mysqli_connect("localhost","id17582439_nft_block","Nftchain1234@","id17582439_nft");
    $idlist = mysqli_query($conn, "select asset_id, asset_name, location, timestamp from assets where cname = '$susername' and cpass = '$spassword'");
    $cek = mysqli_num_rows($idlist);
    if($cek > 0){
        while($rowlist = mysqli_fetch_array($idlist)){
        $asset_name = $rowlist['asset_name'];
        echo "<h3>Asset Name: $asset_name</h3>";
        
        $location = $rowlist['location'];
        printf('<img id = "asset_img" src="%s">', $location);
        $timestamp = $rowlist['timestamp'];
        echo "<p>Timestamp: $timestamp</p>";
        $asset_id = $rowlist['asset_id'];
        echo "<h3>Asset ID: $asset_id</h3><br>";
        
        }
    }
    else {
        $passlog = "No More Product";
        echo $passlog;
    }
?>