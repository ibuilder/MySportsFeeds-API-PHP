<?php
error_reporting(0);
// calculation functions
function team_algorithm_team1_win_home() {
	$team_stat_win = '27.6'; //ari_win stat
  	$team_stat_loss = '16.2'; //ne_loss stat
    $calculation = $team_stat_win*$team_stat_loss/22.8;
    $log_calc = 21* log(21/round($calculation));
    return $log_calc;
}

function team_algorithm_team2_win_home() {
	$team_stat_win = '28.6';  // ne_win stat
  	$team_stat_loss = '16.2';  // ari_loss stat
    $calculation = $team_stat_win*$team_stat_loss/22.8;
    $log_calc = 23* log(23/round($calculation));
    return $log_calc;
}

function team_algorithm_team1_win_away() {
	$team_stat_win = '27.7'; //ari_win stat
  	$team_stat_loss = '16.3'; //ne_loss stat
    $calculation = $team_stat_win*$team_stat_loss/22.8;
    $log_calc = 21* log(21/round($calculation));
    return $log_calc;
}

function team_algorithm_team2_win_away() {
	$team_stat_win = '25.5';  // ne_win stat
  	$team_stat_loss = '21.9';  // ari_loss stat
    $calculation = $team_stat_win*$team_stat_loss/22.8;
    $log_calc = 23* log(23/round($calculation));
    return $log_calc;
}

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
}


//echo 'Away Game Winner';
if (team_algorithm_team1_win_away() > team_algorithm_team2_win_away()) {
//	echo 'Team 1 wins with '. team_algorithm_team1_win_away();
}
if (team_algorithm_team2_win_away() > team_algorithm_team1_win_away()) {
//	echo 'Team 2 wins with' .team_algorithm_team2_win_away();
}

if (team_algorithm_team2_win_away() == team_algorithm_team1_win_away()) {
//	echo 'Teams are tied';
}

error_reporting(0);
 

$url='https://api.mysportsfeeds.com/v2.1/pull/'.$_GET['team1'].'/2019-2020-regular/games.json';
 
 
// Get cURL resource
$ch = curl_init();

// Set url
curl_setopt($ch, CURLOPT_URL, 'https://api.mysportsfeeds.com/v2.1/pull/nfl/2019-2020-regular/games.json');
 
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

// Set options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// Set compression
curl_setopt($ch, CURLOPT_ENCODING, "gzip");

// Set headers
curl_setopt($ch, CURLOPT_HTTPHEADER, [
	"Authorization: Basic " . base64_encode('7a353a01-a3b2-4cf8-a056-3952cc:MYSPORTSFEEDS')
]);

// Send the request & save response to $resp
$resp = curl_exec($ch);
  

// Close request to clear up some resources
curl_close($ch);
$data=json_decode($resp,true);
 echo '<pre>';
 print_R($data);
 echo '<Table style="width: 100%;">';
 
 echo "<tr>";
 echo '<td><select>';
 for($i  = 0;$i < count($data['games']);$i++){
		?>
			<option value="<?php  echo $data['games'][$i]['schedule']['homeTeam']['abbreviation'];?>"> <?php  echo $data['games'][$i]['schedule']['homeTeam']['abbreviation'];?></option>
		
		<?php
 }
 echo '</select></td>';
 echo '<td><select>';
 for($i  = 0;$i < count($data['games']);$i++){
		?>
			<option value="<?php  echo $data['games'][$i]['schedule']['homeTeam']['abbreviation'];?>"> <?php  echo $data['games'][$i]['schedule']['homeTeam']['abbreviation'];?></option>
		
		<?php
 }
 echo '</select></td>';
 echo '</tr></Table>';
 die;
echo '<Table style="width: 100%;">
		
	';
echo '<tr> <td>';
echo '<table border="1" cellpadding="5" cellspacing="5"  style="width: 100%;">';
echo '<tr>
		<td style="width:20%">Team</td>
		<td style="width:40%">Home ScoreTotal</td>
		<td style="width:40%">Away ScoreTotal</td>
	</tr>
';
for($i  = 0;$i < count($data['games']);$i++){

	 
		?>
			<tr>
				<td>
					<?php  echo $data['games'][$i]['schedule']['homeTeam']['abbreviation'];?>
				</td>
				<td>
						<?php  echo number_format($data['games'][$i]['score']['homeScoreTotal']*team_algorithm_team1_win_home(),1);?>
				</td>
				<td>
						<?php  echo number_format($data['games'][$i]['score']['awayScoreTotal']*team_algorithm_team1_win_away(),1);?>
				</td>
			</tr>
		
		<?php
	 
}
echo '</table>';
echo '</td><td>';
echo '<table border="1" cellpadding="5" cellspacing="5" style="width: 100%;">';
echo '<tr>
		<td>Team</td>
		<td>Home ScoreTotal</td>
		<td>Away ScoreTotal</td>
	</tr>
';

  $url='https://api.mysportsfeeds.com/v2.1/pull/'.$_GET['team2'].'/2019-2020-regular/games.json';
 
// Get cURL resource
$ch = curl_init();

// Set url
curl_setopt($ch, CURLOPT_URL, 'https://api.mysportsfeeds.com/v2.1/pull/nfl/2019-2020-regular/games.json');
 
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

// Set options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// Set compression
curl_setopt($ch, CURLOPT_ENCODING, "gzip");

// Set headers
curl_setopt($ch, CURLOPT_HTTPHEADER, [
	"Authorization: Basic " . base64_encode('7a353a01-a3b2-4cf8-a056-3952cc:MYSPORTSFEEDS')
]);

// Send the request & save response to $resp
$resp = curl_exec($ch);
  

// Close request to clear up some resources
curl_close($ch);
$data=json_decode($resp,true);
for($i  = 0;$i < count($data['games']);$i++){

	 
		?>
			<tr>
				<td>
					<?php  echo $data['games'][$i]['schedule']['homeTeam']['abbreviation'];?>
				</td>
				<td>
						<?php  echo number_format($data['games'][$i]['score']['homeScoreTotal']*team_algorithm_team2_win_home(),1);?>
				</td>
				<td>
						<?php  echo number_format($data['games'][$i]['score']['awayScoreTotal']*team_algorithm_team2_win_away(),1);?>
				</td>
			</tr>
		
		<?php
	 
}
echo '</table>';
echo "</td></tr> </table>";
?>

 