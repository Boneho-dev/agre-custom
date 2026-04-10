<?php include 'includes/header.php'; ?>

<?php
// Données des produits - Catégories
$products = [
  'manteaux' => [
    'title' => 'Manteaux d\'hiver imperméables',
    'subtitle' => 'Protection élégante contre le froid',
    'color' => 'text-luxury-gold',
    'items' => [
      [
        'id' => 'mant_001',
        'name' => 'Manteau Royal Enfant',
        'description' => 'Manteau imperméable doublé polaire',
        'price' => 59.90,
        'image' => 'assets/img_2/mant_1-min.jpg?v=2',
        'badge' => 'Best-seller'
      ],
      [
        'id' => 'mant_002',
        'name' => 'Parka Petit Aventurier',
        'description' => 'Capuche amovible, coupe-vent',
        'price' => 59.90,
        'image' => 'assets/img_2/mant_2-min.jpg?v=2',
        'badge' => null
      ],
      [
        'id' => 'mant_003',
        'name' => 'Doudoune Premium Junior',
        'description' => 'Chaleur ultra-légère',
        'price' => 59.90,
        'image' => 'assets/img_2/mant_3-min.jpg?v=2',
        'badge' => 'Nouveau'
      ]
    ]
  ],
  'accessoires' => [
    'title' => 'Bonnets & Gants assortis',
    'subtitle' => 'Accessoires coordonnés pour petits élégants',
    'color' => 'text-purple-500',
    'items' => [
      [
        'id' => 'acc_001',
        'name' => 'Ensemble Douceur Hiver',
        'description' => 'Bonnet + gants en laine mérinos',
        'price' => 34.90,
        'image' => 'assets/img_2/bonet_1-min.jpg?v=2',
        'badge' => 'Pack'
      ],
      [
        'id' => 'acc_002',
        'name' => 'Set Cozy Enfant',
        'description' => 'Doublure polaire ultra-douce',
        'price' => 34.90,
        'image' => 'assets/img_2/bonet_1-min.jpg?v=2',
        'badge' => null
      ],
      [
        'id' => 'acc_003',
        'name' => 'Accessoires Color Fun',
        'description' => 'Coloris pastel tendance',
        'price' => 34.90,
        'image' => 'assets/img_2/bonet_2-min.jpg?v=2',
        'badge' => 'Populaire'
      ]
    ]
  ],
  'echarpes' => [
    'title' => 'Écharpes en polaire douce',
    'subtitle' => 'Confort et chaleur au quotidien',
    'color' => 'text-lime-600',
    'items' => [
      [
        'id' => 'ech_001',
        'name' => 'Écharpe Cozy Classic',
        'description' => 'Polaire anti-boulochage',
        'price' => 29.90,
        'image' => 'assets/img_2/echap_2-min.jpg?v=2',
        'badge' => null
      ],
      [
        'id' => 'ech_002',
        'name' => 'Snood Enfant Confort',
        'description' => 'Enfilage facile, chaleur optimale',
        'price' => 29.90,
        'image' => 'assets/img_2/echap_3-min.jpg?v=2',
        'badge' => 'Facile'
      ],
      [
        'id' => 'ech_003',
        'name' => 'Tour de cou Premium',
        'description' => 'Double épaisseur réversible',
        'price' => 29.90,
        'image' => 'assets/img_2/echap_2-min.jpg?v=2',
        'badge' => '2 en 1'
      ]
    ]
  ]
];

// Fonction pour formater le prix
function formatPrice($price)
{
  return number_format($price, 2, ',', ' ') . ' €';
}
?>

