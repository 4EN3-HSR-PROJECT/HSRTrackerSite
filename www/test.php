<?php
echo 'onchange="getDropdown("bus_routes","request=routes&stop=" + (\'#bus_stops\').val())"';
echo '<br><br>';
echo serialize('onchange="getDropdown("bus_routes","request=routes&stop=" + (\'#bus_stops\').val())"');

?>

'onchange=\"getDropdown(\"routes\",\"request=routes\")\"'