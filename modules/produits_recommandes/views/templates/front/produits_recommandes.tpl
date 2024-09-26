{extends file="page.tpl"}

{block name="page_content"}
    <h1>{$module.displayName}</h1>
    <div class="produits-recommandes">
        {if isset($produits_recommandes) && count($produits_recommandes) > 0}
            <ul>
                {foreach from=$produits_recommandes item=produit}
                    <li>
                        <a href="{$link->getProductLink($produit.id_product)}">
                            <img src="{$link->getImageLink($produit.link_rewrite, $produit.id_image, 'home_default')}" alt="{$produit.name}" />
                            <span>{$produit.name}</span>
                        </a>
                    </li>
                {/foreach}
            </ul>
        {else}
            <p>Aucun produit recommandé trouvé.</p>
        {/if}
    </div>
{/block}