<!-- Hero Section -->
<section id="home" class="hero-gradient min-h-screen flex items-center relative overflow-hidden">
  <div class="absolute inset-0 opacity-30">
    <div class="absolute top-20 left-10 w-72 h-72 bg-luxury-blue rounded-full mix-blend-multiply filter blur-xl animate-pulse"></div>
    <div class="absolute bottom-20 right-10 w-72 h-72 bg-luxury-rose rounded-full mix-blend-multiply filter blur-xl animate-pulse" style="animation-delay: 1s;"></div>
  </div>

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 relative z-10">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
      <!-- Text Content -->
      <div class="space-y-6">
        <div class="inline-flex items-center px-4 py-2 bg-luxury-gold/20 rounded-full text-luxury-gold text-sm font-semibold">
          <span class="w-2 h-2 bg-luxury-gold rounded-full mr-2 animate-pulse"></span>
          Collection Hiver 2026
        </div>

        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-luxury-charcoal leading-tight font-display">
          Hiver magique pour vos <span class="text-luxury-gold">petits aventuriers</span> !
        </h1>

        <h2 class="text-xl md:text-2xl text-luxury-charcoal/80 font-medium">
          <span class="bg-luxury-gold/20 px-2 py-1 rounded-lg text-luxury-gold font-semibold">-20€</span>
          sur TOUTE votre commande
        </h2>

        <p class="text-lg text-luxury-charcoal/70 max-w-xl leading-relaxed">
          Découvrez notre collection hivernale premium pour enfants : manteaux, pulls et accessoires pensés pour leur offrir confort et élégance.
          Livraison gratuite à Angers en 24-48h !
        </p>

        <div class="flex flex-col sm:flex-row gap-4 pt-4">
          <a href="#products"
            class="inline-flex items-center justify-center px-8 py-4 bg-luxury-gold hover:bg-luxury-gold-light text-luxury-charcoal font-semibold rounded-2xl transition-all transform hover:scale-[1.02] shadow-lg shadow-luxury-gold/25">
            Découvrir la collection
            <i class="fas fa-arrow-right ml-2"></i>
          </a>
          <a href="#contact"
            class="inline-flex items-center justify-center px-8 py-4 bg-white hover:bg-luxury-beige text-luxury-charcoal font-semibold rounded-2xl transition-all border-2 border-luxury-sand">
            Nous contacter
          </a>
        </div>

        <!-- Trust Badges -->
        <div class="flex items-center space-x-6 pt-6 text-sm text-luxury-charcoal/60">
          <div class="flex items-center">
            <i class="fas fa-truck mr-2 text-luxury-gold"></i>
            Livraison 24-48h
          </div>
          <div class="flex items-center">
            <i class="fas fa-shield-alt mr-2 text-luxury-gold"></i>
            Paiement sécurisé
          </div>
          <div class="flex items-center">
            <i class="fas fa-undo mr-2 text-luxury-gold"></i>
            Retour facile
          </div>
        </div>
      </div>

      <!-- Hero Image -->
      <div class="relative flex justify-center lg:justify-end">
        <div class="relative">
          <div class="absolute inset-0 bg-luxury-gold/20 rounded-full filter blur-3xl transform scale-110"></div>
          <img src="assets/img_2/Logo_png_fond.png?v=2"
            alt="AGRE Custom Collection"
            class="relative z-10 w-full max-w-md drop-shadow-2xl transform hover:scale-105 transition-transform duration-500">
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Products Section -->
<section id="products" class="py-20 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <!-- Section Header -->
    <div class="text-center mb-16">
      <span class="text-luxury-gold font-semibold tracking-wider uppercase text-sm">Notre Collection</span>
      <h2 class="text-3xl md:text-4xl font-bold text-luxury-charcoal mt-2 font-display">
        Vêtements de luxe pour enfants
      </h2>
      <p class="text-luxury-charcoal/60 mt-4 max-w-2xl mx-auto">
        Chaque pièce est sélectionnée avec soin pour allier confort, qualité et style.
        Des matériaux premium pour vos petits trésors.
      </p>
    </div>

    <?php foreach ($products as $categoryKey => $category): ?>
      <!-- <?php echo $category['title']; ?> -->
      <div class="mb-20">
        <div class="text-center mb-10">
          <h3 class="text-2xl md:text-3xl font-bold <?php echo $category['color']; ?> font-display mb-2">
            <?php echo $category['title']; ?>
          </h3>
          <p class="text-luxury-charcoal/60 italic"><?php echo $category['subtitle']; ?></p>
        </div>

        <!-- Products Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <?php foreach ($category['items'] as $product): ?>
            <div class="product-card bg-luxury-cream rounded-3xl overflow-hidden shadow-soft border border-luxury-sand/30">
              <!-- Product Image -->
              <div class="product-image-container relative aspect-square bg-luxury-beige cursor-pointer" onclick="openProductModal('<?php echo $product['id']; ?>', '<?php echo $product['name']; ?>', '<?php echo $product['description']; ?>', <?php echo $product['price']; ?>, '<?php echo $product['image']; ?>', '<?php echo $product['badge'] ?? ''; ?>')">
                <img src="<?php echo $product['image']; ?>"
                  alt="<?php echo $product['name']; ?>"
                  class="w-full h-full object-cover">

                <!-- Badge -->
                <?php if ($product['badge']): ?>
                  <div class="absolute top-4 left-4 px-3 py-1 bg-luxury-gold text-white text-xs font-semibold rounded-full shadow-md">
                    <?php echo $product['badge']; ?>
                  </div>
                <?php endif; ?>

                <!-- Quick Add Button -->
                <div class="absolute bottom-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity">
                  <button onclick="event.stopPropagation(); addToCart('<?php echo $product['id']; ?>', '<?php echo $product['name']; ?>', <?php echo $product['price']; ?>)" class="w-12 h-12 bg-white rounded-full shadow-lg flex items-center justify-center text-luxury-gold hover:bg-luxury-gold hover:text-white transition-colors">
                    <i class="fas fa-shopping-bag"></i>
                  </button>
                </div>
              </div>

              <!-- Product Info -->
              <div class="p-6">
                <h4 class="text-lg font-semibold text-luxury-charcoal mb-1 font-display">
                  <?php echo $product['name']; ?>
                </h4>
                <p class="text-sm text-luxury-charcoal/60 mb-3">
                  <?php echo $product['description']; ?>
                </p>
                <div class="flex items-center justify-between">
                  <span class="text-2xl font-bold text-luxury-gold">
                    <?php echo formatPrice($product['price']); ?>
                  </span>
                  <span class="text-xs text-luxury-charcoal/40 line-through">
                    <?php echo formatPrice($product['price'] + 20); ?>
                  </span>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endforeach; ?>

    <!-- CTA Banner -->
    <div class="bg-gradient-to-r from-luxury-blue-light to-luxury-rose rounded-3xl p-8 md:p-12 text-center shadow-soft-lg">
      <h3 class="text-2xl md:text-3xl font-bold text-luxury-charcoal mb-4 font-display">
        Offre de lancement exclusive
      </h3>
      <p class="text-luxury-charcoal/70 mb-6 max-w-xl mx-auto">
        Profitez de -20€ sur votre première commande et bénéficiez de la livraison gratuite à Angers.
        Offre limitée aux 100 premiers clients !
      </p>
      <a href="#contact"
        class="inline-flex items-center px-8 py-4 bg-luxury-charcoal hover:bg-luxury-charcoal/90 text-white font-semibold rounded-2xl transition-all transform hover:scale-[1.02]">
        En profiter maintenant
        <i class="fas fa-chevron-right ml-2"></i>
      </a>
    </div>

  </div>
