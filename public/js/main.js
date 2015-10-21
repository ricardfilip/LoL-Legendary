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
    adBase = parseFloat($("#ad .base").text());
    armorBase = parseFloat($("#armor .base").text());
    mrBase = parseFloat($("#mr .base").text());
    asBase = parseFloat($("#as .base").text());
});

function UpdateStatsPerLevel() {
    //Get the level selected on the dropdown list
    //Get the table stats elements
    var lvlSelected = $("#dropdown-lvl option:selected").val();

    //AD CALCULATIONS
    var adPerLevel = $("#ad .perlevel").text();
    adResult = calculateGrowthStat(adBase,adPerLevel,lvlSelected);
    $("#ad .base").text(Math.round(parseFloat(adResult)));

    //armor CALCULATIONS
    var armorPerLevel = $("#armor .perlevel").text();
    armorResult = calculateGrowthStat(armorBase,armorPerLevel,lvlSelected);
    $("#armor .base").text(Math.round(parseFloat(armorResult)));

    //magic resistance CALCULATIONS
    var mrPerLevel = $("#mr .perlevel").text();
    mrResult = calculateGrowthStat(mrBase,mrPerLevel,lvlSelected);
    $("#mr .base").text(Math.round(parseFloat(mrResult)));

    //attack speed CALCULATIONS
    var asPerLevel = $("#as .perlevel").text();
    asResult = calculateGrowthStat(getBaseAs(asBase),asPerLevel,lvlSelected);
    $("#as .base").text(Math.round(parseFloat(asResult)));
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