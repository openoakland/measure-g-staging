<?php 
	date_default_timezone_set('America/New_York');
	$event_json = file_get_contents('https://swoop.up.co/events?vertical=edu&event_type=Startup%20Weekend&country=USA&since=%20%22Aug%2011%2C%202015%22&event_status=W%7CG%7CT');
	$swedu_events = json_decode($event_json);

	$today = new DateTime();
	echo '<div id="swedu-events">';

		foreach ($swedu_events as $event) {
			$event_date = new DateTime($event->start_date);
			if ($today < $event_date && property_exists($event, "event_type")) {
				echo "<li class='swedu event'>";
				echo "<a href='".$event->website."' target='_blank'>".$event->city.", ".$event->state." | ".date_format($event_date, "M j")."</a>";
				echo "</li>";
			}
		}

	echo '</div>';

?>