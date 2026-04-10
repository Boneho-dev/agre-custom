<?php
include 'includes/header.php';
include 'includes/cart_logic.php';

// Redirection si panier vide
if (empty($_SESSION['cart']) || getCartCount() === 0) {
  echo "<script>window.location.href='index.php';</script>";
  exit;
}

$cart = $_SESSION['cart'];
$total = getCartTotal();
$count = getCartCount();

// Récupérer les erreurs et données précédentes
$checkoutErrors = $_SESSION['checkout_errors'] ?? [];
$checkoutData   = $_SESSION['checkout_data']   ?? [];
unset($_SESSION['checkout_errors'], $_SESSION['checkout_data']);
?>

<!-- Breadcrumb -->
<nav class="bg-luxury-cream py-4 border-b border-luxury-sand/30">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center space-x-2 text-sm">
      <a href="index.php" class="text-luxury-charcoal/60 hover:text-luxury-gold transition-colors">Accueil</a>
      <i class="fas fa-chevron-right text-luxury-charcoal/40 text-xs"></i>
      <a href="cart.php" class="text-luxury-charcoal/60 hover:text-luxury-gold transition-colors">Panier</a>
      <i class="fas fa-chevron-right text-luxury-charcoal/40 text-xs"></i>
      <span class="text-luxury-gold font-semibold">Checkout</span>
    </div>
  </div>
</nav>

