  <div class="fengshui-fc">
        <div class="ff-search">
            <div class="ff-search-content">
                <div class="ff-tab">
                    <div class="ff-tab1 ff-tab-item  ff-tab-active" onclick="ShowHomeDirection_From();">Xem hướng nhà</div>
                    <div class="ff-tab2 ff-tab-item " onclick="ShowAgeBuildHome_From();">Xem tuổi xây dựng</div>
                    <input type="hidden" name="ctl00$MainContent$hdSelectedFengshuiResult" id="hdSelectedFengshuiResult" />
                </div>
                <div class="ff-content">
                    <div class="ff-direct" id="HomeDirectionForm" >
                        <div class="ff-item">
                            <label>Năm sinh của gia chủ:</label>
                            <input name="ctl00$MainContent$txtBirthYearFromDirect" type="text" id="txtBirthYearFromDirect" />
                        </div>
                        <div class="ff-item" style="display: none;" id="errorHomeDirection">
                            <label>&nbsp;</label>
                            <span style="color: red;">Năm sinh không hợp lệ</span>
                        </div>
                        <div class="ff-item">
                            <label>Giới tính:</label>
                            <select name="ctl00$MainContent$cmbSexForm" id="cmbSexForm">
	<option selected="selected" value="Nam">Nam</option>
	<option value="Nữ">Nữ</option>

</select>
                        </div>
                        <div class="ff-item">
                            <label>Hướng nhà:</label>
                            <select name="ctl00$MainContent$cmbDirectionForm" id="cmbDirectionForm">
	<option selected="selected" value="0">Đ&#244;ng</option>
	<option value="1">T&#226;y</option>
	<option value="2">Nam</option>
	<option value="3">Bắc</option>
	<option value="4">Đ&#244;ng Bắc</option>
	<option value="5">Đ&#244;ng Nam</option>
	<option value="6">T&#226;y Bắc</option>
	<option value="7">T&#226;y Nam</option>

</select>
                        </div>
                        <div class="ff-item">
                            <label>&nbsp;</label>
                            <a id="lbtDirection" class="hpldirect">Xem kết quả</a>
                        </div>
                    </div>

                    <div class="ff-direct" id="AgeBuildHomeForm" style='display: none;'>
                        <div class="ff-item">
                            <label>Năm sinh của gia chủ:</label>
                            <input name="ctl00$MainContent$txtBirthYearFormAge" type="text" id="txtBirthYearFormAge" />
                        </div>
                        <div class="ff-item" id="errorBuildHome" style="display: none;">
                            <label>&nbsp;</label>
                            <span style="color: red;">Năm sinh không hợp lệ</span>
                        </div>
                        <div class="ff-item">
                            <label>Năm dự tính khởi công:</label>
                            <select name="ctl00$MainContent$cmbYearForm" id="cmbYearForm">
	<option value="2016">2016</option>
	<option value="2017">2017</option>
	<option value="2018">2018</option>
	<option value="2019">2019</option>
	<option value="2020">2020</option>
	<option value="2021">2021</option>
	<option value="2022">2022</option>
	<option value="2023">2023</option>
	<option value="2024">2024</option>
	<option value="2025">2025</option>
	<option value="2026">2026</option>
	<option value="2027">2027</option>
	<option value="2028">2028</option>
	<option value="2029">2029</option>
	<option value="2030">2030</option>
	<option value="2031">2031</option>
	<option value="2032">2032</option>
	<option value="2033">2033</option>
	<option value="2034">2034</option>
	<option value="2035">2035</option>
	<option value="2036">2036</option>
	<option value="2037">2037</option>
	<option value="2038">2038</option>
	<option value="2039">2039</option>
	<option value="2040">2040</option>
	<option value="2041">2041</option>
	<option value="2042">2042</option>
	<option value="2043">2043</option>
	<option value="2044">2044</option>
	<option value="2045">2045</option>
	<option value="2046">2046</option>
	<option value="2047">2047</option>
	<option value="2048">2048</option>
	<option value="2049">2049</option>
	<option value="2050">2050</option>
	<option value="2051">2051</option>
	<option value="2052">2052</option>
	<option value="2053">2053</option>
	<option value="2054">2054</option>
	<option value="2055">2055</option>
	<option value="2056">2056</option>
	<option value="2057">2057</option>
	<option value="2058">2058</option>
	<option value="2059">2059</option>
	<option value="2060">2060</option>
	<option value="2061">2061</option>
	<option value="2062">2062</option>
	<option value="2063">2063</option>
	<option value="2064">2064</option>
	<option value="2065">2065</option>
	<option value="2066">2066</option>

</select>
                        </div>
                        <div class="ff-item">
                            <label>&nbsp;</label>
                            <a id="lbtAgeBuildHome" class="hpldirect">Xem kết quả</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="ff-result" id="divajax" style="display: none;">
                <img src="/style/images/ajax_loader.gif" />
            </div>
        <div id="divContentFS" style="display: none;" class="ff-content">
            <div class="tit">
                <div class="content-tit">Bảng kết quả</div>
            </div>
            <div id="divContentRS">
            </div>
        </div>

        <div class="clear"></div>
    </div>

