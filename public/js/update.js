$(document).ready(function() {
	function update() {
	  	var budget = $('#budget').val();
	  	var get_cost_p_unit_attr = $('#serviceDropdown').find('option:selected');
	  	var serv_id = get_cost_p_unit_attr.attr('id');
	  	var cost_p_unit = get_cost_p_unit_attr.attr('value');
	  	var get_rate_attr = $('#billingDropdown').find('option:selected');
	  	var rate = get_rate_attr.attr('value');
	  	var currency = get_rate_attr.attr('name');
	  	var units = $('#units').val();
	  	var cost = Math.ceil((cost_p_unit * units) / rate);
	  	var budgetRemaining = budget - cost;

	  	$('#idbillingDropdown').val(currency);
	  	$('#idunits').val(units);
	  	$('#cost').text('Cost: ' + currency + cost);
	  	$('#idcost').val(cost);
	  	$('#budgetRemaining').text('Budget Remaining: ' + currency + budgetRemaining);
	  	$('#idbudgetRemaining').val(budgetRemaining);
 
	  	if (budgetRemaining < 0) {
			$('#budgetRemaining').attr('style', 'color:red;font-size:30px;');
	  	} else {
		 	$('#budgetRemaining').attr('style', 'color:black;font-size:30px;');
	  	}
	}

	$('#budget').on('input', function() {
	  	update();
	});

	$('#serviceDropdown').change(function() {
		var option = $(this).find('option:selected');
	  	var description = option.attr('description');
	  	var serv_id = option.attr('id');
	  	var cost_p_unit = option.attr('value');
	  	var units = parseInt(option.attr('name'));

	  	$('#serviceDescription').text(description);
	  	$('#units').attr('step', units);
	  	$('#units').val(units);
	  	$('#idunits').val(units);
	  	$('#idserviceid').val(serv_id);
 
	  	update();
	});

	$('#billingDropdown').change(function() {
	  	update();
	});

	$('#units').on('input', function() {
	  	update();
	});
});