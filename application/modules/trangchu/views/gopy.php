
<script>
    $(document).ready(function () {
        $("#btnSend").click(function () {
            var txtConent = $("#txtContent");
            var txtCapcha = $("#txtCapcha");
            var content = txtConent.val();
            var capcha = txtCapcha.val();
            var option = 0;

            $(".report input[type=checkbox]").each(function () {
                var _this = $(this);

                if (_this.attr("checked") != "checked") {
                    return;
                }

                var value = $(this).val();

                option = value;
            });

            if (content.length == 0 && option == 0) {
                alert("Nội dung không được để trống hoặc bạn phải chọn các lý do vi phạm.");
                txtConent.focus();

                return;
            }

            if (capcha.length == 0) {
                alert("Mã xác thực không được để trống");
                txtCapcha.focus();

                return;
            }

            $.post("/auto/_report1", { reportOption: option, content: content, HoVaTen: $("#HoVaTen").val(), SDT: $("#SDT").val(), Email: $("#Email").val(), capcha: capcha, link: window.location.href }, function (result) {
                result=JSON.parse(result);
                if (!result.sucess) {
                    alert(result.error);

                    return;
                }

                alert("Cảm ơn bạn đã báo cáo vi phạm cho chúng tôi!");
                $.fancybox().close();
            });
        });
    });
</script>

<div class="Cost report">
    <div class="title">BÁO CÁO VI PHẠM</div>
    <div class="content">
        <div class="rowitem">
            <label>Tin rao có các thông tin không đúng:</label>
        </div>

            <div class="rowitem">
                <input type="checkbox" value="Các thông số của xe (hãng xe, đời xe, màu xe...)">
                <label>Các thông số của xe (hãng xe, đời xe, màu xe...)</label>
            </div>
            <div class="rowitem">
                <input type="checkbox" value="Giá của xe">
                <label>Giá của xe</label>
            </div>
            <div class="rowitem">
                <input type="checkbox" value="Ảnh">
                <label>Ảnh</label>
            </div>
            <div class="rowitem">
                <input type="checkbox" value="Trùng với tin rao khác">
                <label>Trùng với tin rao khác</label>
            </div>
            <div class="rowitem">
                <input type="checkbox" value="Tin không có thật">
                <label>Tin không có thật</label>
            </div>
            <div class="rowitem">
                <input type="checkbox" value="Không liên lạc được">
                <label>Không liên lạc được</label>
            </div>
            <div class="rowitem">
                <input type="checkbox" value="Xe đã bán">
                <label>Xe đã bán</label>
            </div>
            <div class="rowitem">
                <input type="checkbox" value="Góp ý tính năng">
                <label>Góp ý tính năng</label>
            </div>
            
            <div class="rowitem">
                <input type="checkbox" value="Góp ý nội dung">
                <label>Góp ý nội dung</label>
            </div>
            <div class="rowitem">
                <input type="checkbox" value="Báo lỗi">
                <label>Báo lỗi</label>
            </div>
<div class="rowitem row-item-margin-top">
                <input type="text" class="ten requiredemail" placeholder="Họ và tên" name="HoVaTen" id="HoVaTen"/>
                <label></label>
            </div> 
            <div class="rowitem">
                <input type="text" class="ten requiredemail" placeholder="Số điện thoại" name="SDT" id="SDT"/>
                <label></label>
            </div> 
            <div class="rowitem">
                <input type="text" class="ten requiredemail" placeholder="Địa chỉ email" name="Email" id="Email"/>
                <label></label>
            </div> 
        <div class="rowitem">
            <label></label>
        </div>

        <div class="rowitem">
            <textarea name="Content" id="txtContent" placeholder="Ý kiến của bạn"></textarea>
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