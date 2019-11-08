function check_vn(str,level)
{
	str=str.toLowerCase();
	len1=str.length;
	arr_vowel=["á","à","ạ","ả","ã","â","ấ","ầ", "ậ","ẩ","ẫ","ă","ắ","ằ","ặ","ẳ","ẵ","é","è","ẹ","ẻ","ẽ","ê","ế","ề" ,"ệ","ể","ễ","ó","ò","ọ","ỏ","õ","ô","ố","ồ", "ộ","ổ","ỗ","ơ","ớ","ờ","ợ","ở","ú","ù","ụ","ủ","ũ","ư","ứ","ừ", "ự","ử","ữ","í","ì","ị","ỉ","ĩ","đ","Đ","ý","ỳ","ỵ","ỷ","ỹ","ì","á","ò","ả","ầ","ấ","í","ẩ","ố","ữ","ừ"];
	vcount=0;
	for(i=0;i<arr_vowel.length;i++)
	{		
		str=str.replace(new RegExp(arr_vowel[i], 'g'),"");
	}
	len2=str.length;
	if ((len1-len2) >=level)
	{
		return true	;
	}else
	{
		return false;
	}
}