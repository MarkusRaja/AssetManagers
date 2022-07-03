<?php
  $asset_id = "";
        $conn=mysqli_connect("localhost","id17582439_nft_block","Nftchain1234@","id17582439_nft");
        $idlist = mysqli_query($conn, "select id, asset_id from assets where id = (SELECT MAX(id) FROM assets)");
        while($rowlist = mysqli_fetch_array($idlist)){
        $previd = $rowlist['id'];
        $prevasset_id = $rowlist['asset_id'];
        $t=time();
        $nextid = $previd; 
        echo $t."<br>";
        $asset_id = hash('sha256', $nextid.$prevasset_id."genesis".$t)."<br>";
        }
        echo $asset_id;
?>