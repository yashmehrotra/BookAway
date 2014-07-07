setInterval ( "size()", 100 );

		function size()	{
			var w = window.innerWidth;
			if( w < 950 )
			{
				change();
			}
			else rechange();
		}

		function change()	{
			document.getElementById("wrapper").style.left="-35px";
		}
		function rechange()	{
			document.getElementById("wrapper").style.left="205px";
		}