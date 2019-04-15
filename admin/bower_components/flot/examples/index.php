<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Flot Examples</title>
	<link href="examples.css" rel="stylesheet" type="text/css">
	<style>

	h3 {
		margin-top: 30px;
		margin-bottom: 5px;
	}

	</style>
	<script language="javascript" type="text/javascript" src="../jquery.js"></script>
	<script language="javascript" type="text/javascript" src="../jquery.flot.js"></script>
	<script type="text/javascript">

	$(function() {

		// Add the Flot version string to the footer

		$("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
	});

	</script>
</head>
<body>

	<div id="header">
		<h2>Flot Examples</h2>
	</div>

	<div id="content">

		<p>Here are some examples for <a href="http://www.flotcharts.org">Flot</a>, the Javascript charting library for jQuery:</p>

		<h3>Basic Usage</h3>

		<ul>
			<li><a href="basic-usage/index.php">Basic example</a></li>
			<li><a href="series-types/index.php">Different graph types</a> and <a href="categories/index.php">simple categories/textual data</a></li>
			<li><a href="basic-options/index.php">Setting various options</a> and <a href="annotating/index.php">annotating a chart</a></li>
			<li><a href="ajax/index.php">Updating graphs with AJAX</a> and <a href="realtime/index.php">real-time updates</a></li>
		</ul>

		<h3>Interactivity</h3>

		<ul>
			<li><a href="series-toggle/index.php">Turning series on/off</a></li>
			<li><a href="selection/index.php">Rectangular selection support and zooming</a> and <a href="zooming/index.php">zooming with overview</a> (both with selection plugin)</li>
			<li><a href="interacting/index.php">Interacting with the data points</a></li>
			<li><a href="navigate/index.php">Panning and zooming</a> (with navigation plugin)</li>
			<li><a href="resize/index.php">Automatically redraw when window is resized</a> (with resize plugin)</li>
		</ul>

		<h3>Additional Features</h3>

		<ul>
			<li><a href="symbols/index.php">Using other symbols than circles for points</a> (with symbol plugin)</li>
			<li><a href="axes-time/index.php">Plotting time series</a>, <a href="visitors/index.php">visitors per day with zooming and weekends</a> (with selection plugin) and <a href="axes-time-zones/index.php">time zone support</a></li>
			<li><a href="axes-multiple/index.php">Multiple axes</a> and <a href="axes-interacting/index.php">interacting with the axes</a></li>
			<li><a href="threshold/index.php">Thresholding the data</a> (with threshold plugin)</li>
			<li><a href="stacking/index.php">Stacked charts</a> (with stacking plugin)</li>
			<li><a href="percentiles/index.php">Using filled areas to plot percentiles</a> (with fillbetween plugin)</li>
			<li><a href="tracking/index.php">Tracking curves with crosshair</a> (with crosshair plugin)</li>
			<li><a href="image/index.php">Plotting prerendered images</a> (with image plugin)</li>
			<li><a href="series-errorbars/index.php">Plotting error bars</a> (with errorbars plugin)</li>
			<li><a href="series-pie/index.php">Pie charts</a> (with pie plugin)</li>
			<li><a href="canvas/index.php">Rendering text with canvas instead of HTML</a> (with canvas plugin)</li>
		</ul>

	</div>

	<div id="footer">
		Copyright &copy; 2007 - 2013 IOLA and Ole Laursen
	</div>

</body>
</html>
