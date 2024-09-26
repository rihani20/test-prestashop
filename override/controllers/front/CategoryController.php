
<?php

class CategoryController extends CategoryControllerCore
{
    public function initContent()
    {
        parent::initContent();

        // Récupérer l'ID de la catégorie actuelle depuis le contexte
        $id_category = (int)$this->context->controller->getCategory()->id;
        $category = new Category($id_category, $this->context->language->id);
        $subcategories = $category->getSubCategories($this->context->language->id);

        // Ajouter le nombre de produits pour chaque sous-catégorie
       foreach ($subcategories  as &$subcategory) {
            $subcategoryObj = new Category($subcategory['id_category'], $this->context->language->id);
            $subcategory['product_count'] = $subcategoryObj->getProducts(null, 0, 0, 'id_product', 'ASC', true);
        } 
        $productsByColor = Product::getProductsByColor($this->category->id, $this->context->language->id);

    
        // Assigner les sous-catégories au template
        $this->context->smarty->assign(array(
            'subcategories' => $subcategories,
            'productsByColor'=> $productsByColor
        ));
    }


    


}
