@@ -0,0 +1,206 @@
<?php
    require 'inc/functions.php';
    require 'inc/header.php';
 ?>

        <div id="about">
            <h3>About the Site</h3>
            <p>Have some food at camp but not sure what to make? Want to try some
                 recipes and need a shopping list? You're in the right place! The
                  Camp Menu Planner will suggest recipes based on your selected
                   ingredients. As an alternative you can browse recipes, select
                    your favorites, and generate a shopping list. </p>
        </div>
        <div id="tips">
            <h3>General Camp Cooking Tips</h3>
            <img src="img/field_kitchen.gif" alt="Field Kitchen" width="200" />
            <div>
                <h4>Prepare your meals</h4>
                <p>Be sure to check your ingredients before you make it to your
                campsite. You may have food in your pantry you wouldn't normally
                think to take camping.</p>
            </div>
            <div>
                <h4>Do your prep at home</h4>
                <p>Many items, such as chopped onions, can be prepared at home
                     and kept in reusable containers.</p>
            </div>
            <div>
                <h4>Hydrate!</h4>
                <p>Camping and outdoor activities in high tempuratures
                    can drain you quickly, keep plenty of cold drinking water in
                    camp.</p>
            </div>
            <div>
                <h4>Aluminum Foil</h4>
                <p>Aluminum foil is extremely useful and versitile for camp cooking.
                    Keep some with your camp kitchen items at all times.</p>
            </div>
            <div>
                <h4>Spice it up</h4>
                <p>Keep a portable spice set with your camp larder.  These can
                    be found in the camping section at many retail stores, or
                    <a href="https://www.google.com/webhp?sourceid=chrome-instant&amp;ion=1&amp;espv=2&amp;ie=UTF-8#q=camping+spice+kit+DIY">
                    click here
                    for some DIY ideas.</a>
                </p>
            </div>
        </div>
        <!-- <div class="recipes beans hotdogs mustard ketchup sugar onion" id="hotdog_cassarole">
            <h3>Hot Dog Casserole</h3>
            <ul>

                <li>1 large can baked beans</li>
                <li>1 package hotdogs</li>
                <li>1 tablespoon mustard</li>
                <li>1 tablespoon ketchup</li>
                <li>1 tablespoon brown sugar</li>
                <li>1/2 medium onion</li>
            </ul>
            <p>Pour beans in a baking pan or iron skillet. Slice hotdogs into
                1/4-inch pieces and add to beans. Dice onions and add to beans.
                Add mustard, ketchup, and brown sugar. Stir until everything is
                mixed and cook about 30 minutes.</p>
            <h4>Servings: 6-8</h4>
        </div>
        <div class="recipes hotdogs buns chili cheese onion mustard">
            <h3>Campfire Coneys</h3>
            <ul>
                <li>hotdogs</li>
                <li>buns</li>
                <li>chili</li>
                <li>shredded cheese</li>
                <li>chopped onion</li>
                <li>mustard</li>
            </ul>
            <p>Prepare hotdogs to taste, wrap in aluminum foil and heat until done.</p>
            <h4>Servings: as needed</h4>
        </div>
        <div class="recipes hotdogs broccoli carrot cauliflower" id="healthy_hotdogs">
            <h3>Healthy Camp Hotdogs</h3>
            <ul>
                <li>hotdogs</li>
                <li>chopped broccoli</li>
                <li>chopped cauliflower</li>
                <li>diced carrot</li>
            </ul>
            <p>Place all ingredients onto a piece of foil and wrap it up tightly.
                Leave two handles on the ends to pick it up with. Place in coals
                of fire and leave for 5-10 minutes until everything is cooked.
                Salt and pepper to taste.</p>
            <h4>Servings: as needed</h4>
        </div>
        <div class="recipes cabbage potato hotdogs">
            <h3>Camping Bubble and Squeak</h3>
            <ul>
               <li>1 small cabbage</li>
               <li>4-6 medium potatoes</li>
               <li>1 pound kielbasa sausages, cooked bratwurst, or hotdogs</li>
               <li>1/4 cup water</li>
            </ul>
            <p>Peel and cube the potatoes, coarse chop the cabbage, and slice the
                sausage. Then layer the cabbage, potatoes and sausage in a large
                pot or pan, repeat layers, add water and simmer until veggies are
                tender. This makes a complete meal in one pot. You can serve more
                by adding more cabbage, potatoes and sausage.</p>
            <h4>Servings: 6-8</h4>
        </div>
        <div class="recipes beef bbq onion potato carrot">
            <h3>Burger Boat:</h3>
            <ul>
                <li>ground beef</li>
                <li>barbecue sauce</li>
                <li>onions, finely chopped</li>
                <li>potatoes, finely chopped</li>
                <li>carrots, finely chopped</li>
                <li>salt and pepper, to taste</li>
            </ul>
            <p>Lay out a square of foil. Take a handful of ground beef and shape
                into an oval. Make a well, or boat, in the middle. Spread about
                1 tablespoon of barbecue sauce in the hamburger well. Add in
                vegetables, salt and pepper. Wrap up and cook until the vegetables
                are desired tenderness.</p>
            <h4>Servings: as needed</h4>
        </div>
        <div class="recipes beef potato onion bell_pepper cheese">
            <h3>Campfire Beef Pie</h3>
            <ul>
                <li>2 pounds ground meat</li>
                <li>5 medium potatoes</li>
                <li>1 large onion, sliced</li>
                <li>1 large green pepper, sliced</li>
                <li>1 dash cayenne pepper</li>
                <li>salt and pepper, to taste</li>
                <li>1 pound of your favorite cheese</li>
            </ul>
            <p>Cook the meat until brown. Drain the grease, add the potatoes, onion and pepper to the pan, and cook until tender. Season the mixture with the spices and after 2 minutes add the cheese stirring constantly.

            Cheese is the ingredient that makes this recipe work. Do not skimp on the cheese!</p>

            <h4>Servings: 6-8</h4>
        </div>
        <div class="recipes beans onion beef sugar bbq">
            <h3>"What’s left?" Beef Stew</h3>
            <ul>
                <li>1-2 28 oz. cans baked Beans</li>
                <li>1 large onion</li>
                <li>1 1/2 pounds ground chuck</li>
                <li>pinch of pepper</li>
                <li>dash of salt</li>
                <li>bacon bits</li>
                <li>1/2 teaspoon sugar</li>
                <li>a splash of good BBQ sauce</li>
            </ul>
            <p>Brown hamburger, start your beans, slowly add all your ingredients, then add hamburger to the mix and let simmer for 5-10 minutes.</p>
        </div>
        <div class="recipes banana chocolate">
            <h3>Banana Boats</h3>
            <ul>
                <li>1 banana</li>
                <li>1/2 chocolate bar</li>
            </ul>
            <p>Peel back one side of banana peel. Carefully cut a well into the middle of the banana and save the removed piece of banana. Break 1/2 chocolate bar into small chunks. Fill crevice with chocolate chunks. Cover chocolate with the removed piece of banana. Wrap banana in foil and allow for handles on the ends. Place on grill or coals and cook for 10-20 minutes until chocolate is melted and banana is warm.

            Servings: as needed</p>
        </div>
        <div class="recipes cocoa butter cream_cheese sugar vanilla">
            <h3>Pass Around Fudge</h3>
            <ul>
                <li>1/2 cup cocoa</li>
                <li>1 stick margarine</li>
                <li>3 ounces cream cheese</li>
                <li>1 box powdered sugar</li>
                <li>1 teaspoon vanilla</li>
            </ul>
            <p>No cooking required (made on the way to the campsite by the kids).

            Place all ingredients into a gallon Ziploc baggie. Squeeze all the air out of the bag and seal. Place this bag inside another gallon Ziploc baggie, squeeze out the air and seal. Make sure each bag is sealed. This is the fun part. At the beginning of your road trip, let each person start squeezing the bag. The squeezing and the warmth of the hands is mixing the fudge. When the first person is tired of squeezing, pass it to the next person.

            When it is all mixed well, flatten the bag and fudge out and drop into a cooler of ice when you get to your campsite or in a small cooler in the car. When it is solid, it is ready to eat.

            Servings: as needed</p>
        </div>
        <div class="recipes chocolate marshmallow cone">
            <h3>Ice Cream Cone S’mores</h3>
            <ul>
                <li>Hershey's Milk Chocolate bars</li>
                <li>marshmallows, large</li>
                <li>ice cream cones</li>
            </ul>
            <p>This is a great idea for the little ones. Roast marshmallows and take three pieces of Hershey's Milk Chocolate. Put one piece of chocolate in the cone, added a roasted marshmallow, another piece of chocolate, a second marshmallow, and topped it off with a piece of chocolate stuck in the top of the marshmallow.

            Servings: as needed</p>
        </div>
        <div class="recipes potato onion beef">
            <h3>Hobo Dinner</h3>
            <ul>
                <li>4 medium potatoes, peeled and sliced</li>
                <li>1/2 medium onion, sliced or diced, as desired</li>
                <li>1 lb ground chuck</li>
                <li>1/4 cup water</li>
                <li>salt and pepper to taste</li>
            </ul>
            <p>Add water to ground beef and mix well. Add potatoes, onion and seasoning. Mix well. Separate into 3-4 servings. Wrap in double-thickness aluminum foil. Place seam side up on medium hot grill for 40 minutes, rotating periodically. Do not flip. Open carefully. Serve with ketchup.</p>
        </div> -->

<?php require 'inc/footer.php'; ?>