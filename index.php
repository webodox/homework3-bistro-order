<?php
require "./order_functions.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Create Your Order - The Cozy Bistro</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<header class="site-header">
   <div class="brand">
      <svg width="48" height="48" viewBox="0 0 60 60" fill="none" stroke="#fffaf3" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
         <path d="M22 14c-2-3 2-4 0-7"/>
         <path d="M30 14c-2-3 2-4 0-7"/>
         <path d="M38 14c-2-3 2-4 0-7"/>
         <path d="M14 20h26l-2 16a6 6 0 0 1-6 5H22a6 6 0 0 1-6-5l-2-16z"/>
         <path d="M40 24c6-2 10 2 8 8s-8 6-10 4"/>
         <path d="M10 44c4 3 32 3 36 0"/>
      </svg>
      <h1>The Cozy Bistro</h1>
   </div>
   <p class="tagline">Fresh desserts, hand-picked drinks, made your way</p>
   <nav class="site-nav">
      <a href="index.php">Order Form</a>
   </nav>
</header>

<main>
   <h2>Build your order</h2>

   <div class="insight-card">
      <h3>Live guidance</h3>
      <p><?= htmlspecialchars(completionMessage()); ?></p>
      <p class="insight-note"><?= htmlspecialchars(pairingSuggestion()); ?></p>
   </div>

   <div class="insight-card pricing-grid">
      <div>
         <h3>Estimated total</h3>
         <p class="price-figure"><?= htmlspecialchars(formattedTotal()); ?></p>
      </div>
      <div>
         <h3>Order profile</h3>
         <p><?= htmlspecialchars(orderProfile()); ?></p>
      </div>
      <p class="insight-note full-width-note"><?= htmlspecialchars(pricingNote()); ?></p>
   </div>

   <form action="process_order.php" method="post">

      <fieldset>
         <legend>Dessert</legend>
         <label for="dessert">Choose a dessert</label>
         <select id="dessert" name="dessert">
            <option value="none">Select one...</option>
            <option value="Cheesecake" <?= dessertSelected("Cheesecake"); ?>>Cheesecake</option>
            <option value="Chocolate Cake" <?= dessertSelected("Chocolate Cake"); ?>>Chocolate Cake</option>
            <option value="Carrot Cake" <?= dessertSelected("Carrot Cake"); ?>>Carrot Cake</option>
            <option value="Tiramisu" <?= dessertSelected("Tiramisu"); ?>>Tiramisu</option>
         </select>
      </fieldset>

      <fieldset>
         <legend>Drink</legend>
         <label for="drink">Choose a drink</label>
         <select id="drink" name="drink">
            <option value="none">Select one...</option>
            <option value="Coffee" <?= drinkSelected("Coffee"); ?>>Coffee</option>
            <option value="Hot Chocolate" <?= drinkSelected("Hot Chocolate"); ?>>Hot Chocolate</option>
            <option value="Root Beer" <?= drinkSelected("Root Beer"); ?>>Root Beer</option>
            <option value="Tea" <?= drinkSelected("Tea"); ?>>Tea</option>
            <option value="Milk" <?= drinkSelected("Milk"); ?>>Milk</option>
         </select>
      </fieldset>

      <fieldset>
         <legend>Drink size</legend>
         <div class="radio-group">
            <label>
               <input type="radio" name="drinkSize" value="Small" <?= drinkSizeSelected("Small"); ?>>
               Small
            </label>
            <label>
               <input type="radio" name="drinkSize" value="Medium" <?= drinkSizeSelected("Medium"); ?>>
               Medium
            </label>
            <label>
               <input type="radio" name="drinkSize" value="Large" <?= drinkSizeSelected("Large"); ?>>
               Large
            </label>
         </div>
      </fieldset>

      <div class="actions">
         <button type="submit" class="btn btn-primary">Submit Order</button>
         <a href="forget_order.php" class="btn btn-secondary">Forget Saved Order</a>
      </div>
   </form>

   <div class="card">
      <h3>Your current order</h3>
      <ul class="snapshot-list">
         <li>Dessert: <?= htmlspecialchars(sessionValue('dessert')); ?></li>
         <li>Drink: <?= htmlspecialchars(sessionValue('drink')); ?></li>
         <li>Size: <?= htmlspecialchars(sessionValue('drinkSize')); ?></li>
      </ul>

      <h3>Price summary</h3>
      <p>Dessert estimate: $<?= number_format(dessertPrice(), 2); ?></p>
      <p>Drink estimate: $<?= number_format(drinkPrice(), 2); ?></p>
      <p>Total estimate: <?= htmlspecialchars(formattedTotal()); ?></p>
   </div>
</main>

<footer class="site-footer">
   <p>&#9749; The Cozy Bistro</p>
</footer>

</body>
</html>