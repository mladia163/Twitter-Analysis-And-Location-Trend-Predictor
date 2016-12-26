<?php

$text = explode("$",$_POST['high_region']);
print_r($text);


// content="text/plain; charset=utf-8"

require_once ('/jpgraph-3.5.0b1/src/jpgraph.php');
require_once ('/jpgraph-3.5.0b1/src/jpgraph_bar.php');
require_once ('/jpgraph-3.5.0b1/src/jpgraph_line.php');

$labels = array("Delhi","Gujarat");

// Create the graph.
function region_user($datay,$labels)
{ 
	$graph = new Graph(500,500);	
	$graph->SetScale("textlin");

	$graph->SetMarginColor('navy:1.9');
	$graph->SetBox();
	$graph->xaxis->SetTickLabels($labels);
	$graph->xaxis->SetFont(FF_ARIAL,FS_BOLD);

	$graph->title->Set("Scren Name:".$screename."");
	$graph->title->SetFont(FF_ARIAL,FS_BOLD,15);

	$graph->SetTitleBackground('lightblue:1.3',TITLEBKG_STYLE2,TITLEBKG_FRAME_BEVEL);
	$graph->SetTitleBackgroundFillStyle(TITLEBKG_FILLSTYLE_HSTRIPED,'lightblue','blue');

	// Create a bar pot
	$bplot = new BarPlot($datay);
	$bplot->SetFillColor('darkorange');
	$bplot->SetWidth(0.6);
	/*$bplot->value->Show();
	$bplot->value->SetFont(FF_ARIAL,FS_BOLD,12);
	$bplot->value->SetAlign('left','center');
	$bplot->value->SetColor('black','darkred');
	$bplot->value->SetFormat('%.1f mkr');*/
	$bplot->SetPattern(PATTERN_CROSS1,'navy');
	$graph->Add($bplot);
	$graph->Stroke();
}

region_user($text,$labels,"gaurav.israni");

?>