<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Payment API Master Class</title>
</head>
<body>
    
    <form id="formOrder"> 
        <label for="name">ชื่อ</label>
        <input type="text" name="name" placeholder="ชื่อ" value="AppzStory" required>
        <label for="price">ราคา</label>
        <input type="number" name="price" placeholder="ราคา" value="1.01" required>
        <button type="submit">ชำระเงินด้วย QR CODE</button>
    </form>

    <div id="scan">
        <p> กรุณาแสกน QR Code เพื่อชำระเงิน </p>
        <img id="img" alt="" width="300px">
    </div>

    <div id="success">
        <p> ชำระเงินเสร็จเรียบร้อย </p>
        <ul id="list"></ul>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $("#success").hide()
        $("#scan").hide()
        let refreshIntervalId;

        $('#formOrder').on('submit', function (e) {
            e.preventDefault()
            $.ajax({
                type: 'POST',
                url: 'create.php',
                data: $(this).serialize()
            }).done(function(resp){ 
                $("#formOrder").hide()
                $("#scan").show()
                $("#img").attr('src', 'uploads/'+ resp.referenceNo + '.png')
                refreshIntervalId = setInterval(() => {
                    checkPurchase(resp.referenceNo)
                }, 3000);
            }).fail(function(jqXHR, textStatus, errorThrown){ 
                console.log('error')
            })
        })

        /** Function ตรวจสอบการชำระเงินของลูกค้าอัตโนมัติ */
    function checkPurchase() {
        $.ajax({
            type: "GET",
            url: "service/api/payment/checkpurchase.php",
            data: { ref: ref }
        }).done(function(data, textStatus, jqXHR){
            /**
             * status 200 ชำระเงินเข้ามาแล้ว
             * status 204 รอการชำระเงิน
             */
            if (jqXHR.status === 200) {
                clearInterval(refreshIntervalId)
                location.assign('./purchased.html?ref=' + btoa(data.response.referenceNo))
            }
        }).fail(function(){
            /** แสดงส่วนของข้อผิดพลาด */
            Swal.fire({ 
                text: "ระบบแสดงข้อผิดพลาด โปรดเริ่มต้นใหม่", 
                icon: 'error', 
                confirmButtonText: 'ตกลง', 
            }).then(function() {
                location.assign('./')
            }) 
        })
    }

    </script>
</body>
</html>