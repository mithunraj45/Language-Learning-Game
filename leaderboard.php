<?php 

require("header.php");

$query=" ";

if(isset($_POST['lang'])){
    $lang=$_POST['lang'];
    $query="SELECT * FROM user_level where  lang_id=$lang and level_id=5 order by user_id";
}

?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800 font-weight-bold ml-4 mt-2">Leaderboard</h1>
                        <form class="form" action="leaderboard.php" method="POST">
                            <select name="lang"  class="d-none d-sm-inline-block btn btn-sm shadow-sm" style="background-color:white;" onchange="this.form.submit()">
                                <option>Select Any Language</option>
                                <?php 
                                        $statement=$con->prepare("SELECT * FROM lang_table ");
                                        $statement->execute();
                                        $result = $statement->fetchAll(PDO::FETCH_ASSOC); 
                                        foreach($result as $row){
                                ?>

                                    <option value="<?php echo $row['lang_id']; ?>"><?php echo $row['lang_name']; ?></option>

                                <?php } ?>
                            </select>        
                        </form>        
                    </div> 

                    <h5 class="mb-0 text-success font-weight-bol ml-4 mt-2">Note :Users who have completed all the levels of quiz respective language are being displayed</h5>

                    <div class="container-fluid" style="background:white;">
                        <div class="row mx-3 my-3 mt-2 pt-5">
                                <table class="table table-hover px-5 py-5">
                                    <thead class="bg-dark text-white">
                                        <tr>
                                            <th>Sl No</th>
                                            <th>User Name</th>
                                            <th>Accuracy</th>
                                        </tr>
                                    </thead>

                                    <?php 
                                    $i=0;
                                    if($query!=" "){
                                        $statement=$con->prepare($query);
                                        $statement->execute();
                                        $total=$statement->rowCount();
                                        if($total!=0){
                                            $result = $statement->fetchAll(PDO::FETCH_ASSOC); 
                                            foreach($result as $row){

                                                $sum=0;
                                                $max=0;

                                                $statement=$con->prepare("SELECT * FROM user_table where  user_id=? ");
                                                $statement->execute(array($row['user_id']));
                                                $result1 = $statement->fetch(PDO::FETCH_ASSOC);

                                                $statement=$con->prepare("SELECT * FROM level_table ");
                                                $statement->execute();
                                                $result2 = $statement->fetchAll(PDO::FETCH_ASSOC);
                                                foreach($result2 as $r1){
                                                    $max+=$r1['level_limit_question'];
                                                }

                                                $statement=$con->prepare("SELECT * from quiz_table WHERE user_id=? and lang_id=?");
                                                $statement->execute(array($result1['user_id'],$row['lang_id']));
                                                $res=$statement->fetchAll(PDO::FETCH_ASSOC);
                                                foreach($res as $r){
                                                    $sum+=$r['marks_got'];
                                                }

                                                $i++;
                                    ?>
                                        <tbody>
                                            <tr>
                                                <th><?php echo $i; ?></th>
                                                <th><?php echo $result1['user_name']; ?></th>
                                                <th><?php echo number_format(($sum/$max)*100,2); ?></th>
                                            </tr>
                                        </tbody>
                                    <?php }}else{?>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center font-weight-bold"colspan="3">No User has been completed the all the levels of the Quiz</td>
                                                </tr>
                                            </tbody>
                                    <?php

                                    } }else{?>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center font-weight-bold"colspan="3">Select a language</td>
                                                </tr>
                                            </tbody>
                                    <?php }?>
                                </table>
                        </div>
                            
                    </div>

                </div>


<?php 

require("footer.php");

?>