<!-- Checkout Section -->
<section class="py-8 md:py-16 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-8 md:mb-12">
      <h1 class="text-3xl md:text-4xl font-bold text-luxury-charcoal font-display mb-3">Finaliser votre commande</h1>
      <p class="text-luxury-charcoal/60"><?php echo $count; ?> article<?php echo $count > 1 ? 's' : ''; ?> dans votre panier</p>
    </div>

    <?php if (!empty($checkoutErrors)): ?>
      <div class="max-w-2xl mx-auto mb-8 bg-red-50 border border-red-200 rounded-3xl p-5 flex items-start space-x-4">
        <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center flex-shrink-0">
          <i class="fas fa-exclamation-triangle text-red-500"></i>
        </div>
        <div>
          <p class="font-semibold text-red-700 mb-1">Veuillez corriger les erreurs suivantes :</p>
          <ul class="list-disc list-inside text-red-600 text-sm space-y-1">
            <?php foreach ($checkoutErrors as $err): ?>
              <li><?php echo htmlspecialchars($err); ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    <?php endif; ?>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">
      <!-- Left Column - Form -->
      <div class="order-2 lg:order-1">
        <form id="checkout-form" action="process_order.php" method="POST" class="space-y-6">
          <input type="hidden" name="place_order" value="1">
          <!-- Contact Information -->
          <div class="bg-luxury-cream rounded-3xl p-6 md:p-8 shadow-soft border border-luxury-sand/30">
            <h2 class="text-xl md:text-2xl font-bold text-luxury-charcoal font-display mb-6 flex items-center">
              <span class="w-10 h-10 bg-luxury-gold/20 rounded-full flex items-center justify-center mr-3">
                <i class="fas fa-user text-luxury-gold"></i>
              </span>
              Informations de contact
            </h2>

            <div class="space-y-4">
              <div>
                <label for="email" class="block text-sm font-semibold text-luxury-charcoal mb-2">Email *</label>
                <input type="email" id="email" name="email" required
                  class="w-full px-4 py-3 md:py-4 rounded-2xl border-2 border-luxury-sand/50 bg-white focus:border-luxury-gold focus:ring-2 focus:ring-luxury-gold/20 transition-all text-base md:text-lg"
                  placeholder="votre@email.com"
                  value="<?php echo htmlspecialchars($checkoutData['email'] ?? ''); ?>">
              </div>

              <div>
                <label for="phone" class="block text-sm font-semibold text-luxury-charcoal mb-2">Téléphone *</label>
                <input type="tel" id="phone" name="phone" required
                  class="w-full px-4 py-3 md:py-4 rounded-2xl border-2 border-luxury-sand/50 bg-white focus:border-luxury-gold focus:ring-2 focus:ring-luxury-gold/20 transition-all text-base md:text-lg"
                  placeholder="+33 6 12 34 56 78"
                  value="<?php echo htmlspecialchars($checkoutData['phone'] ?? ''); ?>">
              </div>
            </div>
          </div>

          <!-- Shipping Address -->
          <div class="bg-luxury-cream rounded-3xl p-6 md:p-8 shadow-soft border border-luxury-sand/30">
            <h2 class="text-xl md:text-2xl font-bold text-luxury-charcoal font-display mb-6 flex items-center">
              <span class="w-10 h-10 bg-luxury-gold/20 rounded-full flex items-center justify-center mr-3">
                <i class="fas fa-map-marker-alt text-luxury-gold"></i>
              </span>
              Adresse de livraison
            </h2>

            <div class="space-y-4">
              <div>
                <label for="fullname" class="block text-sm font-semibold text-luxury-charcoal mb-2">Nom complet *</label>
                <input type="text" id="fullname" name="fullname" required
                  class="w-full px-4 py-3 md:py-4 rounded-2xl border-2 border-luxury-sand/50 bg-white focus:border-luxury-gold focus:ring-2 focus:ring-luxury-gold/20 transition-all text-base md:text-lg"
                  placeholder="Jean Dupont"
                  value="<?php echo htmlspecialchars($checkoutData['fullname'] ?? ''); ?>">
              </div>

              <div>
                <label for="address" class="block text-sm font-semibold text-luxury-charcoal mb-2">Adresse *</label>
                <input type="text" id="address" name="address" required
                  class="w-full px-4 py-3 md:py-4 rounded-2xl border-2 border-luxury-sand/50 bg-white focus:border-luxury-gold focus:ring-2 focus:ring-luxury-gold/20 transition-all text-base md:text-lg"
                  placeholder="8 Boulevard Victor Beaussier"
                  value="<?php echo htmlspecialchars($checkoutData['address'] ?? ''); ?>">
              </div>

              <div class="grid grid-cols-2 gap-4">
                <div>
                  <label for="city" class="block text-sm font-semibold text-luxury-charcoal mb-2">Ville *</label>
                  <input type="text" id="city" name="city" required
                    class="w-full px-4 py-3 md:py-4 rounded-2xl border-2 border-luxury-sand/50 bg-white focus:border-luxury-gold focus:ring-2 focus:ring-luxury-gold/20 transition-all text-base md:text-lg"
                    placeholder="Angers"
                    value="<?php echo htmlspecialchars($checkoutData['city'] ?? ''); ?>">
                </div>
                <div>
                  <label for="zipcode" class="block text-sm font-semibold text-luxury-charcoal mb-2">Code postal *</label>
                  <input type="text" id="zipcode" name="zipcode" required
                    class="w-full px-4 py-3 md:py-4 rounded-2xl border-2 border-luxury-sand/50 bg-white focus:border-luxury-gold focus:ring-2 focus:ring-luxury-gold/20 transition-all text-base md:text-lg"
                    placeholder="49000"
                    value="<?php echo htmlspecialchars($checkoutData['zipcode'] ?? ''); ?>">
                </div>
              </div>
            </div>
          </div>

          <!-- Payment Method -->
          <div class="bg-luxury-cream rounded-3xl p-6 md:p-8 shadow-soft border border-luxury-sand/30">
            <h2 class="text-xl md:text-2xl font-bold text-luxury-charcoal font-display mb-6 flex items-center">
              <span class="w-10 h-10 bg-luxury-gold/20 rounded-full flex items-center justify-center mr-3">
                <i class="fas fa-credit-card text-luxury-gold"></i>
              </span>
              Mode de paiement
            </h2>

            <div class="space-y-3">
              <label class="flex items-center p-4 bg-white rounded-2xl border-2 border-luxury-gold cursor-pointer transition-all hover:shadow-md">
                <input type="radio" name="payment" value="card" checked class="w-5 h-5 text-luxury-gold mr-4">
                <div class="flex-grow">
                  <span class="font-semibold text-luxury-charcoal">Carte bancaire</span>
                  <p class="text-sm text-luxury-charcoal/60">Paiement sécurisé par Stripe</p>
                </div>
                <div class="flex space-x-2 text-2xl">
                  <i class="fab fa-cc-visa text-blue-600"></i>
                  <i class="fab fa-cc-mastercard text-red-600"></i>
                </div>
              </label>

              <label class="flex items-center p-4 bg-white rounded-2xl border-2 border-luxury-sand/50 cursor-pointer transition-all hover:border-luxury-gold hover:shadow-md">
                <input type="radio" name="payment" value="paypal" class="w-5 h-5 text-luxury-gold mr-4">
                <div class="flex-grow">
                  <span class="font-semibold text-luxury-charcoal">PayPal</span>
                  <p class="text-sm text-luxury-charcoal/60">Paiement rapide et sécurisé</p>
                </div>
                <i class="fab fa-paypal text-2xl text-blue-800"></i>
              </label>
            </div>
          </div>

          <!-- Mobile Submit Button -->
          <div class="lg:hidden">
            <button type="submit" name="place_order"
              class="w-full py-4 px-6 bg-luxury-gold hover:bg-[#C4A030] text-luxury-charcoal font-bold text-lg rounded-2xl transition-all duration-300 transform hover:scale-[1.02] hover:shadow-lg hover:shadow-luxury-gold/30 active:scale-[0.98] shadow-soft">
              <i class="fas fa-lock mr-2"></i>
              Confirmer la commande - <?php echo number_format($total, 2, ',', ' '); ?> €
            </button>
          </div>
        </form>
      </div>

      <!-- Right Column - Order Summary -->
      <div class="order-1 lg:order-2">
        <div class="bg-luxury-charcoal text-white rounded-3xl p-6 md:p-8 shadow-soft-lg sticky top-4">
          <h2 class="text-xl md:text-2xl font-bold font-display mb-6 flex items-center">
            <i class="fas fa-shopping-bag text-luxury-gold mr-3"></i>
            Résumé de la commande
          </h2>

          <!-- Cart Items -->
          <div class="space-y-4 mb-6 max-h-64 overflow-y-auto pr-2 custom-scrollbar">
            <?php foreach ($cart as $productId => $item): ?>
              <div class="flex items-center space-x-4 bg-white/10 rounded-2xl p-3">
                <div class="w-16 h-16 rounded-xl overflow-hidden flex-shrink-0">
                  <img src="<?php echo $item['image']; ?>" alt="<?php echo htmlspecialchars($item['name']); ?>" class="w-full h-full object-cover">
                </div>
                <div class="flex-grow min-w-0">
                  <h4 class="font-semibold text-sm truncate"><?php echo htmlspecialchars($item['name']); ?></h4>
                  <p class="text-white/60 text-xs">Qté: <?php echo $item['quantity']; ?></p>
                </div>
                <div class="text-right flex-shrink-0">
                  <p class="font-bold text-luxury-gold"><?php echo number_format($item['price'] * $item['quantity'], 2, ',', ' '); ?> €</p>
                </div>
              </div>
            <?php endforeach; ?>
          </div>

          <!-- Totals -->
          <div class="border-t border-white/20 pt-4 space-y-3">
            <div class="flex justify-between items-center">
              <span class="text-white/70">Sous-total</span>
              <span class="font-semibold"><?php echo number_format($total, 2, ',', ' '); ?> €</span>
            </div>
            <div class="flex justify-between items-center">
              <span class="text-white/70">Livraison</span>
              <span class="font-semibold text-luxury-gold">Gratuite</span>
            </div>
            <div class="border-t border-white/20 pt-3">
              <div class="flex justify-between items-center">
                <span class="text-lg font-bold">Total</span>
                <span class="text-2xl font-bold text-luxury-gold"><?php echo number_format($total, 2, ',', ' '); ?> €</span>
              </div>
            </div>
          </div>

          <!-- Desktop Submit Button -->
          <div class="hidden lg:block mt-6">
            <button type="submit" name="place_order" form="checkout-form"
              class="w-full py-4 px-6 bg-luxury-gold hover:bg-[#C4A030] text-luxury-charcoal font-bold text-lg rounded-2xl transition-all duration-300 transform hover:scale-[1.02] hover:shadow-lg hover:shadow-luxury-gold/30 active:scale-[0.98]">
              <i class="fas fa-lock mr-2"></i>
              Confirmer la commande
            </button>
          </div>

          <p class="text-center text-white/50 text-sm mt-4">
            <i class="fas fa-shield-alt mr-1"></i>
            Paiement 100% sécurisé
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
  /* Custom scrollbar for cart items */
  .custom-scrollbar::-webkit-scrollbar {
    width: 6px;
  }

  .custom-scrollbar::-webkit-scrollbar-track {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 3px;
  }

  .custom-scrollbar::-webkit-scrollbar-thumb {
    background: #D4AF37;
    border-radius: 3px;
  }
</style>

<?php include 'includes/footer.php'; ?>