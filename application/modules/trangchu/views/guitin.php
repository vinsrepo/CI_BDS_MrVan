
<script>
    $(document).ready(function () {
        $("#btnSend").click(function () {
            var txtConent = $("#txtContent");
            var txtCapcha = $("#txtCapcha");
            var content = txtConent.val();
            var capcha = txtCapcha.val(); 
            var txtEmail = $("#txtEmail");
            var txtFullName = $("#txtFullName");
            var txtEmail = txtEmail.val();
            var txtFullName = txtFullName.val(); 
            var txtMobile = $("#txtMobile");
            var txtMobile = txtMobile.val(); 
 
            
            if (capcha.length == 0||content.length == 0||txtEmail.length == 0||txtFullName.length == 0||txtMobile.length == 0) {
                alert("Vui lòng nhập đầy đủ các mục được yêu cầu");
                return;
            }

            $.post("/auto/send1", { fullname: txtFullName,email: txtEmail,mobile: txtMobile, content: content, capcha: capcha }, function (result) {
                result=JSON.parse(result);
                if (!result.sucess) {
                    alert(result.error);

                    return;
                }

                alert("Gửi nhắn thành công !");
                $.fancybox().close();
            });
        });
    });
</script>

<div class="Cost report">
    <div class="title">Liên hệ người bán</div>
    <div class="content"> 
            <div class="rowitem">
                <input type="text" class="ten requiredemail" placeholder="Họ và tên" id="txtFullName"/>
                <label></label>
            </div> 
            <div class="rowitem">
                <input type="text" class="ten requiredemail" placeholder="Địa chỉ email" id="txtEmail"/>
                <label></label>
            </div> 
            <div class="rowitem">
                <input type="text" class="ten requiredemail" placeholder="Số điện thoại" id="txtMobile"/>
                <label></label>
            </div> 

        <div class="rowitem">
            <label>Nội dung</label>
        </div>

        <div class="rowitem">
            <textarea name="Content" id="txtContent"></textarea>
        </div>

        <div class="rowitem">
             <img src="/maxacnhan/captcha" id="captcha" title="Mã xác nhận" /><img title="Đổi mã xác nhận khác" src="<? echo base_url();?>style/images/ref.gif" width="26" height="25" onclick="document.getElementById('captcha').src='/maxacnhan/captcha?'+Math.random();"/>
            <input class="capchar" name="MaXacNhan"  id="txtCapcha" placeholder="Mã xác thực" />
        </div>

        <div class="rowitem">
            <label>&nbsp;</label>
            <input type="button" id="btnSend" class="btn" value="GỬI" />
        </div>

        <div class="clear"></div>
    </div>
</div>