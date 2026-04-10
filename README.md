# AGRE Custom

> **E-commerce de Luxe pour Enfants** - Une expérience d'achat haut de gamme, élégante et moderne.

![AGRE Custom](https://img.shields.io/badge/AGRE-Custom-gold?style=for-the-badge&logo=crown&logoColor=D4AF37&color=1A1A1A)
![PHP](https://img.shields.io/badge/PHP-8.0+-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/TailwindCSS-3.0-06B6D4?style=for-the-badge&logo=tailwindcss&logoColor=white)

---

## À propos du projet

**AGRE Custom** est une plateforme e-commerce complète dédiée aux vêtements de luxe pour enfants. Conçue avec une approche "mobile-first" et une esthétique raffinée, elle offre :

- **Catalogue produit** avec catégories (Manteaux, Accessoires, Écharpes)
- **Panier d'achat** dynamique avec sessions PHP
- **Processus de checkout** sécurisé et fluide
- **Dashboard Admin** pour la gestion des commandes
- **Design responsive** 100% adapté mobile

### Identité visuelle

- **Couleur principale** : Or `#D4AF37` (Luxury Gold)
- **Palette** : Noir Charbon `#1A1A1A`, Crème `#F9F7F2`, Beige `#E8E0D5`
- **Style** : Coins arrondis (`rounded-3xl`), ombres douces, typographie élégante

---

## Stack Technique

| Couche              | Technologie                         |
| ------------------- | ----------------------------------- |
| **Backend**         | PHP 8.0+ (Procédural avec includes) |
| **Base de données** | MySQL 8.0 avec PDO                  |
| **Frontend**        | TailwindCSS 3.0 + Font Awesome      |
| **Session**         | PHP Native Sessions                 |
| **Déploiement**     | InfinityFree / XAMPP                |

### 📁 Architecture

```
agre-custom/
├── 📄 index.php          # Page d'accueil + catalogue
├── 🛒 cart.php           # Panier d'achat
├── 💳 checkout.php       # Formulaire de commande
├── ✅ success.php        # Confirmation commande
├── 📊 admin_orders.php   # Dashboard admin
├── 🔧 includes/
│   ├── header.php        # En-tête commun
│   ├── footer.php        # Pied de page
│   ├── cart_logic.php    # Logique panier (sessions)
│   └── db.php            # Connexion PDO MySQL
└── 🎨 assets/
    ├── css/              # Styles custom
    ├── js/               # Scripts JS
    └── img_2/            # Images produits
```

---

## Installation locale (XAMPP)

### Prérequis

- XAMPP avec PHP 8.0+ et MySQL
- Navigateur moderne

### Étapes

1. **Cloner le projet** dans `C:\xampp\htdocs\` :

```bash
cd C:\xampp\htdocs\
git clone https://github.com/votre-username/agre-custom.git
```

2. **Créer la base de données** :

```sql
CREATE DATABASE agre_custom;
```

3. **Importer les tables** (fichier SQL à créer selon vos besoins) :

```sql
-- Tables requises : orders, order_items
```

4. **Accéder au site** :

```
http://localhost/agre-custom/
```

---

## 🌐 Hébergement InfinityFree

Le projet est hébergé gratuitement et à vie sur **InfinityFree**.

### Configuration InfinityFree

1. Créer un compte sur [infinityfree.net](https://infinityfree.net)
2. Créer un nouveau site avec sous-domaine gratuit
3. Utiliser le FTP ou le File Manager pour uploader les fichiers
4. Créer la base de données MySQL depuis le panel de contrôle
5. Configurer les identifiants dans `includes/db.php`

### Identifiants de connexion

Remplacez dans `includes/db.php` :

```php
$host     = 'sqlXXX.epizy.com';  // Votre host InfinityFree
$dbname   = 'epiz_XXXXXX_agre';   // Votre nom de base
$user     = 'epiz_XXXXXX';        // Votre utilisateur
$password = 'votre_mot_de_passe'; // Votre mot de passe
```

---

## Développeur

**NIONDJUI BONEHO ANGE-KEVIN AGRE**

- 🎓 Développeur Full Stack
- 🏢 Fondateur AGRE Custom & AGRE AGENCY
- 📧 Contact : agrekevin09@gmail.com
- 🔗 LinkedIn : [Ange-Kevin Agre](https://www.linkedin.com/in/ange-kevin-agre/)

---

## 📝 Fonctionnalités Clés

| Fonctionnalité         | Description                                |
| ---------------------- | ------------------------------------------ |
| 🔐 **Sessions PHP**    | Panier persistant entre les pages          |
| 💾 **Base de données** | Stockage des commandes et clients          |
| 📱 **Responsive**      | Parfait sur mobile, tablette, desktop      |
| ⚡ **AJAX**            | Ajout au panier sans rechargement          |
| 🎊 **Animations**      | Confettis, transitions élégantes           |
| 🛡️ **Sécurité**        | Requêtes préparées PDO, validation données |

---

## 📄 License

© 2026 **NIONDJUI BONEHO ANGE-KEVIN AGRE** - Tous droits réservés.

Projet développé dans le cadre de **AGRE AGENCY**.

---

<p align="center">
  <strong style="color: #D4AF37;">✨ Luxe, Élégance, Modernité ✨</strong>
</p>
