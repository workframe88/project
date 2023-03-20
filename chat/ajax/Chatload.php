<?php
session_start();
include("connect.php");

if (isset($_SESSION["chatno"])) {
  
  
  }else{
    $_SESSION["chatno"] = 10;
  }

if (isset($_POST['data1'])) {
  
$_SESSION["chatno"] = $_POST['data1'];

}else{
 
}
$chat = $_SESSION["chatno"];

$sql = "SELECT * FROM `chat` ORDER BY no DESC LIMIT $chat";
$query = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($query)) {
  $data1 = $row['Chat_ms'];
  $data2 = $row['Chat_time'];
  $data3 = $row['Chat_id'];
  $id = $_SESSION["UserID"];
  if ($row['Type'] == 'img') {
    if ($row['Chat_id'] == $id) {
?>
<div class="chat" style="text-align:right; ">
      <div class="chat-avatar">
        <a class="avatar avatar-online" data-toggle="tooltip" href="#" data-placement="right" title="" data-original-title="June Lane">
          <img onerror="this.src='img/bot.png'" src="img/<?php echo $data3; ?>1234.png" alt="...">
          <i></i>
        </a>
      </div>
      <div style="text-align:right;margin-right: 50px">
        <span class="badge rounded-pill bg-warning text-dark"><i class="fas fa-user"></i> <?php echo $row['Chat_id'] ?> / <?php echo $row['Chat_ip'] ?><a style="text-align:right;color:gray;" class="chat-time" datetime="<?php echo $data2; ?>"><?php echo $data2; ?></a></span>
        
        <span onclick="ลบ(<?php echo $row['No']; ?>)"class="badge bg-danger"><i class="fas fa-trash-alt"></i></span>
      </div>
      <div class="chat-body">
        <div class="chat-content hard_break" style="">
          <p class="hard_break" style="">
            <?php echo $data1; ?>
          </p>
        </div>
        
      </div>
    </div>
  <?php } else { ?>
    <div class="chat chat-left" style="text-align:left; ">
      <div class="chat-avatar">
        <a class="avatar avatar-online" data-toggle="tooltip" href="#" data-placement="right" title="" data-original-title="June Lane">
          <img onerror="this.src='img/bot.png'" src="img/<?php echo $data3; ?>1234.png" alt="...">
          <i></i>
        </a>
      </div>
      <div style="text-align:left;margin-left: 50px">
        <span class="badge rounded-pill bg-primary"><i class="fas fa-user"></i> <?php echo $row['Chat_id'] ?> / <?php echo $row['Chat_ip'] ?><a style="text-align:left;" class="chat-time" datetime="<?php echo $data2; ?>"><?php echo $data2; ?></a></span>
        <span onclick="replay(<?php echo $row['No']; ?>)"class="badge bg-success"><i class="fas fa-reply"></i></span>
      </div>
      <div class="chat-body">
        <div class="chat-content hard_break" style="">
          <p class="hard_break" style="">
            <?php echo $data1; ?>
          </p>

        </div>
      </div>
    </div>
<?php }
}else{
    ?>
<?php
  if ($row['Chat_id'] == $id) {
?>
    <div class="chat" style="text-align:right; ">
      <div class="chat-avatar">
        <a class="avatar avatar-online" data-toggle="tooltip" href="#" data-placement="right" title="" data-original-title="June Lane">
          <img onerror="this.src='img/bot.png'" src="img/<?php echo $data3; ?>1234.png" alt="...">
          <i></i>
        </a>
      </div>
      
      <div style="text-align:right;margin-right: 50px">
      
        <span class="badge rounded-pill bg-warning text-dark"><i class="fas fa-user"></i> <?php echo $row['Chat_id'] ?> / <?php echo $row['Chat_ip'] ?><a style="text-align:right;color:gray;" class="chat-time" datetime="<?php echo $data2; ?>"><?php echo $data2; ?></a></span>
        
        <span onclick="ลบ(<?php echo $row['No']; ?>)"class="badge bg-danger"><i class="fas fa-trash-alt"></i></span>
      </div>
      <div class="chat-body">
        <div class="chat-content hard_break" style="">
          <p class="hard_break" style="">
            <?php echo htmlspecialchars($data1, ENT_QUOTES); ?>
          </p>
        </div>
      </div>
    </div>
  <?php } else { ?>
    <div class="chat chat-left" style="text-align:left; ">
      <div class="chat-avatar">
        <a class="avatar avatar-online" data-toggle="tooltip" href="#" data-placement="right" title="" data-original-title="June Lane">
          <img onerror="this.src='img/bot.png'" src="img/<?php echo $data3; ?>1234.png" alt="...">
          <i></i>
        </a>
      </div>
      <div style="text-align:left;margin-left: 50px">
        <span class="badge rounded-pill bg-primary"><i class="fas fa-user"></i> <?php echo $row['Chat_id'] ?> / <?php echo $row['Chat_ip'] ?><a style="text-align:left;" class="chat-time" datetime="<?php echo $data2; ?>"><?php echo $data2; ?></a></span>
        <span onclick="replay(<?php echo $row['No']; ?>)"class="badge bg-success"><i class="fas fa-reply"></i></span>
      </div>
      <div class="chat-body">
        <div class="chat-content hard_break" style="">
          <p class="hard_break" style="">
            <?php echo htmlspecialchars($data1, ENT_QUOTES); ?>
          </p>
        </div>
      </div>
    </div>
<?php }
} }?>
<script>
  
</script>
