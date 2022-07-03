<?php
    $response = 0;
    if(isset($_POST['addpusername'])) $addpusername=$_POST["addpusername"];
    $previd = "";
    $t = "";
    if(isset($_FILES['asset']['name'])) {
        $filename = $_FILES['asset']['name'];
        $asset_id = "";
        $conn=mysqli_connect("localhost","id17582439_nft_block","Nftchain1234@","id17582439_nft");
        $idlist = mysqli_query($conn, "select id, asset_id from assets where id = (SELECT MAX(id) FROM assets)");
        while($rowlist = mysqli_fetch_array($idlist)){
        $previd = $rowlist['id'];
        $prevasset_id = $rowlist['asset_id'];
        $t=time();
        $nextid = $previd+1; 
        $asset_id = hash('sha256', $nextid.$addpusername.$filename.$prevasset_id.$t);
        }
       
       $parser = explode(".",$filename);
       $lgn = count($parser);
       $format = $parser[$lgn-1];
       $shaname = $asset_id.".".$format;
       $location = 'assets/'.$shaname;
       if(move_uploaded_file($_FILES['asset']['tmp_name'],$location)) {
            
            if(isset($_POST['addppassword'])) $addppassword=$_POST["addppassword"];
            if(isset($_POST['asset_name'])) $asset_name=$_POST["asset_name"];
            $addS = mysqli_query($conn, "INSERT INTO assets (asset_id, cname, cpass, asset_name, location, timestamp) VALUES ('$asset_id',  '$addpusername', '$addppassword', '$asset_name', '$location', '$t')");
            echo "Your Asset has been added by Asset ID: ".$asset_id."<br>You can use this Token to sell or share this asset";
             $response = 1;
       } 
    }
    echo "File upload status: ".$response;
    
    
    
?>