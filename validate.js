	function validate()		{
 
   if( document.myform.name.value == "" )
   {
     alert( "Please provide your name!" );
     document.myform.name.focus() ;
     return false;
   }
   var x= document.myform.email.value;
    atpos = x.indexOf("@");
    dotpos = x.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        alert("Not a valid e-mail address");
         document.myform.email.focus() ;
        return false;
    }
 	if( document.myform.phone.value == ""  || document.myform.phone.value.length < 10 || isNaN(document.myform.phone.value)||document.myform.phone.value.indexOf(" ")!=-1)
   {
     alert( "Please provide a Phone number 10 characters long containing only numerals!" );
     document.myform.phone.focus() ;
     return false;
 	}
 	if( document.myform.password.value == "" || document.myform.password.value.length < 4 )
   {
     alert( "Please provide a password at least 4 characters long!" );
     document.myform.password.focus() ;
     return false;
 	}
	var e = document.myform.subject;
	strUser = e.options[e.selectedIndex].value;
	if( strUser == "" )
	{
		alert( "Please select the subject!" );
		document.myform.subject.focus() ;
		return false;
	}
 	if( document.myform.book.value == "" )
   {
     alert( "Please provide the name of the Book!" );
     document.myform.book.focus() ;
     return false;
 	}
 	if( document.myform.author.value == "" )
   {
     alert( "Please provide your Email!" );
     document.myform.author.focus() ;
     return false;
 	}
 	var e = document.myform.sellrent;
	strUser = e.options[e.selectedIndex].value;
	if( strUser == "" )
	{
		alert( "Please select the whether you are selling or renting the book!" );
		document.myform.sellrent.focus();
	return false;
	}
	if( strUser == 1 )
	{
		if( document.myform.sellprice.value == "" )
		{
			alert( "Please enter the price to sell the book!" );
			document.myform.sellprice.focus();
			return false;
		}
	}
	if( strUser == 2 )
	{	
		if( document.myform.rentprice.value == "" )
		{
			alert( "Please enter the price to rent the book!" );
			document.myform.rentprice.focus();
			return false;
		}
		var e = document.myform.rentpricetime;
		strUser1 = e.options[e.selectedIndex].value;
		if( strUser1 == "" )
		{
			alert( "Please enter the time for the renting price you entered!" );
			document.myform.rentpricetime.focus() ;
			return false;
		}
		if( document.myform.rentperiodnumber.value == "" )
		{
			alert( "Please enter the number of  days/weeks/months to rent the book!" );
			document.myform.rentperiodnumber.focus();
			return false;
		}
		var e = document.myform.rentperiod;
		strUser2 = e.options[e.selectedIndex].value;
		if( strUser2 == "" )
		{
			alert( "Please enter the maximum time for the renting the book" );
			document.myform.rentperiod.focus() ;
			return false;
		}
	}
	if( strUser == 3 )
	{
		if( document.myform.sellprice.value == "" )
		{
			alert( "Please enter the price to sell the book!" );
			document.myform.sellprice.focus();
			return false;
		}
		if( document.myform.rentprice.value == "" )
		{
			alert( "Please enter the price to rent the book!" );
			document.myform.rentprice.focus();
			return false;
		}
		var e = document.myform.rentpricetime;
		strUser1 = e.options[e.selectedIndex].value;
		if( strUser1 == "" )
		{
			alert( "Please enter the time for the renting price you entered!" );
			document.myform.rentpricetime.focus() ;
			return false;
		}
		if( document.myform.rentperiodnumber.value == "" )
		{
			alert( "Please enter the number of  days/weeks/months to rent the book!" );
			document.myform.rentperiodnumber.focus();
			return false;
		}
		var e = document.myform.rentperiod;
		strUser2 = e.options[e.selectedIndex].value;
		if( strUser2 == "" )
		{
			alert( "Please enter the maximum time for the renting the book" );
			document.myform.rentperiod.focus() ;
			return false;
		}
	}
   return( true );
	}