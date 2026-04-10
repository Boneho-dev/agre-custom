// Panier temporaire en JavaScript
let cart = [];

// Ajouter un produit au panier
function addToCart(productId, productName, price) {
  cart.push({
    id: productId,
    name: productName,
    price: price,
    quantity: 1
  });
  
  // Mettre à jour le compteur
  updateCartCounter();
  
  // Afficher la notification
  showNotification('Produit ajouté au panier !');
}

// Mettre à jour le compteur du panier dans le header
function updateCartCounter() {
  const counter = document.getElementById('cart-counter');
  if (counter) {
    counter.textContent = cart.length;
    
    // Animation du compteur
    counter.classList.add('scale-125');
    setTimeout(() => {
      counter.classList.remove('scale-125');
    }, 200);
  }
}

// Afficher une notification
function showNotification(message) {
  // Créer l'élément de notification
  const notification = document.createElement('div');
  notification.className = 'fixed top-24 right-4 bg-luxury-gold text-luxury-charcoal px-6 py-3 rounded-xl shadow-lg z-50 transform translate-x-full transition-transform duration-300';
  notification.innerHTML = `
    <div class="flex items-center space-x-2">
      <i class="fas fa-check-circle"></i>
      <span class="font-medium">${message}</span>
    </div>
  `;
  
  document.body.appendChild(notification);
  
  // Animer l'entrée
  setTimeout(() => {
    notification.classList.remove('translate-x-full');
  }, 100);
  
  // Supprimer après 3 secondes
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
  
  // Remplir les données de la modale
  document.getElementById('modal-image').src = image;
  document.getElementById('modal-name').textContent = productName;
  document.getElementById('modal-description').textContent = description;
  document.getElementById('modal-price').textContent = price.toFixed(2).replace('.', ',') + ' €';
  
  // Gérer le badge
  const badgeElement = document.getElementById('modal-badge');
  if (badge) {
    badgeElement.textContent = badge;
    badgeElement.classList.remove('hidden');
  } else {
    badgeElement.classList.add('hidden');
  }
  
  // Stocker l'ID du produit pour l'ajout au panier
  modal.dataset.productId = productId;
  modal.dataset.productName = productName;
  modal.dataset.productPrice = price;
  
  // Afficher la modale
  modal.classList.remove('hidden');
  document.body.style.overflow = 'hidden';
}

// Fermer la modale produit
function closeProductModal() {
  const modal = document.getElementById('product-modal');
  if (!modal) return;
  
  modal.classList.add('hidden');
  document.body.style.overflow = 'auto';
}

// Ajouter au panier depuis la modale
function addToCartFromModal() {
  const modal = document.getElementById('product-modal');
  if (!modal) return;
  
  const productId = modal.dataset.productId;
  const productName = modal.dataset.productName;
  const productPrice = parseFloat(modal.dataset.productPrice);
  
  if (productId && productName && productPrice) {
    addToCart(productId, productName, productPrice);
    closeProductModal();
  }
}

// Initialiser les écouteurs d'événements
document.addEventListener('DOMContentLoaded', function() {
  // Fermer la modale en cliquant à l'extérieur
  const modal = document.getElementById('product-modal');
  if (modal) {
    modal.addEventListener('click', function(e) {
      if (e.target === modal) {
        closeProductModal();
      }
    });
    
    // Fermer avec la touche Escape
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape') {
        closeProductModal();
      }
    });
  }
});
