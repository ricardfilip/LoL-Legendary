//Define variables on the global scope for now
var adResult = 0;
var armorResult = 0;
var mrResult = 0;
var asResult = 0;
var adBase = 0;
var armorBase = 0;
var mrBase = 0;
var asBase = 0;

$(document).ready(function () {
    //Populate Base variables on document load
    adBase = parseFloat($("#ad").find (".base").text());
    armorBase = parseFloat($("#armor").find(".base").text());
    mrBase = parseFloat($("#mr").find(".base").text());
    asBase = parseFloat($("#as").find(".base").text());
});

function UpdateStatsPerLevel() {
    //Get the level selected on the dropdown list
    //Get the table stats elements
    var lvlSelected = $("#dropdown-lvl").find("option:selected").val();

    //AD CALCULATIONS
    var adPerLevel = $("#ad").find(".perlevel").text();
    adResult = calculateGrowthStat(adBase,adPerLevel,lvlSelected);
    $("#ad").find(".base").text(Math.round(parseFloat(adResult)));

    //armor CALCULATIONS
    var armorPerLevel = $("#armor").find(".perlevel").text();
    armorResult = calculateGrowthStat(armorBase,armorPerLevel,lvlSelected);
    $("#armor").find(".base").text(Math.round(parseFloat(armorResult)));

    //magic resistance CALCULATIONS
    var mrPerLevel = $("#mr").find(".perlevel").text();
    mrResult = calculateGrowthStat(mrBase,mrPerLevel,lvlSelected);
    $("#mr").find(".base").text(Math.round(parseFloat(mrResult)));

    //attack speed CALCULATIONS
    var asPerLevel = $("#as").find(".perlevel").text();
    asResult = calculateGrowthStat(getBaseAs(asBase),asPerLevel,lvlSelected);
    $("#as").find(".base").text(Math.round(parseFloat(asResult)));
}


function calculateGrowthStat(baseStat, perLevelStat, level) {
    //Convert from text to numbers in case it hasn't been done before
    baseStat = parseFloat(baseStat);
    perLevelStat = parseFloat(perLevelStat);
    level = parseInt(level);

    //return the result
    return baseStat + perLevelStat * ((7 / 400) * (Math.pow(level, 2) - 1) + (267 / 400) * (level - 1));
}

function getBaseAs(asOffset){
    return (0.625/(1+asOffset));
}