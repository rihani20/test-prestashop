<?php
class ProduitsRecommandesController extends ModuleFrontController
{
    public function initContent()
    {
        parent::initContent();

        // Récupérer les produits recommandés
        $this->context->smarty->assign('produits_recommandes', $this->module->getRecommendedProducts());

        // Afficher le template
        $this->setTemplate('module:produits_recommandes/views/templates/front/produits_recommandes.tpl');
    }
}
