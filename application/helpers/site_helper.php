<?php 

function e($str) {
	return htmlspecialchars($str);
}

function get_nice_date($timestamp, $format, $stamp = false)
{ 
	if (! $stamp) {
		$timestamp = strtotime($timestamp);
	}
     switch ($format) {
         case 'full':
         //FULL // Friday 18th of February 2011 at 10:00:00 AM       
         $the_date = date('l jS \of F Y \a\t h:i:s A', $timestamp);
         break;          
         case 'cool':
         //FULL // Friday 18th of February 2011          
         $the_date = date('l jS \of F Y', $timestamp);
         break;                  
         case 'shorter':
         //SHORTER // 18th of February 2011          
         $the_date = date('jS \of F Y', $timestamp);
         break;          
         case 'mini':
         //MINI  // 18th Feb 2011
         $the_date = date('jS M Y', $timestamp);
         break;          
         case 'oldschool':
         //OLDSCHOOL  // 18/2/11         
         $the_date = date('j\/n\/y', $timestamp); 
         break;
         case 'datepicker':
         //DATEPICKER  // 18/2/11         
         $the_date = date('d\-m\-Y', $timestamp); 
         break;  
         case 'monyear':
         //MINI  // 18th Feb 2011
         $the_date = date('F Y', $timestamp);
         break; 
     }
     return $the_date;
}


function alert_modal($id, $url) {
$base_url = base_url();
$output = <<<END
	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Settings</h3>
		</div>
		<div class="modal-body">
			<p>Are You Sure You Want Make This Action?</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
			<a href="{$base_url}{$url}" class="btn btn-danger">Delete</a>
		</div>
	</div>
END;
return $output;
}