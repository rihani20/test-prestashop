<?php
if (!defined('_PS_VERSION_')) {
    exit;
}

class ProduitsRecommandes extends Module
{
    public function __construct()
    {
        $this->name = 'produits_recommandes';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Votre Nom';
        $this->need_instance = 0;

        parent::__construct();

        $this->displayName = $this->l('Produits Recommandés');
        $this->description = $this->l('Un module qui affiche une liste de produits recommandés sur une page dédiée.');
    }

    public function install()
    {
        return parent::install() && $this->registerHook('displayHeader') && $this->installTab();
    }

    public function uninstall()
    {
        return parent::uninstall() && $this->uninstallTab();
    }

    public function installTab()
    {
        $tab = new Tab();
        $tab->class_name = 'AdminProduitsRecommandes';
        $tab->module = $this->name;
        $tab->id_parent = 0; // Parent ID for the tab
        $tab->active = 1;
        $tab->name = [Configuration::get('PS_LANG_DEFAULT') => 'Produits Recommandés'];
        return $tab->add();
    }

    public function uninstallTab()
    {
        $id_tab = Tab::getIdFromClassName('AdminProduitsRecommandes');
        if ($id_tab) {
            $tab = new Tab($id_tab);
            return $tab->delete();
        }
        return true;
    }

    public function hookDisplayHeader()
    {
        $this->context->controller->addJS($this->_path.'views/js/produits_recommandes.js');
    }

    public function getContent()
    {
        // Afficher le contenu de la page d'administration (optionnel)
    }

    public function getRecommendedProducts()
    {
        // Récupérer les produits recommandés
        $products = Product::getProducts($this->context->language->id, 0, 10, 'id_product', 'DESC');
        return $products;
    }
}
