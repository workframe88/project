<?php
header("Refresh: 61; URL=index.php");
$num = $_POST['num'];
$powder="";
	if($num == 0){
		$powder = "ไม่รับผง";
	}
	else if($num == 1){
		$powder = "ชีส";
	}
	else if($num == 2){
		$powder = "บาร์บีคิว";
	}
	else if($num == 3){
		$powder = "ปาปริก้า";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Order</title>
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Mali:wght@200&family=Mochiy+Pop+One&family=Prompt:wght@300&display=swap" rel="stylesheet">
<style> @import url('https://fonts.googleapis.com/css2?family=Mali:wght@200&family=Mochiy+Pop+One&family=Prompt:wght@300&display=swap'); </style>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body style="background-color: #ADFF2F">
	<br><br>
	<center><h1 style="font-size: 60px;font-family: 'Mali', cursive;
font-family: 'Mochiy Pop One', sans-serif;
font-family: 'Prompt', sans-serif;">รายการของคุณ</h1><br>

<table border="0" id="scan1">
	<tr>
		<td>
			<img src="https://cdn-icons-png.flaticon.com/512/1046/1046786.png" width="200px">
		</td>
		<td>
			<table border="0">
			<tr>
				<td align="right"><h2>รายการ : </h2></td>
				<td><h2>&nbsp;เฟรนช์ฟรายส์</h2></td>
			</tr>
			<tr>
				<td align="right"><h2>รสชาติ : </h2></td>
				<td><h2>&nbsp;<?php echo $powder; ?></h2>
						<input type="text" name="num" value="<?php echo $num ;?>" id="num" hidden="true">
				</td>
			</tr>
			<tr>
				<td align="right"><h2>ราคา : </h2></td>
				<td><h2>&nbsp;39 บาท</h2></td>
			</tr>
			</table>
		</td>
	</tr>
</table>
<div id="scan">
	<p> <b>แสกน QR Code เพื่อชำระเงิน </b></p>
	        	<img id="img" alt="" width="280px">
</div>
<br>
<p>กรุณาชำระเงินภายใน&nbsp;<h3 id="result">60</h3>&nbsp;วินาที</p>


<a href="menu.php" class="btn btn-danger" >ยกเลิก</a>
<br><br>
<div id="scan">
	        <img id="img" alt="" width="200px">
	    </div>

	    <div id="success">
	        <p> ชำระเงินเสร็จเรียบร้อย </p>
	        <ul id="list"></ul>
	    </div>

<form id="formOrder"> 
        <input type="text" name="name" placeholder="ชื่อ" value="kowit" required hidden>
        <input type="number" name="price" placeholder="ราคา" value="1" required hidden>
        <button type="submit" class="btn btn-primary">ชำระเงินด้วย QR CODE</button>
    </form>

    
</center>
</body>
<script>
    let c = 59;
    var counter = setInterval(() => {
        document.getElementById("result").innerHTML = c;
        c--;
        if( c == -1 ) {
            clearInterval( counter );
            //document.getElementById("result").innerHTML = "Finish";
        }
    }, 1000);
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
    	var num = document.getElementById("num").value;
        $("#success").hide()
        $("#scan").hide()
        let refreshIntervalId;

        $('#formOrder').on('submit', function (e) {
            e.preventDefault()
            $.ajax({
                type: 'POST',
                url: 'createQr.php',
                data: $(this).serialize()
            }).done(function(resp){ 
                $("#formOrder").hide()
                $("#scan").show()
                $("#scan1").hide()
                $("#img").attr('src', 'uploads/'+ resp.referenceNo + '.png')
                refreshIntervalId = setInterval(() => {
                    checkPurchase(resp.referenceNo)
                }, 3000);
            }).fail(function(jqXHR, textStatus, errorThrown){ 
                console.log('error')
            })
        })

        function checkPurchase(ref) {
            $.ajax({
                type: "GET",
                url: "result.json",
                data: { ref: ref },
                cache: false
            }).done(function(resp){
                if (resp.referenceNo.toString() === ref.toString()) {
                	
                	window.location.href = "esp32.php";
                	//window.location.href = "wait.php?num=" + num;
                	/*
                    clearInterval(refreshIntervalId)
                    $("#scan").hide()
                    $("#success").show()
                    const tt = resp.time.match(/.{1,2}/g)
                    const td = resp.date
                    const transfer_time = `${tt[0]}:${tt[1]}`
                    const transfer_date = `${td.substring(0, 2)}-${td.substring(2, 4)}-${td.substring(4, 8)}`
                    $('#list').append(`
                        <li>ชื่อ: ${resp.detail}</li>
                        <li>ราคาทั้งหมด: ${resp.totalAmount}</li>
                        <li>วันที่: ${transfer_date}</li>
                        <li>เวลา: ${transfer_time}</li>
                        <li>referenceNo: ${resp.referenceNo}</li>
                        <li>gbpReferenceNo: ${resp.gbpReferenceNo}</li>
                    `)
                    */
                    
                }
            }).catch(function(err){
                console.log(err)
            })
        }

    </script>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</html>