</section>

<!-- Features Section -->
<section class="py-16 bg-luxury-cream">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
      <div class="text-center p-6">
        <div class="w-16 h-16 mx-auto mb-4 bg-luxury-gold/20 rounded-2xl flex items-center justify-center">
          <i class="fas fa-medal text-2xl text-luxury-gold"></i>
        </div>
        <h4 class="font-semibold text-luxury-charcoal mb-2">Qualité Premium</h4>
        <p class="text-sm text-luxury-charcoal/60">Matériaux soigneusement sélectionnés</p>
      </div>
      <div class="text-center p-6">
        <div class="w-16 h-16 mx-auto mb-4 bg-luxury-blue/20 rounded-2xl flex items-center justify-center">
          <i class="fas fa-shipping-fast text-2xl text-luxury-blue"></i>
        </div>
        <h4 class="font-semibold text-luxury-charcoal mb-2">Livraison Rapide</h4>
        <p class="text-sm text-luxury-charcoal/60">24-48h à Angers, emballage soigné</p>
      </div>
      <div class="text-center p-6">
        <div class="w-16 h-16 mx-auto mb-4 bg-luxury-rose/30 rounded-2xl flex items-center justify-center">
          <i class="fas fa-heart text-2xl text-rose-400"></i>
        </div>
        <h4 class="font-semibold text-luxury-charcoal mb-2">Confection Douce</h4>
        <p class="text-sm text-luxury-charcoal/60">Confort optimal pour la peau sensible</p>
      </div>
      <div class="text-center p-6">
        <div class="w-16 h-16 mx-auto mb-4 bg-lime-100 rounded-2xl flex items-center justify-center">
          <i class="fas fa-undo-alt text-2xl text-lime-600"></i>
        </div>
        <h4 class="font-semibold text-luxury-charcoal mb-2">Retour Facile</h4>
        <p class="text-sm text-luxury-charcoal/60">30 jours pour changer d'avis</p>
      </div>
    </div>
  </div>
</section>

<!-- Product Modal -->
<div id="product-modal" class="fixed inset-0 bg-black/50 z-50 hidden items-center justify-center p-4">
  <div class="bg-white rounded-3xl max-w-2xl w-full max-h-[90vh] overflow-y-auto shadow-2xl">
    <div class="relative">
      <button onclick="closeProductModal()" class="absolute top-4 right-4 w-10 h-10 bg-white/90 rounded-full flex items-center justify-center hover:bg-gray-100 transition-colors z-10">
        <i class="fas fa-times text-luxury-charcoal"></i>
      </button>
      <img id="modal-image" src="" alt="" class="w-full h-64 md:h-80 object-cover">
    </div>
    <div class="p-8">
      <div class="flex items-start justify-between mb-4">
        <div>
          <h3 id="modal-name" class="text-2xl font-bold text-luxury-charcoal font-display mb-2"></h3>
          <p id="modal-description" class="text-luxury-charcoal/60"></p>
        </div>
        <div class="text-right">
          <span id="modal-price" class="text-2xl font-bold text-luxury-gold"></span>
        </div>
      </div>
      <div class="flex items-center space-x-4">
        <button onclick="addToCartFromModal()" class="flex-1 py-3 px-6 bg-luxury-gold hover:bg-luxury-gold-light text-luxury-charcoal font-semibold rounded-xl transition-all">
          <i class="fas fa-shopping-bag mr-2"></i>Ajouter au panier
        </button>
        <span id="modal-badge" class="hidden px-4 py-2 bg-luxury-gold/20 text-luxury-gold rounded-full font-semibold text-sm"></span>
      </div>
    </div>
  </div>
