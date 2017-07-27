</head>
<?php //include 'script_css.php';?>
<?php include '_conn.php';?>
<script type="text/javascript">
/*
var code=<?php //echo "'".$sc."'";?>;
if(localStorage.ht!=code){
	localStorage.ht=code;
	document.write(atob(localStorage.ht));
}else{
	document.write(atob(localStorage.ht));
}
*/
</script>
<script>
            $(function() {
                console.log("wurl.ga 開發人員 : William Chang");
                $("#suc").hide();
                $("#err").hide();
                $("#qr").hide();
                $("#button").show();
                var i = $("#url");
                var txt = <?php echo "'".$txt."'";?>;
                var blurTimer = false;
                i.focus(function() {
                    clearTimeout(blurTimer);
                    $(this).removeClass("blur");
                    if ($(this).val() == txt) {
                        $(this).val("");
                    }
                });

                i.blur(function() {
                    if ($(this).val() == "") {
                        $(this).val(txt);
                        $(this).addClass("blur");
                    }
                });
                i.blur();
                $("#button").click(function() {
                    var url = encodeURIComponent($('#url').val());
                    $("#url").val(<?php echo "'".$txt2."'";?>);
                    if ($('#url').val() == txt) {
                        $("#url").val(<?php echo "'".$txt."'"?>);
                        $("#err").show();
                        return false;
                    }

                    if (url.length < 10) {
                        $("#url").val(<?php echo "'".$txt."'";?>);
                        $("#err").show();
                        return false;
                    }
                    var time = $('#time').val();

                    $(this).attr("disabled", "disabled");
                    $.post("/_surl.php", {
                        url: url,
                        time: time,
                        code: <?php echo '"'.$key.'"';?>,
                        button: "+"
                    }, function(result) {
                        if(result=="WTF"){
                            $("#err").show();
                            $("#url").val(<?php echo "'".$txt."'"?>);
                            $("#button").removeAttr("disabled");
                        }else{
                            $("#qr").attr("src", "https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=https://" + result);
                            $("#more").show();
                            $("#qr").show();
                            $("#suc").show();
                            $("#button").hide();
                            $("#err").hide();
                            $("#url").val("https://"+result);
                            $("#shurl").val(<?php echo "'".$txt6."'";?>);
                            $("#button").removeAttr("disabled");
                        }
                    });


                });

                $("#more").click(function() {
                    document.location.href=<?php echo '"'.$weburl.$user_lang.'/"';?>;
                });
            });
        </script>
<body onKeyDown="if (event.keyCode == 13) {return false;}" style="text-align:center;" class="is-loading">
</br>
<div class="container">
    <div class="jumbotron">
        <div class="container">

            <h1><a href=<?php echo '"'.$weburl.$user_lang.'/"';?>><?php echo $h1;?></a></h1>

            <blockquote>
                <h3 style="text-align:center;"><?php echo $h2;?></h3>
            </blockquote>

            <br>
            <div class="panel panel-default">
                <div class="panel-body">
                    <ul class="nav nav-pills nav-justified">
                        <li class="active"><a href=<?php echo '"'.$weburl.$user_lang.'/"';?>>Home<span class="sr-only">(current)</span></a></li>
                        <li><a data-toggle="modal" data-target="#CC"><?php echo $cc;?></a></li>
                        <li><a href="mailto:info@wurl.ga"><?php echo $email;?>info@wurl.ga</a></li>
                        <li role="presentation" class="divider"></li>
                        <li><a href="/zh/">中文</a></li>
                        <li><a href="/en/">English</a></li>
                    </ul>
                </div>
            </div>
            <hr />

            <div class="modal" id="CC" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            </button>
                            <h4 class="modal-title" id="myModalLabel"><?php echo $cc;?></h4>
                        </div>
                    <div class="modal-body">
                        <p>
                            <?php echo $cc_text;?>
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $close;?></button>
                    </div>
                    </div>
                </div>
            </div>

            <div class="alert alert-danger alert-dismissible" id="err" role="alert"><?php echo $txt5;?></div>
            <div class="alert alert-success alert-dismissible" id="suc" role="alert"><?php echo $suc;?></div>



                <input name="url" id="url" value="" type="text" class="form-control">
                <span id="helpBlock" class="help-block"><?php echo $shurl;?></span>
                <br>
                <input type="hidden" class="form-control" name="time" id="time" value="0">
                <button id="button" type="button" class="btn btn-primary btn-lg" type="button"><?php echo $s;?></button>
                <img id="qr" />
                </br></br>
                <a title="Again" herf="/" id="more" class="btn btn-success" style="display:none"><?php echo $again;?></a><br>
                <span id="cnzz" style="display:none;"></span>
            </form>
            <?php require 'html/footer.php'; ?>
        </div>
    </div>
</div>
</body>
</html>
