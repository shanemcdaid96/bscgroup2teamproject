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
	xmlhttp.open("GET", "getGradeData.php?user="+id, true);		
	xmlhttp.send();	
	 }

	function showArchiveAjaxData()
	{

	if (xmlhttp.readyState==4 && xmlhttp.status==200)	{				
	//alert(xmlhttp.responseText);
	var data= JSON.parse(xmlhttp.responseText);	

	var output = '<table border=1><tr><th>Student</th><th>Grade</th><th>Percentage</th></tr>';  

	for (var i = 0; i < data.results.length; i++) {

		   for(var j=0; j<data.users.length; j++)
	  {
	if(data.users[j].id==data.results[i].ReceiverID){
	output += '<tr><td>'+ data.users[j].username+'</td>';
	    }	
	  }


	output += '<td>' + data.results[i].Grade+ '</td><td>'
	+data.results[i].GradePercentage+'</td>';

    }
	output += '</tr></table>';



	document.getElementById("myDiv").innerHTML = output;            
	}
}