</div>

<!-- Cart Script with AJAX -->
<script>
  // Ajouter un produit au panier
  function addToCart(productId, productName, price) {
    const formData = new FormData();
    formData.append('action', 'add');
    formData.append('product_id', productId);
    formData.append('name', productName);
    formData.append('price', price);
    formData.append('image', event.target.closest('.product-card').querySelector('img').src);
    formData.append('description', event.target.closest('.product-card').querySelector('p').textContent);

    fetch('includes/cart_logic.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          updateCartCounter(data.count);
          showNotification('Produit ajouté au panier !');
        }
      })
      .catch(error => {
        console.error('Erreur:', error);
      });
  }

  // Mettre à jour le compteur du panier
  function updateCartCounter(count) {
    const counter = document.getElementById('cart-counter');
    if (counter) {
      counter.textContent = count;

      // Animation du compteur
      counter.classList.add('scale-125');
      setTimeout(() => {
        counter.classList.remove('scale-125');
      }, 200);
    }
  }

  // Afficher une notification
  function showNotification(message) {
    const notification = document.createElement('div');
    notification.className = 'fixed top-24 right-4 bg-luxury-gold text-luxury-charcoal px-6 py-3 rounded-xl shadow-lg z-50 transform translate-x-full transition-transform duration-300';
    notification.innerHTML = `
    <div class="flex items-center space-x-2">
      <i class="fas fa-check-circle"></i>
      <span class="font-medium">${message}</span>
    </div>
  `;

    document.body.appendChild(notification);

    setTimeout(() => {
      notification.classList.remove('translate-x-full');
    }, 100);

    setTimeout(() => {
      notification.classList.add('translate-x-full');
      setTimeout(() => {
        notification.remove();
      }, 300);
    }, 3000);
  }

  // Ouvrir la modale produit
  function openProductModal(productId, productName, description, price, image, badge) {
    const modal = document.getElementById('product-modal');
    if (!modal) return;

    document.getElementById('modal-image').src = image;
    document.getElementById('modal-name').textContent = productName;
    document.getElementById('modal-description').textContent = description;
    document.getElementById('modal-price').textContent = price.toFixed(2).replace('.', ',') + ' €';

    const badgeElement = document.getElementById('modal-badge');
    if (badge) {
      badgeElement.textContent = badge;
      badgeElement.classList.remove('hidden');
    } else {
      badgeElement.classList.add('hidden');
    }

    modal.dataset.productId = productId;
    modal.dataset.productName = productName;
    modal.dataset.productPrice = price;
    modal.dataset.productImage = image;
    modal.dataset.productDescription = description;

    modal.classList.remove('hidden');
    modal.classList.add('flex');
    document.body.style.overflow = 'hidden';
  }

  // Fermer la modale produit
  function closeProductModal() {
    const modal = document.getElementById('product-modal');
    if (!modal) return;

    modal.classList.add('hidden');
    modal.classList.remove('flex');
    document.body.style.overflow = 'auto';
  }

  // Ajouter au panier depuis la modale
  function addToCartFromModal() {
    const modal = document.getElementById('product-modal');
    if (!modal) return;

    const productId = modal.dataset.productId;
    const productName = modal.dataset.productName;
    const productPrice = parseFloat(modal.dataset.productPrice);
    const productImage = modal.dataset.productImage;
    const productDescription = modal.dataset.productDescription;

    const formData = new FormData();
    formData.append('action', 'add');
    formData.append('product_id', productId);
    formData.append('name', productName);
    formData.append('price', productPrice);
    formData.append('image', productImage);
    formData.append('description', productDescription);

    fetch('includes/cart_logic.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          updateCartCounter(data.count);
          showNotification('Produit ajouté au panier !');
          closeProductModal();
        }
      });
  }

  // Initialiser les écouteurs d'événements
  document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('product-modal');
    if (modal) {
      modal.addEventListener('click', function(e) {
        if (e.target === modal) {
          closeProductModal();
        }
      });

      document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
          closeProductModal();
        }
      });
    }

    // Charger le compteur du panier au chargement
    fetch('includes/cart_logic.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'action=get_count'
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          updateCartCounter(data.count);
        }
      });
  });
</script>

<?php include 'includes/footer.php'; ?>