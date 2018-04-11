window.onload=function(){
document.getElementById('find').onclick=function(){
getArchiveAjaxData();
  }
}
var xmlhttp;

	function getArchiveAjaxData()
	 {
	var id = document.getElementById('userSelected').value;		
	if (window.XMLHttpRequest)
	   {
	// IE7+, Firefox, Chrome, Opera, Safari
	xmlhttp=new XMLHttpRequest();
	   }
	else
	   {
	// IE6, IE5
	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	   }

	xmlhttp.onreadystatechange = showArchiveAjaxData;		
	xmlhttp.open("GET", "getMonitorData.php?user="+id, true);		
	xmlhttp.send();	
	 }

	function showArchiveAjaxData()
	{

	if (xmlhttp.readyState==4 && xmlhttp.status==200)	{				
	//alert(xmlhttp.responseText);
	var data= JSON.parse(xmlhttp.responseText);	

	var output = '<table border=1><tr><th>SubjectID</th><th>Subject</th><th>Date</th><th>Message</th><th>To</th><th>From</th></tr>';  

	for (var i = 0; i < data.results.length; i++) {

	output += '<tr><td>' + data.results[i].SubjectID+ '</td><td>'
	+data.results[i].Subject+'</td><td>'
	+data.results[i].Date+'</td><td>'
	+data.results[i].Message+'</td>';

   for(var j=0; j<data.users.length; j++)
	  {
	if(data.users[j].id==data.results[i].ReceiverID){
	output += '<td>'+ data.users[j].username+'</td>';
	    }	
	  }


   for(var j=0; j<data.users.length; j++)
	  {
	if(data.users[j].id==data.results[i].SenderID){
	output += '<td>'+ data.users[j].username+'</td>';
	    }	
	  }

	//+data.results[i].ReceiverID+'</td><td>'
	//+data.results[i].SenderID+'</td>';

    }
	output += '</tr></table>';



	document.getElementById("myDiv").innerHTML = output;            
	}
}