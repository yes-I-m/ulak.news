<?php
include("../funcs.php");

if(isset($_GET['process']) && isset($_GET['agency']) && isset($_GET['id'])){
    if($_GET['process']==="getComments"){
            $agency=$_GET['agency'];
            $id=$_GET['id'];
            $comments=getComments($agency, $id);
            foreach($comments as $raw){
        ?>
                                            <li class="media">
                                                <div class="commenter-avatar">
                                                    <img class="img-fluid img-circle" src="images/others/user.png" alt="<?php echo $raw['name']; ?>">
                                                </div>
                                                <div class="media-body">
                                                    <h2><?php echo $raw['name']; ?> <span><?php echo $raw['date']; ?></span></h2>
                                                    <p><?php echo $raw['text']; ?></p>
                                                </div>
                                            </li>
        <?php
            }
            if(count($comments)<1){
                echo "Hiç yorum yapılmamış. İlk bu habere yorum yapan siz olun!";
            }   
    }elseif($_GET['process']==="addComment"){
        header("Content-type: application/json; charset=utf-8");
        echo json_encode(
            array(
                "status"=>addComment($_GET['agency'], $_GET['id'], $_POST['name'], $_POST['message'])
                )
        );
    }
}else{
    echo "İşlem yok";
}
?>