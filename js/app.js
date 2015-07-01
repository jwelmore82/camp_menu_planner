var ingrHTML = $('.recipes');
var boxes = "";
var ingr;

//Create ingredients array
var ingredients = [
    ['beef', "Ground beef"],
    ['hotdogs', "Hotdogs"],
    ['cheese', "Cheese"],
    ['beans', "Baked Beans"],
    ['sugar', "Sugar (Any kind)"],
    ['mustard', "Mustard"],
    ['ketchup', "Ketchup"],
    ['onion', "Onion"],
    ['buns', "Buns or Bread"],
    ['chili', "Chili"],
    ['broccoli', "Broccoli"],
    ['carrot', "Carrots"],
    ['cauliflower', "Cauliflower"],
    ['cabbage', "Cabbage"],
    ['potato', "Potatoes"],
    ['bbq', "Barbaque Sauce"],
    ['bell_pepper', "Bell Peppers"],
    ['banana', "Bananas"],
    ['chocolate', "Chocolate (Any)"],
    ['cocoa', "Cocoa Powder"],
    ['butter', "Butter or Margarine"],
    ['cream_cheese', "Cream Cheese"],
    ['vanilla', "Vanilla Extract"],
    ['marshmallow', "Marshmallows (Any)"],
    ['cone', "Ice Cream Cones"]
]

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

//Create checkboxes

for (var i = 0; i < ingredients.length; i+=1) {
    boxes += "<label><input type='checkbox'";
    boxes += "' value='" + ingredients[i][0] + "'></input>";
    boxes += ingredients[i][1] + "</label>";
}

$('.user_input').append(boxes + "<input type='submit'></input>" );

//Selected class toggled when checkbox changed
$('.user_input').on("change", "input", function() {
    $(this).toggleClass('selected');
})


//On Tab click
//1a generate checkboxes in form. (ingredients)
//1b Show recipes with checkboxes (recipes)
//2 change active tab
$('#tabnav').on('click', 'li', function() {
    var $tabNum = $(this).attr('class');
    $('body').attr('id', $tabNum);
})

$('#tabnav').on('click', '.tab1', function() {
    $('#about').show();
    $('#tips').show();
    $('.recipes').hide();
    $('.user_input').hide();
})

$('#tabnav').on('click', '.tab2', function() {
    $('#about').hide();
    $('#tips').show();
    $('.recipes').hide();
    $('.user_input').show();
})

$('#tabnav').on('click', '.tab3', function() {
    $('#about').hide();
    $('#tips').hide();
    $('.recipes').show();
    $('.user_input').hide();
})

//Show recipes matching ingredients after submit.
$('form').submit(function(evt){
    evt.preventDefault();
            //if ingredients true show recipe div
    $(".user_input input[type=checkbox]").each(function(){
        if ($(this).hasClass('selected')){
            ingr = this.value;
            console.log("Has " + ingr);
            showRec(ingr);
        };
    });
        //if ingredients false hide recipe div
    $(".user_input input[type=checkbox]").each(function(){
        if (!$(this).hasClass('selected')){
            ingr = this.value;
            console.log("Does not have " + ingr);
            hideRec(ingr);
        };
    });
    $('#tips').hide();

});

//Show ingredients needed after select recipe.
