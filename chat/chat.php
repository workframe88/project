<?php
session_start();
include("ajax/connect.php");
//check session

//ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 

?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="css/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="css/sweetalert2@10"></script>
<script src="css/bootstrap.min.js"></script>
<script src="css/polyfill.js"></script>
<script src="css/popper.min.js"></script>
<script src="css/jquery-3.6.0.min.js"></script>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/w3.css" rel="stylesheet">
<link href="css/font/css/all.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.min.css" />
<script type="text/javascript" src="css/jquery.fancybox.min.js"></script>

<body style="background:#448861; font-family:myFirstFont;">
<br>
<div class="container">

<div class="row" style="background:white;margin-left:auto;margin-right:auto;text-align:center;">
<div class="card card-container" style="margin-bottom:10px;">
<img style="width:10%; margin-left:auto;margin-right:auto;"id="profile-img" onerror="this.src='img/1.png'" class="profile-img-card" src="img/<?php echo $_SESSION["UserID"];?>1234.png" />
ยินดีต้อนรับ <span class="badge bg-danger"><?php echo $_SESSION["UserID"];?></span>
</div>
<a href="index.php" style=""type="button" class="btn btn-primary">Logout</a>
</div>
</div>
    <style>
        *{
            scrollbar-width: thin;
            scrollbar-color: #666666e3 #FFF;
        }

        /* Works on Chrome, Edge, and Safari */
        *::-webkit-scrollbar {
            width: 12px;

        }

        *::-webkit-scrollbar-track {
            background: #FFFFFF;
        }

        *::-webkit-scrollbar-thumb {
            background-color: blue;
            border-radius: 20px;
            border: 3px solid #FFFFFF;
        }

        @font-face {
            font-family: myFirstFont;
            src: url(css/Kanit-Light.woff);
        }

        .chat-box {
            height: 100%;
            width: 100%;
            background-color: #fff;
            overflow: hidden
        }

        .chats {
            padding: 30px 15px
        }

        .chat-avatar {
            float: right
        }

        .chat-avatar .avatar {
            width: 30px -webkit-box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.2), 0 6px 10px 0 rgba(0, 0, 0, 0.3);
            box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.2), 0 6px 10px 0 rgba(0, 0, 0, 0.3);
        }

        .chat-body {
            display: block;
            margin: 10px 30px 0 0;
            overflow: hidden
        }

        .chat-body:first-child {
            margin-top: 0
        }

        .chat-content {
            position: relative;
            display: block;
            float: right;
            padding: 8px 15px;
            margin: 0 20px 10px 0;
            clear: both;
            color: #fff;
            background-color: #62a8ea;
            border-radius: 4px;
            -webkit-box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.37);
            box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.37);
        }

        .chat-content:before {
            position: absolute;
            top: 10px;
            right: -10px;
            width: 0;
            height: 0;
            content: '';
            border: 5px solid transparent;
            border-left-color: #62a8ea
        }

        .chat-content>p:last-child {
            margin-bottom: 0
        }

        .chat-content+.chat-content:before {
            border-color: transparent
        }

        .chat-time {
            display: block;
            margin-top: 8px;
            color: rgba(255, 255, 255, .6)
        }

        .chat-left .chat-avatar {
            float: left
        }

        .chat-left .chat-body {
            margin-right: 0;
            margin-left: 30px
        }

        .chat-left .chat-content {
            float: left;
            margin: 0 0 10px 20px;
            color: #76838f;
            background-color: #dfe9ef
        }

        .chat-left .chat-content:before {
            right: auto;
            left: -10px;
            border-right-color: #dfe9ef;
            border-left-color: transparent
        }

        .chat-left .chat-content+.chat-content:before {
            border-color: transparent
        }

        .chat-left .chat-time {
            color: #a3afb7
        }

        .panel-footer {
            padding: 0 30px 15px;
            background-color: transparent;
            border-top: 1px solid transparent;
            border-bottom-right-radius: 3px;
            border-bottom-left-radius: 3px;
        }

        .avatar img {
            width: 100%;
            max-width: 100%;
            height: auto;
            border: 0 none;
            border-radius: 1000px;
        }

        .chat-avatar .avatar {
            width: 30px;
        }

        .avatar {
            position: relative;
            display: inline-block;
            width: 40px;
            white-space: nowrap;
            border-radius: 1000px;
            vertical-align: bottom;
        }
    </style>
    <div id="countmsdiv">
        <?php
        $sql = "SELECT * FROM `chat` ";
        $result = mysqli_query($con, $sql);
        ?>
        <div style="display:none" id="chatcount"><?php echo mysqli_num_rows($result); ?></div>
    </div>


    <?php
    $sql = "SELECT * FROM `chat` ";
    $result = mysqli_query($con, $sql);
    ?>
    <div style="display:none" id="chatcount2"><?php echo mysqli_num_rows($result); ?></div>
    <div style="display:none" id="chatcount3">10</div>
    <div style="display:none;" id="chatcount4"></div>


    <div id="chatopen" class="" style="right:0%; position: fixed; bottom:10%; overflow:auto; ">
        <a onclick="openchat()"><i style="font-size:40px;" class="fas fa-comments "></i><span id="countms" class="badge bg-danger">0</span></a>
    </div>

    <div id="chatview" class="w3-animate-opacity container bootstrap snippets bootdeys" style="z-index:9999;display: none;scrollbar-color: #666666e3 #FFFFFF96;overflow: hidden;right:5%;background:#5a94a0;  width:30%; height:50%; position: fixed; top:40%; overflow:auto; margin-right: 10px;">

        <div class="col-md-7 col-xs-12 col-md-offset-2" style="width:100%; ">
            <!-- Panel Chat -->

            <div class="panel">
                <div class="panel-heading">

                </div>
            </div>
            <div class="panel-body">
                <div id="chat" class="chats" style="padding-bottom: 0px;padding-top: 10px;">

                </div>
            </div>
        </div>
        <div style="margin-left:auto;margin-right:auto;text-align:center;">
        <hr style="margin-top: 0px;margin-bottom: 0px;">
        <span id="chatload1" class="badge bg-primary" onclick="loadchat()">คลิกที่นี้เพื่อโหลดข้อความเพิ่มเติม</span>
        <hr style="margin-top: 5px;margin-bottom: 0px;">
        </div>
        <div class="panel-footer" style="padding-bottom: 0px; ">

            <form id="chat1">
                <div class="input-group" style="position: fixed; top:90%; width:30%; right:5%;  margin-right: 10px;">

                    <input id="ข้อความ" type="text" autocomplete="off" class="form-control" placeholder="พูดอะไรบ้างสิ.." autofocus>
                    <div id="ข้อความ2" style="display:none;"></div>
                    <span class="input-group-btn">
                        <button style="" id="ส่งข้อความ" class="btn btn-primary" type="submit">ส่ง</button>
                    </span>
                    <span class="input-group-btn" Style="margin-left: 5px;">
                        <a data-bs-toggle="modal" data-bs-target="#exampleModal01" class="btn btn-secondary"><i class="fas fa-image"></i></a>
                    </span>



                    <span class="input-group-btn" Style="margin-left: 5px; display:none;">
                        <a class="btn btn-dark"><i class="fas fa-user"></i> <?php echo $_SESSION["UserID"]; ?></a>
                    </span>
                    <span class="input-group-btn" Style="margin-left: 5px;">
                        <a onclick="chatclose()" class="btn btn-danger"><i class="fas fa-window-close"></i> ปิด</a>
                    </span>

                </div>
        </div>
        </form>

        <form id="chat2" style="display:none;">
            <div class="input-group" style="position: fixed; top:90%; width:30%; right:5%;  margin-right: 10px;">
                <div id="hover1" style="display:none;width:20%;"><a onclick="return false;" style="text-align:center;background-color: #1f5278b5;color:white;" class="form-control">ตอบกลับ</a></div>
                <div id="hover2" style="display:none;width:20%;"><a onclick="replayout();return false;" style="text-align:center;background-color: #e22559;color:white;" class="form-control">ยกเลิก</a></div>
                <input id="ข้อความ0" type="text" autocomplete="off" class="form-control" placeholder="กำลังตอบกลับ.." autofocus>
                <div id="ข้อความ02" style="display:none;"></div>
                <span class="input-group-btn">
                    <button style="" id="ส่งข้อความ0" class="btn btn-primary" type="submit">ตอบกลับ</button>
                </span>
                <span class="input-group-btn" Style="margin-left: 5px;">
                    <a data-bs-toggle="modal" data-bs-target="#exampleModal01" class="btn btn-secondary"><i class="fas fa-image"></i></a>
                </span>

                <span class="input-group-btn" Style="margin-left: 5px; display:none;">
                    <a class="btn btn-dark"><i class="fas fa-user"></i> <?php echo $_SESSION["UserID"]; ?></a>
                </span>
                <span class="input-group-btn" Style="margin-left: 5px;">
                    <a onclick="chatclose()" class="btn btn-danger"><i class="fas fa-window-close"></i> ปิด</a>
                </span>
            </div>
    </div>
    </form>

    </div>
    </div>
    </div>
    </div>
    <div style="color:black;" class="modal fade" id="exampleModal01" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="color:#007bff;" class="modal-title" id="exampleModalLabel">กรุณาเลือกรูปภาพ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <input class="form-control form-control-sm" type="file" id="file" name="file" />


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                    <input type="button" class="btn btn-primary" value="ส่งรูปภาพ" id="but_upload2">
                    <input style="display:none;" type="button" class="btn btn-primary" value="ส่งรูปภาพ" id="but_upload">
                </div>
            </div>
        </div>
    </div>
    <script>
        function loadchat() {
            var data1 = $('#chatcount3').text() * 2;
            $('#chatload1').html('<img src="img/load.gif" alt="กำลังอัพเดทให้จ้า" width="25" height="25"> กำลังโหลดข้อความให้จ้า รอสักครู่นะ');
            $.ajax({
                type: "POST",
                url: 'ajax/Chatload.php',
                data: {
                    data1: data1
                },
                success: function(data) {
                    $('#chatcount3').text(data1)
                    loadXMLDoc()
                    $('#chatload1').html('คลิกที่นี้เพื่อโหลดข้อความเพิ่มเติม');

                }
            })
        }


        $("#but_upload").click(function() {
            var data = $('#ข้อความ0').val();
            var data2 = $('#chatcount4').text();
            $.ajax({
                type: "POST",
                url: 'Chatmsg.php',
                data: {
                    data: data,
                    data2: data2
                },
                success: function(response) {
                    var fd = new FormData();
                    var files = $('#file')[0].files;
                    if (files.length > 0) {
                        fd.append('file', files[0]);
                        swal.fire({
                            title: 'กำลังอัพโหลดจ้า',
                            allowEscapeKey: false,
                            allowOutsideClick: false,
                            onOpen: () => {
                                swal.showLoading();
                            }
                        })
                        $.ajax({
                            url: 'ajax/upload3.php',
                            type: 'post',
                            data: fd,
                            contentType: false,
                            processData: false,
                            success: function(response) {
                                if (response != 0) {
                                    $('#ข้อความ0').val('')
                                    $('#chatcount4').text('');
                                    var data1 = $('#chatcount4').text();

                                    $('#chat1').css({
                                        "display": ""
                                    })
                                    $('#chat2').css({
                                        "display": "none"
                                    })
                                    $('#but_upload').css({
                                    "display": "none"
                                })
                                $('#but_upload2').css({
                                    "display": ""
                                })
                                    /* $('.preview img').show();*/
                                    swal.fire({
                                        title: "อัพโหลดภาพแล้ว",
                                        icon: "success",
                                        // imageUrl:response,
                                        imageWidth: 100,
                                        imageHeight: 100,
                                        // text:'รูปภาพเดิม',
                                    }).then(function(isConfirm) {
                                        $("#exampleModal01").modal('hide');
                                        $('#file').val('');
                                        loadXMLDoc();
                                        //$("#img").attr("src",response);
                                        //$("#img2").attr("src",response);
                                    })

                                } else {
                                    swal.fire({
                                        icon: 'error',
                                        title: 'ผิดพลาด',
                                        text: 'ต้องเป็นไฟล์รูปเท่านั้น',
                                    })

                                }
                            }
                        })
                    } else {
                        swal.fire({
                            icon: 'error',
                            title: 'ผิดพลาด',
                            text: 'กรุณาเลือกไฟล์',
                        })
                    }
                }
            })

        });

        $("#but_upload2").click(function() {
            var data = $('#ข้อความ').val();
            var data2 = $('#chatcount4').text();
            $.ajax({
                type: "POST",
                url: 'Chatmsg.php',
                data: {
                    data: data,
                    data2: data2
                },
                success: function(response) {
                    var fd = new FormData();
                    var files = $('#file')[0].files;
                    if (files.length > 0) {
                        fd.append('file', files[0]);
                        swal.fire({
                            title: 'กำลังอัพโหลดจ้า',
                            allowEscapeKey: false,
                            allowOutsideClick: false,
                            onOpen: () => {
                                swal.showLoading();
                            }
                        })
                        $.ajax({
                            url: 'ajax/upload2.php',
                            type: 'post',
                            data: fd,
                            contentType: false,
                            processData: false,
                            success: function(response) {
                                if (response != 0) {
                                    $('#ข้อความ').val('');
                                    $('#chat1').css({
                                        "display": ""
                                    })
                                    $('#chat2').css({
                                        "display": "none"
                                    })
                                    /* $('.preview img').show();*/
                                    swal.fire({
                                        title: "อัพโหลดภาพแล้ว",
                                        icon: "success",
                                        // imageUrl:response,
                                        imageWidth: 100,
                                        imageHeight: 100,
                                        // text:'รูปภาพเดิม',
                                    }).then(function(isConfirm) {
                                        $("#exampleModal01").modal('hide');
                                        $('#file').val('');
                                        loadXMLDoc();
                                        //$("#img").attr("src",response);
                                        //$("#img2").attr("src",response);
                                    })

                                } else {
                                    swal.fire({
                                        icon: 'error',
                                        title: 'ผิดพลาด',
                                        text: 'ต้องเป็นไฟล์รูปเท่านั้น',
                                    })

                                }
                            }
                        })
                    } else {
                        swal.fire({
                            icon: 'error',
                            title: 'ผิดพลาด',
                            text: 'กรุณาเลือกไฟล์',
                        })
                    }
                }
            })

        });
        $('#ส่งข้อความ').on("click", function(e) {
            e.preventDefault();

            if ($('#ข้อความ').val() == '') {

            } else {
                // "chat chat-left"
                $('#ข้อความ').css({
                    "display": "none"
                })
                $('#ข้อความ2').css({
                    "display": ""
                })
                $('#ข้อความ2').html('<a onclick="return false;" class="form-control" ><img src="img/load.gif" alt="กำลังอัพเดทให้จ้า" width="25" height="25"> กำลังส่งข้อความให้จ้า รอสักครู่นะ</a>')
                var data = $('#ข้อความ').val();
                $.ajax({
                    type: "POST",
                    url: 'ajax/inchat.php',
                    data: {
                        data: data
                    },
                    success: function(data) {
                        $('#ข้อความ2').html('<a onclick="return false;" class="form-control" ><img src="img/load.gif" alt="กำลังอัพเดทให้จ้า" width="25" height="25"><i class="fas fa-check"></i> ส่งข้อความสำเร็จแล้วจ้า</a>')
                        loadXMLDoc()
                        $('#ข้อความ').css({
                            "display": ""
                        })
                        $('#ข้อความ2').css({
                            "display": "none"
                        })
                        $('#ข้อความ').val('')

                    }
                })


            }
        })

        $('#ส่งข้อความ0').on("click", function(e) {
            e.preventDefault();
            if ($('#ข้อความ0').val() == '') {} else {
                // "chat chat-left"
                $('#ข้อความ0').css({
                    "display": "none"
                })
                $('#ข้อความ02').css({
                    "display": ""
                })
                $('#ข้อความ02').html('<a onclick="return false;" class="form-control" ><img src="img/load.gif" alt="กำลังอัพเดทให้จ้า" width="25" height="25"> โหลด..</a>')
                var data = $('#ข้อความ0').val();
                var data2 = $('#chatcount4').text();
                $.ajax({
                    type: "POST",
                    url: 'ajax/inchatreplay.php',
                    data: {
                        data: data,
                        data2: data2
                    },
                    success: function(data) {

                        $('#ข้อความ02').html('<a onclick="return false;" class="form-control" ><img src="img/load.gif" alt="กำลังอัพเดทให้จ้า" width="25" height="25"><i class="fas fa-check"></i> ส่งข้อความสำเร็จแล้วจ้า</a>')
                        loadXMLDoc()
                        $('#ข้อความ0').css({
                            "display": ""
                        })
                        $('#ข้อความ02').css({
                            "display": "none"
                        })
                        $('#ข้อความ0').val('')
                        $('#chatcount4').text('');
                        var data1 = $('#chatcount4').text();

                        $('#chat1').css({
                            "display": ""
                        })
                        $('#chat2').css({
                            "display": "none"
                        })

                    }
                })


            }
        })



        function loadXMLDoc() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("chat").innerHTML =
                        this.responseText;
                }
            };
            xhttp.open("GET", "ajax/Chatload.php", true);
            xhttp.send();
        }
        setInterval(function() {

            $('#countmsdiv').load('chat.php #countmsdiv', function() {
                $('#countms').text($('#chatcount').text() - $('#chatcount2').text())
            })
            if ($('#chatcount').text() == $('#chatcount2').text()) {

            } else {

                loadXMLDoc();
            }

        }, 1000)
        loadXMLDoc()



        function chatclose() {
            $('#chatcount3').text(10)
            $('#chatcount2').text($('#chatcount').text())

            $('#chatview').css({
                "display": "none"
            })
            $('#chatopen').css({
                "display": ""
            })

            var data1 = 10;
            $.ajax({
                type: "POST",
                url: 'ajax/Chatload.php',
                data: {
                    data1: data1
                },
                success: function(data) {

                    loadXMLDoc()


                }
            })
        }

        function openchat() {

            $('#chatcount2').text($('#chatcount').text())

            $('#chatview').css({
                "display": ""
            })
            $('#chatopen').css({
                "display": "none"
            })
            /*document.getElementById("chatview").scrollTo(0, 0)*/
        }

        function ลบ(data) {
            var data = data;
            Swal.fire({
                title: 'ลบข้อมูล',
                text: "ข้อมูลนี้จะถูกลบอย่างถาวร และ ไม่สามารถกู้คืนได้",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: "ยกเลิก",
                confirmButtonText: 'ลบข้อมูล'
            }).then((result) => {
                if (result.isConfirmed) {
                    swal.fire({
                        title: 'กำลังดำเนินการ',
                        allowEscapeKey: false,
                        allowOutsideClick: false,
                        onOpen: () => {
                            swal.showLoading();
                        }
                    })
                    $.ajax({
                        type: "POST",
                        url: 'ajax/chatde.php',
                        data: {
                            data: data
                        },
                        success: function(data) {
                            swal.fire({
                                title: 'ลบข้อมูลนี้ออกแล้ว',
                                icon: "success",
                            })

                            loadXMLDoc();
                        }
                    })
                }
            })

        }

        function replay(data) {
            $('#chatcount4').text(data);
            var data1 = $('#chatcount4').text();

            if (data1 > 0) {
                $('#chat2').css({
                    "display": ""
                })
                $('#chat1').css({
                    "display": "none"
                })
                $('#but_upload').css({
                    "display": ""
                })
                $('#but_upload2').css({
                    "display": "none"
                })

            }
        }

        function replayout() {
            $('#chatcount4').text('');
            var data1 = $('#chatcount4').text();

            $('#chat1').css({
                "display": ""
            })
            $('#chat2').css({
                "display": "none"
            })
            $('#but_upload').css({
                "display": "none"
            })
            $('#but_upload2').css({
                "display": ""
            })



        }



        $('#hover1').mouseenter(
            function() {
                $(this).hide();
                $('#hover2').show();
            });

        $('#hover2').mouseleave(function() {
            $('#hover1').show();
            $(this).hide();
        }).mouseleave();
    </script>

</html>