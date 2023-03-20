<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </head>
  <body>
    <form method="post" action="savepoll.php">
      <table align="center" width="50%" border="1">
        <tr> <td><h1>คุณชอบสีอะไรมากที่สุด</h1></td> </tr>
        <tr> <td><input type="radio" name="choice" value="1">1.สีเหลือง</td> </tr>
        <tr> <td><input type="radio" name="choice" value="2">2.สีแดง</td> </tr>
        <tr> <td><input type="radio" name="choice" value="3">3.สีเขียว</td> </tr>
        <tr> <td><input type="radio" name="choice" value="4">4.สีฟ้า</td> </tr>
        <tr> <td><input type="radio" name="choice" value="5" checked>5.ไม่ต้องการเลือก</td> </tr>
        <tr> <td align="center"><input type="submit" value="ส่งคำตอบ"></td> </tr>
      </table>
    </form>
  </body>
</html>