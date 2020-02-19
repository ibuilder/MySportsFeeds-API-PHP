<?
/* 
Developed by: Matthew Emma 
Github: ibuilder
License: GNU 2.0
*/
?>
<script>
	function redie(vals){
	window.location.href='mysportsfeeds.php?team='+vals;
	}
function loadDoc() {
document.getElementById("data").innerHTML ='';
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("data").innerHTML = this.responseText;
    }
  };
	var team1=document.getElementById('team1').value;
	var team2='';
	var url = 'http://phpclientdemos.com/mysportsfeeds/calculation.php?team1='+team1+'&team2='+team2;
	xhttp.open("GET", url, true);
	xhttp.send();
}
 
		function setteam(data,teams){
			 
			var teams1=document.getElementById('teams1g').value;
			//alert(teams1)
			var oneteams=teams1.split(",");
		//	alert(oneteams[0]+"--"+oneteams[1]+"--"+oneteams[2]);
			var teams2=document.getElementById('teams2g').value;
		//	alert(teams2)
			var twoeams=teams2.split(",");
		//	alert(twoeams[0]+"--"+twoeams[1]+"--"+twoeams[2]);
			var twoteams=teams1.split(",");
			var homestr='';
			if(oneteams[0]  > twoeams[0]){
			
				homestr='Home Game Winner :Team 1 wins with '+oneteams[0];
			}else if(oneteams[0] < twoeams[0]){
			
				homestr='Home Game Winner :Team 2 wins with '+twoeams[0];
			}else if(oneteams[0] == twoeams[0]){
			
				homestr='Home Game Winner : Teams are tied';
			}
			
			document.getElementById('data2').innerHTML=homestr;
			document.getElementById('data2').style.display='block';
			if(oneteams[1]  > twoeams[1]){
			
				homestr='Away Game Winner Team 1 wins with '+oneteams[1];
			}else if(oneteams[1] < twoeams[1]){
			
				homestr='Away Game Winner Team 2 wins with '+twoeams[1];
			}else if(oneteams[1] == twoeams[1]){
			
				homestr='Away Game Winner Teams are tied';
			}
			document.getElementById('data3').innerHTML=homestr;
			document.getElementById('data3').style.display='block';
			/*
			// show winners
//echo 'Home Game Winner';
if (team_algorithm_team1_win_home() > team_algorithm_team2_win_home()) {
//	echo 'Team 1 wins with '. team_algorithm_team1_win_home();
}
if (team_algorithm_team2_win_home() > team_algorithm_team1_win_home()) {
//	echo 'Team 2 wins with' .team_algorithm_team2_win_home();
}

if (team_algorithm_team2_win_home() == team_algorithm_team1_win_home()) {
//	echo 'Teams are tied';
}*/
		}
	 
</script>

<table border="1" cellspacing="5" cellpadding="5" style="width: 800px;">
	<tr>
		<td> Games : <select  id="team1" onchange="loadDoc()" style="width:200px">
						<option value="nfl">NFL</option>
						<option value="mlb">MLB</option>
						<option value="nba">NBA</option>
						<option value="nhl">NHL</option>
					</select>
		</td>
	  
	</tr>
	 <tr>
	<td colspan='2' id="data">
	
	</td>
	</tr>
	<tr>
	<td colspan='2' id="data2" style="display:none;">
	 
	</td>
	</tr>
	<tr>
	<td colspan='2' id="data3" style="display:none;">
	 
	</td>
	</tr>
</table>
<script>
loadDoc();
</script>

 