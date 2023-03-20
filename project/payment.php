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
                url: 'createQr.php',
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

        function checkPurchase(ref) {
            $.ajax({
                type: "GET",
                url: "result.json",
                data: { ref: ref },
                cache: false
            }).done(function(resp){
                if (resp.referenceNo.toString() === ref.toString()) {
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
                    
                    location.replace("wait.php")
                }
            }).catch(function(err){
                console.log(err)
            })
        }

    </script>
</body>
</html>