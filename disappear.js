   	setInterval ( "hide()", 100 );
   	
   	function hide()	{
   	var e = document.myform.sellrent;
	strUser = e.options[e.selectedIndex].value;
	if(strUser == 1)
		{
			document.myform.rentprice.style.display="none";
			document.myform.rentpricetime.style.display="none";
			document.myform.rentperiodnumber.style.display="none";
			document.myform.rentperiod.style.display="none";
			document.myform.sellprice.style.display="block";
		}
	if(strUser == 2)
		{
			document.myform.sellprice.style.display="none";
			document.myform.rentprice.style.display="block";
			document.myform.rentpricetime.style.display="block";
			document.myform.rentperiodnumber.style.display="block";
			document.myform.rentperiod.style.display="block";
		}
	if(strUser == 3)
		{
			document.myform.rentprice.style.display="block";
			document.myform.rentpricetime.style.display="block";
			document.myform.rentperiodnumber.style.display="block";
			document.myform.rentperiod.style.display="block";
			document.myform.sellprice.style.display="block";
		}
   	}