<?php

class CartController extends CartControllerCore {

    public function initContent() {
        parent::initContent();
    
        $cart = $this->context->cart;
        $products = $cart->getProducts();
        foreach ($products as &$product) {
            $product['lowest_subcategory'] = $this->getLowestLevelSubcategory($product['id_product']);
        }
    
        $this->context->smarty->assign('products', $products);
    }

    public function getLowestLevelSubcategory($productId) {
        $product = new Product($productId);
        $categories = $product->getCategories();
        $lowestCategory = null;
    
        foreach ($categories as $categoryId) {
            $category = new Category($categoryId);
            if (!$lowestCategory || $category->id_parent != 0) {
                $lowestCategory = $category;
            }
        }
    
        return $lowestCategory ? $lowestCategory->name : null;
    }

     /**
     * Override de la méthode processChangeProductInCart pour ajouter un message de bienvenue.
     */
    protected function processChangeProductInCart()
    {
        // Appel de la méthode d'origine pour gérer l'ajout du produit
        parent::processChangeProductInCart();

        var_dump($this->context);
        
        // Si un produit a été ajouté ou modifié dans le panier, afficher un message de bienvenue
        if ($this->context->cart->nbProducts() > 1) {
            // Ajout d'un message de bienvenue à l'utilisateur
            $this->context->cookie->__set(
                'welcome_message', 
                'Bienvenue dans votre panier, vous avez ajouté votre premier produit !'
            );
        }
    }
    
}
