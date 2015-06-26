// Hide recipes and ingredients until needed.
$('.recipes').hide();
$('.user_input').hide();

var ingrHTML = $('.recipes');
var boxes = "";
var ingr;

//Create ingredients array
var ingredients = [
    [ 'beef', "Ground beef"],
    [ 'hotdogs', "Hotdogs"],
    [ 'cheese', "Cheese"]
]


//On Tab click
//1a generate checkboxes in form. (ingredients)
//1b Show recipes with checkboxes (recipes)
//2 change active tab
$('#tabnav').on('click', 'a', function() {
    var $tabNum = $(this).parent().attr('class');
    $('body').attr('id', $tabNum);
})

$('#tabnav').on('click', '.tab1 a', function() {
    $('#about').show();
    $('#tips').show();
    $('.recipes').hide();
    $('.user_input').hide();
})

$('#tabnav').on('click', '.tab2 a', function() {
    $('#about').hide();
    $('#tips').show();
    $('.recipes').hide();
    $('.user_input').show();
})

$('#tabnav').on('click', '.tab3 a', function() {
    $('#about').hide();
    $('#tips').hide();
    $('.recipes').show();
    $('.user_input').hide();
})

//Function used to show recipes!

function showRec(item) {
    for (var i = 0; i < ingrHTML.length; i++) {
        if ($(ingrHTML[i]).hasClass(item)){
            $(ingrHTML[i]).show();
        };
    }
}
//Function to hide recipes!
function hideRec(item) {
    for (var i = 0; i < ingrHTML.length; i++) {
        if ($(ingrHTML[i]).hasClass(item)){
            $(ingrHTML[i]).hide();
        };
    }
}



for (var i = 0; i < ingredients.length; i+=1) {
    boxes += "<input type='checkbox' name='";
    boxes += ingredients[i][0] + "' value='" + ingredients[i][0] + "'></input>";
    boxes += "<label for='" + ingredients[i][0] + "'>";
    boxes += ingredients[i][1] + "</label>";
}

$('.user_input').append(boxes + "<input type='submit'></input>" );

$('.user_input').on("change", "input", function() {
    $(this).toggleClass('selected');
})
//Assign all recipes classes based on ingredients

//Show recipes matching ingredients after submit.
$('form').submit(function(evt){
    evt.preventDefault();
            //if ingredients true show recipe div
    $(".user_input input[type=checkbox]").each(function(){
        if ($(this).hasClass('selected')){
            ingr = this.name;
            console.log("Has " + ingr);
            showRec(ingr);
        };
    });
        //if ingredients false hide recipe div
    $(".user_input input[type=checkbox]").each(function(){
        if (!$(this).hasClass('selected')){
            ingr = this.name;
            console.log("Does not have " + ingr);
            hideRec(ingr);
        };
    });
    $('#tips').hide();

});

//Show ingredients needed after select recipe.
