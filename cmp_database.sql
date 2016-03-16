-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2016 at 06:57 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cmp_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE IF NOT EXISTS `ingredients` (
  `ing_id` int(11) NOT NULL AUTO_INCREMENT,
  `short_name` varchar(20) NOT NULL,
  `display_name` varchar(75) NOT NULL,
  PRIMARY KEY (`ing_id`),
  UNIQUE KEY `short_name` (`short_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`ing_id`, `short_name`, `display_name`) VALUES
(1, 'beef', 'Ground Beef'),
(2, 'hotdogs', 'Hotdogs'),
(3, 'cheese', 'Cheese'),
(4, 'beans', 'Baked Beans'),
(5, 'sugar', 'Sugar'),
(6, 'mustard', 'Mustard'),
(7, 'ketchup', 'Ketchup'),
(8, 'onion', 'Onion'),
(9, 'buns', 'Buns or Bread'),
(10, 'chili', 'Chili'),
(11, 'broccoli', 'Broccoli'),
(12, 'carrot', 'Carrots'),
(13, 'cauliflower', 'Cauliflower'),
(14, 'cabbage', 'Cabbage'),
(15, 'potato', 'Potatoes'),
(16, 'bbq', 'Barbaque Sauce'),
(17, 'bell_pepper', 'Bell Peppers'),
(18, 'banana', 'Bananas'),
(19, 'chocolate', 'Chocolate'),
(20, 'cocoa', 'Cocoa Powder'),
(21, 'butter', 'Butter or Margarine'),
(22, 'cream_chz', 'Cream Cheese'),
(23, 'vanilla', 'Vanilla Extract'),
(24, 'marshmallow', 'Marshmallows'),
(25, 'cone', 'Ice Cream Cones'),
(26, 'graham', 'Graham Crackers'),
(27, 'bacon', 'Bacon');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE IF NOT EXISTS `recipes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recipe_name` varchar(75) NOT NULL,
  `recipe_body` text NOT NULL,
  `included_ingredients` set('beef','hotdogs','beans','cheese','sugar','mustard','ketchup','onion','buns','chili','broccoli','carrot','cauliflower','cabbage','potato','bbq','bell_pepper','banana','chocolate','cocoa','butter','cream_chz','vanilla','marshmallow','cone','graham','bacon') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `recipe_name` (`recipe_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `recipe_name`, `recipe_body`, `included_ingredients`) VALUES
(1, 'Hot Dog Cassarole', '<ul>\n    <li>1 large can baked beans</li>\n    <li>1 package hotdogs</li>\n    <li>1 tablespoon mustard</li>\n    <li>1 tablespoon ketchup</li>\n    <li>1 tablespoon brown sugar</li>\n    <li>1/2 medium onion</li>\n</ul>\n<p>Pour beans in a baking pan or iron skillet. Slice hotdogs into\n1/4-inch pieces and add to beans. Dice onions and add to beans.\nAdd mustard, ketchup, and brown sugar. Stir until everything is\nmixed and cook about 30 minutes.</p>\n<h4>Servings: 6-8</h4>', 'hotdogs,beans,sugar,mustard,ketchup,onion'),
(2, 'Campfire Coneys', '<ul>\r\n    <li>hotdogs</li>\r\n    <li>buns</li>\r\n    <li>chili</li>\r\n    <li>shredded cheese</li>\r\n    <li>chopped onion</li>\r\n    <li>mustard</li>\r\n</ul>\r\n<p>Prepare hotdogs to taste, wrap in aluminum foil and heat until done.</p>\r\n<h4>Servings: as needed</h4>', 'hotdogs,cheese,mustard,onion,buns,chili'),
(3, 'Healthy Camp Hotdogs', '<ul>\r\n    <li>hotdogs</li>\r\n    <li>chopped broccoli</li>\r\n    <li>chopped cauliflower</li>\r\n    <li>diced carrot</li>\r\n</ul>\r\n<p>Place all ingredients onto a piece of foil and wrap it up tightly.\r\n    Leave two handles on the ends to pick it up with. Place in coals\r\n    of fire and leave for 5-10 minutes until everything is cooked.\r\n    Salt and pepper to taste.</p>\r\n<h4>Servings: as needed</h4>', 'hotdogs,broccoli,carrot,cauliflower'),
(4, 'Camping Bubble and Squeak', '<ul>\r\n   <li>1 small cabbage</li>\r\n   <li>4-6 medium potatoes</li>\r\n   <li>1 pound kielbasa sausages, cooked bratwurst, or hotdogs</li>\r\n   <li>1/4 cup water</li>\r\n</ul>\r\n<p>Peel and cube the potatoes, coarse chop the cabbage, and slice the\r\n    sausage. Then layer the cabbage, potatoes and sausage in a large\r\n    pot or pan, repeat layers, add water and simmer until veggies are\r\n    tender. This makes a complete meal in one pot. You can serve more\r\n    by adding more cabbage, potatoes and sausage.</p>\r\n<h4>Servings: 6-8</h4>', 'hotdogs,cabbage,potato'),
(5, 'Burger Boat', '<ul>\r\n    <li>ground beef</li>\r\n    <li>barbecue sauce</li>\r\n    <li>onions, finely chopped</li>\r\n    <li>potatoes, finely chopped</li>\r\n    <li>carrots, finely chopped</li>\r\n    <li>salt and pepper, to taste</li>\r\n</ul>\r\n<p>Lay out a square of foil. Take a handful of ground beef and shape\r\n    into an oval. Make a well, or boat, in the middle. Spread about\r\n    1 tablespoon of barbecue sauce in the hamburger well. Add in\r\n    vegetables, salt and pepper. Wrap up and cook until the vegetables\r\n    are desired tenderness.</p>\r\n<h4>Servings: as needed</h4>', 'beef,onion,carrot,potato,bbq'),
(6, 'Campfire Beef Pie', '<ul>\r\n    <li>2 pounds ground meat</li>\r\n    <li>5 medium potatoes</li>\r\n    <li>1 large onion, sliced</li>\r\n    <li>1 large green pepper, sliced</li>\r\n    <li>1 dash cayenne pepper</li>\r\n    <li>salt and pepper, to taste</li>\r\n    <li>1 pound of your favorite cheese</li>\r\n</ul>\r\n<p>Cook the meat until brown. Drain the grease, add the potatoes, onion and pepper to the pan, and cook until tender. Season the mixture with the spices and after 2 minutes add the cheese stirring constantly.\r\n\r\nCheese is the ingredient that makes this recipe work. Do not skimp on the cheese!</p>\r\n\r\n<h4>Servings: 6-8</h4>', 'beef,cheese,onion,potato,bell_pepper'),
(7, ' &ldquo;What&rsquo;s left?&rdquo; Beef Stew', '<ul>\n    <li>1-2 28 oz. cans baked Beans</li>\n    <li>1 large onion</li>\n    <li>1 1/2 pounds ground chuck</li>\n    <li>pinch of pepper</li>\n    <li>dash of salt</li>\n    <li>1/2 teaspoon sugar</li>\n    <li>a splash of good BBQ sauce</li>\n</ul>\n<p>Brown hamburger, start your beans, slowly add all your ingredients, then add hamburger to the mix and let simmer for 5-10 minutes.</p>\n<h4>Servings: 6-8</h4>', 'beef,beans,sugar,onion,bbq'),
(8, 'Banana Boats', '<ul>\n    <li>1 banana</li>\n    <li>1/2 chocolate bar</li>\n</ul>\n<p>Peel back one side of banana peel.\nCarefully cut a well into the middle of the banana\nand save the removed piece of banana. \nBreak 1/2 chocolate bar into small chunks.\nFill crevice with chocolate chunks. \nCover chocolate with the removed piece of banana.\nWrap banana in foil and allow for handles on the ends.\nPlace on grill or coals and cook for 10-20 minutes\nuntil chocolate is melted and banana is warm.\n</p>\n<h4>Servings: as needed</h4>', 'banana,chocolate'),
(9, 'Pass Around Fudge', '<ul>\r\n    <li>1/2 cup cocoa</li>\r\n    <li>1 stick margarine</li>\r\n    <li>3 ounces cream cheese</li>\r\n    <li>1 box powdered sugar</li>\r\n    <li>1 teaspoon vanilla</li>\r\n</ul>\r\n<p>No cooking required (made on the way to the campsite by the kids).\r\n\r\nPlace all ingredients into a gallon Ziploc baggie. Squeeze all the air out of the bag and seal. \r\nPlace this bag inside another gallon Ziploc baggie, squeeze out the air and seal.\r\nMake sure each bag is sealed. This is the fun part. \r\nAt the beginning of your road trip, let each person start squeezing the bag. \r\nThe squeezing and the warmth of the hands is mixing the fudge. \r\nWhen the first person is tired of squeezing, pass it to the next person.\r\n\r\nWhen it is all mixed well, flatten the bag and fudge out and \r\ndrop into a cooler of ice when you get to your campsite or \r\nin a small cooler in the car. When it is solid, it is ready to eat.\r\n</p>\r\n<h4>Servings: as needed</h4>', 'sugar,cocoa,butter,cream_chz,vanilla'),
(10, 'Ice Cream Cone S&rsquo;mores', '<ul>\r\n    <li>Milk Chocolate bars</li>\r\n    <li>marshmallows, large</li>\r\n    <li>ice cream cones</li>\r\n</ul>\r\n<p>This is a great idea for the little ones. \r\nRoast marshmallows and take three pieces of Milk Chocolate. \r\nPut one piece of chocolate in the cone, added a roasted marshmallow, \r\nanother piece of chocolate, a second marshmallow, and top it off with \r\na piece of chocolate stuck in the top of the marshmallow.\r\n</p>\r\n<h4>Servings: as needed</h4>', 'chocolate,marshmallow,cone'),
(11, 'Hobo Dinner', '<ul>\n    <li>4 medium potatoes, peeled and sliced</li>\n    <li>1/2 medium onion, sliced or diced, as desired</li>\n    <li>1 lb ground chuck</li>\n    <li>1/4 cup water</li>\n    <li>salt and pepper to taste</li>\n</ul>\n<p>Add water to ground beef and mix well. \nAdd potatoes, onion and seasoning. Mix well. \nSeparate into 3-4 servings. Wrap in double-thickness aluminum foil. \nPlace seam side up on medium hot grill for 40 minutes, rotating periodically. \nDo not flip. Open carefully.</p>\n<h4>Servings: 3-4</h4>', 'beef,onion,potato');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
