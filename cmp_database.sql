-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2016 at 07:47 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cmp_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

DROP TABLE IF EXISTS `ingredients`;
CREATE TABLE IF NOT EXISTS `ingredients` (
  `ing_id` int(11) NOT NULL AUTO_INCREMENT,
  `short_name` varchar(20) NOT NULL,
  `display_name` varchar(75) NOT NULL,
  PRIMARY KEY (`ing_id`),
  UNIQUE KEY `short_name` (`short_name`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

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

DROP TABLE IF EXISTS `recipes`;
CREATE TABLE IF NOT EXISTS `recipes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recipe_name` varchar(75) NOT NULL,
  `recipe_body` text NOT NULL,
  `included_ingredients` set('beef','hotdogs','beans','cheese','sugar','mustard','ketchup','onion','buns','chili','broccoli','carrot','cauliflower','cabbage','potato','bbq','bell_pepper','banana','chocolate','cocoa','butter','cream_chz','vanilla','marshmallow','cone','graham','bacon') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `recipe_name` (`recipe_name`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `recipe_name`, `recipe_body`, `included_ingredients`) VALUES
(1, 'Hot Dog Cassarole', '1 large can baked beans+1 package hotdogs+1 tablespoon mustard+1 tablespoon ketchup+1 tablespoon brown sugar+1/2 medium onion##Pour beans in a baking pan or iron skillet. Slice hotdogs into 1/4-inch pieces and add to beans. Dice onions and add to beans.Add mustard, ketchup, and brown sugar. Stir until everything is mixed and cook about 30 minutes. Servings: 6-8', 'hotdogs,beans,sugar,mustard,ketchup,onion'),
(2, 'Campfire Coneys', 'hotdogs+buns+chili+shredded cheese+chopped onion+mustard##Prepare hotdogs to taste, wrap in aluminum foil and heat until done. Servings: as needed', 'hotdogs,cheese,mustard,onion,buns,chili'),
(3, 'Healthy Camp Hotdogs', 'hotdogs+chopped broccoli+chopped cauliflower+diced carrots##Place all ingredients onto a piece of foil and wrap it up tightly.  Leave two handles on the ends to pick it up with. Place in coals of fire and leave for 5-10 minutes until everything is cooked.  Salt and pepper to taste. Servings: as needed', 'hotdogs,broccoli,carrot,cauliflower'),
(4, 'Camping Bubble and Squeak', '1 small cabbage+4-6 medium potatoes+1 pound kielbasa sausages, cooked bratwurst, or hotdogs+1/4 cup water##Peel and cube the potatoes, coarse chop the cabbage, and slice the sausage. Then layer the cabbage, potatoes and sausage in a large pot or pan, repeat layers, add water and simmer until veggies are tender. This makes a complete meal in one pot. You can serve more by adding more cabbage, potatoes and sausage. Servings: 6-8', 'hotdogs,cabbage,potato'),
(5, 'Burger Boats', 'ground beef+barbecue sauce+onions, finely chopped+potatoes, finely chopped+carrots, finely chopped+salt and pepper, to taste##Lay out a square of foil. Take a handful of ground beef and shape into an oval. Make a well, or boat, in the middle. Spread about 1 tablespoon of barbecue sauce in the hamburger well. Add in vegetables, salt and pepper. Wrap up and cook until the vegetables are desired tenderness. Servings: as needed', 'beef,onion,carrot,potato,bbq'),
(6, 'Campfire Beef Pie', '2 pounds ground meat+5 medium potatoes+1 large onion, sliced+1 large green pepper, sliced+1 dash cayenne pepper+salt and pepper, to taste+1 pound of your favorite cheese##Cook the meat until brown. Drain the grease, add the potatoes, onion and pepper to the pan, and cook until tender. Season the mixture with the spices and after 2 minutes add the cheese stirring constantly.\n\nCheese is the ingredient that makes this recipe work. Do not skimp on the cheese! Servings: 6-8', 'beef,cheese,onion,potato,bell_pepper'),
(7, ' ''What''s left?'' Beef Stew', '1-2 28 oz. cans baked Beans+1 large onion+1 1/2 pounds ground chuck+pinch of pepper+dash of salt+1/2 teaspoon sugar+a splash of good BBQ sauce##Brown hamburger, start your beans, slowly add all your ingredients, then add hamburger to the mix and let simmer for 5-10 minutes. Servings: 6-8', 'beef,beans,sugar,onion,bbq'),
(8, 'Banana Boats', '1 banana+1/2 chocolate bar##Peel back one side of banana peel. Carefully cut a well into the middle of the banana and save the removed piece of banana. Break 1/2 chocolate bar into small chunks. Fill crevice with chocolate chunks. Cover chocolate with the removed piece of banana. Wrap banana in foil and allow for handles on the ends. Place on grill or coals and cook for 10-20 minutes until chocolate is melted and banana is warm. Servings: as needed', 'banana,chocolate'),
(9, 'Pass Around Fudge', '1/2 cup cocoa+1 stick margarine+3 ounces cream cheese+>1 pound box of powdered sugar+1 teaspoon vanilla##No cooking required! This recipe is made on the way to the campsite by the kids! Place all ingredients into a gallon Ziploc baggie. Squeeze all the air out of the bag and seal. Place this bag inside another gallon Ziploc baggie, squeeze out the air and seal. Make sure each bag is sealed. This is the fun part. At the beginning of your road trip, let each person start squeezing the bag. The squeezing and the warmth of the hands is mixing the fudge. When the first person is tired of squeezing, pass it to the next person. When it is all mixed well, flatten the bag and fudge out and drop into a cooler of ice when you get to your campsite or in a small cooler in the car. When it is solid, it is ready to eat. Servings: as needed', 'sugar,cocoa,butter,cream_chz,vanilla'),
(10, 'Ice Cream Cone S''mores', 'Milk Chocolate bars+marshmallows, large+ice cream cones##This is a great idea for the little ones. Roast marshmallows and take three pieces of Milk Chocolate. Put one piece of chocolate in the cone, added a roasted marshmallow, another piece of chocolate, a second marshmallow, and top it off with a piece of chocolate stuck in the top of the marshmallow. Servings: as needed', 'chocolate,marshmallow,cone'),
(11, 'Hobo Dinner', '4 medium potatoes, peeled and sliced+1/2 medium onion, sliced or diced, as desired+1 lb ground chuck+1/4 cup water+salt and pepper to taste##Add water to ground beef and mix well. Add potatoes, onion and seasoning. Mix well. Separate into 3-4 servings. Wrap in double-thickness aluminum foil. Place seam side up on medium hot grill for 40 minutes, rotating periodically. Do not flip. Open carefully. Servings: 3-4', 'beef,onion,potato');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
