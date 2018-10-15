{include file="cabecera.tpl"}

<div class="container container-lista" id="container">
    
    <form>
        <div class="form-group">
            <h1>Lista personajes</h1>
            <ul class="list-group lista">
                {foreach from=$personajes item=personaje}
                    {foreach from=$roles item=rol}
                        {if $rol['id'] == $personaje['id_rol']}
                            <div class="item">
                                <h2>Nombre: <a href="http://{$smarty.server.SERVER_NAME}{dirname($smarty.server.PHP_SELF)}/personaje/{$personaje['id']}">{$personaje['nombre']}</a></h2>
                                <h5>Rol: <a href="http://{$smarty.server.SERVER_NAME}{dirname($smarty.server.PHP_SELF)}/rol/{$rol['id']}">{$rol['nombre']}</a></h5>
                                <h5>Descripción: {$personaje['descripcion']}</h5>
                            </div>      
                        {/if}
                    {/foreach}
                {/foreach}
            </ul>
        </div>
    </form>
        
</div>

{include file="footer.tpl"}