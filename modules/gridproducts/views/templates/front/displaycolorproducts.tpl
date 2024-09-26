<div class="color-product-list">
{foreach from=$products item=product}
    {foreach from=$product.combinations item=combination}
        <div class="product">
            <img src="{$combination.image_url}" alt="{$product.name} - {$combination.color_name}">
            <h3>{$product.name} ({$combination.color_name})</h3>
            <p>{$product.description_short}</p>
        </div>
    {/foreach}
{/foreach}
</div>
