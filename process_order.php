<?php
require "./order_functions.php";
$orderSummary = order();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Latest Receipt - Bistro Order Form</title>
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
   <h2>Your order receipt</h2>

   <div class="receipt-card"><?= $orderSummary; ?></div>

   <div class="insight-card">
      <h3>Order feedback</h3>
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

   <div class="actions">
      <a href="index.php" class="btn btn-primary">Order Again</a>
      <a href="forget_order.php" class="btn btn-secondary">Forget Order</a>
   </div>
</main>

<footer class="site-footer">
   <p>&#9749; The Cozy Bistro</p>
</footer>

</body>
</html>