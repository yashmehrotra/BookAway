//It sends a post request to a php file which fetches all the data about books from database
//Also need to add the whole jquery widget of autocomplete and also need to include jquery as link src in main file
var booklist_autocomplete   = [];
var authorlist_autocomplete = [];
//console.log("1");
$.ajax({
	type: "GET",
	url: "/Books-for-bucks/sqldata.php",
	success: function (result) {
		if(result) {
			var counter = 0;
			var json = JSON.parse(result);
			while(json[counter]) {
				//booklist_autocomplete.push(/*Correct Response*/);
				//authorlist_autocomplete.push(/*Correct Response*/);
				console.log(json[counter].bookname + " " + json[counter].authorname);
				//console.log("2");
				counter = counter +1;
			}
		}
	}
})