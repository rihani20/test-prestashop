<?php
// override/classes/Product.php

class Product extends ProductCore
{
    public function getLowestLevelSubcategory()
    {
        // Récupérer les catégories associées au produit
        $categories = $this->getCategories();

        if (!empty($categories)) {
            // Variable pour stocker la sous-catégorie de niveau le plus bas
            $lowestLevelSubcategory = null;

            // Parcourir les catégories pour trouver la sous-catégorie de niveau le plus bas
            foreach ($categories as $categoryId) {
                $category = new Category($categoryId);
                // Vérifiez si la catégorie a une catégorie parente
                if ($category->id_parent) {
                    // Récupérer la sous-catégorie
                    $lowestLevelSubcategory = $category; // Mettre à jour la sous-catégorie de niveau le plus bas
                }
            }

            return $lowestLevelSubcategory; // Retourner la sous-catégorie de niveau le plus bas
        }

        return null; // Si aucune sous-catégorie n'est trouvée
    }


    public static function getProductsByColor($idCategory, $idLang, $active = true)
    {
       /*  $sql = 'SELECT p.*, pa.id_product_attribute, pa.reference AS color_reference, pl.name AS product_name, agl.name AS color_name, pai.id_image
                FROM ' . _DB_PREFIX_ . 'product p
                INNER JOIN ' . _DB_PREFIX_ . 'product_attribute pa ON p.id_product = pa.id_product
                INNER JOIN ' . _DB_PREFIX_ . 'product_attribute_combination pac ON pac.id_product_attribute = pa.id_product_attribute
                INNER JOIN ' . _DB_PREFIX_ . 'attribute a ON pac.id_attribute = a.id_attribute
                INNER JOIN ' . _DB_PREFIX_ . 'attribute_group_lang agl ON a.id_attribute_group = agl.id_attribute_group
                INNER JOIN ' . _DB_PREFIX_ . 'product_lang pl ON p.id_product = pl.id_product AND pl.id_lang = '.(int)$idLang.'
                LEFT JOIN ' . _DB_PREFIX_ . 'product_attribute_image pai ON pai.id_product_attribute = pa.id_product_attribute
                WHERE p.id_category_default = ' . (int)$idCategory . ' AND p.active = '.(int)$active.'
                AND agl.name = "Color"
                GROUP BY pa.id_product_attribute'; */

                $sql = 'SELECT p.*, pa.id_product_attribute, pa.reference AS color_reference, pl.name AS product_name, agl.name AS color_name, a.color AS color_value, pai.id_image
        FROM ' . _DB_PREFIX_ . 'product p
        INNER JOIN ' . _DB_PREFIX_ . 'product_attribute pa ON p.id_product = pa.id_product
        INNER JOIN ' . _DB_PREFIX_ . 'product_attribute_combination pac ON pac.id_product_attribute = pa.id_product_attribute
        INNER JOIN ' . _DB_PREFIX_ . 'attribute a ON pac.id_attribute = a.id_attribute
        INNER JOIN ' . _DB_PREFIX_ . 'attribute_group_lang agl ON a.id_attribute_group = agl.id_attribute_group AND agl.id_lang = ' . (int)$idLang . '
        INNER JOIN ' . _DB_PREFIX_ . 'product_lang pl ON p.id_product = pl.id_product AND pl.id_lang = ' . (int)$idLang . '
        LEFT JOIN ' . _DB_PREFIX_ . 'product_attribute_image pai ON pai.id_product_attribute = pa.id_product_attribute
        WHERE p.id_category_default = ' . (int)$idCategory . ' 
        AND p.active = ' . (int)$active . ' 
        AND agl.name = "Color"
        GROUP BY pa.id_product_attribute';

        return Db::getInstance()->executeS($sql);
    } 

    public function getPriceWithExtraDiscount($price)
    {
        // Appliquer une réduction de 10%
        $discount = 0.10;
        $priceWithDiscount = $price - ($price * $discount);

        return $priceWithDiscount;
    }

}

/*
SELECT p.*, pa.id_product_attribute, pa.reference AS color_reference, pl.name AS product_name, agl.name AS color_name, pai.id_image FROM ps_product p INNER JOIN ps_product_attribute pa ON p.id_product = pa.id_product INNER JOIN ps_product_attribute_combination pac ON pac.id_product_attribute = pa.id_product_attribute INNER JOIN ps_attribute a ON pac.id_attribute = a.id_attribute INNER JOIN ps_attribute_group_lang agl ON a.id_attribute_group = agl.id_attribute_group INNER JOIN ps_product_lang pl ON p.id_product = pl.id_product AND pl.id_lang = 1 LEFT JOIN ps_product_attribute_image pai ON pai.id_product_attribute = pa.id_product_attribute WHERE p.id_category_default = 12 AND p.active = 1 AND agl.name = "Color" GROUP BY pa.id_product_attribute
*/

