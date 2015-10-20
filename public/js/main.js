/*Awesome Js Goes here*/

function UpdateStatsPerLevel(event)
{	
	//Get the level selected on the dropdown list
	//Get the table stats elements
	//Do math
	//Reset the results

	var adResult = 0;
	var armorResult = 0;
	var mrResult = 0;
	var asResult = 0;

	var lvlSelected = $( "select#dropdown-lvl option:selected").val() -1;

	//BASE FORMULA : base stat+(statperlevel*levels)
	//AD CALCULATIONS 
	var adBase = $("#ad .base").text();
	$("#ad .base").css("display","none");
	var adPerLevel = $("#ad .perlevel").text(); 
	adResult = parseFloat(adBase) + (parseFloat(adPerLevel) * parseFloat(lvlSelected));
	$("#ad .result").html(Math.round(parseFloat(adResult))); 

	//armor CALCULATIONS 
	var armorBase = $("#armor .base").text();
	$("#armor .base").css("display","none");
	var armorPerLevel = $("#armor .perlevel").text();
	armorResult = parseFloat(armorBase) + (parseFloat(armorPerLevel) * parseFloat(lvlSelected)); //might be because of float hmm
	$("#armor .result").html(Math.round(parseFloat(armorResult)));

	//magic resistance CALCULATIONS 
	var mrBase = $("#mr .base").text();
	$("#mr .base").css("display","none");
	var mrPerLevel = $("#mr .perlevel").text();
	mrResult = parseFloat(mrBase) + (parseFloat(mrPerLevel) * parseFloat(lvlSelected)); //might be because of float hmm
	$("#mr .result").html(Math.round(parseFloat(mrResult)));

	//attack speed CALCULATIONS 
	var asBase = $("#as .base").text();
	$("#as .base").css("display","none");
	var asPerLevel = $("#as .perlevel").text();
	asResult = parseFloat(asBase) + (parseFloat(asPerLevel) * parseFloat(lvlSelected)); //might be because of float hmm
	$("#as .result").html(Math.round(parseFloat(asResult)));
}

