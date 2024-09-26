<?php

class ProductController extends ProductControllerCore
{
    /**
     * Override de la méthode initContent pour ajouter "Produit en vedette" au titre de la page produit.
     */
    public function initContent()
    {
        // Appel de la méthode d'origine
        parent::initContent();
    
        // Calculer le prix avec la remise supplémentaire
        $priceWithExtraDiscount = $this->product->getPriceWithExtraDiscount($this->product->getPrice());
        
    
        // Passer cette valeur au template
        $this->context->smarty->assign([
            'price_with_extra_discount' => $priceWithExtraDiscount,
            'meta_title' => 'Produit en vedette - ' . $this->product->name,
        ]);
    }
    
}
